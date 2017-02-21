<?php
class WRDSB_Governance_System_Memo_CPT {

	protected $labels = array(
		'name'                  => 'System Memos',
		'singular_name'         => 'System Memo',
		'menu_name'             => 'System Memos',
		'name_admin_bar'        => 'System Memo',
		'archives'              => 'System Memo Archives',
		'attributes'            => 'System Memo Attributes',
		'parent_item_colon'     => 'Parent System Memo:',
		'all_items'             => 'All System Memos',
		'add_new_item'          => 'Add New System Memo',
		'add_new'               => 'Add New',
		'new_item'              => 'New System Memo',
		'edit_item'             => 'Edit System Memo',
		'update_item'           => 'Update System Memo',
		'view_item'             => 'View System Memo',
		'view_items'            => 'View System Memos',
		'search_items'          => 'Search System Memo',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into System Memo',
		'uploaded_to_this_item' => 'Uploaded to this System Memo',
		'items_list'            => 'System Memos list',
		'items_list_navigation' => 'System Memos list navigation',
		'filter_items_list'     => 'Filter System Memos list',
	);

	protected $args = array(
		'label'                 => 'System Memo',
		'description'           => 'A System Memo',
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
		'rewrite'               => array( 'slug' => 'system-memos', 'with_front' => FALSE ),
		'show_in_rest'          => false,
		'rest_base'             => 'wrdsb',
	);

	// Register Custom Post Type
	public function register_cpt() {
		$cpt_args = $this->args;
		$cpt_args['labels'] = $this->labels;
		register_post_type( 'system_memo', $cpt_args );
	}
}

