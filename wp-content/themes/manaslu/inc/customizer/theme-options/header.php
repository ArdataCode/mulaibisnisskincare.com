<?php
// Archive Layout.
$wp_customize->add_setting(
    'manaslu_options[enable_header_bg_overlay]',
    array(
        'default'           => $default_options['enable_header_bg_overlay'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_header_bg_overlay]',
    array(
        'label'    => __( 'Enable Image Overlay', 'manaslu' ),
        'section'  => 'header_image',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'manaslu_options[header_image_size]',
    array(
        'default'           => $default_options['header_image_size'],
        'sanitize_callback' => 'manaslu_sanitize_select',
    )
);
$wp_customize->add_control(
    'manaslu_options[header_image_size]',
    array(
        'label'       => __( 'Select Header Size', 'manaslu' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'manaslu' ),

        'section'     => 'header_image',
        'type'        => 'select',
        'choices'     => array(
            'small' => __( 'Small', 'manaslu' ),
            'medium' => __( 'Medium', 'manaslu' ),
            'large' => __( 'Large', 'manaslu' ),
        ),
    )
);

/*Header Options*/
$wp_customize->add_section(
    'header_options' ,
    array(
        'title' => __( 'Header Options', 'manaslu' ),
        'panel' => 'manaslu_option_panel',
    )
);

$wp_customize->add_setting(
    'manaslu_options[enable_header_social_nav]',
    array(
        'default'           => $default_options['enable_header_social_nav'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_header_social_nav]',
    array(
        'label'    => __( 'Enable Social Menu', 'manaslu' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'manaslu_options[enable_random_post]',
    array(
        'default' => $default_options['enable_random_post'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_random_post]',
    array(
        'label' => esc_html__('Enable Random Post', 'manaslu'),
        'section' => 'header_options',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'manaslu_options[random_post_category]',
    array(
        'default'           => $default_options['random_post_category'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(new Manaslu_Dropdown_Taxonomies_Control(
    $wp_customize, 
    'manaslu_options[random_post_category]',
        array(
            'label'           => esc_html__('Random Post Category', 'manaslu'),
            'section'         => 'header_options',
        )
    )
);

/*Enable Search*/
$wp_customize->add_setting(
    'manaslu_options[enable_search_on_header]',
    array(
        'default'           => $default_options['enable_search_on_header'],
        'sanitize_callback' => 'manaslu_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'manaslu_options[enable_search_on_header]',
    array(
        'label'    => __( 'Enable Search Icon', 'manaslu' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);

if(class_exists( 'WooCommerce' )){
    
    /*Enable Mini Cart Icon on header*/
    $wp_customize->add_setting(
        'manaslu_options[enable_mini_cart_header]',   
        array(
            'default'           => $default_options['enable_mini_cart_header'],
            'sanitize_callback' => 'manaslu_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'manaslu_options[enable_mini_cart_header]',
        array(
            'label'    => __( 'Enable Mini Cart Icon', 'manaslu' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );

    /*Enable Myaccount Link*/
    $wp_customize->add_setting(
        'manaslu_options[enable_woo_my_account]',   
        array(
            'default'           => $default_options['enable_woo_my_account'],
            'sanitize_callback' => 'manaslu_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'manaslu_options[enable_woo_my_account]',
        array(
            'label'    => __( 'Enable My Account Icon', 'manaslu' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );
}