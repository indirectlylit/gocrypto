<?php
/**
 * Register our sidebars and widgetized areas.
 *
 * @package goc
 */

/**
 * Register widgets.
 */
function goc_widgets_init() {
	register_sidebar( array(
		'name'          => 'Archive Widgets',
		'id'            => 'archive-widgets',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'goc_widgets_init' );

