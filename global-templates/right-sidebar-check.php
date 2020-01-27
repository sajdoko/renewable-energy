<?php
/**
 * Right sidebar check.
 *
 * @package Renewable_Energy
 */
?>

<?php $renewable_energy_sidebar_pos = get_theme_mod('renewable_energy_sidebar_position', 'right'); ?>

<?php if ('right' === $renewable_energy_sidebar_pos || 'both' === $renewable_energy_sidebar_pos ) : ?>

  <?php get_sidebar('right'); ?>

<?php endif;