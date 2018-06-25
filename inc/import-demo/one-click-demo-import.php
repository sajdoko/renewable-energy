<?php

function ocdi_import_files() {
    return array(
      array(
        'import_file_name'             => 'Demo Import',
        // 'categories'                   => array( 'Category 1', 'Category 2' ),
        'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/import-demo/demo-contents/renewable-energy-demo-content.xml',
        'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/import-demo/demo-contents/renewable-energy-widgets.wie',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/import-demo/demo-contents/renewable-energy-customizer.dat',
        // 'local_import_redux'           => array(
        //   array(
        //     'file_path'   => trailingslashit( get_template_directory() ) . 'ocdi/redux.json',
        //     'option_name' => 'redux_option_name',
        //   ),
        // ),
        'import_preview_image_url'     => 'http://via.placeholder.com/350x350',
        // 'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'your-textdomain' ),
        'preview_url'                  => '#',
      )
    );
  }
  add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );

  function ocdi_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'main-menu' => $main_menu->term_id,
		)
	);
	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function ocdi_plugin_page_title( $default_text ) {
	$default_text = '<h1 class="ocdi__title dashicons-before dashicons-upload">Renewable Energy Demo Import</h1>';

	return $default_text;
}
add_filter( 'pt-ocdi/plugin_page_title', 'ocdi_plugin_page_title' );


function ocdi_plugin_intro_text( $plugin_intro_text ) {
    // Start output buffer for displaying the plugin intro text.
    ob_start();
    ?>

        <div class="ocdi__intro-notice  notice  notice-warning  is-dismissible">
            <p><?php esc_html_e( 'Before you begin, make sure all the required plugins are activated.', 'pt-ocdi' ); ?></p>
        </div>

        <div class="ocdi__intro-text">
            <p class="about-description">
                <?php //esc_html_e( 'Importing demo data (post, pages, images, theme settings, ...) is the easiest way to setup your theme.', 'pt-ocdi' ); ?>
                <?php //esc_html_e( 'It will allow you to quickly edit everything instead of creating content from scratch.', 'pt-ocdi' ); ?>
            </p>

            <hr>

            <p><?php esc_html_e( 'When you import the data, the following things might happen:', 'pt-ocdi' ); ?></p>

            <ul>
                <li><?php esc_html_e( 'No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified.', 'pt-ocdi' ); ?></li>
                <li><?php esc_html_e( 'Posts, pages, images, widgets, menus and other theme settings will get imported.', 'pt-ocdi' ); ?></li>
                <li><?php esc_html_e( 'Please click on the Import button only once and wait, it can take a couple of minutes.', 'pt-ocdi' ); ?></li>
            </ul>
            <hr>
        </div>

    <?php
    $plugin_intro_text = ob_get_clean();
	return $plugin_intro_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );