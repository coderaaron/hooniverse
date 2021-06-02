<?php
/**
 * Adds information to the featured image area on posts that says requirements
 * for an image to display.
 */
function hooniverse_featured_image_instruction( $content ) {
	if ( 'post' == $GLOBALS['post_type'] ) {
		$content .= '<p>The featured image will not display unless it is a minimum of 750px wide.</p>';
	}
	if ( get_option( 'page_on_front' ) == get_the_ID() ) {
		$content .= '<p>Minimum: 1440 x 720 pixels (w x h)<br>Recommended: 2880 x 1440 pixels</p>';
	} elseif ( 'page' == $GLOBALS['post_type'] ) {
		$content .= '<p>Featured images should be uploaded at dimensions of at least 1440px by 550px.</p>';
	}
	return $content;
}
add_filter( 'admin_post_thumbnail_html', 'hooniverse_featured_image_instruction');

/**
 * Sets up the featured image toggle metabox on posts.
 */
function hooniverse_featured_image_toggle_metabox_setup() {
	add_meta_box( 'hooniverse_featured_image_toggle_metabox', 'Featured Image Display', 'hooniverse_featured_image_toggle_metabox', 'post', 'side', 'low', null );
}
add_action( 'add_meta_boxes_post', 'hooniverse_featured_image_toggle_metabox_setup' );

/**
 * Toggles whether the featured image is shown on a post or not. Useful for when
 * an image is too small to display in the featured area but it is to be shown
 * within a card (social or otherwise).
 */
function hooniverse_featured_image_toggle_metabox( $post ) {
	/**
	 * Nonce it.
	 */
    wp_nonce_field(basename(__FILE__), 'hooniverse_featured_image_toggle_metabox_nonce');

	/**
	 * Show the toggle.
	 */
	global $pagenow;
	$checked = get_post_meta( $post->ID, '_hooniverse_featured_image_toggle', true );
	$current = 'true';
	$echo = true;
	?>
	<div>
		<label class="selectit">
			<input type="checkbox" name="hooniverse-featured-image-toggle" id="hooniverse-featured-image-toggle" value="true" <?php if ( 'post-new.php' == $pagenow ) { echo 'checked="checked"'; } else { checked ( $checked, $current, $echo ); } ?> /> Show the featured image on the <a href="https://webtheme.wustl.edu/items/creating-a-news-post/" target="_blank">post detail page</a>.
		</label>
	</div>
	<?php
}

/**
 * Saves the featured image toggle option.
 */
function hooniverse_featured_image_toggle_save( $post_id ) {
	/**
	 * Verify nonce.
	 */
	if ( !isset( $_POST['hooniverse_featured_image_toggle_metabox_nonce'] ) || !wp_verify_nonce( $_POST['hooniverse_featured_image_toggle_metabox_nonce'], basename( __FILE__ ) ) ) {
	    return $post_id;
	}

	/**
	 * Check the user's permissions.
	 */
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}

	/**
	 * Save it out (or delete it).
	 */
	if ( isset( $_POST['hooniverse-featured-image-toggle'] ) ) {
		update_post_meta( $post_id, '_hooniverse_featured_image_toggle', 'true' );
	} else {
		delete_post_meta( $post_id, '_hooniverse_featured_image_toggle' );
	}
}
add_action( 'save_post', 'hooniverse_featured_image_toggle_save', 10, 2 );
