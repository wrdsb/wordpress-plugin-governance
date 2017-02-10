<?php
if ( ! function_exists('wrdsb_governance_system_memo') ) {

// Register Custom Post Type
function wrdsb_governance_system_memo() {

	$labels = array(
		'name'                  => _x( 'System Memos', 'Post Type General Name', 'wrdsb_governance' ),
		'singular_name'         => _x( 'System Memo', 'Post Type Singular Name', 'wrdsb_governance' ),
		'menu_name'             => __( 'System Memos', 'wrdsb_governance' ),
		'name_admin_bar'        => __( 'System Memo', 'wrdsb_governance' ),
		'archives'              => __( 'System Memo Archives', 'wrdsb_governance' ),
		'attributes'            => __( 'System Memo Attributes', 'wrdsb_governance' ),
		'parent_item_colon'     => __( 'Parent System Memo:', 'wrdsb_governance' ),
		'all_items'             => __( 'All System Memos', 'wrdsb_governance' ),
		'add_new_item'          => __( 'Add New System Memo', 'wrdsb_governance' ),
		'add_new'               => __( 'Add New', 'wrdsb_governance' ),
		'new_item'              => __( 'New System Memo', 'wrdsb_governance' ),
		'edit_item'             => __( 'Edit System Memo', 'wrdsb_governance' ),
		'update_item'           => __( 'Update System Memo', 'wrdsb_governance' ),
		'view_item'             => __( 'View System Memo', 'wrdsb_governance' ),
		'view_items'            => __( 'View System Memos', 'wrdsb_governance' ),
		'search_items'          => __( 'Search System Memo', 'wrdsb_governance' ),
		'not_found'             => __( 'Not found', 'wrdsb_governance' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wrdsb_governance' ),
		'featured_image'        => __( 'Featured Image', 'wrdsb_governance' ),
		'set_featured_image'    => __( 'Set featured image', 'wrdsb_governance' ),
		'remove_featured_image' => __( 'Remove featured image', 'wrdsb_governance' ),
		'use_featured_image'    => __( 'Use as featured image', 'wrdsb_governance' ),
		'insert_into_item'      => __( 'Insert into System Memo', 'wrdsb_governance' ),
		'uploaded_to_this_item' => __( 'Uploaded to this System Memo', 'wrdsb_governance' ),
		'items_list'            => __( 'System Memos list', 'wrdsb_governance' ),
		'items_list_navigation' => __( 'System Memos list navigation', 'wrdsb_governance' ),
		'filter_items_list'     => __( 'Filter System Memos list', 'wrdsb_governance' ),
	);
	$args = array(
		'label'                 => __( 'System Memo', 'wrdsb_governance' ),
		'description'           => __( 'A System Memo', 'wrdsb_governance' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'            => array( 'governance_categories', 'governance_tags' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => false,
		'rest_base'             => 'wrdsb',
	);
	register_post_type( 'system_memo', $args );

}
add_action( 'init', 'wrdsb_governance_system_memo', 0 );

}

