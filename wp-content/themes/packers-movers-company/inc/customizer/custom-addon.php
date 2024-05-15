<?php
/**
* Custom Addons.
*
* @package Packers Movers Company
*/

$wp_customize->add_section( 'packers_movers_company_packers_movers_company_theme_pagination_options',
    array(
    'title'      => esc_html__( 'Customizer Custom Settings', 'packers-movers-company' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'packers_movers_company_theme_addons_panel',
    )
);

$wp_customize->add_setting( 'packers_movers_company_packers_movers_company_packers_movers_company_theme_pagination_options_alignment',
    array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'packers_movers_company_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'packers_movers_company_packers_movers_company_packers_movers_company_theme_pagination_options_alignment',
    array(
    'label'       => esc_html__( 'Pagination Alignment', 'packers-movers-company' ),
    'section'     => 'packers_movers_company_packers_movers_company_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'packers-movers-company' ),
        'Right' => esc_html__( 'Right', 'packers-movers-company' ),
        'Left'  => esc_html__( 'Left', 'packers-movers-company' ),
        ),
    )
);

$wp_customize->add_setting( 'packers_movers_company_theme_breadcrumb_options_alignment',
    array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'packers_movers_company_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'packers_movers_company_theme_breadcrumb_options_alignment',
    array(
    'label'       => esc_html__( 'Breadcrumb Alignment', 'packers-movers-company' ),
    'section'     => 'packers_movers_company_packers_movers_company_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'packers-movers-company' ),
        'Right' => esc_html__( 'Right', 'packers-movers-company' ),
        'Left'  => esc_html__( 'Left', 'packers-movers-company' ),
        ),
    )
);