<?php
/**
 * The template for displaying comments
 */

/**
 * If post password required, don't load the comments
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	
	<?php if ( have_comments() ) : ?>
		<h1 class="comments-title">
			<?php
				printf( _nx( '1 comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'pure' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h1>
		
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style' => 'ol'
				) );
			?>
		</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'pure' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'pure' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'pure' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments ?>

	<?php
		// If comments are closed and there are comments, leave a message
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'pure' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>