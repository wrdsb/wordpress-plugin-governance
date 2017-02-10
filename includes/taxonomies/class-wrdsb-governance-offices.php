<?php
class WRDSB_Governance_Offices_CTax {

	protected $labels = array(
		'name'                       => 'Offices',
		'singular_name'              => 'Office',
		'menu_name'                  => 'Offices',
		'all_items'                  => 'All Offices',
		'parent_item'                => 'Parent Office',
		'parent_item_colon'          => 'Parent Office:',
		'new_item_name'              => 'New Office Name',
		'add_new_item'               => 'Add New Office',
		'edit_item'                  => 'Edit Office',
		'update_item'                => 'Update Office',
		'view_item'                  => 'View Office',
		'separate_items_with_commas' => 'Separate Offices with commas',
		'add_or_remove_items'        => 'Add or remove Offices',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Offices',
		'search_items'               => 'Search Offices',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Offices',
		'items_list'                 => 'Offices list',
		'items_list_navigation'      => 'Offices list navigation',
	);

	protected $args = array(
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => false,
		'rest_base'                  => 'wrdsb',
	);

	// Register Custom Taxonomy
	function register_ctax() {
		$ctax_args = $this->args;
		$ctax_args['labels'] = $this->labels;
		register_taxonomy( 'offices', array( 'board_policy', 'board_procedure', 'system_memo' ), $ctax_args );
	}
}
