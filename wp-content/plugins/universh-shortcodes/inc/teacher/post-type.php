<?php
if ( ! function_exists('universh_teachers_post_type') ) {

// Register Custom Post Type
function universh_teachers_post_type() {

	$labels = array(
		'name'                => _x( 'teachers', 'Post Type General Name', 'universh' ),
		'singular_name'       => _x( 'teachers', 'Post Type Singular Name', 'universh' ),
		'menu_name'           => __( 'teachers', 'universh' ),
		'parent_item_colon'   => __( 'Parent Item:', 'universh' ),
		'all_items'           => __( 'All Items', 'universh' ),
		'view_item'           => __( 'View Item', 'universh' ),
		'add_new_item'        => __( 'Add New Item', 'universh' ),
		'add_new'             => __( 'Add New', 'universh' ),
		'edit_item'           => __( 'Edit Item', 'universh' ),
		'update_item'         => __( 'Update Item', 'universh' ),
		'search_items'        => __( 'Search Item', 'universh' ),
		'not_found'           => __( 'Not found', 'universh' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'universh' ),
	);
	
	$rewrite = array(
		'slug'                => 'teachers',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'author', 'comments'),
		'taxonomies'          => array( 'teachers_category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'teachers',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	
	register_post_type( 'teachers', $args );

}

// Hook into the 'init' action
add_action( 'init', 'universh_teachers_post_type', 0 );

}

if ( ! function_exists( 'universh_teachers_category_taxonomy' ) ) {

// Register Custom Taxonomy
function universh_teachers_category_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'universh'),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'universh'),
		'menu_name'                  => __( 'Category', 'universh'),
		'all_items'                  => __( 'All Items', 'universh'),
		'parent_item'                => __( 'Parent Item', 'universh'),
		'parent_item_colon'          => __( 'Parent Item:', 'universh'),
		'new_item_name'              => __( 'New Item Name', 'universh'),
		'add_new_item'               => __( 'Add New Item', 'universh'),
		'edit_item'                  => __( 'Edit Item', 'universh'),
		'update_item'                => __( 'Update Item', 'universh'),
		'separate_items_with_commas' => __( 'Separate items with commas', 'universh'),
		'search_items'               => __( 'Search Items', 'universh'),
		'add_or_remove_items'        => __( 'Add or remove items', 'universh'),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'universh'),
		'not_found'                  => __( 'Not Found', 'universh'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'teachers_category', array( 'teachers' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'universh_teachers_category_taxonomy', 0 );

}

include 'meta-boxes.php';

?>