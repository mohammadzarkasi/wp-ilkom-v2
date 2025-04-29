<?php

/**
 * Class for managing plugin assets
 */
class Wt_Assets {

	/**
	 * Set of queried assets
	 *
	 * @var array
	 */
	static $assets = array( 'css' => array(), 'js' => array() );

	/**
	 * Constructor
	 */
	function __construct() {
		// Register
		add_action( 'wp_head',                     array( __CLASS__, 'register' ) );
		add_action( 'admin_head',                  array( __CLASS__, 'register' ) );
		add_action( 'ts/generator/preview/before', array( __CLASS__, 'register' ) );
		add_action( 'ts/examples/preview/before',  array( __CLASS__, 'register' ) );
		// Enqueue
		add_action( 'wp_footer',                   array( __CLASS__, 'enqueue' ) );
		add_action( 'admin_footer',                array( __CLASS__, 'enqueue' ) );
		// Print
		add_action( 'ts/generator/preview/after',  array( __CLASS__, 'prnt' ) );
		add_action( 'ts/examples/preview/after',   array( __CLASS__, 'prnt' ) );
		// Custom CSS
		add_action( 'wp_footer',                   array( __CLASS__, 'custom_css' ), 99 );
		add_action( 'ts/generator/preview/after',  array( __CLASS__, 'custom_css' ), 99 );
		add_action( 'ts/examples/preview/after',   array( __CLASS__, 'custom_css' ), 99 );
		// RTL support
		add_action( 'ts/assets/custom_css/after',        array( __CLASS__, 'rtl_shortcodes' ) );
		// Custom TinyMCE CSS and JS
		// add_filter( 'mce_css',                     array( __CLASS__, 'mce_css' ) );
		// add_filter( 'mce_external_plugins',        array( __CLASS__, 'mce_js' ) );
	}

	/**
	 * Register assets
	 */
	public static function register() {
		// Chart.js
		wp_register_script( 'chartjs', plugins_url( 'assets/js/chart.js', WT_PLUGIN_FILE ), false, '0.2', true );
		// SimpleSlider
		wp_register_script( 'simpleslider', plugins_url( 'assets/js/simpleslider.js', WT_PLUGIN_FILE ), array( 'jquery' ), '1.0.0', true );
		wp_register_style( 'simpleslider', plugins_url( 'assets/css/simpleslider.css', WT_PLUGIN_FILE ), false, '1.0.0', 'all' );
		// Owl Carousel
		wp_register_script( 'owl-carousel', plugins_url( 'assets/js/owl-carousel.js', WT_PLUGIN_FILE ), array( 'jquery' ), '1.3.2', true );
		wp_register_style( 'owl-carousel', plugins_url( 'assets/css/owl-carousel.css', WT_PLUGIN_FILE ), false, '1.3.2', 'all' );
		wp_register_style( 'owl-carousel-transitions', plugins_url( 'assets/css/owl-carousel-transitions.css', WT_PLUGIN_FILE ), false, '1.3.2', 'all' );
		// Font Awesome
		wp_register_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', false, '4.4.0', 'all' );
		// Animate.css
		wp_register_style( 'animate', plugins_url( 'assets/css/animate.css', WT_PLUGIN_FILE ), false, '3.1.1', 'all' );
		// InView
		wp_register_script( 'inview', plugins_url( 'assets/js/inview.js', WT_PLUGIN_FILE ), array( 'jquery' ), '2.1.1', true );
		// qTip
		wp_register_style( 'qtip', plugins_url( 'assets/css/qtip.css', WT_PLUGIN_FILE ), false, '2.1.1', 'all' );
		wp_register_script( 'qtip', plugins_url( 'assets/js/qtip.js', WT_PLUGIN_FILE ), array( 'jquery' ), '2.1.1', true );
		// jsRender
		wp_register_script( 'jsrender', plugins_url( 'assets/js/jsrender.js', WT_PLUGIN_FILE ), array( 'jquery' ), '1.0.0-beta', true );
		
		wp_register_script( 'mapapi', 'http://maps.google.com/maps/api/js?key=AIzaSyDpJn4TOjxdVfAOToPnZnSyV8s5dmfLH6o&sensor=false', array( 'jquery' ), '1.0.0-beta', true );
		//wp_register_script( 'mapmarker', plugins_url( 'assets/js/jquery.mapmarker.js', WT_PLUGIN_FILE ), array( 'jquery', 'mapapi' ), '1.0.0-beta', true );
		
		// Magnific Popup
		wp_register_style( 'magnific-popup', plugins_url( 'assets/css/magnific-popup.css', WT_PLUGIN_FILE ), false, '0.9.9', 'all' );
		wp_register_script( 'magnific-popup', plugins_url( 'assets/js/magnific-popup.js', WT_PLUGIN_FILE ), array( 'jquery' ), '0.9.9', true );
		wp_localize_script( 'magnific-popup', 'wt_magnific_popup', array(
				'close'   => __( 'Close (Esc)', 'universh' ),
				'loading' => __( 'Loading...', 'universh' ),
				'prev'    => __( 'Previous (Left arrow key)', 'universh' ),
				'next'    => __( 'Next (Right arrow key)', 'universh' ),
				'counter' => sprintf( __( '%s of %s', 'universh' ), '%curr%', '%total%' ),
				'error'   => sprintf( __( 'Failed to load this link. %sOpen link%s.', 'universh' ), '<a href="%url%" target="_blank"><u>', '</u></a>' )
			) );
		// Ace
		wp_register_script( 'ace', plugins_url( 'assets/js/ace/ace.js', WT_PLUGIN_FILE ), false, '1.1.3', true );
		// Swiper
		wp_register_script( 'swiper', plugins_url( 'assets/js/swiper.js', WT_PLUGIN_FILE ), array( 'jquery' ), '2.6.1', true );
		// jPlayer
		wp_register_script( 'jplayer', plugins_url( 'assets/js/jplayer.js', WT_PLUGIN_FILE ), array( 'jquery' ), '2.4.0', true );
		// Options page
		wp_register_style( 'wt-options-page', plugins_url( 'assets/css/options-page.css', WT_PLUGIN_FILE ), false, WT_PLUGIN_VERSION, 'all' );
		wp_register_script( 'wt-options-page', plugins_url( 'assets/js/options-page.js', WT_PLUGIN_FILE ), array( 'magnific-popup', 'jquery-ui-sortable', 'ace', 'jsrender' ), WT_PLUGIN_VERSION, true );
		wp_localize_script( 'wt-options-page', 'wt_options_page', array(
				'upload_title'  => __( 'Choose files', 'universh' ),
				'upload_insert' => __( 'Add selected files', 'universh' ),
				'not_clickable' => __( 'This button is not clickable', 'universh' )
			) );
		// Cheatsheet
		wp_register_style( 'wt-cheatsheet', plugins_url( 'assets/css/cheatsheet.css', WT_PLUGIN_FILE ), false, WT_PLUGIN_VERSION, 'all' );
		// Generator
		wp_register_style( 'wt-generator', plugins_url( 'assets/css/generator.css', WT_PLUGIN_FILE ), array( 'farbtastic', 'magnific-popup' ), WT_PLUGIN_VERSION, 'all' );
		wp_register_script( 'wt-generator', plugins_url( 'assets/js/generator.js', WT_PLUGIN_FILE ), array( 'farbtastic', 'magnific-popup', 'qtip' ), WT_PLUGIN_VERSION, true );
		wp_localize_script( 'wt-generator', 'wt_generator', array(
				'upload_title'         => __( 'Choose file', 'universh' ),
				'upload_insert'        => __( 'Insert', 'universh' ),
				'isp_media_title'      => __( 'Select images', 'universh' ),
				'isp_media_insert'     => __( 'Add selected images', 'universh' ),
				'presets_prompt_msg'   => __( 'Please enter a name for new preset', 'universh' ),
				'presets_prompt_value' => __( 'New preset', 'universh' ),
				'last_used'            => __( 'Last used settings', 'universh' ),
				'hotkey'               => get_option( 'wt_option_hotkey' )
			) );
		// Shortcodes stylesheets
		wp_register_style( 'wt-content-shortcodes', self::skin_url( 'content-shortcodes.css' ), false, WT_PLUGIN_VERSION, 'all' );
		wp_register_style( 'wt-box-shortcodes', self::skin_url( 'box-shortcodes.css' ), false, WT_PLUGIN_VERSION, 'all' );
		wp_register_style( 'wt-media-shortcodes', self::skin_url( 'media-shortcodes.css' ), false, WT_PLUGIN_VERSION, 'all' );
		wp_register_style( 'wt-other-shortcodes', self::skin_url( 'other-shortcodes.css' ), false, WT_PLUGIN_VERSION, 'all' );
		wp_register_style( 'wt-galleries-shortcodes', self::skin_url( 'galleries-shortcodes.css' ), false, WT_PLUGIN_VERSION, 'all' );
		wp_register_style( 'wt-players-shortcodes', self::skin_url( 'players-shortcodes.css' ), false, WT_PLUGIN_VERSION, 'all' );
		// RTL stylesheets
		wp_register_style( 'wt-rtl-shortcodes', self::skin_url( 'rtl-shortcodes.css' ), false, WT_PLUGIN_VERSION, 'all' );
		wp_register_style( 'wt-rtl-admin', self::skin_url( 'rtl-admin.css' ), false, WT_PLUGIN_VERSION, 'all' );
		// Shortcodes scripts
		wp_register_script( 'wt-galleries-shortcodes', plugins_url( 'assets/js/galleries-shortcodes.js', WT_PLUGIN_FILE ), array( 'jquery', 'swiper' ), WT_PLUGIN_VERSION, true );
		wp_register_script( 'wt-players-shortcodes', plugins_url( 'assets/js/players-shortcodes.js', WT_PLUGIN_FILE ), array( 'jquery', 'jplayer' ), WT_PLUGIN_VERSION, true );
		wp_register_script( 'bg-map', plugins_url( 'assets/js/bg-map.js', WT_PLUGIN_FILE ), array( 'jquery', 'mapapi' ), WT_PLUGIN_VERSION, true );
		wp_register_script( 'wt-other-shortcodes', plugins_url( 'assets/js/other-shortcodes.js', WT_PLUGIN_FILE ), array( 'jquery' ), WT_PLUGIN_VERSION, true );
		wp_localize_script( 'wt-other-shortcodes', 'wt_other_shortcodes', array( 'no_preview' => __( 'This shortcode doesn\'t work in live preview. Please insert it into editor and preview on the site.', 'universh' ) ) );
		// Hook to deregister assets or add custom
		do_action( 'ts/assets/register' );
	}

	/**
	 * Enqueue assets
	 */
	public static function enqueue() {
		// Get assets query and plugin object
		$assets = self::assets();
		// Enqueue stylesheets
		foreach ( $assets['css'] as $style ) wp_enqueue_style( $style );
		// Enqueue scripts
		foreach ( $assets['js'] as $script ) wp_enqueue_script( $script );
		// Hook to dequeue assets or add custom
		do_action( 'ts/assets/enqueue', $assets );
	}

	/**
	 * Print assets without enqueuing
	 */
	public static function prnt() {
		// Prepare assets set
		$assets = self::assets();
		// Enqueue stylesheets
		wp_print_styles( $assets['css'] );
		// Enqueue scripts
		wp_print_scripts( $assets['js'] );
		// Hook
		do_action( 'ts/assets/print', $assets );
	}

	/**
	 * Print custom CSS
	 */
	public static function custom_css() {
		// Get custom CSS and apply filters to it
		$custom_css = apply_filters( 'ts/assets/custom_css', str_replace( '&#039;', '\'', html_entity_decode( (string) get_option( 'wt_option_custom-css' ) ) ) );
		// Print CSS if exists
		if ( $custom_css ) echo "\n\n<!-- Universh Shortcodes custom CSS - begin -->\n<style type='text/css'>\n" . stripslashes( str_replace( array( '%theme_url%', '%home_url%', '%plugin_url%' ), array( trailingslashit( get_stylesheet_directory_uri() ), trailingslashit( get_option( 'home' ) ), trailingslashit( plugins_url( '', WT_PLUGIN_FILE ) ) ), $custom_css ) ) . "\n</style>\n<!-- Universh Shortcodes custom CSS - end -->\n\n";
		// Hook
		do_action( 'ts/assets/custom_css/after' );
	}

	/**
	 * Styles for visualised shortcodes
	 */
	public static function mce_css( $mce_css ) {
		if ( ! empty( $mce_css ) ) $mce_css .= ',';
		$mce_css .= plugins_url( 'assets/css/tinymce.css', WT_PLUGIN_FILE );
		return $mce_css;
	}

	/**
	 * TinyMCE plugin for visualised shortcodes
	 */
	public static function mce_js( $plugins ) {
		$plugins['Univershshortcodes'] = plugins_url( 'assets/js/tinymce.js', WT_PLUGIN_FILE );
		return $plugins;
	}

	/**
	 * RTL support for shortcodes
	 */
	public static function rtl_shortcodes( $assets ) {
		// Check RTL
		if ( !is_rtl() ) return;
		// Add RTL stylesheets
		wp_print_styles( array( 'wt-rtl-shortcodes' ) );
	}

	/**
	 * RTL support for admin
	 */
	public static function rtl_admin( $assets ) {
		// Check RTL
		if ( !is_rtl() ) return;
		// Add RTL stylesheets
		self::add( 'css', 'wt-rtl-admin' );
	}

	/**
	 * Add asset to the query
	 */
	public static function add( $type, $handle ) {
		// Array with handles
		if ( is_array( $handle ) ) { foreach ( $handle as $h ) self::$assets[$type][$h] = $h; }
		// Single handle
		else self::$assets[$type][$handle] = $handle;
	}

	/**
	 * Get queried assets
	 */
	public static function assets() {
		// Get assets query
		$assets = self::$assets;
		// Apply filters to assets set
		$assets['css'] = array_unique( ( array ) apply_filters( 'ts/assets/css', ( array ) array_unique( $assets['css'] ) ) );
		$assets['js'] = array_unique( ( array ) apply_filters( 'ts/assets/js', ( array ) array_unique( $assets['js'] ) ) );
		// Return set
		return $assets;
	}

	/**
	 * Helper to get full URL of a skin file
	 */
	public static function skin_url( $file = '' ) {
		$shult = Universh_shortcodes();
		$skin = get_option( 'wt_option_skin' );
		$uploads = wp_upload_dir(); $uploads = $uploads['baseurl'];
		// Prepare url to skin directory
		$url = ( !$skin || $skin === 'default' ) ? plugins_url( 'assets/css/', WT_PLUGIN_FILE ) : $uploads . '/Universh-skins/' . $skin;
		return trailingslashit( apply_filters( 'ts/assets/skin', $url ) ) . $file;
	}
}

new Wt_Assets;

/**
 * Helper function to add asset to the query
 *
 * @param string  $type   Asset type (css|js)
 * @param mixed   $handle Asset handle or array with handles
 */
function wt_query_asset( $type, $handle ) {
	Wt_Assets::add( $type, $handle );
}

/**
 * Helper function to get current skin url
 *
 * @param string  $file Asset file name. Example value: box-shortcodes.css
 */
function wt_skin_url( $file ) {
	return Wt_Assets::skin_url( $file );
}
