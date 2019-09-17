<?php

// Create Projects Post Type

function register_projects_posttype_init() {
    /**
     * add the projects custom post type
     * https://codex.wordpress.org/Function_Reference/register_post_type
     */
    $labels = array(
        'name' => _x('Projects', 'post type general name', 'renewable-energy'),
        'singular_name' => _x('Project', 'post type singular name', 'renewable-energy'),
        'add_new' => __('Add New Project', 'renewable-energy'),
        'add_new_item' => __('Add New Project', 'renewable-energy'),
        'edit_item' => __('Edit Project', 'renewable-energy'),
        'new_item' => __('New Project', 'renewable-energy'),
        'view_item' => __('View Project', 'renewable-energy'),
        'search_items' => __('Search Projects', 'renewable-energy'),
        'not_found' => __('Project', 'renewable-energy'),
        'not_found_in_trash' => __('Project', 'renewable-energy'),
        'parent_item_colon' => __('Project', 'renewable-energy'),
        'menu_name' => __('Projects', 'renewable-energy'),
    );

    $taxonomies = array();

    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
    );

    $post_type_args = array(
        'labels' => $labels,
        'singular_label' => __('Project'),
        'public' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'projects', 'with_front' => false),
        'supports' => $supports,
        'menu_position' => 6, // Where it is in the menu. Change to 6 and it's below posts. 11 and it's below media, etc.
        'menu_icon' => 'dashicons-portfolio',
        'taxonomies' => $taxonomies,
    );
    register_post_type('projects', $post_type_args);

    /**
     * Add new taxonomy, type, make it hierarchical (like categories) and associate it to the projects Custom Post Type
     * https://codex.wordpress.org/Function_Reference/register_taxonomy
     */
    $labels = array(
        'name' => _x('Types', 'taxonomy general name', 'renewable-energy'),
        'singular_name' => _x('Type', 'taxonomy singular name', 'renewable-energy'),
        'search_items' => __('Search Types', 'renewable-energy'),
        'all_items' => __('All Types', 'renewable-energy'),
        'parent_item' => __('Parent Type', 'renewable-energy'),
        'parent_item_colon' => __('Parent Type:', 'renewable-energy'),
        'edit_item' => __('Edit Type', 'renewable-energy'),
        'update_item' => __('Update Type', 'renewable-energy'),
        'add_new_item' => __('Add New Type', 'renewable-energy'),
        'new_item_name' => __('New Type Name', 'renewable-energy'),
        'menu_name' => __('Type', 'renewable-energy'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'type'),
    );

    register_taxonomy('type', array('projects'), $args);

}
add_action('init', 'register_projects_posttype_init');


/**
 * this hook will regenerate the permalinks when the plugin is activated.
 */
function renewable_energy_regenerate_htaccess() {
  register_projects_posttype_init();
  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'renewable_energy_regenerate_htaccess');