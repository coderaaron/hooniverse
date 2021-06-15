<?php
/**
* Hooniverse functions and definitions
*
* @package Hooniverse
*/

/**
* Set the content width based on the theme's design and stylesheet.
*/
if ( ! isset( $content_width ) ) {
	$content_width = 1100; // pixels
}


if ( ! function_exists( 'hooniverse_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function hooniverse_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /_lang/ directory.
		*/
		load_theme_textdomain( 'hooniverse', get_template_directory() . '/_lang' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/* Enable support for Post Thumbnails on posts and pages. */
		add_theme_support( 'post-thumbnails' );

		// Add support for editor styles
		add_theme_support( 'editor-styles' );

		// Disable font size choices and custom font sizes
		add_theme_support( 'editor-font-sizes', array() );
		add_theme_support( 'disable-custom-font-sizes' );

		// Disable color palette and custom colors
		add_theme_support( 'editor-color-palette', array() );
		add_theme_support( 'disable-custom-colors' );

		// Disable gradients and custom gradients
		add_theme_support( 'editor-gradient-presets', array() );
		add_theme_support( 'disable-custom-gradients' );

		// Remove block patterns for now
		remove_theme_support( 'core-block-patterns' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary', 'hooniverse' ),
				'footer-menu'  => esc_html__( 'Footer', 'hooniverse' ),
			),
		);

		// Enable support for HTML5 markup.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			),
		);

		// Enable new (v4.4+) method for title tag.
		add_theme_support( 'title-tag' );

		// remove meta 'generator' tag
		remove_action('wp_head', 'wp_generator');

		// make default action for inline images to link to 'none'
		update_option('image_default_link_type','none');

		// Add support for responsive embeds
		add_theme_support( 'responsive-embeds' );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'hooniverse_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				),
			),
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			),
		);

	}
endif; // hooniverse_setup
add_action( 'after_setup_theme', 'hooniverse_setup' );

/**
* Set the default image link type to none.
*/
function hooniverse_set_default_link_type() {
	return 'none';
}
add_filter( 'pre_option_image_default_link_type', 'hooniverse_set_default_link_type' );

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function hooniverse_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Left', 'hooniverse' ),
			'id'            => 'sidebar-footer-left',
			'description'   => esc_html__( 'Add widgets here.', 'hooniverse' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Center', 'hooniverse' ),
			'id'            => 'sidebar-footer-center',
			'description'   => esc_html__( 'Add widgets here.', 'hooniverse' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Right', 'hooniverse' ),
			'id'            => 'sidebar-footer-right',
			'description'   => esc_html__( 'Add widgets here.', 'hooniverse' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
	);
}
add_action( 'widgets_init', 'hooniverse_widgets_init' );

/**
* Adds featured image size for pages.
*/
add_image_size( 'featured-img-page-sm', 720, 275, true );
add_image_size( 'featured-img-page', 1440, 550, true );
add_image_size( 'featured-img-page-1_5x', 2160, 825, true );
add_image_size( 'featured-img-page-2x', 2880, 1100, true );

// Add image sizes for showcase
add_image_size( 'featured-img-hero-sm', 720, 720, true );
add_image_size( 'featured-img-hero', 1440, 1440, true );
add_image_size( 'featured-img-hero-1_5x', 2160, 1080, true );
add_image_size( 'featured-img-hero-2x', 2880, 1440, true );

// Disable image size upper limit of 2560px
add_filter( 'big_image_size_threshold', '__return_false' );

/**
* Enqueue theme scripts and styles.
*/
function hooniverse_scripts() {
	// Get the current theme version.
	$this_theme = wp_get_theme();
	$this_version = $this_theme->get( 'Version' );

	// Base Hooniverse style + script.
	wp_enqueue_style( 'hooniverse-style', get_stylesheet_uri(), array(), $this_version );
	wp_enqueue_script( 'hooniverse-scripts', get_template_directory_uri() . '/_assets/js/scripts.js', array( 'jquery' ), $this_version, true );

	wp_add_inline_script( 'hooniverse-scripts', 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '";', 'before' );

	// Enqueue Dashicons for front end usage.
	wp_enqueue_style( 'dashicons' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( function_exists( 'frm_forms_autoloader' ) ) {
		wp_dequeue_style( 'formidable' );
		wp_deregister_style( 'formidable' );
		wp_dequeue_style( 'frm_fonts' );
	}
}
add_action( 'wp_enqueue_scripts', 'hooniverse_scripts' );

/** Homepage featured image overlay fields **/
require get_template_directory() . '/_inc/acf-featured-image-overlay.php';


/**
* Add editor styles for the classic editor.
*/
function hooniverse_editor_styles() {
	$font_url = str_replace( ',', '%2C', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic|Libre+Baskerville:400,700,400italic' );
	add_editor_style( $font_url );
	add_editor_style();
}
add_action( 'after_setup_theme', 'hooniverse_editor_styles' );

/**
* Enqueue block editor styles.
*/
function hooniverse_block_editor_styles() {
	$this_theme = wp_get_theme();
	$this_version = $this_theme->get( 'Version' );

	wp_enqueue_style( 'hooniverse-block-editor-styles', get_theme_file_uri( '/block-editor-style.css' ), false, $this_version );

	// Add Google fonts to editor
	wp_enqueue_style( 'hooniverse-editor-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic|Libre+Baskerville:400,700,400italic' );

	// Remove unused blocks
	wp_enqueue_script( 'hooniverse-core-blocks', get_template_directory_uri() . '/_assets/js/core-blocks.js', array( 'wp-blocks' ), $this_version, true );
}
add_action( 'enqueue_block_editor_assets', 'hooniverse_block_editor_styles' );

/** Custom template tags for this theme. */
require get_template_directory() . '/_inc/template-tags.php';

/** Custom functions that act independently of the theme templates. */
require get_template_directory() . '/_inc/extras.php';

/** TinyMCE customizations. **/
require get_template_directory() . '/_inc/tinymce.php';

/** Customizer additions. */
require get_template_directory() . '/_inc/customizer.php';

/** Navigation traversal feature. */
require get_template_directory() . '/_inc/main-menu-walker-class.php';
require get_template_directory() . '/_inc/subnav-walker-class.php';

/** Main menu functions. **/
require get_template_directory() . '/_inc/main-menu.php';

/** AJAX search **/
require get_template_directory() . '/_inc/ajax-search.php';

/** Remove dashboard widgets & add some of our own custom ones. */
require get_template_directory() . '/_inc/dashboard-widgets.php';

/** Add featured image display option and helper text. */
require get_template_directory() . '/_inc/featured-image.php';

/**
* Prevent post archive pages from displaying in custom menu order.
* This is particularly needed for CampusPress sites that have
* the "Post Types Order" plugin installed and enabled.
*
* @param array $query the main query for the page.
* */
function hooniverse_post_archive_ignore_menu_order( $query ) {
	if ( ( ! is_admin() && ! ( $query->get( 'page_id' ) === get_option( 'page_on_front' ) || is_front_page() ) && $query->is_main_query() ) && ( is_home() || is_archive() ) ) {
		$query->set( 'ignore_custom_sort', true );
	}
}
add_action( 'pre_get_posts', 'hooniverse_post_archive_ignore_menu_order' );
