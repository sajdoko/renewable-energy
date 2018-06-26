<?php
/**
 * Sidebar setup for footer full.
 *
 * @package Renewable_Energy
 */

$container   = get_theme_mod('renewable_energy_container_type');
$show_footer_widget   = get_theme_mod('renewable_energy_show_footer_widget');

?>

<?php if ( is_active_sidebar('footerfull') && $show_footer_widget == 'yes' ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper" id="wrapper-footer-full">

		<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

			<div class="row">

				<?php dynamic_sidebar('footerfull'); ?>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

<?php endif; ?>
