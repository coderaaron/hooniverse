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

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WB8X2CH');</script>
<!-- End Google Tag Manager -->

<?php include( '_inc/templates/head-favicon.php' ); ?>

<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WB8X2CH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<a class="skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'hooniverse' ); ?></a>
<a class="skip-link" id="search-skip-link" href="#header-search-field"><?php esc_html_e( 'Skip to search', 'hooniverse' ); ?></a>
<a class="skip-link" href="#colophon"><?php esc_html_e( 'Skip to footer', 'hooniverse' ); ?></a>

<?php
$has_featured_image = has_post_thumbnail() && is_front_page() ? ' has-featured-image' : '';
?>

<div id="page" class="hfeed site header-alt<?php echo $has_featured_image; ?>">
	<header class="site-header" role="banner">
		<div class="container">
			<?php if ( is_front_page() ) { ?>
			<h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1>
			<?php } else { ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo bloginfo( 'name' ); ?></a></p>
			<?php } ?>

			<button class="hooniverse-main-menu-trigger mobile-only">
				<?php include( '_assets/icons/menu-search.svg' ); ?>
				<span class="screen-reader-text">Open Menu</span>
			</button>

			<?php get_template_part( '_inc/templates/main-menu' ); ?>
		</div>
	</header>
