<?php
function universh_background_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
		array(
        'id'          => 'background_option_style',
        'label'       => esc_html__( 'Background Layout Style', 'universh' ),
        'desc'        => esc_html__( 'style of background style', 'universh' ),
        'std'         => 'default',
        'type'        => 'select',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'default',
            'label'       => esc_html__( 'Default', 'universh' ),
          ),
		  array(
            'value'       => 'boxed',
            'label'       => esc_html__( 'Boxed', 'universh' ),
          ),
		  array(
            'value'       => 'wide',
            'label'       => esc_html__( 'Wide', 'universh' ),
          ),
        )
      ),
	  array(
        'id'          => 'boxed_background_image',
        'label'       => esc_html__( 'Boxed Background Image', 'universh' ),
        'desc'        => esc_html__( 'Boxed Background Image', 'universh' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'background_option_style:is(boxed)',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => 'body.boxed',
					'property' => 'background'
                    )
            )
      ),
		array(
        'id'          => 'container_width',
        'label'       => esc_html__( 'Container width', 'universh' ),
        'desc'        => esc_html__( 'Main container width', 'universh' ),
        'std'         => array(1170, 'px'),
        'type'        => 'measurement',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      =>array(
                array(
                    'selector' => '.container',
                    'property' => 'max-width'
                    )
            )
      ),
      array(
        'id'          => 'body_background',
        'label'       => esc_html__( 'Body background', 'universh' ),
        'desc'        => esc_html__( 'Background can be image or color', 'universh' ),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => 'body'
                    )
            )
      ),
      array(
        'id'          => 'main_container_background',
        'label'       => esc_html__( 'Main container background', 'universh' ),
        'desc'        => esc_html__( 'Background can be image or color', 'universh' ),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.container'
                    )
            )
      ),
    array(
        'id'          => 'sidebar_background',
        'label'       => esc_html__( 'Sidebar background', 'universh' ),
        'desc'        => esc_html__( 'Sidebar Background', 'universh' ),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.sidebar'
                    )
            )
      ),     
    );

	return apply_filters( 'universh_background_options', $options );
	
	endif;
}  
?>