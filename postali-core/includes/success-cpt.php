<?php
/**
 * Custom success 
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_success() {

// set up labels
	$labels = array(
 		'name' => 'Success',
    	'singular_name' => 'Success',
    	'add_new' => 'Add New Success',
    	'add_new_item' => 'Add New Success',
    	'edit_item' => 'Edit Success',
    	'new_item' => 'New Success',
    	'all_items' => 'All successes',
    	'view_item' => 'View successes',
    	'search_items' => 'Search successes',
    	'not_found' =>  'No successes Found',
    	'not_found_in_trash' => 'No success found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Success',
    );
    //register post type
	register_post_type( 'success', array(
		'labels' => $labels,
        'menu_icon' => 'dashicons-format-quote',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt'),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'successes', 'with_front' => false ),
		)
	);

}

// Register Custom Taxonomy
function success_categories() {

	$labels = array(
		'name'                       => _x( 'Success Category', 'Success Category' ),
		'singular_name'              => _x( 'Success Category', 'Success Category' ),
		'menu_name'                  => __( 'Success Category' ),
		'all_items'                  => __( 'All Success Categories' ),
		'new_item_name'              => __( 'New Success Category' ),
		'add_new_item'               => __( 'Add Success Category' ),
		'edit_item'                  => __( 'Edit Success Category' ),
		'update_item'                => __( 'Update Success Category' ),
		'view_item'                  => __( 'View Success Category' ),
		'separate_items_with_commas' => __( 'Separate Success Categories with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Success Categories' ),
		'popular_items'              => __( 'Popular Success Categories' ),
		'search_items'               => __( 'Search Success Categories' ),
		'not_found'                  => __( 'Not Found' ),
		'no_terms'                   => __( 'No Success Categories' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
        'rewrite'      => array('slug' => 'successes/success_categories', 'with_front' => false)
	);
	register_taxonomy( 'success_categories', array( 'success' ), $args );

}
add_action( 'init', 'success_categories', 0 );
add_action( 'init', 'create_custom_post_type_success' );