<?php
/**
 * Pure's template for displaying single posts
 */
get_header(); ?>
<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

		<?php endwhile; ?>

</main>
<?php get_footer(); ?>
