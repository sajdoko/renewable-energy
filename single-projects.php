<?php
/**
 * The template for displaying all single posts.
 *
 * @package Renewable_Energy
 */

get_header();
$container   = get_theme_mod('renewable_energy_container_type');
?>

<div class="wrapper" id="single-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<!-- Do the left sidebar check -->
			<?php get_template_part('global-templates/left-sidebar-check'); ?>
			<main class="site-main" id="main">
				<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<header class="entry-header">
						<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
						<div class="entry-meta">
							<?php renewable_energy_posted_on(); ?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
					<?php echo get_the_post_thumbnail( $post->ID, 'large'); ?>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __('Pages:', 'renewable-energy'),
							'after'  => '</div>',
						) );
						?>
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php renewable_energy_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->
				<?php renewable_energy_post_nav(); ?>
				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<!-- Do the right sidebar check -->
		<?php get_template_part('global-templates/right-sidebar-check'); ?>
	</div><!-- .row -->
</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>