<?php
/**
 * Pure's template for displaying pages
 */
?>
<article>
	<header>
		<?php pure_post_thumbnail(); ?>
		<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
		<?php pure_meta() ?>
	</header>
	<div class="entry-content" itemprop="mainContentOfPage">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pure' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<footer>
	</footer>
	<?php
		// Load the comment template if they are open or if there is at least one comment
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	?>
</article>