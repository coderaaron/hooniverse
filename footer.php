<?php
/**
 * The footer for our theme.
 *
 * Displays the footer and closes the #page element
 *
 * @package Hooniverse
 */

$options = get_option( 'hooniverse_theme_options' );
$widgetFullWidth = '';
if ( $options ) {
	$contactExists = ( array_filter( $options ) ) ? true : false;
	$widgetFullWidth = ( array_filter( $options ) ) ? '' : ' full-width';
}
$contactFullWidth = ( is_active_sidebar( 'footer' ) ) ? '' : ' full-width';
?>

	<footer id="colophon" class="footer" role="contentinfo">
		<div class="container">
			<?php if ( isset( $contactExists ) || is_active_sidebar( 'footer' ) ) { ?>
				<div class="footer-widgets">

				<?php if ( isset( $contactExists ) ) { ?>
					<aside class="widget site-contact<?php echo $contactFullWidth; ?>">

						<?php if ( !empty( $options[ 'dept_name' ] ) ) {
							echo '<h2 class="footer-widget-title">' . esc_attr( $options[ 'dept_name' ] ) . '</h2>';
						}

						if ( !empty( $options[ 'affiliation_text' ] ) ) {
							if ( !empty( $options[ 'affiliation_link' ] ) ){
								echo '<p><a href="' . esc_attr( $options[ 'affiliation_link' ] ) . '">' . esc_attr( $options[ 'affiliation_text' ] ) . '</a></p>';
							}
							else {
								echo '<p>' . esc_attr( $options[ 'affiliation_text' ] ) . '</p>';
							}
						}

						if ( !empty( $options[ 'address_1' ] ) ) {
							echo '<p>' . esc_attr( $options[ 'address_1' ] ) . '</p>';
						}

						if ( !empty( $options[ 'address_2' ] ) ) {
							echo '<p>' . esc_attr( $options[ 'address_2' ] ) . '</p>';
						}

						if ( !empty( $options[ 'city_state_zip' ] ) ) {
							echo '<p>' . esc_attr( $options[ 'city_state_zip' ] ) . '</p>';
						}

						if ( !empty( $options[ 'phone_1' ] ) && empty( $options[ 'phone_2' ] ) ) {
							echo '<p>' . esc_attr( $options[ 'phone_1' ] ) . '</p>';
						} else if ( empty( $options[ 'phone_1' ] ) && !empty( $options[ 'phone_2' ] ) ) {
							echo '<p>' . esc_attr( $options[ 'phone_2' ] ) . '</p>';
						} else if ( !empty( $options[ 'phone_1' ] ) && !empty( $options[ 'phone_2' ] ) ) {
							if ( strlen( esc_attr( $options[ 'phone_1' ] ) ) <= 20 && strlen( esc_attr( $options[ 'phone_2' ] ) ) <= 20 ) {
								echo '<p class="phone">' . esc_attr( $options[ 'phone_1' ] ) . ' <span>|</span> ' . esc_attr( $options[ 'phone_2' ] ) . '</p>';
							}
							else {
								echo '<p>' . esc_attr( $options[ 'phone_1' ] ) . '</p><p>' . esc_attr( $options[ 'phone_2' ] ) . '</p>';
							}
						}

						if ( !empty( $options['email'] ) ) {
							echo '<p><a href="mailto:' . esc_attr( $options['email'] ) . '">' . esc_attr( $options['email'] ) . '</a></p>';
						}

						if ( !empty( $options['contact_page'] ) && $options['contact_page'] != '0' ) {
							if ( !empty( $options['contact_page_text'] ) ) {
								echo '<p><a href="' . esc_attr( get_permalink( $options['contact_page'] ) ) . '">' . esc_attr( $options['contact_page_text'] ) . '</a></p>';
							}
							else if ( empty( $options['contact_page_text'] ) && $options['contact_page'] != '0' ) {
								echo '<p><a href="' . esc_attr( get_permalink( $options['contact_page'] ) ) . '">' . esc_attr( get_the_title( $options['contact_page'] ) ) . '</a></p>';
							}
						}

						if ( !empty( $options['facebook'] ) || !empty( $options['twitter'] ) || !empty( $options['instagram'] ) || !empty( $options['snapchat'] ) || !empty( $options['youtube'] ) || !empty( $options['flickr'] ) ) { ?>

						<ul class="social-icon-list">

							<?php if ( !empty( $options['facebook'] ) ) { ?>
							<li class="facebook"><a href="<?php echo esc_url( $options['facebook'] ); ?>"><span class="social-text">Facebook</span></a></li>
							<?php } // facebook ?>

							<?php if ( !empty( $options['twitter'] ) ) { ?>
							<li class="twitter"><a href="<?php echo esc_url( 'https://twitter.com/' . $options['twitter'] ); ?>"><span class="social-text">Twitter</span></a></li>
							<?php } // twitter ?>

							<?php if ( !empty( $options['instagram'] ) ) { ?>
							<li class="instagram"><a href="<?php echo esc_url( 'https://instagram.com/' . $options['instagram'] ); ?>"><span class="social-text">Instagram</span></a></li>
							<?php } // instagram ?>

							<?php if ( !empty( $options['snapchat'] ) ) { ?>
							<li class="snapchat"><a href="<?php echo esc_url( 'https://snapchat.com/add/' . $options['snapchat'] ); ?>"><span class="social-text">Snapchat</span></a></li>
							<?php } // snapchat ?>

							<?php if ( !empty( $options['youtube'] ) ) { ?>
							<li class="youtube"><a href="<?php echo esc_url( $options['youtube'] ); ?>"><span class="social-text">YouTube</span></a></li>
							<?php } // youtube ?>

							<?php if ( !empty( $options['flickr'] ) ) { ?>
							<li class="flickr"><a href="<?php echo esc_url( $options['flickr'] ); ?>"><span class="social-text">Flickr</span></a></li>
							<?php } // flickr ?>

						</ul>

						<?php } ?>

					</aside>

				<?php } ?>

				<?php if ( is_active_sidebar( 'footer' ) ) { ?>
					<div class="widget-wrapper<?php echo $widgetFullWidth; ?>">
						<?php dynamic_sidebar( 'footer' ); ?>
					</div>
				<?php } ?>

				</div>
			<?php }
			/**
			 * Area for cobranding plugin.
			 */
			do_action( 'hooniverse_midfooter' );
			?>
			<div class="site-info">
				<p class="footer-copyright">&copy;<?php echo date("Y") ?> Washington University in St. Louis</p>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
