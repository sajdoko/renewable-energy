<?php
/**
 * WordPress.com-specific functions and definitions
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Renewable_Energy
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $renewable_energy_themecolors
 */
function renewable_energy_wpcom_setup() {
	global $renewable_energy_themecolors;

	// Set theme colors for third party services.
	if ( ! isset( $renewable_energy_themecolors ) ) {
		$renewable_energy_themecolors = array(
			'bg'     => '',
			'border' => '',
			'text'   => '',
			'link'   => '',
			'url'    => '',
		);
	}
	
	/* Add WP.com print styles */
	add_theme_support('print-styles');
}
add_action('after_setup_theme', 'renewable_energy_wpcom_setup');

/*
 * WordPress.com-specific styles
 */
function renewable_energy_wpcom_styles() {
	wp_enqueue_style('renewable-energy-wpcom', get_template_directory_uri() . '/inc/style-wpcom.css', wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'renewable_energy_wpcom_styles');
