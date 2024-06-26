<?php
/**
 * Enqueue theme scripts and styles.
 */
function hooniverse_scripts() {
	// Get the current theme version.
	$this_theme   = wp_get_theme();
	$this_version = $this_theme->get( 'Version' );

	// Base hooniverse style + script.
	wp_enqueue_style( 'hooniverse-style', get_stylesheet_uri(), array( 'dashicons' ), $this_version );
	wp_enqueue_style( 'hooniverse-fonts', 'https://use.typekit.net/upb4tol.css', array(), $this_version );
	wp_enqueue_script( 'hooniverse-js', get_stylesheet_directory_uri() . '/script.js', array(), $this_version, true );
}
add_action( 'wp_enqueue_scripts', 'hooniverse_scripts' );

function adsense_code() { ?>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1827813988014570" crossorigin="anonymous"></script>
	<?php
}
add_action( 'wp_head', 'adsense_code' );

// 2x medium_large size.
remove_image_size( '1536x1536', 1536, 1536 );
// 2x large size.
remove_image_size( '2048x2048', 2048, 2048 );
