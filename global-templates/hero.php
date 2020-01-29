<?php
/**
 * Hero setup.
 *
 * @package Renewable_Energy
 */

$renewable_energy_show_slider   = get_theme_mod('renewable_energy_show_slider', 'yes');
$renewable_energy_show_hero_widget  = get_theme_mod('renewable_energy_show_hero_widget', 'yes');
?>

<?php if (is_active_sidebar('statichero') || $renewable_energy_show_slider == 'yes' ) : ?>

	<div class="wrapper" id="wrapper-hero">

		<?php if ($renewable_energy_show_slider == 'yes') : ?>
				<?php echo renewable_energy_slider_template(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- excaped inside the function ?>
		<?php endif; ?>

		<?php if ($renewable_energy_show_hero_widget == 'yes') : ?>
		<?php get_sidebar('statichero'); ?>
		<?php endif; ?>

	</div>

<?php endif; ?>