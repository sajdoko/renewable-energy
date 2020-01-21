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
$renewable_energy_enable_cta   = get_theme_mod('renewable_energy_enable_cta') ? get_theme_mod('renewable_energy_enable_cta') : 'yes';
$renewable_energy_cta_title   = get_theme_mod('renewable_energy_cta_title') ? get_theme_mod('renewable_energy_cta_title') : 'Big Heading To Catch Attention';
$renewable_energy_cta_description   = get_theme_mod('renewable_energy_cta_description') ? get_theme_mod('renewable_energy_cta_description') : 'Small block of text to support above given fat heading text, with some catchy lines and keywords.';
$renewable_energy_cta_button_text   = get_theme_mod('renewable_energy_cta_button_text') ? get_theme_mod('renewable_energy_cta_button_text') : 'Click Me Please!';
$renewable_energy_cta_button_link   = get_theme_mod('renewable_energy_cta_button_link') ? get_theme_mod('renewable_energy_cta_button_link') : '/';

$enable_projects_section   = get_theme_mod('renewable_energy_show_projects_section') ? get_theme_mod('renewable_energy_show_projects_section') : 'yes';
$renewable_energy_projects_heading_title   = get_theme_mod('renewable_energy_projects_heading_title') ? get_theme_mod('renewable_energy_projects_heading_title') : 'Fancy display heading';
$renewable_energy_projects_heading_description   = get_theme_mod('renewable_energy_projects_heading_description') ? get_theme_mod('renewable_energy_projects_heading_description') : 'With faded secondary text';
$renewable_energy_number_of_projects   = get_theme_mod('renewable_energy_number_of_projects') ? get_theme_mod('renewable_energy_number_of_projects') : '4';
?>

<?php if ( is_front_page() ) : ?>
	<?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>

<?php if ($renewable_energy_enable_cta == 'yes') : ?>
	<div id="cta-wrapper">
			<section class="re-cta-flat">
					<div class="re-cta-box text-center">
							<h1 class="display-3 text-white"><?php echo esc_attr($renewable_energy_cta_title); ?></h1>
							<p class="mt-3"><?php echo esc_attr($renewable_energy_cta_description); ?></p>
							<a href="<?php echo esc_url($renewable_energy_cta_button_link); ?>" class="btn btn-success btn-lg py-2 px-5 mt-4"><?php echo esc_attr($renewable_energy_cta_button_text); ?></a>
					</div>
			</section>
	</div><!-- cta-wrapper end -->
<?php endif; ?>

<?php if ($enable_projects_section == 'yes') : ?>
	<div class="wrapper" id="projects-wrapper">
		<div class="<?php echo esc_attr( $container ); ?>" id="projects" tabindex="-1">
			<div class="row pb-4 pt-4">
				<div class="col-md-12">
						<h1>
							<?php echo $renewable_energy_projects_heading_title; ?>
							<small class="text-muted"><?php echo $renewable_energy_projects_heading_description; ?></small>
						</h1>
				</div>
			</div>
			<div class="row mb-2">
				<?php
					$loop = new WP_Query( array(
							'post_type' => 'projects',
							'post_status' => 'publish',
							'posts_per_page' => $renewable_energy_number_of_projects
						)
					);
				?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="col-md-6">
						<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
							<div class="col p-4 d-flex flex-column position-static">
								<?php the_title('<h3 class="mb-2">', '</h3>'); ?>
								<p class="card-text mb-auto">
									<?php echo wp_trim_words(get_the_excerpt(), 15); ?>
								</p>
								<a class="stretched-link" href="<?php echo esc_url( get_permalink( get_the_ID() )); ?>" alt="<?php the_title_attribute(); ?>"><?php echo __('Continue reading', 'renewable-energy'); ?></a>
							</div>
							<div class="col-auto d-none d-lg-block">
									<a href="<?php echo esc_url( get_permalink( get_the_ID() )); ?>" alt="<?php the_title_attribute(); ?>">
										<?php echo get_the_post_thumbnail( $post->ID, 'renewable-energy-project-thumb-2', array( 'class' => 'card-img-top' ) ); ?>
									</a>
							</div>
						</div>
					</div>

				<?php endwhile; wp_reset_query(); ?>
			</div>


		</div><!-- Container end -->
	</div><!-- projects-wrapper end -->
<?php endif; ?>

<?php get_footer(); ?>
