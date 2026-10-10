# WordPress Sun Auto

Reusable custom WordPress starter for small service-business websites.

## First project setup

1. Rename the theme folder.
2. Update the theme header in `style.css`.
3. Search and replace:
   - `Sun_Auto_` with your PHP function prefix.
   - `sun-auto` with your text domain and asset handle prefix.
   - `Sun_Auto` with your PHP package name.
4. Update colours, typography, spacing, and breakpoints in `sass/abstracts/_variables.scss`.
5. Replace the section markup and placeholder copy in `template-parts/sections/`.
6. Replace the placeholder Contact Form 7 shortcode.
7. Add project images to `assets/images/`.
8. Install Sass with `npm install` and run `npm run sass`.
9. Run `npm run build` before deployment.

## Recommended use

Copy this folder for each project instead of editing the master starter.
