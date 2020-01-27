<?php
/**
 * Static hero sidebar setup.
 *
 * @package Renewable_Energy
 */

$renewable_energy_container   = get_theme_mod('renewable_energy_container_type', 'container');

?>

<?php if ( is_active_sidebar('statichero') ) : ?>

	<!-- ******************* The Hero Widget Area ******************* -->

	<div class="wrapper" id="wrapper-static-hero">

			<div class="<?php echo esc_attr( $renewable_energy_container ); ?>" id="wrapper-static-content" tabindex="-1">

				<div class="row">

					<?php dynamic_sidebar('statichero'); ?>

				</div>

			</div>

	</div><!-- #wrapper-static-hero -->

<?php endif; ?>
