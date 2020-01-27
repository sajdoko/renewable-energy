<?php
/**
 * My Addresses
 * 
 * Updated for Renewable Energy to maintain Woocommerce 3.0.3 compatability.
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
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
 * @version 	3.5.0
 */

if ( ! defined('ABSPATH') ) {
	exit; // Exit if accessed directly
}

$renewable_energy_customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$renewable_energy_get_addresses = apply_filters('woocommerce_my_account_get_addresses', array(
		'billing' => __('Billing address', 'renewable-energy'),
		'shipping' => __('Shipping address', 'renewable-energy'),
	), $renewable_energy_customer_id );
} else {
	$renewable_energy_get_addresses = apply_filters('woocommerce_my_account_get_addresses', array(
		'billing' => __('Billing address', 'renewable-energy'),
	), $renewable_energy_customer_id );
}

$renewable_energy_oldcol = 1;
$renewable_energy_col    = 1;
?>

<p>
	<?php echo apply_filters('woocommerce_my_account_my_address_description', __('The following addresses will be used on the checkout page by default.', 'renewable-energy') ); ?>
</p>

<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) echo '<div class="u-columns woocommerce-Addresses col2-set addresses">'; ?>

<?php foreach ( $renewable_energy_get_addresses as $renewable_energy_name => $renewable_energy_title ) : ?>

	<div class="u-column woocommerce-Address">
		<header class="woocommerce-Address-title title">
			<h3><?php echo $renewable_energy_title; ?></h3>
			<a href="<?php echo esc_url( wc_get_endpoint_url('edit-address', $renewable_energy_name ) ); ?>" class="edit"><?php _e('Edit', 'renewable-energy'); ?></a>
		</header>
		<address>
			<?php
				$renewable_energy_address = apply_filters('woocommerce_my_account_my_address_formatted_address', array(
					'first_name'  => get_user_meta( $renewable_energy_customer_id, $renewable_energy_name . '_first_name', true ),
					'last_name'   => get_user_meta( $renewable_energy_customer_id, $renewable_energy_name . '_last_name', true ),
					'company'     => get_user_meta( $renewable_energy_customer_id, $renewable_energy_name . '_company', true ),
					'address_1'   => get_user_meta( $renewable_energy_customer_id, $renewable_energy_name . '_address_1', true ),
					'address_2'   => get_user_meta( $renewable_energy_customer_id, $renewable_energy_name . '_address_2', true ),
					'city'        => get_user_meta( $renewable_energy_customer_id, $renewable_energy_name . '_city', true ),
					'state'       => get_user_meta( $renewable_energy_customer_id, $renewable_energy_name . '_state', true ),
					'postcode'    => get_user_meta( $renewable_energy_customer_id, $renewable_energy_name . '_postcode', true ),
					'country'     => get_user_meta( $renewable_energy_customer_id, $renewable_energy_name . '_country', true ),
				), $renewable_energy_customer_id, $renewable_energy_name );

				$renewable_energy_formatted_address = WC()->countries->get_formatted_address( $renewable_energy_address );

				if ( ! $renewable_energy_formatted_address )
					_e('You have not set up this type of address yet.', 'renewable-energy');
				else
					echo $renewable_energy_formatted_address;
			?>
		</address>
	</div>

<?php endforeach; ?>

<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) echo '</div>'; ?>
