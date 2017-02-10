<?php

if ( ! function_exists('wrdsb_policy') ) {

	// Register Custom Post Type
	function wrdsb_policy() {

		$labels = array(
			'name'                  => _x( 'Policies', 'Post Type General Name', 'wrdsb_policies' ),
			'singular_name'         => _x( 'Policy', 'Post Type Singular Name', 'wrdsb_policies' ),
			'menu_name'             => __( 'Policies', 'wrdsb_policies' ),
			'name_admin_bar'        => __( 'Post Type', 'wrdsb_policies' ),
			'archives'              => __( 'Item Archives', 'wrdsb_policies' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wrdsb_policies' ),
			'all_items'             => __( 'All Items', 'wrdsb_policies' ),
			'add_new_item'          => __( 'Add New Policy Document', 'wrdsb_policies' ),
			'add_new'               => __( 'Add New', 'wrdsb_policies' ),
			'new_item'              => __( 'New Item', 'wrdsb_policies' ),
			'edit_item'             => __( 'Edit Item', 'wrdsb_policies' ),
			'update_item'           => __( 'Update Item', 'wrdsb_policies' ),
			'view_item'             => __( 'View Item', 'wrdsb_policies' ),
			'search_items'          => __( 'Search Item', 'wrdsb_policies' ),
			'not_found'             => __( 'Not found', 'wrdsb_policies' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wrdsb_policies' ),
			'featured_image'        => __( 'Featured Image', 'wrdsb_policies' ),
			'set_featured_image'    => __( 'Set featured image', 'wrdsb_policies' ),
			'remove_featured_image' => __( 'Remove featured image', 'wrdsb_policies' ),
			'use_featured_image'    => __( 'Use as featured image', 'wrdsb_policies' ),
			'insert_into_item'      => __( 'Insert into item', 'wrdsb_policies' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'wrdsb_policies' ),
			'items_list'            => __( 'Items list', 'wrdsb_policies' ),
			'items_list_navigation' => __( 'Items list navigation', 'wrdsb_policies' ),
			'filter_items_list'     => __( 'Filter items list', 'wrdsb_policies' ),
		);
		$rewrite = array(
			'slug'                  => 'post_type',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Policy', 'wrdsb_policies' ),
			'description'           => __( 'Policy', 'wrdsb_policies' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions' ),
			'taxonomies'            => array( 'wrdsb_policy_categories', 'post_tag' ),
			'hierarchical'          => true,
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
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
		);
		register_post_type( 'wrdsb_policy', $args );

	}

	add_action( 'init', 'wrdsb_policy', 0 );

	/* Adds a meta box to the post edit screen */
	add_action( 'add_meta_boxes', 'policy_add_custom_box' );
	function policy_add_custom_box( $post ) {
	    $screens = array( 'post', 'my_cpt' );
	    foreach ( $screens as $screen ) {
	        add_meta_box(
	            'policy_box_number',            // Unique ID
	            'Number',      						// Box title
	            'policy_inner_custom_box',  	// Content callback
	             $screen                      		// post type
	        );
	    }
	}

	/* Prints the box content */
	function policy_number_custom_box( $post ) {
	?>
	   <label for="policy_number"> Number </label>
	    <input name="policy_number" id="policy_number" class="postbox" />
	<?php
	}

	add_action( 'save_post', 'policy_save_postdata' );
	function policy_save_postdata( $post_id ) {
	    if ( array_key_exists('myplugin_field', $_POST ) ) {
	        update_post_meta( $post_id,
	           '_my_meta_value_key',
	            $_POST['myplugin_field']
	        );
	    }
	}
}