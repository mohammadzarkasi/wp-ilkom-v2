<?php
/**
 * Class for managing plugin data
 */
class Wt_Data {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Shortcode groups
	 */
	public static function groups() {
		return apply_filters( 'ts/data/groups', array(
				'all'     => __( 'All', 'universh' ),
				'content' => __( 'Content', 'universh' ),
				'box'     => __( 'Box', 'universh' ),
				'media'   => __( 'Media', 'universh' ),
				'gallery' => __( 'Gallery', 'universh' ),
				'data'    => __( 'Data', 'universh' ),
				'universh'    => __( 'Universh', 'universh' ),
				'other'   => __( 'Other', 'universh' )
			) );
	}

	/**
	 * Border styles
	 */
	public static function borders() {
		return apply_filters( 'ts/data/borders', array(
				'none'   => __( 'None', 'universh' ),
				'solid'  => __( 'Solid', 'universh' ),
				'dotted' => __( 'Dotted', 'universh' ),
				'dashed' => __( 'Dashed', 'universh' ),
				'double' => __( 'Double', 'universh' ),
				'groove' => __( 'Groove', 'universh' ),
				'ridge'  => __( 'Ridge', 'universh' )
			) );
	}

	/**
	 * Font-Awesome icons
	 */
	public static function icons() {
		return apply_filters( 'ts/data/icons', array( 'adjust', 'adn', 'align-center', 'align-justify', 'align-left', 'align-right', 'ambulance', 'anchor', 'android', 'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 'angle-left', 'angle-right', 'angle-up', 'apple', 'archive', 'arrow-circle-down', 'arrow-circle-left', 'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'asterisk', 'automobile', 'backward', 'ban', 'bank', 'bar-chart-o', 'barcode', 'bars', 'beer', 'behance', 'behance-square', 'bell', 'bell-o', 'bitbucket', 'bitbucket-square', 'bitcoin', 'bold', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'briefcase', 'btc', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'cab', 'calendar', 'calendar-o', 'camera', 'camera-retro', 'car', 'caret-down', 'caret-left', 'caret-right', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'caret-up', 'certificate', 'chain', 'chain-broken', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'child', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clipboard', 'clock-o', 'cloud', 'cloud-download', 'cloud-upload', 'cny', 'code', 'code-fork', 'codepen', 'coffee', 'cog', 'cogs', 'columns', 'comment', 'comment-o', 'comments', 'comments-o', 'compass', 'compress', 'copy', 'credit-card', 'crop', 'crosshairs', 'css3', 'cube', 'cubes', 'cut', 'cutlery', 'dashboard', 'database', 'dedent', 'delicious', 'desktop', 'deviantart', 'digg', 'dollar', 'dot-circle-o', 'download', 'dribbble', 'dropbox', 'drupal', 'edit', 'eject', 'ellipsis-h', 'ellipsis-v', 'empire', 'envelope', 'envelope-o', 'envelope-square', 'eraser', 'eur', 'euro', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'expand', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'facebook', 'facebook-square', 'fast-backward', 'fast-forward', 'fax', 'female', 'fighter-jet', 'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-movie-o', 'file-o', 'file-pdf-o', 'file-photo-o', 'file-picture-o', 'file-powerpoint-o', 'file-sound-o', 'file-text', 'file-text-o', 'file-video-o', 'file-word-o', 'file-zip-o', 'files-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flash', 'flask', 'flickr', 'floppy-o', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'font', 'forward', 'foursquare', 'frown-o', 'gamepad', 'gavel', 'gbp', 'ge', 'gear', 'gears', 'gift', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gittip', 'glass', 'globe', 'google', 'google-plus', 'google-plus-square', 'graduation-cap', 'group', 'h-square', 'hacker-news', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'hdd-o', 'header', 'headphones', 'heart', 'heart-o', 'history', 'home', 'hospital-o', 'html5', 'image', 'inbox', 'indent', 'info', 'info-circle', 'inr', 'instagram', 'institution', 'italic', 'joomla', 'jpy', 'jsfiddle', 'key', 'keyboard-o', 'krw', 'language', 'laptop', 'leaf', 'legal', 'lemon-o', 'level-down', 'level-up', 'life-bouy', 'life-ring', 'life-saver', 'lightbulb-o', 'link', 'linkedin', 'linkedin-square', 'linux', 'list', 'list-alt', 'list-ol', 'list-ul', 'location-arrow', 'lock', 'long-arrow-down', 'long-arrow-left', 'long-arrow-right', 'long-arrow-up', 'magic', 'magnet', 'mail-forward', 'mail-reply', 'mail-reply-all', 'male', 'map-marker', 'maxcdn', 'medkit', 'meh-o', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'mobile-phone', 'money', 'moon-o', 'mortar-board', 'music', 'navicon', 'openid', 'outdent', 'pagelines', 'paper-plane', 'paper-plane-o', 'paperclip', 'paragraph', 'paste', 'pause', 'paw', 'pencil', 'pencil-square', 'pencil-square-o', 'phone', 'phone-square', 'photo', 'picture-o', 'pied-piper', 'pied-piper-alt', 'pied-piper-square', 'pinterest', 'pinterest-square', 'plane', 'play', 'play-circle', 'play-circle-o', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qq', 'qrcode', 'question', 'question-circle', 'quote-left', 'quote-right', 'ra', 'random', 'rebel', 'recycle', 'reddit', 'reddit-square', 'refresh', 'renren', 'reorder', 'repeat', 'reply', 'reply-all', 'retweet', 'rmb', 'road', 'rocket', 'rotate-left', 'rotate-right', 'rouble', 'rss', 'rss-square', 'rub', 'ruble', 'rupee', 'save', 'scissors', 'search', 'search-minus', 'search-plus', 'send', 'send-o', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'shopping-cart', 'sign-in', 'sign-out', 'signal', 'sitemap', 'skype', 'slack', 'sliders', 'smile-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-down', 'sort-numeric-asc', 'sort-numeric-desc', 'sort-up', 'soundcloud', 'space-shuttle', 'spinner', 'spoon', 'spotify', 'square', 'square-o', 'stack-exchange', 'stack-overflow', 'star', 'star-half', 'star-half-empty', 'star-half-full', 'star-half-o', 'star-o', 'steam', 'steam-square', 'step-backward', 'step-forward', 'stethoscope', 'stop', 'strikethrough', 'stumbleupon', 'stumbleupon-circle', 'subscript', 'suitcase', 'sun-o', 'superscript', 'support', 'table', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'tencent-weibo', 'terminal', 'text-height', 'text-width', 'th', 'th-large', 'th-list', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'tint', 'toggle-down', 'toggle-left', 'toggle-right', 'toggle-up', 'trash-o', 'tree', 'trello', 'trophy', 'truck', 'try', 'tumblr', 'tumblr-square', 'turkish-lira', 'twitter', 'twitter-square', 'umbrella', 'underline', 'undo', 'university', 'unlink', 'unlock', 'unlock-alt', 'unsorted', 'upload', 'usd', 'user', 'user-md', 'users', 'video-camera', 'vimeo-square', 'vine', 'vk', 'volume-down', 'volume-off', 'volume-up', 'warning', 'wechat', 'weibo', 'weixin', 'wheelchair', 'windows', 'won', 'wordpress', 'wrench', 'xing', 'xing-square', 'yahoo', 'yen', 'youtube', 'youtube-play', 'youtube-square', 'bluetooth', 'bluetooth-b', 'codiepie','credit-card-alt', 'edge', 'fort-awesome', 'hashtag', 'mixcloud', 'modx', 'pause-circle', 'pause-circle-o', 'percent', 'product-hunt', 'reddit-alien', 'scribd', 'shopping-bag', 'shopping-basket', 'stop-circle', 'stop-circle-o', 'usb' ) );
	}

	/**
	 * Animate.css animations
	 */
	public static function animations() {
		return apply_filters( 'ts/data/animations', array( 'flash', 'bounce', 'shake', 'tada', 'swing', 'wobble', 'pulse', 'flip', 'flipInX', 'flipOutX', 'flipInY', 'flipOutY', 'fadeIn', 'fadeInUp', 'fadeInDown', 'fadeInLeft', 'fadeInRight', 'fadeInUpBig', 'fadeInDownBig', 'fadeInLeftBig', 'fadeInRightBig', 'fadeOut', 'fadeOutUp', 'fadeOutDown', 'fadeOutLeft', 'fadeOutRight', 'fadeOutUpBig', 'fadeOutDownBig', 'fadeOutLeftBig', 'fadeOutRightBig', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideOutUp', 'slideOutLeft', 'slideOutRight', 'bounceIn', 'bounceInDown', 'bounceInUp', 'bounceInLeft', 'bounceInRight', 'bounceOut', 'bounceOutDown', 'bounceOutUp', 'bounceOutLeft', 'bounceOutRight', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'lightSpeedIn', 'lightSpeedOut', 'hinge', 'rollIn', 'rollOut' ) );
	}

	/**
	 * Examples section
	 */
	public static function examples() {
		return apply_filters( 'ts/data/examples', array(
				'basic' => array(
					'title' => __( 'Basic examples', 'universh' ),
					'items' => array(
						array(
							'name' => __( 'Accordions, spoilers, different styles, anchors', 'universh' ),
							'id'   => 'spoilers',
							'code' => plugin_dir_path( WT_PLUGIN_FILE ) . '/inc/examples/spoilers.example',
							'icon' => 'tasks'
						),
						array(
							'name' => __( 'Tabs, vertical tabs, tab anchors', 'universh' ),
							'id'   => 'tabs',
							'code' => plugin_dir_path( WT_PLUGIN_FILE ) . '/inc/examples/tabs.example',
							'icon' => 'folder'
						),
						array(
							'name' => __( 'Column layouts', 'universh' ),
							'id'   => 'columns',
							'code' => plugin_dir_path( WT_PLUGIN_FILE ) . '/inc/examples/columns.example',
							'icon' => 'th-large'
						),
						array(
							'name' => __( 'Media elements, YouTube, Vimeo, Screenr and self-hosted videos, audio player', 'universh' ),
							'id'   => 'media',
							'code' => plugin_dir_path( WT_PLUGIN_FILE ) . '/inc/examples/media.example',
							'icon' => 'play-circle'
						),
						array(
							'name' => __( 'Unlimited buttons', 'universh' ),
							'id'   => 'buttons',
							'code' => plugin_dir_path( WT_PLUGIN_FILE ) . '/inc/examples/buttons.example',
							'icon' => 'heart'
						),
						array(
							'name' => __( 'Animations', 'universh' ),
							'id'   => 'animations',
							'code' => plugin_dir_path( WT_PLUGIN_FILE ) . '/inc/examples/animations.example',
							'icon' => 'bolt'
						),
					)
				),
				'advanced' => array(
					'title' => __( 'Advanced examples', 'universh' ),
					'items' => array(
						array(
							'name' => __( 'Interacting with posts shortcode', 'universh' ),
							'id' => 'posts',
							'code' => plugin_dir_path( WT_PLUGIN_FILE ) . '/inc/examples/posts.example',
							'icon' => 'list'
						),
						array(
							'name' => __( 'Nested shortcodes, shortcodes inside of attributes', 'universh' ),
							'id' => 'nested',
							'code' => plugin_dir_path( WT_PLUGIN_FILE ) . '/inc/examples/nested.example',
							'icon' => 'indent'
						),
					)
				),
			) );
	}

	/**
	 * Shortcodes
	 */
	public static function shortcodes( $shortcode = false ) {
		$shortcodes = apply_filters( 'ts/data/shortcodes', array(
				// heading
				'heading' => array(
					'name' => __( 'Heading', 'universh' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'tag' => array(
							'type' => 'select',
							'values' => array(
								'h1' => __( 'H1', 'universh' ),
								'h2' => __( 'H2', 'universh' ),
								'h3' => __( 'H3', 'universh' ),
								'h4' => __( 'H4', 'universh' ),
								'h5' => __( 'H5', 'universh' ),
								'h6' => __( 'H6', 'universh' ),
							),
							'default' => 'h2',
							'name' => __( 'Select Tag', 'universh' ),
							'desc' => __( 'Choose heading tag for this heading', 'universh' ) 
						),
						'size' => array(
							'type' => 'slider',
							'min' => 7,
							'max' => 90,
							'step' => 1,
							'default' => 48,
							'name' => __( 'Size', 'universh' ),
							'desc' => __( 'Select heading size (pixels)', 'universh' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Color', 'universh' ),
							'desc' => __( 'Select heading color', 'universh' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'universh' ),
								'center' => __( 'Center', 'universh' ),
								'right' => __( 'Right', 'universh' )
							),
							'default' => 'center',
							'name' => __( 'Align', 'universh' ),
							'desc' => __( 'Heading text alignment', 'universh' )
						),
						'margin_top' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 20,
							'name' => __( 'Margin Top', 'universh' ),
							'desc' => __( 'Top margin (pixels)', 'universh' )
						),
						'margin_bottom' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 20,
							'name' => __( 'Margin Bottom', 'universh' ),
							'desc' => __( 'Bottom margin (pixels)', 'universh' )
						),
						'text_transform' => array(
							'type' => 'select',
							'values' => array(
								'uppercase' => __( 'Uppercase', 'universh' ),
								'lowercase' => __( 'Lowercase', 'universh' ),
								'capitalize' => __( 'Capitalize', 'universh' ),
							),
							'default' => 'uppercase',
							'name' => __( 'Text Tranform', 'universh' ),
							'desc' => __( 'Choose a text transform style', 'universh' )
						),
						'letter_spacing' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 40,
							'step' => 1,
							'default' => 28,
							'name' => __( 'Letter Spacing', 'universh' ),
							'desc' => __( 'Letter Spacing (pixels)', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Heading text', 'universh' ),
					'desc' => __( 'Styled heading', 'universh' ),
					'icon' => 'h-square'
				),
				// tabs
				'tabs' => array(
					'name' => __( 'Tabs', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'style_2' => __( 'Style 2', 'universh' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Choose style for this tabs', 'universh' ) . '%wt_skins_link%'
						),
						'active' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Active tab', 'universh' ),
							'desc' => __( 'Select which tab is open by default', 'universh' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'universh' ),
								'center' => __( 'Center', 'universh' ),
								'right' => __( 'Right', 'universh' )
							),
							'default' => 'center',
							'name' => __( 'Align', 'universh' ),
							'desc' => __( 'Tabs alignment', 'universh' )
						),
						'vertical' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Vertical', 'universh' ),
							'desc' => __( 'Show tabs vertically', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( "[%prefix_tab title=\"Title 1\"]Content 1[/%prefix_tab]\n[%prefix_tab title=\"Title 2\"]Content 2[/%prefix_tab]\n[%prefix_tab title=\"Title 3\"]Content 3[/%prefix_tab]", 'universh' ),
					'desc' => __( 'Tabs container', 'universh' ),
					'example' => 'tabs',
					'icon' => 'list-alt'
				),
				// tab
				'tab' => array(
					'name' => __( 'Tab', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Tab name', 'universh' ),
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'Enter tab name', 'universh' )
						),
						'disabled' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Disabled', 'universh' ),
							'desc' => __( 'Is this tab disabled', 'universh' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'universh' ),
							'desc' => __( 'You can use unique anchor for this tab to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This tab will be activated and scrolled in', 'universh' )
						),
						'url' => array(
							'default' => '',
							'name' => __( 'URL', 'universh' ),
							'desc' => __( 'You can link this tab to any webpage. Enter here full URL to switch this tab into link', 'universh' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self'  => __( 'Open link in same window/tab', 'universh' ),
								'blank' => __( 'Open link in new window/tab', 'universh' )
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'universh' ),
							'desc' => __( 'Choose how to open the custom tab link', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Tab content', 'universh' ),
					'desc' => __( 'Single tab', 'universh' ),
					'note' => __( 'Did you know that you need to wrap single tabs with [tabs] shortcode?', 'universh' ),
					'example' => 'tabs',
					'icon' => 'list-alt'
				),
				// spoiler
				'spoiler' => array(
					'name' => __( 'Spoiler', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Spoiler title', 'universh' ),
							'name' => __( 'Title', 'universh' ), 'desc' => __( 'Text in spoiler title', 'universh' )
						),
						'open' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Open', 'universh' ),
							'desc' => __( 'Is spoiler content visible by default', 'universh' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'fancy' => __( 'Fancy', 'universh' ),
								'simple' => __( 'Simple', 'universh' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Choose style for this spoiler', 'universh' ) . '%wt_skins_link%'
						),
						'icon' => array(
							'type' => 'select',
							'values' => array(
								'plus'           => __( 'Plus', 'universh' ),
								'plus-circle'    => __( 'Plus circle', 'universh' ),
								'plus-square-1'  => __( 'Plus square 1', 'universh' ),
								'plus-square-2'  => __( 'Plus square 2', 'universh' ),
								'arrow'          => __( 'Arrow', 'universh' ),
								'arrow-circle-1' => __( 'Arrow circle 1', 'universh' ),
								'arrow-circle-2' => __( 'Arrow circle 2', 'universh' ),
								'chevron'        => __( 'Chevron', 'universh' ),
								'chevron-circle' => __( 'Chevron circle', 'universh' ),
								'caret'          => __( 'Caret', 'universh' ),
								'caret-square'   => __( 'Caret square', 'universh' ),
								'folder-1'       => __( 'Folder 1', 'universh' ),
								'folder-2'       => __( 'Folder 2', 'universh' )
							),
							'default' => 'plus',
							'name' => __( 'Icon', 'universh' ),
							'desc' => __( 'Icons for spoiler', 'universh' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'universh' ),
							'desc' => __( 'You can use unique anchor for this spoiler to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This spoiler will be open and scrolled in', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Hidden content', 'universh' ),
					'desc' => __( 'Spoiler with hidden content', 'universh' ),
					'note' => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'universh' ),
					'example' => 'spoilers',
					'icon' => 'list-ul'
				),
				// accordion
				'accordion' => array(
					'name' => __( 'Accordion', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( "[%prefix_spoiler]Content[/%prefix_spoiler]\n[%prefix_spoiler]Content[/%prefix_spoiler]\n[%prefix_spoiler]Content[/%prefix_spoiler]", 'universh' ),
					'desc' => __( 'Accordion with spoilers', 'universh' ),
					'note' => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'universh' ),
					'example' => 'spoilers',
					'icon' => 'list'
				),
				// divider
				'divider' => array(
					'name' => __( 'Divider', 'universh' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'dotted'  => __( 'Dotted', 'universh' ),
								'dashed'  => __( 'Dashed', 'universh' ),
								'double'  => __( 'Double', 'universh' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Choose style for this divider', 'universh' )
						),
						'divider_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#999999',
							'name' => __( 'Divider color', 'universh' ),
							'desc' => __( 'Pick the color for divider', 'universh' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 40,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'universh' ),
							'desc' => __( 'Height of the divider (in pixels)', 'universh' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 15,
							'name' => __( 'Margin', 'universh' ),
							'desc' => __( 'Adjust the top and bottom margins of this divider (in pixels)', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Content divider with optional TOP link', 'universh' ),
					'icon' => 'ellipsis-h'
				),
				// spacer
				'spacer' => array(
					'name' => __( 'Spacer', 'universh' ),
					'type' => 'single',
					'group' => 'content other',
					'atts' => array(
						'size' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 800,
							'step' => 10,
							'default' => 20,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Height of the spacer in pixels', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Empty space with adjustable height', 'universh' ),
					'icon' => 'arrows-v'
				),
				// highlight
				'highlight' => array(
					'name' => __( 'Highlight', 'universh' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#DDFF99',
							'name' => __( 'Background', 'universh' ),
							'desc' => __( 'Highlighted text background color', 'universh' )
						),
						'color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#000000',
							'name' => __( 'Text color', 'universh' ), 'desc' => __( 'Highlighted text color', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Highlighted text', 'universh' ),
					'desc' => __( 'Highlighted text', 'universh' ),
					'icon' => 'pencil'
				),
				// color_overlay
				'color_overlay' => array(
					'name' => __( 'Background Overlay', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#000000',
							'name' => __( 'Background', 'universh' ),
							'desc' => __( 'Overlay background color', 'universh' )
						),
						'opacity' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1,
							'step' => 0.1,
							'default' => 0.5,
							'name' => __( 'Opacity', 'universh' ),
							'desc' => __( 'Choose opacity', 'universh' )
						),
						'display_style' => array(
							'type' => 'select',
							'values' => array(
								'normal' => __( 'normal', 'universh' ),
								'hover' => __( 'only hover', 'universh' ),
							),
							'default' => 'default',
							'name' => __( 'Type', 'universh' ),
							'desc' => __( 'Style of the label', 'universh' )
						),
					),
					'content' => __( '', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'pencil'
				),
				
				// label
				'label' => array(
					'name' => __( 'Label', 'universh' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'success' => __( 'Success', 'universh' ),
								'warning' => __( 'Warning', 'universh' ),
								'important' => __( 'Important', 'universh' ),
								'black' => __( 'Black', 'universh' ),
								'info' => __( 'Info', 'universh' )
							),
							'default' => 'default',
							'name' => __( 'Type', 'universh' ),
							'desc' => __( 'Style of the label', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Label', 'universh' ),
					'desc' => __( 'Styled label', 'universh' ),
					'icon' => 'tag'
				),
				// quote
				'quote' => array(
					'name' => __( 'Quote', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Choose style for this quote', 'universh' ) . '%wt_skins_link%'
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'Quote title', 'universh' )
						),
						'quote' => array(
							'values' => '',
							'default' => '',
							'name' => __( 'Quote', 'universh' ),
							'desc' => __( 'quote description', 'universh' )
						),
						'author' => array(
							'values' => '',
							'default' => '',
							'name' => __( 'Author', 'universh' ),
							'desc' => __( 'quote author name', 'universh' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Color', 'universh' ),
							'desc' => __( 'Select quote color', 'universh' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'universh' ),
								'center' => __( 'Center', 'universh' ),
								'right' => __( 'Right', 'universh' )
							),
							'default' => 'center',
							'name' => __( 'Align', 'universh' ),
							'desc' => __( 'Quote text alignment', 'universh' )
						),
					),
					'content' => __( 'Quote', 'universh' ),
					'desc' => __( 'Blockquote alternative', 'universh' ),
					'icon' => 'quote-right'
				),
				// pullquote
				'pullquote' => array(
					'name' => __( 'Pullquote', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'universh' ),
								'right' => __( 'Right', 'universh' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'universh' ), 'desc' => __( 'Pullquote alignment (float)', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Pullquote', 'universh' ),
					'desc' => __( 'Pullquote', 'universh' ),
					'icon' => 'quote-left'
				),
				// dropcap
				'dropcap' => array(
					'name' => __( 'Dropcap', 'universh' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'flat' => __( 'Flat', 'universh' ),
								'light' => __( 'Light', 'universh' ),
								'simple' => __( 'Simple', 'universh' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ), 'desc' => __( 'Dropcap style preset', 'universh' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 5,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'universh' ),
							'desc' => __( 'Choose dropcap size', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'D', 'universh' ),
					'desc' => __( 'Dropcap', 'universh' ),
					'icon' => 'bold'
				),
				// frame
				'frame' => array(
					'name' => __( 'Frame', 'universh' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'universh' ),
								'center' => __( 'Center', 'universh' ),
								'right' => __( 'Right', 'universh' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'universh' ),
							'desc' => __( 'Frame alignment', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => '<img src="http://lorempixel.com/g/400/200/" />',
					'desc' => __( 'Styled image frame', 'universh' ),
					'icon' => 'picture-o'
				),
				// row
				'row' => array(
					'name' => __( 'Row', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( "[%prefix_column size=\"1/3\"]Content[/%prefix_column]\n[%prefix_column size=\"1/3\"]Content[/%prefix_column]\n[%prefix_column size=\"1/3\"]Content[/%prefix_column]", 'universh' ),
					'desc' => __( 'Row for flexible columns', 'universh' ),
					'icon' => 'columns'
				),
				// column
				'column' => array(
					'name' => __( 'Column', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'size' => array(
							'type' => 'select',
							'values' => array(
								'1/1' => __( 'Full width', 'universh' ),
								'1/2' => __( 'One half', 'universh' ),
								'1/3' => __( 'One third', 'universh' ),
								'2/3' => __( 'Two third', 'universh' ),
								'1/4' => __( 'One fourth', 'universh' ),
								'3/4' => __( 'Three fourth', 'universh' ),
								'1/5' => __( 'One fifth', 'universh' ),
								'2/5' => __( 'Two fifth', 'universh' ),
								'3/5' => __( 'Three fifth', 'universh' ),
								'4/5' => __( 'Four fifth', 'universh' ),
								'1/6' => __( 'One sixth', 'universh' ),
								'5/6' => __( 'Five sixth', 'universh' )
							),
							'default' => '1/2',
							'name' => __( 'Size', 'universh' ),
							'desc' => __( 'Select column width. This width will be calculated depend page width', 'universh' )
						),
						'center' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Centered', 'universh' ),
							'desc' => __( 'Is this column centered on the page', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Column content', 'universh' ),
					'desc' => __( 'Flexible and responsive columns', 'universh' ),
					'note' => __( 'Did you know that you need to wrap columns with [row] shortcode?', 'universh' ),
					'example' => 'columns',
					'icon' => 'columns'
				),
				// list
				'list' => array(
					'name' => __( 'List', 'universh' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'universh' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'universh' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( "<ul>\n<li>List item</li>\n<li>List item</li>\n<li>List item</li>\n</ul>", 'universh' ),
					'desc' => __( 'Styled unordered list', 'universh' ),
					'icon' => 'list-ol'
				),
				// button
				'button' => array(
					'name' => __( 'Button', 'universh' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => get_option( 'home' ),
							'name' => __( 'Link', 'universh' ),
							'desc' => __( 'Button link', 'universh' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same tab', 'universh' ),
								'blank' => __( 'New tab', 'universh' )
							),
							'default' => 'self',
							'name' => __( 'Target', 'universh' ),
							'desc' => __( 'Button link target', 'universh' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'standard' => __( 'Standard', 'universh' ),
								'flat' => __( 'Flat', 'universh' ),
								'ghost' => __( 'Ghost', 'universh' ),
								'soft' => __( 'Soft', 'universh' ),
								'glass' => __( 'Glass', 'universh' ),
								'bubbles' => __( 'Bubbles', 'universh' ),
								'noise' => __( 'Noise', 'universh' ),
								'stroked' => __( 'Stroked', 'universh' ),
								'3d' => __( '3D', 'universh' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ), 
							'desc' => __( 'Button background style preset', 'universh' )
						),
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFFFF',
							'name' => __( 'Background', 'universh' ), 
							'desc' => __( 'Button background color', 'universh' )
						),
						'opacity' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1,
							'step' => 0.1,
							'default' => 0,
							'name' => __( 'Opacity', 'universh' ),
							'desc' => __( 'Background Opacity', 'universh' )
						),
						'background_hover' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#f3b723',
							'name' => __( 'Background Hover', 'universh' ), 
							'desc' => __( 'Button background hover color', 'universh' )
						),
						'border' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#121212',
							'name' => __( 'Border Color', 'universh' ), 
							'desc' => __( 'Border color', 'universh' )
						),
						'color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#ffffff',
							'name' => __( 'Text color', 'universh' ),
							'desc' => __( 'Button text color', 'universh' )
						),
						'color_hover' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#ffffff',
							'name' => __( 'Text color hover', 'universh' ),
							'desc' => __( 'Button text color on hover', 'universh' )
						),
						'line_height' => array(
							'type' => 'slider',
							'min' => 18,
							'max' => 100,
							'step' => 1,
							'default' => 18,
							'name' => __( 'Line Height', 'universh' ),
							'desc' => __( 'Line Height of Button text', 'universh' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'universh' ),
							'desc' => __( 'Button size', 'universh' )
						),
						'wide' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Fluid', 'universh' ), 
							'desc' => __( 'Fluid buttons has 100% width', 'universh' )
						),
						'center' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Centered', 'universh' ), 
							'desc' => __( 'Is button centered on the page', 'universh' )
						),
						'radius' => array(
							'type' => 'select',
							'values' => array(
								'auto' => __( 'Auto', 'universh' ),
								'round' => __( 'Round', 'universh' ),
								'0' => __( 'Square', 'universh' ),
								'5' => '5px',
								'10' => '10px',
								'20' => '20px',
								'30' => '30px'
							),
							'default' => 'auto',
							'name' => __( 'Radius', 'universh' ),
							'desc' => __( 'Radius of button corners. Auto-radius calculation based on button size', 'universh' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'universh' ),
							'desc' => __( 'You can upload custom icon for this box', 'universh' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#121212',
							'name' => __( 'Icon color', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'universh' )
						),
						'text_shadow' => array(
							'type' => 'shadow',
							'default' => 'none',
							'name' => __( 'Text shadow', 'universh' ),
							'desc' => __( 'Button text shadow', 'universh' )
						),
						'desc' => array(
							'default' => '',
							'name' => __( 'Description', 'universh' ),
							'desc' => __( 'Small description under button text. This option is incompatible with icon.', 'universh' )
						),
						'onclick' => array(
							'default' => '',
							'name' => __( 'onClick', 'universh' ),
							'desc' => __( 'Advanced JavaScript code for onClick action', 'universh' )
						),
						'rel' => array(
							'default' => '',
							'name' => __( 'Rel attribute', 'universh' ),
							'desc' => __( 'Here you can add value for the rel attribute.<br>Example values: <b%value>nofollow</b>, <b%value>lightbox</b>', 'universh' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title attribute', 'universh' ),
							'desc' => __( 'Here you can add value for the title attribute', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Button text', 'universh' ),
					'desc' => __( 'Styled button', 'universh' ),
					'example' => 'buttons',
					'icon' => 'heart'
				),
				
				//services
			    'services' => 
				array(
					'name' => __( 'Services', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'style_2' => __( 'Services Style 2', 'universh' ),
							),
							'default' => 'style_2',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Box style preset', 'universh' )
						),					
						),
					'content' => __( 'Single service shortcode goes here', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'check-square-o'
				),
				// service
				'service' => array(
					'name' => __( 'Service', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Style of service', 'universh' )
						),
						'title' => array(
							'values' => array( ),
							'default' => __( 'Service title', 'universh' ),
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'Service name', 'universh' )
						),
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(Uni Icons)', 'universh' ),
							'desc' => __( 'Example: icon-edit', 'universh' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'universh' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'universh' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'universh' )
						),
						'text_color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Text Color', 'universh' ),
							'desc' => __( 'service text color', 'universh' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'universh' ),
								'center' => __( 'Center', 'universh' ),
								'right' => __( 'Right', 'universh' ),
							),
							'default' => 'center',
							'name' => __( 'Align', 'universh' ),
							'desc' => __( 'Select text alignment', 'universh' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 128,
							'step' => 2,
							'default' => 32,
							'name' => __( 'Icon size', 'universh' ),
							'desc' => __( 'Size of the uploaded icon in pixels', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Service description', 'universh' ),
					'desc' => __( 'Service box with title', 'universh' ),
					'icon' => 'check-square-o'
				),
				
				// icon_box
				'icon_box' => array(
					'name' => __( 'Icon Box', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(Uni Icons)', 'universh' ),
							'desc' => __( 'Example: icon-edit', 'universh' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'universh' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'universh' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'universh' )
						),
						'icon_bg_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon Background color', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon background. Does not works with uploaded icons', 'universh' )
						),
						'box_bg_color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Box Background Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 128,
							'step' => 2,
							'default' => 32,
							'name' => __( 'Icon size', 'universh' ),
							'desc' => __( 'Size of the uploaded icon in pixels', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Box content', 'universh' ),
					'desc' => __( 'Icon box content', 'universh' ),
					'icon' => 'check-square-o'
				),
				// box
				'box' => array(
					'name' => __( 'Box', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'values' => array( ),
							'default' => __( 'Box title', 'universh' ),
							'name' => __( 'Title', 'universh' ), 'desc' => __( 'Text for the box title', 'universh' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'soft' => __( 'Soft', 'universh' ),
								'glass' => __( 'Glass', 'universh' ),
								'bubbles' => __( 'Bubbles', 'universh' ),
								'noise' => __( 'Noise', 'universh' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Box style preset', 'universh' )
						),
						'box_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Color', 'universh' ),
							'desc' => __( 'Color for the box title and borders', 'universh' )
						),
						'title_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFFFF',
							'name' => __( 'Title text color', 'universh' ), 'desc' => __( 'Color for the box title text', 'universh' )
						),
						'radius' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Radius', 'universh' ),
							'desc' => __( 'Box corners radius', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Box content', 'universh' ),
					'desc' => __( 'Colored box with caption', 'universh' ),
					'icon' => 'list-alt'
				),
				// note
				'note' => array(
					'name' => __( 'Note', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'note_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFF66',
							'name' => __( 'Background', 'universh' ), 'desc' => __( 'Note background color', 'universh' )
						),
						'text_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Text color', 'universh' ),
							'desc' => __( 'Note text color', 'universh' )
						),
						'radius' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Radius', 'universh' ), 'desc' => __( 'Note corners radius', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Note text', 'universh' ),
					'desc' => __( 'Colored box', 'universh' ),
					'icon' => 'list-alt'
				),
				// expand
				'expand' => array(
					'name' => __( 'Expand', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'more_text' => array(
							'default' => __( 'Show more', 'universh' ),
							'name' => __( 'More text', 'universh' ),
							'desc' => __( 'Enter the text for more link', 'universh' )
						),
						'less_text' => array(
							'default' => __( 'Show less', 'universh' ),
							'name' => __( 'Less text', 'universh' ),
							'desc' => __( 'Enter the text for less link', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1000,
							'step' => 10,
							'default' => 100,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Height for collapsed state (in pixels)', 'universh' )
						),
						'hide_less' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Hide less link', 'universh' ),
							'desc' => __( 'This option allows you to hide less link, when the text block has been expanded', 'universh' )
						),
						'text_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Text color', 'universh' ),
							'desc' => __( 'Pick the text color', 'universh' )
						),
						'link_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#0088FF',
							'name' => __( 'Link color', 'universh' ),
							'desc' => __( 'Pick the link color', 'universh' )
						),
						'link_style' => array(
							'type' => 'select',
							'values' => array(
								'default'    => __( 'Default', 'universh' ),
								'underlined' => __( 'Underlined', 'universh' ),
								'dotted'     => __( 'Dotted', 'universh' ),
								'dashed'     => __( 'Dashed', 'universh' ),
								'button'     => __( 'Button', 'universh' ),
							),
							'default' => 'default',
							'name' => __( 'Link style', 'universh' ),
							'desc' => __( 'Select the style for more/less link', 'universh' )
						),
						'link_align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'universh' ),
								'center' => __( 'Center', 'universh' ),
								'right' => __( 'Right', 'universh' ),
							),
							'default' => 'left',
							'name' => __( 'Link align', 'universh' ),
							'desc' => __( 'Select link alignment', 'universh' )
						),
						'more_icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'More icon', 'universh' ),
							'desc' => __( 'Add an icon to the more link', 'universh' )
						),
						'less_icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Less icon', 'universh' ),
							'desc' => __( 'Add an icon to the less link', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'This text block can be expanded', 'universh' ),
					'desc' => __( 'Expandable text block', 'universh' ),
					'icon' => 'sort-amount-asc'
				),
				// lightbox
				'lightbox' => array(
					'name' => __( 'Lightbox', 'universh' ),
					'type' => 'wrap',
					'group' => 'gallery',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'iframe' => __( 'Iframe', 'universh' ),
								'image' => __( 'Image', 'universh' ),
								'inline' => __( 'Inline (html content)', 'universh' )
							),
							'default' => 'iframe',
							'name' => __( 'Content type', 'universh' ),
							'desc' => __( 'Select type of the lightbox window content', 'universh' )
						),
						'src' => array(
							'default' => '',
							'name' => __( 'Content source', 'universh' ),
							'desc' => __( 'Insert here URL or CSS selector. Use URL for Iframe and Image content types. Use CSS selector for Inline content type.<br />Example values:<br /><b%value>http://www.youtube.com/watch?v=XXXXXXXXX</b> - YouTube video (iframe)<br /><b%value>http://example.com/wp-content/uploads/image.jpg</b> - uploaded image (image)<br /><b%value>http://example.com/</b> - any web page (iframe)<br /><b%value>#my-custom-popup</b> - any HTML content (inline)', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( '[%prefix_button] Click Here to Watch the Video [/%prefix_button]', 'universh' ),
					'desc' => __( 'Lightbox window with custom content', 'universh' ),
					'icon' => 'external-link'
				),
				// lightbox content
				'lightbox_content' => array(
					'name' => __( 'Lightbox content', 'universh' ),
					'type' => 'wrap',
					'group' => 'gallery',
					'atts' => array(
						'id' => array(
							'default' => '',
							'name' => __( 'ID', 'universh' ),
							'desc' => sprintf( __( 'Enter here the ID from Content source field. %s Example value: %s', 'universh' ), '<br>', '<b%value>my-custom-popup</b>' )
						),
						'width' => array(
							'default' => '50%',
							'name' => __( 'Width', 'universh' ),
							'desc' => sprintf( __( 'Adjust the width for inline content (in pixels or percents). %s Example values: %s, %s, %s', 'universh' ), '<br>', '<b%value>300px</b>', '<b%value>600px</b>', '<b%value>90%</b>' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 600,
							'step' => 5,
							'default' => 40,
							'name' => __( 'Margin', 'universh' ),
							'desc' => __( 'Adjust the margin for inline content (in pixels)', 'universh' )
						),
						'padding' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 600,
							'step' => 5,
							'default' => 40,
							'name' => __( 'Padding', 'universh' ),
							'desc' => __( 'Adjust the padding for inline content (in pixels)', 'universh' )
						),
						'text_align' => array(
							'type' => 'select',
							'values' => array(
								'center' => __( 'Center', 'universh' ),
								'left' => __( 'Left', 'universh' ),
								'right' => __( 'Right', 'universh' ),
								'justify' => __( 'Justify', 'universh' ),
							),
							'default' => 'center',
							'name' => __( 'Text Align', 'universh' ),
							'desc' => __( 'Choose text align', 'universh' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#FFFFFF',
							'name' => __( 'Background color', 'universh' ),
							'desc' => __( 'Pick a background color', 'universh' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Text color', 'universh' ),
							'desc' => __( 'Pick a text color', 'universh' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Text color', 'universh' ),
							'desc' => __( 'Pick a text color', 'universh' )
						),
						'shadow' => array(
							'type' => 'shadow',
							'default' => '0px 0px 15px #333333',
							'name' => __( 'Shadow', 'universh' ),
							'desc' => __( 'Adjust the shadow for content box', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Inline content', 'universh' ),
					'desc' => __( 'Inline content for lightbox', 'universh' ),
					'icon' => 'external-link'
				),
				// tooltip
				'tooltip' => array(
					'name' => __( 'Tooltip', 'universh' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'light' => __( 'Basic: Light', 'universh' ),
								'dark' => __( 'Basic: Dark', 'universh' ),
								'yellow' => __( 'Basic: Yellow', 'universh' ),
								'green' => __( 'Basic: Green', 'universh' ),
								'red' => __( 'Basic: Red', 'universh' ),
								'blue' => __( 'Basic: Blue', 'universh' ),
								'youtube' => __( 'Youtube', 'universh' ),
								'tipsy' => __( 'Tipsy', 'universh' ),
								'bootstrap' => __( 'Bootstrap', 'universh' ),
								'jtools' => __( 'jTools', 'universh' ),
								'tipped' => __( 'Tipped', 'universh' ),
								'cluetip' => __( 'Cluetip', 'universh' ),
							),
							'default' => 'yellow',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Tooltip window style', 'universh' )
						),
						'position' => array(
							'type' => 'select',
							'values' => array(
								'north' => __( 'Top', 'universh' ),
								'south' => __( 'Bottom', 'universh' ),
								'west' => __( 'Left', 'universh' ),
								'east' => __( 'Right', 'universh' )
							),
							'default' => 'top',
							'name' => __( 'Position', 'universh' ),
							'desc' => __( 'Tooltip position', 'universh' )
						),
						'shadow' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Shadow', 'universh' ),
							'desc' => __( 'Add shadow to tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'universh' )
						),
						'rounded' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Rounded corners', 'universh' ),
							'desc' => __( 'Use rounded for tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'universh' )
						),
						'size' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'1' => 1,
								'2' => 2,
								'3' => 3,
								'4' => 4,
								'5' => 5,
								'6' => 6,
							),
							'default' => 'default',
							'name' => __( 'Font size', 'universh' ),
							'desc' => __( 'Tooltip font size', 'universh' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Tooltip title', 'universh' ),
							'desc' => __( 'Enter title for tooltip window. Leave this field empty to hide the title', 'universh' )
						),
						'content' => array(
							'default' => __( 'Tooltip text', 'universh' ),
							'name' => __( 'Tooltip content', 'universh' ),
							'desc' => __( 'Enter tooltip content here', 'universh' )
						),
						'behavior' => array(
							'type' => 'select',
							'values' => array(
								'hover' => __( 'Show and hide on mouse hover', 'universh' ),
								'click' => __( 'Show and hide by mouse click', 'universh' ),
								'always' => __( 'Always visible', 'universh' )
							),
							'default' => 'hover',
							'name' => __( 'Behavior', 'universh' ),
							'desc' => __( 'Select tooltip behavior', 'universh' )
						),
						'close' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Close button', 'universh' ),
							'desc' => __( 'Show close button', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( '[%prefix_button] Hover me to open tooltip [/%prefix_button]', 'universh' ),
					'desc' => __( 'Tooltip window with custom content', 'universh' ),
					'icon' => 'comment-o'
				),
				// private
				'private' => array(
					'name' => __( 'Private', 'universh' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Private note text', 'universh' ),
					'desc' => __( 'Private note for post authors', 'universh' ),
					'icon' => 'lock'
				),
				// youtube
				'youtube' => array(
					'name' => __( 'YouTube', 'universh' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'universh' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Player width', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Player height', 'universh' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'universh' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'universh' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'universh' ),
							'desc' => __( 'Play video automatically when page is loaded', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'YouTube video', 'universh' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// youtube_advanced
				'youtube_advanced' => array(
					'name' => __( 'YouTube Advanced', 'universh' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'universh' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'universh' )
						),
						'playlist' => array(
							'default' => '',
							'name' => __( 'Playlist', 'universh' ),
							'desc' => __( 'Value is a comma-separated list of video IDs to play. If you specify a value, the first video that plays will be the VIDEO_ID specified in the URL path, and the videos specified in the playlist parameter will play thereafter', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Player width', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Player height', 'universh' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'universh' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'universh' )
						),
						'controls' => array(
							'type' => 'select',
							'values' => array(
								'no' => __( '0 - Hide controls', 'universh' ),
								'yes' => __( '1 - Show controls', 'universh' ),
								'alt' => __( '2 - Show controls when playback is started', 'universh' )
							),
							'default' => 'yes',
							'name' => __( 'Controls', 'universh' ),
							'desc' => __( 'This parameter indicates whether the video player controls will display', 'universh' )
						),
						'autohide' => array(
							'type' => 'select',
							'values' => array(
								'no' => __( '0 - Do not hide controls', 'universh' ),
								'yes' => __( '1 - Hide all controls on mouse out', 'universh' ),
								'alt' => __( '2 - Hide progress bar on mouse out', 'universh' )
							),
							'default' => 'alt',
							'name' => __( 'Autohide', 'universh' ),
							'desc' => __( 'This parameter indicates whether the video controls will automatically hide after a video begins playing', 'universh' )
						),
						'showinfo' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show title bar', 'universh' ),
							'desc' => __( 'If you set the parameter value to NO, then the player will not display information like the video title and uploader before the video starts playing.', 'universh' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'universh' ),
							'desc' => __( 'Play video automatically when page is loaded', 'universh' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'universh' ),
							'desc' => __( 'Setting of YES will cause the player to play the initial video again and again', 'universh' )
						),
						'rel' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Related videos', 'universh' ),
							'desc' => __( 'This parameter indicates whether the player should show related videos when playback of the initial video ends', 'universh' )
						),
						'fs' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show full-screen button', 'universh' ),
							'desc' => __( 'Setting this parameter to NO prevents the fullscreen button from displaying', 'universh' )
						),
						'modestbranding' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => 'modestbranding',
							'desc' => __( 'This parameter lets you use a YouTube player that does not show a YouTube logo. Set the parameter value to YES to prevent the YouTube logo from displaying in the control bar. Note that a small YouTube text label will still display in the upper-right corner of a paused video when the user\'s mouse pointer hovers over the player', 'universh' )
						),
						'theme' => array(
							'type' => 'select',
							'values' => array(
								'dark' => __( 'Dark theme', 'universh' ),
								'light' => __( 'Light theme', 'universh' )
							),
							'default' => 'dark',
							'name' => __( 'Theme', 'universh' ),
							'desc' => __( 'This parameter indicates whether the embedded player will display player controls (like a play button or volume control) within a dark or light control bar', 'universh' )
						),
						'https' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Force HTTPS', 'universh' ),
							'desc' => __( 'Use HTTPS in player iframe', 'universh' )
						),
						'wmode' => array(
							'default' => '',
							'name'    => __( 'WMode', 'universh' ),
							'desc'    => sprintf( __( 'Here you can specify wmode value for the embed URL. %s Example values: %s, %s', 'universh' ), '<br>', '<b%value>transparent</b>', '<b%value>opaque</b>' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'YouTube video player with advanced settings', 'universh' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// vimeo
				'vimeo' => array(
					'name' => __( 'Vimeo', 'universh' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'universh' ), 'desc' => __( 'Url of Vimeo page with video', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Player width', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Player height', 'universh' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'universh' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'universh' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'universh' ),
							'desc' => __( 'Play video automatically when page is loaded', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Vimeo video', 'universh' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// screenr
				'screenr' => array(
					'name' => __( 'Screenr', 'universh' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'default' => '',
							'name' => __( 'Url', 'universh' ),
							'desc' => __( 'Url of Screenr page with video', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Player width', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Player height', 'universh' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'universh' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Screenr video', 'universh' ),
					'icon' => 'youtube-play'
				),
				// dailymotion
				'dailymotion' => array(
					'name' => __( 'Dailymotion', 'universh' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'default' => '',
							'name' => __( 'Url', 'universh' ),
							'desc' => __( 'Url of Dailymotion page with video', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Player width', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Player height', 'universh' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'universh' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'universh' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'universh' ),
							'desc' => __( 'Start the playback of the video automatically after the player load. May not work on some mobile OS versions', 'universh' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#FFC300',
							'name' => __( 'Background color', 'universh' ),
							'desc' => __( 'HTML color of the background of controls elements', 'universh' )
						),
						'foreground' => array(
							'type' => 'color',
							'default' => '#F7FFFD',
							'name' => __( 'Foreground color', 'universh' ),
							'desc' => __( 'HTML color of the foreground of controls elements', 'universh' )
						),
						'highlight' => array(
							'type' => 'color',
							'default' => '#171D1B',
							'name' => __( 'Highlight color', 'universh' ),
							'desc' => __( 'HTML color of the controls elements\' highlights', 'universh' )
						),
						'logo' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show logo', 'universh' ),
							'desc' => __( 'Allows to hide or show the Dailymotion logo', 'universh' )
						),
						'quality' => array(
							'type' => 'select',
							'values' => array(
								'240'  => '240',
								'380'  => '380',
								'480'  => '480',
								'720'  => '720',
								'1080' => '1080'
							),
							'default' => '380',
							'name' => __( 'Quality', 'universh' ),
							'desc' => __( 'Determines the quality that must be played by default if available', 'universh' )
						),
						'related' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show related videos', 'universh' ),
							'desc' => __( 'Show related videos at the end of the video', 'universh' )
						),
						'info' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show video info', 'universh' ),
							'desc' => __( 'Show videos info (title/author) on the start screen', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Dailymotion video', 'universh' ),
					'icon' => 'youtube-play'
				),
				// audio
				'audio' => array(
					'name' => __( 'Audio', 'universh' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'universh' ),
							'desc' => __( 'Audio file url. Supported formats: mp3, ogg', 'universh' )
						),
						'width' => array(
							'values' => array(),
							'default' => '100%',
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Player width. You can specify width in percents and player will be responsive. Example values: <b%value>200px</b>, <b%value>100&#37;</b>', 'universh' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'universh' ),
							'desc' => __( 'Play file automatically when page is loaded', 'universh' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'universh' ),
							'desc' => __( 'Repeat when playback is ended', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Custom audio player', 'universh' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// video
				'video' => array(
					'name' => __( 'Video', 'universh' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'universh' ),
							'desc' => __( 'Url to mp4/flv video-file', 'universh' )
						),
						'poster' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Poster', 'universh' ),
							'desc' => __( 'Url to poster image, that will be shown before playback', 'universh' )
						),
						'title' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'Player title', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Player width', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 300,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Player height', 'universh' )
						),
						'controls' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Controls', 'universh' ),
							'desc' => __( 'Show player controls (play/pause etc.) or not', 'universh' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'universh' ),
							'desc' => __( 'Play file automatically when page is loaded', 'universh' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'universh' ),
							'desc' => __( 'Repeat when playback is ended', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Custom video player', 'universh' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// custom_video
				'custom_video' => array(
					'name' => __( 'Custom Video', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'url' => array(
							'type' => 'text',
							'default' => 'wYKDff_94Kw',
							'name' => __( 'Youtube Video ID', 'universh' ),
							'desc' => __( 'Example: wYKDff_94Kw', 'universh' )
						),
						'poster' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Poster', 'universh' ),
							'desc' => __( 'poster', 'universh' )
						),
						'video_control' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Video Control', 'universh' ),
							'desc' => __( 'show video control', 'universh' )
						),
						'full_screen' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Screen Size Full', 'universh' ),
							'desc' => __( 'screen size full or small', 'universh' )
						),
					),
					'desc' => __( 'Custom video player', 'universh' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// custom_audio
				'custom_audio' => array(
					'name' => __( 'Custom Audio', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'universh' ),
							'desc' => __( 'Url of audio file', 'universh' )
						),
					),
					'desc' => __( 'Custom audio player', 'universh' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// table
				'table' => array(
					'name' => __( 'Table', 'universh' ),
					'type' => 'mixed',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'style2' => __( 'Style 2', 'universh' ),
								'style3' => __( 'Style 3', 'universh' ),
								'style4' => __( 'Style 4', 'universh' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Choose style for this table', 'universh' ) . '%wt_skins_link%'
						),
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'CSV file', 'universh' ),
							'desc' => __( 'Upload CSV file if you want to create HTML-table from file', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( "<table>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n</table>", 'universh' ),
					'desc' => __( 'Styled table from HTML or CSV file', 'universh' ),
					'icon' => 'table'
				),
				// alert_box
				'alert_box' => array(
					'name' => __( 'Alert Box', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'success' => __( 'Success', 'universh' ),
								'danger' => __( 'Error', 'universh' ),
								'warning' => __( 'Warning', 'universh' ),
								'info' => __( 'Information', 'universh' ),
							),
							'default' => 'success',
							'name' => __( 'Alert Type', 'universh' ),
							'desc' => __( 'Choose alert type', 'universh' ) . '%wt_skins_link%'
						),
						'dismiss' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Dismissable', 'universh' ),
							'desc' => __( 'alert dismissable or not', 'universh' )
						),
						'text' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Alert Text', 'universh' ),
							'desc' => __( 'Write your confirmation text here', 'universh' )
						),
						'link_text' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Link Text', 'universh' ),
							'desc' => __( 'Write your link text here', 'universh' )
						),
						'link_url' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Link URL', 'universh' ),
							'desc' => __( 'Write your URL here', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( "", 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'table'
				),
				// permalink
				'permalink' => array(
					'name' => __( 'Permalink', 'universh' ),
					'type' => 'mixed',
					'group' => 'content other',
					'atts' => array(
						'id' => array(
							'values' => array( ), 'default' => 1,
							'name' => __( 'ID', 'universh' ),
							'desc' => __( 'Post or page ID', 'universh' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same tab', 'universh' ),
								'blank' => __( 'New tab', 'universh' )
							),
							'default' => 'self',
							'name' => __( 'Target', 'universh' ),
							'desc' => __( 'Link target. blank - link will be opened in new window/tab', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => '',
					'desc' => __( 'Permalink to specified post/page', 'universh' ),
					'icon' => 'link'
				),
				// members
				'members' => array(
					'name' => __( 'Members', 'universh' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'message' => array(
							'default' => __( 'This content is for registered users only. Please %login%.', 'universh' ),
							'name' => __( 'Message', 'universh' ), 'desc' => __( 'Message for not logged users', 'universh' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffcc00',
							'name' => __( 'Box color', 'universh' ), 'desc' => __( 'This color will applied only to box for not logged users', 'universh' )
						),
						'login_text' => array(
							'default' => __( 'login', 'universh' ),
							'name' => __( 'Login link text', 'universh' ), 'desc' => __( 'Text for the login link', 'universh' )
						),
						'login_url' => array(
							'default' => wp_login_url(),
							'name' => __( 'Login link url', 'universh' ), 'desc' => __( 'Login link url', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Content for logged members', 'universh' ),
					'desc' => __( 'Content for logged in members only', 'universh' ),
					'icon' => 'lock'
				),
				// guests
				'guests' => array(
					'name' => __( 'Guests', 'universh' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Content for guests', 'universh' ),
					'desc' => __( 'Content for guests only', 'universh' ),
					'icon' => 'user'
				),
				// feed
				'feed' => array(
					'name' => __( 'RSS Feed', 'universh' ),
					'type' => 'single',
					'group' => 'content other',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'universh' ),
							'desc' => __( 'Url to RSS-feed', 'universh' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Limit', 'universh' ), 'desc' => __( 'Number of items to show', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Feed grabber', 'universh' ),
					'icon' => 'rss'
				),
				// menu
				'menu' => array(
					'name' => __( 'Menu', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'name' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Menu name', 'universh' ), 'desc' => __( 'Custom menu name. Ex: Main menu', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Custom menu by name', 'universh' ),
					'icon' => 'bars'
				),
				// subpages
				'subpages' => array(
					'name' => __( 'Sub pages', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'depth' => array(
							'type' => 'select',
							'values' => array( 1, 2, 3, 4, 5 ), 'default' => 1,
							'name' => __( 'Depth', 'universh' ),
							'desc' => __( 'Max depth level of children pages', 'universh' )
						),
						'p' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Parent ID', 'universh' ),
							'desc' => __( 'ID of the parent page. Leave blank to use current page', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'List of sub pages', 'universh' ),
					'icon' => 'bars'
				),
				// siblings
				'siblings' => array(
					'name' => __( 'Siblings', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'depth' => array(
							'type' => 'select',
							'values' => array( 1, 2, 3 ), 'default' => 1,
							'name' => __( 'Depth', 'universh' ),
							'desc' => __( 'Max depth level', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'List of cureent page siblings', 'universh' ),
					'icon' => 'bars'
				),
				// document
				'document' => array(
					'name' => __( 'Document', 'universh' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Url', 'universh' ),
							'desc' => __( 'Url to uploaded document. Supported formats: doc, xls, pdf etc.', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Viewer width', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Viewer height', 'universh' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'universh' ),
							'desc' => __( 'Ignore width and height parameters and make viewer responsive', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Document viewer by Google', 'universh' ),
					'icon' => 'file-text'
				),
				// gmap
				'gmap' => array(
					'name' => __( 'Gmap', 'universh' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Map width', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Map height', 'universh' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'universh' ),
							'desc' => __( 'Ignore width and height parameters and make map responsive', 'universh' )
						),
						'address' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Marker', 'universh' ),
							'desc' => __( 'Address for the marker. You can type it in any language', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Maps by Google', 'universh' ),
					'icon' => 'globe'
				),
				
				// bg_map
				'bg_map' => array(
					'name' => __( 'Background Gmap', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'maker_title' => array(
							'type' => 'text',
							'default' => 'Autin',
							'name' => __( 'Title of Maker', 'universh' ),
							'desc' => __('Write your maker title', 'universh'),
						),
						'maker_description' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Maker Description', 'universh' ),
							'desc' => __('Map Description', 'universh'),
						),
						'latitude' => array(
							'values' => '',
							'default' => '-35.2835',
							'name' => __( 'Latitude', 'universh' ),
							'desc' => __( 'Get Latitude value from this <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">site</a>.', 'universh' )
						),
						'longitude' => array(
							'default' => '149.128',
							'name' => __( 'Longitude', 'universh' ),
							'desc' => __( 'Get Longitude value from this <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">site</a>.', 'universh' )
						),
						'type' => array(
							'type' => 'select',
							'values' => array(
								'roadmap'       => __( 'Roadmap', 'universh' ),
								'satellite'      => __( 'Satellite', 'universh' ),
								'hybrid'   => __( 'Hybrid', 'universh' ),
								'terrain'     => __( 'Terrain', 'universh' ),
							),
							'default' => 'roadmap',
							'name' => __( 'Map Type', 'universh' ),
							'desc' => __( 'Map type', 'universh' )
						),
						'marker_image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Marker Image', 'universh' ),
							'desc' => __( 'Upload marker image', 'universh' )
						),
						'hue' => array(
							'type' => 'color',
							'default' => '',
							'name' => __( 'Hue', 'universh' ),
							'desc' => __( 'Hue of map', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1000,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Height of Map', 'universh' )
						)
					),
					'desc' => __( 'Maps by Google', 'universh' ),
					'icon' => 'globe'
				),
				
				// slider
				'slider' => array(
					'name' => __( 'Slider', 'universh' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'universh' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'universh' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'universh' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'universh' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'universh' ),
								'image'      => __( 'Full-size image', 'universh' ),
								'lightbox'   => __( 'Lightbox', 'universh' ),
								'custom'     => __( 'Slide link (added in media editor)', 'universh' ),
								'attachment' => __( 'Attachment page', 'universh' ),
								'post'       => __( 'Post permalink', 'universh' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'universh' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'universh' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same window', 'universh' ),
								'blank' => __( 'New window', 'universh' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'universh' ),
							'desc' => __( 'Open links in', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'universh' ), 'desc' => __( 'Slider width (in pixels)', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 300,
							'name' => __( 'Height', 'universh' ), 'desc' => __( 'Slider height (in pixels)', 'universh' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'universh' ),
							'desc' => __( 'Ignore width and height parameters and make slider responsive', 'universh' )
						),
						'title' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show titles', 'universh' ), 'desc' => __( 'Display slide titles', 'universh' )
						),
						'centered' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Center', 'universh' ), 'desc' => __( 'Is slider centered on the page', 'universh' )
						),
						'arrows' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Arrows', 'universh' ), 'desc' => __( 'Show left and right arrows', 'universh' )
						),
						'pages' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Pagination', 'universh' ),
							'desc' => __( 'Show pagination', 'universh' )
						),
						'mousewheel' => array(
							'type' => 'bool',
							'default' => 'yes', 'name' => __( 'Mouse wheel control', 'universh' ),
							'desc' => __( 'Allow to change slides with mouse wheel', 'universh' )
						),
						'autoplay' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 100000,
							'step' => 100,
							'default' => 5000,
							'name' => __( 'Autoplay', 'universh' ),
							'desc' => __( 'Choose interval between slide animations. Set to 0 to disable autoplay', 'universh' )
						),
						'speed' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 20000,
							'step' => 100,
							'default' => 600,
							'name' => __( 'Speed', 'universh' ), 'desc' => __( 'Specify animation speed', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Customizable image slider', 'universh' ),
					'icon' => 'picture-o'
				),
				
				// carousel
				'carousel' => array(
					'name' => __( 'Carousel', 'universh' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default'       => __( 'Default', 'universh' ),
								'style_2'      => __( 'Style 2', 'universh' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Select style of carousel', 'universh' )
						),
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'universh' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'universh' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'universh' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'universh' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'universh' ),
								'image'      => __( 'Full-size image', 'universh' ),
								'lightbox'   => __( 'Lightbox', 'universh' ),
								'custom'     => __( 'Slide link (added in media editor)', 'universh' ),
								'attachment' => __( 'Attachment page', 'universh' ),
								'post'       => __( 'Post permalink', 'universh' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'universh' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'universh' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same window', 'universh' ),
								'blank' => __( 'New window', 'universh' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'universh' ),
							'desc' => __( 'Open links in', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 100,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Carousel width (in pixels)', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 20,
							'max' => 1600,
							'step' => 20,
							'default' => 100,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Carousel height (in pixels)', 'universh' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'universh' ),
							'desc' => __( 'Ignore width and height parameters and make carousel responsive', 'universh' )
						),
						'items' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Items to show', 'universh' ),
							'desc' => __( 'How much carousel items is visible', 'universh' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 50,
							'step' => 1,
							'default' => 0,
							'name' => __( 'Margin', 'universh' ),
							'desc' => __( 'only applied for style 2', 'universh' )
						),
						'scroll' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 20,
							'step' => 1, 'default' => 1,
							'name' => __( 'Scroll number', 'universh' ),
							'desc' => __( 'How much items are scrolled in one transition', 'universh' )
						),
						'title' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show titles', 'universh' ), 'desc' => __( 'Display titles for each item', 'universh' )
						),
						'centered' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Center', 'universh' ), 'desc' => __( 'Is carousel centered on the page', 'universh' )
						),
						'arrows' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Arrows', 'universh' ), 'desc' => __( 'Show left and right arrows', 'universh' )
						),
						'pages' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Pagination', 'universh' ),
							'desc' => __( 'Show pagination', 'universh' )
						),
						'mousewheel' => array(
							'type' => 'bool',
							'default' => 'yes', 'name' => __( 'Mouse wheel control', 'universh' ),
							'desc' => __( 'Allow to rotate carousel with mouse wheel', 'universh' )
						),
						'autoplay' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 100000,
							'step' => 100,
							'default' => 5000,
							'name' => __( 'Autoplay', 'universh' ),
							'desc' => __( 'Choose interval between auto animations. Set to 0 to disable autoplay', 'universh' )
						),
						'speed' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 20000,
							'step' => 100,
							'default' => 600,
							'name' => __( 'Speed', 'universh' ), 'desc' => __( 'Specify animation speed', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Customizable image carousel', 'universh' ),
					'icon' => 'picture-o'
				),
				
				//Featured Lists
				'featured_lists' => 
				array(
					'name' => __( 'Featured Lists', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(	
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Heading of Lists', 'universh' ),
							'desc' => __('Write your featured list heading', 'universh'),
						),					
						'desc' => array(
							'type' => 'textarea',
							'default' => '',
							'name' => __( 'List Description', 'universh' ),
							'desc' => __( '', 'universh' )
						),
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'list'
				),
				//Featured List
				'featured_list' => 
				array(
					'name' => __( 'Featured List', 'universh' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(	
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'List Title', 'universh' ),
							'desc' => __('Write your featured list title', 'universh'),
						),					
						'desc' => array(
							'type' => 'textarea',
							'default' => '',
							'name' => __( 'List Description', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Choose Icon', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#fa9000',
							'name' => __( 'Icon color', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'list'
				),
				
				//Testimonial group
			    'testimonials' => 
				array(
					'name' => __( 'Testimonials', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
							),
							'default' => 'Default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'item_show' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 4,
							'step' => 1,
							'default' => 2,
							'name' => __( 'Item Show', 'universh' ),
							'desc' => __( 'item show in a slide', 'universh' )
						),
						),
					'content' => __( 'Single testimonial shortcode goes here', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'recycle'
				),

			//Testimonial
			'testimonial' => 
				array(
					'name' => __( 'Testimonial', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'style2' => __( 'Style 2', 'universh' ),
							),
							'default' => 'Default',

							'name' => __( 'Style', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'name' => array(
							'type' => 'text',
							'default' => 'John Mathew',
							'name' => __( 'Name', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'title' => array(
							'type' => 'text',
							'default' => 'Parent',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Photo', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#252525',
							'name' => __( 'Background', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'quote-left'
				),
				
				//Icons
				'icons' => 
				array(
					'name' => __( 'Icon', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(Uni Icons)', 'universh' ),
							'desc' => __( 'Example: icon-edit', 'universh' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'universh' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'universh' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'universh' )
						),
						'font_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 40,
							'name' => __( 'Font Size', 'universh' ),
							'desc' => __( 'Font size of Title(in pixels)', 'universh' )
						),
						'icon_align' => array(
							'type' => 'select',
							'values' => array(
								'left'   => __( 'Left', 'universh' ),
								'center' => __( 'Center', 'universh' ),
								'right'  => __( 'Right', 'universh' )
							),
							'default' => 'center',
							'name' => __( 'Icon alignment', 'universh' ),
							'desc' => __( 'Select the icon alignment', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'indent'
				),
				
				//Icons
				'icons_info' => 
				array(
					'name' => __( 'Icon With Info', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'universh' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'universh' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#f3b723',
							'name' => __( 'Icon color', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'universh' )
						),
						'font_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 28,
							'name' => __( 'Font Size', 'universh' ),
							'desc' => __( 'Font size of icon(in pixels)', 'universh' )
						),
						'title' => array(
							'type' => 'text',
							'default' => 'Australia Office',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'Title of icon', 'universh' )
						),
						'icon_des' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Description', 'universh' ),
							'desc' => __( 'Description of icon', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Lorem ipsum dol sit  amet et test description..', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'indent'
				),
				
				//counter
				'counters' => 
				array(
					'name' => __( 'Counters', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'counter description', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'check-square-o'
				),
				
				//counter
				'counter_up' => 
				array(
					'name' => __( 'Counter', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'style_2' => __( 'Style 2', 'universh' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(Uni Icons)', 'universh' ),
							'desc' => __( 'Example: icon-edit', 'universh' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'universh' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'universh' )
						),
						'background_color' => array(
							'type' => 'color',
							'default' => '#111111',
							'name' => __( 'Background Color', 'universh' ),
							'desc' => __( 'Background color of box', 'universh' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 128,
							'step' => 2,
							'default' => 32,
							'name' => __( 'Icon size', 'universh' ),
							'desc' => __( 'Size of the uploaded icon in pixels', 'universh' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Color', 'universh' ),
							'desc' => __( 'Color of counter icon, title and number.', 'universh' )
						),
						'number' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100000,
							'step' => 1,
							'default' => 1000,
							'name' => __( 'Total number', 'universh' ),
							'desc' => __( 'This is count up from zero.', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'counter description', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'check-square-o'
				),
				
				//countdown
				'countdown' => 
				array(
					'name' => __( 'Countdown', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'comingsooon' => __( 'Default', 'universh' ),
								'hero' => __( 'Style 2', 'universh' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'year' => array(
							'type' => 'text',
							'default' => '2016',
							'name' => __( 'Year', 'universh' ),
							'desc' => __( 'Formate: 2016', 'universh' )
						),
						'month' => array(
							'type' => 'text',
							'default' => '12',
							'name' => __( 'Month', 'universh' ),
							'desc' => __( 'Formate: 01', 'universh' )
						),
						'date' => array(
							'type' => 'text',
							'default' => '02',
							'name' => __( 'Date', 'universh' ),
							'desc' => __( 'Formate: 02', 'universh' )
						),
					),
					'content' => __( 'counter description', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'check-square-o'
				),
				
				//owl_sliders
				'owl_sliders' => 
				array(
					'name' => __( 'Owl sliders', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'navigation' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Navigation', 'universh' ),
							'desc' => __( '', 'universh' )
						),
					),
					'content' => __( 'Owl sliders item shortcode goes here', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'check-square-o'
				),
				
				//owl_slider
				'owl_slider' => 
				array(
					'name' => __( 'Owl Slider', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Slider Image', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'description' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Description', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'button_text' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Button Text', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'button_link' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Button Link', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'text_type' => array(
							'type' => 'select',
							'values' => array(
								'light' => __( 'Light', 'universh' ),
								'dark' => __( 'Dark', 'universh' ),
							),
							'default' => 'dark',
							'name' => __( 'Text Type', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'left_margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 9,
							'step' => 1,
							'default' => 0,
							'name' => __( 'Offset', 'universh' ),
							'desc' => __( '', 'universh' )
						),
					),
					'content' => __( '', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'check-square-o'
				),
				
				//offer
				'offer' => 
				array(
					'name' => __( 'Offer', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'desc' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Description', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'button_text' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Button Text', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'form_action' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Form Action', 'universh' ),
							'desc' => __( '', 'universh' )
						),
					),
					'content' => __( 'Offer list shortcode goes here', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'check-square-o'
				),
				
				//offer_list
				'offer_list' => 
				array(
					'name' => __( 'Offer List', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( '', 'universh' )
						),
					),
					'content' => __( 'list of offers', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'check-square-o'
				),
				
				//Partners
				'partners' => 
				array(
					'name' => __( 'Partners', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
							),
							'default' => 'Default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'item_show' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 6,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Item Show', 'universh' ),
							'desc' => __( 'item show in a slide', 'universh' )
						),
						'nav' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Next Prev Nav', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'nav_style' => array(
							'type' => 'select',
							'values' => array(
								'navigation-color' => __( 'Color Nav', 'universh' ),
								'nav-dark' => __( 'Nav Dark', 'universh' ),
							),
							'default' => 'navigation-color',
							'name' => __( 'Nav Style', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'nav_position' => array(
							'type' => 'select',
							'values' => array(
								'top' => __( 'Top', 'universh' ),
								'leftright' => __( 'Left Right', 'universh' ),
							),
							'default' => 'top',
							'name' => __( 'Nav Position', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'dots' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Dots nav', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Single partner shortcode here...', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'users'
				),
				
				//Partner
				'partner' => 
				array(
					'name' => __( 'Partner', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Upload Partners Image', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'image_link' => array(
							'type' => 'text',
							'default' => '#',
							'name' => __( 'Image Link', 'universh' ),
							'desc' => __('', 'universh'),
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'partner description', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'users'
				),
				
				// custom_gallery
				'custom_gallery' => array(
					'name' => __( 'Gallery', 'universh' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'universh' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'universh' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'universh' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'universh' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'universh' ),
								'image'      => __( 'Full-size image', 'universh' ),
								'lightbox'   => __( 'Lightbox', 'universh' ),
								'custom'     => __( 'Slide link (added in media editor)', 'universh' ),
								'attachment' => __( 'Attachment page', 'universh' ),
								'post'       => __( 'Post permalink', 'universh' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'universh' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'universh' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same window', 'universh' ),
								'blank' => __( 'New window', 'universh' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'universh' ),
							'desc' => __( 'Open links in', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 90,
							'name' => __( 'Width', 'universh' ), 'desc' => __( 'Single item width (in pixels)', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 90,
							'name' => __( 'Height', 'universh' ), 'desc' => __( 'Single item height (in pixels)', 'universh' )
						),
						'title' => array(
							'type' => 'select',
							'values' => array(
								'never' => __( 'Never', 'universh' ),
								'hover' => __( 'On mouse over', 'universh' ),
								'always' => __( 'Always', 'universh' )
							),
							'default' => 'hover',
							'name' => __( 'Show titles', 'universh' ),
							'desc' => __( 'Title display mode', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Customizable image gallery', 'universh' ),
					'icon' => 'picture-o'
				),
				
				// banner_slider
				'banner_slider' => array(
					'name' => __( 'Banner Slider', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'universh' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'universh' )
						),
						'previous_image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Previous image', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'next_image' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Next image', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 1400,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Image width', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 700,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Image height', 'universh' )
						),					
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Customizable banner slider', 'universh' ),
					'icon' => 'picture-o'
				),
				
				//lists
				'lists' => 
				array(
					'name' => __( 'Lists', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
							),
							'default' => 'Default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( '', 'universh' )
						),
					),
					'content' => __( 'single list here...', 'universh' ),
					'desc' => __( '', 'universh' ),
					'icon' => 'users'
				),
				//single_list
				'single_list' => 
				array(
					'name' => __( 'Single List', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'text' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'List Text', 'universh' ),
							'desc' => __( 'list text here', 'universh' )
						),
					),
					'desc' => __( '', 'universh' ),
					'icon' => 'users'
				),
				
				//panel
				'panel' => 
				array(
					'name' => __( 'Panel', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'primary' => __( 'Primary', 'universh' ),
								'success' => __( 'Success', 'universh' ),
								'info' => __( 'Info', 'universh' ),
								'warning' => __( 'Warning', 'universh' ),
								'danger' => __( 'Danger', 'universh' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Style of panel', 'universh' )
						),
						'header_text' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'Panel title', 'universh' )
						),
						'footer_text' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Footer text', 'universh' ),
							'desc' => __( 'Panel footer text', 'universh' )
						),
					),
					'desc' => __( '', 'universh' ),
					'icon' => 'users'
				),
				
				//pie_chart
				'pie_chart' => 
				array(
					'name' => __( 'Pie Chart', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'values' => '',
							'default' => 'Maths',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'chart title', 'universh' )
						),
						'percent' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 70,
							'name' => __( 'Percent', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'barcolor' => array(
							'type' => 'color',
							'default' => '#2196f3',
							'name' => __( 'Bar Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'trackcolor' => array(
							'type' => 'color',
							'default' => '',
							'name' => __( 'Track Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'text_color' => array(
							'type' => 'color',
							'default' => '',
							'name' => __( 'Text Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'linewidth' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 10,
							'step' => 1,
							'default' => 2,
							'name' => __( 'Line Width', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 50,
							'max' => 1000,
							'step' => 1,
							'default' => 200,
							'name' => __( 'Size', 'universh' ),
							'desc' => __( '', 'universh' )
						),
					),
					'desc' => __( '', 'universh' ),
					'icon' => 'users'
				),
				
				//progress_bar
				'progress_bar' => 
				array(
					'name' => __( 'Progress Bar', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'title' => array(
							'type' => 'text',
							'values' => '',
							'default' => 'Maths',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'chart title', 'universh' )
						),
						'title_color' => array(
							'type' => 'color',
							'default' => '#262626',
							'name' => __( 'Title Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'title_font_size' => array(
							'type' => 'slider',
							'min' => 12,
							'max' => 60,
							'step' => 1,
							'default' => 24,
							'name' => __( 'Title Font Size', 'universh' ),
							'desc' => __( 'font size in px', 'universh' )
						),
						'percent' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 70,
							'name' => __( 'Percent', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 50,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'bar_color' => array(
							'type' => 'color',
							'default' => '#f5f5f5',
							'name' => __( 'Bar Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'activecolor' => array(
							'type' => 'color',
							'default' => '#2196f3',
							'name' => __( 'Active Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'text_color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Text Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
					),
					'desc' => __( '', 'universh' ),
					'icon' => 'users'
				),
				
				// contact_info
				'contact_address' => array(
					'name' => __( 'Content Box', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
					    'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'style_2' => __( 'Style 2', 'universh' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Style of icons', 'universh' )
						),						
						'et_icon' => array(
							'default' => '',
							'name' => __( 'Icon(Uni Icons)', 'universh' ),
							'desc' => __( 'Example: icon-edit', 'universh' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'universh' ),
							'desc' => __( 'select icon from here, You can upload custom icon for this box', 'universh' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'universh' )
						),
						'icon_bg' => array(
							'type' => 'color',
							'default' => '#252525',
							'name' => __( 'Icon Background', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon background', 'universh' )
						),
						'content_box_bg' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Content Background', 'universh' ),
							'desc' => __( 'This color will be applied to the selected icon background', 'universh' )
						),
						'content_color' => array(
							'type' => 'color',
							'default' => '#262626',
							'name' => __( 'Content Text color', 'universh' ),
							'desc' => __( 'This color will be applied to the content text color', 'universh' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 128,
							'step' => 2,
							'default' => 32,
							'name' => __( 'Icon size', 'universh' ),
							'desc' => __( 'Size of the uploaded icon in pixels', 'universh' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'universh' ),
								'center' => __( 'Center', 'universh' ),
								'right' => __( 'Right', 'universh' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'universh' ),
							'desc' => __( 'text and icon alignment', 'universh' )
						),
						'shadow' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Shadow', 'universh' ),
							'desc' => __( 'Box shadow', 'universh' )
						),
						'inline' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Inline', 'universh' ),
							'desc' => __( 'Show icon inline', 'universh' )
						),
						'address' => array(
							'type' => 'textarea',
							'values' => '',
							'default' => '',
							'name' => __( 'Content', 'universh' ),
							'desc' => __( 'Content of box', 'universh' )
						),
					),
					'desc' => __( 'contact details goes here...', 'universh' ),
					'icon' => 'users'
				),
				
				// bg_content
				'bg_content' => array(
					'name' => __( 'Content With Background Image', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(						
						'bg' => array(
							'type' => 'upload',
							'values' => '',
							'default' => '',
							'name' => __( 'Background', 'universh' ),
							'desc' => __( 'background image of main div', 'universh' )
						),
					),
					'desc' => __( 'content goes here...', 'universh' ),
					'icon' => 'image'
				),
				
				// text_color
				'text_color' => array(
					'name' => __( 'Text Color', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(						
						'color' => array(
							'type' => 'color',
							'values' => '',
							'default' => '#ef4416',
							'name' => __( 'Color', 'universh' ),
							'desc' => __( 'Select color of text', 'universh' )
						),
					),
					'desc' => __( 'text goes here...', 'universh' ),
					'icon' => 'image'
				),
				
				// social_icons
				'social_icons' => array(
					'name' => __( 'Socials Icons', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'square' => __( 'Square', 'universh' ),
								'round' => __( 'Round', 'universh' ),
							),
							'default' => 'square',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Style of icons', 'universh' )
						),
						'color' => array(
							'type' => 'select',
							'values' => array(
								'color' => __( 'Colored', 'universh' ),
								'default' => __( 'Default', 'universh' ),
							),
							'default' => 'color',
							'name' => __( 'Colored', 'universh' ),
							'desc' => __( 'color of icons', 'universh' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'text-left' => __( 'Left', 'universh' ),
								'text-center' => __( 'Center', 'universh' ),
								'text-right' => __( 'Right', 'universh' )
							),
							'default' => 'center',
							'name' => __( 'Align', 'universh' ),
							'desc' => __( 'Icon alignment', 'universh' )
						),						
					),
					'desc' => __( 'Single social icon shortcode here...', 'universh' ),
					'icon' => 'users'
				),
				
				// socials_icon
				'socials_icon' => array(
					'name' => __( 'Social Icon', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'name' => array(
							'type' => 'select',
							'values' => array(
								'facebook' => __( 'facebook', 'universh' ),
								'twitter' => __( 'twitter', 'universh' ),
								'linkedin' => __( 'linkedin', 'universh' ),
								'digg' => __( 'digg', 'universh' ),
								'dribbble' => __( 'dribbble', 'universh' ),
								'flickr' => __( 'flickr', 'universh' ), 
								'forrst' => __( 'forrst', 'universh' ),
								'googleplus' => __( 'googleplus', 'universh' ),
								'html5' => __( 'html5', 'universh' ), 
								'icloud' => __( 'icloud', 'universh' ),
								'lastfm' => __( 'lastfm', 'universh' ), 
								'myspace' => __( 'myspace', 'universh' ),
								'paypal' => __( 'paypal', 'universh' ),
								'picasa' => __( 'picasa', 'universh' ),
								'pinterest' => __( 'pinterest', 'universh' ),
								'reddit' => __( 'reddit', 'universh' ),
								'rss' => __( 'rss', 'universh' ),
								'skype' => __( 'skype', 'universh' ), 
								'stumbleupon' => __( 'stumbleupon', 'universh' ),
								'tumblr' => __( 'tumblr', 'universh' ),
								'vimeo' => __( 'vimeo', 'universh' ), 
								'wordpress' => __( 'wordpress', 'universh' ),
								'yahoo' => __( 'yahoo', 'universh' ), 
								'youtube' => __( 'youtube', 'universh' ),
								'github' => __( 'github', 'universh' ),
								'behance' => __( 'behance', 'universh' ), 
								'yelp' => __( 'yelp', 'universh' ),
								'mail' => __( 'mail', 'universh' ),
								'instagram' => __( 'instagram', 'universh' ), 
								'foursquare' => __( 'foursquare', 'universh' ),
								'zerply' => __( 'zerply', 'universh' ), 
								'vk' => __( 'vk', 'universh' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'universh' ),
							'desc' => __( 'Order posts by', 'universh' )
						),
						'link' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Link', 'universh' ),
							'desc' => __( 'Link', 'universh' )
						),
						
					),
					'desc' => __( 'Socials Icons', 'universh' ),
					'icon' => 'users'
				),
				
				// callout
				'callout' => array(
					'name' => __( 'Callout', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(						
						'title' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'Title', 'universh' )
						),
						'button_text' => array(
							'type' => 'text',
							'values' => '',
							'default' => '',
							'name' => __( 'Button Text', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'button_link' => array(
							'type' => 'text',
							'values' => '',
							'default' => '#',
							'name' => __( 'Button Link', 'universh' ),
							'desc' => __( '', 'universh' )
						),						
					),
					'desc' => __( 'Callout', 'universh' ),
					'icon' => 'users'
				),
				
				// posts
				'posts' => array(
					'name' => __( 'Posts', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'template' => array(
							'default' => 'templates/default-loop.php', 'name' => __( 'Template', 'universh' ),
							'desc' => __( '<b>Do not change this field value if you do not understand description below.</b><br/>Relative path to the template file. Default templates is placed under the plugin directory (templates folder). You can copy it under your theme directory and modify as you want. You can use following default templates that already available in the plugin directory:<br/><b%value>templates/default-loop.php</b> - posts loop<br/><b%value>templates/teaser-loop.php</b> - posts loop with thumbnail and title<br/><b%value>templates/single-post.php</b> - single post template<br/><b%value>templates/list-loop.php</b> - unordered list with posts titles', 'universh' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'universh' ),
							'desc' => __( 'Enter comma separated ID\'s of the posts that you want to show', 'universh' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Posts per page', 'universh' ),
							'desc' => __( 'Specify number of posts that you want to show. Enter -1 to get all posts', 'universh' )
						),
						'column' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 4,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Column', 'universh' ),
							'desc' => __( 'Column number', 'universh' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_types(),
							'default' => 'post',
							'name' => __( 'Post types', 'universh' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple post types', 'universh' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => Wt_Tools::get_taxonomies(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'universh' ),
							'desc' => __( 'Select taxonomy to show posts from', 'universh' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'universh' ),
							'desc' => __( 'Select terms to show posts from', 'universh' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'universh' ),
							'desc' => __( 'IN - posts that have any of selected categories terms<br/>NOT IN - posts that is does not have any of selected terms<br/>AND - posts that have all selected terms', 'universh' )
						),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'universh' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'universh' )
						),
						'meta_key' => array(
							'default' => '',
							'name' => __( 'Meta key', 'universh' ),
							'desc' => __( 'Enter meta key name to show posts that have this key', 'universh' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'universh' ),
							'desc' => __( 'Specify offset to start posts loop not from first post', 'universh' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'universh' ),
								'asc' => __( 'Ascending', 'universh' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'universh' ),
							'desc' => __( 'Posts order', 'universh' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'universh' ),
								'id' => __( 'Post ID', 'universh' ),
								'author' => __( 'Post author', 'universh' ),
								'title' => __( 'Post title', 'universh' ),
								'name' => __( 'Post slug', 'universh' ),
								'date' => __( 'Date', 'universh' ), 'modified' => __( 'Last modified date', 'universh' ),
								'parent' => __( 'Post parent', 'universh' ),
								'rand' => __( 'Random', 'universh' ), 'comment_count' => __( 'Comments number', 'universh' ),
								'menu_order' => __( 'Menu order', 'universh' ), 'meta_value' => __( 'Meta key values', 'universh' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'universh' ),
							'desc' => __( 'Order posts by', 'universh' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'Post parent', 'universh' ),
							'desc' => __( 'Show childrens of entered post (enter post ID)', 'universh' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'universh' ),
								'pending' => __( 'Pending', 'universh' ),
								'draft' => __( 'Draft', 'universh' ),
								'auto-draft' => __( 'Auto-draft', 'universh' ),
								'future' => __( 'Future post', 'universh' ),
								'private' => __( 'Private post', 'universh' ),
								'inherit' => __( 'Inherit', 'universh' ),
								'trash' => __( 'Trashed', 'universh' ),
								'any' => __( 'Any', 'universh' ),
							),
							'default' => 'publish',
							'name' => __( 'Post status', 'universh' ),
							'desc' => __( 'Show only posts with selected status', 'universh' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'universh' ),
							'desc' => __( 'Select Yes to ignore posts that is sticked', 'universh' )
						)
					),
					'desc' => __( 'Custom posts query with customizable template', 'universh' ),
					'icon' => 'th-list'
				),
				// custom_search
				'custom_search' => array(
					'name' => __( 'Custom Post Search', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'post_type' => array(
							'type' => 'select',
							'multiple' => false,
							'values' => Wt_Tools::get_types(),
							'default' => 'post',
							'name' => __( 'Post types', 'universh' ),
							'desc' => __( '', 'universh' )
						),
					),
					'desc' => __( 'Custom search query with customizable template', 'universh' ),
					'icon' => 'th-list'
				),
				// courses
				'courses' => array(
					'name' => __( 'Courses', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'template' => array(
							'default' => 'templates/course-loop.php', 'name' => __( 'Template', 'universh' ),
							'desc' => __( '<b>Do not change this field value if you do not understand description below.</b><br/>Relative path to the template file. Default templates is placed under the plugin directory (templates folder). You can copy it under your theme directory and modify as you want. You can use following default templates that already available in the plugin directory:<br/><b%value>templates/course-loop.php</b> - course loop<br/><b%value>templates/course-lists.php</b> - course lists', 'universh' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'universh' ),
							'desc' => __( 'Enter comma separated ID\'s of the courses that you want to show', 'universh' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Courses per page', 'universh' ),
							'desc' => __( 'Specify number of courses that you want to show. Enter -1 to get all courses', 'universh' )
						),
						'column' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 4,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Column', 'universh' ),
							'desc' => __( 'Column number', 'universh' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_types(),
							'default' => 'post',
							'name' => __( 'Post types', 'universh' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple course types', 'universh' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => Wt_Tools::get_taxonomies(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'universh' ),
							'desc' => __( 'Select taxonomy to show courses from', 'universh' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'universh' ),
							'desc' => __( 'Select terms to show courses from', 'universh' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'universh' ),
							'desc' => __( 'IN - courses that have any of selected categories terms<br/>NOT IN - courses that is does not have any of selected terms<br/>AND - courses that have all selected terms', 'universh' )
						),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'universh' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'universh' )
						),
						'meta_key' => array(
							'default' => '',
							'name' => __( 'Meta key', 'universh' ),
							'desc' => __( 'Enter meta key name to show course that have this key', 'universh' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'universh' ),
							'desc' => __( 'Specify offset to start courses loop not from first course', 'universh' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'universh' ),
								'asc' => __( 'Ascending', 'universh' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'universh' ),
							'desc' => __( 'Course order', 'universh' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'universh' ),
								'id' => __( 'Course ID', 'universh' ),
								'author' => __( 'Course author', 'universh' ),
								'title' => __( 'Course title', 'universh' ),
								'name' => __( 'Course slug', 'universh' ),
								'date' => __( 'Date', 'universh' ), 'modified' => __( 'Last modified date', 'universh' ),
								'parent' => __( 'Course parent', 'universh' ),
								'rand' => __( 'Random', 'universh' ), 'comment_count' => __( 'Comments number', 'universh' ),
								'menu_order' => __( 'Menu order', 'universh' ), 'meta_value' => __( 'Meta key values', 'universh' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'universh' ),
							'desc' => __( 'Order course by', 'universh' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'Course parent', 'universh' ),
							'desc' => __( 'Show childrens of entered course (enter course ID)', 'universh' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'universh' ),
								'pending' => __( 'Pending', 'universh' ),
								'draft' => __( 'Draft', 'universh' ),
								'auto-draft' => __( 'Auto-draft', 'universh' ),
								'future' => __( 'Future course', 'universh' ),
								'private' => __( 'Private course', 'universh' ),
								'inherit' => __( 'Inherit', 'universh' ),
								'trash' => __( 'Trashed', 'universh' ),
								'any' => __( 'Any', 'universh' ),
							),
							'default' => 'publish',
							'name' => __( 'Course status', 'universh' ),
							'desc' => __( 'Show only course with selected status', 'universh' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'universh' ),
							'desc' => __( 'Select Yes to ignore course that is sticked', 'universh' )
						)
					),
					'desc' => __( 'Custom course query with customizable template', 'universh' ),
					'icon' => 'th-list'
				),
				// news
				'news' => array(
					'name' => __( 'News', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'template' => array(
							'default' => 'templates/news-loop.php', 'name' => __( 'Template', 'universh' ),
							'desc' => __( '<b>Do not change this field value if you do not understand description below.', 'universh' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'universh' ),
							'desc' => __( 'Enter comma separated ID\'s of the news that you want to show', 'universh' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Courses per page', 'universh' ),
							'desc' => __( 'Specify number of news that you want to show. Enter -1 to get all news', 'universh' )
						),
						'column' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 4,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Column', 'universh' ),
							'desc' => __( 'Column number', 'universh' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_types(),
							'default' => 'post',
							'name' => __( 'Post types', 'universh' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple news types', 'universh' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => Wt_Tools::get_taxonomies(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'universh' ),
							'desc' => __( 'Select taxonomy to show news from', 'universh' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'universh' ),
							'desc' => __( 'Select terms to show news from', 'universh' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'universh' ),
							'desc' => __( 'IN - news that have any of selected categories terms<br/>NOT IN - news that is does not have any of selected terms<br/>AND - news that have all selected terms', 'universh' )
						),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'universh' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'universh' )
						),
						'meta_key' => array(
							'default' => '',
							'name' => __( 'Meta key', 'universh' ),
							'desc' => __( 'Enter meta key name to show news that have this key', 'universh' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'universh' ),
							'desc' => __( 'Specify offset to start news loop not from first news', 'universh' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'universh' ),
								'asc' => __( 'Ascending', 'universh' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'universh' ),
							'desc' => __( 'News order', 'universh' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'universh' ),
								'id' => __( 'News ID', 'universh' ),
								'author' => __( 'News author', 'universh' ),
								'title' => __( 'News title', 'universh' ),
								'name' => __( 'News slug', 'universh' ),
								'date' => __( 'Date', 'universh' ), 'modified' => __( 'Last modified date', 'universh' ),
								'parent' => __( 'News parent', 'universh' ),
								'rand' => __( 'Random', 'universh' ), 'comment_count' => __( 'Comments number', 'universh' ),
								'menu_order' => __( 'Menu order', 'universh' ), 'meta_value' => __( 'Meta key values', 'universh' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'universh' ),
							'desc' => __( 'Order news by', 'universh' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'News parent', 'universh' ),
							'desc' => __( 'Show childrens of entered news (enter news ID)', 'universh' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'universh' ),
								'pending' => __( 'Pending', 'universh' ),
								'draft' => __( 'Draft', 'universh' ),
								'auto-draft' => __( 'Auto-draft', 'universh' ),
								'future' => __( 'Future course', 'universh' ),
								'private' => __( 'Private course', 'universh' ),
								'inherit' => __( 'Inherit', 'universh' ),
								'trash' => __( 'Trashed', 'universh' ),
								'any' => __( 'Any', 'universh' ),
							),
							'default' => 'publish',
							'name' => __( 'News status', 'universh' ),
							'desc' => __( 'Show only news with selected status', 'universh' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'universh' ),
							'desc' => __( 'Select Yes to ignore news that is sticked', 'universh' )
						)
					),
					'desc' => __( 'Custom news query with customizable template', 'universh' ),
					'icon' => 'th-list'
				),
				
				// Events
				'events' => array(
					'name' => __( 'Events', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'template' => array(
							'default' => 'templates/events-loop.php', 'name' => __( 'Template', 'universh' ),
							'desc' => __( '<b>Do not change this field value if you do not understand description below.</b><br/>Relative path to the template file. Default templates is placed under the plugin directory (templates folder). You can copy it under your theme directory and modify as you want. You can use following default templates that already available in the plugin directory:<br/><b%value>templates/events-loop.php</b> - events loop<br/><b%value>templates/events-lists.php</b> - events lists', 'universh' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'universh' ),
							'desc' => __( 'Enter comma separated ID\'s of the Events that you want to show', 'universh' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Events per page', 'universh' ),
							'desc' => __( 'Specify number of Events that you want to show. Enter -1 to get all Events', 'universh' )
						),
						'column' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 4,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Column', 'universh' ),
							'desc' => __( 'Column number', 'universh' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_types(),
							'default' => 'post',
							'name' => __( 'Post types', 'universh' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple Events types', 'universh' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => Wt_Tools::get_taxonomies(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'universh' ),
							'desc' => __( 'Select taxonomy to show Events from', 'universh' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'universh' ),
							'desc' => __( 'Select terms to show Events from', 'universh' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'universh' ),
							'desc' => __( 'IN - Events that have any of selected categories terms<br/>NOT IN - Events that is does not have any of selected terms<br/>AND - Events that have all selected terms', 'universh' )
						),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'universh' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'universh' )
						),
						'meta_key' => array(
							'default' => '',
							'name' => __( 'Meta key', 'universh' ),
							'desc' => __( 'Enter meta key name to show Events that have this key', 'universh' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'universh' ),
							'desc' => __( 'Specify offset to start Events loop not from first Events', 'universh' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'universh' ),
								'asc' => __( 'Ascending', 'universh' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'universh' ),
							'desc' => __( 'Events order', 'universh' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'universh' ),
								'id' => __( 'Events ID', 'universh' ),
								'author' => __( 'Events author', 'universh' ),
								'title' => __( 'Events title', 'universh' ),
								'name' => __( 'Events slug', 'universh' ),
								'date' => __( 'Date', 'universh' ), 'modified' => __( 'Last modified date', 'universh' ),
								'parent' => __( 'News parent', 'universh' ),
								'rand' => __( 'Random', 'universh' ), 'comment_count' => __( 'Comments number', 'universh' ),
								'menu_order' => __( 'Menu order', 'universh' ), 'meta_value' => __( 'Meta key values', 'universh' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'universh' ),
							'desc' => __( 'Order Events by', 'universh' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'Events parent', 'universh' ),
							'desc' => __( 'Show childrens of entered Events (enter Events ID)', 'universh' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'universh' ),
								'pending' => __( 'Pending', 'universh' ),
								'draft' => __( 'Draft', 'universh' ),
								'auto-draft' => __( 'Auto-draft', 'universh' ),
								'future' => __( 'Future course', 'universh' ),
								'private' => __( 'Private course', 'universh' ),
								'inherit' => __( 'Inherit', 'universh' ),
								'trash' => __( 'Trashed', 'universh' ),
								'any' => __( 'Any', 'universh' ),
							),
							'default' => 'publish',
							'name' => __( 'Events status', 'universh' ),
							'desc' => __( 'Show only Events with selected status', 'universh' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'universh' ),
							'desc' => __( 'Select Yes to ignore Events that is sticked', 'universh' )
						)
					),
					'desc' => __( 'Custom events query with customizable template', 'universh' ),
					'icon' => 'th-list'
				),
				// teachers
				'teachers' => array(
					'name' => __( 'Teachers', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'template' => array(
							'default' => 'templates/teachers-loop.php', 'name' => __( 'Template', 'universh' ),
							'desc' => __( '<b>Do not change this field value if you do not understand description below.</b><br/>Relative path to the template file. Default templates is placed under the plugin directory (templates folder). You can copy it under your theme directory and modify as you want. You can use following default templates that already available in the plugin directory:<br/><b%value>templates/teachers-loop.php</b> - teachers loop<br/><b%value>templates/small-loop.php</b> - small loop', 'universh' )
						),
						'border_style' => array(
							'type' => 'select',
							'values' => array(								
								'default' => __( 'Default Style', 'universh' ),
								'border-style' => __( 'Border Style', 'universh' ),
							),
							'default' => 'border-style',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Teachers content style', 'universh' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'universh' ),
							'desc' => __( 'Enter comma separated ID\'s of the courses that you want to show', 'universh' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Teachers per page', 'universh' ),
							'desc' => __( 'Specify number of courses that you want to show. Enter -1 to get all teachers', 'universh' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_types(),
							'default' => 'post',
							'name' => __( 'Post types', 'universh' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple teachers types', 'universh' )
						),
						'column' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 4,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Column', 'universh' ),
							'desc' => __( 'Column number', 'universh' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => Wt_Tools::get_taxonomies(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'universh' ),
							'desc' => __( 'Select taxonomy to show teachers from', 'universh' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'universh' ),
							'desc' => __( 'Select terms to show teachers from', 'universh' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'universh' ),
							'desc' => __( 'IN - teachers that have any of selected categories terms<br/>NOT IN - teachers that is does not have any of selected terms<br/>AND - courses that have all selected terms', 'universh' )
						),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'universh' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'universh' )
						),
						'meta_key' => array(
							'default' => '',
							'name' => __( 'Meta key', 'universh' ),
							'desc' => __( 'Enter meta key name to show teachers that have this key', 'universh' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'universh' ),
							'desc' => __( 'Specify offset to start teachers loop not from first course', 'universh' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'universh' ),
								'asc' => __( 'Ascending', 'universh' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'universh' ),
							'desc' => __( 'Teachers order', 'universh' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'universh' ),
								'id' => __( 'Teachers ID', 'universh' ),
								'author' => __( 'Teachers author', 'universh' ),
								'title' => __( 'Teachers title', 'universh' ),
								'name' => __( 'Teachers slug', 'universh' ),
								'date' => __( 'Date', 'universh' ), 'modified' => __( 'Last modified date', 'universh' ),
								'parent' => __( 'Teachers parent', 'universh' ),
								'rand' => __( 'Random', 'universh' ), 'comment_count' => __( 'Comments number', 'universh' ),
								'menu_order' => __( 'Menu order', 'universh' ), 'meta_value' => __( 'Meta key values', 'universh' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'universh' ),
							'desc' => __( 'Order teachers by', 'universh' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'Teachers parent', 'universh' ),
							'desc' => __( 'Show childrens of entered teachers (enter teachers ID)', 'universh' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'universh' ),
								'pending' => __( 'Pending', 'universh' ),
								'draft' => __( 'Draft', 'universh' ),
								'auto-draft' => __( 'Auto-draft', 'universh' ),
								'future' => __( 'Future teachers', 'universh' ),
								'private' => __( 'Private teachers', 'universh' ),
								'inherit' => __( 'Inherit', 'universh' ),
								'trash' => __( 'Trashed', 'universh' ),
								'any' => __( 'Any', 'universh' ),
							),
							'default' => 'publish',
							'name' => __( 'Teachers status', 'universh' ),
							'desc' => __( 'Show only teachers with selected status', 'universh' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'universh' ),
							'desc' => __( 'Select Yes to ignore teachers that is sticked', 'universh' )
						),
						'background_style' => array(
							'type' => 'select',
							'values' => array(
								'bg-white' => __( 'Default', 'universh' ),
								'bg-color' => __( 'Blue', 'universh' ),
								'bg-dark' => __( 'Dark', 'universh' ),
								'bg-grey' => __( 'Grey', 'universh' ),
								'bg-orange' => __( 'Orange', 'universh' ),
								'bg-pink' => __( 'Pink', 'universh' ),
								'bg-yellow' => __( 'Yellow', 'universh' )
							),
							'default' => 'bg-white',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Teachers content style', 'universh' )
						),
						'text_style' => array(
							'type' => 'select',
							'values' => array(
								'typo-dark' => __( 'Dark', 'universh' ),
								'typo-light' => __( 'Light', 'universh' )
							),
							'default' => 'typo-dark',
							'name' => __( 'Text Style', 'universh' ),
							'desc' => __( 'Teachers content text style', 'universh' )
						),
						'social_style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'universh' ),
								'color' => __( 'Color', 'universh' )
							),
							'default' => 'default',
							'name' => __( 'Social Icon Style', 'universh' ),
							'desc' => __( 'Teachers content social icon style', 'universh' )
						),
						'text_align' => array(
							'type' => 'select',
							'values' => array(
								'text-left' => __( 'Left', 'universh' ),
								'text-center' => __( 'Center', 'universh' ),
								'text-right' => __( 'Right', 'universh' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'universh' ),
							'desc' => __( 'Teachers content text alignment', 'universh' )
						),
					),
					'desc' => __( 'Custom teachers query with customizable template', 'universh' ),
					'icon' => 'th-list'
				),
				// galleries
				'galleries' => array(
					'name' => __( 'Galleries', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'template' => array(
							'default' => 'templates/gallery-loop.php', 'name' => __( 'Template', 'universh' ),
							'desc' => __( '<b>Do not change this field value if you do not understand description below.', 'universh' )
						),
						'gallery_style' => array(
							'type' => 'select',
							'values' => array(
								'grid' => __( 'Grid', 'universh' ),
								'masonry' => __( 'Masonry', 'universh' ),
								'masonry_2' => __( 'Masonry Colored', 'universh' ),
								'gutter' => __( 'Grid gutter', 'universh' ),
								'masonry_gutter' => __( 'Masonry gutter', 'universh' ),
							),
							'default' => 'gutter',
							'name' => __( 'Gallery Style', 'universh' ),
							'desc' => __( 'select your gallery style', 'universh' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'universh' ),
							'desc' => __( 'Enter comma separated ID\'s of the galleries that you want to show', 'universh' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Gallery per page', 'universh' ),
							'desc' => __( 'Specify number of galleries that you want to show. Enter -1 to get all galleries', 'universh' )
						),
						'column' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 4,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Column', 'universh' ),
							'desc' => __( 'Column number', 'universh' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_types(),
							'default' => 'post',
							'name' => __( 'Post types', 'universh' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple gallery types', 'universh' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => Wt_Tools::get_taxonomies(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'universh' ),
							'desc' => __( 'Select taxonomy to show galleries from', 'universh' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'universh' ),
							'desc' => __( 'Select terms to show galleries from', 'universh' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'universh' ),
							'desc' => __( 'IN - galleries that have any of selected categories terms<br/>NOT IN - galleries that is does not have any of selected terms<br/>AND - galleries that have all selected terms', 'universh' )
						),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'universh' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'universh' )
						),
						'meta_key' => array(
							'default' => '',
							'name' => __( 'Meta key', 'universh' ),
							'desc' => __( 'Enter meta key name to show gallery that have this key', 'universh' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'universh' ),
							'desc' => __( 'Specify offset to start gallery loop not from first gallery', 'universh' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'universh' ),
								'asc' => __( 'Ascending', 'universh' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'universh' ),
							'desc' => __( 'Gallery order', 'universh' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'universh' ),
								'id' => __( 'Gallery ID', 'universh' ),
								'author' => __( 'Gallery author', 'universh' ),
								'title' => __( 'Gallery title', 'universh' ),
								'name' => __( 'Gallery slug', 'universh' ),
								'date' => __( 'Date', 'universh' ), 'modified' => __( 'Last modified date', 'universh' ),
								'parent' => __( 'Gallery parent', 'universh' ),
								'rand' => __( 'Random', 'universh' ), 'comment_count' => __( 'Comments number', 'universh' ),
								'menu_order' => __( 'Menu order', 'universh' ), 'meta_value' => __( 'Meta key values', 'universh' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'universh' ),
							'desc' => __( 'Order gallery by', 'universh' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'Course parent', 'universh' ),
							'desc' => __( 'Show childrens of entered gallery (enter gallery ID)', 'universh' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'universh' ),
								'pending' => __( 'Pending', 'universh' ),
								'draft' => __( 'Draft', 'universh' ),
								'auto-draft' => __( 'Auto-draft', 'universh' ),
								'future' => __( 'Future Gallery', 'universh' ),
								'private' => __( 'Private Gallery', 'universh' ),
								'inherit' => __( 'Inherit', 'universh' ),
								'trash' => __( 'Trashed', 'universh' ),
								'any' => __( 'Any', 'universh' ),
							),
							'default' => 'publish',
							'name' => __( 'Gallery status', 'universh' ),
							'desc' => __( 'Show only gallery with selected status', 'universh' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'universh' ),
							'desc' => __( 'Select Yes to ignore gallery that is sticked', 'universh' )
						)
					),
					'desc' => __( 'Custom gallery query with customizable template', 'universh' ),
					'icon' => 'th-list'
				),
				// dummy_text
				'dummy_text' => array(
					'name' => __( 'Dummy text', 'universh' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'what' => array(
							'type' => 'select',
							'values' => array(
								'paras' => __( 'Paragraphs', 'universh' ),
								'words' => __( 'Words', 'universh' ),
								'bytes' => __( 'Bytes', 'universh' ),
							),
							'default' => 'paras',
							'name' => __( 'What', 'universh' ),
							'desc' => __( 'What to generate', 'universh' )
						),
						'amount' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Amount', 'universh' ),
							'desc' => __( 'How many items (paragraphs or words) to generate. Minimum words amount is 5', 'universh' )
						),
						'cache' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Cache', 'universh' ),
							'desc' => __( 'Generated text will be cached. Be careful with this option. If you disable it and insert many dummy_text shortcodes the page load time will be highly increased', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Text placeholder', 'universh' ),
					'icon' => 'text-height'
				),
				// dummy_image
				'dummy_image' => array(
					'name' => __( 'Dummy image', 'universh' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 500,
							'name' => __( 'Width', 'universh' ),
							'desc' => __( 'Image width', 'universh' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 300,
							'name' => __( 'Height', 'universh' ),
							'desc' => __( 'Image height', 'universh' )
						),
						'theme' => array(
							'type' => 'select',
							'values' => array(
								'any'       => __( 'Any', 'universh' ),
								'abstract'  => __( 'Abstract', 'universh' ),
								'animals'   => __( 'Animals', 'universh' ),
								'business'  => __( 'Business', 'universh' ),
								'cats'      => __( 'Cats', 'universh' ),
								'city'      => __( 'City', 'universh' ),
								'food'      => __( 'Food', 'universh' ),
								'nightlife' => __( 'Night life', 'universh' ),
								'fashion'   => __( 'Fashion', 'universh' ),
								'people'    => __( 'People', 'universh' ),
								'nature'    => __( 'Nature', 'universh' ),
								'sports'    => __( 'Sports', 'universh' ),
								'technics'  => __( 'Technics', 'universh' ),
								'transport' => __( 'Transport', 'universh' )
							),
							'default' => 'any',
							'name' => __( 'Theme', 'universh' ),
							'desc' => __( 'Select the theme for this image', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Image placeholder with random image', 'universh' ),
					'icon' => 'picture-o'
				),
				// animate
				'animate' => array(
					'name' => __( 'Animation', 'universh' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array_combine( self::animations(), self::animations() ),
							'default' => 'bounceIn',
							'name' => __( 'Animation', 'universh' ),
							'desc' => __( 'Select animation type', 'universh' )
						),
						'duration' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 0.5,
							'default' => 1,
							'name' => __( 'Duration', 'universh' ),
							'desc' => __( 'Animation duration (seconds)', 'universh' )
						),
						'delay' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 0.5,
							'default' => 0,
							'name' => __( 'Delay', 'universh' ),
							'desc' => __( 'Animation delay (seconds)', 'universh' )
						),
						'inline' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Inline', 'universh' ),
							'desc' => __( 'This parameter determines what HTML tag will be used for animation wrapper. Turn this option to YES and animated element will be wrapped in SPAN instead of DIV. Useful for inline animations, like buttons', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'content' => __( 'Animated content', 'universh' ),
					'desc' => __( 'Wrapper for animation. Any nested element will be animated', 'universh' ),
					'example' => 'animations',
					'icon' => 'bolt'
				),
				// meta
				'meta' => array(
					'name' => __( 'Meta', 'universh' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'key' => array(
							'default' => '',
							'name' => __( 'Key', 'universh' ),
							'desc' => __( 'Meta key name', 'universh' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'universh' ),
							'desc' => __( 'This text will be shown if data is not found', 'universh' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'universh' ),
							'desc' => __( 'This content will be shown before the value', 'universh' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'universh' ),
							'desc' => __( 'This content will be shown after the value', 'universh' )
						),
						'post_id' => array(
							'default' => '',
							'name' => __( 'Post ID', 'universh' ),
							'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'universh' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'universh' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Example function: ', 'universh' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'Post meta', 'universh' ),
					'icon' => 'info-circle'
				),
				// user
				'user' => array(
					'name' => __( 'User', 'universh' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'field' => array(
							'type' => 'select',
							'values' => array(
								'display_name'        => __( 'Display name', 'universh' ),
								'ID'                  => __( 'ID', 'universh' ),
								'user_login'          => __( 'Login', 'universh' ),
								'user_nicename'       => __( 'Nice name', 'universh' ),
								'user_email'          => __( 'Email', 'universh' ),
								'user_url'            => __( 'URL', 'universh' ),
								'user_registered'     => __( 'Registered', 'universh' ),
								'user_activation_key' => __( 'Activation key', 'universh' ),
								'user_status'         => __( 'Status', 'universh' )
							),
							'default' => 'display_name',
							'name' => __( 'Field', 'universh' ),
							'desc' => __( 'User data field name', 'universh' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'universh' ),
							'desc' => __( 'This text will be shown if data is not found', 'universh' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'universh' ),
							'desc' => __( 'This content will be shown before the value', 'universh' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'universh' ),
							'desc' => __( 'This content will be shown after the value', 'universh' )
						),
						'user_id' => array(
							'default' => '',
							'name' => __( 'User ID', 'universh' ),
							'desc' => __( 'You can specify custom user ID. Leave this field empty to use an ID of the current user', 'universh' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'universh' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Example function: ', 'universh' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'User data', 'universh' ),
					'icon' => 'info-circle'
				),
				// post
				'post' => array(
					'name' => __( 'Post', 'universh' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'field' => array(
							'type' => 'select',
							'values' => array(
								'ID'                    => __( 'Post ID', 'universh' ),
								'post_author'           => __( 'Post author', 'universh' ),
								'post_date'             => __( 'Post date', 'universh' ),
								'post_date_gmt'         => __( 'Post date', 'universh' ) . ' GMT',
								'post_content'          => __( 'Post content', 'universh' ),
								'post_title'            => __( 'Post title', 'universh' ),
								'post_excerpt'          => __( 'Post excerpt', 'universh' ),
								'post_status'           => __( 'Post status', 'universh' ),
								'comment_status'        => __( 'Comment status', 'universh' ),
								'ping_status'           => __( 'Ping status', 'universh' ),
								'post_name'             => __( 'Post name', 'universh' ),
								'post_modified'         => __( 'Post modified', 'universh' ),
								'post_modified_gmt'     => __( 'Post modified', 'universh' ) . ' GMT',
								'post_content_filtered' => __( 'Filtered post content', 'universh' ),
								'post_parent'           => __( 'Post parent', 'universh' ),
								'guid'                  => __( 'GUID', 'universh' ),
								'menu_order'            => __( 'Menu order', 'universh' ),
								'post_type'             => __( 'Post type', 'universh' ),
								'post_mime_type'        => __( 'Post mime type', 'universh' ),
								'comment_count'         => __( 'Comment count', 'universh' )
							),
							'default' => 'post_title',
							'name' => __( 'Field', 'universh' ),
							'desc' => __( 'Post data field name', 'universh' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'universh' ),
							'desc' => __( 'This text will be shown if data is not found', 'universh' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'universh' ),
							'desc' => __( 'This content will be shown before the value', 'universh' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'universh' ),
							'desc' => __( 'This content will be shown after the value', 'universh' )
						),
						'post_id' => array(
							'default' => '',
							'name' => __( 'Post ID', 'universh' ),
							'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'universh' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'universh' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Example function: ', 'universh' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'Post data', 'universh' ),
					'icon' => 'info-circle'
				),
				// post_terms
				// 'post_terms' => array(
				// 	'name' => __( 'Post terms', 'universh' ),
				// 	'type' => 'single',
				// 	'group' => 'data',
				// 	'atts' => array(
				// 		'post_id' => array(
				// 			'default' => '',
				// 			'name' => __( 'Post ID', 'universh' ),
				// 			'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'universh' )
				// 		),
				// 		'links' => array(
				// 			'type' => 'bool',
				// 			'default' => 'yes',
				// 			'name' => __( 'Show links', 'universh' ),
				// 			'desc' => __( 'Show terms names as hyperlinks', 'universh' )
				// 		),
				// 		'format' => array(
				// 			'type' => 'select',
				// 			'values' => array(
				// 				'text' => __( 'Terms separated by commas', 'universh' ),
				// 				'br' => __( 'Terms separated by new lines', 'universh' ),
				// 				'ul' => __( 'Unordered list', 'universh' ),
				// 				'ol' => __( 'Ordered list', 'universh' ),
				// 			),
				// 			'default' => 'text',
				// 			'name' => __( 'Format', 'universh' ),
				// 			'desc' => __( 'Choose how to output the terms', 'universh' )
				// 		),
				// 	),
				// 	'desc' => __( 'Terms list', 'universh' ),
				// 	'icon' => 'info-circle'
				// ),
				// template
				'template' => array(
					'name' => __( 'Template', 'universh' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'name' => array(
							'default' => '',
							'name' => __( 'Template name', 'universh' ),
							'desc' => sprintf( __( 'Use template file name (with optional .php extension). If you need to use templates from theme sub-folder, use relative path. Example values: %s, %s, %s', 'universh' ), '<b%value>page</b>', '<b%value>page.php</b>', '<b%value>includes/page.php</b>' )
						)
					),
					'desc' => __( 'Theme template', 'universh' ),
					'icon' => 'puzzle-piece'
				),
				// qrcode
				'qrcode' => array(
					'name' => __( 'QR code', 'universh' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'data' => array(
							'default' => '',
							'name' => __( 'Data', 'universh' ),
							'desc' => __( 'The text to store within the QR code. You can use here any text or even URL', 'universh' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'Enter here short description. This text will be used in alt attribute of QR code', 'universh' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1000,
							'step' => 10,
							'default' => 200,
							'name' => __( 'Size', 'universh' ),
							'desc' => __( 'Image width and height (in pixels)', 'universh' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 50,
							'step' => 5,
							'default' => 0,
							'name' => __( 'Margin', 'universh' ),
							'desc' => __( 'Thickness of a margin (in pixels)', 'universh' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'universh' ),
								'left' => __( 'Left', 'universh' ),
								'center' => __( 'Center', 'universh' ),
								'right' => __( 'Right', 'universh' ),
							),
							'default' => 'none',
							'name' => __( 'Align', 'universh' ),
							'desc' => __( 'Choose image alignment', 'universh' )
						),
						'link' => array(
							'default' => '',
							'name' => __( 'Link', 'universh' ),
							'desc' => __( 'You can make this QR code clickable. Enter here the URL', 'universh' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Open link in same window/tab', 'universh' ),
								'blank' => __( 'Open link in new window/tab', 'universh' ),
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'universh' ),
							'desc' => __( 'Select link target', 'universh' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#000000',
							'name' => __( 'Primary color', 'universh' ),
							'desc' => __( 'Pick a primary color', 'universh' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Background color', 'universh' ),
							'desc' => __( 'Pick a background color', 'universh' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'universh' ),
							'desc' => __( 'Extra CSS class', 'universh' )
						)
					),
					'desc' => __( 'Advanced QR code generator', 'universh' ),
					'icon' => 'qrcode'
				),
				
				// products_carousel
				'products_carousel' => array(
					'name' => __( 'Product Carousel', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Product per page', 'universh' ),
							'desc' => __( 'Specify number of Product that you want to show. Enter -1 to get all Product', 'universh' )
						),
						'item_show' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 6,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Item Show', 'universh' ),
							'desc' => __( 'item show at a time', 'universh' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => array(
								'product_cat' => __( 'Product Category', 'universh' ),
								'product_tag' => __( 'Product Tag', 'universh' ),
							),
							'default' => 'product_cat',
							'name' => __( 'Taxonomy', 'universh' ),
							'desc' => __( 'Select taxonomy to show products from', 'universh' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Wt_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'universh' ),
							'desc' => __( 'Select terms to show products from', 'universh' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'universh' ),
							'desc' => __( 'IN - products that have any of selected categories terms<br/>NOT IN - products that is does not have any of selected terms<br/>AND - products that have all selected terms', 'universh' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'universh' ),
								'asc' => __( 'Ascending', 'universh' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'universh' ),
							'desc' => __( 'Product order', 'universh' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'universh' ),
								'id' => __( 'Product ID', 'universh' ),
								'title' => __( 'Product title', 'universh' ),
								'name' => __( 'Product slug', 'universh' ),
								'date' => __( 'Date', 'universh' ),
								'modified' => __( 'Last modified date', 'universh' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'universh' ),
							'desc' => __( 'Order product by', 'universh' )
						),
						'best_seller' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Best Seller', 'universh' ),
							'desc' => __( 'Is product best seller or not', 'universh' )
						),
						'featured' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Featured', 'universh' ),
							'desc' => __( 'Is product featured or not', 'universh' )
						),
						'navigation' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Navigation', 'universh' ),
							'desc' => __( 'Show navigation or not', 'universh' )
						),										
					),
					'desc' => __( 'Custom product carousel', 'universh' ),
					'icon' => 'th-list'
				),
				
				// title_subtitle
				'title' => array(
					'name' => __( 'Title', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'Title', 'universh' )
						),
						
						'align' => array(
							'type'		=> 'select',
							'values' => array(
								'left' => __( 'Left', 'universh' ),
								'center' => __( 'Center', 'universh' ),
								'right' => __( 'Right', 'universh' ),
							),
							'default' => 'center',
							'name' => __( 'Align', 'universh' ),
							'desc' => __( 'Select title align', 'universh' )
						),
						'color' => array(
							'default' => '#262626',
							'type'		=> 'color',
							'name' => __( 'Color', 'universh' ),
							'desc' => __( 'Color of text', 'universh' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 100,
							'step' => 1,
							'default' => 34,
							'name' => __( 'Font Size', 'universh' ),
							'desc' => __( 'Font size of title(in pixels)', 'universh' )
						),
						'margin_bottom' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 100,
							'step' => 1,
							'default' => 60,
							'name' => __( 'Margin Bottom', 'universh' ),
							'desc' => __( 'Bottom margin of title(in pixels)', 'universh' )
						),
						'separator' => array(
							'type' => 'select',
							'values' => array(
								'line' => __( 'Line', 'universh' ),
								'dot' => __( 'Dot', 'universh' ),
							),
							'default' => 'line',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Select your title style', 'universh' )
						),
					),
					
					'class'=> '',
					'desc' => __( 'Section title', 'universh' ),
					'icon' => 'link'
				),
				
				// title_span_box
				'title_span_box' => array(
					'name' => __( 'Title & Span', 'universh' ),
					'type' => 'wrap',
					'group' => 'universh',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'style_1' => __( 'Style 1', 'universh' ),
								'style_2' => __( 'Style 2', 'universh' ),
							),
							'default' => 'style_1',
							'name' => __( 'Style', 'universh' ),
							'desc' => __( 'Select your title style', 'universh' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'universh' ),
							'desc' => __( 'Title', 'universh' )
						),
						'title_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 40,
							'name' => __( 'Title Font Size', 'universh' ),
							'desc' => __( 'Font size of Title(in pixels)', 'universh' )
						),
						'title_color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Title Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'span_content' => array(
							'default' => '',
							'name' => __( 'Span Content', 'universh' ),
							'desc' => __( 'Span content', 'universh' )
						),
						'span_color' => array(
							'type' => 'color',
							'default' => '#121212',
							'name' => __( 'Span Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'span_size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 70,
							'step' => 1,
							'default' => 40,
							'name' => __( 'Span Content Size', 'universh' ),
							'desc' => __( 'Font size of span', 'universh' )
						),
						'description' => array(
							'default' => '',
							'name' => __( 'Description', 'universh' ),
							'desc' => __( 'Description', 'universh' )
						),
						'des_color' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Description Color', 'universh' ),
							'desc' => __( '', 'universh' )
						),						
						'box_align' => array(
							'type' => 'select',
							'values' => array(
								'box-center' => __( 'Center', 'universh' ),
								'box-left' => __( 'Left', 'universh' ),
								'box-right' => __( 'Right', 'universh' ),
							),
							'default' => 'box-right',
							'name' => __( 'Box Align', 'universh' ),
							'desc' => __( 'Choose box align', 'universh' )
						),
					),
					
					'class'=> '',
					'desc' => __( 'Button shortcode goes here', 'universh' ),
					'icon' => 'link'
				),
				
				// pricing_table
				'pricing_table' => array(
					'name' => __( 'Pricing', 'universh' ),
					'type' => 'single',
					'group' => 'universh',
					'atts' => array(
						'template' => array(
							'default' => 'templates/pricing-loop.php', 'name' => __( 'Template', 'universh' ),
							'desc' => __( '', 'universh' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 18,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Number of pricing to show', 'universh' ),
							'desc' => __( 'Specify number of pricing that you want to show. Enter -1 to get all pricing', 'universh' )
						),
						'column' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 4,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Column', 'universh' ),
							'desc' => __( 'Column number', 'universh' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'universh' ),
								'asc' => __( 'Ascending', 'universh' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'universh' ),
							'desc' => __( 'Pricing order', 'universh' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'universh' ),
								'id' => __( 'Pricing ID', 'universh' ),
								'title' => __( 'Pricing title', 'universh' ),
								'name' => __( 'Pricing slug', 'universh' ),
								'date' => __( 'Date', 'universh' ), 'modified' => __( 'Last modified date', 'universh' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'universh' ),
							'desc' => __( 'Order pricing by', 'universh' )
						),
						
					),
					'desc' => __( 'Pricing table', 'universh' ),
					'icon' => 'th-list'
				),
				
				// scheduler
				'scheduler' => array(
					'name' => __( 'Scheduler', 'universh' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'time' => array(
							'default' => '',
							'name' => __( 'Time', 'universh' ),
							'desc' => sprintf( __( 'In this field you can specify one or more time ranges. Every day at this time the content of shortcode will be visible. %s %s %s - show content from 9:00 to 18:00 %s - show content from 9:00 to 13:00 and from 14:00 to 18:00 %s - example with minutes (content will be visible each day, 45 minutes) %s - example with seconds', 'universh' ), '<br><br>', __( 'Examples (click to set)', 'universh' ), '<br><b%value>9-18</b>', '<br><b%value>9-13, 14-18</b>', '<br><b%value>9:30-10:15</b>', '<br><b%value>9:00:00-17:59:59</b>' )
						),
						'days_week' => array(
							'default' => '',
							'name' => __( 'Days of the week', 'universh' ),
							'desc' => sprintf( __( 'In this field you can specify one or more days of the week. Every week at these days the content of shortcode will be visible. %s 0 - Sunday %s 1 - Monday %s 2 - Tuesday %s 3 - Wednesday %s 4 - Thursday %s 5 - Friday %s 6 - Saturday %s %s %s - show content from Monday to Friday %s - show content only at Sunday %s - show content at Sunday and from Wednesday to Friday', 'universh' ), '<br><br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br><br>', __( 'Examples (click to set)', 'universh' ), '<br><b%value>1-5</b>', '<br><b%value>0</b>', '<br><b%value>0, 3-5</b>' )
						),
						'days_month' => array(
							'default' => '',
							'name' => __( 'Days of the month', 'universh' ),
							'desc' => sprintf( __( 'In this field you can specify one or more days of the month. Every month at these days the content of shortcode will be visible. %s %s %s - show content only at first day of month %s - show content from 1th to 5th %s - show content from 10th to 15th and from 20th to 25th', 'universh' ), '<br><br>', __( 'Examples (click to set)', 'universh' ), '<br><b%value>1</b>', '<br><b%value>1-5</b>', '<br><b%value>10-15, 20-25</b>' )
						),
						'months' => array(
							'default' => '',
							'name' => __( 'Months', 'universh' ),
							'desc' => sprintf( __( 'In this field you can specify the month or months in which the content will be visible. %s %s %s - show content only in January %s - show content from February to June %s - show content in January, March and from May to July', 'universh' ), '<br><br>', __( 'Examples (click to set)', 'universh' ), '<br><b%value>1</b>', '<br><b%value>2-6</b>', '<br><b%value>1, 3, 5-7</b>' )
						),
						'years' => array(
							'default' => '',
							'name' => __( 'Years', 'universh' ),
							'desc' => sprintf( __( 'In this field you can specify the year or years in which the content will be visible. %s %s %s - show content only in 2014 %s - show content from 2014 to 2016 %s - show content in 2014, 2018 and from 2020 to 2022', 'universh' ), '<br><br>', __( 'Examples (click to set)', 'universh' ), '<br><b%value>2014</b>', '<br><b%value>2014-2016</b>', '<br><b%value>2014, 2018, 2020-2022</b>' )
						),
						'alt' => array(
							'default' => '',
							'name' => __( 'Alternative text', 'universh' ),
							'desc' => __( 'In this field you can type the text which will be shown if content is not visible at the current moment', 'universh' )
						)
					),
					'content' => __( 'Scheduled content', 'universh' ),
					'desc' => __( 'Allows to show the content only at the specified time period', 'universh' ),
					'note' => __( 'This shortcode allows you to show content only at the specified time.', 'universh' ) . '<br><br>' . __( 'Please pay special attention to the descriptions, which are located below each text field. It will save you a lot of time', 'universh' ) . '<br><br>' . __( 'By default, the content of this shortcode will be visible all the time. By using fields below, you can add some limitations. For example, if you type 1-5 in the Days of the week field, content will be only shown from Monday to Friday. Using the same principles, you can limit content visibility from years to seconds.', 'universh' ),
					'icon' => 'clock-o'
				),
			) );
		// Return result
		return ( is_string( $shortcode ) ) ? $shortcodes[sanitize_text_field( $shortcode )] : $shortcodes;
	}
}

class Universh_Shortcodes_Data extends Wt_Data {
	function __construct() {
		parent::__construct();
	}
}
