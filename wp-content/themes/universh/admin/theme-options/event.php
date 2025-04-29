<?php
function universh_event_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
		array(
        'id'          => 'event_title',
        'label'       => esc_html__( 'Event Header Title', 'universh' ),
        'desc'        => esc_html__( 'Event page header title', 'universh' ),
        'std'         => 'Universh event',
        'type'        => 'text',
        'section'     => 'event_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'event_sub_title',
        'label'       => esc_html__( 'Event Header Sub-Title', 'universh' ),
        'desc'        => esc_html__( 'Event page header sub-title', 'universh' ),
        'std'         => 'All you want know',
        'type'        => 'text',
        'section'     => 'event_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		array(
        'id'          => 'event_layout',
        'label'       => esc_html__( 'Event layout', 'universh' ),
        'desc'        => esc_html__( 'Event layout for event page', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'event_options',
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
        'id'          => 'event_sidebar',
        'label'       => esc_html__( 'Event Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Select your event sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'event_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'event_layout:not(full)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_event_layout',
        'label'       => esc_html__( 'Event single layout', 'universh' ),
        'desc'        => esc_html__( 'event single layout', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'event_options',
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
        'id'          => 'event_single_sidebar',
        'label'       => esc_html__( 'Single Event Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Single Event sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'event_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'single_event_layout:not(full)',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'universh_event_options', $options );
	
	endif;
}  
?>