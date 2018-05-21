<?php
/**
 * Customize the output of menus for Foundation mobile walker
 *
 * @package goc
 */

namespace Goc;

use       Goc;

if ( ! defined( 'WPINC' ) ) {
	exit;
}

/**
 * Custon walker for mobile navigation.
 */
class Walker_Nav_Menu_Mobile extends \Walker_Nav_Menu {
	/**
	 * Begin a new level in the tree..
	 *
	 * TODO: BEMify.
	 *
	 * @param  string   $output HTML output.
	 * @param  integer  $depth  Depth of menu item. Used for padding.
	 * @param  stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"vertical nested menu\">\n";
	}
}
