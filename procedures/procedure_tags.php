<?php
// Register Custom Taxonomy
function wrdsb_procedure_tags_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Procedure Tags', 'Taxonomy General Name', 'wrdsb_procedures' ),
		'singular_name'              => _x( 'Procedure Category', 'Taxonomy Singular Name', 'wrdsb_procedures' ),
		'menu_name'                  => __( 'Procedure Tags', 'wrdsb_procedures' ),
		'all_items'                  => __( 'All Procedure Tags', 'wrdsb_procedures' ),
		'parent_item'                => __( 'Parent Procedure Category', 'wrdsb_procedures' ),
		'parent_item_colon'          => __( 'Parent Procedure Category:', 'wrdsb_procedures' ),
		'new_item_name'              => __( 'New Procedure Category Name', 'wrdsb_procedures' ),
		'add_new_item'               => __( 'Add New Procedure Category', 'wrdsb_procedures' ),
		'edit_item'                  => __( 'Edit Procedure Category', 'wrdsb_procedures' ),
		'update_item'                => __( 'Update Procedure Category', 'wrdsb_procedures' ),
		'view_item'                  => __( 'View Procedure Category', 'wrdsb_procedures' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'wrdsb_procedures' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'wrdsb_procedures' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_procedures' ),
		'popular_items'              => __( 'Popular Procedure Tags', 'wrdsb_procedures' ),
		'search_items'               => __( 'Search Procedure Tags', 'wrdsb_procedures' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_procedures' ),
		'no_terms'                   => __( 'No plugin tags', 'wrdsb_procedures' ),
		'items_list'                 => __( 'Procedure Tags list', 'wrdsb_procedures' ),
		'items_list_navigation'      => __( 'Procedure tags list navigation', 'wrdsb_procedures' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'wrdsb_procedure_tags', array( 'wrdsb_procedures' ), $args );

}
add_action( 'init', 'wrdsb_procedure_tags_custom_taxonomy', 0 );
