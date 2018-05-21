<?php
/**
 * Autoloader for theme classes.
 *
 * @package goc
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'goc_autoloader' ) ) :
	/**
	 * Class autoloader
	 *
	 * @param  string $class Qualified class name.
	 */
	function goc_autoloader( string $class ) {

		// If the $class_name does not include our namespace, GTFO.
		if ( false === strpos( $class, 'Goc' ) ) {
			// phpcs:ignore
			// trigger_error( esc_html( "The class '$class' uses an improper namespace." ), E_USER_WARNING );
			return;
		}

		$namespace_parts = explode( '\\', $class );

		// Format parts to match filenames.
		$file_parts = array_map( function( $part ) {
			return str_replace( '_', '-', strtolower( $part ) );
		}, $namespace_parts );

		// Set up file path.
		$class_path = get_template_directory() . '/inc/classes/';

		// If class uses sub-namespaces, we'll stick them in matching sub-directories.
		if ( count( $namespace_parts ) > 2 ) {
			// Remove first array item (theme namespace) and last array item (filename).
			// Anything in between will go in the path.
			$class_path .= implode( DIRECTORY_SEPARATOR, array_slice( $file_parts, 1, count( $file_parts ) - 2 ) ) . '/';
		}

		// Construct file path + name.
		$file = $class_path . 'class-' . end( $file_parts ) . '.php';

		if ( file_exists( $file ) ) {
			require_once $file;
		} else {
			return;
		}
	}

	spl_autoload_register( 'goc_autoloader' );
endif;
