<?php
/**
 * Chauvenet Theme Customizer
 *
 * @package Chauvenet
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function chauvenet_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'static_front_page' )->title = __( 'Front Page', 'chauvenet' );
	$wp_customize->get_section( 'static_front_page' )->description = __( 'Select which page you want to display as your front page.', 'chauvenet' );

	// Remove tagline, site icon, and Additional CSS from Customizer
	$wp_customize->remove_section('custom_css');
	$wp_customize->remove_control('blogdescription');
	$wp_customize->remove_control('site_icon');
}
add_action( 'customize_register', 'chauvenet_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function chauvenet_customize_preview_js() {
	wp_enqueue_script( 'chauvenet_customizer', get_template_directory_uri() . '/_assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'chauvenet_customize_preview_js' );


/**
 * Sanitize settings that use radio buttons.
 */
function chauvenet_customizer_sanitize_radio( $input, $setting ) {
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
function chauvenet_customizer_header( $wp_customize ) {
	// Create customizer section
	$wp_customize->add_section('chauvenet_header', array(
		'title' => __( 'Header', 'chauvenet' ),
		'priority' => 20,
	) );

	// Add settings for header type
	$wp_customize->add_setting( 'chauvenet_header_style', array(
		'default' => 'default',
		'type' => 'option',
		'sanitize_callback' => 'chauvenet_customizer_sanitize_radio'
	) );

	// Add controls for header type
	$wp_customize->add_control( 'chauvenet_header_style' , array(
		'label' => 'Header Style',
		'section' => 'chauvenet_header',
		'settings' => 'chauvenet_header_style',
		'type' => 'radio',
		'choices'  => array(
			'default'  => 'Default',
			'condensed' => 'Condensed',
		),
	) );
}
add_action( 'customize_register', 'chauvenet_customizer_header' );


/**
* Add affilation fields to theme customizer
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/
function chauvenet_customize_affiliation( $wp_customize ) {
	// Add settings for affiliation and affiliation link
	$wp_customize->add_setting( 'chauvenet_affiliation', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'chauvenet_affiliation_link', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'chauvenet_logo_selection', array(
		'default' => 'wustl',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	// Add controls for affiliation and affiliation link
	$wp_customize->add_control( 'chauvenet_affiliation' , array(
		'label' => 'Affiliation',
		'section' => 'title_tagline',
		'settings' => 'chauvenet_affiliation',
	) );
	$wp_customize->add_control( 'chauvenet_affiliation_link' , array(
		'label' => 'Affiliation Link',
		'type' => 'url',
		'section' => 'title_tagline',
		'settings' => 'chauvenet_affiliation_link',
	) );
    $wp_customize->add_control( 'chauvenet_logo_selection' , array(
        'label'   => 'Logo',
        'type'    => 'select',
		'section' => 'title_tagline',
	    'settings' => 'chauvenet_logo_selection',
        'choices'    => array(
            'wustl' => 'Washington University',
            'wusm' => 'Washington University School of Medicine',
        ),
    ) );
}
add_action( 'customize_register', 'chauvenet_customize_affiliation' );


/**
* Add contact information to theme customizer
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/
function chauvenet_customizer_contact( $wp_customize ) {
	// Create customizer section
	$wp_customize->add_section('chauvenet_contact', array(
		'title'		=> __('Contact Information', 'chauvenet'),
		'priority'	=> 20,
	) );

	// Add footer options
	// Office/Group Name
	$wp_customize->add_setting('chauvenet_theme_options[dept_name]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// WashU Affiliation
	$wp_customize->add_setting('chauvenet_theme_options[affiliation_text]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// WashU Affiliation URL
	$wp_customize->add_setting('chauvenet_theme_options[affiliation_link]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Address Line 1
	$wp_customize->add_setting('chauvenet_theme_options[address_1]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Address Line 2
	$wp_customize->add_setting('chauvenet_theme_options[address_2]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// City, State ZIP
	$wp_customize->add_setting('chauvenet_theme_options[city_state_zip]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Phone #1
	$wp_customize->add_setting('chauvenet_theme_options[phone_1]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Phone #2
	$wp_customize->add_setting('chauvenet_theme_options[phone_2]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Email
	$wp_customize->add_setting('chauvenet_theme_options[email]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Contact Page (Optional)
	$wp_customize->add_setting('chauvenet_theme_options[contact_page]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Contact Page Text
	$wp_customize->add_setting('chauvenet_theme_options[contact_page_text]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	// Add custom controls
	// Office/Group Name
	$wp_customize->add_control('chauvenet_footer_dept_name', array(
		'label'    => __("Office/Group Name", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[dept_name]',
	) );
	// WashU Affiliation
	$wp_customize->add_control('chauvenet_footer_affiliation_text', array(
		'label'    => __("WashU Affiliation", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[affiliation_text]',
	) );
	// WashU Affiliation URL
	$wp_customize->add_control('chauvenet_footer_affiliation_link', array(
		'label'    => __("WashU Affiliation URL", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[affiliation_link]',
	) );
	// Address Line 1
	$wp_customize->add_control('chauvenet_footer_address_1', array(
		'label'    => __("Address Line 1", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[address_1]',
	) );
	// Address Line 2
	$wp_customize->add_control('chauvenet_footer_address_2', array(
		'label'    => __("Address Line 2", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[address_2]',
	) );
	// City, State ZIP
	$wp_customize->add_control('chauvenet_footer_city_state_zip', array(
		'label'    => __("City, State ZIP", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[city_state_zip]',
	) );
	// Phone #1
	$wp_customize->add_control('chauvenet_footer_phone_1', array(
		'label'    => __("Phone #1", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[phone_1]',
	) );
	// Phone #2
	$wp_customize->add_control('chauvenet_footer_phone_2', array(
		'label'    => __("Phone #2", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[phone_2]',
	) );
	// Email
	$wp_customize->add_control('chauvenet_footer_email', array(
		'label'    => __("Email", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[email]',
		'type'	   => 'email'
	) );
	// Contact Page
	$wp_customize->add_control('chauvenet_footer_contact_page', array(
		'label'    => __("Select Contact Page", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[contact_page]',
		'type'	   => 'dropdown-pages'
	) );
	// Contact Page Link Text
	$wp_customize->add_control('chauvenet_footer_contact_page_text', array(
		'label'    => __("Contact Page Link Text", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[contact_page_text]',
	) );
}
add_action( 'customize_register', 'chauvenet_customizer_contact' );


/**
* Add social media options to theme customizer
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/
function chauvenet_customize_socials( $wp_customize ) {
	// Add social media options
	// Facebook
	$wp_customize->add_setting('chauvenet_theme_options[facebook]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Twitter
	$wp_customize->add_setting('chauvenet_theme_options[twitter]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Instagram
	$wp_customize->add_setting('chauvenet_theme_options[instagram]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Snapchat
	$wp_customize->add_setting('chauvenet_theme_options[snapchat]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// YouTube
	$wp_customize->add_setting('chauvenet_theme_options[youtube]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	// Flickr
	$wp_customize->add_setting('chauvenet_theme_options[flickr]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	// Add custom controls
	// Facebook
	$wp_customize->add_control('chauvenet_facebook', array(
		'label'    => __("Facebook URL", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[facebook]',
		) );
	// Twitter
	$wp_customize->add_control('chauvenet_twitter', array(
		'label'    => __("Twitter Username", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[twitter]',
		) );
	// Instagram
	$wp_customize->add_control('chauvenet_instagram', array(
		'label'    => __("Instagram Username", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[instagram]',
	) );
	// Snapchat
	$wp_customize->add_control('chauvenet_snapchat', array(
		'label'    => __("Snapchat Username", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[snapchat]',
	) );
	// YouTube
	$wp_customize->add_control('chauvenet_youtube', array(
		'label'    => __("YouTube URL", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[youtube]',
	) );
	// Flickr
	$wp_customize->add_control('chauvenet_flickr', array(
		'label'    => __("Flickr URL", 'chauvenet'),
		'section'  => 'chauvenet_contact',
		'settings' => 'chauvenet_theme_options[flickr]',
	) );
}
add_action( 'customize_register', 'chauvenet_customize_socials' );
