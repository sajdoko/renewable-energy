<?php
/**
 * Pay for order form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-pay.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see      https://docs.woocommerce.com/document/template-structure/
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined('ABSPATH') ) {
	exit;
}

?>
<form id="order_review" method="post">

	<table class="shop_table">
		<thead>
			<tr>
				<th class="product-name"><?php _e('Product', 'renewable-energy'); ?></th>
				<th class="product-quantity"><?php _e('Qty', 'renewable-energy'); ?></th>
				<th class="product-total"><?php _e('Totals', 'renewable-energy'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if ( sizeof( $renewable_energy_order->get_items() ) > 0 ) : ?>
				<?php foreach ( $renewable_energy_order->get_items() as $renewable_energy_item_id => $renewable_energy_item ) : ?>
					<?php
						if ( ! apply_filters('woocommerce_order_item_visible', true, $renewable_energy_item ) ) {
							continue;
						}
					?>
					<tr class="<?php echo esc_attr( apply_filters('woocommerce_order_item_class', 'order_item', $renewable_energy_item, $renewable_energy_order ) ); ?>">
						<td class="product-name">
							<?php
								echo apply_filters('woocommerce_order_item_name', esc_html( $renewable_energy_item['name'] ), $renewable_energy_item, false );

								do_action('woocommerce_order_item_meta_start', $renewable_energy_item_id, $renewable_energy_item, $renewable_energy_order );
								$renewable_energy_order->display_item_meta( $renewable_energy_item );
								do_action('woocommerce_order_item_meta_end', $renewable_energy_item_id, $renewable_energy_item, $renewable_energy_order );
							?>
						</td>
						<td class="product-quantity"><?php echo apply_filters('woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf('&times; %s', esc_html( $renewable_energy_item['qty'] ) ) . '</strong>', $renewable_energy_item ); ?></td>
						<td class="product-subtotal"><?php echo $renewable_energy_order->get_formatted_line_subtotal( $renewable_energy_item ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
		<tfoot>
			<?php if ( $renewable_energy_totals = $renewable_energy_order->get_order_item_totals() ) : ?>
				<?php foreach ( $renewable_energy_totals as $renewable_energy_total ) : ?>
					<tr>
						<th scope="row" colspan="2"><?php echo $renewable_energy_total['label']; ?></th>
						<td class="product-total"><?php echo $renewable_energy_total['value']; ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tfoot>
	</table>

	<div id="payment">
		<?php if ( $renewable_energy_order->needs_payment() ) : ?>
			<ul class="wc_payment_methods payment_methods methods">
				<?php
					if ( ! empty( $available_gateways ) ) {
						foreach ( $available_gateways as $renewable_energy_gateway ) {
							wc_get_template('checkout/payment-method.php', array('gateway' => $renewable_energy_gateway ) );
						}
					} else {
						echo '<li>' . apply_filters('woocommerce_no_available_payment_methods_message', __('Sorry, it seems that there are no available payment methods for your location. Please contact us if you require assistance or wish to make alternate arrangements.', 'renewable-energy') ) . '</li>';
					}
				?>
			</ul>
		<?php endif; ?>
		<div class="form-row">
			<input type="hidden" name="woocommerce_pay" value="1" />

			<?php wc_get_template('checkout/terms.php'); ?>

			<?php do_action('woocommerce_pay_order_before_submit'); ?>

			<?php echo apply_filters('woocommerce_pay_order_button_html', '<input type="submit" class="btn btn-primary" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />'); ?>

			<?php do_action('woocommerce_pay_order_after_submit'); ?>

			<?php wp_nonce_field('woocommerce-pay'); ?>
		</div>
	</div>
</form>
