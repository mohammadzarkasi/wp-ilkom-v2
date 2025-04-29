<?php

class Wt_Vote {

	function __construct() {
		add_action( 'load-plugins.php', array( __CLASS__, 'init' ) );
		add_action( 'wp_ajax_wt_vote',  array( __CLASS__, 'vote' ) );
	}

	public static function init() {
		Universh_Shortcodes::timestamp();
		$vote = get_option( 'wt_vote' );
		$timeout = time() > ( get_option( 'wt_installed' ) + 60*60*24*3 );
		if ( in_array( $vote, array( 'yes', 'no', 'tweet' ) ) || !$timeout ) return;
		add_action( 'in_admin_footer', array( __CLASS__, 'message' ) );
		add_action( 'admin_head',      array( __CLASS__, 'register' ) );
		add_action( 'admin_footer',    array( __CLASS__, 'enqueue' ) );
	}

	public static function register() {
		wp_register_style( 'wt-vote', plugins_url( 'assets/css/vote.css', WT_PLUGIN_FILE ), false, WT_PLUGIN_VERSION, 'all' );
		wp_register_script( 'wt-vote', plugins_url( 'assets/js/vote.js', WT_PLUGIN_FILE ), array( 'jquery' ), WT_PLUGIN_VERSION, true );
	}

	public static function enqueue() {
		wp_enqueue_style( 'wt-vote' );
		wp_enqueue_script( 'wt-vote' );
	}

	public static function vote() {
		$vote = sanitize_key( $_GET['vote'] );
		if ( !is_user_logged_in() || !in_array( $vote, array( 'yes', 'no', 'later', 'tweet' ) ) ) die( 'error' );
		update_option( 'wt_vote', $vote );
		if ( $vote === 'later' ) update_option( 'wt_installed', time() );
		die( 'OK: ' . $vote );
	}

	public static function message() {
?>
		<div class="wt-vote" style="display:none">
			<div class="wt-vote-wrap">
				<div class="wt-vote-gravatar"><a href="http://profiles.wordpress.org/gn_themes" target="_blank"><img src="http://www.gravatar.com/avatar/54fda46c150e45d18d105b9185017aea.png" alt="<?php _e( 'Themestall', 'universh' ); ?>" width="50" height="50" /></a></div>
				<div class="wt-vote-message">
					<p><?php _e( 'Hello, my name is Themestall, and I am developer of plugin <b>Universh Shortcodes</b>.<br>If you like this plugin, please write a few words about it at the wordpress.org or twitter. It will help other people find this useful plugin more quickly.<br><b>Thank you!</b>', 'universh' ); ?></p>
					<p>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=wt_vote&amp;vote=yes" class="wt-vote-action button button-small button-primary" data-action="http://wordpress.org/support/view/plugin-reviews/Universh?rate=5#postform"><?php _e( 'Rate plugin', 'universh' ); ?></a>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=wt_vote&amp;vote=tweet" class="wt-vote-action button button-small" data-action="http://twitter.com/share?url=http://bit.ly/1blZb7u&amp;text=<?php echo urlencode( __( 'Universh Shortcodes - must have WordPress plugin #Univershshortcodes', 'universh' ) ); ?>"><?php _e( 'Tweet', 'universh' ); ?></a>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=wt_vote&amp;vote=no" class="wt-vote-action button button-small"><?php _e( 'No, thanks', 'universh' ); ?></a>
						<span><?php _e( 'or', 'universh' ); ?></span>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=wt_vote&amp;vote=later" class="wt-vote-action button button-small"><?php _e( 'Remind me later', 'universh' ); ?></a>
					</p>
				</div>
				<div class="wt-vote-clear"></div>
			</div>
		</div>
		<?php
	}
}

new Wt_Vote;
