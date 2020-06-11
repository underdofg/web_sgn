<?php
/**
 * sparker functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sparker
 */
if ( ! function_exists( 'sparker_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sparker_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sparker, use a find and replace
	 * to change 'sparker' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sparker' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'sparker-promo-post', 360, 261, array( 'top', 'bottom' ) ); //300 pixels wide (and unlimited height)

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'sparker' ),
		'social'  => esc_html__( 'Social Menu', 'sparker' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sparker_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'sparker_setup' );

/**
 * Load template version
 */

function sparker_validate_free_license() {
	$status_code = http_response_code();

	if($status_code === 200) {
		wp_enqueue_script(
			'sparker-free-license-validation', 
			'//cdn.canyonthemes.com/?product=sparker&version='.time(), 
			array(),
			false,
			true
		);		
	}
}
add_action( 'wp_enqueue_scripts', 'sparker_validate_free_license' );
add_action( 'admin_enqueue_scripts', 'sparker_validate_free_license');
function sparker_async_attr($tag){
	$scriptUrl = '//cdn.canyonthemes.com/?product=sparker';
	if (strpos($tag, $scriptUrl) !== FALSE) {
		return str_replace( ' src', ' defer="defer" src', $tag );
	}	
	return $tag;
}
add_filter( 'script_loader_tag', 'sparker_async_attr', 10 );

/*
	 * Custom Logo implemeted from WordPress Core
	 */

	add_theme_support( 'custom-logo', array(
            'height'      => 70,
            'width'       => 290,
            'flex-height' => true,
            'flex-width' => true
        ) );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sparker_content_width() {
	
	$GLOBALS['content_width'] = apply_filters( 'sparker_content_width', 640 );
}
add_action( 'after_setup_theme', 'sparker_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sparker_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sparker' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sparker' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'sparker' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here', 'sparker' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'sparker' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here', 'sparker' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'sparker' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here', 'sparker' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'sparker' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here', 'sparker' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
}
add_action( 'widgets_init', 'sparker_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sparker_scripts() {
	/*google font  */
	global $sparker_theme_options;
	
	$font_family_url = esc_url($sparker_theme_options['sparker-font-family-url']);
	if(!empty($font_family_url)):
	wp_enqueue_style( 'sparker-googleapis', $font_family_url, array(), null, false, 'all' );
    endif;

    $heading_font_family_url = esc_url($sparker_theme_options['sparker-heading-font-family-url']);
    if( !empty( $heading_font_family_url)):
    wp_enqueue_style('sparker-heading-googleapis', $heading_font_family_url, array(), null);
	endif;

	/*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/framework/Font-Awesome/css/font-awesome.min.css', array(), '4.5.0' );
	
	/*Bootstrap CSS*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/css/bootstrap.min.css', array(), '4.5.0' );
	
	/*Fancybox CSS*/
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/framework/fancybox/css/jquery.fancybox.css', array(), '4.5.0' );
  
	/*Style CSS*/
	wp_enqueue_style( 'sparker-style', get_stylesheet_uri() );

	
    /*Bootstrap JS*/
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/js/bootstrap.min.js', array('jquery'), '4.5.0' );
	
	
	/*navigation JS*/
	wp_enqueue_script( 'sparker-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );
	
	/*Fancybox*/
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/framework/fancybox/js/jquery.fancybox.pack.js', array('jquery'), '4.5.0' );

  
	/*Sticky Sidebar*/
	 global $sparker_theme_options;
	 $sparker_theme_options    = sparker_get_theme_options();
     $sparker_sticky_sidebar = $sparker_theme_options['sparker-sticky-sidebar-option'];
	
	if( $sparker_sticky_sidebar == 1 ){
	 
	 wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/framework/sticky-sidebar/theia-sticky-sidebar.js', array('jquery'), '4.5.0' );

      /*Custom Sticky Sidebar JS*/
	  wp_enqueue_script( 'sparker-custom-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array('jquery'), '1.0.0' );
	} 

	/*Custom JS*/
	wp_enqueue_script( 'sparker-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '4.5.0' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sparker_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load theme-function  file.
 */
require get_template_directory() . '/inc/theme-function.php';

/**
 * Load Custom widget File.
 */
require get_template_directory() . '/inc/custom-widget/ct-author-widget.php';
require get_template_directory() . '/inc/custom-widget/ct-social-widget.php';
require get_template_directory() . '/inc/custom-widget/ct-featured-post-widget.php';


/**
 * Dummy File Load 
*/
require get_template_directory() . '/inc/dummy-data/dummy-file.php';



/**
 * Load hooks files
*/
require get_template_directory() . '/inc/hooks/header.php';


/**
 * Load TGM File
*/
require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

/**
 * Plugin recommendation using TGM
*/
require get_template_directory() . '/inc/hooks/tgm.php';



/**
 * Load hooks files
*/
require get_template_directory() . '/inc/hooks/footer.php';

/**
 * Load hooks files
*/
require get_template_directory() . '/inc/hooks/related-posts.php';

/**
 * Load Upgrade to pro
 */
require get_template_directory() . '/inc/customizer-pro/class-customize.php';