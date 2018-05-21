<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package goc
 */

/**
 * Composer autoloader
 */
$goc_composer_autoloader = get_template_directory() . '/vendor/autoload.php';
if ( file_exists( $goc_composer_autoloader ) ) {
	require_once $goc_composer_autoloader;
}

/**
 * Class autoloader.
 */
require_once get_template_directory() . '/inc/autoloader.php';

/**
 * Helper functions.
 */
require_once get_template_directory() . '/inc/helpers.php';

/**
 * WP cleanup.
 */
require_once get_template_directory() . '/inc/cleanup.php';

/**
 * Theme setup.
 */
require_once get_template_directory() . '/inc/setup.php';

/**
 * Register custom post types.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
require_once get_template_directory() . '/inc/post-types.php';

/**
 * Icon functions.
 */
require_once get_template_directory() . '/inc/icons.php';

/**
 * Register navigation menus.
 */
require_once get_template_directory() . '/inc/nav.php';

/**
 * Register navigation menus.
 */
require_once get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require_once get_template_directory() . '/inc/scripts.php';

/**
 * Layout functions.
 */
require_once get_template_directory() . '/inc/layout.php';
