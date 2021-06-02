<?php
/**
 * @package Chauvenet
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
	<header class="entry-header">
		<?php
		// Post categories
		$category_list = chauvenet_list_categories( get_the_ID() );
		if ( $category_list != '' ) {
			echo '<div class="entry-categories">
				' . $category_list . "
			</div>\n\r";
		} ?>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php chauvenet_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php

	// Feature image if there's a thumbnail and the toggle is on.
	if ( has_post_thumbnail() && ( get_post_meta( $post->ID, '_washu_featured_image_toggle', true ) == 'true' ) ) {
		get_template_part( '_inc/templates/post-thumbnail-img' );
	} ?>

	<div class="entry-content">
		<?php if ( get_field( 'washu_external_url') != null ) { ?>
			<a class='button-primary' href='<?php the_field( 'washu_external_url' ); ?>'>View Content</a>
		<?php } ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'chauvenet' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			$tag_list = get_the_tag_list();

			// If there are tags associated with this content, print them out
			if ( '' != $tag_list ) {
				$meta_text = __( '<div class="entry-tags">%1$s</div>', 'chauvenet' );
			} else {
				$meta_text = '';
			}

			printf(
				$meta_text,
				$tag_list
			);
		?>

		<?php
		if ( !is_admin_bar_showing() ) {
			edit_post_link( __( 'Edit', 'chauvenet' ), '<span class="edit-link">', '</span>' );
		}
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
