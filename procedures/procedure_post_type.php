<?php

if ( ! function_exists('procedures') ) {

	// Register Custom Post Type
	function wrdsb_procedures() {

		$labels = array(
			'name'                  => _x( 'Procedure', 'Post Type General Name', 'wrdsb_procedures' ),
			'singular_name'         => _x( 'Procedure', 'Post Type Singular Name', 'wrdsb_procedures' ),
			'menu_name'             => __( 'Procedures', 'wrdsb_procedures' ),
			'name_admin_bar'        => __( 'Procedure', 'wrdsb_procedures' ),
			'archives'              => __( 'Procedure Archives', 'wrdsb_procedures' ),
			'parent_item_colon'     => __( 'Parent Procedure:', 'wrdsb_procedures' ),
			'all_items'             => __( 'All Procedures', 'wrdsb_procedures' ),
			'add_new_item'          => __( 'Add New Procedure', 'wrdsb_procedures' ),
			'add_new'               => __( 'Add New', 'wrdsb_procedures' ),
			'new_item'              => __( 'New Procedure', 'wrdsb_procedures' ),
			'edit_item'             => __( 'Edit Procedure', 'wrdsb_procedures' ),
			'update_item'           => __( 'Update Procedure', 'wrdsb_procedures' ),
			'view_item'             => __( 'View Procedure', 'wrdsb_procedures' ),
			'search_items'          => __( 'Search Procedure', 'wrdsb_procedures' ),
			'not_found'             => __( 'Not found', 'wrdsb_procedures' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wrdsb_procedures' ),
			'featured_image'        => __( 'Featured Image', 'wrdsb_procedures' ),
			'set_featured_image'    => __( 'Set featured image', 'wrdsb_procedures' ),
			'remove_featured_image' => __( 'Remove featured image', 'wrdsb_procedures' ),
			'use_featured_image'    => __( 'Use as featured image', 'wrdsb_procedures' ),
			'insert_into_item'      => __( 'Insert into procedure', 'wrdsb_procedures' ),
			'uploaded_to_this_item' => __( 'Uploaded to this procedure', 'wrdsb_procedures' ),
			'items_list'            => __( 'Procedures list', 'wrdsb_procedures' ),
			'items_list_navigation' => __( 'Procedures list navigation', 'wrdsb_procedures' ),
			'filter_items_list'     => __( 'Filter procedures list', 'wrdsb_procedures' ),
		);
		$rewrite = array(
			'slug'                  => 'post_type',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Procedures', 'wrdsb' ),
			'description'           => __( 'Procedures', 'wrdsb' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions' ),
			'taxonomies'            => array( 'wrdsb_procedure_categories', 'wrdsb_procedure_tags', 'wrdsb_policy_categories' ),
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
		register_post_type( 'wrdsb_procedures', $args );

	}

	add_action( 'init', 'wrdsb_procedures', 0 );

	/* Adds a meta box to the post edit screen */
	add_action( 'add_meta_boxes', 'procedures_add_custom_box' );
	function procedures_add_custom_box( $post ) {
	    $screens = array( 'post', 'my_cpt' );
	    foreach ( $screens as $screen ) {
	        add_meta_box(
	            'procedures_box_number',            // Unique ID
	            'Number',      						// Box title
	            'procedures_inner_custom_box',  	// Content callback
	             $screen                      		// post type
	        );
	    }
	}

	/* Prints the box content */
	function procedures_number_custom_box( $post ) {
	?>
	   <label for="procedures_number"> Number </label>
	    <input name="procedures_number" id="procedures_number" class="postbox" />
	<?php
	}

	add_action( 'save_post', 'procedures_save_postdata' );
	function procedures_save_postdata( $post_id ) {
	    if ( array_key_exists('myplugin_field', $_POST ) ) {
	        update_post_meta( $post_id,
	           '_my_meta_value_key',
	            $_POST['myplugin_field']
	        );
	    }
	}
}