<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package Renewable_Energy
 */

?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url('/') ); ?>" role="search">
	<label class="assistive-text" for="s"><?php esc_attr_e('Search', 'renewable-energy'); ?></label>
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e('Search &hellip;', 'renewable-energy'); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
			<input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit"
			value="<?php esc_attr_e('Search', 'renewable-energy'); ?>">
	</span>
	</div>
</form>
