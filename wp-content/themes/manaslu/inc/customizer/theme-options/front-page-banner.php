<?php
/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'manaslu' ),
        'description' => __( 'Contains all front page settings', 'manaslu'),
        'priority' => 50
    )
);
/**/
$wp_customize->add_section(
    'home_page_banner_option',
    array(
        'title'      => __( 'Front Page Banner Options', 'manaslu' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'manaslu_options[enable_banner_section]',
    array(
        'default'           => $default_options['enable_banner_section'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_banner_section]',
    array(
        'label'   => __( 'Enable Banner Section', 'manaslu' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'manaslu_options[number_of_slider_post]',
    array(
        'default'           => $default_options['number_of_slider_post'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[number_of_slider_post]',
    array(
        'label'       => __( 'Post In Slider', 'manaslu' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'manaslu' ),
            '4' => __( '4', 'manaslu' ),
            '5' => __( '5', 'manaslu' ),
            '6' => __( '6', 'manaslu' ),
        ),
    )
);


$wp_customize->add_setting(
    'manaslu_options[slider_post_content_alignment]',
    array(
        'default'           => $default_options['slider_post_content_alignment'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[slider_post_content_alignment]',
    array(
        'label'       => __( 'Slider Content Alignment', 'manaslu' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            'text-right' => __( 'Align Right', 'manaslu' ),
            'text-center' => __( 'Align Center', 'manaslu' ),
            'text-left' => __( 'Align Left', 'manaslu' ),
        ),
    )
);

$wp_customize->add_setting(
    'manaslu_options[banner_section_cat]',
    array(
        'default'           => $default_options['banner_section_cat'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[banner_section_cat]',
    array(
        'label'   => __( 'Choose Banner Category', 'manaslu' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => manaslu_post_category_list(),
    )
);

$wp_customize->add_setting(
    'manaslu_options[enable_banner_post_description]',
    array(
        'default'           => $default_options['enable_banner_post_description'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_banner_post_description]',
    array(
        'label'   => __( 'Enable Post Description', 'manaslu' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'manaslu_options[enable_banner_cat_meta]',
    array(
        'default'           => $default_options['enable_banner_cat_meta'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_banner_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'manaslu' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'manaslu_options[enable_banner_author_meta]',
    array(
        'default'           => $default_options['enable_banner_author_meta'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_banner_author_meta]',
    array(
        'label'   => __( 'Enable author Meta', 'manaslu' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'manaslu_options[enable_banner_date_meta]',
    array(
        'default'           => $default_options['enable_banner_date_meta'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_banner_date_meta]',
    array(
        'label'   => __( 'Enable Date On Banner', 'manaslu' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);