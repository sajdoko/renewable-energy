<?php
/**
 * My Orders
 *
 * @deprecated  2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
 */

if ( ! defined('ABSPATH') ) {
	exit;
}

$renewable_energy_my_orders_columns = apply_filters('woocommerce_my_account_my_orders_columns', array(
	'order-number'  => __('Order', 'renewable-energy'),
	'order-date'    => __('Date', 'renewable-energy'),
	'order-status'  => __('Status', 'renewable-energy'),
	'order-total'   => __('Total', 'renewable-energy'),
	'order-actions' => '&nbsp;',
) );

$renewable_energy_customer_orders = get_posts( apply_filters('woocommerce_my_account_my_orders_query', array(
	'numberposts' => $order_count,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types('view-orders'),
	'post_status' => array_keys( wc_get_order_statuses() )
) ) );

if ( $renewable_energy_customer_orders ) : ?>

	<h2><?php echo apply_filters('woocommerce_my_account_my_orders_title', __('Recent Orders', 'renewable-energy') ); ?></h2>

	<table class="shop_table shop_table_responsive my_account_orders table-hover table-striped">

		<thead>
			<tr>
				<?php foreach ( $renewable_energy_my_orders_columns as $renewable_energy_column_id => $renewable_energy_column_name ) : ?>
					<th class="<?php echo esc_attr( $renewable_energy_column_id ); ?>"><span class="nobr"><?php echo esc_html( $renewable_energy_column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php foreach ( $renewable_energy_customer_orders as $renewable_energy_customer_order ) :
				$renewable_energy_order      = wc_get_order( $renewable_energy_customer_order );
				$renewable_energy_item_count = $renewable_energy_order->get_item_count();
				?>
				<tr class="order">
					<?php foreach ( $renewable_energy_my_orders_columns as $renewable_energy_column_id => $renewable_energy_column_name ) : ?>
						<td class="<?php echo esc_attr( $renewable_energy_column_id ); ?>" data-title="<?php echo esc_attr( $renewable_energy_column_name ); ?>">
							<?php if ( has_action('woocommerce_my_account_my_orders_column_' . $renewable_energy_column_id ) ) : ?>
								<?php do_action('woocommerce_my_account_my_orders_column_' . $renewable_energy_column_id, $renewable_energy_order ); ?>

							<?php elseif ('order-number' === $renewable_energy_column_id ) : ?>
								<a href="<?php echo esc_url( $renewable_energy_order->get_view_order_url() ); ?>">
									<?php echo _x('#', 'hash before order number', 'renewable-energy') . $renewable_energy_order->get_order_number(); ?>
								</a>

							<?php elseif ('order-date' === $renewable_energy_column_id ) : ?>
								<time datetime="<?php echo date('Y-m-d', strtotime( $renewable_energy_order->order_date ) ); ?>" title="<?php echo esc_attr( strtotime( $renewable_energy_order->order_date ) ); ?>"><?php echo date_i18n( get_option('date_format'), strtotime( $renewable_energy_order->order_date ) ); ?></time>

							<?php elseif ('order-status' === $renewable_energy_column_id ) : ?>
								<?php echo wc_get_order_status_name( $renewable_energy_order->get_status() ); ?>

							<?php elseif ('order-total' === $renewable_energy_column_id ) : ?>
								<?php echo sprintf( _n('%1$s for %2$s item', '%1$s for %2$s items', $renewable_energy_item_count, 'renewable-energy'), $renewable_energy_order->get_formatted_order_total(), $renewable_energy_item_count ); ?>

							<?php elseif ('order-actions' === $renewable_energy_column_id ) : ?>
								<?php
									$renewable_energy_actions = array(
										'pay'    => array(
											'url'  => $renewable_energy_order->get_checkout_payment_url(),
											'name' => __('Pay', 'renewable-energy')
										),
										'view'   => array(
											'url'  => $renewable_energy_order->get_view_order_url(),
											'name' => __('View', 'renewable-energy')
										),
										'cancel' => array(
											'url'  => $renewable_energy_order->get_cancel_order_url( wc_get_page_permalink('myaccount') ),
											'name' => __('Cancel', 'renewable-energy')
										)
									);

									if ( ! $renewable_energy_order->needs_payment() ) {
										unset( $renewable_energy_actions['pay'] );
									}

									if ( ! in_array( $renewable_energy_order->get_status(), apply_filters('woocommerce_valid_order_statuses_for_cancel', array('pending', 'failed'), $renewable_energy_order ) ) ) {
										unset( $renewable_energy_actions['cancel'] );
									}

									if ( $renewable_energy_actions = apply_filters('woocommerce_my_account_my_orders_actions', $renewable_energy_actions, $renewable_energy_order ) ) {
										foreach ( $renewable_energy_actions as $renewable_energy_key => $renewable_energy_action ) {
											echo '<a href="' . esc_url( $renewable_energy_action['url'] ) . '" class="btn btn-outline-primary ' . sanitize_html_class( $renewable_energy_key ) . '">' . esc_html( $renewable_energy_action['name'] ) . '</a>';
										}
									}
								?>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
