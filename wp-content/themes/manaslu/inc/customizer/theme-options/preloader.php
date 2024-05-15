<?php
/*Preloader Options*/
$wp_customize->add_section(
    'preloader_options' ,
    array(
        'title' => __( 'Preloader Options', 'manaslu' ),
        'panel' => 'manaslu_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'manaslu_options[show_preloader]',
    array(
        'default'           => $default_options['show_preloader'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[show_preloader]',
    array(
        'label'    => __( 'Show Preloader', 'manaslu' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'manaslu_options[preloader_style]',
    array(
        'default'           => $default_options['preloader_style'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[preloader_style]',
    array(
        'label'       => __( 'Preloader Style', 'manaslu' ),
        'section'     => 'preloader_options',
        'type'        => 'select',
        'choices'     => array(
            'theme-preloader-spinner-1' => __( 'Style 1', 'manaslu' ),
            'theme-preloader-spinner-2' => __( 'Style 2', 'manaslu' ),
        ),
        'active_callback' => 'manaslu_is_show_preloader',

    )
);
