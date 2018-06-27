<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Renewable_Energy
 */

$the_theme = wp_get_theme();
$container = get_theme_mod('renewable_energy_container_type');
$show_footer_copyright = get_theme_mod('renewable_energy_show_footer_copyright');
$footer_copyright_content = get_theme_mod('renewable_energy_footer_copyright_content');
?>

<?php get_sidebar('footerfull'); ?>

<?php if ($show_footer_copyright == 'yes') : ?>
	<div class="wrapper" id="wrapper-footer">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row">

				<div class="col-md-12">

					<footer class="site-footer" id="colophon">

						<div class="site-info">
							<span class="footer-copyright">Copyright &copy; <?php echo date("Y");?><?php echo ' ' . $footer_copyright_content; ?></span>
						</div><!-- .site-info -->

					</footer><!-- #colophon -->

				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- wrapper end -->
<?php endif; ?>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>