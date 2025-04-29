<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'teachers_meta_boxes' );

function teachers_meta_boxes(){
	global $wpdb, $post;
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
  
  if( function_exists( 'ot_get_option' ) ):
  $my_meta_boxx_2 = array(
    'id'        => 'teachers_meta_box',
    'title'     => esc_html__('Teachers Infomation', 'universh'),
    'desc'      => '',
    'pages'     => array( 'teachers' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	array(
        'id'          => 'teachers_designation',
        'label'       => esc_html__( 'Designation', 'universh' ),
        'desc'        => '',
        'std'         => '',
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
        'id'          => 'short_description',
        'label'       => esc_html__( 'Short Description', 'universh' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	   array(
        'id'          => 'teachers_social_links',
        'label'       => esc_html__( 'Teachers Social Icons', 'universh' ),
        'desc'        => esc_html__( 'Teachers Social Icons', 'universh' ),
        'std'         => $social_array,
        'type'        => 'list-item',
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
    )
  );
  
  ot_register_meta_box( $my_meta_boxx_2 );
  endif;  //if( function_exists( 'ot_get_option' ) ):
}
?>