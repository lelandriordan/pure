<?php
/**
 * Custom template tags
 */

if ( ! function_exists( 'pure_pagination' ) ) :
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

if ( ! function_exists( 'pure_meta' ) ) :
	/**
	 * Displays post meta
	 */
	function pure_meta() { ?>
		<time class="published entry-date" datetime="<?php echo get_the_time('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
		<p class="byline author vcard"><?php echo __('By', 'pure'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn" itemprop="author"><?php echo get_the_author(); ?></a></p>
		<?php
	}
endif;

if ( ! function_exists( 'pure_post_thumbnail' ) ) :
	/**
	 * Displays the post thumbnail
	 */
	function pure_post_thumbnail() {
		if ( has_post_thumbnail() ) {
		  the_post_thumbnail('full', array('itemprop' => 'image'));
		}
	}
endif;