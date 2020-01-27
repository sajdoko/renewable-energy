<?php
/**
 * Left sidebar check.
 *
 * @package Renewable_Energy
 */

?>

<?php
$renewable_energy_sidebar_pos = get_theme_mod('renewable_energy_sidebar_position', 'right');
?>

<?php if ('left' === $renewable_energy_sidebar_pos || 'both' === $renewable_energy_sidebar_pos ) : ?>
	<?php get_sidebar('left'); ?>
<?php endif; ?>

<?php 
	$renewable_energy_html = '';
	if ('right' === $renewable_energy_sidebar_pos || 'left' === $renewable_energy_sidebar_pos ) {
		$renewable_energy_html = '<div class="';
		if ( is_active_sidebar('right-sidebar') || is_active_sidebar('left-sidebar') ) {
			$renewable_energy_html .= 'col-md-8 content-area" id="primary">';
		} else {
			$renewable_energy_html .= 'col-md-12 content-area" id="primary">';
		}
		echo $renewable_energy_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output
	} elseif ( is_active_sidebar('right-sidebar') && is_active_sidebar('left-sidebar') ) {
		$renewable_energy_html = '<div class="';
		if ('both' === $renewable_energy_sidebar_pos ) {
			$renewable_energy_html .= 'col-md-6 content-area" id="primary">';
		} else {
			$renewable_energy_html .= 'col-md-12 content-area" id="primary">';
		}
		echo $renewable_energy_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output
	} else {
	    echo '<div class="col-md-12 content-area" id="primary">';
	}

