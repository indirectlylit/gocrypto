<?php
/**
 * Custom navigation walker for the main menu.
 *
 * @package goc
 */

namespace Goc;

use       Goc;

if ( ! defined( 'WPINC' ) ) {
	exit;
}

/**
 * Custon walker for main nav menu.
 */
class Walker_Nav_Menu_Main extends \Walker_Nav_Menu {

	/**
	 * Begin a new menu element.
	 *
	 * @param  string   $output HTML output.
	 * @param  WP_Post  $item   Menu item data object.
	 * @param  integer  $depth  Depth of menu item. Used for padding.
	 * @param  stdClass $args   An object of wp_nav_menu() arguments.
	 * @param  integer  $id     Menu ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		// BEM stuff.
		// Default class.
		$args->menu_class = ! empty( $args->menu_class ) ? $args->menu_class : 'primary-site-nav-menu';

		// Check for multiple classes and only use first for the block name.
		$block     = strpos( $args->menu_class, ' ' ) !== false ? explode( ' ', $args->menu_class )[0] : (string) $args->menu_class;
		$element   = 'item';
		$classes[] = "{$block}__{$element}";
		if ( $depth > 0 ) {
			$classes[] = "{$block}__{$element}--submenu";
		}
		if ( 0 === $depth ) {
			$classes[] = "{$block}__{$element}--level-1";
		} elseif ( 1 === $depth ) {
			$classes[] = "{$block}__{$element}--level-2";
		} elseif ( 2 === $depth ) {
			$classes[] = "{$block}__{$element}--level-3";
		}

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param WP_Post  $item  Menu item data object.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'goc_nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filters the CSS class(es) applied to a menu item's list item element.
		 *
		 * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'goc_nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filters the ID applied to a menu item's list item element.
		 *
		 * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'goc_nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$atts = array();

		// phpcs:disable
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
		// phpcs:enable

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'goc_nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'goc_the_title', $item->title, $item->ID );

		/**
		 * Filters a menu item's title.
		 *
		 * @param string   $title The menu item's title.
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'goc_nav_menu_item_title', $title, $item, $args, $depth );

		// Create classes for the link.
		$link_el        = 'link';
		$link_classes[] = "{$block}__{$link_el}";
		if ( $depth > 0 ) {
			$classes[] = "{$block}__{$link_el}--submenu";
		}
		if ( 0 === $depth ) {
			$link_classes[] = "{$block}__{$link_el}--level-1";
		} elseif ( 1 === $depth ) {
			$link_classes[] = "{$block}__{$link_el}--level-2";
		} elseif ( 2 === $depth ) {
			$link_classes[] = "{$block}__{$link_el}--level-3";
		}

		/**
		 * Filters the CSS class(es) applied to a menu item's link element.
		 *
		 * @param array    $link_classes The CSS classes that are applied to the
		 *                               menu item's `<a>` element.
		 * @param WP_Post  $item         The current menu item.
		 * @param stdClass $args         An object of wp_nav_menu() arguments.
		 * @param int      $depth        Depth of menu item. Used for padding.
		 */
		$link_class_names = join( ' ', apply_filters( 'goc_nav_link_css_class', array_filter( $link_classes ), $item, $args, $depth ) );
		$link_class_names = $link_class_names ? ' class="' . esc_attr( $link_class_names ) . '" ' : '';

		$item_output  = $args->before;
		$item_output .= "<a{$link_class_names}{$attributes}>";
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @param string   $item_output The menu item's starting HTML output.
		 * @param WP_Post  $item        Menu item data object.
		 * @param int      $depth       Depth of menu item. Used for padding.
		 * @param stdClass $args        An object of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'goc_walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Begin a new level in the tree..
	 *
	 * @param  string   $output HTML output.
	 * @param  integer  $depth  Depth of menu item. Used for padding.
	 * @param  stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = [] ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );
		$indent = str_repeat( "\t", $depth );
		$level  = $depth + 2;

		// Default CSS class.
		$args->menu_class = ! empty( $args->menu_class ) ? $args->menu_class : 'primary-site-nav-menu';

		// Check for multiple classes and only use first for the block name.
		$block   = strpos( $args->menu_class, ' ' ) !== false ? explode( ' ', $args->menu_class )[0] : (string) $args->menu_class;
		$classes = [ $block ];
		if ( 0 <= $depth ) {
			$classes[] = "{$block}--submenu";
			$classes[] = "{$block}--level-{$level}";
		}
		$class_names = join( ' ', apply_filters( 'goc_nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$output     .= "\n$indent<ul{$class_names}>\n";
	}
}
