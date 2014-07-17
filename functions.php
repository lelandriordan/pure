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
add_action( 'after_theme_setup', 'pure_setup' );

/**
	* Add menus
	* TODO: MOVE BACK INTO SETUP FUNCTION LIKE _S?
	*/
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'pure' ),
	'footer' => __( 'Footer Menu', 'pure' ),
) );

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
 * Schema.org html tags
 * Changes the <html> 
 * TODO move this to components/template tags
 */
function pure_html_tag_schema() {

	/**
	 * Base URL
	 */
	$schema = 'http://schema.org/';

	/**
	 * Single Posts
	 */
	if ( is_single() ) {
		$type = 'Article';
	}

	/**
	 * Author Pages
	 */
	elseif ( is_author() ) {
		$type = 'ProfilePage';
	}

	/**
	 * Search Results
	 */
	elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	}

	/**
	 * Add site specific pages and custom post types here
	 */
	
	/**
	 * All other pages
	 */
	else {
		$type = 'WebPage';
	}

	echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}

/**
 * Entry Meta
 */
function pure_meta() {
	
}

if ( ! function_exists( 'pure_pagination' )) :
	/**
	 * Pagination
	 * Displays Next/Previous page links
	 */
	function pure_pagination() {
		// Show nothing if there is only one page
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav class="pagination">
			<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'pure' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'pure' ) ); ?></div>
			<?php endif; ?>
		</nav><!-- .pagination -->
		<?php
	}
endif;

/**
 * Pagination link class filter
 * Changes the class of the pagination links
 */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="pure-button"';
}