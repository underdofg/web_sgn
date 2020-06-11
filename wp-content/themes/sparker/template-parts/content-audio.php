<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparker
 */
global $sparker_theme_options;
 $sparker_read_more = esc_html( $sparker_theme_options['sparker-read-more-text'] );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('boxed'); ?>>
	<div class="post-wrapper">
		<div class="post-thumb">
			<?php
			    $content = apply_filters( 'the_content', get_the_content() );
			    $audio = false;
			    # Only get audio from the content if a playlist isn't present.
			    if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			        $audio = get_media_embedded_in_content( $content, array( 'audio', 'iframe' ) );
			    }
			?>
			<!--post thumbnal options-->
			<?php
			    if ( ! empty( $audio ) ) {
			        foreach ( $audio as $audio_html ) {
			            echo '<div class="sparker-audio-section">';
			                echo $audio_html;
			            echo '</div>';
			        }
			    }
			?>
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
					<?php  } ?>
				    </span>
				    <span class="post-category">
				    	<?php
	                       $categories = get_the_category();
	                       if ( ! empty( $categories ) ) {
	                          echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" title="Audio Post Format">'.esc_html( $categories[0]->name ).'</a>';
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
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

			<div class="post-footer">
					<div class="post-footer-right">
						<span><i class="fa fa-commenting-o"></i> <?php echo get_comments_number(); ?> <a href="<?php comments_link(); ?>"><?php echo esc_html('Comments') ?></a> </span>
					</div>
				<a href="<?php the_permalink(); ?>" class="btn btn-more">
					<?php echo $sparker_read_more; ?> 
				</a>
			</div>
		</div> 
	</div>
</article><!-- #post-## -->
