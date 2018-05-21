<?php
/**
 * Enqueue all script and style files.
 *
 * @package goc
 */

if ( ! function_exists( 'goc_theme_scripts' ) ) :

	// Enqueue your frontend scripts and styles here.
	add_action( 'wp_enqueue_scripts', 'goc_theme_scripts' );

	// Enqueue login page stylesheet.
	add_action( 'login_head', 'goc_theme_login_scripts' );

	/**
	 * Enqueue all script and style files.
	 */
	function goc_theme_scripts() {
		wp_enqueue_script( 'goc', get_template_directory_uri() . '/dist/js/app.js', array( 'jquery' ), filemtime( get_template_directory() . '/dist/js/app.js' ), true );
		wp_enqueue_style( 'goc', get_template_directory_uri() . '/dist/css/app.css', array(), filemtime( get_template_directory() . '/dist/css/app.css' ) );
	}

	/**
	 * Enqueue login style files.
	 */
	function goc_theme_login_scripts() {
		wp_enqueue_style( 'goc', get_template_directory_uri() . '/dist/css/login.css', array(), filemtime( get_template_directory() . '/dist/css/login.css' ) );
	}

endif;
