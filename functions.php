<?php 
// Saftey first.
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'functions.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly!');

// Thumbnail Support
add_theme_support( 'post-thumbnails' );

// load up jQuery and Twitter Bootstrap
if( !is_admin()){
   wp_deregister_script('jquery'); 
   wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"), false, '1.7.2'); 
   wp_enqueue_script('jquery');

   wp_register_script('bootstrap', (get_bloginfo('template_directory') .'/js/bootstrap.min.js'), false, '2.0'); 
   wp_enqueue_script('bootstrap');
}

/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/lib/admin/options-framework/' );
	require_once dirname( __FILE__ ) . '/lib/admin/options-framework/options-framework.php';

	define( 'IS_FLUID', of_get_option('responsive_theme'));
	define( 'USE_FACEBOOK_COMMENTS', of_get_option('use_facebook_comments'));
}

// Add awesome brower classes to body tag
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}

// Remove usless the_generator meta tag - whoops
add_filter( 'the_generator', create_function('$a', "return null;") );

// Custom Logo
function custom_logo() { ?> 
	<style type="text/css">
		h1 a { background-image: url(
			<?php get_bloginfo('template_directory'); ?>/img/logo-login.gif
		) !important; }
    </style>
<?php }

add_action('login_head', 'custom_logo');

// Admin Footer
function remove_footer_admin () {
	echo 'Powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a> Theme built by <a href="http://48Web.com" target="_blank">48Web/</a>';
}

add_filter('admin_footer_text', 'remove_footer_admin');

// Sidebars
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Sidebar',
	'before_widget' => '<li class="widget">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h3>',
));

// menu support
function theme_addmenus() {
	register_nav_menus(
		array(
			'primary-menu' => 'Main Navigation Menu',
		)
	);
}
add_action( 'init', 'theme_addmenus' );