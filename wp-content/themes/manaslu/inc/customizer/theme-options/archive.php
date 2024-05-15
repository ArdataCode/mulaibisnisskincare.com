<?php
$wp_customize->add_section(
    'archive_options' ,
    array(
        'title' => __( 'Archive Options', 'manaslu' ),
        'panel' => 'manaslu_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'manaslu_options[global_sidebar_layout]',
    array(
        'default'           => $default_options['global_sidebar_layout'],
        'sanitize_callback' => 'manaslu_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Manaslu_Radio_Image_Control(
        $wp_customize,
        'manaslu_options[global_sidebar_layout]',
        array(
            'label' => __( 'Global Sidebar Layout', 'manaslu' ),
            'section' => 'archive_options',
            'choices' => manaslu_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'manaslu_options[hide_global_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_global_sidebar_mobile'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[hide_global_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Global Sidebar on Mobile', 'manaslu' ),
        'section'     => 'archive_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'manaslu_section_seperator_archive_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Manaslu_Seperator_Control(
        $wp_customize,
        'manaslu_section_seperator_archive_1',
        array(
            'settings' => 'manaslu_section_seperator_archive_1',
            'section' => 'archive_options',
        )
    )
);

$wp_customize->add_setting(
    'manaslu_options[enable_post_title_center]',
    array(
        'default'           => $default_options['enable_post_title_center'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_post_title_center]',
    array(
        'label'    => __( 'Enable article content center', 'manaslu' ),
        'section'  => 'archive_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'manaslu_options[archive_post_layout]',
    array(
        'default'           => $default_options['archive_post_layout'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[archive_post_layout]',
    array(
        'label'       => __( 'Archive Post Lyout Style', 'manaslu' ),
        'section'     => 'archive_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => __( 'Default Layout', 'manaslu' ),
            'flip-article' => __( 'Flip Post Layout', 'manaslu' ),
            'flip-alternate-article' => __( 'Alternate Post Layout', 'manaslu' ),
        ),
    )
);

$wp_customize->add_setting(
    'manaslu_section_seperator_archive_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Manaslu_Seperator_Control(
        $wp_customize,
        'manaslu_section_seperator_archive_2',
        array(
            'settings' => 'manaslu_section_seperator_archive_2',
            'section' => 'archive_options',
        )
    )
);

/* Archive Meta */
$wp_customize->add_setting(
    'manaslu_options[archive_post_meta_1]',
    array(
        'default'           => $default_options['archive_post_meta_1'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Manaslu_Checkbox_Multiple(
        $wp_customize,
        'manaslu_options[archive_post_meta_1]',
        array(
            'label'	=> __( 'Archive Post Meta', 'manaslu' ),
            'description'	=> __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'manaslu' ),
            'section' => 'archive_options',
            'choices' => array(
                'author' => __( 'Author', 'manaslu' ),
                'date' => __( 'Date', 'manaslu' ),
                'comment' => __( 'Comment', 'manaslu' ),
                'category' => __( 'Category', 'manaslu' ),
                'tags' => __( 'Tags', 'manaslu' ),
            ),
        )

    )
);


$wp_customize->add_setting(
    'manaslu_section_seperator_archive_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Manaslu_Seperator_Control(
        $wp_customize,
        'manaslu_section_seperator_archive_3',
        array(
            'settings' => 'manaslu_section_seperator_archive_3',
            'section' => 'archive_options',
        )
    )
);

$wp_customize->add_setting('manaslu_options[excerpt_length]',
    array(
        'default'           => $default_options['excerpt_length'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'manaslu_sanitize_number_range',
    )
);
$wp_customize->add_control('manaslu_options[excerpt_length]',
    array(
        'label'       => esc_html__('Excerpt Length', 'manaslu'),
        'description'       => esc_html__( 'Max number of words. Set it to 0 to disable. (step-1)', 'manaslu' ),
        'section'     => 'archive_options',
        'type'        => 'range',
        'input_attrs' => array(
                       'min'   => 0,
                       'max'   => 100,
                       'step'   => 1,
                    ),
    )
);
