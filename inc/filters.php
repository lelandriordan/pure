<?php
/**
 * The theme's filters
 * Eventually other solutions may replace some of these
 */

/**
 * Page nav link class filter
 * Adds class to page nav links
 */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
	return 'class="pure-button"';
}

/**
 * Post nav link class filter
 * Adds class to post nav links
 */
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
    $injection = 'class="pure-button"';
    return str_replace('<a href=', '<a '.$injection.' href=', $output);
}

/**
 * Table class filter
 * Adds the .pure-table class to all tables
 * TODO: Double check that this covers all possible table locations
 */
add_filter( 'the_content', 'pure_custom_table_class' );
add_filter( 'comment_text', 'pure_custom_table_class');
add_filter( 'widget_content', 'pure_custom_table_class');

function pure_custom_table_class( $content ) {
	return str_replace('<table>', '<table class="pure-table">', $content);
}

/**
 * Add title to home page
 */
add_filter( 'wp_title', 'pure_wp_title_for_home' );
function pure_wp_title_for_home( $title )
{
	if( empty( $title ) && ( is_home() || is_front_page() ) ) {
		return get_bloginfo('name') . ' | ' . get_bloginfo( 'description' );
	}
	return $title;
}