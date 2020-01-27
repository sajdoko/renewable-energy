<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	3.5.1
 */

if ( ! defined('ABSPATH') ) {
	exit;
}

global $post, $product;

$renewable_energy_attachment_ids = $product->get_gallery_image_ids();

if ( $renewable_energy_attachment_ids && has_post_thumbnail() ) {
	foreach ( $renewable_energy_attachment_ids as $renewable_energy_attachment_id ) {
		$renewable_energy_full_size_image = wp_get_attachment_image_src( $renewable_energy_attachment_id, 'full');
		$renewable_energy_thumbnail       = wp_get_attachment_image_src( $renewable_energy_attachment_id, 'shop_thumbnail');
		$renewable_energy_attributes      = array(
			'title'                   => get_post_field('post_title', $renewable_energy_attachment_id ),
			'data-caption'            => get_post_field('post_excerpt', $renewable_energy_attachment_id ),
			'data-src'                => $renewable_energy_full_size_image[0],
			'data-large_image'        => $renewable_energy_full_size_image[0],
			'data-large_image_width'  => $renewable_energy_full_size_image[1],
			'data-large_image_height' => $renewable_energy_full_size_image[2],
		);

		$renewable_energy_html  = '<div data-thumb="' . esc_url( $renewable_energy_thumbnail[0] ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $renewable_energy_full_size_image[0] ) . '">';
		$renewable_energy_html .= wp_get_attachment_image( $renewable_energy_attachment_id, 'shop_single', false, $renewable_energy_attributes );
 		$renewable_energy_html .= '</a></div>';

		echo apply_filters('woocommerce_single_product_image_thumbnail_html', $renewable_energy_html, $renewable_energy_attachment_id );
	}
}
