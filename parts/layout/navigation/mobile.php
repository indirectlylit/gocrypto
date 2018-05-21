<?php
/**
 * Mobile off-canvas nav menu.
 *
 * @package goc
 */

?>
<nav class="mobile-nav" id="js-mobile-nav">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'main-navigation',
		'container'      => '',
		'menu_class'     => 'primary-site-nav-menu menu mobile-nav__menu',
		'walker'         => new \Goc\Walker_Nav_Menu_Main(),
	) );
	?>
</nav>
