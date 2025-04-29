<?php
function universh_blog_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
		array(
        'id'          => 'blog_layout_style',
        'label'       => esc_html__( 'Blog layout Style', 'universh' ),
        'desc'        => esc_html__( 'Blog layout style', 'universh' ),
        'std'         => 'style_1',
        'type'        => 'select',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'style_1',
            'label'       => esc_html__( 'Style 1', 'universh' ),
          ),
          array(
            'value'       => 'style_2',
            'label'       => esc_html__( 'Style 2', 'universh' ),
          )
        )
      ),
		array(
        'id'          => 'blog_title',
        'label'       => esc_html__( 'Blog Header Title', 'universh' ),
        'desc'        => esc_html__( 'Blog page header title', 'universh' ),
        'std'         => 'Universh Blog',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'blog_subtitle',
        'label'       => esc_html__( 'Blog Header Sub-Title', 'universh' ),
        'desc'        => esc_html__( 'Blog page header sub-title', 'universh' ),
        'std'         => 'All you want know',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		array(
        'id'          => 'blog_layout',
        'label'       => esc_html__( 'Blog layout', 'universh' ),
        'desc'        => esc_html__( 'Blog layout for blog page', 'universh' ),
        'std'         => 'rs',
        'type'        => 'radio-image',
        'section'     => 'blog_options',
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
        'id'          => 'blog_sidebar',
        'label'       => esc_html__( 'Blog Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Select your blog sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'blog_layout:not(full)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_layout',
        'label'       => esc_html__( 'Blog single post layout', 'universh' ),
        'desc'        => esc_html__( 'Blog single post layout', 'universh' ),
        'std'         => 'rs',
        'type'        => 'radio-image',
        'section'     => 'blog_options',
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
        'id'          => 'blog_single_sidebar',
        'label'       => esc_html__( 'Single post Sidebar', 'universh' ),
        'desc'        => esc_html__( 'Single post sidebar', 'universh' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'single_layout:not(full)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sticky_post_text',
        'label'       => esc_html__( 'Sticky post text', 'universh' ),
        'desc'        => esc_html__( 'Sticky post text', 'universh' ),
        'std'         => 'Featured',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'excerpt_length',
        'label'       => esc_html__( 'Excerpt Length', 'universh' ),
        'desc'        => esc_html__( 'Excerpt Length', 'universh' ),
        'std'         => '20',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'show_related_post',
        'label'       => esc_html__( 'Display Related Posts', 'universh' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'total_related_post_show',
        'label'       => esc_html__( 'Number of Related Post', 'universh' ),
        'desc'        => '',
        'std'         => '3',
        'type'        => 'numeric-slider',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '1,4,1',
        'class'       => '',
        'condition'   => 'show_related_post:not(off)',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'universh_blog_options', $options );
	
	endif;
}  
?>