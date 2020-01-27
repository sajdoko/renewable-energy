<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Renewable_Energy
 */

if (!function_exists('renewable_energy_posted_on')):
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
  function renewable_energy_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    // if ( get_the_time('U') !== get_the_modified_time('U') ) {
    //     $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s"> (%4$s) </time>';
    // }
    $time_string = sprintf($time_string,
      esc_attr(get_the_date('c')),
      esc_html(get_the_date())
      // esc_attr( get_the_modified_date('c') ),
      // esc_html( get_the_modified_date() )
    );
    $posted_on = sprintf(
      /* translators: %s: post date */
      esc_html_x('Posted on %s', 'post date', 'renewable-energy'),
      '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );
    $byline = sprintf(
      /* translators: %s: post author */
      esc_html_x('by %s', 'post author', 'renewable-energy'),
      '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );
    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
  }
endif;

if (!function_exists('renewable_energy_entry_footer')):
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
  function renewable_energy_entry_footer() {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list(esc_html__(', ', 'renewable-energy'));
      if ($categories_list && renewable_energy_categorized_blog()) {
        printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'renewable-energy') . '</span>', $categories_list); // WPCS: XSS OK.
      }
      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list('', esc_html__(', ', 'renewable-energy'));
      if ($tags_list) {
        printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'renewable-energy') . '</span>', $tags_list); // WPCS: XSS OK.
      }
    }
    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
      echo '<span class="comments-link">';
      comments_popup_link(esc_html__('Leave a comment', 'renewable-energy'), esc_html__('1 Comment', 'renewable-energy'), esc_html__('% Comments', 'renewable-energy'));
      echo '</span>';
    }
    edit_post_link(
      sprintf(
        /* translators: %s: Name of current post */
        esc_html__('Edit %s', 'renewable-energy'),
        the_title('<span class="screen-reader-text">"', '"</span>', false)
      ),
      '<span class="edit-link">',
      '</span>'
    );
  }
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function renewable_energy_categorized_blog() {
  if (false === ($all_the_cool_cats = get_transient('renewable_energy_categories'))) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories(array(
      'fields' => 'ids',
      'hide_empty' => 1,
      // We only need to know if there is more than one category.
      'number' => 2,
    ));
    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count($all_the_cool_cats);
    set_transient('renewable_energy_categories', $all_the_cool_cats);
  }
  if ($all_the_cool_cats > 1) {
    // This blog has more than 1 category so components_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so components_categorized_blog should return false.
    return false;
  }
}

/**
 * Flush out the transients used in renewable_energy_categorized_blog.
 */
function renewable_energy_category_transient_flusher() {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient('renewable_energy_categories');
}
add_action('edit_category', 'renewable_energy_category_transient_flusher');
add_action('save_post', 'renewable_energy_category_transient_flusher');

if (!function_exists('renewable_energy_breadcrumbs')):
/**
 * Adds the Breadcrumb functionality to the theme
 */
  function renewable_energy_custom_get_category_parents($renewable_energy_id, $visited = array()) {
    $chain = '';
    $parent = get_term($renewable_energy_id, 'category');
    if (is_wp_error($parent)) {
      return $parent;
    }

    $renewable_energy_name = $parent->name;
    if ($parent->parent && ($parent->parent != $parent->term_id) && !in_array($parent->parent, $visited)) {
      $visited[] = $parent->parent;
      $chain .= renewable_energy_custom_get_category_parents($parent->parent, $visited);
    }
    $chain .= '<li class="breadcrumb-item"><a href="' . esc_url(get_category_link($parent->term_id)) . '">' . $renewable_energy_name . '</a>' . '</li>';
    return $chain;
  }
  function renewable_energy_breadcrumbs() {
    global $post;
    if (is_front_page()) {
      return;
    } else {
      $renewable_energy_html = '<ol class="breadcrumb">';
      $renewable_energy_html .= '<li class="breadcrumb-item"><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'renewable-energy') . '</a></li>';
      if (is_attachment()) {
        $parent = get_post($post->post_parent);
        $categories = get_the_category($parent->ID);
        if ($categories[0]) {
          $renewable_energy_html .= renewable_energy_custom_get_category_parents($categories[0]);
        }
        $renewable_energy_html .= '<li class="breadcrumb-item"><a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a></li>';
        $renewable_energy_html .= '<li class="breadcrumb-item active">' . esc_html( get_the_title() ) . '</li>';
      } elseif (is_category()) {
      $category = get_category(get_query_var('cat'));
      if ($category->parent != 0) {
        $renewable_energy_html .= renewable_energy_custom_get_category_parents($category->parent);
      }
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . single_cat_title('', false) . '</li>';
    } elseif (is_page() && !is_front_page()) {
      $parent_id = $post->post_parent;
      $parent_pages = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $parent_pages[] = $page;
        $parent_id = $page->post_parent;
      }
      $parent_pages = array_reverse($parent_pages);
      if (!empty($parent_pages)) {
        foreach ($parent_pages as $parent) {
          $renewable_energy_html .= '<li class="breadcrumb-item"><a href="' . esc_url(get_permalink($parent->ID)) . '">' . esc_html( get_the_title($parent->ID)) . '</a></li>';
        }
      }
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . esc_html( get_the_title() ) . '</li>';
    } elseif (is_singular('post')) {
      $categories = get_the_category();
      if ($categories[0]) {
        $renewable_energy_html .= renewable_energy_custom_get_category_parents($categories[0]);
      }
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . esc_html( get_the_title() ) . '</li>';
    } elseif (is_singular('projects')) {
      $categories = get_the_terms($post->ID, 'type');
      if (isset($categories[0])) {
        $renewable_energy_html .= renewable_energy_custom_get_category_parents($categories[0]);
      }
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . esc_html( get_the_title() ) . '</li>';
    } elseif (is_singular('slides')) {
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . esc_html( get_the_title() ) . '</li>';
    } elseif (is_tag()) {
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . single_tag_title('', false) . '</li>';
    } elseif (is_tax()) {
      $current_term = single_term_title("", false);
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . $current_term . '</li>';
    } elseif (is_day()) {
      $renewable_energy_html .= '<li class="breadcrumb-item"><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a></li>';
      $renewable_energy_html .= '<li class="breadcrumb-item"><a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . get_the_time('m') . '</a></li>';
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . get_the_time('d') . '</li>';
    } elseif (is_month()) {
      $renewable_energy_html .= '<li class="breadcrumb-item"><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a></li>';
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . get_the_time('F') . '</li>';
    } elseif (is_year()) {
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . get_the_time('Y') . '</li>';
    } elseif (is_author()) {
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . get_the_author() . '</li>';
    } elseif (is_archive()) {
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . post_type_archive_title('', false) . '</li>';
    } elseif (is_search()) {
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . __('Search Results for: ', 'renewable-energy') . '<b>' . get_search_query() . '</b></li>';
    } elseif (is_404()) {
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . __('404 Page', 'renewable-energy') . '</li>';
    } elseif (is_home()) {
      $renewable_energy_html .= '<li class="breadcrumb-item active">' . __('Blog', 'renewable-energy') . '</li>';
    } else {
      $renewable_energy_html .= '<li class="breadcrumb-item active"></li>';
    }
  }
  $renewable_energy_html .= '</ol>';
  echo $renewable_energy_html;
}
endif;

if (!function_exists('renewable_energy_slider_template')):
  /**
   * Create Slider Template
   */
  function renewable_energy_slider_template() {
    // Query Arguments
    $renewable_energy_args = array(
      'post_type' => 'slides',
      'post_status' => array('publish'),
      'orderby' => 'date',
      'order' => 'ASC',
    );
    // The Query
    $the_query = new WP_Query($renewable_energy_args);
    // Check if the Query returns any posts
    if ($the_query->have_posts()): ; // Start the Slider ?>

				    <!-- ******************* The Slider Area ******************* -->
				    <div id="heroSliderControls" class="carousel slide" data-ride="carousel">
				        <div class="carousel-inner" role="listbox">
				        <?php while ($the_query->have_posts()): $the_query->the_post();?>
						            <div class="carousel-item">
						                <div class="jumbotron py-5 jumbotron-fluid" style="border-top: 1px solid rgba(255,255,255,.1); background-image: url('<?php the_post_thumbnail_url('full');?>');background-size: cover;">
						                    <div class="container py-5">
						                        <div class="row" style="min-height: 250px;">
						                            <div class="col-md-12">
						                                <?php the_content();?>
						                            </div>
						                        </div>
						                    </div>
						                </div>
						            </div>
						        <?php endwhile;?>
				        </div>
				        <?php if ($the_query->post_count > 1): ?>
				            <a class="carousel-control-prev" href="#heroSliderControls" role="button" data-slide="prev">
				                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				                <span class="sr-only">
				                    <?php esc_html_e('Previous', 'renewable-energy');?>
				                </span>
				            </a>
				            <a class="carousel-control-next" href="#heroSliderControls" role="button" data-slide="next">
				                <span class="carousel-control-next-icon" aria-hidden="true"></span>
				                <span class="sr-only">
				                    <?php esc_html_e('Next', 'renewable-energy');?>
				                </span>
				            </a>
				            <ol class="carousel-indicators">
				                <?php for ($x = 0; $x < $the_query->post_count; $x++): ?>
				                    <li data-target="#heroSliderControls" data-slide-to="<?php echo $x; ?>" class=""></li>
				                <?php endfor;?>
		            </ol>
		        <?php endif;?>
    </div>
    <!-- .carousel -->
    <?php endif;
  // Reset Post Data
  wp_reset_postdata();
}
endif;
