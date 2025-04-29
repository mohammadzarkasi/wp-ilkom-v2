<?php
function universh_header_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$choice= array( 
          array(
            'value'       => 'facebook',
            'label'       => esc_html__( 'Facebook', 'universh' ),
            'src'         => ''
          ),
          array(
            'value'       => 'twitter',
            'label'       => esc_html__( 'Twitter', 'universh' ),
            'src'         => ''
          ),
          array(
            'value'       => 'pinterest',
            'label'       => esc_html__( 'Pinterest', 'universh' ),
            'src'         => ''
          ),
          array(
            'value'       => 'googleplus',
            'label'       => esc_html__( 'Google+', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'rss',
            'label'       => esc_html__( 'RSS', 'universh' ),
            'src'         => ''
          ),
          array(
            'value'       => 'instagram',
            'label'       => esc_html__( 'Instagram', 'universh' ),
            'src'         => ''
          ),
          array(
            'value'       => 'linkedin',
            'label'       => esc_html__( 'LinkdIn', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'behance',
            'label'       => esc_html__( 'Behance', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'digg',
            'label'       => esc_html__( 'Digg', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'dribbble',
            'label'       => esc_html__( 'Dribbble', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'flickr',
            'label'       => esc_html__( 'Flickr', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'forrst',
            'label'       => esc_html__( 'Forrst', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'html5',
            'label'       => esc_html__( 'Html5', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'icloud',
            'label'       => esc_html__( 'Icloud', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'lastfm',
            'label'       => esc_html__( 'Lastfm', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'myspace',
            'label'       => esc_html__( 'Myspace', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'paypal',
            'label'       => esc_html__( 'Paypal', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'picasa',
            'label'       => esc_html__( 'Picasa', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'reddit',
            'label'       => esc_html__( 'Reddit', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'skype',
            'label'       => esc_html__( 'Skype', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'stumbleupon',
            'label'       => esc_html__( 'Stumbleupon', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'tumblr',
            'label'       => esc_html__( 'Tumblr', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'vimeo',
            'label'       => esc_html__( 'Vimeo', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'wordpress',
            'label'       => esc_html__( 'WordPress', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'yahoo',
            'label'       => esc_html__( 'Yahoo', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'youtube',
            'label'       => esc_html__( 'Youtube', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'github',
            'label'       => esc_html__( 'Github', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'yelp',
            'label'       => esc_html__( 'Yelp', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'mail',
            'label'       => esc_html__( 'Mail', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'instagram',
            'label'       => esc_html__( 'Instagram', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'foursquare',
            'label'       => esc_html__( 'Foursquare', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'zerply',
            'label'       => esc_html__( 'Zerply', 'universh' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'vk',
            'label'       => esc_html__( 'VK', 'universh' ),
            'src'         => ''
          ),
        );
	$social_array = array(						
	array(
	  'title' => esc_html__( 'Google+', 'universh' ),
	  'link'  => '#',
	  'class'  => 'googleplus'
	  ),
	array(
	  'title' => esc_html__( 'Facebook', 'universh' ),
	  'link'  => '#',
	  'class'  => 'facebook'
	  ),
	array(
	  'title' => esc_html__( 'Twitter', 'universh' ),
	  'link'  => '#',
	  'class'  => 'twitter'
	  ),	  
	  array(
	  'title' => esc_html__( 'Pinterest', 'universh' ),
	  'link'  => '#',
	  'class'  => 'pinterest'
	  ),
	  array(
	  'title' => esc_html__( 'RSS', 'universh' ),
	  'link'  => '#',
	  'class'  => 'rss'
	  ),						
	);
	$options = array(
	 array(
        'id'          => 'header_option_style',
        'label'       => esc_html__( 'Header Style', 'universh' ),
        'desc'        => esc_html__( 'style of header', 'universh' ),
        'std'         => 'header-1',
        'type'        => 'select',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'header-1',
            'label'       => esc_html__( 'Style 1', 'universh' ),
          ),
		  array(
            'value'       => 'header-2',
            'label'       => esc_html__( 'Style 2', 'universh' ),
          ),
		  array(
            'value'       => 'header-3',
            'label'       => esc_html__( 'Style 3', 'universh' ),
          ),
		  array(
            'value'       => 'header-4',
            'label'       => esc_html__( 'Style 4', 'universh' ),
          ),
          array(
            'value'       => 'header-5',
            'label'       => esc_html__( 'Style 5', 'universh' ),
          ),
		  array(
            'value'       => 'header-6',
            'label'       => esc_html__( 'Style 6', 'universh' ),
          ),
		  array(
            'value'       => 'header-7',
            'label'       => esc_html__( 'Style 7', 'universh' ),
          ),
        )
      ),
	 array(
        'id'          => 'header_top_bar',
        'label'       => esc_html__( 'Header Top Bar', 'universh' ),
        'desc'        => '',
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'header_top_bar_left_text',
        'label'       => esc_html__( 'Header Top left email', 'universh' ),
        'desc'        => esc_html__( 'Header Top left email', 'universh' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'header_top_bar:not(off)',
        'operator'    => 'and'
      ),
	   array(
        'id'          => 'header_top_bar_left_phone',
        'label'       => esc_html__( 'Header Top left phone', 'universh' ),
        'desc'        => esc_html__( 'Header Top left phone', 'universh' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'header_top_bar:not(off)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'header_top_bar_right_icon_style',
        'label'       => esc_html__( 'Social Icon Style', 'universh' ),
        'desc'        => esc_html__( 'style of social icons', 'universh' ),
        'std'         => 'default',
        'type'        => 'select',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'color',
            'label'       => esc_html__( 'Colored', 'universh' ),
          ),
		  array(
            'value'       => 'default',
            'label'       => esc_html__( 'Default', 'universh' ),
          ),
        )
      ),
	  array(
        'id'          => 'header_top_bar_right_text',
        'label'       => esc_html__( 'Header Top Social Icons', 'universh' ),
        'desc'        => esc_html__( 'Header Top Social Icons', 'universh' ),
        'std'         => $social_array,
        'type'        => 'list-item',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'link',
            'label'       => esc_html__( 'Link', 'universh' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'class',
            'label'       => esc_html__( 'Icon', 'universh' ),
            'desc'        => esc_html__('exemple: facebook', 'universh'),
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => $choice
          ),
        ),
      ),
	  array(
        'id'          => 'header_top_bar_right_search',
        'label'       => esc_html__( 'Header Top Bar Search', 'universh' ),
        'desc'        => '',
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'header_top_bar:not(off)',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'show_breadcrumbs',
        'label'       => esc_html__( 'Display Breadcrumbs', 'universh' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	);
	return apply_filters( 'universh_header_options', $options );
	
	endif;
} 
?>