<?php
/**
 * sparker Theme Customizer.
 *
 * @package sparker
 */
/**
 * Sidebar layout options
 *
 * @since sparker 1.0.0
 *
 * @param null
 * @return array $sparker_sidebar_layout
 *
 */
if ( !function_exists('sparker_sidebar_layout') ) :
   
    function sparker_sidebar_layout() {
        $sparker_sidebar_layout =  array(
            'right-sidebar' => __( 'Right Sidebar', 'sparker'),
            'left-sidebar'  => __( 'Left Sidebar' , 'sparker'),
            'no-sidebar'    => __( 'No Sidebar', 'sparker')
        );
        return apply_filters( 'sparker_sidebar_layout', $sparker_sidebar_layout );
    }
endif;

/**
 * Pagination options
 *
 * @since sparker 1.0.0
 *
 * @param null
 * @return array $sparker_pagination_option
 *
 */
if ( !function_exists('sparker_pagination_option') ) :
   
    function sparker_pagination_option() {
      
        $sparker_pagination_option =  array(
            'default'  => __( 'Default Pagination', 'sparker'),
            'numeric'  => __( 'Numeric Pagination' , 'sparker')
        );
      
        return apply_filters( 'sparker_pagination_option', $sparker_pagination_option );
    }
endif;

/**
 *  Default Theme options
 *
 * @since sparker 1.0.0
 *
 * @param null
 * @return array $sparker_theme_layout
 *
 */
if ( !function_exists('sparker_default_theme_options') ) :
    function sparker_default_theme_options() {

        $default_theme_options = array(
            'sparker-footer-copyright' => esc_html__('&copy; All Right Reserved','sparker'),
            'sparker-layout'          => 'right-sidebar',
            'sparker-font-family-url'              => esc_url('//fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500', 'sparker'),
            'sparker-font-family-name'             => esc_html__('Montserrat, sans-serif','sparker'),
            'sparker-heading-font-family-url'      => esc_url('//fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900', 'sparker'),
            'sparker-heading-font-family-name'     => esc_html__('Poppins, sans-serif','sparker'),            
            'sparker-footer-totop'                 => 1,
            'sparker-read-more-text'               => esc_html__('Continue Reading','sparker'),
            'sparker-header-social'                => 0,
            'sparker-header-search'                => 0,
            'sparker-header-disable'               => 1,
            'sparker-sticky-sidebar-option'        => 1,
            'sparker-blog-pagination-type-options' => 'default',
            'sparker-default-color'                => '#0f7dff', 
            'sparker-title-tagline-color'          => '#222',
            'sparker-tagline-color'                => '#818181', 
);
        return apply_filters( 'sparker_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sparker_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'refresh';
    $wp_customize->get_setting( 'custom_logo' )->transport      = 'refresh';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /*defaults options*/
    $defaults = sparker_get_theme_options();

    $wp_customize->add_panel( 'sparker_panel', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'title' => __( 'Sparker Theme Settings', 'sparker' ),
    ) );
    
    /**
     * Load customizer Design Layout section
     */
    require get_template_directory() . '/inc/customizer-inc/site-layout-section.php';

    /**
     * Load customizer Typography
     */
    require get_template_directory() . '/inc/customizer-inc/typography-section.php';
    /**
     * Load customizer Color
     */
    require get_template_directory() . '/inc/customizer-inc/color-section.php';
    /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/inc/customizer-inc/footer-section.php';
	
	   /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/inc/customizer-inc/header-section.php';

}
add_action( 'customize_register', 'sparker_customize_register' );

/**
 * Load dynamic css file
*/
require get_template_directory() . '/inc/dynamic-css.php';


/**
 *  Get theme options
 *
 * @since sparker 1.0.0
 *
 * @param null
 * @return array sparker_theme_options
 *
 */
if ( !function_exists('sparker_get_theme_options') ) :
    function sparker_get_theme_options() {

        $sparker_default_theme_options = sparker_default_theme_options();
        

     $sparker_get_theme_options     = get_theme_mod( 'sparker_theme_options');
        
        if( is_array( $sparker_get_theme_options ))
        {
            return array_merge( $sparker_default_theme_options, $sparker_get_theme_options );
        }

        else
        {
            
            return $sparker_default_theme_options;
        }

    }
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sparker_customize_preview_js() {
	
    wp_enqueue_script( 'sparker-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'sparker_customize_preview_js' );
