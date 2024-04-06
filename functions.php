<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '3.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */

/* Function to enqueue stylesheet from parent theme */
function child_enqueue__parent_scripts() {
    wp_enqueue_style( 'parent', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue__parent_scripts' );

// Ensure "Hello Elementor" theme is installed and activated
function check_and_install_hello_elementor() {
    if (!function_exists('wp_get_theme')) {
        require_once(ABSPATH . 'wp-includes/theme.php');
    }

    $theme = wp_get_theme('hello-elementor');
    if (!$theme->exists() || $theme->get('Status') != 'publish') {
        require_once(ABSPATH . 'wp-admin/includes/theme.php');
        wp_install_theme('hello-elementor');
    }

    // Check if "Hello Elementor" is the current theme, if not, activate it
    $current_theme = wp_get_theme();
    if ('hello-elementor' !== $current_theme->get_template()) {
        switch_theme('hello-elementor');
    }
}
add_action('after_switch_theme', 'check_and_install_hello_elementor');

