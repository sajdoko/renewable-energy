<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 	3.7.0
 */

if ( ! defined('ABSPATH') ) {
	exit;
}

do_action('woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>

	<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
				<?php foreach ( wc_get_account_orders_columns() as $renewable_energy_column_id => $renewable_energy_column_name ) : ?>
					<th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr( $renewable_energy_column_id ); ?>"><span class="nobr"><?php echo esc_html( $renewable_energy_column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php foreach ( $customer_orders->orders as $renewable_energy_customer_order ) :
				$renewable_energy_order      = wc_get_order( $renewable_energy_customer_order );
				$renewable_energy_item_count = $renewable_energy_order->get_item_count();
				?>
				<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $renewable_energy_order->get_status() ); ?> order">
					<?php foreach ( wc_get_account_orders_columns() as $renewable_energy_column_id => $renewable_energy_column_name ) : ?>
						<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $renewable_energy_column_id ); ?>" data-title="<?php echo esc_attr( $renewable_energy_column_name ); ?>">
							<?php if ( has_action('woocommerce_my_account_my_orders_column_' . $renewable_energy_column_id ) ) : ?>
								<?php do_action('woocommerce_my_account_my_orders_column_' . $renewable_energy_column_id, $renewable_energy_order ); ?>

							<?php elseif ('order-number' === $renewable_energy_column_id ) : ?>
								<a href="<?php echo esc_url( $renewable_energy_order->get_view_order_url() ); ?>">
									<?php echo _x('#', 'hash before order number', 'renewable-energy') . $renewable_energy_order->get_order_number(); ?>
								</a>

							<?php elseif ('order-date' === $renewable_energy_column_id ) : ?>
								<time datetime="<?php echo esc_attr( $renewable_energy_order->get_date_created()->date('c') ); ?>"><?php echo esc_html( wc_format_datetime( $renewable_energy_order->get_date_created() ) ); ?></time>

							<?php elseif ('order-status' === $renewable_energy_column_id ) : ?>
								<?php echo esc_html( wc_get_order_status_name( $renewable_energy_order->get_status() ) ); ?>

							<?php elseif ('order-total' === $renewable_energy_column_id ) : ?>
								<?php
								/* translators: 1: formatted order total 2: total order items */
								printf( _n('%1$s for %2$s item', '%1$s for %2$s items', $renewable_energy_item_count, 'renewable-energy'), $renewable_energy_order->get_formatted_order_total(), $renewable_energy_item_count );
								?>

							<?php elseif ('order-actions' === $renewable_energy_column_id ) : ?>
								<?php
								$renewable_energy_actions = wc_get_account_orders_actions( $renewable_energy_order );
								
								if ( ! empty( $renewable_energy_actions ) ) {
									foreach ( $renewable_energy_actions as $renewable_energy_key => $renewable_energy_action ) {
										echo '<a href="' . esc_url( $renewable_energy_action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $renewable_energy_key ) . '">' . esc_html( $renewable_energy_action['name'] ) . '</a>';
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

	<?php do_action('woocommerce_before_account_orders_pagination'); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url('orders', $current_page - 1 ) ); ?>"><?php _e('Previous', 'renewable-energy'); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next btn btn-outline-primary" href="<?php echo esc_url( wc_get_endpoint_url('orders', $current_page + 1 ) ); ?>"><?php _e('Next', 'renewable-energy'); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="btn btn-outline-primary" href="<?php echo esc_url( apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop') ) ); ?>">
			<?php _e('Go shop', 'renewable-energy') ?>
		</a>
		<?php _e('No order has been made yet.', 'renewable-energy'); ?>
	</div>
<?php endif; ?>

<?php do_action('woocommerce_after_account_orders', $has_orders ); ?>
