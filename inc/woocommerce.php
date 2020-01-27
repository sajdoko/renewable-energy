<?php
/**
 * Add WooCommerce support
 *
 * @package Renewable_Energy
 */
add_action('after_setup_theme', 'renewable_energy_woocommerce_support');
if ( ! function_exists('renewable_energy_woocommerce_support') ) {
	/**
	 * Declares WooCommerce theme support.
	 */
	function renewable_energy_woocommerce_support() {
		add_theme_support('woocommerce');
		
		// Add New Woocommerce 3.0.0 Product Gallery support
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-slider');

		// hook in and customizer form fields.
		add_filter('woocommerce_form_field_args', 'renewable_energy_wc_form_field_args', 10, 3 );
	}
}
/**
 * Filter hook function monkey patching form classes
 * Author: Adriano Monecchi http://stackoverflow.com/a/36724593/307826
 *
 * @param string $renewable_energy_args Form attributes.
 * @param string $renewable_energy_key Not in use.
 * @param null   $value Not in use.
 *
 * @return mixed
 */
function renewable_energy_wc_form_field_args( $renewable_energy_args, $renewable_energy_key, $value = null ) {
	// Start field type switch case.
	switch ( $renewable_energy_args['type'] ) {
		/* Targets all select input type elements, except the country and state select input types */
		case 'select' :
			// Add a class to the field's html element wrapper - woocommerce
			// input types (fields) are often wrapped within a <p></p> tag.
			$renewable_energy_args['class'][] = 'form-group';
			// Add a class to the form input itself.
			$renewable_energy_args['input_class']       = array('form-control', 'input-lg');
			$renewable_energy_args['label_class']       = array('control-label');
			$renewable_energy_args['custom_attributes'] = array(
				'data-plugin'      => 'select2',
				'data-allow-clear' => 'true',
				'aria-hidden'      => 'true',
				// Add custom data attributes to the form input itself.
			);
			break;
		// By default WooCommerce will populate a select with the country names - $renewable_energy_args
		// defined for this specific input type targets only the country select element.
		case 'country' :
			$renewable_energy_args['class'][]     = 'form-group single-country';
			$renewable_energy_args['label_class'] = array('control-label');
			break;
		// By default WooCommerce will populate a select with state names - $renewable_energy_args defined
		// for this specific input type targets only the country select element.
		case 'state' :
			// Add class to the field's html element wrapper.
			$renewable_energy_args['class'][] = 'form-group';
			// add class to the form input itself.
			$renewable_energy_args['input_class']       = array('', 'input-lg');
			$renewable_energy_args['label_class']       = array('control-label');
			$renewable_energy_args['custom_attributes'] = array(
				'data-plugin'      => 'select2',
				'data-allow-clear' => 'true',
				'aria-hidden'      => 'true',
			);
			break;
		case 'password' :
		case 'text' :
		case 'email' :
		case 'tel' :
		case 'number' :
			$renewable_energy_args['class'][]     = 'form-group';
			$renewable_energy_args['input_class'] = array('form-control', 'input-lg');
			$renewable_energy_args['label_class'] = array('control-label');
			break;
		case 'textarea' :
			$renewable_energy_args['input_class'] = array('form-control', 'input-lg');
			$renewable_energy_args['label_class'] = array('control-label');
			break;
		case 'checkbox' :
			$renewable_energy_args['label_class'] = array('custom-control custom-checkbox');
			$renewable_energy_args['input_class'] = array('custom-control-input', 'input-lg');
			break;
		case 'radio' :
			$renewable_energy_args['label_class'] = array('custom-control custom-radio');
			$renewable_energy_args['input_class'] = array('custom-control-input', 'input-lg');
			break;
		default :
			$renewable_energy_args['class'][]     = 'form-group';
			$renewable_energy_args['input_class'] = array('form-control', 'input-lg');
			$renewable_energy_args['label_class'] = array('control-label');
			break;
	} // end switch ($renewable_energy_args).
	return $renewable_energy_args;
}
