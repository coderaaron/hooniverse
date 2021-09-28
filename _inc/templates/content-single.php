<?php
/**
 * @package Hooniverse
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
	<?php
	// Feature image if there's a thumbnail and the toggle is on.
	/* if ( has_post_thumbnail() ) {
		get_template_part( '_inc/templates/post-thumbnail-img' );
	} */
	?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( get_field( 'hooniverse_external_url') != null ) { ?>
			<a class='button-primary' href='<?php the_field( 'hooniverse_external_url' ); ?>'>View Content</a>
		<?php } ?>
		<?php the_content(); ?>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'hooniverse' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
			hooniverse_posted_on();
			// Post categories
			$category_list = hooniverse_list_categories( get_the_ID() );
			if ( $category_list !== '' ) {
				echo "<span class='entry-categories'>$category_list</span> | ";
			}
			echo '<a href="' . get_comments_link() . '">';
			printf(
				_nx(
					'One Comment',
					'%1$s Comments',
					get_comments_number(),
					'comments title',
					'hooniverse'
				),
				number_format_i18n( get_comments_number() )
			);
			echo '</a>';
			?>
		</div><!-- .entry-meta -->
		<div class="title-bar">
			<?php
			printf(
				__( '<h4>About %1$s</h4>', 'hooniverse' ),
				sprintf(
					'<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_html( get_the_author() )
				),
			);
			?>
			<div class="title-sep-container"></div>
		</div>

		<div class="author-info">
			<?php
			echo get_avatar( get_the_author_meta( 'ID' ) );
			echo '<p>' . get_the_author_meta( 'description' ) . '</p>';
			$tag_list = get_the_tag_list();

			// If there are tags associated with this content, print them out
			if ( '' != $tag_list ) {
				$meta_text = __( '<div class="entry-tags">%1$s</div>', 'hooniverse' );
			} else {
				$meta_text = '';
			}

			printf(
				$meta_text,
				$tag_list
			);
			?>
		</div>

		<div class="title-bar">
			<div class="title-sep-container"></div>
		</div>

		<?php
		if ( ! is_admin_bar_showing() ) {
			edit_post_link( __( 'Edit', 'hooniverse' ), '<span class="edit-link">', '</span>' );
		}
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
