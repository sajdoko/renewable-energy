<?php
/**
 * Renewable Energy Theme Layout Settings
 *
 * @package Renewable_Energy
 */

// Theme layout settings SECTION.
    $wp_customize->add_section('renewable_energy_theme_layout_options', array(
        'title'       => __('Theme Layout Settings', 'renewable_energy'),
        'capability'  => 'edit_theme_options',
        'description' => __('Container width and sidebar defaults', 'renewable_energy'),
        'priority'    => 160,
    ) );

    
// Begins Container Width
    $wp_customize->add_setting('renewable_energy_container_type', array(
        'default'           => 'container',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'renewable_energy_container_type', array(
                'label'       => __('Container Width', 'renewable_energy'),
                'description' => __( "Choose between Bootstrap's container and container-fluid", 'renewable_energy'),
                'section'     => 'renewable_energy_theme_layout_options',
                'settings'    => 'renewable_energy_container_type',
                'type'        => 'select',
                'choices'     => array(
                    'container'       => __('Fixed width container', 'renewable_energy'),
                    'container-fluid' => __('Full width container', 'renewable_energy'),
                ),
                'priority'    => '10',
            )
        ) );
// Ends Container Width
// Begins Sidebar Positioning
    $wp_customize->add_setting('renewable_energy_sidebar_position', array(
        'default'           => 'right',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'renewable_energy_sidebar_position', array(
                'label'       => __('Sidebar Positioning', 'renewable_energy'),
                'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
                'renewable_energy'),
                'section'     => 'renewable_energy_theme_layout_options',
                'settings'    => 'renewable_energy_sidebar_position',
                'type'        => 'select',
                'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
                'choices'     => array(
                    'right' => __('Right sidebar', 'renewable_energy'),
                    'left'  => __('Left sidebar', 'renewable_energy'),
                    'both'  => __('Left & Right sidebars', 'renewable_energy'),
                    'none'  => __('No sidebar', 'renewable_energy'),
                ),
                'priority'    => '20',
            )
        ) );
// Ends Sidebar Positioning
// Begins Display Hero Widget
    $wp_customize->add_setting('renewable_energy_show_hero_widget', array(
        'default'           => 'yes',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'renewable_energy_show_hero_widget', array(
                'label'       => __('Display Hero Widget', 'renewable_energy'),
                'section'     => 'renewable_energy_theme_layout_options',
                'settings'    => 'renewable_energy_show_hero_widget',
                'type'        => 'select',
                'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
                'choices'     => array(
                    'yes' => __('Yes', 'renewable_energy'),
                    'no'  => __('No', 'renewable_energy'),
                ),
                'priority'    => '21',
            )
        ) );
// Ends Display Hero Widget
// Begins Display Footer Widget
    $wp_customize->add_setting('renewable_energy_show_footer_widget', array(
        'default'           => 'yes',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'renewable_energy_show_footer_widget', array(
                'label'       => __('Display Footer Widget', 'renewable_energy'),
                'section'     => 'renewable_energy_theme_layout_options',
                'settings'    => 'renewable_energy_show_footer_widget',
                'type'        => 'select',
                'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
                'choices'     => array(
                    'yes' => __('Yes', 'renewable_energy'),
                    'no'  => __('No', 'renewable_energy'),
                ),
                'priority'    => '22',
            )
        ) );
// Ends Display Footer Widget