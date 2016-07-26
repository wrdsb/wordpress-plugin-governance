<?php
// Register Custom Taxonomy
function wrdsb_policy_tags_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Related Policies', 'Taxonomy General Name', 'wrdsb_policies' ),
		'singular_name'              => _x( 'Related Policy', 'Taxonomy Singular Name', 'wrdsb_policies' ),
		'menu_name'                  => __( 'Related Policies', 'wrdsb_policies' ),
		'all_items'                  => __( 'All Policy Tags', 'wrdsb_policies' ),
		'parent_item'                => __( 'Parent Policy Tag', 'wrdsb_policies' ),
		'parent_item_colon'          => __( 'Parent Policy Tag:', 'wrdsb_policies' ),
		'new_item_name'              => __( 'New Policy Tag Name', 'wrdsb_policies' ),
		'add_new_item'               => __( 'Add New Policy Tag', 'wrdsb_policies' ),
		'edit_item'                  => __( 'Edit Policy Tag', 'wrdsb_policies' ),
		'update_item'                => __( 'Update Policy Tag', 'wrdsb_policies' ),
		'view_item'                  => __( 'View Policy Tag', 'wrdsb_policies' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'wrdsb_policies' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'wrdsb_policies' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_policies' ),
		'popular_items'              => __( 'Popular Policy Tags', 'wrdsb_policies' ),
		'search_items'               => __( 'Search Policy Tags', 'wrdsb_policies' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_policies' ),
		'no_terms'                   => __( 'No plugin tags', 'wrdsb_policies' ),
		'items_list'                 => __( 'Policy Tags list', 'wrdsb_policies' ),
		'items_list_navigation'      => __( 'Policy tags list navigation', 'wrdsb_policies' ),
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
	register_taxonomy( 'wrdsb_policy_tags', array( 'wrdsb_policies' ), $args );

}
add_action( 'init', 'wrdsb_policy_tags_custom_taxonomy', 0 );
