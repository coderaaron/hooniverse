<?php
/**
 * The template for displaying all single posts.
 *
 * @package Chauvenet
 */

get_header(); ?>

<div id="content" class="site-content">
	<main id="primary" class="content-area" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( '_inc/templates/content', 'single' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) {
				comments_template();
			} ?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>
