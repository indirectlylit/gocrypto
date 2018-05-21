<?php
/**
 * Load and handle all post types and taxonomies.
 *
 * @package goc
 */

// Define directories for post types and taxonomies.
$goc_cpt_directories = array(
	'post-type' => get_template_directory() . '/inc/post-types/',
	'taxonomy'  => get_template_directory() . '/inc/taxonomies/',
);

foreach ( $goc_cpt_directories as $goc_key => $directory ) {

	foreach ( new DirectoryIterator( $directory ) as $fileinfo ) {
		if ( ! $fileinfo->isDot() && $fileinfo->getExtension() === 'php' ) {

			// Check filename for prefix before loading.
			if ( substr( $fileinfo->getBasename( '.php' ), 0, strlen( $goc_key ) + 1 ) === $goc_key . '-' ) {
				require_once $directory . $fileinfo->getFilename();
			}
		}
	}
}
