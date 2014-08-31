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
	function pure_meta() {
		
	}
endif;