<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparker
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<!--post thumbnal options-->
		<div class="post-thumb">
			<a href="<?php the_permalink(); ?>">
			 <?php the_post_thumbnail( 'full' ); ?>
			</a>
		</div><!-- .post-thumb-->

		<div class="post-content-wrapper">
			<div class="post-header">
			    <time>
			    	<?php
						if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta">
								<?php sparker_posted_on(); ?>
							</div><!-- .entry-meta -->
						<?php
					endif; ?>
			    </time>
			    <span class="post-tag">
			    	<?php $posttags = get_the_tags();
					if( !empty( $posttags ))
					{
					?>
						<p>
							<?php
								$count = 0;
								if ( $posttags ) 
								{
								  foreach( $posttags as $sparker_tag )
								   {
										$count++;
										if ( 1 == $count )
										  { ?>
										   <a href="<?php echo get_category_link( $sparker_tag ); ?>"><?php echo $sparker_tag->name; ?></a>
									    <?php  }
								    }
			                    } ?>
						</p>
			<?php   } ?>
			    </span>
			    <span class="post-category">
			    	<?php
                       $categories = get_the_category();
                       if ( ! empty( $categories ) ) {
                          echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" title="Post Single">'.esc_html( $categories[0]->name ).'</a>';
                      }                                 
                  ?>
			    </span>
			</div>
			
			<div class="post-title">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</div><!-- .entry-header -->

			<div class="post-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'sparker' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sparker' ),

						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
			<div class="post-order">
				<?php
					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'sparker' ) . '</span> ' .

							'<span class="screen-reader-text">' . __( 'Next post:', 'sparker' ),

						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'sparker' ) . '</span> ' .

							'<span class="screen-reader-text">' . __( 'Previous post:', 'sparker' ),
					) );
					/**
                     * sparker_related_posts hook
                     * 
                     * @since Sparker 1.0.0
                     * @hooked sparker_related_posts
                     */
	                do_action('sparker_related_posts' ,get_the_ID() );
				?>
			</div>
		</div>
	</div>
</article><!-- #post-## -->