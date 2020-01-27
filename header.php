<?php
/**
 * The header for RenewableEnergy.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Renewable_Energy
 */

$renewable_energy_container = get_theme_mod('renewable_energy_container_type', 'container');
$show_preloader = get_theme_mod('renewable_energy_show_preloader', 'yes');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php renewable_energy_wp_body_open(); ?>
<?php if ($show_preloader == 'yes') : ?>
	<div class="loader-body" id="loader">
		<div class="loader"></div>
	</div>
<?php endif; ?>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e('Skip to content', 'renewable-energy'); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-dark">

		<?php if ('container' == $renewable_energy_container ) : ?>
			<div class="container" >
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" itemprop="url"><?php bloginfo('name'); ?></a></h1>

						<?php else : ?>
							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" itemprop="url"><?php bloginfo('name'); ?></a>
						<?php endif; ?>

					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new Renewable_Energy_WP_Bootstrap_Navwalker(),
					)
				); ?>
		<?php if ('container' == $renewable_energy_container ) : ?>
			</div><!-- .container -->
		<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->

	<nav class="<?php echo esc_attr( $renewable_energy_container ); ?>" aria-label="breadcrumb">
		<?php if (function_exists('renewable_energy_breadcrumbs')) renewable_energy_breadcrumbs(); ?>
	</nav>