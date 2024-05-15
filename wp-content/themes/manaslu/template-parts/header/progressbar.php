<?php
/**
 * Displays progressbar
 *
 * @package Manaslu
 */

$show_progressbar = manaslu_get_option( 'show_progressbar' );

if ( $show_progressbar ) :
	$progressbar_position = manaslu_get_option( 'progressbar_position' );
	echo '<div id="manaslu-progress-bar" class="theme-progress-bar ' . esc_attr( $progressbar_position ) . '"></div>';
endif;
