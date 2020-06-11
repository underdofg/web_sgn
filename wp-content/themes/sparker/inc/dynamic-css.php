<?php
/**
 * Dynamic css
 *
 * @since Sparker 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('sparker_dynamic_css')) :
 function sparker_dynamic_css()
    {
   global $sparker_theme_options;
        $sparker_font_family = esc_attr( $sparker_theme_options['sparker-font-family-name'] );

        $h1_h6_font_family = esc_attr( $sparker_theme_options['sparker-heading-font-family-name'] );  

        $sparker_default_color = esc_attr( $sparker_theme_options['sparker-default-color'] );        
        $sparker_title_color = esc_attr( $sparker_theme_options['sparker-title-tagline-color'] );
        $sparker_tagline_color = esc_attr( $sparker_theme_options['sparker-tagline-color'] );
       
        $custom_css = '';
        /* Typography Section */

        if (!empty($sparker_font_family)) {
            
            $custom_css .= "body { font-family: {$sparker_font_family}; }";
        }

        if (!empty($h1_h6_font_family)) {
            
            $custom_css .= "h1,h1 a, h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, h6, h6 a, .widget .widget-title, .entry-header h2.entry-title a, .site-title a { font-family: {$h1_h6_font_family}; }";
        }

        if(!empty($sparker_default_color)){

            $custom_css .=".nav-links .nav-previous a, .nav-links .nav-next a, .pagination .page-numbers.current, .scrolltop, .btn-more, .site-info, .widget_search form input[type='submit'], .comment-form #submit {background-color: $sparker_default_color; }"; 
        }

        if(!empty($sparker_title_color)){

            $custom_css .= ".site-title a {color: $sparker_title_color;}"; 
        }

        if(!empty($sparker_tagline_color)){

            $custom_css .= ".site-description {color: $sparker_tagline_color; }"; 
        }

        wp_add_inline_style('sparker-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'sparker_dynamic_css', 99);