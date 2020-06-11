<?php
/*
* Footer Section Closing Container 
* @since 1.0.0
* @package Sparker
*/ 
if ( ! function_exists( 'sparker_container_closing' ) ) :
    /**
     * Footer Section Closing Container 
     *
     * @since 1.0.0
     */
    function sparker_container_closing() {
  
    ?>
    		</div><!-- #row -->
		</div><!-- #container -->
	</div><!-- #content -->
    <?php
    }
endif;
add_action( 'sparker_container_closing_action', 'sparker_container_closing', 10 );

/*
* Footer Section site-footer class 
* @since 1.0.0
* @package Sparker
*/ 
if ( ! function_exists( 'sparker_site_footer_start' ) ) :
    /**
     * Footer Section site-footer class
     *
     * @since 1.0.0
     */
    function sparker_site_footer_start() {

    if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) 
    {
      $value="top-footer-widget";
    
    ?>
	<footer id="colophon" class="site-footer <?php echo  $value; ?>" role="contentinfo">
<?php
 }

    }
endif;
add_action( 'sparker_site_footer_start_action', 'sparker_site_footer_start', 10 );
	
/*
* Footer Section footer widget section 
* @since 1.0.0
* @package Sparker
*/ 
if ( ! function_exists( 'sparker_site_footer_widget' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function sparker_site_footer_widget() { 
		if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) {
    
   	$count = 0;
		for ( $i = 1; $i <= 4; $i++ )
		    {
			  if ( is_active_sidebar( 'footer-' . $i ) )
			        {
						$count++;
					}
			}
		$column=3;
		if( $count == 4 ) 
		{
		   	$column = 3;  
	   
		}
        elseif( $count == 3)
        {
             	$column=4;
        }
        elseif( $count == 2) 
        {
             	$column = 6;
        }
       elseif( $count == 1) 
        {
             	$column = 12;
        }
	?>
		<div class="top-footer">
			<div class="container">
				<div class="row">
					
				<?php
				for ( $i = 1; $i <= 4 ; $i++ )
		    	{
				  	if ( is_active_sidebar( 'footer-' . $i ) )
				  	{ 
				?>

					<div class="col-md-<?php echo  absint( $column ); ?>">
						<?php dynamic_sidebar( 'footer-' . $i ); ?>
					</div>
				<?php }

			    }
				
				?>	

				</div>
			</div>
		</div>
	<?php
    }
   }
endif;
add_action( 'sparker_site_footer_widget_action', 'sparker_site_footer_widget', 10 );

/*
* Footer Section footer widget section 
* @since 1.0.0
* @package Sparker
*/ 
if ( ! function_exists( 'sparker_footer_site_info' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function sparker_footer_site_info() { 
    	global $sparker_theme_options;
  		$sparker_copyright = wp_kses_post( $sparker_theme_options['sparker-footer-copyright'] );
        ?>

		<div class="site-info">
			<span class="copy-right-text">
				<?php echo $sparker_copyright; ?>				
			</span>
			<div class="powered-text">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'sparker' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'sparker' ), 'WordPress' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'sparker' ), 'Sparker', '<a href="https://www.canyonthemes.com" target="_blank">Canyon Themes</a>' ); ?>	
			</div>
			<?php
			 	if( 1 == $sparker_theme_options['sparker-footer-totop'] ){
					sparker_go_to_top();
				}
			?>
		</div><!-- .site-info -->
<?php
    }
endif;
add_action( 'sparker_footer_site_info_action', 'sparker_footer_site_info', 10 );


/*
* Footer Section closing 
* @since 1.0.0
* @package Sparker
*/ 
if ( ! function_exists( 'sparker_footer_closing' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function sparker_footer_closing() { ?>
		</footer><!-- #colophon -->
	</div><!-- #page -->
<?php
    }
endif;
add_action( 'sparker_footer_closing_action', 'sparker_footer_closing', 10 );


