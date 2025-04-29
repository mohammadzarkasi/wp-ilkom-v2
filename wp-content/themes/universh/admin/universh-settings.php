<?php
/**
 * Initialize the meta boxes. 
 */

add_action( 'admin_init', 'universh_meta_boxes' );


function universh_meta_boxes() {
  if( function_exists( 'ot_get_option' ) ): 
  $my_meta_box = array(
    'id'        => 'universh_meta_box',
    'title'     => esc_html__('universh Page Settings', 'universh'),
    'desc'      => '',
    'pages'     => array( 'page' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(     
     array(
        'id'          => 'header_settings',
        'label'       => esc_html__('Header Settings', 'universh'),      
        'type'        => 'tab',
        'operator'    => 'and'
      ), 	
      array(
        'id'          => 'custom_title',
        'label'       => esc_html__('Custom Title', 'universh'),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'class'       => '',
        'choices'     => array(),
        'condition'	  => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'title',
        'label'       => esc_html__('Title', 'universh'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array(),
        'operator'    => 'and',
        'condition'	  => 'custom_title:is(on)'
      ),
      array(
        'id'          => 'subtitle',
        'label'       => esc_html__('Sub Title', 'universh'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'rows'		  => 3,
        'choices'     => array(),
        'operator'    => 'and',
        'condition'	  => 'custom_title:is(on)'
      ),
      array(
        'id'          => 'content_tab',
        'label'       => esc_html__('Layout Settings', 'universh'),      
        'type'        => 'tab',
        'operator'    => 'and'
      ), 
      array(
        'id'          => 'page_layout',
        'label'       => esc_html__( 'Default Layout', 'universh' ),
        'desc'        => '',
        'std'         => 'full',
        'type'        => 'radio-image',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'full',
            'label'       => esc_html__( 'Full Width', 'universh' ),
            'src'         => OT_URL . '/assets/images/layout/full-width.png'
          ),
          array(
            'value'       => 'ls',
            'label'       => esc_html__( 'With Left Sidebar', 'universh' ),
            'src'         => OT_URL . '/assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'rs',
            'label'       => esc_html__( 'With Right sidebar', 'universh' ),
            'src'         => OT_URL . '/assets/images/layout/right-sidebar.png'
          ),
        )
      ),
      array(
        'id'          => 'sidebar',
        'label'       => esc_html__('Select Sidebar', 'universh'),
        'desc'        => '',
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'class'       => '',
        'choices'     => array(),
        'operator'    => 'and',
        'condition'   => 'page_layout:not(full)'
      ),
	  
	  array(
        'id'          => 'layout_padding',
        'label'       => esc_html__( 'Layout Padding', 'universh' ),
        'desc'        => '',
        'std'         => 'page-default',
        'type'        => 'select',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'page-default',
            'label'       => esc_html__( 'With Padding', 'universh' ),
          ),
          array(
            'value'       => 'no-padding',
            'label'       => esc_html__( 'No Padding', 'universh' ),
          ),
        )
      ),
    )
  );
  
  ot_register_meta_box( $my_meta_box );
  endif;  //if( function_exists( 'ot_get_option' ) ):
}