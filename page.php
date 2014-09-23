<?php
/**
 * Pure's template for displaying pages
 */
get_header(); ?>

<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/content', 'page' ); ?>

			<?php
				// Load the comment template if they are open or if there is at least one comment
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; ?>

</main>

<?php get_footer(); ?>