<?php
/**
 * Pure's basic post template
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php 
		if ( has_post_thumbnail() ) {
		  the_post_thumbnail();
		} 
		?>
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header>
	<div class="entry-content">
		<?php the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'pure' ) ); ?>
	</div>
	<footer></footer>
</article>