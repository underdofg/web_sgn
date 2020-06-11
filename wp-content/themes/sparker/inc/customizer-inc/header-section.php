<?php 
/*adding sections for footer options*/
    $wp_customize->add_section( 'sparker-header-option', array(
        'priority'       => 150,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Header Option', 'sparker' ),
        'panel'          => 'sparker_panel',
    ) );

    /*Option Section Enable Disable*/
    $wp_customize->add_setting( 'sparker_theme_options[sparker-header-disable]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-header-disable'],
        'sanitize_callback' => 'sparker_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'sparker-header-disable', array(
        'label'       => __( 'Enable/Disable Header', 'sparker' ),
        'description' => __('Enable Header Section to show search and social', 'sparker'),
        'section'     => 'sparker-header-option',
        'settings'    => 'sparker_theme_options[sparker-header-disable]',
        'type'        => 'checkbox',
        'priority'    => 10
    ) );
    
    /*Search Option*/
    $wp_customize->add_setting( 'sparker_theme_options[sparker-header-search]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-header-search'],
        'sanitize_callback' => 'sparker_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'sparker-header-search', array(
        'label'       => __( 'Enable/Disable Search in Header', 'sparker' ),
        'description' => __('Enable Header Top Section First Above', 'sparker'),
        'section'     => 'sparker-header-option',
        'settings'    => 'sparker_theme_options[sparker-header-search]',
        'type'        => 'checkbox',
        'priority'    => 10
    ) );

    /*Social Options */
    $wp_customize->add_setting( 'sparker_theme_options[sparker-header-social]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-header-social'],
        'sanitize_callback' => 'sparker_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'sparker-header-social', array(
        'label'     => __( 'Enable/Disable Social in Header', 'sparker' ),
        'section'   => 'sparker-header-option',
        'settings'  => 'sparker_theme_options[sparker-header-social]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );
