<?php
function universh_custom_css( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
		array(
        'id'          => 'custom_css',
        'label'       => esc_html__( 'Custom CSS', 'universh' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'custom_css',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    );

	return apply_filters( 'universh_custom_css', $options );
	
	endif;
}   
?>