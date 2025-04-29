<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'universh_onepage_meta_boxes' );

function universh_onepage_meta_boxes() {

  if( function_exists( 'ot_get_option' ) ): 

  $my_meta_box = array(
    'id'        => 'universh_onepage_meta_box',
    'title'     => esc_html__('Universh Onepage Template Settings', 'universh'),
    'desc'      => '',
    'pages'     => array( 'page' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(     
      array(
        'id'          => 'general_settings',
        'label'       => esc_html__('General Settings', 'universh'),    
        'type'        => 'tab',
        'operator'    => 'and'
      ),
	  array(
		'id'          => 'onepage_menu_select',
		'label'       => esc_html__( 'Select Menu', 'universh' ),
		'desc'        => '',
		'std'         => '',
		'type'        => 'select',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and',
		'choices'     => universh_menu_select(),
	  ),
    )
  );

  ot_register_meta_box( $my_meta_box );
  endif;  //endif for function function_exists
}
?>