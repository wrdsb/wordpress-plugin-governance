<?php
// Register Custom Taxonomy
function wrdsb_protocol_tags_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Related Protocols', 'Taxonomy General Name', 'wrdsb_protocols' ),
		'singular_name'              => _x( 'Related Protocol', 'Taxonomy Singular Name', 'wrdsb_protocols' ),
		'menu_name'                  => __( 'Related Protocols', 'wrdsb_protocols' ),
		'all_items'                  => __( 'All Related Protocols', 'wrdsb_protocols' ),
		'parent_item'                => __( 'Parent Related Protocol', 'wrdsb_protocols' ),
		'parent_item_colon'          => __( 'Parent Related Protocol:', 'wrdsb_protocols' ),
		'new_item_name'              => __( 'New Related Protocol Name', 'wrdsb_protocols' ),
		'add_new_item'               => __( 'Add New Related Protocol', 'wrdsb_protocols' ),
		'edit_item'                  => __( 'Edit Related Protocol', 'wrdsb_protocols' ),
		'update_item'                => __( 'Update Related Protocol', 'wrdsb_protocols' ),
		'view_item'                  => __( 'View Related Protocol', 'wrdsb_protocols' ),
		'separate_items_with_commas' => __( 'Separate related protocols with commas', 'wrdsb_protocols' ),
		'add_or_remove_items'        => __( 'Add or remove related protocols', 'wrdsb_protocols' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_protocols' ),
		'popular_items'              => __( 'Popular Related Protocols', 'wrdsb_protocols' ),
		'search_items'               => __( 'Search Related Protocols', 'wrdsb_protocols' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_protocols' ),
		'no_terms'                   => __( 'No related protocols', 'wrdsb_protocols' ),
		'items_list'                 => __( 'Related Protocols list', 'wrdsb_protocols' ),
		'items_list_navigation'      => __( 'Related Protocols list navigation', 'wrdsb_protocols' ),
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
	register_taxonomy( 'wrdsb_protocol_tags', array( 'wrdsb_protocols' ), $args );

}
add_action( 'init', 'wrdsb_protocol_tags_custom_taxonomy', 0 );
