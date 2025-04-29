<?php
class Wt_Admin_Views {
	function __construct() {}

	public static function about( $field, $config ) {
		ob_start();
?>
<div id="wt-about-screen">
	<h1><?php _e( 'Welcome to Universh Shortcodes', 'universh' ); ?> <small><?php _e( 'A real swiss army knife for WordPress', 'universh' ); ?></small></h1>
	<div class="sunrise-inline-menu">
		<a href="http://gndev.info/Universh/" target="_blank"><strong><?php _e( 'Project homepage', 'universh' ); ?></strong></a>
		<a href="http://gndev.info/kb/" target="_blank"><?php _e( 'Documentation', 'universh' ); ?></a>
		<a href="http://wordpress.org/support/plugin/Universh/" target="_blank"><?php _e( 'Support forum', 'universh' ); ?></a>
		<a href="http://wordpress.org/extend/plugins/Universh/changelog/" target="_blank"><?php _e( 'Changelog', 'universh' ); ?></a>
		<a href="https://github.com/gndev/Universh" target="_blank"><?php _e( 'Fork on GitHub', 'universh' ); ?></a>
	</div>
	<div class="wt-clearfix">
		<div class="wt-about-column">
			<h3><?php _e( 'Plugin features', 'universh' ); ?></h3>
			<ul>
				<li><?php _e( '40+ amazing shortcodes', 'universh' ); ?></li>
				<li><?php _e( 'Power of CSS3 transitions', 'universh' ); ?></li>
				<li><?php _e( 'Handy shortcodes generator', 'universh' ) ?></li>
				<li><?php _e( 'International', 'universh' ); ?></li>
				<li><?php _e( 'Documented API', 'universh' ); ?></li>
			</ul>
		</div>
		<div class="wt-about-column">
			<h3><?php _e( 'What is a shortcode?', 'universh' ); ?></h3>
			<p><?php _e( '<strong>Shortcode</strong> is a WordPress-specific code that lets you do nifty things with very little effort.', 'universh' ); ?></p>
			<p><?php _e( 'Shortcodes can embed files or create objects that would normally require lots of complicated, ugly code in just one line. Shortcode = shortcut.', 'universh' ); ?></p>
		</div>
	</div>
	<div class="wt-clearfix">
		<div class="wt-about-column">
			<h3><?php _e( 'How does it works', 'universh' ); ?></h3>
			<a href="http://www.youtube.com/watch?v=lni-w2dtcQY?autoplay=1&amp;showinfo=0&amp;rel=0&amp;theme=light#" target="_blank" class="wt-demo-video"><img src="<?php echo plugins_url( 'assets/images/banners/how-it-works.jpg', WT_PLUGIN_FILE ); ?>" alt=""></a>
		</div>
		<div class="wt-about-column">
			<h3><?php _e( 'More videos', 'universh' ); ?></h3>
			<ul>
				<li><a href="http://www.youtube.com/watch?v=IjmaXz-b55I" target="_blank"><?php _e( 'Universh Shortcodes Tutorial', 'universh' ); ?></a></li>
				<li><a href="http://www.youtube.com/watch?v=YU3Zu6C5ZfA" target="_blank"><?php _e( 'How to use special widget', 'universh' ); ?></a></li>
				<li><a href="http://www.screenr.com/BK0H" target="_blank"><?php _e( 'How to create Carousel', 'universh' ); ?></a></li>
				<li><a href="http://www.youtube.com/watch?v=kCWyO2F7jTw" target="_blank"><?php _e( 'How to create image gallery', 'universh' ); ?></a></li>
			</ul>
		</div>
	</div>
</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		wt_query_asset( 'css', array( 'magnific-popup', 'wt-options-page' ) );
		wt_query_asset( 'js', array( 'jquery', 'magnific-popup', 'wt-options-page' ) );
		return $output;
	}

	public static function custom_css( $field, $config ) {
		ob_start();
?>
<div id="wt-custom-css-screen">
	<div class="wt-custom-css-originals">
		<p><strong><?php _e( 'You can overview the original styles to overwrite it', $config['textdomain'] ); ?></strong></p>
		<div class="sunrise-inline-menu">
			<a href="<?php echo wt_skin_url( 'content-shortcodes.css' ); ?>">content-shortcodes.css</a>
			<a href="<?php echo wt_skin_url( 'box-shortcodes.css' ); ?>">box-shortcodes.css</a>
			<a href="<?php echo wt_skin_url( 'media-shortcodes.css' ); ?>">media-shortcodes.css</a>
			<a href="<?php echo wt_skin_url( 'galleries-shortcodes.css' ); ?>">galleries-shortcodes.css</a>
			<a href="<?php echo wt_skin_url( 'players-shortcodes.css' ); ?>">players-shortcodes.css</a>
			<a href="<?php echo wt_skin_url( 'other-shortcodes.css' ); ?>">other-shortcodes.css</a>
		</div>
		<?php do_action( 'ts/admin/css/originals/after' ); ?>
	</div>
	<div class="wt-custom-css-vars">
		<p><strong><?php _e( 'You can use next variables in your custom CSS', $config['textdomain'] ); ?></strong></p>
		<code>%home_url%</code> - <?php _e( 'home url', $config['textdomain'] ); ?><br/>
		<code>%theme_url%</code> - <?php _e( 'theme url', $config['textdomain'] ); ?><br/>
		<code>%plugin_url%</code> - <?php _e( 'plugin url', $config['textdomain'] ); ?>
	</div>
	<div id="wt-custom-css-editor">
		<div id="sunrise-field-<?php echo $field['id']; ?>-editor"></div>
		<textarea name="sunrise[<?php echo $field['id']; ?>]" id="sunrise-field-<?php echo $field['id']; ?>" class="regular-text" rows="10"><?php echo stripslashes( get_option( $config['prefix'] . $field['id'] ) ); ?></textarea>
	</div>
</div>
			<?php
		$output = ob_get_contents();
		ob_end_clean();
		wt_query_asset( 'css', array( 'magnific-popup', 'wt-options-page' ) );
		wt_query_asset( 'js', array( 'jquery', 'magnific-popup', 'ace', 'wt-options-page' ) );
		return $output;
	}

	public static function examples( $field, $config ) {
		$output = array();
		$examples = Wt_Data::examples();
		$preview = '<div style="display:none"><div id="wt-examples-window"><div id="wt-examples-preview"></div></div></div>';
		$open = ( isset( $_GET['example'] ) ) ? sanitize_key( $_GET['example'] ) : '';
		$open = '<input id="wt_open_example" type="hidden" name="wt_open_example" value="' . $open . '" />';
		$nonce = '<input id="wt_examples_nonce" type="hidden" name="wt_examples_nonce" value="' . wp_create_nonce( 'wt_examples_nonce' ) . '" />';
		foreach ( $examples as $group ) {
			$items = array();
			if ( isset( $group['items'] ) ) foreach ( $group['items'] as $item ) {
					$code = ( isset( $item['code'] ) ) ? $item['code'] : plugins_url( 'inc/examples/' . $item['id'] . '.example', WT_PLUGIN_FILE );
					$id = ( isset( $item['id'] ) ) ? $item['id'] : '';
					$items[] = '<div class="wt-examples-item" data-code="' . $code . '" data-id="' . $id . '" data-mfp-src="#wt-examples-window"><i class="fa fa-' . $item['icon'] . '"></i> ' . $item['name'] . '</div>';
				}
			$output[] = '<div class="wt-examples-group wt-clearfix"><h2 class="wt-examples-group-title">' . $group['title'] . '</h2>' . implode( '', $items ) . '</div>';
		}
		wt_query_asset( 'css', array( 'magnific-popup', 'font-awesome', 'wt-options-page' ) );
		wt_query_asset( 'js', array( 'jquery', 'magnific-popup', 'wt-options-page' ) );
		return '<div id="wt-examples-screen">' . implode( '', $output ) . '</div>' . $preview . $open . $nonce;
	}

	public static function cheatsheet( $field, $config ) {
		// Prepare print button
		$print = '<div><a href="javascript:;" id="wt-cheatsheet-print" class="wt-cheatsheet-switch button button-primary button-large">' . __( 'Printable version', 'universh' ) . '</a><div id="wt-cheatsheet-print-head"><h1>' . __( 'Universh Shortcodes', 'universh' ) . ': ' . __( 'Cheatsheet', 'universh' ) . '</h1><a href="javascript:;" class="wt-cheatsheet-switch">&larr; ' . __( 'Back to Dashboard', 'universh' ) . '</a></div></div>';
		// Prepare table array
		$table = array();
		// Table start
		$table[] = '<table><tr><th style="width:20%;">' . __( 'Shortcode', 'universh' ) . '</th><th style="width:50%">' . __( 'Attributes', 'universh' ) . '</th><th style="width:30%">' . __( 'Example code', 'universh' ) . '</th></tr>';
		// Loop through shortcodes
		foreach ( (array) Wt_Data::shortcodes() as $name => $shortcode ) {
			// Prepare vars
			$icon = ( isset( $shortcode['icon'] ) ) ? $shortcode['icon'] : 'puzzle-piece';
			$shortcode['name'] = ( isset( $shortcode['name'] ) ) ? $shortcode['name'] : $name;
			$attributes = array();
			$example = array();
			$icons = 'icon: music, icon: envelope &hellip; <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">' . __( 'full list', 'universh' ) . '</a>';
			// Loop through attributes
			if ( is_array( $shortcode['atts'] ) )
				foreach ( $shortcode['atts'] as $id => $data ) {
					// Prepare default value
					$default = ( isset( $data['default'] ) && $data['default'] !== '' ) ? '<p><em>' . __( 'Default value', 'universh' ) . ':</em> ' . $data['default'] . '</p>' : '';
					// Check type is set
					if ( empty( $data['type'] ) ) $data['type'] = 'text';
					// Switch attribute types
					switch ( $data['type'] ) {
						// Select
					case 'select':
						$value = implode( ', ', array_keys( $data['values'] ) );
						break;
						// Slider and number
					case 'slider':
					case 'number':
						$value = $data['min'] . '&hellip;' . $data['max'];
						break;
						// Bool
					case 'bool':
						$value = 'yes | no';
						break;
						// Icon
					case 'icon':
						$value = $icons;
						break;
						// Color
					case 'color':
						$value = __( '#RGB and rgba() colors' );
						break;
						// Default value
					default:
						$value = $data['default'];
						break;
					}
					// Check empty value
					if ( $value === '' ) $value = __( 'Any text value', 'universh' );
					// Extra CSS class
					if ( $id === 'class' ) $value = __( 'Any custom CSS classes', 'universh' );
					// Add attribute
					$attributes[] = '<div class="wt-shortcode-attribute"><strong>' . $data['name'] . ' <em>&ndash; ' . $id . '</em></strong><p><em>' . __( 'Possible values', 'universh' ) . ':</em> ' . $value . '</p>' . $default . '</div>';
					// Add attribute to the example code
					$example[] = $id . '="' . $data['default'] . '"';
				}
			// Prepare example code
			$example = '[%prefix_' . $name . ' ' . implode( ' ', $example ) . ']';
			// Prepare content value
			if ( empty( $shortcode['content'] ) ) $shortcode['content'] = '';
			// Add wrapping code
			if ( $shortcode['type'] === 'wrap' ) $example .= esc_textarea( $shortcode['content'] ) . '[/%prefix_' . $name . ']';
			// Change compatibility prefix
			$example = str_replace( array( '%prefix_', '__' ), wt_cmpt(), $example );
			// Shortcode
			$table[] = '<td>' . '<span class="wt-shortcode-icon">' . Wt_Tools::icon( $icon ) . '</span>' . $shortcode['name'] . '<br/><em class="wt-shortcode-desc">' . $shortcode['desc'] . '</em></td>';
			// Attributes
			$table[] = '<td>' . implode( '', $attributes ) . '</td>';
			// Example code
			$table[] = '<td><code contenteditable="true">' . $example . '</code></td></tr>';
		}
		// Table end
		$table[] = '</table>';
		// Query assets
		wt_query_asset( 'css', array( 'font-awesome', 'wt-cheatsheet' ) );
		wt_query_asset( 'js', array( 'jquery', 'wt-options-page' ) );
		// Return output
		return '<div id="wt-cheatsheet-screen">' . $print . implode( '', $table ) . '</div>';
	}

	public static function addons( $field, $config ) {
		$output = array();
		$addons = array(
			array(
				'name' => __( 'New Shortcodes', 'universh' ),
				'desc' => __( 'Parallax sections, responsive content slider, pricing tables, vector icons, testimonials, progress bars and even more', 'universh' ),
				'url' => 'http://gndev.info/Universh/extra/',
				'image' => plugins_url( 'assets/images/banners/extra.png', WT_PLUGIN_FILE )
			),
			array(
				'name' => __( 'Maker', 'universh' ),
				'desc' => __( 'This add-on allows you to create custom shortcodes. You can easily create any shortcode with different parameters or even override default shortcodes', 'universh' ),
				'url' => 'http://gndev.info/Universh/maker/',
				'image' => plugins_url( 'assets/images/banners/maker.png', WT_PLUGIN_FILE )
			),
			array(
				'name' => __( 'Skins', 'universh' ),
				'desc' => __( 'Set of additional skins for Universh Shortcodes. It includes skins for accordeons/spoilers, tabs and some other shortcodes', 'universh' ),
				'url' => 'http://gndev.info/Universh/skins/',
				'image' => plugins_url( 'assets/images/banners/skins.png', WT_PLUGIN_FILE )
			),
			array(
				'name' => __( 'Add-ons bundle', 'universh' ),
				'desc' => __( 'Get all three add-ons with huge discount!', 'universh' ),
				'url' => 'http://gndev.info/Universh/add-ons-bundle/',
				'image' => plugins_url( 'assets/images/banners/bundle.png', WT_PLUGIN_FILE )
			),
		);
		$plugins = array();
		$output[] = '<h2>' . __( 'Universh Shortcodes Add-ons', 'universh' ) . '</h2>';
		$output[] = '<div class="wt-addons-loop wt-clearfix">';
		foreach ( $addons as $addon ) {
			$output[] = '<div class="wt-addons-item" style="visibility:hidden" data-url="' . $addon['url'] . '"><img src="' . $addon['image'] . '" alt="' . $addon['image'] . '" /><div class="wt-addons-item-content"><h4>' . $addon['name'] . '</h4><p>' . $addon['desc'] . '</p><div class="wt-addons-item-button"><a href="' . $addon['url'] . '" class="button button-primary" target="_blank">' . __( 'Learn more', 'universh' ) . '</a></div></div></div>';
		}
		$output[] = '</div>';
		if ( count( $plugins ) ) {
			$output[] = '<h2>' . __( 'Other WordPress Plugins', 'universh' ) . '</h2>';
			$output[] = '<div class="wt-addons-loop wt-clearfix">';
			foreach ( $plugins as $plugin ) {
				$output[] = '<div class="wt-addons-item" style="visibility:hidden" data-url="' . $plugin['url'] . '"><img src="' . $plugin['image'] . '" alt="' . $plugin['image'] . '" /><div class="wt-addons-item-content"><h4>' . $plugin['name'] . '</h4><p>' . $plugin['desc'] . '</p>' . Wt_Shortcodes::button( array( 'url' => $plugin['url'], 'target' => 'blank', 'style' => 'flat', 'background' => '#FF7654', 'wide' => 'yes', 'radius' => '0' ), __( 'Learn more', 'universh' ) ) . '</div></div>';
			}
			$output[] = '</div>';
		}
		wt_query_asset( 'css', array( 'animate', 'wt-options-page' ) );
		wt_query_asset( 'js', array( 'jquery', 'wt-options-page' ) );
		return '<div id="wt-addons-screen">' . implode( '', $output ) . '</div>';
	}
}
