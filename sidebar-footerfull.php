<?php
/**
 * Sidebar setup for footer full.
 *
 * @package Renewable_Energy
 */

$renewable_energy_container   = get_theme_mod('renewable_energy_container_type', 'container');
$renewable_energy_show_footer_widget   = get_theme_mod('renewable_energy_show_footer_widget', 'yes');

?>

<?php if ( is_active_sidebar('footerfull') && $renewable_energy_show_footer_widget == 'yes' ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper" id="wrapper-footer-full">

		<div class="<?php echo esc_attr( $renewable_energy_container ); ?>" id="footer-full-content" tabindex="-1">

			<div class="row">

				<?php dynamic_sidebar('footerfull'); ?>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

<?php endif; ?>
