<?php
/**
 * Custom FAQs 
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_faqs() {

// set up labels
	$labels = array(
 		'name' => 'FAQs',
    	'singular_name' => 'FAQ',
    	'add_new' => 'Add New FAQ',
    	'add_new_item' => 'Add New FAQ',
    	'edit_item' => 'Edit FAQ',
    	'new_item' => 'New FAQ',
    	'all_items' => 'All FAQs',
    	'view_item' => 'View FAQs',
    	'search_items' => 'Search FAQs',
    	'not_found' =>  'No FAQs Found',
    	'not_found_in_trash' => 'No FAQs found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'FAQs',
    );
    //register post type
	register_post_type( 'FAQs', array(
		'labels' => $labels,
        'menu_icon' => 'dashicons-format-quote',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt'),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'faqs', 'with_front' => false ),
		)
	);

}

// Register Custom Taxonomy
function faqs_category() {

	$labels = array(
		'name'                       => _x( 'FAQ Category', 'FAQ Category' ),
		'singular_name'              => _x( 'FAQ Category', 'FAQ Category' ),
		'menu_name'                  => __( 'FAQ Category' ),
		'all_items'                  => __( 'All FAQ Categories' ),
		'new_item_name'              => __( 'New FAQ Category' ),
		'add_new_item'               => __( 'Add FAQ Category' ),
		'edit_item'                  => __( 'Edit FAQ Category' ),
		'update_item'                => __( 'Update FAQ Category' ),
		'view_item'                  => __( 'View FAQ Category' ),
		'separate_items_with_commas' => __( 'Separate FAQ Categories with commas' ),
		'add_or_remove_items'        => __( 'Add or remove FAQ Categories' ),
		'popular_items'              => __( 'Popular FAQ Categories' ),
		'search_items'               => __( 'Search FAQ Categories' ),
		'not_found'                  => __( 'Not Found' ),
		'no_terms'                   => __( 'No FAQ Categories' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
        'rewrite'      => array('slug' => 'faq/faqs_category', 'with_front' => false)
	);
	register_taxonomy( 'faqs_category', array( 'faqs' ), $args );

}
add_action( 'init', 'faqs_category', 0 );
add_action( 'init', 'create_custom_post_type_faqs' );