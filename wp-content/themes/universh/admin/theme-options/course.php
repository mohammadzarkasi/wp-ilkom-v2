<?php
function universh_course_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
		array(
        'id'          => 'course_title',
        'label'       => esc_html__( 'Course Header Title', 'universh' ),
        'desc'        => esc_html__( 'Course page header title', 'universh' ),
        'std'         => 'Universh Course',
        'type'        => 'text',
        'section'     => 'course_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'course_sub_title',
        'label'       => esc_html__( 'Course Header Sub-Title', 'universh' ),
        'desc'        => esc_html__( 'Course page header sub-title', 'universh' ),
        'std'         => 'All you want know',
        'type'        => 'text',
        'section'     => 'course_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		array(
        'id'          => 'course_layout',
        'label'       => esc_html__( 'Course layout', 'universh' ),
        'desc'        => esc_html__( 'Course layout for course page', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'course_options',
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
        'id'          => 'course_sidebar',
        'label'       => esc_html__( 'Course Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Select your Course sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'course_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'course_layout:not(full)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_course_layout',
        'label'       => esc_html__( 'Course single layout', 'universh' ),
        'desc'        => esc_html__( 'Course single layout', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'course_options',
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
        'id'          => 'course_single_sidebar',
        'label'       => esc_html__( 'Single Course Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Single course sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'course_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'single_course_layout:not(full)',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'universh_course_options', $options );
	
	endif;
}  
?>