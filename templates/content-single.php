<?php
/**
 * Pure's basic template for single pages
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php pure_post_thumbnail(); ?>
		<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
		<?php pure_meta() ?>
	</header>
	<div class="entry-content" itemprop="mainContentOfPage">
		<?php the_content(); ?>
	</div>
	<footer></footer>
</article>