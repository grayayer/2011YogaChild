<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<div id="site-generator">

<?php
   if (is_user_logged_in()) {
      $user = wp_get_current_user();
      echo 'Welcome back <strong>'.$user->display_name.'</strong> | <a href="http://yogaunioncwc.com/wp-login.php?action=logout&_wpnonce=34a8f98cca">Log Out</a>';
   } else { ?><a href="http://wordpress.org/">Proudly powered by Wordpress</a> | 
      <strong><?php wp_loginout(); ?></strong>
      or <a href="<?php echo get_option('home'); ?>/wp-login.php?action=register"><strong>Register</strong></a>
<?php } ?>

                
                		<p class="copyright"><?php _e('Copyright',woothemes); ?> &copy; <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>"><?php bloginfo('title'); ?></a> <?php echo date('Y'); ?>. <?php _e('All Rights Reserved.',woothemes); ?></p>
		
		<p class="credit">Web Design & Development by <a href="http://www.studiok40.com" target="_blank">Gray Ayer</a>	
        </p>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/clear_input.js">
</body>
</html>