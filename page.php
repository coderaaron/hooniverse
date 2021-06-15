<?php
/**
 * The template for displaying full width pages. Sidebar not included.
 *
 * @package Hooniverse
 */

get_header();

// Feature image if there's a thumbnail and the toggle is on.
if ( 0 !== get_post_thumbnail_id() ) {
	get_template_part( '_inc/templates/page-thumbnail-img-showcase' );
}

while ( have_posts() ) {
	the_post();

	// Going to only condensed header means always false?
	if ( ! empty( get_the_content() ) || false ) { ?>

	<div id="content" class="site-content">
		<main id="primary" class="content-area" role="main">

			<?php get_template_part( '_inc/templates/content', 'page' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' !== get_comments_number() ) {
				comments_template();
			}
			?>

		</main><!-- #primary -->
	</div><!-- #content -->

	<?php }
} // end of the loop.

get_footer(); ?>
