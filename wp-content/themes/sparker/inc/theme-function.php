<?php
/**
 * Goto Top functions
 *
 * @since Sparker 1.0.0
 *
 */
if (!function_exists('sparker_go_to_top')) :
    function sparker_go_to_top()
    {
        ?>
        <a id="toTop" href="#" class="scrolltop" title="<?php esc_attr_e('Go to Top', 'sparker'); ?>">
            <i class="fa fa-angle-double-up"></i>
        </a>
    <?php
    } endif;

/**
 * Post Navigation Function
 *
 * @since Sparker 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('sparker_posts_navigation') ) :
    function sparker_posts_navigation() {
        global $sparker_theme_options;
        $sparker_pagination_option = $sparker_theme_options['sparker-blog-pagination-type-options'];
        if( 'default' == $sparker_pagination_option ){
            the_posts_navigation();
        }
        else{
            echo"<div class='pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Prev', 'sparker'),
                'next_text' => __('Next &raquo;', 'sparker'),
            ));
            echo "</div>";
        }
    }
endif;
add_action( 'sparker_action_navigation', 'sparker_posts_navigation', 10 );

/*
* Remove [...] from default fallback excerpt content
*
*/
function sparker_excerpt_more( $more ) {
  if(is_admin())
  {
    return $more;
  }
  return '...';
}
add_filter( 'excerpt_more', 'sparker_excerpt_more');


/*
* Widget Enqueue 
*/
if (!function_exists('sparker_widgets_backend_enqueue')) : 
function sparker_widgets_backend_enqueue($hook){  

  if ( 'widgets.php' != $hook )
   {
            return;
        
   }
    wp_register_script( 'sparker-custom-widgets', get_template_directory_uri().'/assets/js/widgets.js', array( 'jquery' ), true );
    wp_enqueue_media();
    wp_enqueue_script( 'sparker-custom-widgets' );
}

add_action( 'admin_enqueue_scripts', 'sparker_widgets_backend_enqueue' );

endif;

/**
 * Sanitizing the select callback example
 *
 * @since sparker 1.0.0
 *
 * @see sanitize_key()https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('sparker_sanitize_select') ) :
   
    function sparker_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;

/**
 * Sanitize checkbox field
 *
 *  @since Sparker 1.0.0
 */
if (!function_exists('sparker_sanitize_checkbox')) :
    function sparker_sanitize_checkbox($checked)
    {
        // Boolean check.
        return ((isset($checked) && true == $checked) ? true : false);
    }
endif;

/**
 * Recommended Plugins
 *
 *  @since Sparker 1.0.0
 */
if (!function_exists('sparker_plugin_recommend')) :
function sparker_plugin_recommend() {
    
    $plugins = array(
        
        array(
            'name'      => esc_html__( 'Elementor Page Builder', 'sparker' ),
            'slug'      => 'elementor',
            'required'  => false,
        ),
        
        array(
            'name'      => esc_html__( 'One Click Demo Import', 'sparker' ),
            'slug'      => 'one-click-demo-import',
            'required'  => false,
        ),

        array(
            'name'     => esc_html__( 'Contact Form 7', 'sparker' ),
            'slug'     => 'contact-form-7',
            'required' => false,
        ),

    );

    tgmpa( $plugins );
}

add_action( 'tgmpa_register', 'sparker_plugin_recommend' );
endif;