<?php
$widgets_link = admin_url( 'widgets.php' );

/*Add footer theme option*/
$wp_customize->add_section(
    'read_time_options' ,
    array(
        'title' => __( 'Read Time Options', 'manaslu' ),
        'panel' => 'manaslu_option_panel',
    )
);
$wp_customize->add_setting(
    'manaslu_options[enable_read_time_option]',
    array(
        'default'           => $default_options['enable_read_time_option'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_read_time_option]',
    array(
        'label'       => __( 'Enable Read Time Option', 'manaslu' ),
        'section'     => 'read_time_options',
        'type'        => 'checkbox',
    )
);

/*Display read time in*/
$wp_customize->add_setting(
    'manaslu_options[display_read_time_in]',
    array(
        'default'           => $default_options['display_read_time_in'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Manaslu_Checkbox_Multiple(
        $wp_customize,
        'manaslu_options[display_read_time_in]',
        array(
            'label' => __( 'Display Read Time', 'manaslu' ),
            'section' => 'read_time_options',
            'choices' => array(
                'home-page' => __('Homepage', 'manaslu'),
                'single-page' => __('Single Page', 'manaslu'),
                'archive-page' => __('Archive Page', 'manaslu'),
            )
        )
    )
);


$wp_customize->add_setting(
    'manaslu_options[words_per_minute]',
    array(
        'default' => $default_options['words_per_minute'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'manaslu_options[words_per_minute]',
    array(
        'label' => __('Words Per Minute', 'manaslu'),
        'description' => __('Number of Words per minut', 'manaslu'),
        'section' => 'read_time_options',
        'type' => 'number',
        'input_attrs' => array('min' => 1, 'max' => 300, 'style' => 'width: 150px;'),
    )
);
