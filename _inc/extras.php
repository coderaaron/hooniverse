<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package Chauvenet
 */

/**
 * Customize the title tag.
 */
function chauvenet_document_title_separator( $sep ) {
	$sep = '|'; // separator
	return $sep;
}
add_filter( 'document_title_separator', 'chauvenet_document_title_separator' );

/**
 * Append the university's name to each page's <title>.
 */
function chauvenet_override_post_title( $title ) {
	// If on the home or front page, skip the page title, but keep the site's name.
	if ( is_home() || is_front_page() ) {
		$title['title'] = '';
		$title['site'] = get_bloginfo( 'name' );
	}
	// Remove the site "tagline" altogether
	$title['tagline'] = '';
	// append the university name to every page
	$title['site'] = $title['site'] . ' | Washington University in St. Louis';
	return $title;
}
add_filter( 'document_title_parts', 'chauvenet_override_post_title' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function chauvenet_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'chauvenet_pingback_header' );

/**
 * Count number of widgets in a sidebar
 * Used to determine layout, by adding classes to widget
 * Modified from: https://gist.github.com/slobodan/6156076
 */
function chauvenet_count_widgets( $sidebar_id ) {
	global $sidebars_widgets;
	if ( empty( $sidebars_widgets ) ) {
		$sidebars_widgets = get_option( 'sidebars_widgets', array() );
	}

	$sidebars_widgets_count = $sidebars_widgets;

	if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) {
		$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
		$widget_classes = 'widget-count-';

		if ( $widget_count % 3 == 0 ) {
			// if # of widgets is a multiple of 3
			$widget_classes .= '3';
		} elseif ( $widget_count >= 4 ) {
			// if there's 4 or more widgets (excpeting the multiple of 3 rule above),
			// treat them all the same as if there are 4.
			$widget_classes .= '4';
		} elseif ( 2 == $widget_count ) {
			$widget_classes .= '2';
		} elseif ( 1 == $widget_count ) {
			$widget_classes .= '1';
		}

		return $widget_classes;
	}
}

/**
 * Forces images to return as https:// when the site is visited using SSL
 *
 * @param string
 * @return string
 */
function fix_ssl_attachment_url( $url ) {

	if ( is_ssl() )
		$url = str_replace( 'http://', 'https://', $url );
	return $url;

}
add_filter( 'wp_get_attachment_url', 'fix_ssl_attachment_url' );

/**
 * Modify the HTML of navigation menus.
 *
 * @param string  $item_output HTML of the starting menu item element.
 * @param WP_Post $item        The post object associated with this nav menu item.
 * @return string The new HTML for the starting element of the menu item.
 */
function chauvenet_filter_walker_nav_menu_start_el( $item_output, $item ) {
	$classes = array_values( $item->classes );

	$item_output = str_replace( '<a ', '<a class="menu-item-link" ', $item_output );

	if ( in_array( 'menu-item-has-children', $classes ) ) {
		$item_output .= '<button class="sub-menu-toggle mobile-only">' . $item->title . '</button>';
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'chauvenet_filter_walker_nav_menu_start_el', 10, 2 );

/**
 * Rearranges the admin menu to move Pages and Posts around.
 */
function washu_custom_menu_order($menu_ord) {
    if ( ! $menu_ord ) {
    	return true;
    }

    return array(
        'index.php', // Dashboard
        'separator1', // Separator
        'edit.php?post_type=page', // Pages
    );
}
add_filter('custom_menu_order', 'washu_custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'washu_custom_menu_order');
