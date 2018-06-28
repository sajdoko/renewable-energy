<?php
/**
 * Template Name: Home Page
 *
 * Home Page template
 * 
 * @package Renewable_Energy
 */

get_header();

$container   = get_theme_mod('renewable_energy_container_type');
$enable_first_featurette   = get_theme_mod('renewable_energy_enable_first_featurette');
$first_featurette_title   = get_theme_mod('renewable_energy_first_featurette_title');
$first_featurette_description   = get_theme_mod('renewable_energy_first_featurette_description');
$first_featurette_button_text   = get_theme_mod('renewable_energy_first_featurette_button_text');
$first_featurette_button_link   = get_theme_mod('renewable_energy_first_featurette_button_link');
$first_featurette_backgrownd_image   = get_theme_mod('renewable_energy_first_featurette_backgrownd_image');
$enable_second_featurette   = get_theme_mod('renewable_energy_enable_second_featurette');
$second_featurette_title   = get_theme_mod('renewable_energy_second_featurette_title');
$second_featurette_description   = get_theme_mod('renewable_energy_second_featurette_description');
$second_featurette_button_text   = get_theme_mod('renewable_energy_second_featurette_button_text');
$second_featurette_button_link   = get_theme_mod('renewable_energy_second_featurette_button_link');
$second_featurette_backgrownd_image   = get_theme_mod('renewable_energy_second_featurette_backgrownd_image');
?>

<?php if ( is_front_page() ) : ?>
	<?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>


<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> marketing" id="content" tabindex="-1">

			<!-- START THE FEATURETTES -->
        <?php if ($enable_first_featurette == 'yes') : ?>
			<div class="row featurette">
				<div class="col-md-7">
					<h2 class="featurette-heading"><?php echo $first_featurette_title; ?></h2>
                    <p class="lead"><?php echo $first_featurette_description; ?></p>
                    <p><a class="btn btn-secondary" href="<?php echo $first_featurette_button_link; ?>" role="button"><?php echo $first_featurette_button_text; ?> »</a></p>
				</div>
				<div class="col-md-5">
					<img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 500px; height: 500px;" src="<?php echo $first_featurette_backgrownd_image; ?>" data-holder-rendered="true">
				</div>
			</div>
        <?php endif; ?>
        <?php if ($enable_first_featurette == 'yes' && $enable_second_featurette == 'yes') : ?>
			<hr class="featurette-divider">
        <?php endif; ?>
        <?php if ($enable_second_featurette == 'yes') : ?>
			<div class="row featurette">
				<div class="col-md-7 order-md-2">
					<h2 class="featurette-heading"><?php echo $second_featurette_title; ?></h2>
                    <p class="lead"><?php echo $second_featurette_description; ?></p>
                    <p><a class="btn btn-secondary" href="<?php echo $second_featurette_button_link; ?>" role="button"><?php echo $second_featurette_button_text; ?> »</a></p>
				</div>
				<div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 500px; height: 500px;" src="<?php echo $second_featurette_backgrownd_image; ?>" data-holder-rendered="true">
				</div>
			</div>
        <?php endif; ?>
			<!-- /END THE FEATURETTES -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
