<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Renewable_Energy
 */

$renewable_energy_the_theme = wp_get_theme();
$renewable_energy_container = get_theme_mod('renewable_energy_container_type', 'container');
$renewable_energy_show_footer_copyright = get_theme_mod('renewable_energy_show_footer_copyright', 'yes');
$renewable_energy_footer_copyright_content = get_theme_mod('renewable_energy_footer_copyright_content') ? get_theme_mod('renewable_energy_footer_copyright_content'): '<a href="'. esc_url( home_url('/') ) .'" title="'. esc_attr( get_bloginfo('name', 'display') ) .'">'. get_bloginfo('name') .'</a>';
?>

<?php get_sidebar('footerfull'); ?>

<?php if ($renewable_energy_show_footer_copyright == 'yes') : ?>
	<div class="wrapper" id="wrapper-footer">

		<div class="<?php echo esc_attr( $renewable_energy_container ); ?>">

			<div class="row">

				<div class="col-md-12">

					<footer class="site-footer" id="colophon">

						<div class="site-info">
							<span class="footer-copyright">Copyright &copy;<?php echo esc_html( date_i18n( 'Y' ) );?>
								<?php echo ' ' . wp_kses($renewable_energy_footer_copyright_content, array(
									'a' => array(
										'href' => array(),
										'title' => array(),
										'target' => array(),
										'alt' => array(),
									),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
								));?>
							</span>
						</div><!-- .site-info -->

					</footer><!-- #colophon -->

				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- wrapper end -->
<?php endif; ?>

</div><!-- #page we need this extra closing tag here -->

<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" data-toggle="tooltip" data-placement="left">
	<i class="fa fa-chevron-up" aria-hidden="true"></i>
</a>

<?php wp_footer(); ?>

</body>

</html>