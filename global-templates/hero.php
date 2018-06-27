<?php
/**
 * Hero setup.
 *
 * @package Renewable_Energy
 */

$show_slider   = get_theme_mod('renewable_energy_show_slider');
$show_hero_widget  = get_theme_mod('renewable_energy_show_hero_widget');
$enable_first_slider  = get_theme_mod('renewable_energy_enable_first_slider');
$first_slider_title  = get_theme_mod('renewable_energy_first_slider_title');
$first_slider_description  = get_theme_mod('renewable_energy_first_slider_description');
$first_slider_button_link  = get_theme_mod('renewable_energy_first_slider_button_link');
$first_slider_button_text  = get_theme_mod('renewable_energy_first_slider_button_text');
$first_slider_backgrownd_image  = get_theme_mod('renewable_energy_first_slider_backgrownd_image');
$enable_second_slider  = get_theme_mod('renewable_energy_enable_second_slider');
$second_slider_title  = get_theme_mod('renewable_energy_second_slider_title');
$second_slider_description  = get_theme_mod('renewable_energy_second_slider_description');
$second_slider_button_link  = get_theme_mod('renewable_energy_second_slider_button_link');
$second_slider_button_text  = get_theme_mod('renewable_energy_second_slider_button_text');
$second_slider_backgrownd_image  = get_theme_mod('renewable_energy_second_slider_backgrownd_image');
?>

<?php if ( is_active_sidebar('hero') || is_active_sidebar('statichero') ) : ?>

	<div class="wrapper" id="wrapper-hero">

		<?php if ($show_slider == 'yes') : ?>
		<!-- ******************* The Hero Slider Area ******************* -->
		<div id="heroCarouselControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<?php if ($enable_first_slider == 'yes') : ?>
					<div class="carousel-item">
						<div class="jumbotron py-5 jumbotron-fluid bg-primary text-white" style="border-top: 1px solid rgba(255,255,255,.1); background-image: url(<?php echo $first_slider_backgrownd_image; ?>);background-size: cover;">
							<div class="container py-5">
								<div class="row">
									<div class="col-md-7">
										<h1 class="display-3"><?php echo $first_slider_title; ?></h1>
										<p class="lead"><?php echo $first_slider_description; ?></p>
										<a class="btn btn-success btn-lg py-3" href="<?php echo $first_slider_button_link; ?>" style="padding-left:80px; padding-right:80px;" target="_blank"><?php echo $first_slider_button_text; ?></a>
										<br>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($enable_second_slider == 'yes') : ?>
					<div class="carousel-item">
						<div class="jumbotron py-5 jumbotron-fluid bg-primary text-white" style="border-top: 1px solid rgba(255,255,255,.1); background-image: url(<?php echo $second_slider_backgrownd_image; ?>); background-size: cover;">
							<div class="container py-5">
								<div class="row">
									<div class="col-md-7">
									<h1 class="display-3"><?php echo $second_slider_title; ?></h1>
										<p class="lead"><?php echo $second_slider_description; ?></p>
										<a class="btn btn-success btn-lg py-3" href="<?php echo $second_slider_button_link; ?>" style="padding-left:80px; padding-right:80px;" target="_blank"><?php echo $second_slider_button_text; ?></a>
										<br>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<?php if ($enable_first_slider == 'yes' && $enable_second_slider == 'yes') : ?>
				<a class="carousel-control-prev" href="#heroCarouselControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">
						<?php esc_html_e('Previous', 'renewable_energy'); ?>
					</span>
				</a>
				<a class="carousel-control-next" href="#heroCarouselControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">
						<?php esc_html_e('Next', 'renewable_energy'); ?>
					</span>
				</a>
				<ol class="carousel-indicators">
					<li data-target="#heroCarouselControls" data-slide-to="0" class=""></li>
					<li data-target="#heroCarouselControls" data-slide-to="1" class=""></li>
				</ol>
			<?php endif; ?>
		</div>
		<!-- .carousel -->
		<?php endif; ?>

		<?php if ($show_hero_widget == 'yes') : ?>
		<?php get_sidebar('statichero'); ?>
		<?php endif; ?>

	</div>

<?php endif; ?>