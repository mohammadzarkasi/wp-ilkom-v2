<?php
class universh_sweet_custom_menu {
	// Initializes the plugin by setting localization, filters, and administration functions
	function __construct() {
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'universh_scm_add_custom_nav_fields' ) );
		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'universh_scm_update_custom_nav_fields'), 10, 3 );
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'universh_scm_edit_walker'), 10, 2 );
	}
	
	// Add custom fields to $item nav object in order to be used in custom Walker
	function universh_scm_add_custom_nav_fields( $menu_item ) {
		$menu_item->submenu_type = get_post_meta( $menu_item->ID, '_menu_item_submenu_type', true );
		$menu_item->columns = get_post_meta( $menu_item->ID, '_menu_item_columns', true );
		$menu_item->style = get_post_meta( $menu_item->ID, '_menu_item_style', true );
		$menu_item->caption = get_post_meta( $menu_item->ID, '_menu_item_caption', true );
		$menu_item->captionstyle = get_post_meta( $menu_item->ID, '_menu_item_captionstyle', true );
		
		return $menu_item;
	}
	
	// Save menu custom fields
	function universh_scm_update_custom_nav_fields( $menu_id, $menu_item_db_id, $menu_item_data = array() ) {
		
		if ( ! empty( $menu_item_db_id ) && isset( $_REQUEST['menu-item-submenu_type']) && is_array( $_REQUEST['menu-item-submenu_type']) ) {
			$submenu_type_value = isset($_REQUEST['menu-item-submenu_type'][$menu_item_db_id])? $_REQUEST['menu-item-submenu_type'][$menu_item_db_id] : 0;
	        //$submenu_type_value = $_REQUEST['menu-item-submenu_type'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_submenu_type', $submenu_type_value );
	    }
		
		if ( ! empty( $menu_item_db_id ) && isset( $_REQUEST['menu-item-columns']) && is_array( $_REQUEST['menu-item-columns']) ) {
			$columns_value = isset($_REQUEST['menu-item-columns'][$menu_item_db_id])? $_REQUEST['menu-item-columns'][$menu_item_db_id] : 1;
	        //$columns_value = $_REQUEST['menu-item-columns'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_columns', $columns_value );
	    }
		
		if ( ! empty( $menu_item_db_id ) && isset( $_REQUEST['menu-item-style']) && is_array( $_REQUEST['menu-item-style']) ) {
	        $style_value = isset($_REQUEST['menu-item-style'][$menu_item_db_id])? $_REQUEST['menu-item-style'][$menu_item_db_id] : '';
			//$style_value = $_REQUEST['menu-item-style'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_style', $style_value );
	    }
		
		if ( ! empty( $menu_item_db_id ) && isset( $_REQUEST['menu-item-caption']) && is_array( $_REQUEST['menu-item-caption']) ) {
	        $caption_value = isset($_REQUEST['menu-item-caption'][$menu_item_db_id])? $_REQUEST['menu-item-caption'][$menu_item_db_id] : '';
			//$style_value = $_REQUEST['menu-item-style'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_caption', $caption_value );
	    }
		
		if ( ! empty( $menu_item_db_id ) && isset( $_REQUEST['menu-item-captionstyle']) && is_array( $_REQUEST['menu-item-captionstyle']) ) {
	        $captionstyle_value = isset($_REQUEST['menu-item-captionstyle'][$menu_item_db_id])? $_REQUEST['menu-item-captionstyle'][$menu_item_db_id] : '';
			//$style_value = $_REQUEST['menu-item-style'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_captionstyle', $captionstyle_value );
	    }
	}
	
	// Define new Walker edit
	function universh_scm_edit_walker($walker,$menu_id) {
		return 'Walker_Nav_Menu_Edit_Custom';
	}
}

// instantiate plugin's class
$GLOBALS['sweet_custom_menu'] = new universh_sweet_custom_menu();

require UNIVERSHTHEMEDIR . '/include/custom-menu/edit_custom_walker.php';
require UNIVERSHTHEMEDIR . '/include/custom-menu/custom_walker.php';