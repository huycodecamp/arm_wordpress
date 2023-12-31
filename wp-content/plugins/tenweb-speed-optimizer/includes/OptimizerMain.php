<?php
namespace TenWebOptimizer;

use JSMin\JSMin;

class OptimizerMain
{
    protected static $instance = null;
    private $is_testing = false;
    private $tenweb_handle;
    private $two_delay_js_execution = false;
    private $two_delay_all_js_execution = false;
    private $two_timeout_js_load = false;
    private $two_exclude_rev = false;
    private $two_exclude_slider_by_10web = false;
    private $two_exclude_js = "";
    private $two_exclude_delay_js = array();
    private $two_disabled_delay_all_js_pages = array();
    private $two_exclude_css = "";
    private $two_include_inline_js = "";
    private $two_include_inline_css = "";
    private $two_dequeue_jquery_migrate = "";
    private $current_url = null;
    private $async_all = false;
    private $aggregate_js = false;
    private $aggregate_css = false;


    private $two_do_not_optimize_images = "off";

    private $two_lazyload = "off";
    private $two_bg_lazyload = "off";
    private $two_enable_use_srcset = "off";
    private $two_enable_picture_webp_delivery = "off";
    private $two_video_lazyload = "off";
    private $two_iframe_lazyload = "off";
    private $two_elemrntor_video_iframe = "off";
    private $two_youtube_vimeo_iframe_lazyload = "off";
    private $two_gzip = false;
    private $browser_lazy = false;
    private $vanilla_lazy = false;
    /**
     * @var mixed|void
     */
    private $two_delayed_js_execution_list;
    /**
     * @var OptimizerCacheStructure
     */
    private $cacheStructure;
    private $TwoSettings;
    private $use_extended_exception_list_js;

    /**
     * @var string
     */
    private $two_delayed_js_load_libs_first;

    private $critical;
    private $two_webp_delivery_working = false;

    private function __construct()
    {
        @ini_set('pcre.backtrack_limit', 5000000);
        @ini_set('pcre.recursion_limit', 5000000);

        add_action( 'send_headers', array( $this, 'two_headers' ) );
        do_action( 'wp_meta' );
        $this->two_webp_delivery_working = get_option("two_webp_delivery_working");
        // Move the initialization to wp action to have wp query already set as we need to identify the search pages.
        // Set the priority to the end to avoid conflicts with third party plugins.
        add_action( 'wp', array( $this, 'init' ), PHP_INT_MAX - 1 );
    }

    public static function get_instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function init()
    {
        OptimizerUtils::download_critical();
        if ( !defined( 'TWO_CACHE_DIR' ) ) {
            define( 'TWO_CACHE_DIR', OptimizerCache::get_path() );
        }

        global $TwoSettings;
        $this->TwoSettings = $TwoSettings;
        $lazy_load_type = $this->TwoSettings->get_settings("lazy_load_type");
        $this->is_testing = $this->TwoSettings->getTestMode();
        if ($lazy_load_type === "browser") {
            $this->browser_lazy = true;
        }
        if ($lazy_load_type === "vanilla") {
            $this->vanilla_lazy = true;
        }
        $this->two_do_not_optimize_images = $this->TwoSettings->get_settings("two_do_not_optimize_images");
        $this->two_enable_use_srcset = $this->TwoSettings->get_settings("two_enable_use_srcset");
        $this->two_enable_picture_webp_delivery = $this->TwoSettings->get_settings("two_enable_picture_webp_delivery");
        $this->two_lazyload = $this->TwoSettings->get_settings("two_lazyload");
        $this->two_bg_lazyload = $this->TwoSettings->get_settings("two_bg_lazyload");
        $this->two_video_lazyload = $this->TwoSettings->get_settings("two_video_lazyload");
        $this->two_iframe_lazyload = $this->TwoSettings->get_settings("two_iframe_lazyload");
        $this->two_elemrntor_video_iframe = $this->TwoSettings->get_settings("two_elemrntor_video_iframe");
        $this->two_youtube_vimeo_iframe_lazyload = $this->TwoSettings->get_settings("two_youtube_vimeo_iframe_lazyload");
        $this->two_gzip = $this->TwoSettings->get_settings("two_gzip");
        $this->aggregate_js = empty($this->TwoSettings->get_settings("two_aggregate_js", false)) ? false : true;
        $this->aggregate_css = empty($this->TwoSettings->get_settings("two_aggregate_css", false)) ? false : true;
        $this->two_delay_js_execution = empty($this->TwoSettings->get_settings("two_delay_js_execution", false)) ? false : true;
        $this->two_delay_all_js_execution = empty($this->TwoSettings->get_settings("two_delay_all_js_execution", false)) ? false : true;
        $this->two_timeout_js_load = $this->TwoSettings->get_settings("two_timeout_js_load", false) === 'on';
        $this->two_exclude_rev = $this->TwoSettings->get_settings("two_exclude_rev", false);
        $this->two_exclude_slider_by_10web = $this->TwoSettings->get_settings("two_exclude_slider_by_10web", false);
        $this->two_test_mode = $this->TwoSettings->get_settings("two_test_mode" );

        $this->minify_js = empty($this->TwoSettings->get_settings("two_minify_js", false)) ? false : true;
        $this->minify_css = empty($this->TwoSettings->get_settings("two_minify_css", false)) ? false : true;

        $this->use_extended_exception_list_js = empty($this->TwoSettings->get_settings("two_use_extended_exception_list_js", false)) ? false : true;

        $this->current_url = OptimizerUtils::get_page_url();

        $dir = OptimizerCache::get_path();
        if ($this->dirsize($dir) > 1000000000) { // 1Gb
            $this->clear_cache();
        }

        $this->cacheStructure = OptimizerCacheStructure::init();

        global $post;
        $post_mode = "";
        if(isset($post) && isset($post->ID)){
            $post_mode = get_post_meta($post->ID, "two_mode", true);
        }
        $two_default_mode = get_option("two_default_mode");
        if(!is_array($two_default_mode) && !isset($_GET["mode"]) && !wp_doing_ajax()){
            OptimizerUtils::set_global_mode();
        }

        if (
          !is_admin() && !is_user_logged_in() && !is_search() //user is logged in or is elementor preview page
          && !isset($_GET["two_critical_status"]) && !isset($_GET["two_action"]) && !isset($_GET["two_nooptimize"]) && !isset($_GET["elementor-preview"])
          && \TenWebOptimizer\OptimizerCache::urlIsOptimizable() //whether url is excluded from fastcgi cached pages or manually excluded
          && !\TenWebOptimizer\OptimizerUtils::is_rest() // if is not rest request
          && \TenWebOptimizer\OptimizerCache::isGetRequest() //only run on GET requests
          && (!isset($_GET["two_mode"]) || $_GET["two_mode"] != "no_optimize")
          && ($post_mode != "no_optimize")
          && ( 'on' != $this->two_test_mode || isset( $_GET[ "twbooster" ] ) )
        ) {

            /*Check if user free and not critical page ont optimize */
            $this->critical = new OptimizerCriticalCss();
            global $tenweb_subscription_id;
            $tenweb_subscription_id = intval($tenweb_subscription_id);
            $page_id = $this->critical->page_id;
            if(empty($page_id)){
                return;
            }
            $page_mode = get_post_meta($page_id,"two_mode", true);
            if($tenweb_subscription_id === TENWEB_SO_FREE_SUBSCRIPTION_ID && $page_id!="front_page" && !is_array($page_mode)){
                if(!isset($this->critical->critical_css)){
                    return;
                }
            }elseif(TWO_ALWAYS_CRITICAL && !TENWEB_SO_HOSTED_ON_10WEB && (!isset($this->critical->two_critical_pages) || !isset($this->critical->two_critical_pages[$page_id]) || $this->critical->two_critical_pages[$page_id]["status"] ==="not_started")){
                $post_type = get_post_type($page_id);
                if($page_id === "front_page" || $post_type === "page"){
                    if(\Tenweb_Authorization\Login::get_instance()->check_logged_in()){
                        OptimizerCriticalCss::generate_critical_css_by_id($page_id);
                    }
                }
            }elseif ( TENWEB_SO_HOSTED_ON_10WEB && isset($this->critical->two_critical_pages[$page_id]["status"]) && $this->critical->two_critical_pages[$page_id]["status"] !="success" && $this->critical->two_critical_pages[$page_id]["status"] !="in_progress"){
                OptimizerCriticalCss::generate_critical_css_by_id($page_id);
            }
            $date = time();
            if($page_id === "front_page"){
                update_option("two_optimized_date_front_page", $date);
            }else{
                update_post_meta($page_id, "two_optimized_date", $date);
            }



          OptimizerUtils::init_defines();
          $this->check_cache_dir( OptimizerCache::get_path() );
          $two_delayed_js_execution_list = $this->TwoSettings->get_settings( "two_delayed_js_execution_list" );
          $two_exclude_js = $this->TwoSettings->get_settings( "two_exclude_js" );
          $two_exclude_rev = $this->TwoSettings->get_settings( "two_exclude_rev" );
          $two_exclude_slider_by_10web = $this->TwoSettings->get_settings( "two_exclude_slider_by_10web" );
          $two_exclude_delay_js = $this->TwoSettings->get_settings( "two_exclude_delay_js" );
          $two_disabled_delay_all_js_pages = $this->TwoSettings->get_settings( "two_disabled_delay_all_js_pages" );
          $two_delayed_js_load_libs_first = $this->TwoSettings->get_settings( "two_delayed_js_load_libs_first" );
          $two_exclude_css = $this->TwoSettings->get_settings( "two_exclude_css" );
          $two_include_inline_js = $this->TwoSettings->get_settings( "two_include_inline_js" );
          $two_include_inline_css = $this->TwoSettings->get_settings( "two_include_inline_css" );
          $two_dequeue_jquery_migrate = $this->TwoSettings->get_settings( "two_dequeue_jquery_migrate" );
          $async_all = $this->TwoSettings->get_settings( "two_async_all" );
          $two_disable_wp_dashicons = $this->TwoSettings->get_settings( "two_disable_wp_dashicons" );
          if ( $two_delayed_js_execution_list != false ) {
            $this->two_delayed_js_execution_list = $two_delayed_js_execution_list;
          }
          if ( $two_exclude_js != false ) {
            $this->two_exclude_js = $two_exclude_js;
          }
          if ( !empty( $two_exclude_delay_js ) ) {
            $this->two_exclude_delay_js = explode( ",", $two_exclude_delay_js );
          }
          if ( !empty( $two_disabled_delay_all_js_pages ) ) {
            $this->two_disabled_delay_all_js_pages = $two_disabled_delay_all_js_pages;
          }
          if ( $two_exclude_css != false ) {
            $this->two_exclude_css = $two_exclude_css;
          }
          if ( $async_all === "on" ) {
            $this->async_all = true;
          }

          if ( $two_include_inline_js != false ) {
            $this->two_include_inline_js = "on";
          }
          if ( $two_include_inline_css != false ) {
            $this->two_include_inline_css = "on";
          }
          if ( $two_delayed_js_load_libs_first != false ) {
            $this->two_delayed_js_load_libs_first = "on";
          }
          if ( $two_dequeue_jquery_migrate != false ) {
            $this->two_dequeue_jquery_migrate = "on";
          }

          $this->check_and_create_dirs();

          // We need to remove default WP lazyloading as it conflicts with vanilla lazy on iOS 15.
          if ( !$this->browser_lazy ) {
              add_filter( 'wp_lazy_loading_enabled', '__return_false' );
          }

          // We need to remove default WP lazyloading as it conflicts with vanilla lazy on iOS 15.
          if ( !$this->browser_lazy ) {
            add_filter( 'wp_lazy_loading_enabled', '__return_false' );
          }

          add_action( 'wp_head', array( $this, 'add_delayed_javascript_execution_script_header' ), -1000000000, 0 );
          add_action( 'wp_footer', array( $this, 'add_lazyload_js_footer' ), 10, 0 );
          add_action( 'wp_default_scripts', array( $this, 'dequeue_jquery_migrate' ) );
          if ( $two_disable_wp_dashicons == "on" ) {
            add_action( 'wp_print_styles', array( $this, 'two_deregister_styles' ), 100 );
          }

          if ( $this->two_youtube_vimeo_iframe_lazyload == "on" ) {
            add_action( 'wp_enqueue_scripts', array( $this, 'two_enqueue_styles' ) );
          }

          if ( $this->two_lazyload == "on" ||
            $this->two_iframe_lazyload == "on" ||
            $this->two_bg_lazyload == "on" ||
            $this->two_video_lazyload == "on" ||
            $this->two_youtube_vimeo_iframe_lazyload == "on" ||
            $this->two_do_not_optimize_images == "on" ) {

            $ao_imgopt = new OptimizerImages( array(
              "two_iframe_lazyload" => $this->two_iframe_lazyload,
              "two_youtube_vimeo_iframe_lazyload" => $this->two_youtube_vimeo_iframe_lazyload,
            ) );
            $ao_imgopt->run();
          }
          if ( !empty( $this->is_testing ) ) {
            echo wp_kses_post( $this->end_buffering( $this->is_testing ) );
            die;
          }
          global $post;
          if(isset($post->ID)){
                $this->set_modes($post->ID);
          }
            add_action( 'wp_meta', array( $this, 'two_meta' ) );
            ob_start( array( $this, 'end_buffering' ), 0, PHP_OUTPUT_HANDLER_REMOVABLE );
        }
    }

    public function two_headers() {
      global $TwoSettings;
      $two_critical_status = $TwoSettings->get_settings("two_critical_status");
      $two_critical_pages = \TenWebOptimizer\OptimizerUtils::getCriticalPages();
      header('X-TWO-OPTIMIZE: 1');
      header('X-TWO-VERSION: ' . TENWEB_SO_VERSION);
      header('X-TWO-CACHE-DATE: ' . get_option("two_clear_cache_date"));
        if($this->two_webp_delivery_working === 1){
            header('X-TWO-WEBP: 1');
        }
      if(isset($_GET["two_critical_status"])){
        if($two_critical_status == "true" && isset($two_critical_pages) && is_array($two_critical_pages)){
          if(isset($two_critical_pages["front_page"]) && get_option("tenweb_import_in_progress") != 1){
            header('X-TWO-CRITICAL: '.$two_critical_pages["front_page"]["status"]);
          }else{
            header('X-TWO-CRITICAL: not_started');
          }
        }
      }
    }
    public function two_meta(){
        if($this->two_webp_delivery_working === 1){
            echo '<meta name="X-TWO-WEBP" content="1">';
        }
        echo '<meta name="X-TWO-OPTIMIZE" content="1">';
        echo '<meta name="X-TWO-CACHE-DATE" content="' . esc_attr( get_option("two_clear_cache_date") ) . '">';
    }

    public function two_deregister_styles()
    {
        wp_deregister_style('dashicons');
    }

    public function two_enqueue_styles()
    {
        wp_enqueue_style('two_yt_vi_css', TENWEB_SO_URL . '/includes/external/css/two_yt_vi_lazyload.min.css', "", TENWEB_SO_VERSION);

    }

    public function add_delayed_javascript_execution_script_header()
    {
        echo trim(JSMin::minify('<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' type="text/javascript">
                    ' .file_get_contents(__DIR__."/external/js/loader.js").'
                </script>'));
        if($this->two_delay_all_js_execution){
            global $TwoSettings;
            $two_delay_custom_js = $TwoSettings->get_settings("two_delay_custom_js");
            if(!empty($two_delay_custom_js) && !ctype_space($two_delay_custom_js)){
                echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' type="text/javascript">
                        const two_delay_custom_js = new Event("two_delay_custom_js");
                        document.addEventListener("two_delay_custom_js", event => {   
                          ' . esc_js( $two_delay_custom_js ) . '  
                        })
                    </script>';
            }

            echo trim(JSMin::minify('<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' type="text/javascript">' .
                'window.two_delayed_loading_attribute = "' . OptimizerScripts::TWO_DELAYED_JS_ATTRIBUTE . '";
            window.two_delayed_js_load_libs_first = "' . esc_html( $this->two_delayed_js_load_libs_first ) . '";
            window.two_delayed_loading_events = ["keydown", "mouseover", "touchmove", "touchstart"];
            window.two_event_listeners = [];
           
                </script>'));

            if($this->two_timeout_js_load){
                echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' type="text/javascript">
                        setTimeout(function() {
                          two_load_delayed_javascript();
                        },1500);
                     </script>';
            }
        }
        elseif ($this->two_delay_js_execution) {
            echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' type="text/javascript">' .
                'window.two_delayed_loading_attribute = "' . OptimizerScripts::TWO_DELAYED_JS_ATTRIBUTE . '";
            window.two_delayed_js_load_libs_first = "' . esc_html( $this->two_delayed_js_load_libs_first ) . '";
            window.two_delayed_loading_events = ["keydown", "mouseover", "touchmove", "touchstart"];
            window.two_event_listeners = [];
            var two_load_delayed_javascript = function(event) {
                var delayedScripts = [].map.call(document.querySelectorAll("script[" + window.two_delayed_loading_attribute + "]"), function(elm){
                                return elm;
                              })

                if (window.two_delayed_js_load_libs_first === "on" ) {
                    delayedScripts = delayedScripts.sort(function (a, b) {
                                           isLiba = a.outerHTML.indexOf("data:");
                                           isLibb = b.outerHTML.indexOf("data:");
                                           
                                           return isLiba - isLibb;
                                        });
                }
                delayedScripts.forEach(function(elem) {
                    var src = elem.getAttribute(window.two_delayed_loading_attribute);
                    elem.setAttribute("src", src);
                    elem.removeAttribute(window.two_delayed_loading_attribute);
                    window.two_delayed_loading_events.forEach(function(event) {
                        document.removeEventListener(event, two_load_delayed_javascript, false)
                    });
                })
            };' .
                '</script>';
        }

        if ($this->critical->uncritical_load_type === "on_interaction" && $this->critical->critical_enabled) {
            echo trim(JSMin::minify('<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' type="text/javascript">' .
                'window.two_delayed_loading_attribute_css = "' . OptimizerStyles::TWO_DELAYED_CSS_ATTRIBUTE . '";
            window.two_delayed_loading_events_css = ["keydown", "mouseover", "touchmove", "touchstart"];
            window.two_event_listeners_css = [];
            var two_load_delayed_css = function(event) {
                var delayedStyle = [].map.call(document.querySelectorAll("link[" + window.two_delayed_loading_attribute_css + "]"), function(elm){
                                return elm;
                              })

                delayedStyle.forEach(function(elem) {
                    var src = elem.getAttribute(window.two_delayed_loading_attribute_css);
                    elem.setAttribute("href", src);
                    elem.removeAttribute(window.two_delayed_loading_attribute_css);
                    window.two_delayed_loading_events_css.forEach(function(event) {
                        document.removeEventListener(event, two_load_delayed_css, false)
                    });
                })
            };' .
                '</script>'));
        }
        echo trim(JSMin::minify('<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' type="text/javascript">
                    // Register delayed scripts load on document load event 
                    document.onreadystatechange = function () {
                        if (document.readyState === "interactive") {
                            if(window.two_delayed_loading_attribute !== undefined){
                                 window.two_delayed_loading_events.forEach(function(ev) { window.two_event_listeners[ev] = document.addEventListener(ev, two_load_delayed_javascript, false) });
                            }        
                            if(window.two_delayed_loading_attribute_css !== undefined){
                                 window.two_delayed_loading_events_css.forEach(function(ev) { window.two_event_listeners_css[ev] = document.addEventListener(ev, two_load_delayed_css, false) });
                            }
                        }
                    }
              </script>'));

    }
    public function add_lazyload_js_footer()
    {
        if (TWO_LAZYLOAD) {
            if ($this->two_bg_lazyload == "on" || $this->two_lazyload == "on" || $this->two_iframe_lazyload == "on" || $this->two_video_lazyload == "on" || $this->two_youtube_vimeo_iframe_lazyload == "on") {
                $noptimize_flag = ' data-noptimize="1"';
                if ($this->two_iframe_lazyload == "on" && $this->two_elemrntor_video_iframe == "on") {
                    echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' src="' . plugins_url('external/js/two_elementor_video_to_iframe.js', __FILE__) . '"></script>';
                }
                if ($this->vanilla_lazy) {
                    echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . '  type="text/javascript"  src="' . plugins_url('external/js/vanilla-lazyload/lazyload.min.js', __FILE__) . '"></script>';

                    if ($this->two_bg_lazyload == "on") {
                        echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' type="text/javascript" src="' . plugins_url('external/js/vanilla-lazyload/two_bg_vanilla.js', __FILE__) . '"></script>';
                    }
                    if ($this->two_youtube_vimeo_iframe_lazyload == "on") {
                        echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . '  type="text/javascript" data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' src="' . plugins_url('external/js/two_yt_vi_lazyload.min.js', __FILE__) . '"></script>';
                    }
                    echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' >
                                if(typeof two_lazyLoadInstance === "undefined"){
                                   var two_lazyLoadInstance = new LazyLoad({});
                                }else{
                                     two_lazyLoadInstance.update();
                                }
                            </script>';

                    return;
                }
                if (($this->browser_lazy && $this->two_bg_lazyload == "on") || $this->browser_lazy == false) {
                    echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' ' . esc_attr( $noptimize_flag ) . '>window.lazySizesConfig=window.lazySizesConfig||{};window.lazySizesConfig.loadMode=1;</script>';
                    echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' src="' . plugins_url('external/js/jquery.lazy.min.js', __FILE__) . '"></script>';
                    if ($this->two_bg_lazyload == "on") {
                        echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' src="' . plugins_url('external/js/two_lazyload.js', __FILE__) . '"></script>';
                    }
                }
                if ($this->browser_lazy == false) {
                    if ($this->two_iframe_lazyload == "on") {
                        echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' src="' . plugins_url('external/js/jquery.lazy.iframe.min.js', __FILE__) . '"></script>';
                    }
                    if ($this->two_video_lazyload == "on") {
                        echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' src="' . plugins_url('external/js/jquery.lazy.av.min.js', __FILE__) . '"></script>';
                    }
                    if ($this->two_youtube_vimeo_iframe_lazyload == "on") {
                        echo '<script data-pagespeed-no-defer ' . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . ' src="' . plugins_url('external/js/two_yt_vi_lazyload.min.js', __FILE__) . '"></script>';
                    }
                }
                if (($this->browser_lazy && $this->two_bg_lazyload == "on") || $this->browser_lazy == false) {
                    echo "<script data-pagespeed-no-defer " . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . " >
                        window.onload = function() {
                             jQuery('.lazyload').Lazy({
                              visibleOnly:true,
                              afterLoad: function(element) {
                                 element.css('display', '');
                              }
                             });
                        }
                     </script>";
                }
            }
        }
    }

    public function dequeue_jquery_migrate($scripts)
    {
        if ($this->two_dequeue_jquery_migrate == "on" && !is_admin() && !empty($scripts->registered['jquery']) && !empty($scripts->registered['jquery']->deps)) {
            $scripts->registered['jquery']->deps = array_diff(
                $scripts->registered['jquery']->deps,
                ['jquery-migrate']
            );
        }
    }

    /**
     * @param $content
     *  return html content
     *
     * @return mixed|string|void
     */
    private function end_buffering($content)
    {
        /**
         * optimize options
         */
        $classoptions = array(
            'OptimizerScripts' => array(
                'aggregate'                      => $this->aggregate_js,
                'justhead'                       => "",
                'forcehead'                      => "",
                'trycatch'                       => "",
                'delay_js_execution'             => $this->two_delay_js_execution,
                'delay_all_js_execution'         => $this->two_delay_all_js_execution,
                'use_extended_exception_list_js' => $this->use_extended_exception_list_js,
                'delayed_js_execution_list'      => $this->two_delayed_js_execution_list,
                'js_exclude'                     => $this->two_exclude_js,
                'exclude_delay_js'               => $this->two_exclude_delay_js,
                'disabled_delay_all_js_pages'    => $this->two_disabled_delay_all_js_pages,
                'exclude_rev'                    => $this->two_exclude_rev,
                'exclude_slider_by_10web'        => $this->two_exclude_slider_by_10web,
                'cdn_url'                        => "",
                'include_inline'                 => $this->two_include_inline_js,
                'minify_excluded'                => $this->minify_js,
            ),
            'OptimizerStyles'  => array(
                'aggregate'       => $this->aggregate_css,
                'justhead'        => "",
                'datauris'        => "",
                'defer'           => "",
                'defer_inline'    => "",
                'inline'          => "",
                'css_exclude'     => $this->two_exclude_css,
                'cdn_url'         => "",
                'include_inline'  => $this->two_include_inline_css,
                'nogooglefont'    => false,
                'minify_excluded' => $this->minify_css,
                'async_all'       => $this->async_all,
                'disable_async'       => false
            ),
        );

        if ($this->two_enable_use_srcset === 'on') {
            // Skip parsing the html if WP version does not support responsive images.
            if ( !empty( $content ) && (function_exists( 'wp_filter_content_tags' ) || function_exists( 'wp_make_content_images_responsive' )) ) {
                $content = OptimizerImages::add_attachment_id_to_img( $content );
            }
        }

        // Do not replace images with picture if delivery by hosting is enabled.
        if ( $this->two_enable_picture_webp_delivery === 'on' && !TENWEB_SO_HOSTED_ON_10WEB && !$this->two_webp_delivery_working ) {
            $content = OptimizerImages::replace_img_with_picture( $content );
        }

        if ($this->two_bg_lazyload === "on") {
            $content = OptimizerUtils::replace_bg($content);
        }
        if ($this->two_lazyload == "on") {
            $content = apply_filters('twoptimize_html_after_minify', $content);
        }
        if ($this->two_video_lazyload == "on") {
            $content = apply_filters('twoptimize_html_after_minify_video', $content);
        }
        if ($this->two_iframe_lazyload == "on" || $this->two_youtube_vimeo_iframe_lazyload == "on") {
            $content = apply_filters('twoptimize_html_after_minify_iframe', $content);
        }
        $content = apply_filters('twoptimize_html_images', $content);


        if ($this->cacheStructure->check()) {
            $content = $this->cacheStructure->retrieve($content);
        } else if ($this->cacheStructure->getCacheStatus() === 'on') {
            $this->cacheStructure->setCacheHeaderString('MISS');
        }

        if (!$this->cacheStructure->isFromCache()) {
            /*
             * optimize css
             * */
            $twoptimizeStyles = new OptimizerStyles($content, $this->cacheStructure, $this->critical);
            if(isset($this->critical) && isset($this->critical->critical_css) && $this->critical->critical_enabled && $this->critical->status == "success") {
                if ($this->critical->uncritical_load_type !== "not_load") {
                    if ($this->critical->uncritical_load_type === "async") {
                        $classoptions["OptimizerStyles"]["async_all"] = true;
                    } else if ($this->critical->uncritical_load_type === "on_interaction") {
                        $classoptions["OptimizerStyles"]["include_inline"] = true;
                        $classoptions["OptimizerStyles"]["disable_async"] = true;
                    }
                    $twoptimizeStyles->read($classoptions["OptimizerStyles"]);
                    $twoptimizeStyles->optimize();
                    $twoptimizeStyles->cache();
                }
            }else{
                $twoptimizeStyles->read($classoptions["OptimizerStyles"]);
                $twoptimizeStyles->optimize();
                $twoptimizeStyles->cache();
            }
            $content = $twoptimizeStyles->getcontent();

            /*
             * optimize js
             * */
            $twoptimizeScripts = new OptimizerScripts($content, $this->cacheStructure);
            $twoptimizeScripts->read($classoptions["OptimizerScripts"]);
            $twoptimizeScripts->optimize();
            $twoptimizeScripts->cache();
            $content = $twoptimizeScripts->getcontent();


            if(!empty($twoptimizeStyles->two_async_css_arr) || !empty($twoptimizeScripts->two_js_list) || !empty($this->critical_fonts_arr)){
                $two_worker_data_to_inject_css = $this->get_two_worker_data_script_tag(
                    array(
                        'css' => $twoptimizeStyles->two_async_css_arr,
                    ),
                    '_css'
                );
                $two_worker_data_to_inject_js = $this->get_two_worker_data_script_tag(
                    array(
                        'js' => $twoptimizeScripts->two_js_list
                    ),
                    '_js'
                );

                $two_worker_data_to_inject_font = $this->get_two_worker_data_script_tag(
                    array(
                        'font' => $twoptimizeStyles->critical_fonts_arr,
                    ),
                    '_font'
                );
                $two_worker_script = OptimizerUtils::get_worker_script();

                if (!empty($twoptimizeStyles->two_async_css_arr)) {
                    foreach ($twoptimizeStyles->two_async_css_arr as $async_css) {
                        if (!empty($async_css) && isset($async_css['media'], $async_css['url'])) {
                            $two_worker_data_to_inject_css .= '<noscript><link rel="stylesheet" crossorigin="anonymous" class="two_uncritical_css_noscript" media="'.$async_css['media'].'" href="'.stripslashes($async_css['url']).'"></noscript>';
                        }
                    }
                }

                $content = OptimizerUtils::inject_in_html($content, $two_worker_data_to_inject_css, array('<head', 'before'));
                $content = OptimizerUtils::inject_in_html($content, $two_worker_data_to_inject_js, array('<head', 'before'));
                $content = OptimizerUtils::inject_in_html($content, $two_worker_data_to_inject_font, array('<head', 'before'));
                $content = OptimizerUtils::inject_in_html($content, $two_worker_script, array('<body', 'before'));


                $this->cacheStructure->addToTagsToAdd($two_worker_data_to_inject_css, array('<head', 'before'));
                $this->cacheStructure->addToTagsToAdd($two_worker_data_to_inject_js, array('<head', 'before'));
                $this->cacheStructure->addToTagsToAdd($two_worker_data_to_inject_font, array('<head', 'before'));
                $this->cacheStructure->addToTagsToAdd($two_worker_script, array('<body', 'before'));
            }

            //sets cache
            $this->cacheStructure->set();
        }





        if ($this->cacheStructure->isFromCache()) {
            $webFontList = $this->cacheStructure->getWebFontList();
        } else {
            $this->cacheStructure->addToWebFontList($twoptimizeStyles->webFont_list);
            $webFontList = $twoptimizeStyles->webFont_list;
        }
        /*
         * optimize fonts
         */
        if(!empty($webFontList) && is_array($webFontList)){
            $fontOptimize_options = array(
                'webFont_list' => $webFontList
            );
            $fontOptimize = new OptimizerFonts($content);
            $fontOptimize->read($fontOptimize_options);
            $fontOptimize->optimize();
            $content = $fontOptimize->getcontent();

            $this->cacheStructure->addCacheHeaders();
        }


        return $content;
    }

    private function get_two_worker_data_script_tag($data, $suffix = '') {
        return "<script data-pagespeed-no-defer " . OptimizerScripts::TWO_NO_DELAYED_JS_ATTRIBUTE . " " .
            "type=\"text/javascript\" >var two_worker_data".$suffix." = ".json_encode($data)."</script>";
    }

    private function check_cache_dir($dir)
    {
        // Try creating the dir if it doesn't exist.
        if (!file_exists($dir)) {
            if (!mkdir($dir, 0777, true) && !is_dir($dir)) {
                return false;
            }
            if (!file_exists($dir)) {
                return false;
            }
        }
        // If we still cannot write, bail.
        if (!is_writable($dir)) {
            return false;
        }
        // Create an index.html in there to avoid prying eyes!
        $idx_file = rtrim($dir, '/\\') . '/index.html';
        if (!is_file($idx_file)) {
            @file_put_contents($idx_file, '<html><head><meta name="robots" content="noindex, nofollow"></head><body></body></html>');
        }

        return true;
    }

    private function check_and_create_dirs()
    {
        if (!defined('TENWEB_SO_CACHE_CHILD_DIR')) {
            // We didn't set a cache.
            return false;
        }
        foreach (array('', 'js', 'css') as $dir) {
            if (!$this->check_cache_dir(OptimizerCache::get_path() . $dir)) {
                return false;
            }
        }

        return true;
    }

    public function dirsize($dir)
    {
        @$dh = opendir($dir);
        $size = 0;
        if ($dh) {
            while ($file = @readdir($dh)) {
                if ($file != "." and $file != "..") {
                    $path = $dir . "/" . $file;
                    if (is_dir($path)) {
                        $size += $this->dirsize($path); // recursive in sub-folders
                    } else if (is_file($path)) {
                        $size += filesize($path); // add file
                    }
                }
            }
            @closedir($dh);
        }
        return $size;
    }

    private function clear_cache()
    {
        $dir = OptimizerCache::get_path();
        $delete_cache_db = OptimizerUtils::delete_all_cache_db();
        $delete_cache_file = OptimizerUtils::delete_all_cache_file($dir, [$dir, $dir . '/css', $dir . '/js']);
        do_action('tenweb_purge_all_caches');

        return $delete_cache_file && $delete_cache_db;
    }

    private function set_modes($post_id){
        $post_mode = get_post_meta($post_id, "two_mode", true);
        if(isset($_GET["two_mode"]) && !empty($_GET["two_mode"])){
            $mode_name = sanitize_text_field( $_GET["two_mode"] );
            $mode = OptimizerUtils::get_modes($mode_name);
        }else{
            $mode = $post_mode;
        }
        if(is_array($mode) && isset($mode["mode"])){
            foreach ($mode as $key=>$val){
                $val = ($val === "1" || $val===true);
                if($key == "critical_enabled"){
                    $this->critical->critical_enabled = $val;
                }elseif (isset($this->$key)){
                    $this->$key = $val;
                }
            }
        }
    }
}