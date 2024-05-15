<?php
/**
 * Packers Movers Company functions and definitions
 * @package Packers Movers Company
 */

if ( ! function_exists( 'packers_movers_company_after_theme_support' ) ) :

	function packers_movers_company_after_theme_support() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'packers_movers_company_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

		add_editor_style('/lib/custom/css/editor-style.css');
	}

endif;

add_action( 'after_setup_theme', 'packers_movers_company_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function packers_movers_company_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $packers_movers_company_theme_version = wp_get_theme()->get( 'Version' );
	$packers_movers_company_fonts_url = packers_movers_company_fonts_url();
    if( $packers_movers_company_fonts_url ){
    	require get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'packers-movers-company-google-fonts',
			wptt_get_webfont_url( $packers_movers_company_fonts_url ),
			array(),
			$packers_movers_company_theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
	wp_enqueue_style( 'packers-movers-company-style', get_stylesheet_uri(), array(), $packers_movers_company_theme_version );
	wp_enqueue_style( 'packers-movers-company-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'packers-movers-company-style',$packers_movers_company_custom_css );

	$packers_movers_company_css = '';

	if ( get_header_image() ) :

		$packers_movers_company_css .=  '
			.header-navbar{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'packers-movers-company-style', $packers_movers_company_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'packers-movers-company-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);

    // Global Query
    if( is_front_page() ){

    	$posts_per_page = absint( get_option('posts_per_page') );
        $c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $posts_args = array(
            'posts_per_page'        => $posts_per_page,
            'paged'                 => $c_paged,
        );
        $posts_qry = new WP_Query( $posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $packers_movers_company_default = packers_movers_company_get_default_theme_options();
    $packers_movers_company_pagination_layout = get_theme_mod( 'packers_movers_company_pagination_layout',$packers_movers_company_default['packers_movers_company_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'packers_movers_company_register_styles',200 );

function packers_movers_company_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('packers-movers-company-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'packers_movers_company_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function packers_movers_company_menus() {

	$locations = array(
		'packers-movers-company-primary-menu'  => esc_html__( 'Primary Menu', 'packers-movers-company' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'packers_movers_company_menus' );

add_filter('loop_shop_columns', 'packers_movers_company_loop_columns');
if (!function_exists('packers_movers_company_loop_columns')) {
	function packers_movers_company_loop_columns() {
		$columns = get_theme_mod( 'packers_movers_company_per_columns', 3 );
		return $columns;
	}
}

add_filter( 'loop_shop_per_page', 'packers_movers_company_per_page', 20 );
function packers_movers_company_per_page( $cols ) {
  	$cols = get_theme_mod( 'packers_movers_company_product_per_page', 9 );
	return $cols;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';

/**
 * For Admin Page
 */
if (is_admin()) {
	require get_template_directory() . '/inc/get-started/get-started.php';
}

if (! defined( 'PACKERS_MOVERS_COMPANY_DOCS_PRO' ) ){
define('PACKERS_MOVERS_COMPANY_DOCS_PRO',__('https://www.omegathemes.com/steps/packers-movers-company/','packers-movers-company'));
}
if (! defined( 'PACKERS_MOVERS_COMPANY_BUY_NOW' ) ){
define('PACKERS_MOVERS_COMPANY_BUY_NOW',__('https://www.omegathemes.com/wordpress/moving-company-wordpress-theme/','packers-movers-company'));
}
if (! defined( 'PACKERS_MOVERS_COMPANY_SUPPORT_FREE' ) ){
define('PACKERS_MOVERS_COMPANY_SUPPORT_FREE',__('https://wordpress.org/support/theme/packers-movers-company','packers-movers-company'));
}
if (! defined( 'PACKERS_MOVERS_COMPANY_REVIEW_FREE' ) ){
define('PACKERS_MOVERS_COMPANY_REVIEW_FREE',__('https://wordpress.org/support/theme/packers-movers-company/reviews/#new-post','packers-movers-company'));
}
if (! defined( 'PACKERS_MOVERS_COMPANY_DEMO_PRO' ) ){
define('PACKERS_MOVERS_COMPANY_DEMO_PRO',__('https://www.omegathemes.com/preview/packers-movers-company/','packers-movers-company'));
}
if (! defined( 'PACKERS_MOVERS_COMPANY_LITE_DOCS_PRO' ) ){
define('PACKERS_MOVERS_COMPANY_LITE_DOCS_PRO',__('https://www.omegathemes.com/steps/packers-movers-company/','packers-movers-company'));
}

function packers_movers_company_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'packers_movers_company_remove_customize_register', 11 );

// Apply styles based on customizer settings

function packers_movers_company_customizer_css() {
    ?>
    <style type="text/css">
        <?php
        $packers_movers_company_footer_widget_background_color = get_theme_mod('packers_movers_company_footer_widget_background_color');
        if ($packers_movers_company_footer_widget_background_color) {
            echo '.footer-widgetarea { background-color: ' . esc_attr($packers_movers_company_footer_widget_background_color) . '; }';
        }

        $packers_movers_company_footer_widget_background_image = get_theme_mod('packers_movers_company_footer_widget_background_image');
        if ($packers_movers_company_footer_widget_background_image) {
            echo '.footer-widgetarea { background-image: url(' . esc_url($packers_movers_company_footer_widget_background_image) . '); }';
        }
        ?>
    </style>
    <?php
}
add_action('wp_head', 'packers_movers_company_customizer_css');
