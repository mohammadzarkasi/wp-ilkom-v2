<?php
function universh_gallery_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
		array(
        'id'          => 'gallery_title',
        'label'       => esc_html__( 'Gallery Header Title', 'universh' ),
        'desc'        => esc_html__( 'Gallery page header title', 'universh' ),
        'std'         => 'Universh gallery',
        'type'        => 'text',
        'section'     => 'gallery_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'gallery_sub_title',
        'label'       => esc_html__( 'Gallery Header Sub-Title', 'universh' ),
        'desc'        => esc_html__( 'Gallery page header sub-title', 'universh' ),
        'std'         => 'All you want know',
        'type'        => 'text',
        'section'     => 'gallery_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		array(
        'id'          => 'gallery_layout',
        'label'       => esc_html__( 'Gallery layout', 'universh' ),
        'desc'        => esc_html__( 'Gallery layout for gallery page', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'gallery_options',
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
        'id'          => 'gallery_sidebar',
        'label'       => esc_html__( 'Gallery Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Select your gallery sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'gallery_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'gallery_layout:not(full)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_gallery_layout',
        'label'       => esc_html__( 'Gallery single layout', 'universh' ),
        'desc'        => esc_html__( 'Gallery single layout', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'gallery_options',
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
        'id'          => 'gallery_single_sidebar',
        'label'       => esc_html__( 'Single Gallery Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Single gallery sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'gallery_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'single_gallery_layout:not(full)',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'universh_gallery_options', $options );
	
	endif;
}  
?>