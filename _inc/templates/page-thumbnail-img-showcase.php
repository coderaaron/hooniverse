<?php
	$image_id       = get_post_thumbnail_id();
	$image_sm       = wp_get_attachment_image_src( $image_id, 'featured-img-hero-sm' );
	$image          = wp_get_attachment_image_src( $image_id, 'featured-img-hero' );
	$image1_5x      = wp_get_attachment_image_src( $image_id, 'featured-img-hero-1_5x' );
	$image2x        = wp_get_attachment_image_src( $image_id, 'featured-img-hero-2x' );
	$image_alt_text = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

	$overlay_color = ' bg-' . get_field( 'overlay_color' );
?>

<?php if ( $image[1] >= 760 ) { ?>
	<style>
	.page-thumbnail-feature {
		background-image: url(<?php echo $image_sm[0]; ?>);
	}
	@media screen and (-webkit-min-device-pixel-ratio: 1.5),
		screen and (min-resolution: 144dpi) {
		.page-thumbnail-feature {
			background-image: url(<?php echo $image[0]; ?>);
		}
	}
	@media screen and (min-width: 41em) {
		.page-thumbnail-feature {
			background-image: url(<?php echo $image1_5x[0]; ?>);
		}
	}
	@media screen and (min-resolution: 144dpi) and (min-width: 41em),
		screen and (-webkit-min-device-pixel-ratio: 1.5) and (min-width: 41em) {
		.page-thumbnail-feature {
			background-image: url(<?php if ( $image2x[1] >= 2880 ) { echo $image2x[0]; } else { echo $image1_5x[0]; } ?>);
		}
	}
	</style>
	<figure class="page-thumbnail-feature">
		<?php
		/**
		 * If alt text is not in the WordPress's metadata for the image,
		 * we shouldn't have render out this pseudo-alt-tag.
		 */
		if ( '' !== $image_alt_text ) {
			echo '<span role="img" class="screen-reader-text" aria-label="' . esc_attr( $image_alt_text ) . '"></span>';
		}

		if ( have_rows( 'overlay_content' ) ) { ?>
		<div class="feature-text-wrapper">
		<div class="feature-text<?php echo $overlay_color; ?>">
			<?php while ( have_rows( 'overlay_content' ) ) : the_row();

				if ( get_row_layout() == 'heading' ) {

					echo '<h2 class="heading">' . get_sub_field( 'heading' ) . '</h2>';

				} elseif ( get_row_layout() == 'subheading' ) {

					echo '<p class="subheading">' . get_sub_field( 'subheading' ) . '</p>';

				} elseif ( get_row_layout() == 'button' ) {

					echo '<a href="' . get_sub_field( 'url' ) . '" class="button-inverse">' . get_sub_field( 'text' ) . '</a>';

				}
			endwhile; ?>
		</div>
		</div>
		<?php } ?>

	</figure>
<?php } ?>
