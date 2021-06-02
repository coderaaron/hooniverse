// Unregister specified block types and styles
// Using wp.domReady() at the moment, this could change, see
// https://github.com/WordPress/gutenberg/issues/11338
document.addEventListener('DOMContentLoaded', () => {
    // Unregister block types
    wp.blocks.unregisterBlockType('core/verse');
    wp.blocks.unregisterBlockType('core/preformatted');
    wp.blocks.unregisterBlockType('core/more');
    wp.blocks.unregisterBlockType('core/archives');
    wp.blocks.unregisterBlockType('core/categories');
    wp.blocks.unregisterBlockType('core/latest-comments');
    wp.blocks.unregisterBlockType('core/latest-posts');
    wp.blocks.unregisterBlockType('core/media-text');
    wp.blocks.unregisterBlockType('core/nextpage');
    wp.blocks.unregisterBlockType('core/tag-cloud');
    wp.blocks.unregisterBlockType('core/calendar');
    wp.blocks.unregisterBlockType('core/search');

    wp.blocks.unregisterBlockType('jetpack/business-hours');
    wp.blocks.unregisterBlockType('jetpack/contact-info');
    wp.blocks.unregisterBlockType('jetpack/gif');
    wp.blocks.unregisterBlockType('jetpack/map');
    wp.blocks.unregisterBlockType('jetpack/repeat-visitor');
    wp.blocks.unregisterBlockType('jetpack/markdown');
    wp.blocks.unregisterBlockType('jetpack/rating-star');

    wp.blocks.unregisterBlockType('formidable/simple-view');

    wp.blocks.unregisterBlockType('yoast/how-to-block');
    wp.blocks.unregisterBlockType('yoast/faq-block');

    // Unregister embed blocks
	wp.blocks.unregisterBlockVariation('core/embed', 'animoto');
    wp.blocks.unregisterBlockVariation('core/embed', 'cloudup');
    wp.blocks.unregisterBlockVariation('core/embed', 'collegehumor');
    wp.blocks.unregisterBlockVariation('core/embed', 'crowdsignal');
    wp.blocks.unregisterBlockVariation('core/embed', 'dailymotion');
    wp.blocks.unregisterBlockVariation('core/embed', 'hulu');
    wp.blocks.unregisterBlockVariation('core/embed', 'imgur');
    wp.blocks.unregisterBlockVariation('core/embed', 'kickstarter');
    wp.blocks.unregisterBlockVariation('core/embed', 'meetup-com');
    wp.blocks.unregisterBlockVariation('core/embed', 'mixcloud');
    wp.blocks.unregisterBlockVariation('core/embed', 'reverbnation');
    wp.blocks.unregisterBlockVariation('core/embed', 'slideshare');
    wp.blocks.unregisterBlockVariation('core/embed', 'smugmug');
    wp.blocks.unregisterBlockVariation('core/embed', 'tumblr');
    wp.blocks.unregisterBlockVariation('core/embed', 'videopress');
    wp.blocks.unregisterBlockVariation('core/embed', 'wordpress-tv');
    wp.blocks.unregisterBlockVariation('core/embed', 'amazon-kindle');
    wp.blocks.unregisterBlockType('core/file');

    // Unregister format options
    wp.richText.unregisterFormatType('core/image');

    // Unregister block styles
    wp.blocks.unregisterBlockStyle('core/quote', 'default');
    wp.blocks.unregisterBlockStyle('core/quote', 'large');

    wp.blocks.unregisterBlockStyle('core/pullquote', 'default');
    wp.blocks.unregisterBlockStyle('core/pullquote', 'solid-color');

    wp.blocks.unregisterBlockStyle('core/button', 'fill');
    wp.blocks.unregisterBlockStyle('core/button', 'outline');
    wp.blocks.unregisterBlockStyle('core/button', 'squared');

    wp.blocks.unregisterBlockStyle('core/separator', 'dots');

    wp.blocks.unregisterBlockStyle('core/table', 'regular');
    wp.blocks.unregisterBlockStyle('core/table', 'stripes');

    // Register block styles
    wp.blocks.registerBlockStyle('core/button', {
        name: 'default',
        label: 'Primary',
        isDefault: true,
    });
    wp.blocks.registerBlockStyle('core/button', {
        name: 'outline',
        label: 'Outline',
    });

    wp.blocks.registerBlockStyle('core/list', {
        name: 'default',
        label: 'Regular',
        isDefault: true,
    });
    wp.blocks.registerBlockStyle('core/list', {
        name: 'unstyled',
        label: 'Unstyled',
    });

    wp.blocks.unregisterBlockStyle( 'core/separator', 'default' );
    wp.blocks.unregisterBlockStyle( 'core/separator', 'wide' );

    wp.blocks.registerBlockStyle( 'core/separator', {
        name: 'full-width',
        label: 'Full-Width',
        isDefault: true
    } );

    wp.blocks.registerBlockStyle( 'core/separator', {
        name: 'short',
        label: 'Short',
    } );

    wp.blocks.registerBlockStyle('core/paragraph', {
        name: 'default',
        label: 'Regular',
        isDefault: true,
    });
    wp.blocks.registerBlockStyle('core/paragraph', {
        name: 'disclaimer',
        label: 'Disclaimer',
    });
    wp.blocks.registerBlockStyle('core/paragraph', {
        name: 'lead',
        label: 'Lead',
    });

    wp.blocks.registerBlockStyle('core/pullquote', {
        name: 'dark-gray',
        label: 'Dark Gray',
    });
    wp.blocks.registerBlockStyle('core/pullquote', {
        name: 'turquoise',
        label: 'Turquoise',
    });
    wp.blocks.registerBlockStyle('core/pullquote', {
        name: 'default',
        label: 'Red (Default)',
        isDefault: true,
    });
    wp.blocks.registerBlockStyle('core/pullquote', {
        name: 'yellow',
        label: 'Yellow',
    });
    wp.blocks.registerBlockStyle('core/pullquote', {
        name: 'blue',
        label: 'Blue',
    });
});

wp.hooks.addFilter(
    "blocks.registerBlockType",
    "washu/change-default-spacer-height",
    changeDefaultSpacerHeight,
);

function changeDefaultSpacerHeight( settings, name ) {
    if ( name === 'core/spacer' ) {
        settings.attributes.height.default = 30;
    }

    return settings;
}
