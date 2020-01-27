<?php
/**
 * Adapted from Edward McIntyre's wp_bootstrap_navwalker class.
 * Removed support for glyphicon and added support for Font Awesome.
 *
 * @package Renewable_Energy
 */

// Exit if accessed directly.
if ( ! defined('ABSPATH') ) {
	exit;
}

if (! class_exists ('Renewable_Energy_WP_Bootstrap_Navwalker')) :

/**
 * Class WP_Bootstrap_Navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 4
 * navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
class Renewable_Energy_WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
	/**
	 * The starting level of the menu.
	 *
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth Depth of page. Used for padding.
	 * @param mixed  $renewable_energy_args Rest of arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $renewable_energy_args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\" dropdown-menu\" role=\"menu\">\n";
	}

	/**
	 * Open element.
	 *
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $renewable_energy_item Menu item data object.
	 * @param int    $depth Depth of menu item. Used for padding.
	 * @param mixed  $renewable_energy_args Rest arguments.
	 * @param int    $renewable_energy_id Element's ID.
	 */
	public function start_el( &$output, $renewable_energy_item, $depth = 0, $renewable_energy_args = array(), $renewable_energy_id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $renewable_energy_item->attr_title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li class="dropdown-divider" role="presentation">';
		} else if ( strcasecmp( $renewable_energy_item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li class="dropdown-divider" role="presentation">';
		} else if ( strcasecmp( $renewable_energy_item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li class="dropdown-header" role="presentation">' . esc_html( $renewable_energy_item->title );
		} else if ( strcasecmp( $renewable_energy_item->attr_title, 'disabled') == 0 ) {
			$output .= $indent . '<li class="disabled" role="presentation"><a href="#">' . esc_html( $renewable_energy_item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes     = empty( $renewable_energy_item->classes ) ? array() : (array) $renewable_energy_item->classes;
			$classes[]   = 'nav-item menu-item-' . $renewable_energy_item->ID;
			$class_names = join(' ', apply_filters('renewable_energy_nav_menu_css_class', array_filter( $classes ), $renewable_energy_item, $renewable_energy_args ) );
			/*
			if ( $renewable_energy_args->has_children )
			  $class_names .= ' dropdown';
			*/
			if ( $renewable_energy_args->has_children && $depth === 0 ) {
				$class_names .= ' dropdown';
			} elseif ( $renewable_energy_args->has_children && $depth > 0 ) {
				$class_names .= ' dropdown-submenu';
			}
			if ( in_array('current-menu-item', $classes ) ) {
				$class_names .= ' active';
			}
			// remove Font Awesome icon from classes array and save the icon
			// we will add the icon back in via a <span> below so it aligns with
			// the menu item
			if ( in_array('fa', $classes ) ) {
				$renewable_energy_key         = array_search('fa', $classes );
				$icon        = $classes[ $renewable_energy_key + 1 ];
				$class_names = str_replace( $classes[ $renewable_energy_key + 1 ], '', $class_names );
				$class_names = str_replace( $classes[ $renewable_energy_key ], '', $class_names );
			}

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$renewable_energy_id          = apply_filters('renewable_energy_nav_menu_item_id', 'menu-item-' . $renewable_energy_item->ID, $renewable_energy_item, $renewable_energy_args );
			$renewable_energy_id          = $renewable_energy_id ? ' id="' . esc_attr( $renewable_energy_id ) . '"' : '';
			$output .= $indent . '<li' . $renewable_energy_id . $value . $class_names . '>';
			$atts           = array();
			if ( empty( $renewable_energy_item->attr_title ) ) { $atts['title'] = ! empty( $renewable_energy_item->title ) ? strip_tags( $renewable_energy_item->title ) : ''; } else { $atts['title'] = $renewable_energy_item->attr_title; }
			$atts['target'] = ! empty( $renewable_energy_item->target ) ? $renewable_energy_item->target : '';
			$atts['rel']    = ! empty( $renewable_energy_item->xfn ) ? $renewable_energy_item->xfn : '';
			// If item has_children add atts to a.

			if ( $renewable_energy_args->has_children && $depth === 0 ) {
				// $atts['href']        = '#';
				$atts['href']  = ! empty( $renewable_energy_item->url ) ? $renewable_energy_item->url : '';
				// $atts['data-toggle'] = 'dropdown';
				$atts['class']       = 'nav-link';
				// $atts['aria-haspopup']    = 'true';
			} else {
				$atts['href']  = ! empty( $renewable_energy_item->url ) ? $renewable_energy_item->url : '';
				$atts['class'] = 'nav-link';
			}
			$atts       = apply_filters('renewable_energy_nav_menu_link_attributes', $atts, $renewable_energy_item, $renewable_energy_args );
			$renewable_energy_attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ('href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$renewable_energy_attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $renewable_energy_args->before;
			// Font Awesome icons
			if ( ! empty( $icon ) ) {
				$item_output .= '<a' . $renewable_energy_attributes . '><span class="fa ' . esc_attr( $icon ) . '"></span>&nbsp;';
			} else {
				$item_output .= '<a' . $renewable_energy_attributes . '>';
			}
			$item_output .= $renewable_energy_args->link_before;
			$item_output .= apply_filters('the_title', esc_html($renewable_energy_item->title), $renewable_energy_item->ID ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound -- escaped $renewable_energy_item->title
			$item_output .= $renewable_energy_args->link_after;
			$item_output .= ( $renewable_energy_args->has_children && 0 === $depth ) ? ' </a><span class="caret dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"></span>' : '</a>';
			$item_output .= $renewable_energy_args->after;
			$output .= apply_filters('renewable_energy_walker_nav_menu_start_el', $item_output, $renewable_energy_item, $depth, $renewable_energy_args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array  $children_elements List of elements to continue traversing.
	 * @param int    $max_depth Max depth to traverse.
	 * @param int    $depth Depth of current element.
	 * @param array  $renewable_energy_args
	 * @param string $output Passed by reference. Used to append additional content.
	 *
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $renewable_energy_args, &$output ) {
		if ( ! $element ) {
			return;
		}
		$id_field = $this->db_fields['id'];
		// Display this element.
		if ( is_object( $renewable_energy_args[0] ) ) {
			$renewable_energy_args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}
		parent::display_element( $element, $children_elements, $max_depth, $depth, $renewable_energy_args, $output );
	}

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $renewable_energy_args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $renewable_energy_args ) {
		if ( current_user_can('manage_options') ) {
			extract( $renewable_energy_args );
			$fb_output = null;
			if ( $renewable_energy_container ) {
				$fb_output = '<' . $renewable_energy_container;
				if ( $container_class ) {
					$fb_output .= ' class="' . $container_class . '"';
				}
				if ( $container_id ) {
					$fb_output .= ' id="' . $container_id . '"';
				}
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_class ) {
				$fb_output .= ' class="' . $menu_class . '"';
			}
			if ( $menu_id ) {
				$fb_output .= ' id="' . $menu_id . '"';
			}
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url('nav-menus.php') . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $renewable_energy_container ) {
				$fb_output .= '</' . $renewable_energy_container . '>';
			}
			echo wp_kses(
				$fb_output,
				array(
					'a' => array(
						'href' => array(),
						'title' => array(),
						'target' => array(),
						'alt' => array(),
					),
					'br' => array(),
					'class' => array(),
					'id' => array(),
					'ul' => array(),
					'li' => array(),
				)
			)
			;
		}
	}
}

endif; /* End if class exists */
