<?php
/**
 * Renewable Energy Homepage Options
 *
 * @package Renewable_Energy
 */

$wp_customize->add_section('renewable_energy_homepage_options', array(
    'title' => __('Homepage Options', 'renewable-energy'),
    'capability' => 'edit_theme_options',
    'panel' => 'renewable_energy_theme_layout_section',
));

// Begins Display Home Slider
$wp_customize->add_setting('renewable_energy_show_slider', array(
    'default' => 'yes',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_show_slider', array(
        'label' => __('Display Home Slider', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_show_slider',
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
// Ends Display Home Slider
// Begins Display Hero Widget
$wp_customize->add_setting('renewable_energy_show_hero_widget', array(
    'default' => 'yes',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_show_hero_widget', array(
        'label' => __('Display Hero Widget', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_show_hero_widget',
        'type' => 'select',
        'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
        'choices' => array(
            'yes' => __('Yes', 'renewable-energy'),
            'no' => __('No', 'renewable-energy'),
        ),
        'priority' => '21',
    )
));
// Ends Display Hero Widget

//////////////////////
// CALL TO ACTION //
//////////////////////
// Begins Enable Call to Action
$wp_customize->add_setting('renewable_energy_enable_cta', array(
    'default' => 'yes',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_enable_cta', array(
        'label' => __('Enable Call to Action', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_enable_cta',
        'type' => 'select',
        'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
        'choices' => array(
            'yes' => __('Yes', 'renewable-energy'),
            'no' => __('No', 'renewable-energy'),
        ),
        'priority' => '22',
    )
)
);
// Ends Enable Call to Action
// Begins Call to Action Title
$wp_customize->add_setting('renewable_energy_cta_title', array(
    'default' => 'Call to Action Heading',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_cta_title', array(
        'label' => __('Call to Action Title', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_cta_title',
        'type' => 'text',
        'priority' => '23',
    )
)
);
// Ends Call to Action Title
// Begins Call to Action Description
$wp_customize->add_setting('renewable_energy_cta_description', array(
    'default' => 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_cta_description', array(
        'label' => __('Call to Action Description', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_cta_description',
        'type' => 'textarea',
        'priority' => '24',
    )
)
);
// Ends Call to Action Description
// Begins Call to Action Button Text
$wp_customize->add_setting('renewable_energy_cta_button_text', array(
    'default' => 'First Button',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_cta_button_text', array(
        'label' => __('Call to Action Button Text', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_cta_button_text',
        'type' => 'text',
        'priority' => '25',
    )
)
);
// Ends Call to Action Button Text
// Begins Call to Action Button Link
$wp_customize->add_setting('renewable_energy_cta_button_link', array(
    'default' => '/',
    'type' => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_cta_button_link', array(
        'label' => __('Call to Action Button Link', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_cta_button_link',
        'type' => 'url',
        'priority' => '26',
    )
)
);
// Ends Call to Action Button Link
////////////////////// END CALL TO ACTION

//////////////////////
// PROJECTS //
//////////////////////
// Begins Display Projects Section
$wp_customize->add_setting('renewable_energy_show_projects_section', array(
    'default' => 'yes',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_show_projects_section', array(
        'label' => __('Display Projects Section', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_show_projects_section',
        'type' => 'select',
        'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
        'choices' => array(
            'yes' => __('Yes', 'renewable-energy'),
            'no' => __('No', 'renewable-energy'),
        ),
        'priority' => '27',
    )
));
// Ends Display Projects Section
// Begins Projects Title
$wp_customize->add_setting('renewable_energy_projects_heading_title', array(
    'default' => 'Fancy display heading',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_projects_heading_title', array(
        'label' => __('Projects Heading Title', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_projects_heading_title',
        'type' => 'text',
        'priority' => '28',
    )
));
// Ends Projects Title
// Begins Projects Description
$wp_customize->add_setting('renewable_energy_projects_heading_description', array(
    'default' => 'With faded secondary text',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_projects_heading_description', array(
        'label' => __('Display Projects Section', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_projects_heading_description',
        'type' => 'textarea',
        'priority' => '29',
    )
));
// Ends Projects Description
// Begins Number of Projects to Display
$wp_customize->add_setting('renewable_energy_number_of_projects', array(
    'default' => '4',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,
    'renewable_energy_number_of_projects', array(
        'label' => __('Number of Projects to Display', 'renewable-energy'),
        'section' => 'renewable_energy_homepage_options',
        'settings' => 'renewable_energy_number_of_projects',
        'type' => 'select',
        'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
        'choices' => array(
            '2' => __('2', 'renewable-energy'),
            '4' => __('4', 'renewable-energy'),
            '6' => __('6', 'renewable-energy'),
            '-1' => __('All', 'renewable-energy'),
        ),
        'priority' => '30',
    )
));
// Ends Number of Projects to Display