<?php
class WRDSB_Governance_Board_Procedure_CPT {

	protected $labels = array(
		'name'                  => 'Procedures',
		'singular_name'         => 'Procedure',
		'menu_name'             => 'Procedures',
		'name_admin_bar'        => 'Procedure',
		'archives'              => 'Procedure Archives',
		'attributes'            => 'Procedure Attributes',
		'parent_item_colon'     => 'Parent Procedure:',
		'all_items'             => 'All Procedures',
		'add_new_item'          => 'Add New Procedure',
		'add_new'               => 'Add New',
		'new_item'              => 'New Procedure',
		'edit_item'             => 'Edit Procedure',
		'update_item'           => 'Update Procedure',
		'view_item'             => 'View Procedure',
		'view_items'            => 'View Procedures',
		'search_items'          => 'Search Procedure',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into procedure',
		'uploaded_to_this_item' => 'Uploaded to this procedure',
		'items_list'            => 'Procedures list',
		'items_list_navigation' => 'Procedures list navigation',
		'filter_items_list'     => 'Filter procedures list',
	);

	protected $args = array(
		'label'                 => 'Procedure',
		'description'           => 'A Board Procedure',
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
		register_post_type( 'board_procedure', $cpt_args );
	}

	// Attach Taxonomies to Custom Post Type
	public function attach_taxonomies() {
		register_taxonomy_for_object_type('governance_categories', 'board_procedure');
		register_taxonomy_for_object_type('governance_tags', 'board_procedure');
		register_taxonomy_for_object_type('audiences', 'board_procedure');
		register_taxonomy_for_object_type('contacts', 'board_procedure');
		register_taxonomy_for_object_type('lifecycle_phases', 'board_procedure');
		register_taxonomy_for_object_type('org_units', 'board_procedure');
		register_taxonomy_for_object_type('owners', 'board_procedure');
		register_taxonomy_for_object_type('privacy_levels','board_procedure');
	}
}
