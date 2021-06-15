<?php

function hooniverse_main_menu() {
	if ( has_nav_menu( 'primary-menu' ) ) {

		$args = array(
			'theme_location' => 'primary-menu',
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

	echo $menu;
}


function hooniverse_main_menu_flush_cached_menu() {
	delete_transient( 'hooniverse_main_menu' );
}
add_action( 'wp_update_nav_menu', 'hooniverse_main_menu_flush_cached_menu' );
add_action( 'publish_page', 'hooniverse_main_menu_flush_cached_menu' );
add_action( 'edit_page', 'hooniverse_main_menu_flush_cached_menu' );
add_action( 'trash_page', 'hooniverse_main_menu_flush_cached_menu' );
