<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package Renewable_Energy
 */

get_header();
$renewable_energy_container   = get_theme_mod('renewable_energy_container_type', 'container');
?>


<div class="wrapper" id="author-wrapper">

	<div class="<?php echo esc_attr( $renewable_energy_container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part('global-templates/left-sidebar-check'); ?>

			<main class="site-main" id="main">

				<header class="page-header author-header">

					<?php
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by('slug',
						$author_name ) : get_userdata( intval( $author ) );
					?>

					<h1><?php esc_html_e('About:', 'renewable-energy'); ?><?php echo esc_html( $curauth->nickname ); ?></h1>

					<?php if ( ! empty( $curauth->ID ) ) : ?>
						<?php echo get_avatar( $curauth->ID ); ?>
					<?php endif; ?>

					<dl>
						<?php if ( ! empty( $curauth->user_url ) ) : ?>
							<dt><?php esc_html_e('Website', 'renewable-energy'); ?></dt>
							<dd>
								<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
							</dd>
						<?php endif; ?>

						<?php if ( ! empty( $curauth->user_description ) ) : ?>
							<dt><?php esc_html_e('Profile', 'renewable-energy'); ?></dt>
							<dd><?php echo esc_html( $curauth->user_description ); ?></dd>
						<?php endif; ?>
					</dl>

					<h2><?php esc_html_e('Posts by', 'renewable-energy'); ?> <?php echo esc_html( $curauth->nickname ); ?>
						:</h2>

				</header><!-- .page-header -->

				<ul>

					<!-- The Loop -->
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<li>
								<a rel="bookmark" href="<?php the_permalink() ?>"
								   title="<?php esc_attr_e('Permanent Link:', 'renewable-energy'); ?> <?php the_title_attribute(); ?>">
									<?php the_title(); ?></a>,
								<?php renewable_energy_posted_on(); ?> <?php esc_html_e('in',
								'renewable-energy'); ?> <?php the_category('&'); ?>
							</li>
						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part('loop-templates/content', 'none'); ?>

					<?php endif; ?>

					<!-- End Loop -->

				</ul>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php renewable_energy_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part('global-templates/right-sidebar-check'); ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
