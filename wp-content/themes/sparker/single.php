<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
 * @package sparker
 */
get_header();
global $sparker_theme_options;

$designlayout = $sparker_theme_options['sparker-layout'];

$side_col = 'right-s-bar ';

if( 'left-sidebar' == $designlayout ){

	$side_col = 'left-s-bar';
}
?>
<div id="primary" class="content-area col-sm-8 col-md-8 <?php echo esc_attr( $side_col );?>">
		<main id="main" class="site-main" role="main">
			<?php
				while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content','single'); ?>
					<div class-"clearfix"></div>
					<?php 
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				<?php
				endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();

