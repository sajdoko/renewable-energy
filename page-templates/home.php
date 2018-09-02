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
$enable_first_featurette   = get_theme_mod('renewable_energy_enable_first_featurette') ? get_theme_mod('renewable_energy_enable_first_featurette') : 'yes';
$first_featurette_title   = get_theme_mod('renewable_energy_first_featurette_title') ? get_theme_mod('renewable_energy_first_featurette_title') : 'First Featurette Heading';
$first_featurette_description   = get_theme_mod('renewable_energy_first_featurette_description') ? get_theme_mod('renewable_energy_first_featurette_description') : 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.';
$first_featurette_button_text   = get_theme_mod('renewable_energy_first_featurette_button_text') ? get_theme_mod('renewable_energy_first_featurette_button_text') : 'First Button';
$first_featurette_button_link   = get_theme_mod('renewable_energy_first_featurette_button_link') ? get_theme_mod('renewable_energy_first_featurette_button_link') : '/';
$first_featurette_backgrownd_image   = get_theme_mod('renewable_energy_first_featurette_backgrownd_image') ? get_theme_mod('renewable_energy_first_featurette_backgrownd_image') : 'https://raw.githubusercontent.com/sajdoko/renewable-energy/master/inc/import-demo/demo-contents/img/first-featurette.jpg';
$enable_second_featurette   = get_theme_mod('renewable_energy_enable_second_featurette') ? get_theme_mod('renewable_energy_enable_second_featurette') : 'yes';
$second_featurette_title   = get_theme_mod('renewable_energy_second_featurette_title') ? get_theme_mod('renewable_energy_second_featurette_title') : 'Second Featurette Heading';
$second_featurette_description   = get_theme_mod('renewable_energy_second_featurette_description') ? get_theme_mod('renewable_energy_second_featurette_description') : 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.';
$second_featurette_button_text   = get_theme_mod('renewable_energy_second_featurette_button_text') ? get_theme_mod('renewable_energy_second_featurette_button_text') : 'Second Button';
$second_featurette_button_link   = get_theme_mod('renewable_energy_second_featurette_button_link') ? get_theme_mod('renewable_energy_second_featurette_button_link') : '/';
$second_featurette_backgrownd_image   = get_theme_mod('renewable_energy_second_featurette_backgrownd_image') ? get_theme_mod('renewable_energy_second_featurette_backgrownd_image') : 'https://raw.githubusercontent.com/sajdoko/renewable-energy/master/inc/import-demo/demo-contents/img/second-featurette.jpg';
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
					<h2 class="featurette-heading"><?php echo esc_attr($first_featurette_title); ?></h2>
                    <p class="lead"><?php echo esc_attr($first_featurette_description); ?></p>
                    <p><a class="btn btn-secondary" href="<?php echo esc_url($first_featurette_button_link); ?>" role="button"><?php echo esc_attr($first_featurette_button_text); ?></a></p>
				</div>
				<div class="col-md-5">
					<img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 500px; height: 500px;" src="<?php echo esc_url($first_featurette_backgrownd_image); ?>" data-holder-rendered="true">
				</div>
			</div>
        <?php endif; ?>
        <?php if ($enable_first_featurette == 'yes' && $enable_second_featurette == 'yes') : ?>
			<hr class="featurette-divider">
        <?php endif; ?>
        <?php if ($enable_second_featurette == 'yes') : ?>
			<div class="row featurette">
				<div class="col-md-7 order-md-2">
					<h2 class="featurette-heading"><?php echo esc_attr($second_featurette_title); ?></h2>
                    <p class="lead"><?php echo esc_attr($second_featurette_description); ?></p>
                    <p><a class="btn btn-secondary" href="<?php echo esc_url($second_featurette_button_link); ?>" role="button"><?php echo esc_attr($second_featurette_button_text); ?></a></p>
				</div>
				<div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 500px; height: 500px;" src="<?php echo esc_url($second_featurette_backgrownd_image); ?>" data-holder-rendered="true">
				</div>
			</div>
        <?php endif; ?>
			<!-- /END THE FEATURETTES -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
