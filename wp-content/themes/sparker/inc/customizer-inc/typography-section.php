<?php 
/*adding sections for Typography Option*/
    $wp_customize->add_section( 'sparker-typography-option', array(

        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Typography Option', 'sparker' ),
        'panel'          => 'sparker_panel',
    ) );

    /*Typography Option For URL*/
    $wp_customize->add_setting( 'sparker_theme_options[sparker-font-family-url]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-font-family-url'],
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'sparker-font-family-url', array(
        'label'       => __( 'Paragraph Font Family URL Text', 'sparker' ),
        'section'     => 'sparker-typography-option',
        'settings'    => 'sparker_theme_options[sparker-font-family-url]',
        'type'        => 'url',
        'priority'    => 10,
        'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
                __( 'Insert', 'sparker' ),
                esc_url('https://www.google.com/fonts'),
                __('Enter Google Font URL' , 'sparker'),
                __('to add google Font.' ,'sparker')
                ),
    ) );



    /*Font Family Name*/

    $wp_customize->add_setting( 'sparker_theme_options[sparker-font-family-name]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-font-family-name'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'sparker-font-family-name', array(
        'label'       => __( 'Paragraph Font Family Name', 'sparker' ),
        'section'     => 'sparker-typography-option',
        'settings'    => 'sparker_theme_options[sparker-font-family-name]',
        'type'        => 'text',
        'priority'    => 10,
        'description' => __( 'Insert Google Font Family Name.', 'sparker' ),
    ) );


    /*Heading Typography Option For URL*/
    $wp_customize->add_setting( 'sparker_theme_options[sparker-heading-font-family-url]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-heading-font-family-url'],
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'sparker-heading-font-family-url', array(
        'label'       => __( 'Heading(H1 - H6) Font Family URL Text', 'sparker' ),
        'section'     => 'sparker-typography-option',
        'settings'    => 'sparker_theme_options[sparker-heading-font-family-url]',
        'type'        => 'url',
        'priority'    => 10,
        'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
                __( 'Insert', 'sparker' ),
                esc_url('https://www.google.com/fonts'),
                __('Enter Google Font URL' , 'sparker'),
                __('to add google Font.' ,'sparker')
                ),
    ) );



    /*Heading Font Family Name*/

    $wp_customize->add_setting( 'sparker_theme_options[sparker-heading-font-family-name]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-heading-font-family-name'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'sparker-heading-font-family-name', array(
        'label'       => __( 'Headings (H1- H6) Font Family Name', 'sparker' ),
        'section'     => 'sparker-typography-option',
        'settings'    => 'sparker_theme_options[sparker-heading-font-family-name]',
        'type'        => 'text',
        'priority'    => 10,
        'description' => __( 'Insert Google Font Family Name.', 'sparker' ),
    ) );