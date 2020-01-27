<?php
/**
 * Renewable Energy Theme Layout Settings
 *
 * @package Renewable_Energy
 */

$wp_customize->add_panel('renewable_energy_theme_layout_section', array(
    'title' => __('Renewable Energy Settings', 'renewable-energy'),
    'priority' => 1,
));

// Theme layout settings SECTION.
$wp_customize->add_section('renewable_energy_theme_layout_options', array(
    'title' => __('Renewable Energy Options', 'renewable-energy'),
    'capability' => 'edit_theme_options',
    'panel' => 'renewable_energy_theme_layout_section',
    'description' => __('Container width and sidebar defaults', 'renewable-energy'),
    'priority' => 1,
));

// Begins Container Width
$wp_customize->add_setting('renewable_energy_container_type', array(
    'default' => 'container',
    'type' => 'theme_mod',
    'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
    'capability' => 'edit_theme_options',
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_container_type', array(
        'label' => __('Container Width', 'renewable-energy'),
        'description' => __("Choose between Bootstrap's container and container-fluid", 'renewable-energy'),
        'section' => 'renewable_energy_theme_layout_options',
        'settings' => 'renewable_energy_container_type',
        'type' => 'select',
        'choices' => array(
            'container' => __('Fixed width container', 'renewable-energy'),
            'container-fluid' => __('Full width container', 'renewable-energy'),
        ),
        'priority' => '10',
    )
));
// Ends Container Width
// Begins Sidebar Positioning
$wp_customize->add_setting('renewable_energy_sidebar_position', array(
    'default' => 'right',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_sidebar_position', array(
        'label' => __('Sidebar Positioning', 'renewable-energy'),
        'description' => __("Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
            'renewable-energy'),
        'section' => 'renewable_energy_theme_layout_options',
        'settings' => 'renewable_energy_sidebar_position',
        'type' => 'select',
        'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
        'choices' => array(
            'right' => __('Right sidebar', 'renewable-energy'),
            'left' => __('Left sidebar', 'renewable-energy'),
            'both' => __('Left & Right sidebars', 'renewable-energy'),
            'none' => __('No sidebar', 'renewable-energy'),
        ),
        'priority' => '20',
    )
));
// Ends Sidebar Positioning
// Begins Display Preloader
$wp_customize->add_setting('renewable_energy_show_preloader', array(
    'default' => 'yes',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_show_preloader', array(
        'label' => __('Display Preloader', 'renewable-energy'),
        'section' => 'renewable_energy_theme_layout_options',
        'settings' => 'renewable_energy_show_preloader',
        'type' => 'select',
        'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
        'choices' => array(
            'yes' => __('Yes', 'renewable-energy'),
            'no' => __('No', 'renewable-energy'),
        ),
        'priority' => '21',
    )
)
);
// Ends Display Preloader
// Begins Display Footer Widget
$wp_customize->add_setting('renewable_energy_show_footer_widget', array(
    'default' => 'yes',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_show_footer_widget', array(
        'label' => __('Display Footer Widget', 'renewable-energy'),
        'section' => 'renewable_energy_theme_layout_options',
        'settings' => 'renewable_energy_show_footer_widget',
        'type' => 'select',
        'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
        'choices' => array(
            'yes' => __('Yes', 'renewable-energy'),
            'no' => __('No', 'renewable-energy'),
        ),
        'priority' => '22',
    )
));
// Ends Display Footer Widget
// Begins Display Footer Copyright
$wp_customize->add_setting('renewable_energy_show_footer_copyright', array(
    'default' => 'yes',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_show_footer_copyright', array(
        'label' => __('Display Footer Copyright', 'renewable-energy'),
        'section' => 'renewable_energy_theme_layout_options',
        'settings' => 'renewable_energy_show_footer_copyright',
        'type' => 'select',
        'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
        'choices' => array(
            'yes' => __('Yes', 'renewable-energy'),
            'no' => __('No', 'renewable-energy'),
        ),
        'priority' => '23',
    )
));
// Ends Display Footer Copyright
// Begins Footer Copyright Content
$renewable_energy_the_theme = wp_get_theme();
$wp_customize->add_setting('renewable_energy_footer_copyright_content', array(
    'default' => 'Renewable Energy',
    'type' => 'theme_mod',
    'sanitize_callback' => 'wp_kses_post', //keeps only HTML tags that are allowed in post content
    'capability' => 'edit_theme_options',
    'transport' => "refresh",
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_footer_copyright_content', array(
        'label' => __('Footer Copyright Content', 'renewable-energy'),
        'section' => 'renewable_energy_theme_layout_options',
        'settings' => 'renewable_energy_footer_copyright_content',
        'type' => 'textarea',
        'priority' => '24',
    )
));
// Ends Footer Copyright Content