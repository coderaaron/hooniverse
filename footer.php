<?php
/**
 * The footer for our theme.
 *
 * Displays the footer and closes the #page element
 *
 * @package Hooniverse
 */
?>

	<footer id="colophon" class="footer" role="contentinfo">
		<div class="container">
			<div class="footer-menu">
				<?php dynamic_sidebar( 'sidebar-footer-left' ); ?>
			</div><!-- .footer-menu -->
			<div class="footer-contact">
				<?php dynamic_sidebar( 'sidebar-footer-center' ); ?>
			</div><!-- .footer-contatct -->
			<div class="footer-social">
				<?php dynamic_sidebar( 'sidebar-footer-right' ); ?>
			</div><!-- .footer-social -->
		</div><!-- .container -->
		<div class="site-info">
			<p class="footer-copyright">
				&copy; <?php echo date("Y") ?> Hooniverse <em>[Founded in 2009]</em><br/>
				Hooniverse is a trademark of Hoonigan used with permission
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
