<?php
/**
 * The template for displaying search result pages.
 *
 * @package Hooniverse
 */

get_header(); ?>

<div id="content" class="site-content">
	<main id="primary" class="content-area" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				/* We're using this code instead of searchform.php because
				   searchform.php is much too generic and is also called by
				   the search in navigation. */
				$searchquery = get_search_query(); ?>
				<span class="page-title">Search Results for</span>
				<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ) ?>">
					<label>
						<span class="screen-reader-text"><?php echo $searchquery; ?></span>
						<input type="search" class="search-field" placeholder="<?php echo $searchquery; ?>" value="" name="s" title="<?php echo $searchquery; ?>">
					</label>
				</form>
			</header><!-- .page-header -->

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( '_inc/templates/content' ); ?>

			<?php endwhile; ?>

			<?php hooniverse_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( '_inc/templates/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>
