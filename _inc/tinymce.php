<?php
/**
 * Customize the WordPress implementation of TinyMCE
 *
 * @package Hooniverse
 */

if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
	// Register our callback to the appropriate filter
	add_filter( 'mce_buttons_2', 'hooniverse_add_remove_tinymce_buttons' );
	add_filter( 'tiny_mce_before_init', 'hooniverse_customize_tinymce' );
}

// Customize the TinyMCE editor
function hooniverse_customize_tinymce( $init ) {
	/* Tiny MCE 4 */
	$init['block_formats'] = 'Section Heading - h2=h2;Subsection Heading - h3=h3;Third-level Heading - h4=h4;Fourth-level Heading - h5=h5;Paragraph=p;';
    /* Set up your custom style classes */
    $style_formats = array(
			array(
				'title' => 'Lead Paragraph',
				'selector' => 'p',
				'classes' => 'lead'
			),
			array(
				'title' => 'Unstyled List',
				'selector' => 'ul, ol',
				'classes' => 'unstyled'
			),
			array(
				'title' => 'Primary Button',
				'selector' => 'a',
				'classes' => 'button-primary'
			),
			array(
				'title' => 'Outline Button',
				'selector' => 'a',
				'classes' => 'button-outline'
			),
			array(
				'title' => 'Quote citation',
				'selector' => 'blockquote p',
				'classes' => 'bq-citation'
			),
			array(
				'title' => 'Callout',
				'block' => 'div',
				'classes' => 'callout',
				'wrapper' => true
			),
			array(
				'title' => 'Disclaimer',
				'selector' => 'p',
				'classes' => 'disclaimer'
			),
    );

    /* Include the custom styles -- defined above -- in your style dropdown */
    $init['style_formats'] = json_encode( $style_formats );
    return $init;
}

// Add and remove buttons from advanced toolbar of TinyMCE
function hooniverse_add_remove_tinymce_buttons( $buttons ) {
	// Add formats menu
    array_unshift( $buttons, 'styleselect' );
    // Remove strikethrough, text color, and indent buttons
    $remove = array( 'strikethrough', 'forecolor', 'indent', 'outdent' );

	return array_diff( $buttons, $remove );
}
