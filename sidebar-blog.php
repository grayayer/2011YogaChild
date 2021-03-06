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

		<div id="secondary" class="widget-area blog" role="complementary">
        	<!-- This is where one could use a featured image and 2nd content region, if one so wished
            <div id="sidebar-featured-image">
            	<img src="<?php // bloginfo('stylesheet_directory'); ?>/images/yoga-blog-352px.jpg" width="352" height="234" />
	        	<div id="wyswig-content"><?php // the_block('sidebar content - before widget'); ?></div>
            </div>
			
            <div id="sidebar-wyswig-content">
			</div>
           -->        
        
			<?php if ( ! dynamic_sidebar( 'blog-widget' ) ) : ?>

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