<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Hooniverse
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! is_front_page() && ! get_field( 'show_page_title_in_showcase' ) ) { ?>
		<header class="page-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header><!-- .page-header -->
	<?php } ?>

	<div class="page-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'hooniverse' ),
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- .page-content -->
	<?php
	if ( ! is_admin_bar_showing() ) {
		edit_post_link( __( 'Edit', 'hooniverse' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' );
	}
	?>
</article><!-- #post-## -->
