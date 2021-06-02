<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Hooniverse
 */

get_header(); ?>

<div id="content" class="site-content">
	<main id="primary" class="content-area" role="main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'That page can&rsquo;t be found.', 'hooniverse' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'hooniverse' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>
