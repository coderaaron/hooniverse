<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hooniverse
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-footer-content">
			<div class="footer-menu">
				<?php dynamic_sidebar( 'sidebar-footer-left' ); ?>
			</div><!-- .footer-menu -->
			<div class="footer-contact">
				<?php dynamic_sidebar( 'sidebar-footer-center' ); ?>
			</div><!-- .footer-contatct -->
			<div class="footer-social">
				<?php dynamic_sidebar( 'sidebar-footer-right' ); ?>
			</div><!-- .footer-social -->
		</div>
		<div class="copyright">
			&copy; <?php echo date("Y") ?> Hooniverse <em>[Founded in 2009]</em><br/>
			Hooniverse is a trademark of Hoonigan used with permission
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
