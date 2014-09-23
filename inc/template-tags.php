<?php
/**
 * Custom template tags
 */

if ( ! function_exists( 'pure_page_nav' ) ) :
	/**
	 * Display Next/Previous page links
	 */
	function pure_page_nav() {
		// Show nothing if there is only one page
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav class="page-nav">
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


if ( ! function_exists('pure_post_nav') ) :
/**
 * Display next/previous post links on single posts
 */
function pure_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'pure' ); ?></h1>
		<div class="post-nav">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'pure' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'pure' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'pure_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function pure_meta() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'pure' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'pure' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="entry-meta posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;


if ( ! function_exists( 'pure_post_thumbnail' ) ) :
/**
 * Displays the post thumbnail
 */
function pure_post_thumbnail() {
	/**
	 * Display nothing for password protected posts, attachments or no featured image
	 */
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() && has_post_thumbnail() ) { 
	/**
	* If the current page/post is singular, and it has a post thumbnail,
	* display the image, but don't wrap it in an unnecessary permalink.
	*/
	?>
	<div class="post-thumbnail">
		<?php the_post_thumbnail('full', array('itemprop' => 'image')); ?>
	</div>

	<?php } elseif ( has_post_thumbnail() ) { 
	/**
	 * Elseif post/page isn't singular, but the post has a post thumbnail,
	 * wrap the image in a permalink.
	 */
	?>
	<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>">
		<?php the_post_thumbnail('full', array('itemprop' => 'image')); ?>
	</a>
	
	<?php } else {
	/**
	 * Otherwise don't display any markup for posts without post thumbails.
	 */
		return;
	}
}
endif; // End pure_post_thumbnail