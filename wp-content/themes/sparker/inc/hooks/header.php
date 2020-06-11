<?php
/*
* Header Hook Section 
* @since 1.0.0
*/
/* ------------------------------
* Doctype hook of the theme
* @since 1.0.0
* @package Sparker
------------------------------ */
if ( ! function_exists( 'sparker_doctype_action' ) ) :
    /**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
    function sparker_doctype_action() {
    ?>
    <!DOCTYPE html>
		<html <?php language_attributes(); ?> class="boxed">
    <?php
    }
endif;
add_action( 'sparker_doctype', 'sparker_doctype_action', 10 );

/* --------------------------
* Header hook of the theme.
* @since 1.0.0
* @package Sparker
-------------------------- */
if ( ! function_exists( 'sparker_head_action' ) ) :
    /**
     * Header hook of the theme.
     *
     * @since 1.0.0
     */
    function sparker_head_action() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <?php
    }
endif;
add_action( 'sparker_head', 'sparker_head_action', 10 );

/* -----------------------
* Header skip link hook of the theme.
* @since 1.0.0
* @package Sparker
----------------------- */
if ( ! function_exists( 'sparker_skip_link_head' ) ) :
    /**
     * Header skip link hook of the theme.
     *
     * @since 1.0.0
     */
    function sparker_skip_link_head() {
    ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sparker' ); ?></a>
	<?php
    }
	endif;
add_action( 'sparker_skip_link_action', 'sparker_skip_link_head', 10 );

/* -------------------------
* Header section start wrapper theme.
* @since 1.0.0
* @package Sparker
------------------------- */
if ( ! function_exists( 'sparker_header_start_wrapper' ) ) :
    /**
     * Header section start wrapper theme.
     *
     * @since 1.0.0
     */
    function sparker_header_start_wrapper() {
    ?>
		<div id="page">
	<?php
    }
	endif;
add_action( 'sparker_header_start_wrapper_action', 'sparker_header_start_wrapper', 10 );


/* -------------------------
* Header section hook of the theme.
* @since 1.0.0
* @package Sparker
------------------------- */
if ( ! function_exists( 'sparker_header_section' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function sparker_header_section() {
    ?>

	<header role="header">
		<?php
		global $sparker_theme_options;
		$sparker_theme_options        = sparker_get_theme_options();
		$sparker_header_search        = $sparker_theme_options['sparker-header-search'];
		$sparker_header_social        = $sparker_theme_options['sparker-header-social'];
		?>
			<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="social-links">
								<?php 
								if (has_nav_menu('social') && $sparker_header_social == 1 )
								 {
								wp_nav_menu( array( 'theme_location' => 'social', 'menu_class
										' => 'nav navbar-social' ) ); 
								 }
								?>
								
							</div>
						</div>
						<div class="col-sm-8">
							<?php
								$sparker_header_search  = $sparker_theme_options['sparker-header-search'];
								if ($sparker_header_search == 1 ): 
							?>
							<div id="search-form">
								<div class="top-search-wrapper">
							        <?php 
										get_search_form();
									?>
								</div>
						    </div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php
	    }
	endif;
	add_action( 'sparker_header_section_action', 'sparker_header_section', 10 );


/* ----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package Sparker
----------------------- */
if ( ! function_exists( 'sparker_header_lower_section' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function sparker_header_lower_section() {
    ?>

	<div class="header-lower">
    	<div class="container">
    		<!-- Main Menu -->
            <nav class="main-menu">
    			<div class="logo-header-inner">
                   <?php
                      if (has_custom_logo()) { ?>
                   
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
                    	<?php  the_custom_logo();?>
                    </a>
                  <?php } 
                  	else {
                  ?>  
                    <div class="togo-text">
                    	<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
						endif; ?>
                    </div>
                 <?php } ?>   
				</div>
            	<div class="navbar-header">
                    <!-- Toggle Button -->    	
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    	<span class="sr-only"><?php _e('Toggle navigation', 'sparker');?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse clearfix">
                	<div class="navbar-right">
						<?php 
							if ( has_nav_menu('primary'))
								{
									wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'navigation' ) ); 
								}
							  else
							  { ?>
							  	<ul class="navigation">
				                    <li class="menu-item">
				                        <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php esc_html_e('Add a menu','sparker'); ?></a>
				                    </li>
				                </ul>
						<?php }		
						?>
					</div>
				</div><!-- /.navbar-collapse -->
				
			</nav>
		</div>
	</div>
	<?php
    }
	endif;
add_action( 'sparker_header_lower_section_action', 'sparker_header_lower_section', 10 );

/* ----------------------
* Header end wrapper section hook of the theme.
* @since 1.0.0
* @package Sparker
---------------------- */
if ( ! function_exists( 'sparker_header_end_wrapper' ) ) :
    /**
     * Header end wrapper section hook of the theme.
     *
     * @since 1.0.0
     */
    function sparker_header_end_wrapper() { ?>
	<div id="content" class="site-content">
		<?php if( !is_page_template('elementor_header_footer') ){ ?>
			<div class="container">
			<div class="row">
		
		<?php
		}
    }
	endif;
add_action( 'sparker_header_end_wrapper_action', 'sparker_header_end_wrapper', 10 );