<?php
/**
 * Hooniverse AJAX Search
 *
 * @package Hooniverse
 */

function ajax_search() {
	/* Get search term from search field */
	$search = sanitize_text_field( $_POST[ 'query' ] );

	/* Execute query using search string */
	$query = new WP_Query(
		array(
			'posts_per_page' => 8,
			'post_status' => 'publish',
			's' => $search
		)
	);

	$output = '';

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) : $query->the_post();
			echo '<a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a>';
		endwhile;
		if ( $query->max_num_pages > 1 ) {
			echo '<a class="see-all-results" href="' . esc_url( get_site_url() ) . '?s=' . urlencode( $search ) . '">View all results</a>';
		}
	} else {
		echo '<p class="no-results">No results</p>';
	}

	/* Reset query */
	wp_reset_query();

	die();
}
add_action( 'wp_ajax_ajax_search', 'ajax_search' );
add_action( 'wp_ajax_nopriv_ajax_search', 'ajax_search' );
