<?php
/**
 * Template Name: Full Width Page
 *
 * The template for displaying full width pages. Sidebar not included.
 *
 * @package Hooniverse
 */

get_header();

// Feature image if there's a thumbnail and the toggle is on.
$header_style = get_option( 'hooniverse_header_style' );
if ( $header_style === 'condensed' ) {
	get_template_part( '_inc/templates/page-thumbnail-img-showcase' );
} elseif ( has_post_thumbnail() ) {
	get_template_part( '_inc/templates/page-thumbnail-img' );
}

while ( have_posts() ) : the_post();

	if ( ! empty( get_the_content() ) || $header_style !== 'condensed' ) { ?>

	<div id="content" class="site-content">
		<main id="primary" class="content-area" role="main">

			<?php get_template_part( '_inc/templates/content', 'page' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) {
				comments_template();
			} ?>

		</main><!-- #primary -->
	</div><!-- #content -->

	<?php }

endwhile; // end of the loop.

get_footer(); ?>
