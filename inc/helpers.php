<?php
/**
 * Helper functions.
 *
 * @package goc_heme
 */

if ( ! function_exists( 'goc_heme_get_img_dir' ) ) :
	/**
	 * Retrieve theme's image directory.
	 *
	 * @param bool $compiled Whether or not to look in the compiled directory.
	 * @return string        Theme image directory
	 */
	function goc_heme_get_img_dir( $compiled = true ) {
		$dir = $compiled ? 'dist' : 'assets';
		return get_template_directory() . "/$dir/img";
	}
endif;

if ( ! function_exists( 'goc_heme_get_img_dir_uri' ) ) :
	/**
	 * Retrieve theme's image directory URI.
	 *
	 * @param bool $compiled Whether or not to look in the compiled directory.
	 * @return string        Theme image directory URI.
	 */
	function goc_heme_get_img_dir_uri( $compiled = true ) {
		$dir = $compiled ? 'dist' : 'assets';
		return get_template_directory_uri() . "/$dir/img";
	}
endif;
