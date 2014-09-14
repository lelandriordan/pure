<?php
/**
 * Pure's functions
 */

if ( ! isset( $content_width ) ) {
	$content_width = 700; /* pixels */
}

if ( ! function_exists( 'pure_setup' ) ) :
/**
 * Set up theme defaults and add WordPress features
 */
function pure_setup() {
	/**
	 * Load theme text domain and make theme available for transalation
	 */
	load_theme_textdomain( 'pure', get_template_directory() . '/languages' );

	/**
	 * Register navigation menus
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pure' ),
		'footer' => __( 'Footer Menu', 'pure' ),
	) );

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add post thumbnails
	 */
	add_theme_support( 'post_thumbnails' );
	
	/**
	 * Enable post formats
	 */
	add_theme_support( 'post-formats', array( 'image', 'video' ) );

	/**
	 * Use HTML5 markup
	 */
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery'
	) );
}
endif; // End pure_setup
add_action( 'after_setup_theme', 'pure_setup' );

/**
 * Register Siderbars and default widgets
 */
function pure_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'pure' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'pure_widgets_init');

/**
 * Enqueue Stylesheets and JavaScripts
 */
function pure_scripts() {
	/**
	 * Stylesheets
	 */
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/bower_components/font-awesome/css/font-awesome.min.css', array(), '4.1.0' );
	wp_enqueue_style( 'pure-css', get_template_directory_uri() . '/assets/bower_components/pure/pure-min.css', array(), '0.5.0', 'all' );
	wp_enqueue_style( 'pure-responsive-grid', get_template_directory_uri() . '/assets/bower_components/pure/grids-responsive-min.css', array( 'yahoo-pure' ), '0.5', 'all' );
	wp_enqueue_style( 'pure-style', get_stylesheet_uri() );

	/**
	 * JavaScripts
	 */
}
add_action( 'wp_enqueue_scripts', 'pure_scripts' );

/**
 * Custom template tags
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom filters
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Schema.org markup handlers
 */
require get_template_directory() . '/inc/schema.php';