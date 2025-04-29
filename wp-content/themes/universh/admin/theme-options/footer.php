<?php
function universh_footer_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
	  array(
        'id'          => 'footer_widget_area',
        'label'       => esc_html__( 'Footer widget area', 'universh' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'footer_option_style',
        'label'       => esc_html__( 'Footer Style', 'universh' ),
        'desc'        => esc_html__( 'style of footer widget', 'universh' ),
        'std'         => 'footer-1',
        'type'        => 'select',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'footer-1',
            'label'       => esc_html__( 'Style 1', 'universh' ),
          ),
		  array(
            'value'       => 'footer-2',
            'label'       => esc_html__( 'Style 2', 'universh' ),
          ),
		  array(
            'value'       => 'footer-3',
            'label'       => esc_html__( 'Style 3', 'universh' ),
          ),
		  array(
            'value'       => 'footer-4',
            'label'       => esc_html__( 'Style 4', 'universh' ),
          ),
          array(
            'value'       => 'footer-5',
            'label'       => esc_html__( 'Style 5', 'universh' ),
          ),
		  array(
            'value'       => 'footer-6',
            'label'       => esc_html__( 'Style 6', 'universh' ),
          ),
		  array(
            'value'       => 'footer-7',
            'label'       => esc_html__( 'Style 7', 'universh' ),
          ),
        )
      ),
	  array(
        'id'          => 'footer_widget_top_background',
        'label'       => esc_html__( 'Footer Widget top background', 'universh' ),
        'desc'        => esc_html__( 'Background only for footer style 7', 'universh' ),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'footer_option_style:is(footer-7)',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => 'footer .row-sep.cloud'
                    )
            )
      ),
	  array(
        'id'          => 'footer_widget_top_parallax_background',
        'label'       => esc_html__( 'Footer Parallax Background', 'universh' ),
        'desc'        => esc_html__( 'Footer Parallax Background for style 5', 'universh' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'footer_option_style:is(footer-5)',
        'operator'    => 'and',
        'action'   => array()
      ),
      array(
        'id'          => 'footer_widget_box',
        'label'       => esc_html__( 'Footer widget box', 'universh' ),
        'desc'        => '',
        'std'         => '4',
        'type'        => 'numeric-slider',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '1,4,1',
        'class'       => '',
        'condition'   => 'footer_widget_area:not(off)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'footer_widget_background',
        'label'       => esc_html__( 'Footer Widget background', 'universh' ),
        'desc'        => esc_html__( 'Background can be image or color', 'universh' ),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'footer_widget_area:not(off)',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => 'footer .main-footer'
                    )
            )
      ),
      array(
        'id'          => 'copyright_text',
        'label'       => esc_html__( 'Copyright Text', 'universh' ),
        'desc'        => '',
        'std'         => '&copy; Copyright. All Rights Reserved. | By <a href="#">WoodTheme</a>',
        'type'        => 'textarea',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'footer_copyright_background',
        'label'       => esc_html__( 'Footer Copyright background', 'universh' ),
        'desc'        => esc_html__( 'Background can be image or color', 'universh' ),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => 'footer .footer-copyright'
                    )
            )
      ),
      array(
        'id'          => 'footer_scripts',
        'label'       => esc_html__( 'Footer scripts', 'universh' ),
        'desc'        => esc_html__( 'Custom script add footer part', 'universh' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_options',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'universh_footer_options', $options );
	
	endif;
}  
?>