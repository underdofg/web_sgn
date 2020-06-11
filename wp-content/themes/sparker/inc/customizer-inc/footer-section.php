<?php 
/*adding sections for footer options*/
    $wp_customize->add_section( 'sparker-footer-option', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Footer Option', 'sparker' ),
        'panel'          => 'sparker_panel',
    ) );
    /*copyright*/

    $wp_customize->add_setting( 'sparker_theme_options[sparker-footer-copyright]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-footer-copyright'],
        'sanitize_callback' => 'wp_kses_post'
    ) );

    $wp_customize->add_control( 'sparker-footer-copyright', array(
        'label'     => __( 'Copyright Text', 'sparker' ),
        'section'   => 'sparker-footer-option',
        'settings'  => 'sparker_theme_options[sparker-footer-copyright]',
        'type'      => 'text',
        'priority'  => 10

    ) );

    /*go to top*/

    $wp_customize->add_setting( 'sparker_theme_options[sparker-footer-totop]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['sparker-footer-totop'],
        'sanitize_callback' => 'sparker_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'sparker-footer-totop', array(
        'label'     => __( 'Go To Top Option', 'sparker' ),
        'section'   => 'sparker-footer-option',
        'settings'  => 'sparker_theme_options[sparker-footer-totop]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );