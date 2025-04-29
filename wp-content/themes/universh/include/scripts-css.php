<?php
/**
 * Enqueue scripts and styles for the front end.
 *
 */
function universh_scripts() {
	// Add Lato font, used in the main stylesheet.
	$fonts_url = universh_fonts_url();
	if ( ! empty( $fonts_url ) ){
		wp_enqueue_style( 'universh-fonts', esc_url_raw( $fonts_url ), array(), null );
	}
	wp_enqueue_style( 'bootstrap-min', UNIVERSHTHEMEURI . 'css/lib/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'animate-min', UNIVERSHTHEMEURI . 'css/lib/animate.min.css', array(), null );
	wp_enqueue_style( 'fontawesome-min', UNIVERSHTHEMEURI . 'css/lib/font-awesome.min.css', array(), null );	
	wp_enqueue_style( 'universh-icon', UNIVERSHTHEMEURI . 'css/lib/univershicon.css', array(), null );
	wp_enqueue_style( 'carousel', UNIVERSHTHEMEURI . 'css/lib/owl.carousel.css', array(), null );
	wp_enqueue_style( 'prettyPhoto', UNIVERSHTHEMEURI . 'css/lib/prettyPhoto.css', array(), null );
	wp_enqueue_style( 'slimmenu.min', UNIVERSHTHEMEURI . 'css/lib/slimmenu.min.css', array(), null );
	wp_enqueue_style( 'universh-menu', UNIVERSHTHEMEURI . 'css/lib/menu.css', array(), null );
	wp_enqueue_style( 'universh-timeline', UNIVERSHTHEMEURI . 'css/lib/timeline.css', array(), null );

	// Load our main stylesheet.
	wp_enqueue_style( 'universh-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'universh-theme', UNIVERSHTHEMEURI . 'css/theme.css', array(), null );
	wp_enqueue_style( 'universh-theme-responsive', UNIVERSHTHEMEURI . 'css/theme-responsive.css', array( 'universh-style' ), null );
	wp_enqueue_style( 'universh-default', UNIVERSHTHEMEURI . 'css/skins/default.css', array(), null );
	wp_enqueue_style( 'universh-custom', UNIVERSHTHEMEURI . 'css/custom.css', array(), null );


	//scripts
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
	// Adds JavaScript.
	wp_enqueue_script( 'bootstrap', UNIVERSHTHEMEURI . 'js/lib/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrapvalidator', UNIVERSHTHEMEURI . 'js/lib/bootstrapValidator.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery.appear', UNIVERSHTHEMEURI . 'js/lib/jquery.appear.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery.easing.min', UNIVERSHTHEMEURI . 'js/lib/jquery.easing.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery.slimmenu.min', UNIVERSHTHEMEURI . 'js/lib/jquery.slimmenu.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'owl.carousel.min', UNIVERSHTHEMEURI . 'js/lib/owl.carousel.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'countdown', UNIVERSHTHEMEURI . 'js/lib/countdown.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'counter', UNIVERSHTHEMEURI . 'js/lib/counter.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery.fitvids', UNIVERSHTHEMEURI . 'js/lib/jquery.fitvids.js', array( 'jquery' ), '', true );	
	wp_enqueue_script( 'isotope.pkgd.min', UNIVERSHTHEMEURI . 'js/lib/isotope.pkgd.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery.easypiechart.min', UNIVERSHTHEMEURI . 'js/lib/jquery.easypiechart.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery.mb.YTPlayer.min', UNIVERSHTHEMEURI . 'js/lib/jquery.mb.YTPlayer.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'prettyPhoto', UNIVERSHTHEMEURI . 'js/lib/jquery.prettyPhoto.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery.stellar', UNIVERSHTHEMEURI . 'js/lib/jquery.stellar.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'universh-menu', UNIVERSHTHEMEURI . 'js/lib/menu.js', array( 'jquery' ), '', true );	
	wp_enqueue_script( 'modernizr', UNIVERSHTHEMEURI . 'js/lib/modernizr.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'universh-theme', UNIVERSHTHEMEURI . 'js/theme.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'universh-custom', UNIVERSHTHEMEURI . 'js/custom.js', array( 'jquery' ), '', true );	
	
}
add_action( 'wp_enqueue_scripts', 'universh_scripts' );

function universh_styles_custom() {
	wp_enqueue_style('universh-custom-style', UNIVERSHTHEMEURI . 'css/custom_style.css');
    $custom_css = (function_exists('ot_get_option'))? ot_get_option('custom_css') : '';
    wp_add_inline_style( 'universh-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'universh_styles_custom' );

function universh_styles_custom_banner() {
	wp_enqueue_style('universh-custom-banner-style', UNIVERSHTHEMEURI . 'css/custom_style_banner.css');
	$custom_css = '';
	if( function_exists( 'ot_get_option' )):
		$custom_css .= universh_custom_css_from_theme_options();
	endif;
    wp_add_inline_style( 'universh-custom-banner-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'universh_styles_custom_banner' );

function universh_custom_enqueue_script() {
   wp_enqueue_script( 'universh-custom-script', UNIVERSHTHEMEURI . 'js/custom_script.js', array(), '1.0' );
   $custom_script = esc_js((function_exists('ot_get_option'))? ot_get_option( 'footer_scripts' ): '');
   wp_add_inline_script( 'universh-custom-script', $custom_script );
}
add_action( 'wp_enqueue_scripts', 'universh_custom_enqueue_script' );
?>