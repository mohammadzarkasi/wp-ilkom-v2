<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'pricing_meta_boxes' );

function pricing_meta_boxes(){
  global $wpdb, $post;
  if( function_exists( 'ot_get_option' ) ):
  $my_meta_boxx_1 = array(
    'id'        => 'my_meta_box',
    'title'     => __('Package Information', 'universh'),
    'desc'      => '',
    'pages'     => array( 'pricing' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(  
      array(
        'id'          => 'feature_info',
        'label'       => __( 'Feature info', 'universh' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array(
          array(
            'id'          => 'feature_text',
            'label'       => __( 'Description', 'universh' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'textarea',
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
      array(
        'id'          => 'button_link',
        'label'       => __( 'Button link', 'universh' ),
        'desc'        => '',
        'std'         => '#',
        'type'        => 'text',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ), 
      array(
        'id'          => 'button_text',
        'label'       => __( 'Button text', 'universh' ),
        'desc'        => '',
        'std'         => 'Order Now',
        'type'        => 'text',
        'rows'        => '1',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
         
    )
  );
  
  ot_register_meta_box( $my_meta_boxx_1 );
  endif;  //if( function_exists( 'ot_get_option' ) ):
}
?>