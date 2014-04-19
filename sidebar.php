<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>

		<div id="secondary" class="widget-area" role="complementary">
        	
            <div id="sidebar-featured-image">
            	<div class="sidebar-image-round"><!-- makes sure that the image gets clipped -->
			        <?php if ( get_post_meta($post->ID, 'featured image link', true) ) : ?>
					<a href="<?php echo get_post_meta($post->ID, 'featured image link', true); ?>"><?php the_post_thumbnail('page-sidebar-featured-image'); ?></a>
					<?php else : ?>
					<?php the_post_thumbnail('page-sidebar-featured-image'); ?>
					<?php endif; ?>
            	</div>





			    <div class="featured-image-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></div><!--displays the caption, keep this code on one line to avoid extra padding on image-->
                
                <div id="wyswig-content"><?php the_block('sidebar content - before widget'); ?>
                </div>
            </div>
<!--            
<div id="sidebar-wyswig-content">
</div>
-->

        
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
<?php endif; ?>