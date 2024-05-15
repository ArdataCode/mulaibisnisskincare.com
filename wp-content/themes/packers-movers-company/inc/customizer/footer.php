<?php
/**
* Footer Settings.
*
* @package Packers Movers Company
*/

$packers_movers_company_default = packers_movers_company_get_default_theme_options();

$wp_customize->add_section( 'packers_movers_company_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'packers-movers-company' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'packers_movers_company_theme_option_panel',
	)
);

$wp_customize->add_setting( 'footer_column_layout',
	array(
	'default'           => $packers_movers_company_default['footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'packers_movers_company_sanitize_select',
	)
);
$wp_customize->add_control( 'footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'packers-movers-company' ),
	'section'     => 'packers_movers_company_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'packers-movers-company' ),
		'2' => esc_html__( 'Two Column', 'packers-movers-company' ),
		'3' => esc_html__( 'Three Column', 'packers-movers-company' ),
	    ),
	)
);

$wp_customize->add_setting( 'packers_movers_company_footer_copyright_text',
	array(
	'default'           => $packers_movers_company_default['packers_movers_company_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'packers_movers_company_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'packers-movers-company' ),
	'section'  => 'packers_movers_company_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting( 'packers_movers_company_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'packers_movers_company_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'packers-movers-company'),
    'description' => __('It will change the complete footer widget background color.', 'packers-movers-company'),
    'section' => 'packers_movers_company_footer_widget_area',
    'settings' => 'packers_movers_company_footer_widget_background_color',
)));

$wp_customize->add_setting('packers_movers_company_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'packers_movers_company_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','packers-movers-company'),
    'section' => 'packers_movers_company_footer_widget_area'
)));