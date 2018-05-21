<?php
/**
 * Navigation related functions.
 *
 * @package goc
 */

if ( ! function_exists( 'goc_navigation_menus' ) ) :
	/**
	 * Load navigation menus for our theme.
	 */
	function goc_navigation_menus() {

		$locations = array(
			'main-navigation'      => __( 'Main Navigation', 'goc' ),
			'secondary-navigation' => __( 'Secondary Navigation', 'goc' ),
			'footer-col-1'         => __( 'Footer Column 1', 'goc' ),
			'footer-col-2'         => __( 'Footer Column 2', 'goc' ),
			'social'               => __( 'Social Navigation', 'goc' ),
		);
		register_nav_menus( $locations );
	}
endif;

add_action( 'init', 'goc_navigation_menus' );

if ( ! function_exists( 'goc_mobile_nav' ) ) :
	/**
	 * Function to generate mobile nav menu.
	 *
	 * @param string $location Registered nav menu location.
	 */
	function goc_mobile_nav( $location = 'main-navigation' ) {
		if ( has_nav_menu( $location ) ) {
			$menu_args = [
				'container'      => false, // Remove nav container.
				'menu'           => __( 'mobile-nav', 'goc' ),
				'menu_class'     => 'vertical menu',
				'theme_location' => esc_attr( $location ),
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
				'fallback_cb'    => false,
				'walker'         => new \Goc\Walker_Nav_Menu_Mobile(),
			];
			wp_nav_menu( $menu_args );
		}
	}
endif;
