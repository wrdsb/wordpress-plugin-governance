<?php
// Register Custom Taxonomy
function wrdsb_doc_status_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Document Status', 'Taxonomy General Name', 'wrdsb_doc_status' ),
		'singular_name'              => _x( 'Document Status', 'Taxonomy Singular Name', 'wrdsb_doc_status' ),
		'menu_name'                  => __( 'Document Status', 'wrdsb_doc_status' ),
		'all_items'                  => __( 'All Document Status', 'wrdsb_doc_status' ),
		'parent_item'                => __( 'Parent Document Status', 'wrdsb_doc_status' ),
		'parent_item_colon'          => __( 'Parent Document Status:', 'wrdsb_doc_status' ),
		'new_item_name'              => __( 'New Document Status', 'wrdsb_doc_status' ),
		'add_new_item'               => __( 'Add New Document Status', 'wrdsb_doc_status' ),
		'edit_item'                  => __( 'Edit Document Status', 'wrdsb_doc_status' ),
		'update_item'                => __( 'Update Document Status', 'wrdsb_doc_status' ),
		'view_item'                  => __( 'View Document Status', 'wrdsb_doc_status' ),
		'separate_items_with_commas' => __( 'Please choose only one status.', 'wrdsb_doc_status' ),
		'add_or_remove_items'        => __( 'Add or remove document status', 'wrdsb_doc_status' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_doc_status' ),
		'popular_items'              => __( 'Popular Document Status', 'wrdsb_doc_status' ),
		'search_items'               => __( 'Search Document Status', 'wrdsb_doc_status' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_doc_status' ),
		'no_terms'                   => __( 'No document statuses', 'wrdsb_doc_status' ),
		'items_list'                 => __( 'Document Status list', 'wrdsb_doc_status' ),
		'items_list_navigation'      => __( 'Document Status list navigation', 'wrdsb_doc_status' ),
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
	register_taxonomy( 'wrdsb_doc_status_tags', array( 'wrdsb_doc_status' ), $args );

}
add_action( 'init', 'wrdsb_doc_status_custom_taxonomy', 0 );
