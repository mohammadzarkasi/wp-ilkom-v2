<?php
function universh_sidebar_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
		array(
        'id'          => 'create_sidebar',
        'label'       => esc_html__( 'Create Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Click add new to add new sidebar, after adding click save changes', 'universh' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'sidebar_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array(           
          array(
            'id'          => 'desc',
            'label'       => esc_html__( 'Description', 'universh' ),
            'desc'        => esc_html__( '(optional)', 'universh' ),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
    );

	return apply_filters( 'universh_sidebar_options', $options );
	
	endif;
}   
?>