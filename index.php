<?php
/**
 * Pure's main template file
 */
get_header(); ?>
<main id="main" class="site-main" role="main">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/content', get_post_format() ); ?>

		<?php endwhile; ?>

		<?php pure_pagination() ?>

	<?php else : ?>

		<?php get_template_part( 'templates/content', 'none' ); ?>

	<?php endif; ?>
</main>
<?php get_footer(); ?>