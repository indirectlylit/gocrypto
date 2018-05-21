<?php
/**
 * Team category taxonomy.
 *
 * @package goc
 */

if ( ! function_exists( 'goc_tax_team_category' ) ) :
	/**
	 * Register Team Category taxonomy.
	 */
	function goc_tax_team_category() {

		$labels = [
			'name'              => _x( 'Team Categories', 'taxonomy general name', 'goc' ),
			'singular_name'     => _x( 'Team Category', 'taxonomy singular name', 'goc' ),
			'search_items'      => __( 'Search Team Categories', 'goc' ),
			'all_items'         => __( 'All Team Categories', 'goc' ),
			'parent_item'       => __( 'Parent Team Category', 'goc' ),
			'parent_item_colon' => __( 'Parent Team Category:', 'goc' ),
			'edit_item'         => __( 'Edit Team Category', 'goc' ),
			'update_item'       => __( 'Update Team Category', 'goc' ),
			'add_new_item'      => __( 'Add New Team Category', 'goc' ),
			'new_item_name'     => __( 'New Team Category Name', 'goc' ),
			'menu_name'         => __( 'Team Categories', 'goc' ),
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [
				'slug'         => 'team-categories',
				'hierarchical' => true,
			],
		];

		register_taxonomy( 'team-category', [ 'team' ], $args );
	}
	add_action( 'init', 'goc_tax_team_category', 0 );
endif;
