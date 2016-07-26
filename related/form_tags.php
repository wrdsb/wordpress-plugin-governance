<?php
// Register Custom Taxonomy
function wrdsb_form_tags_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Related Forms', 'Taxonomy General Name', 'wrdsb_forms' ),
		'singular_name'              => _x( 'Related Form', 'Taxonomy Singular Name', 'wrdsb_forms' ),
		'menu_name'                  => __( 'Related Forms', 'wrdsb_forms' ),
		'all_items'                  => __( 'All Related Forms', 'wrdsb_forms' ),
		'parent_item'                => __( 'Parent Related Form', 'wrdsb_forms' ),
		'parent_item_colon'          => __( 'Parent Related Form:', 'wrdsb_forms' ),
		'new_item_name'              => __( 'New Related Form Name', 'wrdsb_forms' ),
		'add_new_item'               => __( 'Add New Related Form', 'wrdsb_forms' ),
		'edit_item'                  => __( 'Edit Related Form', 'wrdsb_forms' ),
		'update_item'                => __( 'Update Related Form', 'wrdsb_forms' ),
		'view_item'                  => __( 'View Related Form', 'wrdsb_forms' ),
		'separate_items_with_commas' => __( 'Separate related forms with commas', 'wrdsb_forms' ),
		'add_or_remove_items'        => __( 'Add or remove related forms', 'wrdsb_forms' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_forms' ),
		'popular_items'              => __( 'Popular Related Forms', 'wrdsb_forms' ),
		'search_items'               => __( 'Search Related Forms', 'wrdsb_forms' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_forms' ),
		'no_terms'                   => __( 'No related forms', 'wrdsb_forms' ),
		'items_list'                 => __( 'Related Forms list', 'wrdsb_forms' ),
		'items_list_navigation'      => __( 'Related Forms list navigation', 'wrdsb_forms' ),
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
	register_taxonomy( 'wrdsb_form_tags', array( 'wrdsb_forms' ), $args );

}
add_action( 'init', 'wrdsb_form_tags_custom_taxonomy', 0 );
