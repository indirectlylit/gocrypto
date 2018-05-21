<?php
/**
 * Navigation for medium + screens.
 *
 * @package goc
 */

?>
<div class="masthead__nav-container">
	<div class="masthead__burger burger show-for-small-only" id="js-site-nav-icon">
		<span class="burger__line masthead__burger-line"></span>
	</div>
	<div class="masthead__nav-wrapper" id="js-site-nav-wrapper">
		<nav class="masthead__nav masthead__nav--primary">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'main-navigation',
				'container'      => '',
				'menu_class'     => 'primary-site-nav-menu menu',
				'walker'         => new \Goc\Walker_Nav_Menu_Main(),
			) );
			?>
		</nav>
	</span>
</div>
