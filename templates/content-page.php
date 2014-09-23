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
	</div>
	<footer>
		
	</footer>
</article>