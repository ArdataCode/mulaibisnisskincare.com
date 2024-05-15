<?php

$wp_customize->add_section(
    'single_options' ,
    array(
        'title' => __( 'Single Options', 'manaslu' ),
        'panel' => 'manaslu_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'manaslu_options[single_sidebar_layout]',
    array(
        'default'           => $default_options['single_sidebar_layout'],
        'sanitize_callback' => 'manaslu_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Manaslu_Radio_Image_Control(
        $wp_customize,
        'manaslu_options[single_sidebar_layout]',
        array(
            'label' => __( 'Single Sidebar Layout', 'manaslu' ),
            'section' => 'single_options',
            'choices' => manaslu_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'manaslu_options[hide_single_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_single_sidebar_mobile'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[hide_single_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Single Sidebar on Mobile', 'manaslu' ),
        'section'     => 'single_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'manaslu_section_seperator_single_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Manaslu_Seperator_Control(
        $wp_customize,
        'manaslu_section_seperator_single_1',
        array(
            'settings' => 'manaslu_section_seperator_single_1',
            'section'       => 'single_options',
        )
    )
);

/* Post Meta */
$wp_customize->add_setting(
    'manaslu_options[single_post_meta]',
    array(
        'default'           => $default_options['single_post_meta'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Manaslu_Checkbox_Multiple(
        $wp_customize,
        'manaslu_options[single_post_meta]',
        array(
            'label' => __( 'Single Post Meta', 'manaslu' ),
            'description'   => __( 'Choose the post meta you want to be displayed on post detail page', 'manaslu' ),
            'section' => 'single_options',
            'choices' => array(
                'author' => __( 'Author', 'manaslu' ),
                'date' => __( 'Date', 'manaslu' ),
                'comment' => __( 'Comment', 'manaslu' ),
                'category' => __( 'Category', 'manaslu' ),
                'tags' => __( 'Tags', 'manaslu' ),
            )
        )
    )
);


$wp_customize->add_setting(
    'manaslu_section_seperator_single_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Manaslu_Seperator_Control( 
        $wp_customize,
        'manaslu_section_seperator_single_2',
        array(
            'settings' => 'manaslu_section_seperator_single_2',
            'section'       => 'single_options',
        )
    )
);

/*Show Author Info Box
*-------------------------------*/
$wp_customize->add_setting(
    'manaslu_options[show_author_info]',
    array(
        'default'           => $default_options['show_author_info'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[show_author_info]',
    array(
        'label'    => __( 'Show Author Info Box', 'manaslu' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'manaslu_section_seperator_single_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Manaslu_Seperator_Control(
        $wp_customize,
        'manaslu_section_seperator_single_3',
        array(
            'settings' => 'manaslu_section_seperator_single_3',
            'section'       => 'single_options',
        )
    )
);

/*Show Related Posts
*-------------------------------*/
$wp_customize->add_setting(
    'manaslu_options[show_related_posts]',
    array(
        'default'           => $default_options['show_related_posts'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[show_related_posts]',
    array(
        'label'    => __( 'Show Related Posts', 'manaslu' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Related Posts Text.*/
$wp_customize->add_setting(
    'manaslu_options[related_posts_text]',
    array(
        'default'           => $default_options['related_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'manaslu_options[related_posts_text]',
    array(
        'label'    => __( 'Related Posts Text', 'manaslu' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'manaslu_is_related_posts_enabled',
    )
);

/* Number of Related Posts */
$wp_customize->add_setting(
    'manaslu_options[no_of_related_posts]',
    array(
        'default'           => $default_options['no_of_related_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'manaslu_options[no_of_related_posts]',
    array(
        'label'       => __( 'Number of Related Posts', 'manaslu' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'manaslu_is_related_posts_enabled',
    )
);

/*Related Posts Orderby*/
$wp_customize->add_setting(
    'manaslu_options[related_posts_orderby]',
    array(
        'default'           => $default_options['related_posts_orderby'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[related_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'manaslu' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'manaslu'),
            'id' => __('ID', 'manaslu'),
            'title' => __('Title', 'manaslu'),
            'rand' => __('Random', 'manaslu'),
        ),
        'active_callback' => 'manaslu_is_related_posts_enabled',
    )
);

/*Related Posts Order*/
$wp_customize->add_setting(
    'manaslu_options[related_posts_order]',
    array(
        'default'           => $default_options['related_posts_order'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[related_posts_order]',
    array(
        'label'       => __( 'Order', 'manaslu' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'manaslu'),
            'desc' => __('DESC', 'manaslu'),
        ),
        'active_callback' => 'manaslu_is_related_posts_enabled',
    )
);

$wp_customize->add_setting(
    'manaslu_section_seperator_single_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Manaslu_Seperator_Control(
        $wp_customize,
        'manaslu_section_seperator_single_4',
        array(
            'settings' => 'manaslu_section_seperator_single_4',
            'section'       => 'single_options',
        )
    )
);
/*Show Author Posts
*-----------------------------------------*/
$wp_customize->add_setting(
    'manaslu_options[show_author_posts]',
    array(
        'default'           => $default_options['show_author_posts'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[show_author_posts]',
    array(
        'label'    => __( 'Show Author Posts', 'manaslu' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Author Posts Text.*/
$wp_customize->add_setting(
    'manaslu_options[author_posts_text]',
    array(
        'default'           => $default_options['author_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'manaslu_options[author_posts_text]',
    array(
        'label'    => __( 'Author Posts Text', 'manaslu' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'manaslu_is_author_posts_enabled',
    )
);

/* Number of Author Posts */
$wp_customize->add_setting(
    'manaslu_options[no_of_author_posts]',
    array(
        'default'           => $default_options['no_of_author_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'manaslu_options[no_of_author_posts]',
    array(
        'label'       => __( 'Number of Author Posts', 'manaslu' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'manaslu_is_author_posts_enabled',
    )
);

/*Author Posts Orderby*/
$wp_customize->add_setting(
    'manaslu_options[author_posts_orderby]',
    array(
        'default'           => $default_options['author_posts_orderby'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[author_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'manaslu' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'manaslu'),
            'id' => __('ID', 'manaslu'),
            'title' => __('Title', 'manaslu'),
            'rand' => __('Random', 'manaslu'),
        ),
        'active_callback' => 'manaslu_is_author_posts_enabled',
    )
);

/*Author Posts Order*/
$wp_customize->add_setting(
    'manaslu_options[author_posts_order]',
    array(
        'default'           => $default_options['author_posts_order'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[author_posts_order]',
    array(
        'label'       => __( 'Order', 'manaslu' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'manaslu'),
            'desc' => __('DESC', 'manaslu'),
        ),
        'active_callback' => 'manaslu_is_author_posts_enabled',
    )
);