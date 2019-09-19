<?php
/**
 * Renewable Energy modify editor
 *
 * @package Renewable_Energy
 */

/**
 * Registers an editor stylesheet for the theme.
 */
function renewable_energy_wpdocs_theme_add_editor_styles() {
  add_editor_style('css/custom-editor-style.css');
}
add_action('admin_init', 'renewable_energy_wpdocs_theme_add_editor_styles');