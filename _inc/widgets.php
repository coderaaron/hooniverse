<?php
/**
 * Unregister unneeded widgets.
 */
function washu_remove_widgets() {
	// WordPress core widgets
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );

	// Formidable Forms widgets
	unregister_widget( 'FrmListEntries' );
	unregister_widget( 'FrmShowForm' );

	if ( class_exists ( 'Jetpack' ) ) {
		// Jetpack widgets
		unregister_widget( 'Jetpack_Widget_Authors' );
		unregister_widget( 'Jetpack_Contact_Info_Widget' );
		unregister_widget( 'Jetpack_Display_Posts_Widget' );
		unregister_widget( 'Jetpack_EU_Cookie_Law_Widget' );
		unregister_widget( 'Jetpack_Flickr_Widget' );
		unregister_widget( 'Jetpack_Gallery_Widget' );
		unregister_widget( 'WPCOM_Widget_Goodreads' );
		unregister_widget( 'WPCOM_Widget_GooglePlus_Badge' );
		unregister_widget( 'Jetpack_Gravatar_Profile_Widget' );
		unregister_widget( 'Jetpack_Image_Widget' );
		unregister_widget( 'Jetpack_Internet_Defense_League_Widget' );
		unregister_widget( 'Milestone_Widget' );
		unregister_widget( 'Jetpack_RSS_Links_Widget' );
		unregister_widget( 'wpcom_social_media_icons_widget' );
		unregister_widget( 'Jetpack_Upcoming_Events_Widget' );
	}
}
add_action( 'widgets_init', 'washu_remove_widgets' );