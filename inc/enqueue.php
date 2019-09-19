<?php
/**
 * Renewable Energy enqueue scripts
 *
 * @package Renewable_Energy
 */

if ( ! function_exists('renewable_energy_scripts') ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function renewable_energy_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style('renewable-energy-styles', get_stylesheet_directory_uri() . '/css/theme.css', array(), $the_theme->get('Version') );
		wp_enqueue_script('jquery');
		wp_enqueue_script('popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), wp_get_theme()->get('Version'), true);
		wp_enqueue_script('renewable-energy-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get('Version'), true );
		if ( is_singular() && comments_open() && get_option('thread_comments') ) {
			wp_enqueue_script('comment-reply');
		}
	}
} // endif function_exists('renewable_energy_scripts').

add_action('wp_enqueue_scripts', 'renewable_energy_scripts');
