<?php
/**
 * Added Omega Page. */

/**
 * Add a new page under Appearance
 */
function packers_movers_company_menu()
{
	add_theme_page(__('Omega Options', 'packers-movers-company'), __('Omega Options', 'packers-movers-company'), 'edit_theme_options', 'packers-movers-company-theme', 'packers_movers_company_page');
}
add_action('admin_menu', 'packers_movers_company_menu');

function packers_movers_company_notice() {
    global $pagenow;
    if (is_admin() && ('themes.php' == $pagenow) && isset($_GET['activated'])) {
        ?>
        <div class="notice notice-success is-dismissible">
            <div class="notice-content">
                <h2><?php esc_html_e('Thank You for installing Packers Movers Company Theme!', 'packers-movers-company') ?> </h2>
                <div class="info-link">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=packers-movers-company-theme' ) ); ?>"><?php esc_html_e('Omega Options', 'packers-movers-company'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(PACKERS_MOVERS_COMPANY_LITE_DOCS_PRO); ?>" target="_blank"> <?php esc_html_e('Documentation', 'packers-movers-company'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(PACKERS_MOVERS_COMPANY_BUY_NOW); ?>" target="_blank"> <?php esc_html_e('Upgrade to Pro', 'packers-movers-company'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(PACKERS_MOVERS_COMPANY_DEMO_PRO); ?>" target="_blank"> <?php esc_html_e('Premium Demo', 'packers-movers-company'); ?></a>
                </div>
            </div>
        </div>
    <?php }
}
add_action('admin_notices', 'packers_movers_company_notice');

/**
 * Enqueue styles for the help page.
 */
function packers_movers_company_admin_scripts($hook)
{
	wp_enqueue_style('packers-movers-company-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css', array(), '');
}
add_action('admin_enqueue_scripts', 'packers_movers_company_admin_scripts');

/**
 * Add the theme page
 */
function packers_movers_company_page(){
$packers_movers_company_user = wp_get_current_user();
$packers_movers_company_theme = wp_get_theme();
?>
<div class="das-wrap">
  <div class="packers-movers-company-panel header">
    <div class="packers-movers-company-logo">
      <span></span>
      <h2><?php echo esc_html( $packers_movers_company_theme ); ?></h2>
    </div>
    <p>
      <?php
        $packers_movers_company_theme = wp_get_theme();
        echo wp_kses_post( apply_filters( 'omega_theme_description', esc_html( $packers_movers_company_theme->get( 'Description' ) ) ) );
      ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Edit With Customizer - Click Here', 'packers-movers-company'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="packers-movers-company-panel">
        <div class="packers-movers-company-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you are facing any issue with our theme, submit a support ticket here.', 'packers-movers-company'); ?></h3>
          </div>
          <a href="<?php echo esc_url( PACKERS_MOVERS_COMPANY_SUPPORT_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Theme Support.', 'packers-movers-company'); ?></a>
        </div>
      </div>
      <div class="packers-movers-company-panel">
        <div class="packers-movers-company-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Please write a review if you appreciate the theme.', 'packers-movers-company'); ?></h3>
          </div>
          <a href="<?php echo esc_url( PACKERS_MOVERS_COMPANY_REVIEW_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rank this topic.', 'packers-movers-company'); ?></a>
        </div>
      </div>
       <div class="packers-movers-company-panel">
        <div class="packers-movers-company-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our lite theme documentation to set up our lite theme as seen in the screenshot.', 'packers-movers-company'); ?></h3>
          </div>
          <a href="<?php echo esc_url( PACKERS_MOVERS_COMPANY_LITE_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Documentation.', 'packers-movers-company'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <h4>
          <strong>
            <?php esc_html_e('Premium Features Include:', 'packers-movers-company'); ?>
          </strong>
        </h4>
        <ul>
          <li>
            <?php esc_html_e('One Click Demo Content Importer', 'packers-movers-company'); ?>
          </li>
          <li>
            <?php esc_html_e('Woocommerce Plugin Compatibility', 'packers-movers-company'); ?>
          </li>
          <li>
            <?php esc_html_e('Multiple Section for the templates', 'packers-movers-company'); ?>            
          </li>
          <li>
            <?php esc_html_e('For a better user experience, make the top of your menu sticky.', 'packers-movers-company'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="<?php echo esc_url( PACKERS_MOVERS_COMPANY_BUY_NOW ); ?>" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $40', 'packers-movers-company'); ?></a>
        </div>
      </div>
      <div class="packers-movers-company-panel">
        <div class="packers-movers-company-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Kindly view the premium themes live demo.', 'packers-movers-company'); ?></h3>
          </div>
          <a class="btn btn-primary demo" href="<?php echo esc_url( PACKERS_MOVERS_COMPANY_DEMO_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Live Demo.', 'packers-movers-company'); ?></a>
        </div>
         <div class="packers-movers-company-panel-content pro-doc">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our pro theme documentation to set up our premium theme as seen in the screenshot.', 'packers-movers-company'); ?></h3>
          </div>
          <a href="<?php echo esc_url( PACKERS_MOVERS_COMPANY_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Pro Documentation.', 'packers-movers-company'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}