<?php
/**
 * Customizing the dashboard widgets
 *
 * @package Hooniverse
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
	// unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] ); // News & Events
	// unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
	// unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
	// unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts'] );
}
add_action( 'wp_dashboard_setup', 'disable_default_dashboard_widgets', 20 );

function hooniverse_editor_check() {
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
