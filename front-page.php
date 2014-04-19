<?php
/**
 * The front page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>


				<?php twentyeleven_content_nav( 'nav-above' ); ?>
				<h1>Studio Announcements</h1>
                                                               
				<?php $loop = new WP_Query( array( 'post_type' => 'Announcements', 'posts_per_page' => 10 ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                
                    <div class="announcement">
							<!--check if the post has a Post Thumbnail assigned to it, 
							and if so, displays it and links to the "large" Post Thumbnail image size
							and must be used within The Loop. This floats left by default-->

							 <?php 
	                         if ( has_post_thumbnail()) {
	                           $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
	                           echo '<div class="announcement-thumb"><a href="' . $large_image_url[0] . '" title="Click to view full size image" rel="lightbox">';
	                           the_post_thumbnail('announcement-thumb');
	                           echo '</a></div>';
	                         } ?>

                     	<div class="announce-right">
								<?php the_title('<h2 class="announcement">', '</h2>'); ?>
	    
								<?php // check if the announcement has a subtitle assigned to it, and if so, displays it.
	                                $subtitle = get_post_meta($post->ID, 'subtitle', true); 
	                            
	                                if ($subtitle) {
	                                    echo "<h3>$subtitle</h3>";
	                                }
	                            ?>    
	    
	                            <a href="<?php echo get_post_meta($post->ID, 'actionURL', true); ?>" target="_blank" class="actionbutton"><?php echo get_post_meta($post->ID, 'actiontext', true); ?></a>

	                        <?php echo get_post_meta($post->ID, 'Subtitle', true); ?>
							<?php the_content(); ?>
						</div><!--end announce-right-->
						<br style="clear:both;"/>
                    </div><!-- end announcement div -->
                    
				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
            
            
            

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(home); ?>
<?php get_footer(); ?>