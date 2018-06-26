<?php
/**
 * Renewable Energy Theme Customizer
 *
 * @package Renewable_Energy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists('renewable_energy_customize_register') ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function renewable_energy_customize_register( $wp_customize ) {
		$wp_customize->get_setting('blogname')->transport         = 'postMessage';
		$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
		$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
	}
}
add_action('customize_register', 'renewable_energy_customize_register');

if ( ! function_exists('renewable_energy_theme_customize_register') ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function renewable_energy_theme_customize_register( $wp_customize ) {
		 //select sanitization function
        function renewable_energy_theme_slug_sanitize_select( $input, $setting ){        
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
            //get the list of possible select options 
            $choices = $setting->manager->get_control( $setting->id )->choices;                   
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
		}
		
		function renewable_energy_theme_slug_sanitize_file($file, $setting) {
			//allowed files types
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg', 
				'gif' => 'image/gif', 
				'png' => 'image/png' 
			);
			//check file type from file name
			$file_ext = wp_check_filetype( $file, $mimes );
			//if file has a valid mime type return it, otherwise return default
			return ( $file_ext['ext'] ? $file : $setting->default );
		}

		foreach (glob(get_template_directory() . "/inc/renewable-energy-options/*.php") as $option_file) {
			include_once $option_file;
		}
	}
} // endif function_exists('renewable_energy_theme_customize_register').
add_action('customize_register', 'renewable_energy_theme_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists('renewable_energy_customize_preview_js') ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function renewable_energy_customize_preview_js() {
		wp_enqueue_script('renewable_energy_customizer', get_template_directory_uri() . '/js/customizer.js',
			array('customize-preview'), '20130508', true );
	}
}
add_action('customize_preview_init', 'renewable_energy_customize_preview_js');
