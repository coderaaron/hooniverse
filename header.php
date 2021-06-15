<?php
/**
 * The header for our theme.
 *
 * Opens the #page element and displays all of the <head> section
 *
 * @package Hooniverse
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php include( '_inc/templates/head-favicon.php' ); ?>

<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<a class="skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'hooniverse' ); ?></a>
<a class="skip-link" id="search-skip-link" href="#header-search-field"><?php esc_html_e( 'Skip to search', 'hooniverse' ); ?></a>
<a class="skip-link" href="#colophon"><?php esc_html_e( 'Skip to footer', 'hooniverse' ); ?></a>

<?php
$has_featured_image = has_post_thumbnail() && is_front_page() ? ' has-featured-image' : '';
?>

<div id="page" class="hfeed site header-alt<?php echo $has_featured_image; ?>">
	<header class="site-header" role="banner">
		<div class="container">
			<a class="logo-non-sticky" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/_assets/img/hooniverse-logo.png" width="347" height="68" alt=""></a>
			<a class="logo-sticky" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/_assets/img/logo-sticky.png" width="55" height="55" alt=""></a>

			<button class="hooniverse-main-menu-trigger mobile-only">
				<?php include( '_assets/icons/menu-search.svg' ); ?>
				<span class="screen-reader-text">Open Menu</span>
			</button>

			<?php get_template_part( '_inc/templates/main-menu' ); ?>
		</div>
	</header>
