<?php
/**
 * Custom Testimonials 
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_testimonials() {

// set up labels
	$labels = array(
 		'name' => 'testimonials',
    	'singular_name' => 'testimonial',
    	'add_new' => 'Add New testimonial',
    	'add_new_item' => 'Add New testimonial',
    	'edit_item' => 'Edit testimonial',
    	'new_item' => 'New testimonial',
    	'all_items' => 'All testimonials',
    	'view_item' => 'View testimonials',
    	'search_items' => 'Search testimonials',
    	'not_found' =>  'No testimonials Found',
    	'not_found_in_trash' => 'No testimonials found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Testimonials',
    );
    //register post type
	register_post_type( 'testimonials', array(
		'labels' => $labels,
        'menu_icon' => 'dashicons-format-quote',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt'),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'testimonials', 'with_front' => false ),
		)
	);

}

add_action( 'init', 'create_custom_post_type_testimonials' );