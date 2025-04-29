<?php
function universh_news_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
		array(
        'id'          => 'news_title',
        'label'       => esc_html__( 'News Header Title', 'universh' ),
        'desc'        => esc_html__( 'News page header title', 'universh' ),
        'std'         => 'Universh News',
        'type'        => 'text',
        'section'     => 'news_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'news_sub_title',
        'label'       => esc_html__( 'News Header Sub-Title', 'universh' ),
        'desc'        => esc_html__( 'News page header sub-title', 'universh' ),
        'std'         => 'All you want know',
        'type'        => 'text',
        'section'     => 'news_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		array(
        'id'          => 'news_layout',
        'label'       => esc_html__( 'News layout', 'universh' ),
        'desc'        => esc_html__( 'News layout for news page', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'news_options',
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
        'id'          => 'news_sidebar',
        'label'       => esc_html__( 'News Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Select your news sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'news_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'news_layout:not(full)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_news_layout',
        'label'       => esc_html__( 'News single layout', 'universh' ),
        'desc'        => esc_html__( 'News single layout', 'universh' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'news_options',
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
        'id'          => 'news_single_sidebar',
        'label'       => esc_html__( 'Single News Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Single News sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'news_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'single_news_layout:not(full)',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'universh_news_options', $options );
	
	endif;
}  
?>