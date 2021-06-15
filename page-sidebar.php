<?php
/**
 * Template Name: Sidebar
 *
 * The template for displaying all pages.
 *
 * @package Hooniverse
 */

get_header();

// Feature image if there's a thumbnail and the toggle is on.
if ( has_post_thumbnail() ) {
	get_template_part( '_inc/templates/page-thumbnail-img' );
} ?>

<div id="content" class="site-content">
	<main id="primary" class="content-area" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( '_inc/templates/content', 'page' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) {
				comments_template();
			} ?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- #content -->

<?php get_footer(); ?>
