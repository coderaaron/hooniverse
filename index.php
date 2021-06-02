<?php
/**
 * The main template file.
 *
 * @package Hooniverse
 */

get_header(); ?>

<div id="content" class="site-content">
	<main id="primary" class="content-area" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( '_inc/templates/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php hooniverse_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( '_inc/templates/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>
