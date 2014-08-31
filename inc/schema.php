<?php
/**
 * Adds Schema.org markup
 */

if ( ! function_exists('pure_html_tag_schema') ) :
/**
 * Schema.org html tag
 * Adds the correct schema markup to the <html> attribute based on page content
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
endif;