<?php
/**
 * Rarelyneeded functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Rarelyneeded
 */

if ( ! function_exists( 'rarelyneeded_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rarelyneeded_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rarelyneeded, use a find and replace
		 * to change 'rarelyneeded' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rarelyneeded', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'rarelyneeded' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Strong Blue', 'rarelyneeded' ),
				'slug'  => 'strong-blue',
				'color' => '#0073aa',
			),
			array(
				'name'  => __( 'Lighter Blue', 'rarelyneeded' ),
				'slug'  => 'lighter-blue',
				'color' => '#229fd8',
			),
			array(
				'name'  => __( 'Very Light Gray', 'rarelyneeded' ),
				'slug'  => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name'  => __( 'Very Dark Gray', 'rarelyneeded' ),
				'slug'  => 'very-dark-gray',
				'color' => '#444',
			),
		) );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'rarelyneeded_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rarelyneeded_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rarelyneeded_content_width', 640 );
}
add_action( 'after_setup_theme', 'rarelyneeded_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function rarelyneeded_scripts() {
	wp_enqueue_style( 'gutenbergbase-style', get_stylesheet_uri() );

	// wp_enqueue_style( 'rarelyneededblocks-style', get_template_directory_uri() . '/css/blocks.css' );

	wp_enqueue_script( 'rarelyneeded-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'rarelyneeded_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Theme Settings
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Advanced Custom Fields setup
 */
require get_template_directory() . '/inc/advanced-custom-fields.php';
