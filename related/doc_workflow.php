<?php
// Register Custom Taxonomy
function wrdsb_doc_workflow_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Document Workflows', 'Taxonomy General Name', 'wrdsb_doc_workflow' ),
		'singular_name'              => _x( 'Document Workflow', 'Taxonomy Singular Name', 'wrdsb_doc_workflow' ),
		'menu_name'                  => __( 'Document Workflows', 'wrdsb_doc_workflow' ),
		'all_items'                  => __( 'All Document Workflows', 'wrdsb_doc_workflow' ),
		'parent_item'                => __( 'Parent Document Workflow', 'wrdsb_doc_workflow' ),
		'parent_item_colon'          => __( 'Parent Document Workflow:', 'wrdsb_doc_workflow' ),
		'new_item_name'              => __( 'New Document Workflow', 'wrdsb_doc_workflow' ),
		'add_new_item'               => __( 'Add New Document Workflow', 'wrdsb_doc_workflow' ),
		'edit_item'                  => __( 'Edit Document Workflow', 'wrdsb_doc_workflow' ),
		'update_item'                => __( 'Update Document Workflow', 'wrdsb_doc_workflow' ),
		'view_item'                  => __( 'View Document Workflow', 'wrdsb_doc_workflow' ),
		'separate_items_with_commas' => __( 'Please choose only one workflow state.', 'wrdsb_doc_workflow' ),
		'add_or_remove_items'        => __( 'Add or remove document workflows', 'wrdsb_doc_workflow' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_doc_workflow' ),
		'popular_items'              => __( 'Popular Document Workflows', 'wrdsb_doc_workflow' ),
		'search_items'               => __( 'Search Document Workflows', 'wrdsb_doc_workflow' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_doc_workflow' ),
		'no_terms'                   => __( 'No document workflows', 'wrdsb_doc_workflow' ),
		'items_list'                 => __( 'Document Workflows list', 'wrdsb_doc_workflow' ),
		'items_list_navigation'      => __( 'Document Workflows list navigation', 'wrdsb_doc_workflow' ),
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
	register_taxonomy( 'wrdsb_doc_workflow_tags', array( 'wrdsb_doc_workflow' ), $args );

}
add_action( 'init', 'wrdsb_doc_workflow_custom_taxonomy', 0 );
