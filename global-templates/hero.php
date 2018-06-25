<?php
/**
 * Hero setup.
 *
 * @package Renewable_Energy
 */

$show_slider   = get_theme_mod('renewable_energy_show_slider');
$show_hero_widget  = get_theme_mod('renewable_energy_show_hero_widget');
?>

<?php if ( is_active_sidebar('hero') || is_active_sidebar('statichero') ) : ?>

	<div class="wrapper" id="wrapper-hero">
	
		<?php if ($show_slider == 'yes') : ?>
			<?php get_sidebar('hero'); ?>
		<?php endif; ?>

		<?php if ($show_hero_widget == 'yes') : ?>
			<?php get_sidebar('statichero'); ?>
		<?php endif; ?>

	</div>

<?php endif; ?>
