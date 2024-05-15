<?php
$wp_customize->add_section(
    'pagination_options' ,
    array(
        'title' => __( 'Pagination Options', 'manaslu' ),
        'panel' => 'manaslu_option_panel',
    )
);

/* Pagination Type*/
$wp_customize->add_setting(
    'manaslu_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'manaslu' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => __( 'Default (Older / Newer Post)', 'manaslu' ),
            'numeric' => __( 'Numeric', 'manaslu' ),
            'ajax_load_on_click' => __( 'Load more post on click', 'manaslu' ),
            'ajax_load_on_scroll' => __( 'Load more posts on scroll', 'manaslu' ),
        ),
    )
);
