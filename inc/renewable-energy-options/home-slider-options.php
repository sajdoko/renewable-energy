<?php
/**
 * Renewable Energy Theme Slider Options
 *
 * @package Renewable_Energy
 */

$wp_customize->add_panel( 'renewable_energy_home_slider_options', array(
    'title' => __( 'Home Slider Options', 'renewable-energy' ),
    //'description' => 'Nuk ka', // Include html tags such as <p>.
    'priority'    => 162,
) );


// Home Slider Options SECTION.
$wp_customize->add_section('renewable_energy_first_slider_options', array(
    'title'       => __('First Slider', 'renewable-energy'),
    'capability'  => 'edit_theme_options',
    'panel'       => 'renewable_energy_home_slider_options',
) );

// Home Slider Options SECTION.
$wp_customize->add_section('renewable_energy_second_slider_options', array(
    'title'       => __('Second Slider', 'renewable-energy'),
    'capability'  => 'edit_theme_options',
    'panel'       => 'renewable_energy_home_slider_options',
) );


/////////////////
// FIRST SLIDER//
/////////////////
// Begins Enable First Slider
$wp_customize->add_setting('renewable_energy_enable_first_slider', array(
    'default'           => 'yes',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_enable_first_slider', array(
            'label'       => __('Enable First Slider', 'renewable-energy'),
            'section'     => 'renewable_energy_first_slider_options',
            'settings'    => 'renewable_energy_enable_first_slider',
            'type'        => 'select',
            'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
            'choices'     => array(
                'yes' => __('Yes', 'renewable-energy'),
                'no'  => __('No', 'renewable-energy'),
            ),
            'priority'    => '22',
        )
    ) 
);
// Ends Enable First Slider
// Begins First Slider Title
$wp_customize->add_setting('renewable_energy_first_slider_title', array(
    'default'           => 'First Slider Title',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_first_slider_title', array(
            'label'       => __('First Slider Title', 'renewable-energy'),
            'section'     => 'renewable_energy_first_slider_options',
            'settings'    => 'renewable_energy_first_slider_title',
            'type'        => 'text',
            'priority'    => '23',
        )
    ) 
);
// Ends First Slider Title
// Begins First Slider Description
$wp_customize->add_setting('renewable_energy_first_slider_description', array(
    'default'           => 'Fusce vulputate eleifend sapien. Praesent nonummy mi in odio. Nunc sed turpis. Mauris sollicitudin fermentum libero. Aenean vulputate.',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_first_slider_description', array(
            'label'       => __('First Slider Description', 'renewable-energy'),
            'section'     => 'renewable_energy_first_slider_options',
            'settings'    => 'renewable_energy_first_slider_description',
            'type'        => 'textarea',
            'priority'    => '24',
        )
    ) 
);
// Ends First Slider Description
// Begins First Slider Button Link
$wp_customize->add_setting('renewable_energy_first_slider_button_link', array(
    'default'           => '/',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_first_slider_button_link', array(
            'label'       => __('First Slider Button Link', 'renewable-energy'),
            'section'     => 'renewable_energy_first_slider_options',
            'settings'    => 'renewable_energy_first_slider_button_link',
            'type'        => 'url',
            'priority'    => '25',
        )
    ) 
);
// Ends First Slider Button Link
// Begins First Slider Button Text
$wp_customize->add_setting('renewable_energy_first_slider_button_text', array(
    'default'           => 'First Button',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_first_slider_button_text', array(
            'label'       => __('First Slider Button Text', 'renewable-energy'),
            'section'     => 'renewable_energy_first_slider_options',
            'settings'    => 'renewable_energy_first_slider_button_text',
            'type'        => 'text',
            'priority'    => '26',
        )
    ) 
);
// Ends First Slider Button Text
// Begins First Slider Backgrownd Image
$wp_customize->add_setting('renewable_energy_first_slider_backgrownd_image', array(
    'default'           => '',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_file',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
        'renewable_energy_first_slider_backgrownd_image', array(
            'label'       => __('First Slider Backgrownd Image', 'renewable-energy'),
            'section'     => 'renewable_energy_first_slider_options',
            'settings'    => 'renewable_energy_first_slider_backgrownd_image',
            'priority'    => '27',
        )
    ) 
);
// Ends First Slider Backgrownd Image



/////////////////
// Second SLIDER//
/////////////////
// Begins Enable First Slider
$wp_customize->add_setting('renewable_energy_enable_second_slider', array(
    'default'           => 'yes',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_enable_second_slider', array(
            'label'       => __('Enable Second Slider', 'renewable-energy'),
            'section'     => 'renewable_energy_second_slider_options',
            'settings'    => 'renewable_energy_enable_second_slider',
            'type'        => 'select',
            'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
            'choices'     => array(
                'yes' => __('Yes', 'renewable-energy'),
                'no'  => __('No', 'renewable-energy'),
            ),
            'priority'    => '22',
        )
    ) 
);
// Ends Enable Second Slider
// Begins Second Slider Title
$wp_customize->add_setting('renewable_energy_second_slider_title', array(
    'default'           => 'Second Slider Title',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_second_slider_title', array(
            'label'       => __('Second Slider Title', 'renewable-energy'),
            'section'     => 'renewable_energy_second_slider_options',
            'settings'    => 'renewable_energy_second_slider_title',
            'type'        => 'text',
            'priority'    => '23',
        )
    ) 
);
// Ends Second Slider Title
// Begins Second Slider Description
$wp_customize->add_setting('renewable_energy_second_slider_description', array(
    'default'           => 'Fusce vulputate eleifend sapien. Praesent nonummy mi in odio. Nunc sed turpis. Mauris sollicitudin fermentum libero. Aenean vulputate.',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_second_slider_description', array(
            'label'       => __('Second Slider Description', 'renewable-energy'),
            'section'     => 'renewable_energy_second_slider_options',
            'settings'    => 'renewable_energy_second_slider_description',
            'type'        => 'textarea',
            'priority'    => '24',
        )
    ) 
);
// Ends Second Slider Description
// Begins Second Slider Button Link
$wp_customize->add_setting('renewable_energy_second_slider_button_link', array(
    'default'           => '/',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_second_slider_button_link', array(
            'label'       => __('Second Slider Button Link', 'renewable-energy'),
            'section'     => 'renewable_energy_second_slider_options',
            'settings'    => 'renewable_energy_second_slider_button_link',
            'type'        => 'url',
            'priority'    => '25',
        )
    ) 
);
// Ends Second Slider Button Link
// Begins Second Slider Button Text
$wp_customize->add_setting('renewable_energy_second_slider_button_text', array(
    'default'           => 'Second Button',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_second_slider_button_text', array(
            'label'       => __('Second Slider Button Text', 'renewable-energy'),
            'section'     => 'renewable_energy_second_slider_options',
            'settings'    => 'renewable_energy_second_slider_button_text',
            'type'        => 'text',
            'priority'    => '26',
        )
    ) 
);
// Ends Second Slider Button Text
// Begins Second Slider Backgrownd Image
$wp_customize->add_setting('renewable_energy_second_slider_backgrownd_image', array(
    'default'           => '',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_file',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
        'renewable_energy_second_slider_backgrownd_image', array(
            'label'       => __('Second Slider Backgrownd Image', 'renewable-energy'),
            'section'     => 'renewable_energy_second_slider_options',
            'settings'    => 'renewable_energy_second_slider_backgrownd_image',
            'priority'    => '27',
        )
    ) 
);
// Ends Second Slider Backgrownd Image