<?php
/**
 * Renewable Energy functions and definitions
 *
 * @package Renewable_Energy
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * TGM Plugin Activation
 */
require_once get_template_directory() . '/inc/import-demo/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/import-demo/renewable-energy-required-plugins.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
// require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';


/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';