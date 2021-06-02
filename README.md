Chauvenet
=========

Chauvenet is the second version of the WashU Web Theme, a WordPress theme for anyone at WashU to get their content onto the web in a brand aligned way. The theme is meant to be easily extendable, and has been made to work with both the WashU People, Places, and Items plugin and the WashU Tailor Tweaks plugin.

## Getting up and running

Chauvenet utilizes Grunt to process Sass and JavaScript. If you are developing locally, it's easy to get started. Run these commands in the theme's directory:

```
npm install
grunt dev
```

_Note: You'll need to first have Node.js and npm installed on your machine for this to work._

Changes to Sass, JavaScript, or PHP files will trigger a reload of your local site while `grunt dev` is running. Install [LiveReload in your browser](http://livereload.com/extensions/) to take advantage of this functionality.

## Versioning

Chauvenet uses the `major.minor.revision` format for versioning. The version number is updated when there is a merge from `dev` to `master`, which would signify that the new version is ready for production.


* **Major number increase:** Breaking changes
* **Minor number increase:** Structural changes to code or visually significant changes to the front end
* **Revision number increase:** Bug fixes and improvements to existing functionality

## Where to find (or put) files

* `_assets` is for supporting files: JavaScript, Sass, additional CSS files, icons, images
* `_inc` is for reusable code: classes, modules, partials, custom widgets
* `_lang` is for files that enable this theme to work in other languages

### Included scripts

Chauvenet makes use of a few external scripts: Picturefill, Stickyfill.

* Picturefill ensures that any responsive images we use are supported in older browsers.
* Stickyfill provides the sticky positioning of the right sidebar in browsers that have not yet implemented `position: sticky`.

## Working with image assets

### Icons

Outside of the iconongraphy used for interactions (such as menu, close, and search) and social media, icons are meant to be displayed at 20 x 20px. The fallback PNGs are also at this size. Applying width and height to SVG icons both inline and through CSS ensure the best compatibility across browsers.

## Working with styles

### WashU brand

The WashU brand Sass file (`_washu-brand.scss`) provides variables for approved brand colors and font stacks. Use these variables any place that you would normally use a hex value or font stack.

### Grid system

Chauvenet uses a 12-column grid system, taken in part from Bootstrap v4. Classes are available for use in the following format:

`.col-[breakpoint]-[number of columns]`

For example, an element with a class of `col-md-8` will be 100% width up to the `md` breakpoint, at which point it will be 66.66% (8/12) of its container.

The breakpoints used in the grid match up with the breakpoints defined in `_variables.scss`. The breakpoints that are available are `zm`, `sm`, `md`, and `lg`.

Columns can be any number between 1 and 12, 12 columns being the same as full width. Multiple grid classes could be added to an element to adjust the width at different breakpoints.

If a clearfix is needed, a wrapper is available by adding a containing element with a class of `row`.

All of the elements in the theme that use the grid use @extend, so as not to muddy the HTML. The full width page template content area is 10 columns wide, and the default page template content area is 8 columns wide.
