<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rarelyneeded
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'rarelyneeded' ); ?>
	</a>

	<header class="site-header__container">
		<div class="site-header">
			<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<svg viewBox="0 0 112 112" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="56" cy="56" r="56" fill="#EF456E"/>
					<circle cx="35.5888" cy="32.4486" r="13.6075" fill="white"/>
				</svg>
			</a>

			<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav>
		</div>
	</header>
