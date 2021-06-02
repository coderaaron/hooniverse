<?php
	$image_id       = get_post_thumbnail_id();
	$image_sm       = wp_get_attachment_image_src( $image_id, 'featured-img-page-sm' );
	$image          = wp_get_attachment_image_src( $image_id, 'featured-img-page' );
	$image1_5x      = wp_get_attachment_image_src( $image_id, 'featured-img-page-1_5x' );
	$image2x        = wp_get_attachment_image_src( $image_id, 'featured-img-page-2x' );
	$image_alt_text = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
?>

<?php if ( $image[1] >= 760 ) { ?>
	<style>
	.page-thumbnail-feature {
		background-image: url(<?php echo $image_sm[0]; ?>);
	}
	@media screen and (min-width: 41em), 
		screen and (-webkit-min-device-pixel-ratio: 1.5),
		screen and (min-resolution: 144dpi) {
		.page-thumbnail-feature {
			background-image: url(<?php echo $image[0]; ?>);
		}
	}
	@media screen and (min-resolution: 144dpi) and (min-width: 41em), 
		screen and (-webkit-min-device-pixel-ratio: 1.5) and (min-width: 41em) {
		.page-thumbnail-feature {
			background-image: url(<?php if ( $image2x[1] >= 2880 ) { echo $image2x[0]; } elseif ( $image1_5x[1] >= 2180 ) { echo $image1_5x[0]; } else { echo $image[0]; } ?>);
		}
	}
	</style>
	<figure class="page-thumbnail-feature" 
	<?php
	/**
	 * If alt text is not in the WordPress's metadata for the image,
	 * we shouldn't have render out this pseudo-alt-tag.
	 */
	if ( '' !== $image_alt_text ) {
		echo "role='img' aria-label='" . esc_attr( $image_alt_text ) . "'";
	}
	?>
	>
	</figure>
<?php } ?>
