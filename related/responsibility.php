<?php
// Register Custom Taxonomy
function wrdsb_responsibility_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Responsibilities', 'Taxonomy General Name', 'wrdsb_responsibility' ),
		'singular_name'              => _x( 'Responsibility', 'Taxonomy Singular Name', 'wrdsb_responsibility' ),
		'menu_name'                  => __( 'Responsibilities', 'wrdsb_responsibility' ),
		'all_items'                  => __( 'All Responsibilities', 'wrdsb_responsibility' ),
		'parent_item'                => __( 'Parent Responsibility', 'wrdsb_responsibility' ),
		'parent_item_colon'          => __( 'Parent Responsibility:', 'wrdsb_responsibility' ),
		'new_item_name'              => __( 'New Responsibility', 'wrdsb_responsibility' ),
		'add_new_item'               => __( 'Add New Responsibility', 'wrdsb_responsibility' ),
		'edit_item'                  => __( 'Edit Responsibility', 'wrdsb_responsibility' ),
		'update_item'                => __( 'Update Responsibility', 'wrdsb_responsibility' ),
		'view_item'                  => __( 'View Responsibility', 'wrdsb_responsibility' ),
		'separate_items_with_commas' => __( 'Separate responsible parties with commas', 'wrdsb_responsibility' ),
		'add_or_remove_items'        => __( 'Add or remove responsible parties', 'wrdsb_responsibility' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_responsibility' ),
		'popular_items'              => __( 'Popular Responsibilities', 'wrdsb_responsibility' ),
		'search_items'               => __( 'Search Responsibilities', 'wrdsb_responsibility' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_responsibility' ),
		'no_terms'                   => __( 'No responsibilities', 'wrdsb_responsibility' ),
		'items_list'                 => __( 'Responsibilities list', 'wrdsb_responsibility' ),
		'items_list_navigation'      => __( 'Responsibilities list navigation', 'wrdsb_responsibility' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'wrdsb_responsibility_tags', array( 'wrdsb_responsibility' ), $args );

}
add_action( 'init', 'wrdsb_responsibility_custom_taxonomy', 0 );
