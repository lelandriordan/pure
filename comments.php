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
	<?php endif; // have_comments ?>

	<?php comment_form(); ?>
</div>