<?php
function universh_woocommerce_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
        array(
            'id'          => 'product_column',
            'label'       => esc_html__( 'Product column', 'universh' ),
            'desc'        => '',
            'std'         => '3',
            'type'        => 'numeric-slider',
            'section'     => 'woocommerce_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '1,4,1',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
		array(
            'id'          => 'related_product',
            'label'       => esc_html__( 'Related product show in single product', 'universh' ),
            'desc'        => '',
            'std'         => '3',
            'type'        => 'numeric-slider',
            'section'     => 'woocommerce_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '1,9,1',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
		array(
            'id'          => 'related_product_column',
            'label'       => esc_html__( 'Related Product column', 'universh' ),
            'desc'        => '',
            'std'         => '3',
            'type'        => 'numeric-slider',
            'section'     => 'woocommerce_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '1,4,1',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          
        ),
	  array(
        'id'          => 'shop_title',
        'label'       => esc_html__( 'Shop Title', 'universh' ),
        'desc'        => esc_html__( 'Shop page title', 'universh' ),
        'std'         => 'Shop',
        'type'        => 'text',
        'section'     => 'woocommerce_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'shop_subtitle',
        'label'       => esc_html__( 'Shop Sub Title', 'universh' ),
        'desc'        => esc_html__( 'Shop page sub title', 'universh' ),
        'std'         => 'All you want know',
        'type'        => 'text',
        'section'     => 'woocommerce_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'shop_layout',
        'label'       => esc_html__( 'Shop Layout', 'universh' ),
        'desc'        => esc_html__( 'Shop Layout', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'woocommerce_options',
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
            'label'       => esc_html__( 'Full width', 'universh' ),
            'src'         => OT_URL . '/assets/images/layout/full-width.png'
          ),
          array(
            'value'       => 'ls',
            'label'       => esc_html__( 'Left sidebar', 'universh' ),
            'src'         => OT_URL . '/assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'rs',
            'label'       => esc_html__( 'Right sidebar', 'universh' ),
            'src'         => OT_URL . '/assets/images/layout/right-sidebar.png'
          )
        )
      ),
      array(
        'id'          => 'shop_sidebar',
        'label'       => esc_html__( 'Shop Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Select your shop sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'woocommerce_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'shop_layout:not(full)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'single_shop_layout',
        'label'       => esc_html__( 'Single Product Layout', 'universh' ),
        'desc'        => esc_html__( 'Single product layout', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'woocommerce_options',
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
            'label'       => esc_html__( 'Full width', 'universh' ),
            'src'         => OT_URL . '/assets/images/layout/full-width.png'
          ),
          array(
            'value'       => 'ls',
            'label'       => esc_html__( 'Left sidebar', 'universh' ),
            'src'         => OT_URL . '/assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'rs',
            'label'       => esc_html__( 'Right sidebar', 'universh' ),
            'src'         => OT_URL . '/assets/images/layout/right-sidebar.png'
          )
        )
      ),
      array(
        'id'          => 'single_product_sidebar',
        'label'       => esc_html__( 'Single Product Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Select your single product sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'woocommerce_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'single_shop_layout:not(full)',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'universh_woocommerce_options', $options );
	
	endif;
}  
?>