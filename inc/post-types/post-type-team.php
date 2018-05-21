<?php
/**
 * Resource post type.
 *
 * @package goc
 */

if ( ! function_exists( 'goc_post_type_resource' ) ) :
	/**
	 * Register Resource post type.
	 */
	function goc_post_type_resource() {
		$labels = array(
			'name'               => _x( 'Resources', 'post type general name', 'goc' ),
			'singular_name'      => _x( 'Resource', 'post type singular name', 'goc' ),
			'menu_name'          => _x( 'Resources', 'admin menu', 'goc' ),
			'name_admin_bar'     => _x( 'Resource', 'add new on admin bar', 'goc' ),
			'add_new'            => _x( 'Add New', 'location', 'goc' ),
			'add_new_item'       => __( 'Add New Resource', 'goc' ),
			'new_item'           => __( 'New Resource', 'goc' ),
			'edit_item'          => __( 'Edit Resource', 'goc' ),
			'view_item'          => __( 'View Resource', 'goc' ),
			'all_items'          => __( 'All Resources', 'goc' ),
			'search_items'       => __( 'Search Resources', 'goc' ),
			'parent_item_colon'  => __( 'Parent Resources:', 'goc' ),
			'not_found'          => __( 'No Resources found.', 'goc' ),
			'not_found_in_trash' => __( 'No Resources found in Trash.', 'goc' ),
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'goc' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'rewrite'            => array(
				'slug'       => 'resource',
				'with_front' => false,
			),
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'         => array( 'category' ),
			'menu_icon'          => 'dashicons-paperclip',
		);

		register_post_type( 'resource', $args );
	}
	add_action( 'init', 'goc_post_type_resource' );
endif;
