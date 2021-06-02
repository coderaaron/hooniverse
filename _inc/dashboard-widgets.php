<?php
/**
 * Customizing the dashboard widgets
 *
 * @package Chauvenet
 */

/*
 Disable some default Dashboard Widgets
 @ https://digwp.com/2014/02/disable-default-dashboard-widgets/
*/
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;

	// unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
	// unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
	// unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
	// unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
	// unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] ); // News & Events
	// unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
	// unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
	// unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts'] );
}
add_action( 'wp_dashboard_setup', 'disable_default_dashboard_widgets', 20 );

/* Custom Dashboard Widgets */
function washu_custom_dashboard_widgets() {
	global $wp_meta_boxes;

	// Link to support/ documentation site, place high on the left column
	wp_add_dashboard_widget( 'washu_support_link_widget', 'Get help with your site', 'washu_support_link' );

	// Relocate this widget into the top left position. Thank you, Codex!
	// Get the regular dashboard widgets array (which has our new widget already, but at the end)
	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
	// Backup and delete our new dashboard widget from the end of the array
	$our_widget_backup = array( 'washu_support_link_widget' => $normal_dashboard['washu_support_link_widget'] );
	unset( $normal_dashboard['washu_support_link_widget'] );
	// Merge the two arrays together so our widget is at the beginning
	$sorted_dashboard = array_merge( $our_widget_backup, $normal_dashboard );
	// Save the sorted array back into the original metaboxes
	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;

	// Place additional custom dashboard widgets here, too!
}
add_action( 'wp_dashboard_setup', 'washu_custom_dashboard_widgets' );

function washu_support_link() {
	// check for which editor is activate
	$editor = washu_editor_check();

	// set variables based on which editor; assume we're using blocks
	$guides_url = 'https://webtheme.wustl.edu/guides/';
	$support_url = 'http://webtheme.wustl.edu/support/request-support/';
	$block_editor_heading = 'New to the block editor?';
	$block_editor_update_url = 'https://webtheme.wustl.edu/major-theme-update/';
	$block_editor_convert_url = 'https://webtheme.wustl.edu/major-theme-update/converting-existing-pages/';
	$block_editor_convert_text = 'How to convert pages to the block editor';

	// otherwise, change the variable values
	if ( 'classic' == $editor ) {
		$guides_url = 'https://webtheme-2017.wustl.edu/guides/';
		$support_url = 'https://webtheme-2017.wustl.edu/support/request-support/';
		$block_editor_heading = 'Ready to try the block editor?';
		$block_editor_update_url = 'https://webtheme-2017.wustl.edu/update-available/';
		$block_editor_convert_url = 'https://sites.wustl.edu/theme-update-2020/request-upgrade/';
		$block_editor_convert_text = 'Request a site upgrade';
	}

	if ( 'classic' == $editor ) {
		echo '<p>Tutorials, training and support requests for your WashU Web Theme site:</p>';
	}

	echo '<p><strong><a href="' . $guides_url . '">Guides and Tutorials &raquo;</a></strong><br>Find tutorials to help you build or update your site.</p>';

	if ( 'classic' != $editor ) {
		echo '<p><strong><a href="https://webtheme.wustl.edu/support/training-sessions/">Training sessions &raquo;</a></strong><br>Sign up for group or individual training.</p>';
	}

	echo '<p><strong><a href="' . $support_url . '">Support and bugs &raquo;</a></strong><br>Request assistance or report an issue.</p>';

	// make the name of the editor pretty for front-end viewing
	( 'classic' == $editor ) ? $ed_pretty = 'Classic + Tailor' : $ed_pretty = 'Blocks';

	echo '<hr>
	<h3 style="font-weight:bold;">Your editor: ' . $ed_pretty . '</h3>
	<hr>';

	echo "<p><strong>$block_editor_heading</strong><br>The new block editor started rolling out to WashU Sites in June&nbsp;2020.</p>";

	echo "<p><a href='$block_editor_update_url'>About the update &raquo;</a><br>
	<a href='$block_editor_convert_url'>$block_editor_convert_text &raquo;</a></p>";

}

function washu_editor_check() {
	/**
	 * Detect if plugin is active. For use in Admin area only.
	 */
	$check = 'blocks';
	if ( is_plugin_active( 'classic-editor/classic-editor.php' ) ) {
		$check = 'classic';
		//plugin is activated
	}

	return $check;
}
