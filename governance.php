<?php
/*
Plugin Name: WRDSB Governance Files
Plugin URI:
Description: Procedures, Policies, Protocols, Guidelines, Forms Management and Meta Data
Version: 0.0.1
Author: Suzanne Carter
Author URI: http://www.wrdsb.ca/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wrdsb
Domain Path:
*/

require_once dirname( __FILE__ ) . "/related/doc_owner.php";
require_once dirname( __FILE__ ) . "/related/doc_status.php";
require_once dirname( __FILE__ ) . "/related/doc_workflow.php";
require_once dirname( __FILE__ ) . "/related/responsibility.php";
require_once dirname( __FILE__ ) . "/related/policy_tags.php";
require_once dirname( __FILE__ ) . "/related/procedure_tags.php";
require_once dirname( __FILE__ ) . "/related/form_tags.php";
require_once dirname( __FILE__ ) . "/related/guideline_tags.php";
require_once dirname( __FILE__ ) . "/related/protocol_tags.php";
require_once dirname( __FILE__ ) . "/related/related_references.php";
require_once dirname( __FILE__ ) . "/related/legal_references.php";

if ( ! function_exists('wrdsb_governance') ) {

	// Register Custom Post Type
	function wrdsb_governance() {

		$labels = array(
			'name'                  => _x( 'Governance', 'Post Type General Name', 'wrdsb_governance' ),
			'singular_name'         => _x( 'Governance', 'Post Type Singular Name', 'wrdsb_governance' ),
			'menu_name'             => __( 'Governance', 'wrdsb_governance' ),
			'name_admin_bar'        => __( 'Governance', 'wrdsb_governance' ),
			'archives'              => __( 'Governance Archives', 'wrdsb_governance' ),
			'parent_item_colon'     => __( 'Parent Governance:', 'wrdsb_governance' ),
			'all_items'             => __( 'All Documents', 'wrdsb_governance' ),
			'add_new_item'          => __( 'Add a New Governance Document', 'wrdsb_governance' ),
			'add_new'               => __( 'Add New Document', 'wrdsb_governance' ),
			'new_item'              => __( 'New Governance Doc', 'wrdsb_governance' ),
			'edit_item'             => __( 'Edit Governance Doc', 'wrdsb_governance' ),
			'update_item'           => __( 'Update Governance', 'wrdsb_governance' ),
			'view_item'             => __( 'View Governance Doc', 'wrdsb_governance' ),
			'search_items'          => __( 'Search Governance Documents', 'wrdsb_governance' ),
			'not_found'             => __( 'Not found', 'wrdsb_governance' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wrdsb_governance' ),
			'featured_image'        => __( 'Featured Image', 'wrdsb_governance' ),
			'set_featured_image'    => __( 'Set featured image', 'wrdsb_governance' ),
			'remove_featured_image' => __( 'Remove featured image', 'wrdsb_governance' ),
			'use_featured_image'    => __( 'Use as featured image', 'wrdsb_governance' ),
			'insert_into_item'      => __( 'Insert into governance document', 'wrdsb_governance' ),
			'uploaded_to_this_item' => __( 'Uploaded to this governance document', 'wrdsb_governance' ),
			'items_list'            => __( 'Governance list', 'wrdsb_governance' ),
			'items_list_navigation' => __( 'Governance list navigation', 'wrdsb_governance' ),
			'filter_items_list'     => __( 'Filter governance list', 'wrdsb_governance' ),
		);
		$rewrite = array(
			'slug'                  => 'post_type',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Governance', 'wrdsb' ),
			'description'           => __( 'Governance', 'wrdsb' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions' ),
			'taxonomies'            => array( 'wrdsb_doc_status_tags', 'wrdsb_doc_owner_tags', 'wrdsb_doc_workflow_tags','wrdsb_policy_tags', 'wrdsb_procedure_tags', 'wrdsb_form_tags', 'wrdsb_guideline_tags', 'wrdsb_protocol_tags', 'wrdsb_related_references', 'wrdsb_legal_references',  'wrdsb_responsibility_tags'),
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
		register_post_type( 'wrdsb_governance', $args );

	}

	add_action( 'init', 'wrdsb_governance', 0 );

	/* Adds a meta box to the post edit screen */
	add_action( 'add_meta_boxes', 'governance_meta_info' );
	function governance_meta_info( $post ) {
	//    $screens = array( 'post', 'my_cpt' );
	//    foreach ( $screens as $screen ) {
	        add_meta_box(
	            'governance_meta_details',         	// Unique ID
	            'Document Details',      			// Box title
	            'governance_meta_details',  		// Content callback
	            'wrdsb_governance',                 // post type
	            'normal',							// UI position (side is alternative)
	            'high'								// high, low, default location compared to other meta boxes
	        );
	}

	/* All Meta Boxees */

	/* Number */
	function governance_meta_details() {
    	global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="govmeta_noncenumber" id="govmeta_noncenumber" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    // Get the data if its already been entered
    $number = get_post_meta($post->ID, '_number', true);
   	$type = get_post_meta($post->ID, '_type', true);
    $effective_date = get_post_meta($post->ID, '_effective_date', true);
    $reviewed_date = get_post_meta($post->ID, '_reviewed_date', true);
    $revised_date = get_post_meta($post->ID, '_revised_date', true);
    $removed_date = get_post_meta($post->ID, '_removed_date', true);
    // Echo out the fields
	?>
   		<div style="float: left; width: 50%;">
		   	<label for="governance_number">Number</label><br />
		    <input type="text" name="_number" id="governance_number" value="<?php echo $number; ?>" class="postbox" />
	    	<h2>Document Type</h2>
		    <input type="radio" name="_type" id="governance_type_policy"> <label for="governance_type_policy">Policy</label><br />
		    <input type="radio" name="_type" id="governance_type_procedure"> <label for="governance_type_procedure">Procedure</label><br />
		    <input type="radio" name="_type" id="governance_type_form"> <label for="governance_type_form">Form</label><br />
		    <input type="radio" name="_type" id="governance_type_guideline"> <label for="governance_type_guideline">Guideline</label><br />
		    <input type="radio" name="_type" id="governance_type_protocol"> <label for="governance_type_protocol">Protocol</label>
		</div>
	   	
	   	<div style="float: left; width: 50%;">
		   	<h2>Dates</h2>
		   	<label for="governance_effective_date">Effective Date</label><br />
		    <input type="text" name="_effective_date" id="governance_effective_date" value="<?php echo $effective_date; ?>" class="postbox" /><br />
		   	<label for="governance_reviewed_date">Last Reviewed</label><br />
		    <input type="text" name="_reviewed_date" id="governance_reviewed_date" value="<?php echo $reviewed_date; ?>" class="postbox" /><br />
		   	<label for="governance_revised_date">Last Revised</label><br />
		    <input type="text" name="_revised_date" id="governance_revised_date" value="<?php echo $revised_date; ?>" class="postbox" /><br />
		   	<label for="governance_removed_date">Date Removed</label><br />
		    <input type="text" name="_removed_date" id="governance_removed_date" value="<?php echo $removed_date; ?>" class="postbox" />
	   	</div>

	   	<div style="clear: both;"></div>
	<?php
	}


	add_action( 'save_post', 'governance_save_postdata' );
	function governance_save_postdata( $post_id ) {
	    if ( array_key_exists('governance_meta', $_POST ) ) {
	        update_post_meta( $post_id,
	           '_governance_meta_details',
	            $_POST['governance_meta']
	        );
	    }
	}

	/* see syndication-categories for rest of code 
	function wrdsb_doc_status_tags_activation() {
		wrdsb_doc_status_custom_taxonomy();
		wp_insert_term('Locked','wrdsb_doc_status_tags',
			array(
				'description' => 'This document is only visible to employees of the WRDSB. It may not be published on any WRDSB public website.',
				'slug'        => 'locked',
			)
		);
		wp_insert_term('Public','wrdsb_doc_status_tags',
			array(
				'description' => 'This document may be displayed on WRDSB public websites.',
				'slug'        => 'public',
			)
		);
		wp_insert_term('Staff Only','wrdsb_doc_status_tags',
			array(
				'description' => 'This document may only be displayed to employees of the WRDSB, but shown to the public through the course of doing business.',
				'slug'        => 'staff-only',
			)
		);
		update_option('wrdsb_syndication_categories_version', WRDSB_SYNDICATION_CATEGORIES_VERSION);

	} */
}