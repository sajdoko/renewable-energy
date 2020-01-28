<?php
/**
 * Theme basic setup.
 *
 * @package Renewable_Energy
 */

// Set the content width based on the theme's design and stylesheet.
if (!isset($content_width)) {
  $content_width = 640; /* pixels */// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
}

if (!function_exists('renewable_energy_setup')):
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function renewable_energy_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on renewable_energy, use a find and replace
     * to change 'renewable-energy' to the name of your theme in all the template files
     */
    load_theme_textdomain('renewable-energy', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
      'primary' => __('Primary Menu', 'renewable-energy'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    /*
     * Adding Thumbnail basic support
     */
    add_theme_support('post-thumbnails');

    /*
     * Adding support for Widget edit icons in customizer
     */
    add_theme_support('customize-selective-refresh-widgets');

    /*
     * Enable support for Post Formats.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats', array(
      'aside',
      'image',
      'video',
      'quote',
      'link',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('renewable_energy_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    )));

    // Set up the WordPress Theme logo feature.
    add_theme_support('custom-logo');

    // Set up the WordPress Theme custom thumbnail sizes.
    add_image_size('renewable-energy-project-thumb-1', 200, 250, true);
    add_image_size('renewable-energy-project-thumb-2', 540, 270, true);
    add_image_size('renewable-energy-blog-thumb-1', 730, 365, true);

    // Check and setup theme default settings.
    // renewable_energy_setup_theme_default_settings();
  }
endif; // renewable_energy_setup.
add_action('after_setup_theme', 'renewable_energy_setup');

if (!function_exists('renewable_energy_custom_excerpt_more')) {
  /**
   * Removes the ... from the excerpt read more link
   *
   * @param string $more The excerpt.
   *
   * @return string
   */
  function renewable_energy_custom_excerpt_more($more) {
    return '';
  }
}
add_filter('excerpt_more', 'renewable_energy_custom_excerpt_more');

if (!function_exists('renewable_energy_all_excerpts_get_more_link')) {
  /**
   * Adds a custom read more link to all excerpts, manually or automatically generated
   *
   * @param string $post_excerpt Posts's excerpt.
   *
   * @return string
   */
  function renewable_energy_all_excerpts_get_more_link($more) {
    return $more . ' [...]<p><a class="btn btn-success renewable-energy-read-more-link" href="' . esc_url(get_permalink(get_the_ID())) . '">' . __(
      'Read More ...',
      'renewable-energy'
    ) . '</a></p>';
  }
}
add_filter('excerpt_more', 'renewable_energy_all_excerpts_get_more_link', 999);

if (!function_exists('renewable_energy_archive_title')) {
  /**
   * Get rid of the “Category:”, “Tag:”, “Author:”, “Archives:” and “Other taxonomy name:” in the archive title
   */
  function renewable_energy_archive_title($renewable_energy_title) {
    if (is_category()) {
      $renewable_energy_title = single_cat_title('', false);
    } elseif (is_tag()) {
      $renewable_energy_title = single_tag_title('', false);
    } elseif (is_author()) {
      $renewable_energy_title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
      $renewable_energy_title = post_type_archive_title('', false);
    } elseif (is_tax()) {
      $renewable_energy_title = single_term_title('', false);
    }
    return $renewable_energy_title;
  }
}
add_filter('get_the_archive_title', 'renewable_energy_archive_title');

if (!function_exists('renewable_energy_wp_body_open')) {
  /**
   * renewable_energy_wp_body_open() Backwards Compatibility
   * See https://make.wordpress.org/themes/2019/03/29/addition-of-new-renewable_energy_wp_body_open-hook/
   */
  function renewable_energy_wp_body_open() {
    do_action('renewable_energy_wp_body_open');
  }
}
