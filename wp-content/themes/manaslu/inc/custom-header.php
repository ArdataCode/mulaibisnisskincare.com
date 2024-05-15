<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Manaslu
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses manaslu_header_style()
 */
function manaslu_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'manaslu_custom_header_args',
			array(
				'default-text-color' => 'ffffff',
	            'width' => 1920,
	            'height' => 520,
	            'flex-height' => true,
	            'flex-width' => true,
	            'default-image'         => esc_url( get_stylesheet_directory_uri() . '/assets/images/banner-image.jpg'),
				'wp-head-callback'   => 'manaslu_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'manaslu_custom_header_setup' );

if ( ! function_exists( 'manaslu_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see manaslu_custom_header_setup().
	 */
	function manaslu_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a:not(:hover, :focus),
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
