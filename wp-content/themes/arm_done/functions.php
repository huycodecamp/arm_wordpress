<?php
function custom_field_meta_box()
{
    add_meta_box(
        'custom_field_meta_box_id',         // ID của meta box
        'Trường tùy chỉnh',                // Tiêu đề của meta box
        'custom_field_meta_box_callback',  // Callback để hiển thị nội dung meta box
        'post'                             // Loại bài viết bạn muốn hiển thị meta box. Ở đây là 'post'.
    );
}

function custom_field_meta_box_callback($post)
{
    $gia_san_pham = get_post_meta($post->ID, '_gia_san_pham', true);
    echo '<label for="gia_san_pham">Giá sản phẩm:</label>';
    echo '<input type="text" id="gia_san_pham" name="gia_san_pham" value="' . esc_attr($gia_san_pham) . '"/>';
}

add_action('add_meta_boxes', 'custom_field_meta_box');


function save_custom_field_meta_box_data($post_id)
{
    if (array_key_exists('gia_san_pham', $_POST)) {
        update_post_meta(
            $post_id,
            '_gia_san_pham',
            sanitize_text_field($_POST['gia_san_pham'])
        );
    }
}

add_action('save_post', 'save_custom_field_meta_box_data');



function custom_category_posts_shortcode_1($atts)
{
    // Mặc định các tham số
    $atts = shortcode_atts(array(
        'category' => '', // Tên của danh mục
        'posts_per_page' => 3, // Số lượng bài viết muốn hiển thị (-1 để hiển thị tất cả)
        'css_class' => 'block2 first'
    ), $atts);

    // Lấy danh sách các bài viết trong danh mục
    $category_posts = get_posts(array(
        'category_name' => $atts['category'],
        'posts_per_page' => $atts['posts_per_page'],
        'css_class' => $atts['css_class'],
    ));

    // Tạo biến để lưu nội dung của shortcode
    $category = get_term_by('slug', $atts['category'], 'category');
    $category_string =  get_site_url() . '?cat=' . $category->term_id;


    $term = get_term($category->term_id, 'category');

    $output = '
    <div class="block2 first"> 
    <div class="header-block2">
        <div class="title">
            <div class="wall">' . $term->name . '</div>
        </div>
        <a href="' . $category_string . '">
            <button class="btn btn-secondary no_cursor">Xem tất cả</button>
        </a>
    
    </div>
    <div class="wrapper-card">
        <div class="row mx-0">
    ';

    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);

            $feature_image = get_featured_image_guid($post->ID);

            $post_date = get_the_time('d/m/Y', $post); // Lấy thời gian của bài viết
            $full_content = get_the_content();
            $image_source = $feature_image ? $feature_image : get_template_directory_uri() . '/assets/img/default-image.jpg';
            $output .= '
                            <div class="item-card col-lg-4 col-md-12 px-3">
                                <div class="bg-white">
                                <a href="' . get_permalink($post->ID) . '">
                                
                                <img style="object-fit: cover;" class="avt" src="' . $image_source . '" />

                                </a>
                                    <div class="content px-3">
                                        <a href = "' . $category_string . '"><div class="new">' . $term->name . '</div></a>
                                        <a href="' . get_permalink($post->ID) . '"> 
                                        <div class="description">
                                        ' . substr($post->post_title, 0, 100) . (strlen($post->post_title) > 100) . '
                                        <div class="date">' . $post_date . '</div>
                                        </div> </a>
                                        <div class="description-two">' . custom_excerpt($full_content, 200) . '</div>
                                        <div class="continue">
                                            <a href="' . get_permalink($post->ID) . '">Xem thêm </a>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
        }
        wp_reset_postdata(); // Đặt lại dữ liệu bài viết
    } else {
        $output = 'Không có bài viết trong danh mục ' . $atts['category'];
    }

    $output .= '
    </div>
    <div class="space_white"></div>
                        </div>
                    </div>
                </div>
    ';

    // Hiển thị danh sách bài viết


    return $output;
}
add_shortcode('category_posts_v1', 'custom_category_posts_shortcode_1');



function custom_category_posts_shortcode_2($atts)
{
    // Mặc định các tham số
    $atts = shortcode_atts(array(
        'category' => '', // Tên của danh mục
        'posts_per_page' => 3, // Số lượng bài viết muốn hiển thị (-1 để hiển thị tất cả)
        'css_class' => 'block2 first'
    ), $atts);


    // Lấy danh sách các bài viết trong danh mục
    $category_posts = get_posts(array(
        'category_name' => $atts['category'],
        'posts_per_page' => $atts['posts_per_page'],
        'css_class' => $atts['css_class'],
    ));
    $category = get_term_by('slug', $atts['category'], 'category');
    $category_string =  get_site_url() . '?cat=' . $category->term_id;
    $term = get_term($category->term_id, 'category');
    // Tạo biến để lưu nội dung của shortcode
    $output = '
    <div class="block3">
    <div class="block2 khac-mau">
        <div class="header-block2">
            <div class="title">
                <div class="wall">' . $term->name . '</div>
            </div>
            <a href="' . $category_string . '">
                <button class="btn btn-secondary no_cursor">Xem tất cả</button>
            </a>
            
        </div>
    <div class="wrapper-card">
    <div class="row mx-0">
    ';
    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);
            $feature_image = get_featured_image_guid($post->ID);

            $post_date = get_the_time('d/m/Y', $post); // Lấy thời gian của bài viết
            $full_content = get_the_content();
            $image_source = $feature_image ? $feature_image : get_template_directory_uri() . '/assets/img/default-image.jpg';
            $output .= '
            <div class="item-card col-lg-4 col-md-12 px-3">
                    <div class="bg-white">
                        <a href="' . get_permalink($post->ID) . '">
                        <img style="object-fit: cover;" class="avt" src="' . $image_source . '" />
                        </a>

                        <div class="content px-3">
                            <a href = "' . $category_string . '"><div class="new">' . $term->name . '</div></a>
                            <a href="' . get_permalink($post->ID) . '"> 
                            <div class="description">
                            ' . substr($post->post_title, 0, 100) . (strlen($post->post_title) > 100) . '
                            <div class="date">' . $post_date . '</div>
                            </div> </a>

                            <a href="' . get_permalink($post->ID) . '"> 
                            <div class="description-two">
                                ' . custom_excerpt($full_content, 200) . '
                            </div>
                            </a>

                            <div class="continue">
                                <a href="' . get_permalink($post->ID) . '"> Xem thêm </a>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            
            ';
        }
        wp_reset_postdata(); // Đặt lại dữ liệu bài viết
    } else {
        $output = 'Không có bài viết trong danh mục ' . $atts['category'];
    }
    $output .= '    
    </div>
    <div class="space_white"></div>
</div>
</div>
</div>
    ';

    // Hiển thị danh sách bài viết


    return $output;
}
add_shortcode('category_posts_v2', 'custom_category_posts_shortcode_2');


function custom_category_posts_shortcode_3($atts)
{
    // Mặc định các tham số
    $atts = shortcode_atts(array(
        'category' => '', // Tên của danh mục
        'posts_per_page' => 6, // Số lượng bài viết muốn hiển thị (-1 để hiển thị tất cả)
        'css_class' => 'block2 first'
    ), $atts);

    // Lấy danh sách các bài viết trong danh mục
    $category_posts = get_posts(array(
        'category_name' => $atts['category'],
        'posts_per_page' => $atts['posts_per_page'],
        'css_class' => $atts['css_class'],
    ));
    $category = get_term_by('slug', $atts['category'], 'category');
    $category_string =  get_site_url() . '?cat=' . $category->term_id;
    $term = get_term($category->term_id, 'category');


    // Tạo biến để lưu nội dung của shortcode
    $output = '<section class="section block-vincers block2" >
    <div class="block-heading border-light">
        <div class="row" style="padding-top: 8px">
            <div class="col-lg-7">
                <h2 class="the-title text-white border-light wow fadeInLeft" style="font-family:sans-serif;">' . $term->name . '</h2>
            </div>
            <div class="col-lg-5 text-right"><a class="btn btn-primary text-white wow fadeInRight"
                    href="' . $category_string . '">XEM TẤT CẢ</a></div>
        </div>
    </div>
    <div class="vincers-slider carousel"
        data-slick=\'{"arrows":true,"dots":true,"slidesToShow":1,"slidesToScroll":1,"infinite":false,"responsive":[{"breakpoint":480,"settings":{"arrows":false}}]}\'>';

    if (!empty($category_posts)) {
        foreach ($category_posts as $post) {
            setup_postdata($post);
            $feature_image = get_featured_image_guid($post->ID);
            $post_date = get_the_time('d/m/Y', $post); // Lấy thời gian của bài viết
            $full_content = get_the_content();
            $image_source = $feature_image ? $feature_image : get_template_directory_uri() . '/assets/img/default-image.jpg';

            $output .= '
            
            <div class="slider-item slider_top">
					<div class="row">
						<div class="col-md-5"><a
								href="' . get_permalink($post->ID) . '">
                                    <img width="100%"
									 class="img-fluid"
									src="' . $image_source . '"
									data-lazy-src="' . $image_source . '"><noscript><img
										 class="img-fluid"
										src="' . $image_source . '"></noscript></a>
						</div>
						<div class="col-md-6 col-xl-7 vincer-summary wow fadeInDown">
							<div class="the-title hero-title text-white h2" style="font-family:sans-serif">' . $post->post_title . '</div>
							<div class="summary-block" style="font-family:sans-serif">' . custom_excerpt($full_content, 1000) . '</div>
							
							<p><a class="read-more text-white"
									href="' . get_permalink($post->ID) . '" style="font-family:sans-serif;">XEM
									TIẾP <i class="fa-solid fa-arrow-right"></i></a></p>
						</div>
					</div>
				</div>
            
            ';
        }
        wp_reset_postdata(); // Đặt lại dữ liệu bài viết
    } else {
        $output = 'Không có bài viết trong danh mục ' . $atts['category'];
    }


    $output .= '
    </div>
</section>';

    // Hiển thị danh sách bài viết


    return $output;
}
add_shortcode('category_posts_v3', 'custom_category_posts_shortcode_3');



add_theme_support('post-thumbnails');
function get_featured_image_guid($post_id)
{
    global $wpdb;

    // Tên bảng trong cơ sở dữ liệu WordPress
    $postmeta_table = $wpdb->prefix . 'postmeta';
    $posts_table = $wpdb->prefix . 'posts';

    // Truy vấn SQL để lấy GUID của hình ảnh đặc trưng
    $query = $wpdb->prepare("
        SELECT p2.guid
        FROM $postmeta_table AS pm
        INNER JOIN $posts_table AS p1 ON pm.post_id = p1.ID
        LEFT JOIN $posts_table AS p2 ON pm.meta_value = p2.ID
        WHERE p1.ID = %d
        AND pm.meta_key = '_thumbnail_id'
    ", $post_id);

    $featured_image_guid = $wpdb->get_var($query);

    return $featured_image_guid;
}
// function custom_category_template($template) {
//     if (is_category()) {
//         $template = get_template_directory() . '/custom-category-template.php';
//     }
//     return $template;
// }
// add_filter('template_include', 'custom_category_template');


function custom_excerpt($content, $length = 50, $more = '...')
{
    // Loại bỏ các thẻ HTML
    $no_tags = strip_tags($content);

    // Cắt nội dung
    if (mb_strlen($no_tags) > $length) {
        $excerpt = mb_substr($no_tags, 0, $length) . $more;
    } else {
        $excerpt = $no_tags;
    }

    return $excerpt;
}

function register_my_menu()
{
    register_nav_menus(
        array(
            'Home' => __('Home'), // 'header-menu' là vị trí menu trong theme
            // bạn có thể đăng ký thêm vị trí menu ở đây
        )
    );
}
add_action('init', 'register_my_menu');






// Xử lý yêu cầu tìm kiếm AJAX
add_action('wp_ajax_search_posts', 'search_posts_callback');
add_action('wp_ajax_nopriv_search_posts', 'search_posts_callback');
function search_posts_callback()
{
    $keyword = sanitize_text_field($_GET['keyword']);

    $args = array(
        's' => $keyword,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 5, // Giới hạn số bài viết hiển thị là 5
        'orderby' => 'relevance',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();
            // Hiển thị kết quả gợi ý (ví dụ: tiêu đề bài viết)
            $title = get_the_title();

            // Hạn chế tiêu đề chỉ hiển thị 30 ký tự và thêm "..." nếu cần
            $shortened_title = strlen($title) > 30 ? substr($title, 0, 90) . '...' : $title;
            echo '
            <ul class="">
                <li class="" style="background-color:#2628298f ;width:320px; border-radius: 5px 5px 0px 0px">
                    <a href="' . get_permalink() . '">' . $shortened_title . '</a><br> 
                </li>
            </ul>
            ';
        }
    } else {
        echo 'Không tìm thấy kết quả.';
    }

    wp_die();
}
