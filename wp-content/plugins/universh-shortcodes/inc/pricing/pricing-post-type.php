<?php
if ( ! function_exists('universh_pricing_post_type') ) {

// Register Custom Post Type
function universh_pricing_post_type() {

	$labels = array(
		'name'                => _x( 'Pricing tables', 'Post Type General Name', 'universh' ),
		'singular_name'       => _x( 'Pricing table', 'Post Type Singular Name', 'universh' ),
		'menu_name'           => __( 'Pricing table', 'universh' ),
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
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes', 'thumbnail' ),
		'hierarchical'        => true,
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
		'capability_type'     => 'page',
	);
	register_post_type( 'pricing', $args );

}

// Hook into the 'init' action
add_action( 'init', 'universh_pricing_post_type', 0 );

}


include 'meta-boxes-pricing.php';

?>