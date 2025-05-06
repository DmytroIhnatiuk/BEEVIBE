<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package drewush
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
add_action('template_redirect', function () {
    if (trailingslashit($_SERVER['REQUEST_URI']) === '/shop/category/') {
        wp_redirect(home_url('/shop/'), 301);
        exit;
    }
});
