<?php
/**
 * Pure's basic template for single pages
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<div>
		<?php the_content(); ?>
	</div>
	<footer></footer>
</article>