<?php
//include theme options
include UNIVERSHTHEMEDIR.'/admin/theme-options/general.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/background.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/header.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/sidebar.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/footer.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/blog.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/news.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/woocommerce.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/course.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/event.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/gallery.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/teacher.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/typography.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/styling.php';
include UNIVERSHTHEMEDIR.'/admin/theme-options/customcss.php';
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'universh_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function universh_theme_options() {
  
  /* OptionTree is not loaded yet */
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  //available option functions - return type array()
  $general_options = universh_general_options();
  $background_options = universh_background_options();
  $header_options = universh_header_options();
  $sidebar_options = universh_sidebar_options();
  $footer_options = universh_footer_options();
  $blog_options = universh_blog_options();
  $news_options = universh_news_options();
  $woocommerce_options = universh_woocommerce_options();
  $course_options = universh_course_options();
  $event_options = universh_event_options();
  $gallery_options = universh_gallery_options();
  $teacher_options = universh_teacher_options();
  $typography_options = universh_typography_options();
  $styling_options = universh_styling_options();
  $custom_css = universh_custom_css();


  //merge all available options
  $settings = array_merge( $general_options, $background_options, $header_options, $sidebar_options, $footer_options, $blog_options, $news_options, $woocommerce_options, $course_options, $event_options, $gallery_options, $teacher_options, $typography_options, $styling_options, $custom_css );

 

  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_options',
        'title'       => esc_html__( 'General Options', 'universh' )
      ),
      array(
        'id'          => 'background_options',
        'title'       => esc_html__( 'Background Options', 'universh' )
      ),
     array(
        'id'          => 'header_options',
        'title'       => esc_html__( 'Header Options', 'universh' )
      ),
      array(
        'id'          => 'footer_options',
        'title'       => esc_html__( 'Footer Options', 'universh' )
      ),
      array(
        'id'          => 'sidebar_option',
        'title'       => esc_html__( 'Sidebar Options', 'universh' )
      ),
      array(
        'id'          => 'blog_options',
        'title'       => esc_html__( 'Blog Options', 'universh' )
      ),
	  array(
        'id'          => 'news_options',
        'title'       => esc_html__( 'News Options', 'universh' )
      ),
	  array(
        'id'          => 'woocommerce_options',
        'title'       => esc_html__( 'Woocommerce Options', 'universh' )
      ),
	  array(
        'id'          => 'course_options',
        'title'       => esc_html__( 'Course Options', 'universh' )
      ),
	  array(
        'id'          => 'event_options',
        'title'       => esc_html__( 'Event Options', 'universh' )
      ),
	   array(
        'id'          => 'gallery_options',
        'title'       => esc_html__( 'Gallery Options', 'universh' )
      ),
	   array(
        'id'          => 'teacher_options',
        'title'       => esc_html__( 'Teacher Options', 'universh' )
      ),
      array(
        'id'          => 'fonts',
        'title'       => esc_html__( 'Typography Options', 'universh' )
      ),
      array(
        'id'          => 'styling_options',
        'title'       => esc_html__( 'Styling Options', 'universh' )
      ),
      array(
        'id'          => 'custom_css',
        'title'       => esc_html__( 'Custom CSS', 'universh' )
      )
    ),
    'settings'        => $settings
  );

  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;

  return $custom_settings[ 'settings' ];
  
}