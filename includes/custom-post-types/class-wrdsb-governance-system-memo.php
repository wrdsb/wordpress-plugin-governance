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
		'rewrite'               => array( 'slug' => 'system-memos', 'with_front' => FALSE, 'ep_mask' => EP_PERMALINK ),
		'show_in_rest'          => false,
		'rest_base'             => 'wrdsb',
	);

	// Register Custom Post Type
	public function register_cpt() {
		$cpt_args = $this->args;
		$cpt_args['labels'] = $this->labels;
		register_post_type( 'system_memo', $cpt_args );
	}

	public function set_slug_on_publish( $new_status, $old_status, $post ) {

		// If we're dealing with a System Memo
		if($post->post_type == 'system_memo') {

			// And if we're publishing the memo
			if ( ($old_status != 'publish') && ($new_status == 'publish') ) {

				// And if this is the first time we've assigned a number to it
				// ie the post's slug doesn't match our sequencing pattern
				if ( !preg_match('/[a-zA-Z]\d\d\d/', $post->post_name) ) {

					// Fetch the most recently published System Memos
					$query = wp_get_recent_posts( array(
						'numberposts' => 1,
						'offset' => 0,
						'exclude' => $post->ID,
						'post_type' => 'system_memo',
						'post_status' => 'publish',
						'suppress_filters' => true
					), OBJECT);

					// If we have published System Memos
					if ($query) {
						$last_published_memo = $query[0];
						$last_published_memo_slug = $last_published_memo->post_name;
						$last_published_memo_number = (int) substr($last_published_memo_slug, 1, 3);
						$this_memo_number = $last_published_memo_number + 1;
						$memo_slug = 'A'. str_pad($this_memo_number, 3, '0', STR_PAD_LEFT);

						// Assume our slug is unique
						$unique_slug = TRUE;

						// Validate our assumption by searching for a post with the same slug
						do {
							// Find a post with the same slug, if it exists
							$args = array(
								'name'        => $memo_slug,
								'post_type'   => 'system_memo',
								'post_status' => 'publish,pending,draft',
								'numberposts' => 1,
								'exclude' => $post->ID
							);
							$posts_with_our_slug = get_posts($args);

							// If a post with the same slug exists,
							// mark our slug as non-unique, increment it, and try again
							if( count($posts_with_our_slug) > 0 ) :
								$unique_slug = FALSE;
								$this_memo_number += 1;
								$memo_slug = 'A'. str_pad($this_memo_number, 3, '0', STR_PAD_LEFT);
							else:
								$unique_slug = TRUE;
							endif;
						}
						while ( $unique_slug == FALSE );

					// Else this is our first published System Memo
					} else {
						$memo_slug = 'A001';
					}

					$post->post_name = $memo_slug;
					wp_update_post($post);
				}

			}
		}
	}

	public function by_audience_query( $query ) {
		if ( $query->is_main_query() && is_post_type_archive( 'system_memo' ) && is_tax( 'audiences' ) && !is_admin() ) {
			$term = get_term_by( 'slug', $query->tax_query->queries[0]['terms'][0], 'audiences' );
			$ancestor_ids = get_ancestors($term->term_id, 'audiences', 'taxonomy');

			foreach ($ancestor_ids as $ancestor) {
		  		$ancestor = get_term($ancestor, 'audiences');
		  		$query->tax_query->queries[0]['terms'][] = $ancestor->slug;
			}

			$query->tax_query->queries[0]['include_children'] = 0;
		}
	}
}

