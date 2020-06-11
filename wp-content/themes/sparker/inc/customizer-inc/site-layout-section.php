<?php
/*adding sections for category selection for promo section in homepage*/
$wp_customize->add_section( 'sparker-site-layout', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'title'          => __( 'Blog Options', 'sparker' ),
    'panel'          => 'sparker_panel',
) );

/* feature cat selection */
$wp_customize->add_setting( 'sparker_theme_options[sparker-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['sparker-layout'],
    'sanitize_callback' => 'sparker_sanitize_select'
) );

$choices = sparker_sidebar_layout();
$wp_customize->add_control('sparker_theme_options[sparker-layout]',
            array(
            'choices'   => $choices,
            'label'		=> __( 'Select Sidebar Layout', 'sparker'),
            'section'   => 'sparker-site-layout',
            'settings'  => 'sparker_theme_options[sparker-layout]',
            'type'	  	=> 'select',
            'priority'  => 10
         )
    );

/* Read More Option */
$wp_customize->add_setting( 'sparker_theme_options[sparker-read-more-text]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['sparker-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control('sparker_theme_options[sparker-read-more-text]',
            array(
            'label'       => __( 'Read More Text', 'sparker'),
            'description' => __('Continue Reading >> default text change section', 'sparker'),
            'section'     => 'sparker-site-layout',
            'settings'    => 'sparker_theme_options[sparker-read-more-text]',
            'type'        => 'text',
            'priority'    => 10
         )
    );
/* Sticky Sidebar Option */
$wp_customize->add_setting( 'sparker_theme_options[sparker-sticky-sidebar-option]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['sparker-sticky-sidebar-option'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control('sparker_theme_options[sparker-sticky-sidebar-option]',
            array(
            'label'       => __( 'Enable/Disable Sticky Sidebar', 'sparker'),
            'description' => __('Checked to enable sticky sidebar', 'sparker'),
            'section'     => 'sparker-site-layout',
            'settings'    => 'sparker_theme_options[sparker-sticky-sidebar-option]',
            'type'        => 'checkbox',
            'priority'    => 10
         )
    );

/* Pagination Options */
$choices = sparker_pagination_option();
$wp_customize->add_setting( 'sparker_theme_options[sparker-blog-pagination-type-options]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['sparker-blog-pagination-type-options'],
    'sanitize_callback' => 'sparker_sanitize_select'
) );

$wp_customize->add_control('sparker_theme_options[sparker-blog-pagination-type-options]',
            array(
            'choices'     => $choices,
            'label'       => __( 'Pagination Type', 'sparker'),
            'description' => __('Select Pagination Type From Below', 'sparker'),
            'section'     => 'sparker-site-layout',
            'settings'    => 'sparker_theme_options[sparker-blog-pagination-type-options]',
            'type'        => 'select',
            'priority'    => 10
         )
    );