// Register specified block types and styles
// Using wp.domReady() at the moment, this could change, see
// https://github.com/WordPress/gutenberg/issues/11338
document.addEventListener('DOMContentLoaded', () => {
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
    "hooniverse/change-default-spacer-height",
    changeDefaultSpacerHeight,
);

function changeDefaultSpacerHeight( settings, name ) {
    if ( name === 'core/spacer' ) {
        settings.attributes.height.default = 30;
    }

    return settings;
}
