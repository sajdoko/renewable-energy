<?php
/**
 * Edit address form
 * Updated for Renewable Energy to maintain Woocommerce 3.0.9 compatability.
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
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
	exit;
}

$renewable_energy_page_title = ('billing' === $load_address ) ? __('Billing address', 'renewable-energy') : __('Shipping address', 'renewable-energy');

do_action('woocommerce_before_edit_account_address_form'); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template('myaccount/my-address.php'); ?>
<?php else : ?>

	<form method="post">

		<h3><?php echo apply_filters('woocommerce_my_account_edit_address_title', $renewable_energy_page_title, $load_address ); ?></h3>

		<div class="woocommerce-address-fields">
			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

			<div class="woocommerce-address-fields__field-wrapper">
				<?php
					foreach ( $address as $renewable_energy_key => $renewable_energy_field ) {
						if ( isset( $renewable_energy_field['country_field'], $address[ $renewable_energy_field['country_field'] ] ) ) {
							$renewable_energy_field['country'] = wc_get_post_data_by_key( $renewable_energy_field['country_field'], $address[ $renewable_energy_field['country_field'] ]['value'] );
						}
						woocommerce_form_field( $renewable_energy_key, $renewable_energy_field, wc_get_post_data_by_key( $renewable_energy_key, $renewable_energy_field['value'] ) );
					}
				?>
			</div>

			<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

			<p>
				<input type="submit" class="btn btn-outline-primary" name="save_address" value="<?php esc_attr_e('Save address', 'renewable-energy'); ?>" />
				<?php wp_nonce_field('woocommerce-edit_address'); ?>
				<input type="hidden" name="action" value="edit_address" />
			</p>
		</div>

	</form>

<?php endif; ?>

<?php do_action('woocommerce_after_edit_account_address_form'); ?>
