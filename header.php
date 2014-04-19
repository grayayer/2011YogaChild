<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<!--<link rel="stylesheet" type="text/css" media="handheld" href="<?php // bloginfo('stylesheet_directory'); ?>/css/mobile.css"/> -->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<!-- tracks Outbound Links -->
<script type="text/javascript">
function recordOutboundLink(link, category, action) {
  try {
    var myTracker=_gat._getTrackerByName();
    _gaq.push(['myTracker._trackEvent', category ,  action ]);
    setTimeout('document.location = "' + link.href + '"', 100)
  }catch(err){}
}
</script>
<!-- end tracks Outbound Links -->


</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed">
	<header id="branding" role="banner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span id="header"></span>
      </a><!-- end div #header -->
      
      <span class="socialmedia-buttons smw_right">
                  <a alt="Follow Us on Facebook" title="Follow Us on Facebook"  href="https://www.facebook.com/YogaUnionCWC" rel="nofollow" target="_blank" onClick="recordOutboundLink(this, 'Outbound Links', 'facebook.com/YogaUnionCWC');return false;"><span class="icon-facebook-3"></span></a>
                  <a alt="Follow Us on Twitter" title="Follow Us on Twitter" class="fade" href="https://twitter.com/YogaUnionCWC" rel="nofollow" target="_blank" onClick="recordOutboundLink(this, 'Outbound Links', 'twitter.com');return false;"><span class="icon-twitter"></span></a>
                  <a alt="Follow Us on Yelp" title="Check out our reviews on Yelp" class="fade" href="http://www.yelp.com/biz/yoga-union-portland-2" rel="nofollow" target="_blank" onClick="recordOutboundLink(this, 'Outbound Links', 'yelp.com');return false;"><span class="icon-yelp"></span></a>
                  <a alt="Send us an e-mail" title="Send us an e-mail"  class="fade"  href="mailto:info@yogaunioncwc.com" rel="nofollow" target="_blank" onClick="recordOutboundLink(this, 'Outbound Links', 'email-header-button.com');return false;"><span class="icon-mail-2"></span></a>
       </span><!-- #social media buttons -->    
	</header><!-- #branding -->

			<div id="navbar">
              <nav id="access" role="navigation">
                  <h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
                  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
                  <div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
                  <div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
                  <?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
                  <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?> 
	              <?php get_search_form(); ?>
              </nav><!-- #access -->
			</div>

	<div id="main">