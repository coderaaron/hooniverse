<?php
/**
 * The template for displaying all single posts.
 *
 * @package Hooniverse
 */

get_header();

// Feature image if there's a thumbnail and the toggle is on.
if ( 0 !== get_post_thumbnail_id() ) {
	get_template_part( '_inc/templates/page-thumbnail-img-showcase' );
}
?>

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
