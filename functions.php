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
