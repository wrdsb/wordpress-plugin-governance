<?php
// Register Custom Taxonomy
function wrdsb_related_references_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Related References', 'Taxonomy General Name', 'wrdsb_related' ),
		'singular_name'              => _x( 'Related Reference', 'Taxonomy Singular Name', 'wrdsb_related' ),
		'menu_name'                  => __( 'Related References', 'wrdsb_related' ),
		'all_items'                  => __( 'All Related References', 'wrdsb_related' ),
		'parent_item'                => __( 'Parent Related Reference', 'wrdsb_related' ),
		'parent_item_colon'          => __( 'Parent Related Reference:', 'wrdsb_related' ),
		'new_item_name'              => __( 'New Related Reference Name', 'wrdsb_related' ),
		'add_new_item'               => __( 'Add New Related Reference', 'wrdsb_related' ),
		'edit_item'                  => __( 'Edit Related Reference', 'wrdsb_related' ),
		'update_item'                => __( 'Update Related Reference', 'wrdsb_related' ),
		'view_item'                  => __( 'View Related Reference', 'wrdsb_related' ),
		'separate_items_with_commas' => __( 'Separate references with commas', 'wrdsb_related' ),
		'add_or_remove_items'        => __( 'Add or remove references', 'wrdsb_related' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_related' ),
		'popular_items'              => __( 'Popular Related References', 'wrdsb_related' ),
		'search_items'               => __( 'Search Related References', 'wrdsb_related' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_related' ),
		'no_terms'                   => __( 'No related references', 'wrdsb_related' ),
		'items_list'                 => __( 'Related References list', 'wrdsb_related' ),
		'items_list_navigation'      => __( 'Related references list navigation', 'wrdsb_related' ),
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
	register_taxonomy( 'wrdsb_related_references', array( 'wrdsb_related' ), $args );

}
add_action( 'init', 'wrdsb_related_references_custom_taxonomy', 0 );
