<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.8.0
 */

if ( ! defined('ABSPATH') ) {
	exit;
}

wc_print_notices();

do_action('woocommerce_before_cart'); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action('woocommerce_before_cart_table'); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				<th class="product-remove">&nbsp;</th>
				<th class="product-thumbnail">&nbsp;</th>
				<th class="product-name"><?php _e('Product', 'renewable-energy'); ?></th>
				<th class="product-price"><?php _e('Price', 'renewable-energy'); ?></th>
				<th class="product-quantity"><?php _e('Quantity', 'renewable-energy'); ?></th>
				<th class="product-subtotal"><?php _e('Total', 'renewable-energy'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action('woocommerce_before_cart_contents'); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $renewable_energy_cart_item_key => $renewable_energy_cart_item ) {
				$renewable_energy__product   = apply_filters('woocommerce_cart_item_product', $renewable_energy_cart_item['data'], $renewable_energy_cart_item, $renewable_energy_cart_item_key );
				$renewable_energy_product_id = apply_filters('woocommerce_cart_item_product_id', $renewable_energy_cart_item['product_id'], $renewable_energy_cart_item, $renewable_energy_cart_item_key );

				if ( $renewable_energy__product && $renewable_energy__product->exists() && $renewable_energy_cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $renewable_energy_cart_item, $renewable_energy_cart_item_key ) ) {
					$renewable_energy_product_permalink = apply_filters('woocommerce_cart_item_permalink', $renewable_energy__product->is_visible() ? $renewable_energy__product->get_permalink( $renewable_energy_cart_item ) : '', $renewable_energy_cart_item, $renewable_energy_cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters('woocommerce_cart_item_class', 'cart_item', $renewable_energy_cart_item, $renewable_energy_cart_item_key ) ); ?>">

						<td class="product-remove">
							<?php
								echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( wc_get_cart_remove_url( $renewable_energy_cart_item_key ) ),
									esc_attr__('Remove this item', 'renewable-energy'),
									esc_attr( $renewable_energy_product_id ),
									esc_attr( $renewable_energy__product->get_sku() )
								), $renewable_energy_cart_item_key );
							?>
						</td>

						<td class="product-thumbnail">
							<?php
								$renewable_energy_thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $renewable_energy__product->get_image(), $renewable_energy_cart_item, $renewable_energy_cart_item_key );

								if ( ! $renewable_energy_product_permalink ) {
									echo $renewable_energy_thumbnail;
								} else {
									printf('<a href="%s">%s</a>', esc_url( $renewable_energy_product_permalink ), $renewable_energy_thumbnail );
								}
							?>
						</td>

						<td class="product-name" data-title="<?php esc_attr_e('Product', 'renewable-energy'); ?>">
							<?php
								if ( ! $renewable_energy_product_permalink ) {
									echo apply_filters('woocommerce_cart_item_name', $renewable_energy__product->get_name(), $renewable_energy_cart_item, $renewable_energy_cart_item_key ) . '&nbsp;';
								} else {
									echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url( $renewable_energy_product_permalink ), $renewable_energy__product->get_name() ), $renewable_energy_cart_item, $renewable_energy_cart_item_key );
								}

								// Meta data
								echo wc_get_formatted_cart_item_data( $renewable_energy_cart_item );

								// Backorder notification
								if ( $renewable_energy__product->backorders_require_notification() && $renewable_energy__product->is_on_backorder( $renewable_energy_cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'renewable-energy') . '</p>';
								}
							?>
						</td>

						<td class="product-price" data-title="<?php esc_attr_e('Price', 'renewable-energy'); ?>">
							<?php
								echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price( $renewable_energy__product ), $renewable_energy_cart_item, $renewable_energy_cart_item_key );
							?>
						</td>

						<td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'renewable-energy'); ?>">
							<?php
								if ( $renewable_energy__product->is_sold_individually() ) {
									$renewable_energy_product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $renewable_energy_cart_item_key );
								} else {
									$renewable_energy_product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$renewable_energy_cart_item_key}][qty]",
										'input_value' => $renewable_energy_cart_item['quantity'],
										'max_value'   => $renewable_energy__product->get_max_purchase_quantity(),
										'min_value'   => '0',
									), $renewable_energy__product, false );
								}

								echo apply_filters('woocommerce_cart_item_quantity', $renewable_energy_product_quantity, $renewable_energy_cart_item_key, $renewable_energy_cart_item );
							?>
						</td>

						<td class="product-subtotal" data-title="<?php esc_attr_e('Total', 'renewable-energy'); ?>">
							<?php
								echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $renewable_energy__product, $renewable_energy_cart_item['quantity'] ), $renewable_energy_cart_item, $renewable_energy_cart_item_key );
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action('woocommerce_cart_contents'); ?>

			<tr>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code"><?php _e('Coupon:', 'renewable-energy'); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'renewable-energy'); ?>" /> <input type="submit" class="btn btn-outline-primary" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'renewable-energy'); ?>" />
							<?php do_action('woocommerce_cart_coupon'); ?>
						</div>
					<?php } ?>

				<input type="submit" class="btn btn-outline-primary"  name="update_cart" value="<?php esc_attr_e('Update Cart', 'renewable-energy'); ?>" />

					<?php do_action('woocommerce_cart_actions'); ?>

					<?php wp_nonce_field('woocommerce-cart'); ?>
				</td>
			</tr>

			<?php do_action('woocommerce_after_cart_contents'); ?>
		</tbody>
	</table>
	<?php do_action('woocommerce_after_cart_table'); ?>
</form>

<div class="cart-collaterals">
	<?php
		/**
		 * woocommerce_cart_collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
	 	do_action('woocommerce_cart_collaterals');
	?>
</div>

<?php do_action('woocommerce_after_cart'); ?>
