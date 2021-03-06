<?php
class WRDSB_Governance_Board_Policy_CPT {

	protected $labels = array(
		'name'                  => 'Policies',
		'singular_name'         => 'Policy',
		'menu_name'             => 'Policies',
		'name_admin_bar'        => 'Policy',
		'archives'              => 'Policy Archives',
		'attributes'            => 'Policy Attributes',
		'parent_item_colon'     => 'Parent Policy:',
		'all_items'             => 'All Policies',
		'add_new_item'          => 'Add New Policy',
		'add_new'               => 'Add New',
		'new_item'              => 'New Policy',
		'edit_item'             => 'Edit Policy',
		'update_item'           => 'Update Policy',
		'view_item'             => 'View Policy',
		'view_items'            => 'View Policies',
		'search_items'          => 'Search Policy',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into policy',
		'uploaded_to_this_item' => 'Uploaded to this policy',
		'items_list'            => 'Policies list',
		'items_list_navigation' => 'Policies list navigation',
		'filter_items_list'     => 'Filter policies list',
	);

	protected $args = array(
		'label'                 => 'Policy',
		'description'           => 'A Board Policy',
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'            => array( 'governance_categories', 'governance_tags', 'audiences', 'contacts', 'lifecycle_phases', 'org_units', 'owners', 'privacy_levels' ),
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

	// Register Custom Post Type
	public function register_cpt() {
		$cpt_args = $this->args;
		$cpt_args['labels'] = $this->labels;
		register_post_type( 'board_policy', $cpt_args );
	}

	// Attach Taxonomies to Custom Post Type
	public function attach_taxonomies() {
		register_taxonomy_for_object_type('governance_categories', 'board_policy');
		register_taxonomy_for_object_type('governance_tags', 'board_policy');
		register_taxonomy_for_object_type('audiences', 'board_policy');
		register_taxonomy_for_object_type('contacts', 'board_policy');
		register_taxonomy_for_object_type('lifecycle_phases', 'board_policy');
		register_taxonomy_for_object_type('org_units', 'board_policy');
		register_taxonomy_for_object_type('owners', 'board_policy');
		register_taxonomy_for_object_type('privacy_levels','board_policy');
	}
}
