<?php
/**
 * The template for displaying all woocommerce pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Renewable_Energy
 */

get_header();

$renewable_energy_container   = get_theme_mod('renewable_energy_container_type', 'container');


?>

<div class="wrapper" id="woocommerce-wrapper">

	<div class="<?php echo esc_attr( $renewable_energy_container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part('global-templates/left-sidebar-check'); ?>

			<main class="site-main" id="main">

			<?php
				$renewable_energy_template_name = '\archive-product.php';
				$renewable_energy_args = array();
				$renewable_energy_template_path = '';
				$renewable_energy_default_path = untrailingslashit( plugin_dir_path(__FILE__) ) . '\woocommerce';

					if ( is_singular('product') ) {

						woocommerce_content();

			//For ANY product archive, Product taxonomy, product search or /shop landing page etc Fetch the template override;
				} 	elseif ( file_exists( $renewable_energy_default_path . $renewable_energy_template_name ) )
					{
					wc_get_template( $renewable_energy_template_name, $renewable_energy_args, $renewable_energy_template_path, $renewable_energy_default_path );

			//If no archive-product.php template exists, default to catchall;
				}	else  {
					woocommerce_content( );
				}

			;?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part('global-templates/right-sidebar-check'); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
