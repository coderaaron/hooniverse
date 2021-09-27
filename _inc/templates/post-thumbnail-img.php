<?php
	$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'featured-img-hero' );
?>

<figure class="post-thumbnail-feature">
	<?php the_post_thumbnail( 'featured-img-hero' ); ?>
	<?php if ( $caption = get_the_post_thumbnail_caption() ) { ?>
		<figcaption class="wp-caption-text">
			<?php echo $caption; // no need to esc_html(), already treated in the fuction ?>
		</figcaption>
	<?php } ?>
</figure>
