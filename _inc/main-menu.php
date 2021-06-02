<?php

function hooniverse_main_menu() {

	// Check if custom domain is active AND user is logged in.
	// 'DOMAIN_MAPPING' is constant used by CampusPress for their domain mapping tool.
	$criteria_check = false;
	if ( defined('DOMAIN_MAPPING') && true == constant('DOMAIN_MAPPING') && is_user_logged_in() ) {
		$criteria_check = true;
	}

	// If conditions above are not met, try to get the menu from a transient first
	if ( ( ! $menu = get_transient( 'hooniverse_main_menu' ) ) || true == $criteria_check ) {

		if ( has_nav_menu( 'main' ) ) {

			$args = array(
				'theme_location' => 'main',
				'container'      => false,
				'items_wrap'     => '%3$s',
				'echo'           => false,
			);

			$menu = wp_nav_menu( $args );

		} else {

			$frontpage_id = get_option( 'page_on_front' );
			$args = array(
				'title_li' => '', '',
				'exclude'  => $frontpage_id,
				'echo'     => false,
				'walker'   => new hooniverse_main_menu(),
			);

			$menu = wp_list_pages( $args );
		}

		/*
		 * Do not store a transient if the current user is logged in AND custom domain is in use.
		 *
		 * In the Multisite environment, sites with a custom subdomain will
		 * store the menu using the sites.wustl.edu address in the transient,
		 * and we'd like it to have the subdomain address instead.
		 */
		if ( ! $criteria_check ) {
			// Cache the resulting menu in a transient for 24 hours
			set_transient( 'hooniverse_main_menu', $menu, 60*60*24 );
		}
	}

	echo $menu;
}


function hooniverse_main_menu_flush_cached_menu() {
	delete_transient( 'hooniverse_main_menu' );
}
add_action( 'wp_update_nav_menu',  'hooniverse_main_menu_flush_cached_menu' );
add_action( 'publish_page', 'hooniverse_main_menu_flush_cached_menu' );
add_action( 'edit_page', 'hooniverse_main_menu_flush_cached_menu' );
add_action( 'trash_page', 'hooniverse_main_menu_flush_cached_menu' );
