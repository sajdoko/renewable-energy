<?php

// Create Slides Post Type

function register_slides_posttype_init() {
    /**
     * add the projects custom post type
     * https://codex.wordpress.org/Function_Reference/register_post_type
     */
    $labels = array(
        'name'                  => _x('Slides', 'post type general name', 'renewable-energy'),
        'singular_name'         => _x('Slide', 'post type singular name', 'renewable-energy'),
        'add_new'               => __('Add New Slide', 'renewable-energy'),
        'add_new_item'          => __('Add New Slide', 'renewable-energy'),
        'edit_item'             => __('Edit Slide', 'renewable-energy'),
        'new_item'              => __('New Slide', 'renewable-energy'),
        'view_item'             => __('View Slide', 'renewable-energy'),
        'search_items'          => __('Search Slides', 'renewable-energy'),
        'not_found'             => __('Slide', 'renewable-energy'),
        'not_found_in_trash'    => __('Slide', 'renewable-energy'),
        'parent_item_colon'     => __('Slide', 'renewable-energy'),
        'menu_name'             => __('Slides', 'renewable-energy'),
    );

    $taxonomies = array();

    $supports = array('editor', 'title', 'thumbnail');

    $post_type_args = array(
        'labels'                => $labels,
        'singular_label'        => _x('Slide', 'renewable-energy'),
        'public'                => true,
        'show_ui'               => true,
        'publicly_queryable'    => true,
        'query_var'             => true,
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => false,
        'rewrite'               => array('slug' => 'slides', 'with_front' => false),
        'supports'              => $supports,
        'menu_position'         => 7, // Where it is in the menu. Change to 6 and it's below posts. 11 and it's below media, etc.
        'menu_icon'             => 'dashicons-image-flip-horizontal',
        'taxonomies'            => $taxonomies,
    );
    register_post_type('slides', $post_type_args);
}
add_action('init', 'register_slides_posttype_init');


// Create Slider
function renewable_energy_slider_template() {
    // Query Arguments
    $args = array(
        'post_type' => 'slides',
        'post_status' => array( 'publish' ),
        'orderby' => 'date',
        'order'   => 'ASC',
    );
    // The Query
    $the_query = new WP_Query($args);
    // Check if the Query returns any posts
    if ($the_query->have_posts()) : // Start the Slider ?>

    <!-- ******************* The Slider Area ******************* -->
    <div id="heroSliderControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
        <?php while ($the_query->have_posts()): $the_query->the_post();?>
            <div class="carousel-item">
                <div class="jumbotron py-5 jumbotron-fluid" style="border-top: 1px solid rgba(255,255,255,.1); background-image: url('<?php the_post_thumbnail_url( 'full' ) ?>');background-size: cover;">
                    <div class="container py-5">
                        <div class="row" style="min-height: 250px;">
                            <div class="col-md-12">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
        </div>
        <?php if ( $the_query->post_count > 1 ) : ?>
            <a class="carousel-control-prev" href="#heroSliderControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">
                    <?php esc_html_e('Previous', 'renewable-energy'); ?>
                </span>
            </a>
            <a class="carousel-control-next" href="#heroSliderControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">
                    <?php esc_html_e('Next', 'renewable-energy'); ?>
                </span>
            </a>
            <ol class="carousel-indicators">
                <?php for ($x = 0; $x < $the_query->post_count; $x++) : ?>
                    <li data-target="#heroSliderControls" data-slide-to="<?php echo $x; ?>" class=""></li>
                <?php endfor;?>
            </ol>
        <?php endif; ?>
    </div>
    <!-- .carousel -->
    <?php endif;
    // Reset Post Data
    wp_reset_postdata();
}