<?php
class Wt_Requirements {

	static $config = array(
		'php' => '5.1',
		'wp'  => '3.5'
	);

	/**
	 * Constructor
	 */
	function __construct() {
		add_action( 'ts/activation', array( __CLASS__, 'php' ) );
		add_action( 'ts/activation', array( __CLASS__, 'wp' ) );
	}

	/**
	 * Check PHP version
	 */
	public static function php() {
		$php = phpversion();
		load_plugin_textdomain( 'ts', false, dirname( plugin_basename( WT_PLUGIN_FILE ) ), '/languages/' );
		$msg = sprintf( __( '<h1>Oops! Plugin not activated&hellip;</h1> <p>Universh Shortcodes is not fully compatible with your PHP version (%s).<br />Reccomended PHP version &ndash; %s (or higher).</p><a href="%s">&larr; Return to the plugins screen</a> <a href="%s"%s>Continue and activate anyway &rarr;</a>', 'universh' ), $php, self::$config['php'], network_admin_url( 'plugins.php?deactivate=true' ), $_SERVER['REQUEST_URI'] . '&continue=true', ' style="float:right;font-weight:bold"' );
		// Check Forced activation
		if ( isset( $_GET['continue'] ) ) return;
		// PHP version is too low
		elseif ( version_compare( self::$config['php'], $php, '>' ) ) {
			deactivate_plugins( plugin_basename( WT_PLUGIN_FILE ) );
			wp_die( $msg );
		}
	}

	/**
	 * Check WordPress version
	 */
	public static function wp() {
		$wp = get_bloginfo( 'version' );
		load_plugin_textdomain( 'ts', false, dirname( plugin_basename( WT_PLUGIN_FILE ) ), '/languages/' );
		$msg = sprintf( __( '<h1>Oops! Plugin not activated&hellip;</h1> <p>Universh Shortcodes is not fully compatible with your version of WordPress (%s).<br />Reccomended WordPress version &ndash; %s (or higher).</p><a href="%s">&larr; Return to the plugins screen</a> <a href="%s"%s>Continue and activate anyway &rarr;</a>', 'universh' ), $wp, self::$config['wp'], network_admin_url( 'plugins.php?deactivate=true' ), $_SERVER['REQUEST_URI'] . '&continue=true', ' style="float:right;font-weight:bold"' );
		// Check Forced activation
		if ( isset( $_GET['continue'] ) ) return;
		// PHP version is too low
		elseif ( version_compare( self::$config['wp'], $wp, '>' ) ) {
			deactivate_plugins( plugin_basename( WT_PLUGIN_FILE ) );
			wp_die( $msg );
		}
	}

}

new Wt_Requirements;
