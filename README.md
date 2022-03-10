## UVic Edge theme plugin

A theme plugin for Access to Memory (AtoM) designed for University of Victoria Special Collections and University Archives. It is an extension of the default Dominion theme.

![githubScreenshot](https://user-images.githubusercontent.com/76928773/157763895-606ac912-3b54-467f-a644-7bde7e13a363.png)

## Key features

- UVic Edge branding
- Improved text colour contrasts for better WCAG 2.0 compliance
- 'Popular this week' sidebar replaced with 'New additions' on landing page
- Minor header tweeks for mobile

## Adding plugin

For a typical installation of AtoM, use the following steps:

1. Create `atom/plugins/arUVicEdgePlugin` directory.

2. Move all files in the plugin repo to `atom/plugins/arUVicEdgePlugin`.

3. Replace `atom/favicon.ico` with `atom/plugins/arUVicEdgePlugin/images/favicon.ico`.

4. Run `make` from `atom/plugins/arUVicEdgePlugin` or `make -C /usr/share/nginx/atom/plugins/arUVicEdgePlugin`.

5. The theme should now be selectable from the Admin>Theme menu.

## Troubleshooting

If the theme fails to show up in the theme list or causes problems after selection:

1. Clear your browser cache

2. Clear the application cache: `sudo php symfony cc` from `atom` directory

2. Restart php-fpm: `sudo systemctl restart php7.2-fpm` or `sudo systemctl restart php7.4-fpm` depending the version running
