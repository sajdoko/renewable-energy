<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package Renewable_Energy
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>'); ?>

		<?php if ('post' == get_post_type() ) : ?>

			<div class="entry-meta">
				<?php renewable_energy_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'renewable-energy-blog-thumb-1'); ?>

	<div class="entry-content">

		<?php
		the_excerpt();
		?>

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
	<hr class="divider">
</article><!-- #post-## -->
