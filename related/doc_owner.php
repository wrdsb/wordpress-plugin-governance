<?php
// Register Custom Taxonomy
function wrdsb_doc_owner_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Document Owner', 'Taxonomy General Name', 'wrdsb_doc_owner' ),
		'singular_name'              => _x( 'Document Owner', 'Taxonomy Singular Name', 'wrdsb_doc_owner' ),
		'menu_name'                  => __( 'Document Owner', 'wrdsb_doc_owner' ),
		'all_items'                  => __( 'All Document Owners', 'wrdsb_doc_owner' ),
		'parent_item'                => __( 'Parent Document Owner', 'wrdsb_doc_owner' ),
		'parent_item_colon'          => __( 'Parent Document Owner:', 'wrdsb_doc_owner' ),
		'new_item_name'              => __( 'New Document Owner', 'wrdsb_doc_owner' ),
		'add_new_item'               => __( 'Add New Document Owner', 'wrdsb_doc_owner' ),
		'edit_item'                  => __( 'Edit Document Owner', 'wrdsb_doc_owner' ),
		'update_item'                => __( 'Update Document Owner', 'wrdsb_doc_owner' ),
		'view_item'                  => __( 'View Document Owner', 'wrdsb_doc_owner' ),
		'separate_items_with_commas' => __( 'Separate document owners with commas', 'wrdsb_doc_owner' ),
		'add_or_remove_items'        => __( 'Add or remove document owners', 'wrdsb_doc_owner' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_doc_owner' ),
		'popular_items'              => __( 'Popular Document Owners', 'wrdsb_doc_owner' ),
		'search_items'               => __( 'Search Document Owners', 'wrdsb_doc_owner' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_doc_owner' ),
		'no_terms'                   => __( 'No document owners', 'wrdsb_doc_owner' ),
		'items_list'                 => __( 'Document Owners list', 'wrdsb_doc_owner' ),
		'items_list_navigation'      => __( 'Document Owners list navigation', 'wrdsb_doc_owner' ),
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
	register_taxonomy( 'wrdsb_doc_owner_tags', array( 'wrdsb_doc_owner' ), $args );

}
add_action( 'init', 'wrdsb_doc_owner_custom_taxonomy', 0 );
