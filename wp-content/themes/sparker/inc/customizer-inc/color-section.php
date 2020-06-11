<?php 
/*adding sections for color Option*/
    $wp_customize->add_section( 'sparker-color-option', array(

        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Color Options', 'sparker' ),
        'panel'          => 'sparker_panel',
    ) );

    /*Default Color Option */
    $wp_customize->add_setting( 'sparker_theme_options[sparker-default-color]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-default-color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( 'sparker-default-color', array(
        'label'       => __( 'Primary Color', 'sparker' ),
        'section'     => 'sparker-color-option',
        'settings'    => 'sparker_theme_options[sparker-default-color]',
        'type'        => 'color',
        'priority'    => 10,
    ) );

    /*Site title and Tagline Color Option */
    $wp_customize->add_setting( 'sparker_theme_options[sparker-title-tagline-color]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-title-tagline-color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( 'sparker-title-tagline-color', array(
        'label'       => __( 'Site Title Color', 'sparker' ),
        'section'     => 'sparker-color-option',
        'settings'    => 'sparker_theme_options[sparker-title-tagline-color]',
        'type'        => 'color',
        'priority'    => 10,
    ) );
    /*Site Tagline Color Option */
    $wp_customize->add_setting( 'sparker_theme_options[sparker-tagline-color]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-tagline-color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( 'sparker-tagline-color', array(
        'label'       => __( 'Site Tagline Color', 'sparker' ),
        'section'     => 'sparker-color-option',
        'settings'    => 'sparker_theme_options[sparker-tagline-color]',
        'type'        => 'color',
        'priority'    => 10,
    ) );