<?php
function universh_general_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
	  array(
        'id'          => 'preloder',
        'label'       => esc_html__( 'Preloder Image', 'universh' ),
        'desc'        => esc_html__( 'Preloder Image', 'universh' ),
        'std'         => UNIVERSHTHEMEURI. 'images/preloader.gif',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'main_logo',
        'label'       => esc_html__( 'Header Logo', 'universh' ),
        'desc'        => esc_html__( 'Header logo', 'universh' ),
        'std'         => UNIVERSHTHEMEURI. 'images/logo.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'footer_logo',
        'label'       => esc_html__( 'Footer Logo', 'universh' ),
        'desc'        => esc_html__( 'Footer logo', 'universh' ),
        'std'         => UNIVERSHTHEMEURI. 'images/logo-footer.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'admin_logo',
        'label'       => esc_html__( 'Admin Logo', 'universh' ),
        'desc'        => esc_html__( 'Admin login logo', 'universh' ),
        'std'         => UNIVERSHTHEMEURI. 'images/logo.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
	);

	return apply_filters( 'universh_general_options', $options );
	
	endif;
}
?>