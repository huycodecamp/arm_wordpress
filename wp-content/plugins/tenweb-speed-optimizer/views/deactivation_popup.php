<?php
$two_domain_id = get_site_option('tenweb_domain_id');
$two_contact_link = trim(TENWEB_DASHBOARD, '/' ) . '/websites/'. $two_domain_id . '/booster/frontend' . '?from_plugin=' . \TenWebOptimizer\OptimizerUtils::FROM_PLUGIN . '&open=livechat';
define( 'TENWEB_SO_DEACTIVATE_URL', add_query_arg(
  array(
    'action'   => 'deactivate',
    'plugin'   => TENWEB_SO_BASENAME,
    '_wpnonce' => wp_create_nonce('deactivate-plugin_' . TENWEB_SO_BASENAME
    )
  ),
  admin_url('plugins.php')
) );
define( 'TENWEB_SO_DISCONNECT_DEACTIVATE_URL', add_query_arg(
  array(
    'action'   => 'deactivate',
    'plugin'   => TENWEB_SO_BASENAME,
    'disconnect'   => 1,
    '_wpnonce' => wp_create_nonce('deactivate-plugin_' . TENWEB_SO_BASENAME
    )
  ),
  admin_url('plugins.php')
) );
?>
<style>
  .two-button {
    border-radius: 25px;
    padding: 10px 24px;
    text-align: center;
    text-decoration: none;
    width: 260px;
    font-size: 14px;
    line-height: 20px;
    font-weight: 600;
    text-transform: uppercase;
    color: #FFFFFF;
    display: inline-block;
    box-sizing: border-box;
    margin: 0 10px;
  }
  .two-deactivate-popup * {
    box-sizing: border-box;
    font-family: "Open Sans", sans-serif;
  }
  .two-deactivate-popup {
    position: fixed;
    top: 0; right: 0; bottom: 0; left: 0;
    background-color: #323A4534;
    display: none;
    flex-direction: column;
    justify-content: center;
    z-index: 9999;
    color: #323A45;
    font-family: "Open Sans", sans-serif;
  }
  .two-deactivate-popup.open {
    display: flex;
  }
  .two-deactivate-popup-body {
    width: 700px;
    height: 516px;
    margin: 0 auto;
    background-color: #FFFFFF;
    border-radius: 13px;
    display: flex;
    flex-direction: column;
    align-self: center;
    padding: 35px 50px;
    font-size: 16px;
    line-height: 24px;
    justify-content: space-between;
    position: relative;
  }
  .two-deactivate-popup-content {
    max-width: 570px;
    flex-grow: 1;
    margin: 10px 0 0 0;
  }
  .two-deactivate-popup-content>p {
    font-size: 16px;
    line-height: 24px;
    margin: 0;
  }
  .two-deactivate-popup-title {
    font-size: 24px;
    line-height: 34px;
    font-weight: 800;
  }
  .two-deactivate-popup-list {
    margin: 30px 0;
  }
  .two-deactivate-popup-list label {
    font-size: 16px;
    line-height: 22px;
    font-weight: 600;
  }
  .two-deactivate-popup-list p {
    font-family: inherit;
    font-size: 16px;
    line-height: 22px;
    margin: 0 24px 30px 24px;
  }
  .two-button-cancel, .two-button-cancel:hover {
    background-color: #E6E7E8;
    color: #323A45;
    width: 180px;
  }
  .two-button-disconnect {
    background-color: #FD3C31;
    color: #FFFFFF;
  }
  .two-button-disconnect:hover {
    background-color: #FD3C31CC;
    color: #FFFFFF;
  }
  .two-deactivate-popup-button-container {
    display: flex;
    flex-direction: row;
    justify-content: end;
  }
  .two-close-img {
    position: absolute;
    top: 15px;
    right: 15px;
    cursor: pointer;
  }
  @media screen and (max-width: 767px){
    .two-deactivate-popup-body {
      width: 100%;
      height: auto;
      top: 35px;
      border-radius: 0;
      padding: 35px 20px;
    }
    .two-deactivate-popup-list p {
      margin-left: 35px;
    }
    .two-button-cancel {
      display: none;
    }
  }
</style>
<script>
  jQuery(document).ready(function() {
    jQuery('#deactivate-tenweb-speed-optimizer').on('click', function() {
      jQuery('.two-deactivate-popup').appendTo('body').addClass('open');
      return false;
    });
    jQuery('.two-button-cancel, .two-close-img').on('click', function() {
      jQuery('.two-deactivate-popup').removeClass('open');
      return false;
    });
    jQuery('input[name=two-deactivation-type]').on('click', function() {
      if ( jQuery(this).val() == 'deactivate' ) {
        jQuery('.two-button-disconnect').text('<?php _e('DEACTIVATE', 'tenweb-speed-optimizer'); ?>').attr('href', '<?php echo TENWEB_SO_DEACTIVATE_URL; ?>');
      }
      else {
        jQuery('.two-button-disconnect').text('<?php _e('DISCONNECT & DEACTIVATE', 'tenweb-speed-optimizer'); ?>').attr('href', '<?php echo TENWEB_SO_DISCONNECT_DEACTIVATE_URL; ?>');
      }
    });
  });
</script>
<div class="two-deactivate-popup">
  <div class="two-deactivate-popup-body">
    <div class="two-deactivate-popup-title">
      <?php _e('Deactivate 10Web Booster', 'tenweb-speed-optimizer'); ?>
    </div>
    <div class="two-deactivate-popup-content">
      <p>
        <?php echo sprintf( __( 'If you’re experiencing issues with your optimized website, we suggest you %s so we can personally assist you before deactivating 10Web Booster.', 'tenweb-speed-optimizer' ), '<a href="' . esc_url( $two_contact_link ) . '" target="_blank">' . __( 'contact our team via live chat', 'tenweb-speed-optimizer' ) . '</a>' );; ?>
      </p>
      <div class="two-deactivate-popup-list">
        <label>
          <input type="radio" name="two-deactivation-type" checked value="disconnect-deactivate" />
          <?php _e('Disconnect and deactivate', 'tenweb-speed-optimizer'); ?>
        </label>
        <p>
          <?php _e('If you no longer wish to optimize your website with 10Web Booster you can disconnect your site and deactivate the plugin. This action will reverse all optimization activities and restore your original score.', 'tenweb-speed-optimizer'); ?>
        </p>
        <label>
          <input type="radio" name="two-deactivation-type" value="deactivate" />
          <?php _e('Deactivate', 'tenweb-speed-optimizer'); ?>
        </label>
        <p>
          <?php _e('Deactivating 10Web Booster will reverse all optimization activities. Choose this option if you want to deactivate 10Web Booster temporarily. This way, your website will remain connected to 10Web Booster and you can reactivate it at any moment.', 'tenweb-speed-optimizer'); ?>
        </p>
      </div>
    </div>
    <div class="two-deactivate-popup-button-container">
      <a href="#" class="two-button two-deactivate-popup-button two-button-cancel"><?php _e('CANCEL', 'tenweb-speed-optimizer'); ?></a>
      <a href="<?php echo TENWEB_SO_DISCONNECT_DEACTIVATE_URL; ?>" class="two-button two-button-disconnect"><?php _e('DISCONNECT & DEACTIVATE', 'tenweb-speed-optimizer'); ?></a>
    </div>
    <img src="<?php echo TENWEB_SO_URL; ?>/assets/images/close.svg" alt="Close" class="two-close-img" />
  </div>
</div>
<?php
