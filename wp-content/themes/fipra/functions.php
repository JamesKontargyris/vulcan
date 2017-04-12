<?php
/**
 * fipradotcom functions and definitions
 *
 * @package fipradotcom
 */

// Customization settings / sections / controls
require_once 'inc/customization.php';
require_once 'inc/custom_post_types.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
	$content_width = 940; /* pixels */
}

if (!function_exists('fipradotcom_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	/**
	 *
	 */
	function fipradotcom_setup()
	{

		//        Use the site stylesheet in the content editor, so content looks as it would on the front-end
		add_editor_style('style.css');

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fipradotcom, use a find and replace
		 * to change 'fipradotcom' to the name of your theme in all the template files
		 */
		load_theme_textdomain('fipradotcom', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
//	add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support('post-thumbnails');

		/*
		 * Enable support for the custom logo option in the customiser
		 */
		add_theme_support('custom-logo');

		// This theme uses wp_nav_menu() in three locations.
		register_nav_menus(
			[
				'primary' => __('Main Menu', 'fipradotcom'),
				'legal' => __('Legal Links Menu', 'fipradotcom')
			]
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support('post-formats', array('aside'));

		// Set up the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'fipradotcom_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );
	}
endif; // fipradotcom_setup
add_action('after_setup_theme', 'fipradotcom_setup');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fipradotcom_widgets_init()
{
	register_sidebar([
		'name' => __('Page Sidebar', 'fipradotcom'),
		'id' => 'sidebar-1',
		'description' => 'Displays widgets in the sidebar of standard pages',
		'before_widget' => '<aside>',
		'after_widget' => '</aside>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	]);
	register_sidebar([
		'name' => __('Sub-Nav Bar', 'fipradotcom'),
		'id' => 'sub-nav-bar',
		'description' => 'Displays widgets in the sub-nav bar on each page',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	]);
	register_sidebar([
		'name' => __('Footer Left', 'fipradotcom'),
		'id' => 'footer-left',
		'description' => 'Displays widgets in the left-third of the page footer (1st row on mobile devices)',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	]);
	register_sidebar([
		'name' => __('Footer Middle', 'fipradotcom'),
		'id' => 'footer-middle',
		'description' => 'Displays widgets in the middle-third of the page footer (2nd row on mobile devices)',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	]);
	register_sidebar([
		'name' => __('Footer Right', 'fipradotcom'),
		'id' => 'footer-right',
		'description' => 'Displays widgets in the right-third of the page footer (3rd row on mobile devices)',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	]);
	register_sidebar([
		'name' => __('Site Info Bar', 'fipradotcom'),
		'id' => 'site-info',
		'description' => 'Displays widgets in the site info bar below the page footer',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	]);
	register_sidebar([
		'name' => __('Dynamic Code and Content', 'fipradotcom'),
		'id' => 'dynamic-code',
		'description' => 'Dynamic code added after the body tag on each page',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	]);
	register_sidebar([
		'name' => __('Header', 'fipradotcom'),
		'id' => 'header',
		'description' => 'Display widgets in the header next to the search bar on desktop screens',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	]);
}

add_action('widgets_init', 'fipradotcom_widgets_init');

// unregister widgets we won't use
function remove_default_widgets() {
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Widget_Recent_Comments');
	/*unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Search');*/
//    unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_RSS');
//    unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'remove_default_widgets', 11);

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


//User functions
function fipra_sitewide_search_form($form)
{
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
	<div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search site..." />
	<button class="button-search"><i class="icon-search"></i><span class="screen-reader-text"> ' . esc_attr__('Search') . '</span></button>
	</div>
	</form>';

	return $form;
}

//Extend the text widget to remove the wrapping <div>
add_action( 'widgets_init', function()
{
	register_widget( 'Raw_Text_Widget' );
});

class Raw_Text_Widget extends WP_Widget_Text {
	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text;
		echo $after_widget;
	}
}

/*
  Plugin Name: case-insensitive-url
  Plugin URI: http://www.unfocus.com/projects/
  Description: A plugin to make wordpress case insensitive in regards to urls.
  Version: 1.0a
  Author: Kevin Newman
  Author URI: http://www.unfocus.com/projects/
  */
function case_insensitive_url() {
	if (preg_match('/[A-Z]/', $_SERVER['REQUEST_URI'])) {
		$_SERVER['REQUEST_URI'] = strtolower($_SERVER['REQUEST_URI']);
//        $_SERVER['PATH_INFO']   = strtolower($_SERVER['PATH_INFO']);
	}
}
add_action('init', 'case_insensitive_url');

add_filter('get_search_form', 'fipra_sitewide_search_form');

// Post Thumbnail sizes
add_image_size( 'profile-photo', 300, 300, true );
add_image_size( 'banner', 1500, 1000, true );
add_image_size( 'article', 600, 600, true );

function get_master_page_id() {
	global $wp_query;
	return isset($wp_query->post->ID) ? $wp_query->post->ID : false;
}

/**
 * Allow svg files to be uploaded by default
 * @param $mimes
 * @return mixed
 */
function svg_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;}
add_filter( 'upload_mimes', 'svg_mime_types' );

/**
 * Ensure svg previews display correctly on admin pages
 */
function svg_size() {
	echo '<style>
    svg, img[src*=".svg"] {
      max-width: 150px !important;
      max-height: 150px !important;
    }
  </style>';
}
add_action('admin_head', 'svg_size');

/**
 * Change the TinyMCE WYSIWYG editor settings to allow empty <i> tags (for icons)
 *
 * @param $init
 * @return mixed
 */
function change_mce_options( $init ) {
	$init['extended_valid_elements'] = 'i[*]';
	return $init;
}
add_filter('tiny_mce_before_init', 'change_mce_options');

add_filter('wp_insert_post_data', 'my_add_ul_class_on_insert');
function my_add_ul_class_on_insert( $postarr ) {
	$postarr['post_content'] = str_replace('<ul>', '<ul class="bullets">', $postarr['post_content'] );
	return $postarr;
}

/**
 * Rewrite rule that ensures pagination works
 */
function pseudo_archive_rewrite(){
	// Add the slugs of the pages that are using a Global Template to simulate being an "archive" page
	$pseudo_archive_pages = array(
		"news-archive",
	);

	$slug_clause = implode( "|", $pseudo_archive_pages );
	add_rewrite_rule( "($slug_clause)/page/([0-9]{1,})/?$", 'index.php?pagename=$matches[1]&paged=$matches[2]', "top" );
	add_rewrite_rule( "($slug_clause)/(.*)/page/([0-9]{1,})/?$", 'index.php?pagename=$matches[1]&paged=$matches[2]', "top" );
}
add_action( 'init', 'pseudo_archive_rewrite' );

/*
 * Add custom post types (just news as of 10/04/2017) to category and tag paginated results
 */
function add_custom_types($query) {
	if (is_category() || is_tag() && empty($query->query_vars['suppress_filters'])) {
		$query->set('post_type',[
			'post',
			'nav_menu_item',
			'news',
		]);
		return $query;
	}
}

add_filter('pre_get_posts','add_custom_types');

//Function to sanitise filenames
function sanitise_filename($file)
{
// Remove anything which isn't a word, whitespace, number
// or any of the following caracters -_~,;[]().
// If you don't need to handle multi-byte characters
// you can use preg_replace rather than mb_ereg_replace
	$file = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $file);
// Remove any runs of periods
	$file = mb_ereg_replace("([\.]{2,})", '', $file);

	return $file;
}
/*
 * Set / get post views (used to display popular articles)
 */
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count.' Views';
}
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Add custom brand colours to WYSIWYG editor
function fipra_change_tinymce_colors( $init ) {
	$default_colours = '
        "000000", "Black",
        "993300", "Burnt orange",
        "333300", "Dark olive",
        "003300", "Dark green",
        "003366", "Dark azure",
        "000080", "Navy Blue",
        "333399", "Indigo",
        "333333", "Very dark gray",
        "800000", "Maroon",
        "FF6600", "Orange",
        "808000", "Olive",
        "008000", "Green",
        "008080", "Teal",
        "0000FF", "Blue",
        "666699", "Grayish blue",
        "808080", "Gray",
        "FF0000", "Red",
        "FF9900", "Amber",
        "99CC00", "Yellow green",
        "339966", "Sea green",
        "33CCCC", "Turquoise",
        "3366FF", "Royal blue",
        "800080", "Purple",
        "999999", "Medium gray",
        "FF00FF", "Magenta",
        "FFCC00", "Gold",
        "FFFF00", "Yellow",
        "00FF00", "Lime",
        "00FFFF", "Aqua",
        "00CCFF", "Sky blue",
        "993366", "Brown",
        "C0C0C0", "Silver",
        "FF99CC", "Pink",
        "FFCC99", "Peach",
        "FFFF99", "Light yellow",
        "CCFFCC", "Pale green",
        "CCFFFF", "Pale cyan",
        "99CCFF", "Light sky blue",
        "CC99FF", "Plum",
        "FFFFFF", "White"
        ';
	$custom_colours = '"' .
	                  str_replace('#', '', get_theme_mod('primary_color', '00257f')) . '", "Primary Colour", "' .
	                  str_replace('#', '', get_theme_mod('secondary_color', '14b1cc')) . '", "Secondary Colour", "' .
	                  str_replace('#', '', get_theme_mod('tertiary_color', '5F697F')) . '", "Tertiary Colour", "' .
	                  str_replace('#', '', get_theme_mod('body_text_color', '222222')) . '", "Body Text Colour", "' .
	                  str_replace('#', '', get_theme_mod('body_background_color', 'ffffff')) . '", "Body Background Colour",
    ';
	$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';
	$init['textcolor_rows'] = 6; // expand colour grid to 6 rows
	return $init;
}
add_filter('tiny_mce_before_init', 'fipra_change_tinymce_colors');


