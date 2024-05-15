<?php
/**/
$wp_customize->add_section(
    'home_page_popular_option',
    array(
        'title'      => __( 'Front Page Popular Options', 'manaslu' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'manaslu_options[enable_popular_section]',
    array(
        'default'           => $default_options['enable_popular_section'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_popular_section]',
    array(
        'label'   => __( 'Enable Popular Section', 'manaslu' ),
        'section' => 'home_page_popular_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'manaslu_options[popular_section_post_title]',
    array(
        'default'           => $default_options['popular_section_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'manaslu_options[popular_section_post_title]',
    array(
        'label'    => __( 'Popular section Title', 'manaslu' ),
        'section'  => 'home_page_popular_option',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'manaslu_options[number_of_popular_post]',
    array(
        'default'           => $default_options['number_of_popular_post'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[number_of_popular_post]',
    array(
        'label'       => __( 'Post In Popular section', 'manaslu' ),
        'section'     => 'home_page_popular_option',
        'type'        => 'select',
        'choices'     => array(
            '4' => __( '4', 'manaslu' ),
            '5' => __( '5', 'manaslu' ),
            '6' => __( '6', 'manaslu' ),
            '7' => __( '7', 'manaslu' ),
        ),
    )
);


$wp_customize->add_setting(
    'manaslu_options[popular_section_cat]',
    array(
        'default'           => $default_options['popular_section_cat'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[popular_section_cat]',
    array(
        'label'   => __( 'Choose Popular Category', 'manaslu' ),
        'section' => 'home_page_popular_option',
            'type'        => 'select',
        'choices'     => manaslu_post_category_list(),
    )
);

$wp_customize->add_setting(
    'manaslu_options[enable_popular_cat_meta]',
    array(
        'default'           => $default_options['enable_popular_cat_meta'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_popular_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'manaslu' ),
        'section' => 'home_page_popular_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'manaslu_options[enable_popular_author_meta]',
    array(
        'default'           => $default_options['enable_popular_author_meta'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_popular_author_meta]',
    array(
        'label'   => __( 'Enable author Meta', 'manaslu' ),
        'section' => 'home_page_popular_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'manaslu_options[enable_popular_date_meta]',
    array(
        'default'           => $default_options['enable_popular_date_meta'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_popular_date_meta]',
    array(
        'label'   => __( 'Enable Date On Popular', 'manaslu' ),
        'section' => 'home_page_popular_option',
        'type'    => 'checkbox',
    )
);