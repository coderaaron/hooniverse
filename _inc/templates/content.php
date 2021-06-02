<?php
/**
 * @package Hooniverse
 */

	$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
	$hasthumbnail   = ( $post_thumbnail ) ? 'has-thumbnail' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $hasthumbnail ); ?>>
	<header class="entry-header">
		<?php
		if ( get_field( 'hooniverse_external_url' ) || get_field( 'hooniverse_ppi_external_url' ) ) {
			$external_link = ( get_field( 'hooniverse_external_url' ) === null ) ? get_field( 'hooniverse_ppi_external_url' ) : get_field( 'hooniverse_external_url' );

			/**
			 * If an external link on a post exists, we need to explode the title
			 * and wrap the last word for the icon to stay on the same line as
			 * the last word.
			 */
			$title_exploded      = explode( ' ', esc_html( get_the_title() ) );
			$title_last_word     = array_pop( $title_exploded );
			$title_modified_last = '<span class="last-word">' . $title_last_word . '<span class="dashicons dashicons-external"><span class="screen-reader-text">&nbsp;(Links to an external site)</span></span></span>';
			array_push( $title_exploded, $title_modified_last );
			$title_new = implode( ' ', $title_exploded );

			/**
			 * We also should tell wp_kses what tags are allowed.
			 * In this case, we're just adding on <span> to the whitelist.
			 */
			$kses_allowed_tags = array(
				'em'     => array(),
				'strong' => array(),
				'span'   => array(
					'class' => array(),
				),
			);

			?>
			<h2 class="entry-title"><a class="entry-title-link" href="<?php echo esc_url( $external_link ); ?>" rel="bookmark"><?php echo wp_kses( $title_new, $kses_allowed_tags ); ?></a></h2>
			<?php
		} else {
			?>
			<h2 class="entry-title"><a class="entry-title-link" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php
		}
		?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php hooniverse_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if ( $post_thumbnail  ) { ?>
	<figure class="post-image">
		<?php
		if ( get_field( 'hooniverse_external_url' ) || get_field( 'hooniverse_ppi_external_url' ) ) {
			?>
				<a class="entry-title-link" href="<?php echo esc_url( $external_link ); ?>" rel="bookmark"><?php the_post_thumbnail( 'medium' ); ?></a>
			<?php
		} else {
			?>
				<a class="entry-title-link" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'medium' ); ?></a>
			<?php
		}
		?>
	</figure>
	<?php } // end if ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'hooniverse' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
