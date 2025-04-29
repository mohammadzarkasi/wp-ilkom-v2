<?php
// Register Style
function universh_admin_styles() {

	//wp_enqueue_style( 'wp-jquery-ui-dialog' );
	wp_register_style( 'universh-style', UNIVERSHTHEMEURI. 'admin/assets/css/style.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'universh-style' );
	
	wp_register_script( 'universh-scripts', UNIVERSHTHEMEURI. 'admin/assets/js/scripts.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'universh-scripts' );

}

// Hook into the 'admin_enqueue_scripts' action
add_action( 'admin_enqueue_scripts', 'universh_admin_styles' );