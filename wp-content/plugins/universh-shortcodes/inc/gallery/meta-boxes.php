<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'gallery_meta_boxes' );

function gallery_meta_boxes(){
  global $wpdb, $post;
  if( function_exists( 'ot_get_option' ) ):
  $my_meta_boxx = array(
    'id'        => 'gallery_meta_box',
    'title'     => __('Gallery Images', 'universh'),
    'desc'      => '',
    'pages'     => array( 'gallery' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	array(
        'id'          => 'gallery_images',
        'label'       => __( 'Gallery Images', 'universh' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'gallery',
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
  
  ot_register_meta_box( $my_meta_boxx );
  endif;  //if( function_exists( 'ot_get_option' ) ):
}
?>