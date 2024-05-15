<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function manaslu_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    $classes[] = ' manaslu-header_style_1';
    // Get the color mode of the site.
    $enable_dark_mode = manaslu_get_option( 'enable_dark_mode' );
    $enable_logo_transparent_bg = manaslu_get_option( 'enable_logo_transparent_bg' );
    if ( $enable_logo_transparent_bg ) {
        $classes[] = 'manaslu-transparent-logo';
    } 
    if ( $enable_dark_mode ) {
        $classes[] = 'manaslu-dark-mode';
    } else {
        $classes[] = 'manaslu-light-mode';
    }

	// Get appropriate class for the sidebar layout to work
    if ( is_single() || is_search() || is_page() ) {
    	$page_layout = manaslu_get_page_layout();
        if('no-sidebar' != $page_layout ){
            $classes[] = 'has-sidebar '.esc_attr($page_layout);
        }else{
            $classes[] = esc_attr($page_layout);
        }
    }

	return $classes;
}
add_filter( 'body_class', 'manaslu_body_classes' );
