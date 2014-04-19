<?php 

/*********Gray's custom funcitons***********/

function custom_excerpt_length( $length ) {
    return 280; //Change this number to any integer you like.
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );

function custom_excerpt_more($more)
{
  return  ' &hellip;<br />' . '<a href="'. get_permalink($post->ID) . '">' . 'Continue Reading: '. get_the_title() . '</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');

add_image_size( 'page-sidebar-featured-image',  352, 291, true ); // Hard Crop Mode

add_image_size( 'announcement-thumb', 150, 194, true ); // Hard Crop Mode

/* Remove the "Links" Menu Item */
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
     remove_menu_page('link-manager.php');
}


/*create a widget area for the header*/
register_sidebar( array(  
    'name' => __( 'Header Widget', 'twentyeleven-child' ),  
    'id' => 'header-widget',  
    'before_widget' => '<div id="%1$s" class="widget %2$s">',  
    'after_widget' => "</div>",  
    'before_title' => '<h3 class="widget-title">',  
    'after_title' => '</h3>',  
) );  

    function techild_header_widget(){  
        if ( ! dynamic_sidebar( 'header-widget' ) ) :  
            get_search_form();  
        endif;  
    }  

/*create a widget area for the homepage header*/
register_sidebar( array(  
    'name' => __( 'Homepage Header Widget', 'twentyeleven-child' ),  
    'id' => 'home-header-widget',  
    'before_widget' => '<div id="%1$s" class="widget %2$s">',  
    'after_widget' => "</div>",  
    'before_title' => '<h3 class="widget-title">',  
    'after_title' => '</h3>',  
) );  
	
	    function techild_home_header_widget(){  
        if ( ! dynamic_sidebar( 'home-header-widget' ) ) :  
        endif;  
    }

/*create a widget area for the blog pages*/
register_sidebar( array(  
    'name' => __( 'Blog Widget', 'twentyeleven-child' ),  
    'id' => 'blog-widget',  
    'before_widget' => '<div id="%1$s" class="widget %2$s">',  
    'after_widget' => "</div>",  
    'before_title' => '<h2 class="widget-title">',  
    'after_title' => '</h2>',  
) );  

/*create a widget area for the home page*/
register_sidebar( array(  
    'name' => __( 'Homepage Sidebar Widget', 'twentyeleven-child' ),  
    'id' => 'home-widget',  
    'before_widget' => '<div id="%1$s" class="widget %2$s">',  
    'after_widget' => "</div>",  
    'before_title' => '<h2 class="widget-title">',  
    'after_title' => '</h2>',  
) );  


// Remove the default Twenty Ten classess
function remove_twentyeleven_body_classes() {
    remove_action('body_class','twentyeleven_body_classes');
}
// Call 'remove_twentyeleven_body_classes' (above) during WP initialization
add_action('init','remove_twentyeleven_body_classes');

// adds back the default Twenty Ten classess of "single-author"
function YogaUnion_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}

// custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
	.login h1 a { background-image: url('.get_bloginfo('stylesheet_directory').'/images/custom-login-logo.png) !important; padding-bottom: 190px !important; background-size: 324px 246px; height: auto; width:326px;}
	#login { padding: 50px 0 0; }
	</style>';
}
add_action('login_head', 'custom_login_logo');


/*
// changing the login page URL
    function put_my_url(){
    return bloginfo('url'); // changes the url link from wordpress.org to your blog or website's url
    }
    add_filter('login_headerurl', 'put_my_url');
// changing the login page URL hover text
    function put_my_title(){
    return bloginfo('name'); // changing the title from "Powered by WordPress" to whatever you wish
    }
    add_filter('login_headertitle', 'put_my_title');
*/

//Turn On More Buttons in the WordPress Visual Editor
function add_more_buttons($buttons) {
 $buttons[] = 'hr';
 $buttons[] = 'del';
 $buttons[] = 'sub';
 $buttons[] = 'sup';
 $buttons[] = 'fontselect';
 $buttons[] = 'fontsizeselect';
 $buttons[] = 'cleanup';
 $buttons[] = 'styleselect';
 return $buttons;
}

add_filter("mce_buttons_3", "add_more_buttons");

//Allow SVG through WordPress Media Uploader

function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

?>