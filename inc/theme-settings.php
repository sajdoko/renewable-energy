<?php
/**
 * Check and setup theme's default settings
 *
 * @package Renewable_Energy
 *
 */

if ( ! function_exists('renewable_energy_setup_theme_default_settings') ) :
	function renewable_energy_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$renewable_energy_posts_index_style = get_theme_mod('renewable_energy_posts_index_style');
		if ('' == $renewable_energy_posts_index_style ) {
			set_theme_mod('renewable_energy_posts_index_style', 'default');
		}

		// Sidebar position.
		$renewable_energy_sidebar_position = get_theme_mod('renewable_energy_sidebar_position');
		if ('' == $renewable_energy_sidebar_position ) {
			set_theme_mod('renewable_energy_sidebar_position', 'right');
		}

		// Container width.
		$renewable_energy_container_type = get_theme_mod('renewable_energy_container_type');
		if ('' == $renewable_energy_container_type ) {
			set_theme_mod('renewable_energy_container_type', 'container');
		}
	}
endif;
