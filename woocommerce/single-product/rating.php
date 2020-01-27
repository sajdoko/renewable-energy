<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 	3.6.0
 */

if ( ! defined('ABSPATH') ) {
	exit; // Exit if accessed directly
}

global $product;

if ('no' === get_option('woocommerce_enable_review_rating') ) {
	return;
}

$renewable_energy_rating_count = $product->get_rating_count();
$renewable_energy_review_count = $product->get_review_count();
$renewable_energy_average      = $product->get_average_rating();

if ( $renewable_energy_rating_count > 0 ) : ?>

	<div class="woocommerce-product-rating">
		<?php echo wc_get_rating_html( $renewable_energy_average, $renewable_energy_rating_count ); ?>
		<?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n('%s customer review', '%s customer reviews', $renewable_energy_review_count, 'renewable-energy'), '<span class="count">' . esc_html( $renewable_energy_review_count ) . '</span>'); ?>)</a><?php endif ?>
	</div>

<?php endif; ?>
