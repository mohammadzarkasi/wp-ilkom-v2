<?php
class Universh_Shortcodes {

	/**
	 * Constructor
	 */
	function __construct() {
        add_action( 'init',                       array( __CLASS__, 'init_translation' ) );
		add_action( 'plugins_loaded',             array( __CLASS__, 'init' ) );
		add_action( 'init',                       array( __CLASS__, 'register' ) );
		add_action( 'init',                       array( __CLASS__, 'update' ), 20 );
		register_activation_hook( WT_PLUGIN_FILE, array( __CLASS__, 'activation' ) );
		register_activation_hook( WT_PLUGIN_FILE, array( __CLASS__, 'deactivation' ) );
	}

    public static function init_translation() {
        // Make plugin available for translation
		load_plugin_textdomain( 'universh', false, dirname( plugin_basename( WT_PLUGIN_FILE ) ) . '/languages/' );		
    }

	/**
	 * Plugin init
	 */
	public static function init() {

        // Setup admin class
		$admin = new Sunrise4( array(
            'file'       => WT_PLUGIN_FILE,
            'slug'       => 'ts',
            'prefix'     => 'wt_option_',
            'textdomain' => 'su'
        ) );
		
		// Top-level menu
		$admin->add_menu( array(
				'page_title'  => __( 'Settings', 'universh' ) . ' &lsaquo; ' . __( 'Universh Shortcodes', 'universh' ),
				'menu_title'  => apply_filters( 'ts/menu/shortcodes', __( 'Shortcodes', 'universh' ) ),
				'capability'  => 'manage_options',
				'slug'        => 'universh',
				'icon_url'    => 'dashicons-editor-code',
				'position'    => '80.11',
				'options'     => array(
					array(
						'type' => 'opentab',
						'name' => __( 'About', 'universh' )
					),
					array(
						'type'     => 'about',
						'callback' => array( 'Wt_Admin_Views', 'about' )
					),
					array(
						'type'    => 'closetab',
						'actions' => false
					),
					array(
						'type' => 'opentab',
						'name' => __( 'Settings', 'universh' )
					),
					array(
						'type'    => 'checkbox',
						'id'      => 'custom-formatting',
						'name'    => __( 'Custom formatting', 'universh' ),
						'desc'    => __( 'Disable this option if you have some problems with other plugins or content formatting', 'universh' ) . '<br /><a href="http://gndev.info/kb/custom-formatting/" target="_blank">' . __( 'Documentation article', 'universh' ) . '</a>',
						'default' => 'on',
						'label'   => __( 'Enabled', 'universh' )
					),
					array(
						'type'    => 'checkbox',
						'id'      => 'skip',
						'name'    => __( 'Skip default values', 'universh' ),
						'desc'    => __( 'Enable this option and the generator will insert a shortcode without default attribute values that you have not changed. As a result, the generated code will be shorter.', 'universh' ),
						'default' => 'on',
						'label'   => __( 'Enabled', 'universh' )
					),
					array(
						'type'    => 'text',
						'id'      => 'prefix',
						'name'    => __( 'Shortcodes prefix', 'universh' ),
						'desc'    => sprintf( __( 'This prefix will be added to all shortcodes by this plugin. For example, type here %s and you\'ll get shortcodes like %s and %s. Please keep in mind: this option is not affects your already inserted shortcodes and if you\'ll change this value your old shortcodes will be broken', 'universh' ), '<code>wt_</code>', '<code>[wt_button]</code>', '<code>[wt_column]</code>' ),
						'default' => 'wt_'
					),
					array(
						'type'    => 'text',
						'id'      => 'hotkey',
						'name'    => __( 'Insert shortcode Hotkey', 'universh' ),
						'desc'    => sprintf( '%s<br><a href="https://rawgit.com/jeresig/jquery.hotkeys/master/test-static-01.html" target="_blank">%s</a> | <a href="https://github.com/jeresig/jquery.hotkeys#notes" target="_blank">%s</a>', __( 'Here you can define custom hotkey for the Insert shortcode popup window. Leave this field empty to disable hotkey', 'universh' ), __( 'Hotkey examples', 'universh' ), __( 'Additional notes', 'universh' ) ),
						'default' => 'alt+i'
					),
					array(
						'type'    => 'hidden',
						'id'      => 'skin',
						'name'    => __( 'Skin', 'universh' ),
						'desc'    => __( 'Choose global skin for shortcodes', 'universh' ),
						'default' => 'default'
					),
					array(
						'type' => 'closetab'
					),
					array(
						'type' => 'opentab',
						'name' => __( 'Custom CSS', 'universh' )
					),
					array(
						'type'     => 'custom_css',
						'id'       => 'custom-css',
						'default'  => '',
						'callback' => array( 'Wt_Admin_Views', 'custom_css' )
					),
					array(
						'type' => 'closetab'
					)
				)
			) );
		// Settings submenu
		$admin->add_submenu( array(
				'parent_slug' => 'universh',
				'page_title'  => __( 'Settings', 'universh' ) . ' &lsaquo; ' . __( 'Universh Shortcodes', 'universh' ),
				'menu_title'  => apply_filters( 'ts/menu/settings', __( 'Settings', 'universh' ) ),
				'capability'  => 'manage_options',
				'slug'        => 'universh',
				'options'     => array()
			) );
		// Examples submenu
		$admin->add_submenu( array(
				'parent_slug' => 'universh',
				'page_title'  => __( 'Examples', 'universh' ) . ' &lsaquo; ' . __( 'Universh Shortcodes', 'universh' ),
				'menu_title'  => apply_filters( 'ts/menu/examples', __( 'Examples', 'universh' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'Universh-examples',
				'options'     => array(
					array(
						'type' => 'examples',
						'callback' => array( 'Wt_Admin_Views', 'examples' )
					)
				)
			) );
		// Cheatsheet submenu
		$admin->add_submenu( array(
				'parent_slug' => 'universh',
				'page_title'  => __( 'Cheatsheet', 'universh' ) . ' &lsaquo; ' . __( 'Universh Shortcodes', 'universh' ),
				'menu_title'  => apply_filters( 'ts/menu/examples', __( 'Cheatsheet', 'universh' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'Universh-cheatsheet',
				'options'     => array(
					array(
						'type' => 'cheatsheet',
						'callback' => array( 'Wt_Admin_Views', 'cheatsheet' )
					)
				)
			) );
		// Add-ons submenu
		$admin->add_submenu( array(
				'parent_slug' => 'universh',
				'page_title'  => __( 'Add-ons', 'universh' ) . ' &lsaquo; ' . __( 'Universh Shortcodes', 'universh' ),
				'menu_title'  => apply_filters( 'ts/menu/addons', __( 'Add-ons', 'universh' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'Universh-addons',
				'options'     => array(
					array(
						'type' => 'addons',
						'callback' => array( 'Wt_Admin_Views', 'addons' )
					)
				)
			) );
		// Translate plugin meta
		__( 'Universh Shortcodes', 'universh' );
		__( 'Themestall', 'universh' );
		__( 'Supercharge your WordPress theme with mega pack of shortcodes', 'universh' );
		// Add plugin actions links
		add_filter( 'plugin_action_links_' . plugin_basename( WT_PLUGIN_FILE ), array( __CLASS__, 'actions_links' ), -10 );
		// Add plugin meta links
		add_filter( 'plugin_row_meta', array( __CLASS__, 'meta_links' ), 10, 2 );
		// Universh Shortcodes is ready
		do_action( 'ts/init' );
	}

	/**
	 * Plugin activation
	 */
	public static function activation() {
		self::timestamp();
		update_option( 'wt_option_version', WT_PLUGIN_VERSION );
		do_action( 'ts/activation' );
	}

	/**
	 * Plugin deactivation
	 */
	public static function deactivation() {
		do_action( 'ts/deactivation' );
	}

	/**
	 * Plugin update hook
	 */
	public static function update() {
		$option = get_option( 'ts_option_version' );
		if ( $option !== WT_PLUGIN_VERSION ) {
			update_option( 'wt_option_version', WT_PLUGIN_VERSION );
			do_action( 'ts/update' );
		}
	}

	/**
	 * Register shortcodes
	 */
	public static function register() {
		// Prepare compatibility mode prefix
		$prefix = wt_cmpt();
		// Loop through shortcodes
		foreach ( ( array ) Wt_Data::shortcodes() as $id => $data ) {
			if ( isset( $data['function'] ) && is_callable( $data['function'] ) ) $func = $data['function'];
			elseif ( is_callable( array( 'Wt_Shortcodes', $id ) ) ) $func = array( 'Wt_Shortcodes', $id );
			elseif ( is_callable( array( 'Wt_Shortcodes', 'wt_' . $id ) ) ) $func = array( 'Wt_Shortcodes', 'wt_' . $id );
			else continue;
			// Register shortcode
			add_shortcode( $prefix . $id, $func );
		}
		// Register [media] manually // 3.x
		add_shortcode( $prefix . 'media', array( 'Wt_Shortcodes', 'media' ) );
	}

	/**
	 * Add timestamp
	 */
	public static function timestamp() {
		if ( !get_option( 'wt_installed' ) ) update_option( 'wt_installed', time() );
	}

	/**
	 * Add plugin actions links
	 */
	public static function actions_links( $links ) {
		$links[] = '<a href="' . admin_url( 'admin.php?page=Universh-examples' ) . '">' . __( 'Examples', 'universh' ) . '</a>';
		$links[] = '<a href="' . admin_url( 'admin.php?page=Universh' ) . '#tab-0">' . __( 'Where to start?', 'universh' ) . '</a>';
		return $links;
	}

	/**
	 * Add plugin meta links
	 */
	public static function meta_links( $links, $file ) {
		// Check plugin
		if ( $file === plugin_basename( WT_PLUGIN_FILE ) ) {
			unset( $links[2] );
			$links[] = '<a href="http://gndev.info/Universh/" target="_blank">' . __( 'Project homepage', 'universh' ) . '</a>';
			$links[] = '<a href="http://wordpress.org/support/plugin/Universh/" target="_blank">' . __( 'Support forum', 'universh' ) . '</a>';
			$links[] = '<a href="http://wordpress.org/extend/plugins/Universh/changelog/" target="_blank">' . __( 'Changelog', 'universh' ) . '</a>';
		}
		return $links;
	}
}

/**
 * Register plugin function to perform checks that plugin is installed
 */
function Universh_shortcodes() {
	return true;
}

new Universh_Shortcodes;
