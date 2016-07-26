<?php
// Register Custom Taxonomy
function wrdsb_guideline_tags_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Related Guidelines', 'Taxonomy General Name', 'wrdsb_guidelines' ),
		'singular_name'              => _x( 'Related Guideline', 'Taxonomy Singular Name', 'wrdsb_guidelines' ),
		'menu_name'                  => __( 'Related Guidelines', 'wrdsb_guidelines' ),
		'all_items'                  => __( 'All Related Guidelines', 'wrdsb_guidelines' ),
		'parent_item'                => __( 'Parent Related Guideline', 'wrdsb_guidelines' ),
		'parent_item_colon'          => __( 'Parent Related Guideline:', 'wrdsb_guidelines' ),
		'new_item_name'              => __( 'New Related Guideline Name', 'wrdsb_guidelines' ),
		'add_new_item'               => __( 'Add New Related Guideline', 'wrdsb_guidelines' ),
		'edit_item'                  => __( 'Edit Related Guideline', 'wrdsb_guidelines' ),
		'update_item'                => __( 'Update Related Guideline', 'wrdsb_guidelines' ),
		'view_item'                  => __( 'View Related Guideline', 'wrdsb_guidelines' ),
		'separate_items_with_commas' => __( 'Separate related guidelines with commas', 'wrdsb_guidelines' ),
		'add_or_remove_items'        => __( 'Add or remove related guidelines', 'wrdsb_guidelines' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wrdsb_guidelines' ),
		'popular_items'              => __( 'Popular Related Guidelines', 'wrdsb_guidelines' ),
		'search_items'               => __( 'Search Related Guidelines', 'wrdsb_guidelines' ),
		'not_found'                  => __( 'Not Found', 'wrdsb_guidelines' ),
		'no_terms'                   => __( 'No related guidelines', 'wrdsb_guidelines' ),
		'items_list'                 => __( 'Related Guidelines list', 'wrdsb_guidelines' ),
		'items_list_navigation'      => __( 'Related Guidelines list navigation', 'wrdsb_guidelines' ),
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
	register_taxonomy( 'wrdsb_guideline_tags', array( 'wrdsb_guidelines' ), $args );

}
add_action( 'init', 'wrdsb_guideline_tags_custom_taxonomy', 0 );
