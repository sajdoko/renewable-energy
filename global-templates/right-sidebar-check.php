<?php
/**
 * Right sidebar check.
 *
 * @package Renewable_Energy
 */
?>

<?php $sidebar_pos = get_theme_mod('renewable_energy_sidebar_position'); ?>

<?php if ('right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

  <?php get_sidebar('right'); ?>

<?php endif; ?>
