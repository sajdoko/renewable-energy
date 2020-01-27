<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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
 * @version 	3.6.0
 */

if ( ! defined('ABSPATH') ) {
	exit; // Exit if accessed directly
}

?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby custom-select">
		<?php foreach ( $catalog_orderby_options as $renewable_energy_id => $renewable_energy_name ) : ?>
			<option value="<?php echo esc_attr( $renewable_energy_id ); ?>" <?php selected( $orderby, $renewable_energy_id ); ?>><?php echo esc_html( $renewable_energy_name ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $renewable_energy_key => $renewable_energy_val ) {
			if ('orderby' === $renewable_energy_key || 'submit' === $renewable_energy_key ) {
				continue;
			}
			if ( is_array( $renewable_energy_val ) ) {
				foreach( $renewable_energy_val as $renewable_energy_innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $renewable_energy_key ) . '[]" value="' . esc_attr( $renewable_energy_innerVal ) . '" />';
				}
			} else {
				echo '<input type="hidden" name="' . esc_attr( $renewable_energy_key ) . '" value="' . esc_attr( $renewable_energy_val ) . '" />';
			}
		}
	?>
</form>
