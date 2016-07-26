<?php
// Register Custom Taxonomy
function wrdsb_procedure_tags_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Related Procedures', 'Taxonomy General Name', 'wrdsb_procedures' ),
		'singular_name'              => _x( 'Related Procedure', 'Taxonomy Singular Name', 'wrdsb_procedures' ),
		'menu_name'                  => __( 'Related Procedures', 'wrdsb_procedures' ),
		'all_items'                  => __( 'All Related Procedures', 'wrdsb_procedures' ),
		'parent_item'                => __( 'Parent Related Procedure', 'wrdsb_procedures' ),
		'parent_item_colon'          => __( 'Parent Related Procedure:', 'wrdsb_procedures' ),
		'new_item_name'              => __( 'New Related Procedure Name', 'wrdsb_procedures' ),
		'add_new_item'               => __( 'Add New Related Procedure', 'wrdsb_procedures' ),
		'edit_item'                  => __( 'Edit Related Procedure', 'wrdsb_procedures' ),
		'update_item'                => __( 'Update Related Procedure', 'wrdsb_procedures' ),
		'view_item'                  => __( 'View Related Procedure', 'wrdsb_procedures' ),
		'separate_items_with_commas' => __( 'Separate related procedures with commas', 'wrdsb_procedures' ),
		'add_or_remove_items'        => __( 'Add or remove related procedures', 'wrdsb_procedures' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_procedures' ),
		'popular_items'              => __( 'Popular Related Procedures', 'wrdsb_procedures' ),
		'search_items'               => __( 'Search Related Procedures', 'wrdsb_procedures' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_procedures' ),
		'no_terms'                   => __( 'No related procedures', 'wrdsb_procedures' ),
		'items_list'                 => __( 'Related Procedures list', 'wrdsb_procedures' ),
		'items_list_navigation'      => __( 'Related Procedures list navigation', 'wrdsb_procedures' ),
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
	register_taxonomy( 'wrdsb_procedure_tags', array( 'wrdsb_procedures' ), $args );

}
add_action( 'init', 'wrdsb_procedure_tags_custom_taxonomy', 0 );
