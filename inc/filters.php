<?php
/**
 * The theme's filters
 * Eventually other solutions may replace some of these
 */

/**
 * Pagination link class filter
 * Changes the class of the pagination links
 */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
	return 'class="pure-button"';
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