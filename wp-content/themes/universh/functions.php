<?php
/**
 * Universh functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 */

//Define variable
define('UNIVERSHTHEMENAME', 'universh' );
define('UNIVERSHTHEMEVERSION', '1.3.3' );
define('UNIVERSHTHEMEURI', trailingslashit( get_template_directory_uri() ) );
define('UNIVERSHTHEMEDIR', trailingslashit( get_template_directory() ) );

if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

function universh_load_textdomain() {
    load_theme_textdomain( 'universh', UNIVERSHTHEMEDIR . '/languages' );
}
add_action( 'init', 'universh_load_textdomain', 10 );

if ( ! function_exists( 'universh_setup' ) ) :
/**
 * Universh setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function universh_setup() {

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css') );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main-menu'   => esc_html__( 'Main Menu', 'universh' ),
		'footer-menu'   => esc_html__( 'Footer Menu', 'universh' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array( 'video', 'audio', 'quote', 'link', 'gallery' ) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	add_theme_support( 'post-thumbnails' );
	
	add_theme_support( 'title-tag' );
	
	// This theme support woocommerce
	add_theme_support( 'woocommerce' );

}
endif; // universh_setup
add_action( 'after_setup_theme', 'universh_setup' );

/**
 * Theme Options
 */
require UNIVERSHTHEMEDIR . 'admin/theme-options.php';

/**
 * Function for the back end.
 *
 */
require UNIVERSHTHEMEDIR . 'admin/functions.php';

require UNIVERSHTHEMEDIR . 'admin/widgets.php';

/**
 * Enqueue scripts and styles for the front end.
 *
 */
require UNIVERSHTHEMEDIR . 'include/scripts-css.php';
 
 /*
 * tgm plugins
 *
 */
 require UNIVERSHTHEMEDIR . 'library/tgm-plugins.php';


/**
 * Function for the front end.
 *
 */
require UNIVERSHTHEMEDIR . 'include/mr-image-resize.php';
require UNIVERSHTHEMEDIR . 'include/functions.php';

if(class_exists('WPCF7_ContactFormTemplate')){
	function universh_filter_wpcf7_default_template( $template, $prop ) { 
		// make filter magic happen here...
		$template =
			'<div class="input-text form-group">[text* your-name class:form-control class:input-name placeholder: "' .esc_attr__('Full Name', 'universh'). '"]</div><div class="input-email form-group">'
			. '[email* your-email class:form-control class:input-email placeholder: "' .esc_attr__('Email', 'universh'). '"]</div>'
			. '<div class="textarea-message form-group">[textarea your-message class:form-control class:textarea-message placeholder: "' .esc_attr__('Message', 'universh'). '"]</div>'
			. '[submit class:btn "' . esc_html__( 'Send Now', 'universh' ) . '"]';
		return $template; 
	};			 
	// add the filter 
	add_filter( 'wpcf7_default_template', 'universh_filter_wpcf7_default_template', 10, 2 );
}

add_filter( 'learn-press/override-templates', function(){ return true; } );
?>