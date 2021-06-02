<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Chauvenet
 */

if ( ! function_exists( 'chauvenet_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function chauvenet_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'chauvenet' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-previous"><?php previous_posts_link( __( '<span class="screen-reader-text">Previous Page</span>', 'chauvenet' ) ); ?></div>
			<?php endif; ?>

			<?php
				global $wp_query;
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				if ( $paged ) {
					$max_pages = $wp_query->max_num_pages;

					echo '<div class="nav-count">';
					echo '<span class="current-page">' . $paged . '</span>';
					echo ' <span class="of">of</span> ';
					echo '<span class="max-page">' . $max_pages . '</span>';
					echo '</div>';
				}
			?>

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-next"><?php next_posts_link( __( '<span class="screen-reader-text">Next Page</span>', 'chauvenet' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .paging-navigation -->
	<?php
}
endif;

if ( ! function_exists( 'chauvenet_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function chauvenet_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	/* $time_string is escaped above and does not need to be escaped after this point */
	if ( is_archive() ) {
		printf( __( '<span class="posted-on">%1$s</span>', 'chauvenet' ),
			$time_string
		);
	} else if ( get_field( 'washu_external_url' ) ) {
		if ( get_field( 'washu_source_name' ) ) {
			printf( __( '<span class="byline">%1$s</span> &bull; <span class="posted-on">%2$s</span>', 'chauvenet' ),
				sprintf( '<span class="author">%1$s</span>',
					esc_html( the_field( 'washu_source_name' ) )
				),
				$time_string
			);
		} else {
			printf( __( '<span class="posted-on">%1$s</span>', 'chauvenet' ),
				$time_string
			);
		}
	} else if ( function_exists( 'coauthors_posts_links' ) ) {
		printf( __( '<span class="byline">By %1$s</span> &bull; <span class="posted-on">%2$s</span>', 'chauvenet' ),
			sprintf( '<span class="author vcard">%1$s</span>',
				coauthors_posts_links( null, null, null, null, false )
			),
			$time_string
		);
	} else {
		printf( __( '<span class="byline">By %1$s</span> &bull; <span class="posted-on">%2$s</span>', 'chauvenet' ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			),
			$time_string
		);
	}
}
endif;

/**
 * Return the list of categories, excluding "Uncategorized".
 */
function chauvenet_list_categories( $post_id ) {
	// Get list of categories associated with post
	$post_terms = wp_get_object_terms( $post_id, 'category', array( 'fields' => 'ids' ) );
	$uncategorized = get_cat_ID( 'Uncategorized' );

	// Remove uncategorized ID from list of categories
	if ( in_array( $uncategorized, $post_terms ) ) {
		$exclude = array_search( $uncategorized, $post_terms );
		unset( $post_terms[$exclude] );
	}

	if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
		$categories = wp_list_categories( array(
			'include' => $post_terms,
			'title_li' => '',
			'show_option_none' => '',
			'style' => 'none',
			'echo' => false,
		) );

		$categories = trim( str_replace( '<br />',  '', $categories ) );

		return $categories;
	}
}

/**
 * Return the HTML for a sidebar navigation menu
 *
 * @return string|bool The HTML for the menu as a string or false.
 */
function chauvenet_get_sidebar_nav() {
	$sidebar = false;

	if ( is_page() ) {
		$walker = new Razorback_Walker_Page_Selective_Children();
		$sidebar = wp_list_pages( array(
			'title_li' => '',
			'walker'   => $walker,
			'depth'    => 3,
			'echo'     => 0,
		) );

		if ( $sidebar ) {
			$sidebar = '<ul class="subnav">' . $sidebar . '</ul>';
		}
	}

	return $sidebar;
}
