<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Renewable_Energy
 */

get_header();
?>

<?php
$renewable_energy_container   = get_theme_mod('renewable_energy_container_type', 'container');
?>

<div class="wrapper" id="archive-wrapper">
 <div class="<?php echo esc_attr($renewable_energy_container); ?>" id="content" tabindex="-1">
  <div class="row">
   <main class="site-main" id="main">
				<?php if ( have_posts() ) : ?>
					<div class="container py-5">
						<div class="row">
							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="col-md-4">
									<div class="card mb-4 shadow-sm">
										<a href="<?php echo esc_url( get_permalink( get_the_ID() )); ?>" alt="<?php the_title_attribute(); ?>">
											<?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'card-img-top' ) ); ?>
										</a>
										<div class="card-body">
											<?php the_title('<h5 class="card-title">', '</h5>'); ?>
											<p class="card-text"><?php the_excerpt(); ?></p>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>

				<?php else : ?>

					<?php get_template_part('loop-templates/content', 'none'); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php renewable_energy_pagination(); ?>

		</div><!-- #primary -->

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
