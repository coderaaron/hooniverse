<?php
/**
 * Hooniverse Theme Customizer
 *
 * @package Hooniverse
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hooniverse_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'static_front_page' )->title = __( 'Front Page', 'hooniverse' );
	$wp_customize->get_section( 'static_front_page' )->description = __( 'Select which page you want to display as your front page.', 'hooniverse' );

	// Remove tagline, site icon, and Additional CSS from Customizer
	$wp_customize->remove_section('custom_css');
	$wp_customize->remove_control('blogdescription');
	$wp_customize->remove_control('site_icon');
}
add_action( 'customize_register', 'hooniverse_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hooniverse_customize_preview_js() {
	wp_enqueue_script( 'hooniverse_customizer', get_template_directory_uri() . '/_assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'hooniverse_customize_preview_js' );


/**
 * Sanitize settings that use radio buttons.
 */
function hooniverse_customizer_sanitize_radio( $input, $setting ) {
  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


/**
* Add affilation fields to theme customizer
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/
function hooniverse_customizer_header( $wp_customize ) {
	// Create customizer section
	$wp_customize->add_section('hooniverse_header', array(
		'title' => __( 'Header', 'hooniverse' ),
		'priority' => 20,
	) );

	// Add settings for header type
	$wp_customize->add_setting( 'hooniverse_header_style', array(
		'default' => 'default',
		'type' => 'option',
		'sanitize_callback' => 'hooniverse_customizer_sanitize_radio'
	) );

	// Add controls for header type
	$wp_customize->add_control( 'hooniverse_header_style' , array(
		'label' => 'Header Style',
		'section' => 'hooniverse_header',
		'settings' => 'hooniverse_header_style',
		'type' => 'radio',
		'choices'  => array(
			'default'  => 'Default',
			'condensed' => 'Condensed',
		),
	) );
}
add_action( 'customize_register', 'hooniverse_customizer_header' );

/**
* Add contact information to theme customizer
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/
function hooniverse_customizer_contact( $wp_customize ) {
	// Create customizer section
	$wp_customize->add_section('hooniverse_contact', array(
		'title'		=> __('Contact Information', 'hooniverse'),
		'priority'	=> 20,
	) );

	// Add footer options
	// Office/Group Name
	$wp_customize->add_setting('hooniverse_theme_options[dept_name]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Hooniverse Affiliation
	$wp_customize->add_setting('hooniverse_theme_options[affiliation_text]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Hooniverse Affiliation URL
	$wp_customize->add_setting('hooniverse_theme_options[affiliation_link]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Address Line 1
	$wp_customize->add_setting('hooniverse_theme_options[address_1]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Address Line 2
	$wp_customize->add_setting('hooniverse_theme_options[address_2]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// City, State ZIP
	$wp_customize->add_setting('hooniverse_theme_options[city_state_zip]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Phone #1
	$wp_customize->add_setting('hooniverse_theme_options[phone_1]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Phone #2
	$wp_customize->add_setting('hooniverse_theme_options[phone_2]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Email
	$wp_customize->add_setting('hooniverse_theme_options[email]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Contact Page (Optional)
	$wp_customize->add_setting('hooniverse_theme_options[contact_page]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Contact Page Text
	$wp_customize->add_setting('hooniverse_theme_options[contact_page_text]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	// Add custom controls
	// Office/Group Name
	$wp_customize->add_control('hooniverse_footer_dept_name', array(
		'label'    => __("Office/Group Name", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[dept_name]',
	) );
	// Hooniverse Affiliation
	$wp_customize->add_control('hooniverse_footer_affiliation_text', array(
		'label'    => __("Hooniverse Affiliation", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[affiliation_text]',
	) );
	// Hooniverse Affiliation URL
	$wp_customize->add_control('hooniverse_footer_affiliation_link', array(
		'label'    => __("Hooniverse Affiliation URL", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[affiliation_link]',
	) );
	// Address Line 1
	$wp_customize->add_control('hooniverse_footer_address_1', array(
		'label'    => __("Address Line 1", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[address_1]',
	) );
	// Address Line 2
	$wp_customize->add_control('hooniverse_footer_address_2', array(
		'label'    => __("Address Line 2", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[address_2]',
	) );
	// City, State ZIP
	$wp_customize->add_control('hooniverse_footer_city_state_zip', array(
		'label'    => __("City, State ZIP", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[city_state_zip]',
	) );
	// Phone #1
	$wp_customize->add_control('hooniverse_footer_phone_1', array(
		'label'    => __("Phone #1", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[phone_1]',
	) );
	// Phone #2
	$wp_customize->add_control('hooniverse_footer_phone_2', array(
		'label'    => __("Phone #2", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[phone_2]',
	) );
	// Email
	$wp_customize->add_control('hooniverse_footer_email', array(
		'label'    => __("Email", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[email]',
		'type'	   => 'email'
	) );
	// Contact Page
	$wp_customize->add_control('hooniverse_footer_contact_page', array(
		'label'    => __("Select Contact Page", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[contact_page]',
		'type'	   => 'dropdown-pages'
	) );
	// Contact Page Link Text
	$wp_customize->add_control('hooniverse_footer_contact_page_text', array(
		'label'    => __("Contact Page Link Text", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[contact_page_text]',
	) );
}
add_action( 'customize_register', 'hooniverse_customizer_contact' );


/**
* Add social media options to theme customizer
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/
function hooniverse_customize_socials( $wp_customize ) {
	// Add social media options
	// Facebook
	$wp_customize->add_setting('hooniverse_theme_options[facebook]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Twitter
	$wp_customize->add_setting('hooniverse_theme_options[twitter]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Instagram
	$wp_customize->add_setting('hooniverse_theme_options[instagram]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Snapchat
	$wp_customize->add_setting('hooniverse_theme_options[snapchat]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// YouTube
	$wp_customize->add_setting('hooniverse_theme_options[youtube]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Flickr
	$wp_customize->add_setting('hooniverse_theme_options[flickr]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	// Add custom controls
	// Facebook
	$wp_customize->add_control('hooniverse_facebook', array(
		'label'    => __("Facebook URL", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[facebook]',
		) );
	// Twitter
	$wp_customize->add_control('hooniverse_twitter', array(
		'label'    => __("Twitter Username", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[twitter]',
		) );
	// Instagram
	$wp_customize->add_control('hooniverse_instagram', array(
		'label'    => __("Instagram Username", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[instagram]',
	) );
	// Snapchat
	$wp_customize->add_control('hooniverse_snapchat', array(
		'label'    => __("Snapchat Username", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[snapchat]',
	) );
	// YouTube
	$wp_customize->add_control('hooniverse_youtube', array(
		'label'    => __("YouTube URL", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[youtube]',
	) );
	// Flickr
	$wp_customize->add_control('hooniverse_flickr', array(
		'label'    => __("Flickr URL", 'hooniverse'),
		'section'  => 'hooniverse_contact',
		'settings' => 'hooniverse_theme_options[flickr]',
	) );
}
add_action( 'customize_register', 'hooniverse_customize_socials' );
