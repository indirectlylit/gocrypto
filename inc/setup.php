<?php
/**
 * Theme defaults and setup.
 *
 * @package goc
 */

if ( ! function_exists( 'goc_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function goc_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'goc', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add support for custom logo.
		 */
		add_theme_support( 'custom-logo' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		] );

		/**
		 * Add theme support for custom image sizes.
		 */
		add_image_size( 'page-header', 1800 ); // 300 pixels wide (and unlimited height)

		/**
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', [
			'image',
			'video',
			'link',
			'audio',
		] );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters(
			'goc_custom_background_args', [
				'default-color' => 'ffffff',
				'default-image' => '',
			]
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
	add_action( 'after_setup_theme', 'goc_theme_setup' );
endif;

if ( ! function_exists( 'goc_login_logo' ) ) :
	/**
	 * Customize login screen logo
	 */
	function goc_login_logo() {

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$sitelogo       = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		if ( null !== $sitelogo ) {
			$output  = '<style type="text/css">';
			$output .= '#login h1 a, .login h1 a {';
			$output .= 'background-image: url(\'' . $sitelogo[0] . '\');';
			$output .= 'background-size: contain;';
			$output .= 'background-position: center;';
			$output .= 'padding-bottom: 30px;';
			$output .= 'width: inherit;';
			$output .= '}';
			$output .= '</style>';
		}
		echo $output; // WPCS: XSS ok.
	}
	add_action( 'login_enqueue_scripts', 'goc_login_logo' );
endif;

/**
 * Theme Options
 */
if ( function_exists( 'acf_add_options_page' ) ) :
	acf_add_options_page( [
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
	] );
endif;

if ( ! function_exists( 'goc_acf_google_map_api' ) ) :
	/**
	 * Return API key for use in ACF filter.
	 *
	 * @param  string $api Google Maps API key.
	 * @return array       API array with key added.
	 */
	function goc_acf_google_map_api( $api ) {
		$api['key'] = 'API_KEY_GOES_HERE';

		return $api;
	}
	// add_filter( 'acf/fields/google_map/api', 'goc_acf_google_map_api' );
endif;

if ( ! function_exists( 'goc_archive_title' ) ) :
	/**
	 * Modify the archive title.
	 *
	 * @param  string $title The archive title.
	 * @return string        The modified archive title.
	 */
	function goc_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title(
				'<span class="screen-reader-text">' . __( 'Category Archive: ', 'goc' ) . '</span>',
				false
			);
		} elseif ( is_tag() ) {
			$title = single_tag_title(
				'<span class="screen-reader-text">' . __( 'Tag Archive: ', 'goc' ) . '</span>',
				false
			);
		}
		return $title;
	}

	add_filter( 'get_the_archive_title', 'goc_archive_title' );
endif;
