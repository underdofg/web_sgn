<?php
// child style enqueue
add_action( 'wp_enqueue_scripts', 'popular_business_styles' );
function popular_business_styles(){
    $themeVersion = wp_get_theme()->get('Version');
    // Enqueue our style.css with our own version
    wp_enqueue_style('popular-business-styles', get_template_directory_uri() . '/style.css',array(), $themeVersion);
}
//customizer
function popular_business_blog( $wp_customize ){
define('POPULARBUSINESS_ZITA_LAYOUT', get_stylesheet_directory_uri() . "/images/popularbusiness.png");
$wp_customize->add_setting(
            'zita_blog_layout', array(
                'default'           => 'zta-blog-layout-1',
                'sanitize_callback' => 'zita_shop_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Zita_WP_Customize_Control_Radio_Image(
                $wp_customize, 'zita_blog_layout', array(
                    'label'    => esc_html__( 'Blog Layout', 'popular-business' ),
                    'section'  => 'zita-blog-archive',
                    'choices'  => array(   
                        'zta-blog-layout-1' => array(
                            'url' => esc_url(ZITA_BLOG_ARCHIVE_LAYOUT_1),
                        ),
                        'popular-business-blog-layout' => array(
                            'url' => esc_url(POPULARBUSINESS_ZITA_LAYOUT),
                        ),
                        
                    ),
                    'priority'   =>1,
                )
            )
);

$wp_customize->add_setting('zita_sidebar_blog_layout', array(
        'default'        => 'no-sidebar',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'zita_sanitize_select',
    ));
$wp_customize->add_control( 'zita_sidebar_blog_layout', array(
        'settings' => 'zita_sidebar_blog_layout',
        'label'   => __('Blog Layout','popular-business'),
        'section' => 'zita-section-sidebar-group',
        'type'    => 'select',
        'choices'    => array(
        'default'   => __('Default','popular-business'),
        'no-sidebar'   => __('No Sidebar','popular-business'),
        'left' => __('Left Sidebar','popular-business'),
        'right'=> __('Right Sidebar','popular-business'),    
        ),
        'priority'   => 4,
));
}
add_action( 'customize_register', 'popular_business_blog', 100 );

if ( ! function_exists( 'popular_business_setup' ) ) :
    function popular_business_setup(){
        // Add support for Custom Background.
        $args = array(
        'default-color' => '4c4040',
        );
        add_theme_support( 'custom-background',$args );
    }

    /**
 *Sidebar Function for Popular Business Theme
 */
if ( ! function_exists( 'zita_sidebar_layout' ) ){
function zita_sidebar_layout($page_post_meta_set='default', $default='right'){
    $default_layout = get_theme_mod('zita_sidebar_default_layout', $default );
    $page_layout = get_theme_mod('zita_sidebar_page_layout','default' );
    $blog_layout = get_theme_mod('zita_sidebar_blog_layout','no-sidebar');
    $archive_layout = get_theme_mod('zita_sidebar_archive_layout','default' );
    $woo_layout = get_theme_mod('zita_sidebar_woo_layout','default' );
    $singleproduct_layout = get_theme_mod('zita_single_sidebar_disable',true);
    $layout='';
if($page_post_meta_set=='default' || $page_post_meta_set==''){
    if((is_home()) && ($blog_layout!=='default')){
       $layout = $blog_layout;
    }
    elseif(is_page() && $page_layout!=='default'){
     $layout = $page_layout;
    }
    elseif((is_single() || is_archive()) && (class_exists( 'WooCommerce' ) && !is_woocommerce() && !is_product()) && $archive_layout!=='default'){
        $layout = $archive_layout;
    }
    elseif((class_exists( 'WooCommerce' )) && (is_woocommerce() || is_checkout() || is_cart() || is_account_page()) && $woo_layout!=='default'){
        $layout = $woo_layout;
    }
    elseif((class_exists( 'WooCommerce' )) && (is_product()) && ($singleproduct_layout ==true)){
    $layout = 'no-sidebar';
    }
    else{
    $layout = $default_layout;
    }   
    return apply_filters( 'zita_sidebar_layout', $layout, $default ); 
  }else{
   if(is_home() && $blog_layout!=='default'){
       $layout = $blog_layout;
    }
   elseif(is_page()){
       $layout = $page_post_meta_set;
    }
   elseif((is_single() || is_archive())){
       $layout = $page_post_meta_set;
    } 
   elseif((class_exists( 'WooCommerce' )) && (is_woocommerce() || is_checkout() || is_cart() || is_account_page())){
       $layout = $page_post_meta_set;
    }
   
   else{
       $layout = $default_layout;
    }
    return apply_filters( 'zita_sidebar_layout',$layout); 
   }
 }
}
endif;
add_action( 'after_setup_theme', 'popular_business_setup' );
