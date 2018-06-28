<?php
/**
 * Renewable Energy Theme Featurette Options
 *
 * @package Renewable_Energy
 */

$wp_customize->add_panel( 'renewable_energy_featurette_options', array(
    'title' => __( 'Home Featurette Options' ),
    //'description' => 'Nuk ka', // Include html tags such as <p>.
    'priority'    => 163,
) );


// First Featurette Options SECTION.
$wp_customize->add_section('renewable_energy_first_featurette_options', array(
    'title'       => __('First Featurette Options', 'renewable_energy'),
    'capability'  => 'edit_theme_options',
    'panel'       => 'renewable_energy_featurette_options',
) );

// Second Featurette Options SECTION.
$wp_customize->add_section('renewable_energy_second_featurette_options', array(
    'title'       => __('Second Featurette Options', 'renewable_energy'),
    'capability'  => 'edit_theme_options',
    'panel'       => 'renewable_energy_featurette_options',
) );


//////////////////////
// FIRST FEATURETTE //
//////////////////////
// Begins Enable First Featurette
$wp_customize->add_setting('renewable_energy_enable_first_featurette', array(
    'default'           => 'yes',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_enable_first_featurette', array(
            'label'       => __('Enable First Featurette', 'renewable_energy'),
            'section'     => 'renewable_energy_first_featurette_options',
            'settings'    => 'renewable_energy_enable_first_featurette',
            'type'        => 'select',
            'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
            'choices'     => array(
                'yes' => __('Yes', 'renewable_energy'),
                'no'  => __('No', 'renewable_energy'),
            ),
            'priority'    => '22',
        )
    ) 
);
// Ends Enable First Featurette
// Begins First Featurette Title
$wp_customize->add_setting('renewable_energy_first_featurette_title', array(
    'default'           => 'First Featurette Heading',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_first_featurette_title', array(
            'label'       => __('First Featurette Title', 'renewable_energy'),
            'section'     => 'renewable_energy_first_featurette_options',
            'settings'    => 'renewable_energy_first_featurette_title',
            'type'        => 'text',
            'priority'    => '23',
        )
    ) 
);
// Ends First Featurette Title
// Begins First Featurette Description
$wp_customize->add_setting('renewable_energy_first_featurette_description', array(
    'default'           => 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_first_featurette_description', array(
            'label'       => __('First Featurette Description', 'renewable_energy'),
            'section'     => 'renewable_energy_first_featurette_options',
            'settings'    => 'renewable_energy_first_featurette_description',
            'type'        => 'textarea',
            'priority'    => '24',
        )
    ) 
);
// Ends First Featurette Description
// Begins First Featurette Button Text
$wp_customize->add_setting('renewable_energy_first_featurette_button_text', array(
    'default'           => 'First Button',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_first_featurette_button_text', array(
            'label'       => __('First Featurette Button Text', 'renewable_energy'),
            'section'     => 'renewable_energy_first_featurette_options',
            'settings'    => 'renewable_energy_first_featurette_button_text',
            'type'        => 'text',
            'priority'    => '25',
        )
    ) 
);
// Ends First Featurette Button Text
// Begins First Featurette Button Link
$wp_customize->add_setting('renewable_energy_first_featurette_button_link', array(
    'default'           => '/',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_first_featurette_button_link', array(
            'label'       => __('First Featurette Button Link', 'renewable_energy'),
            'section'     => 'renewable_energy_first_featurette_options',
            'settings'    => 'renewable_energy_first_featurette_button_link',
            'type'        => 'url',
            'priority'    => '26',
        )
    ) 
);
// Ends First Featurette Button Link
// Begins First Featurette Backgrownd Image
$wp_customize->add_setting('renewable_energy_first_featurette_backgrownd_image', array(
    'default'           => '',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_file',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
        'renewable_energy_first_featurette_backgrownd_image', array(
            'label'       => __('First Featurette Backgrownd Image', 'renewable_energy'),
            'section'     => 'renewable_energy_first_featurette_options',
            'settings'    => 'renewable_energy_first_featurette_backgrownd_image',
            'priority'    => '27',
        )
    ) 
);
// Ends First Featurette Backgrownd Image



//////////////////////
// SECOND FEATURETTE //
//////////////////////
// Begins Enable Second Featurette
$wp_customize->add_setting('renewable_energy_enable_second_featurette', array(
    'default'           => 'yes',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_enable_second_featurette', array(
            'label'       => __('Enable Second Featurette', 'renewable_energy'),
            'section'     => 'renewable_energy_second_featurette_options',
            'settings'    => 'renewable_energy_enable_second_featurette',
            'type'        => 'select',
            'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_select',
            'choices'     => array(
                'yes' => __('Yes', 'renewable_energy'),
                'no'  => __('No', 'renewable_energy'),
            ),
            'priority'    => '22',
        )
    ) 
);
// Ends Enable Second Featurette
// Begins Second Featurette Title
$wp_customize->add_setting('renewable_energy_second_featurette_title', array(
    'default'           => 'Second Featurette Heading',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_second_featurette_title', array(
            'label'       => __('Second Featurette Title', 'renewable_energy'),
            'section'     => 'renewable_energy_second_featurette_options',
            'settings'    => 'renewable_energy_second_featurette_title',
            'type'        => 'text',
            'priority'    => '23',
        )
    ) 
);
// Ends Second Featurette Title
// Begins Second Featurette Description
$wp_customize->add_setting('renewable_energy_second_featurette_description', array(
    'default'           => 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_second_featurette_description', array(
            'label'       => __('Second Featurette Description', 'renewable_energy'),
            'section'     => 'renewable_energy_second_featurette_options',
            'settings'    => 'renewable_energy_second_featurette_description',
            'type'        => 'textarea',
            'priority'    => '24',
        )
    ) 
);
// Ends Second Featurette Description
// Begins Second Featurette Button Text
$wp_customize->add_setting('renewable_energy_second_featurette_button_text', array(
    'default'           => 'Second Button',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_second_featurette_button_text', array(
            'label'       => __('Second Featurette Button Text', 'renewable_energy'),
            'section'     => 'renewable_energy_second_featurette_options',
            'settings'    => 'renewable_energy_second_featurette_button_text',
            'type'        => 'text',
            'priority'    => '25',
        )
    ) 
);
// Ends Second Featurette Button Text
// Begins Second Featurette Button Link
$wp_customize->add_setting('renewable_energy_second_featurette_button_link', array(
    'default'           => '/',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'renewable_energy_second_featurette_button_link', array(
            'label'       => __('Second Featurette Button Link', 'renewable_energy'),
            'section'     => 'renewable_energy_second_featurette_options',
            'settings'    => 'renewable_energy_second_featurette_button_link',
            'type'        => 'url',
            'priority'    => '26',
        )
    ) 
);
// Ends Second Featurette Button Link
// Begins Second Featurette Backgrownd Image
$wp_customize->add_setting('renewable_energy_second_featurette_backgrownd_image', array(
    'default'           => '',
    'type'              => 'theme_mod',
    'sanitize_callback' => 'renewable_energy_theme_slug_sanitize_file',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
        'renewable_energy_second_featurette_backgrownd_image', array(
            'label'       => __('Second Featurette Backgrownd Image', 'renewable_energy'),
            'section'     => 'renewable_energy_second_featurette_options',
            'settings'    => 'renewable_energy_second_featurette_backgrownd_image',
            'priority'    => '27',
        )
    ) 
);
// Ends Second Featurette Backgrownd Image