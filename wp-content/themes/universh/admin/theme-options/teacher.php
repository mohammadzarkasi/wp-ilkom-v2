<?php
function universh_teacher_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
		array(
        'id'          => 'teacher_title',
        'label'       => esc_html__( 'Teacher Header Title', 'universh' ),
        'desc'        => esc_html__( 'Teacher page header title', 'universh' ),
        'std'         => 'Universh teacher',
        'type'        => 'text',
        'section'     => 'teacher_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'teacher_sub_title',
        'label'       => esc_html__( 'Teacher Header Sub-Title', 'universh' ),
        'desc'        => esc_html__( 'Teacher page header sub-title', 'universh' ),
        'std'         => 'All you want know',
        'type'        => 'text',
        'section'     => 'teacher_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		array(
        'id'          => 'teacher_layout',
        'label'       => esc_html__( 'Teacher layout', 'universh' ),
        'desc'        => esc_html__( 'Teacher layout for teacher page', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'teacher_options',
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
        'id'          => 'teacher_sidebar',
        'label'       => esc_html__( 'Teacher Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Select your teacher sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'teacher_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'teacher_layout:not(full)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_teacher_layout',
        'label'       => esc_html__( 'Teacher single layout', 'universh' ),
        'desc'        => esc_html__( 'Teacher single layout', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'teacher_options',
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
        'id'          => 'teacher_single_sidebar',
        'label'       => esc_html__( 'Single teacher Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Single teacher sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'teacher_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'single_teacher_layout:not(full)',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'universh_teacher_options', $options );
	
	endif;
}  
?>