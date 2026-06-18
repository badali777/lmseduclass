<?php
/**
 * The header for the theme
 *
 * @package Elementic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'elementic' ); ?></a>
	<div id="aria-live-region" class="screen-reader-text" aria-live="polite" aria-atomic="true"></div>

	<header id="masthead" class="site-header">
		<div class="el-header-wrap">
			<div class="el-menu-box">
				<div class="el-menu-box__brand">
					<div class="site-branding">
						<?php
						// Display logo if available.
						if ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							// Display site title and tagline only if no logo.
							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$elementic_description = get_bloginfo( 'description', 'display' );
							if ( $elementic_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $elementic_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php
							endif;
						}
						?>
					</div>
				</div>
				<nav id="site-navigation" class="main-navigation el-menu-box__nav">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'elementic' ); ?></span>
						<span class="menu-icon">&#9776;</span>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container'      => false,
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>
				<div class="el-menu-box__search">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->