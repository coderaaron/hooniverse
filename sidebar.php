<?php
/**
 * The template for displaying the sidebar.
 *
 * @package Hooniverse
 */

// Calculate the subnav. Function documented in template-tags.php.
$subnav = hooniverse_get_sidebar_nav();

if ( is_active_sidebar( 'sidebar' ) || $subnav ) { ?>

<div id="secondary" class="widget-area stick" role="complementary">

	<?php
	// Print the sidebar menu if it exists.
	if ( $subnav ) {
		echo $subnav;
	}
	?>

	<?php dynamic_sidebar( 'sidebar' ); ?>

</div><!-- #secondary -->

<?php } ?>
