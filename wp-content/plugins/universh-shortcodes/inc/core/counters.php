<?php

class Wt_Counter_Extra_Addon {

	static $option = 'wt_counter_extra_addon';

	function __construct() {
		add_filter( 'ts/menu/shortcodes',  array( __CLASS__, 'display' ) );
		add_filter( 'ts/menu/addons',      array( __CLASS__, 'display' ) );
		add_action( 'sunrise/page/before', array( __CLASS__, 'disable' ) );
	}

	public static function display( $title ) {
		if ( get_option( self::$option ) ) return $title;
		return sprintf(
			'%s <span class="update-plugins count-1" title="%s"><span class="update-count">%s</span></span>',
			$title,
			__( '1 new add-on for Universh Shortcodes', 'universh' ),
			'1'
		);
	}

	public static function disable() {
		if ( $_GET['page'] === 'Universh-addons' ) update_option( self::$option, true );
	}
}

// new Wt_Counter_Extra_Addon;

class Wt_Counter_Bundle {

	static $option = 'wt_counter_bundle';

	function __construct() {
		add_filter( 'ts/menu/shortcodes',  array( __CLASS__, 'display' ) );
		add_filter( 'ts/menu/addons',      array( __CLASS__, 'display' ) );
		add_action( 'sunrise/page/before', array( __CLASS__, 'disable' ) );
	}

	public static function display( $title ) {
		if ( get_option( self::$option ) ) return $title;
		return sprintf(
			'%s <span class="update-plugins count-1" title="%s"><span class="update-count">%s</span></span>',
			$title,
			__( '1 new add-on for Universh Shortcodes', 'universh' ),
			'1'
		);
	}

	public static function disable() {
		if ( $_GET['page'] === 'Universh-addons' ) update_option( self::$option, true );
	}
}

// new Wt_Counter_Bundle;
