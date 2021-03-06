<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Renewable_Energy
 */

if (!function_exists('renewable_energy_body_classes')) {
  /**
   * Adds custom classes to the array of body classes.
   *
   * @param array $classes Classes for the body element.
   *
   * @return array
   */
  function renewable_energy_body_classes($classes) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
      $classes[] = 'group-blog';
    }
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
      $classes[] = 'hfeed';
    }
    return $classes;
  }
}
add_filter('body_class', 'renewable_energy_body_classes');

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter('body_class', 'renewable_energy_adjust_body_class');
if (!function_exists('renewable_energy_adjust_body_class')) {
  /**
   * Setup body classes.
   *
   * @param string $classes CSS classes.
   *
   * @return mixed
   */
  function renewable_energy_adjust_body_class($classes) {
    foreach ($classes as $renewable_energy_key => $value) {
      if ('tag' == $value) {
        unset($classes[$renewable_energy_key]);
      }
    }
    return $classes;
  }
}

// Filter custom logo with correct classes.
add_filter('get_custom_logo', 'renewable_energy_change_logo_class');

if (!function_exists('renewable_energy_change_logo_class')) {
  /**
   * Replaces logo CSS class.
   *
   * @param string $renewable_energy_html Markup.
   *
   * @return mixed
   */
  function renewable_energy_change_logo_class($renewable_energy_html) {
    $renewable_energy_html = str_replace('class="custom-logo"', 'class="img-fluid"', $renewable_energy_html);
    $renewable_energy_html = str_replace('class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $renewable_energy_html);
    $renewable_energy_html = str_replace('alt=""', 'title="Home" alt="logo"', $renewable_energy_html);
    return $renewable_energy_html;
  }
}

/**
 * Display navigation to next/previous post when applicable.
 */
if (!function_exists('renewable_energy_post_nav')):

  function renewable_energy_post_nav() {
    // Don't print empty markup if there's nowhere to navigate.
    $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);

    if (!$next && !$previous) {
      return;
    }
    ?>
      <nav class="container navigation post-navigation">
        <h2 class="sr-only"><?php esc_html_e('Post navigation', 'renewable-energy');?></h2>
        <div class="row nav-links justify-content-between">
          <?php
            if (get_previous_post_link()) {
              previous_post_link('<span class="nav-previous">%link</span>', _x('<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'renewable-energy'));
            }
            if (get_next_post_link()) {
              next_post_link('<span class="nav-next">%link</span>', _x('%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'renewable-energy'));
            }
            ?>
        </div><!-- .nav-links -->
      </nav><!-- .navigation -->
    <?php
  }
endif;
