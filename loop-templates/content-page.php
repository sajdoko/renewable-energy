<?php
/**
 * Partial template for content in page.php
 *
 * @package Renewable_Energy
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<hr class="divider">
	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large'); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __('Pages:', 'renewable_energy'),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __('Edit', 'renewable_energy'), '<span class="edit-link">', '</span>'); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
