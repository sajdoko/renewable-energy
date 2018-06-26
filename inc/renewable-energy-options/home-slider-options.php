<?php
/**
 * Renewable Energy Theme Slider Options
 *
 * @package Renewable_Energy
 */


// Home Slider Options SECTION.
$wp_customize->add_section('renewable_energy_home_slider_options', array(
    'title'       => __('Home Slider Options', 'renewable_energy'),
    'capability'  => 'edit_theme_options',
    'description' => __('Configure Home Slider Settings', 'renewable_energy'),
    'priority'    => 161,
) );

// Begins Display Home Slider
$wp_customize->add_setting('renewable_energy_show_slider', array(
    'default'           => 'yes',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'renewable_energy_show_slider', array(
            'label'       => __('Display Home Slider', 'renewable_energy'),
            //'description' => __( "Choose if you want to Display Home Slider.", 'renewable_energy'),
            'section'     => 'renewable_energy_home_slider_options',
            'settings'    => 'renewable_energy_show_slider',
            'type'        => 'select',
            'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
            'choices'     => array(
                'yes' => __('Yes', 'renewable_energy'),
                'no'  => __('No', 'renewable_energy'),
            ),
            'priority'    => '21',
        )
    ) 
);
// Ends Display Home Slider