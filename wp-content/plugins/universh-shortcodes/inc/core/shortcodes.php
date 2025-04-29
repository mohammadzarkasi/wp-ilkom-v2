<?php
class Wt_Shortcodes {
	static $tabs = array();
	static $tab_count = 0;

	function __construct() {}

	public static function heading( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'tag'   => 'h2',
				'size'   => 48,
				'color'		=> '#ffffff',
				'align'  => 'center',
				'margin_top' => '20',
				'margin_bottom' => '20',
				'text_transform' => 'uppercase',
				'letter_spacing' => '28',
				'class'  => ''
			), $atts, 'heading' );
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		do_action( 'ts/shortcode/heading', $atts );
				
		return '<' . esc_attr($atts['tag']) . ' class="wt-heading wt-heading-style-2 wt-heading-align-' . esc_attr($atts['align']) . wt_ecssc( $atts ) . '" style="margin-top:' . intval($atts['margin_top']) . 'px; margin-bottom:' . intval($atts['margin_bottom']) . 'px; font-size: ' . intval($atts['size']) . 'px; text-transform: ' . esc_attr($atts['text_transform']) . '; color: '.$atts['color'].'; letter-spacing: ' . intval($atts['letter_spacing']) . 'px; "><div class="wt-heading-inner" style="margin-top:' . intval($atts['margin_top']) . 'px; margin-bottom:' . intval($atts['margin_bottom']) . 'px; font-size: ' . intval($atts['size']) . 'px; text-transform: ' . esc_attr($atts['text_transform']) . '; color: '.$atts['color'].'; letter-spacing: ' . intval($atts['letter_spacing']) . 'px; ">' . do_shortcode( $content ) . '</div></' . $atts['tag'] . '>';

	}

	public static function tabs( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'active'   => 1,
				'vertical' => 'no',
				'align'		=> 'left',
				'style'    => 'default', // 3.x
				'class'    => ''
			), $atts, 'tabs' );
		if ( $atts['style'] === '3' ) $atts['vertical'] = 'yes';
		do_shortcode( $content );
		$return = '';
		$tabs = $panes = array();
		if ( is_array( self::$tabs ) ) {
			if ( self::$tab_count < $atts['active'] ) $atts['active'] = self::$tab_count;
			foreach ( self::$tabs as $tab ) {
				$tabs[] = '<span class="' . wt_ecssc( $tab ) . $tab['disabled'] . '"' . $tab['anchor'] . $tab['url'] . $tab['target'] . '>' . wt_scattr( $tab['title'] ) . '</span>';
				$panes[] = '<div class="wt-tabs-pane wt-clearfix' . wt_ecssc( $tab ) . '">' . $tab['content'] . '</div>';
			}
			$atts['vertical'] = ( $atts['vertical'] === 'yes' ) ? ' wt-tabs-vertical' : '';
			$return = '<div class="wt-tabs text-'.$atts['align'].' wt-tabs-style-' . $atts['style'] . $atts['vertical'] . wt_ecssc( $atts ) . '" data-active="' . (string) $atts['active'] . '"><div class="wt-tabs-nav">' . implode( '', $tabs ) . '</div><div class="wt-tabs-panes">' . implode( "\n", $panes ) . '</div></div>';
		}
		// Reset tabs
		self::$tabs = array();
		self::$tab_count = 0;
		wt_query_asset( 'css', 'wt-box-shortcodes' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		do_action( 'ts/shortcode/tabs', $atts );
		return $return;
	}

	public static function tab( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'    => __( 'Tab title', 'universh' ),
				'disabled' => 'no',
				'anchor'   => '',
				'url'      => '',
				'target'   => 'blank',
				'class'    => ''
			), $atts, 'tab' );
		$x = self::$tab_count;
		self::$tabs[$x] = array(
			'title'    => $atts['title'],
			'content'  => do_shortcode( $content ),
			'disabled' => ( $atts['disabled'] === 'yes' ) ? ' wt-tabs-disabled' : '',
			'anchor'   => ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '',
			'url'      => ' data-url="' . $atts['url'] . '"',
			'target'   => ' data-target="' . $atts['target'] . '"',
			'class'    => $atts['class']
		);
		self::$tab_count++;
		do_action( 'ts/shortcode/tab', $atts );
	}

	public static function spoiler( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'  => __( 'Spoiler title', 'universh' ),
				'open'   => 'no',
				'style'  => 'default',
				'icon'   => 'plus',
				'anchor' => '',
				'class'  => ''
			), $atts, 'spoiler' );
		$atts['style'] = str_replace( array( '1', '2' ), array( 'default', 'fancy' ), $atts['style'] );
		$atts['anchor'] = ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '';
		if ( $atts['open'] !== 'yes' ) $atts['class'] .= ' wt-spoiler-closed';
		wt_query_asset( 'css', 'font-awesome' );
		wt_query_asset( 'css', 'wt-box-shortcodes' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		do_action( 'ts/shortcode/spoiler', $atts );
		return '<div class="wt-spoiler wt-spoiler-style-' . $atts['style'] . ' wt-spoiler-icon-' . $atts['icon'] . wt_ecssc( $atts ) . '"' . $atts['anchor'] . '><div class="wt-spoiler-title"><span class="wt-spoiler-icon"></span>' . wt_scattr( $atts['title'] ) . '</div><div class="wt-spoiler-content wt-clearfix" style="display:none">' . wt_do_shortcode( $content, 's' ) . '</div></div>';
	}

	public static function accordion( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'accordion' );
		do_action( 'ts/shortcode/accordion', $atts );
		return '<div class="wt-accordion' . wt_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function divider( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'         => 'default',
				'divider_color' => '#999999',
				'size'          => '3',
				'margin'        => '15',
				'class'         => ''
			), $atts, 'divider' );
		// Prepare TOP link
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		if($atts['style'] == 'default'){
			return '<hr class="lg" style="margin: '.$atts['margin'].'px 0;" />';
		} else
		return '<div class="wt-divider wt-divider-style-' . $atts['style'] . wt_ecssc( $atts ) . '" style="margin:' . $atts['margin'] . 'px 0;border-width:' . $atts['size'] . 'px;border-color:' . $atts['divider_color'] . '"></div>';
	}

	public static function spacer( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'size'  => '20',
				'class' => ''
			), $atts, 'spacer' );
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		return '<div class="wt-spacer' . wt_ecssc( $atts ) . '" style="height:' . (string) $atts['size'] . 'px"></div>';
	}

	public static function highlight( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'background' => '#ddff99',
				'bg'         => null, // 3.x
				'color'      => '#000000',
				'class'      => ''
			), $atts, 'highlight' );
		if ( $atts['bg'] !== null ) $atts['background'] = $atts['bg'];
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		return '<span class="wt-highlight' . wt_ecssc( $atts ) . '" style="background:' . $atts['background'] . ';color:' . $atts['color'] . '">&nbsp;' . do_shortcode( $content ) . '&nbsp;</span>';
	}

	public static function label( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'type'  => 'default',
				'style' => null, // 3.x
				'class' => ''
			), $atts, 'label' );
		if ( $atts['style'] !== null ) $atts['type'] = $atts['style'];
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		return '<span class="wt-label wt-label-type-' . $atts['type'] . wt_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function quote( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'title' => '',
				'quote'  => '',
				'author' => '',
				'align'  => 'center',
				'color'  => '#ffffff',
			), $atts, 'quote' );
		return '<div class="title-container text-' . $atts['align'] . '" style="color:' . $atts['color'] . '">
					<div class="title-wrap">
						<h3 class="title" style="color:' . $atts['color'] . '">' . $atts['title'] . '</h3>
						<span class="separator dot-separator">,,</span>
					</div>
					<div class="simple-quote"> 
						<p class="quote-text">' . $atts['quote'] . '</p>
						<span class="secondary-text"> — ' . $atts['author'] . '</span>
					</div>	
				</div>';
	}

	public static function pullquote( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'align' => 'left',
				'class' => ''
			), $atts, 'pullquote' );
		wt_query_asset( 'css', 'wt-box-shortcodes' );
		return '<div class="wt-pullquote wt-pullquote-align-' . $atts['align'] . wt_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function dropcap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'size'  => 3,
				'class' => ''
			), $atts, 'dropcap' );
		$atts['style'] = str_replace( array( '1', '2', '3' ), array( 'default', 'light', 'default' ), $atts['style'] ); // 3.x
		// Calculate font-size
		$em = $atts['size'] * 0.5 . 'em';
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		return '<span class="wt-dropcap wt-dropcap-style-' . $atts['style'] . wt_ecssc( $atts ) . '" style="font-size:' . $em . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function frame( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style' => 'default',
				'align' => 'left',
				'class' => ''
			), $atts, 'frame' );
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		return '<span class="wt-frame wt-frame-align-' . $atts['align'] . ' wt-frame-style-' . $atts['style'] . wt_ecssc( $atts ) . '"><span class="wt-frame-inner">' . do_shortcode( $content ) . '</span></span>';
	}

	public static function row( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts );
		return '<div class="wt-row' . wt_ecssc( $atts ) . '">' . wt_do_shortcode( $content, 'r' ) . '</div>';
	}

	public static function column( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'size'   => '1/2',
				'center' => 'no',
				'last'   => null,
				'class'  => ''
			), $atts, 'column' );
		if ( $atts['last'] !== null && $atts['last'] == '1' ) $atts['class'] .= ' wt-column-last';
		if ( $atts['center'] === 'yes' ) $atts['class'] .= ' wt-column-centered';
		wt_query_asset( 'css', 'wt-box-shortcodes' );
		return '<div class="wt-column wt-column-size-' . str_replace( '/', '-', $atts['size'] ) . wt_ecssc( $atts ) . '"><div class="wt-column-inner wt-clearfix">' . wt_do_shortcode( $content, 'c' ) . '</div></div>';
	}

	public static function wt_list( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'icon' => '',
				'icon_color' => '#333',
				'style' => null,
				'class' => ''
			), $atts, 'list' );
		// Backward compatibility // 4.2.3+
		if ( $atts['style'] !== null ) {
			switch ( $atts['style'] ) {
			case 'star':
				$atts['icon'] = 'icon: star';
				$atts['icon_color'] = '#ffd647';
				break;
			case 'arrow':
				$atts['icon'] = 'icon: arrow-right';
				$atts['icon_color'] = '#00d1ce';
				break;
			case 'check':
				$atts['icon'] = 'icon: check';
				$atts['icon_color'] = '#17bf20';
				break;
			case 'cross':
				$atts['icon'] = 'icon: remove';
				$atts['icon_color'] = '#ff142b';
				break;
			case 'thumbs':
				$atts['icon'] = 'icon: thumbs-o-up';
				$atts['icon_color'] = '#8a8a8a';
				break;
			case 'link':
				$atts['icon'] = 'icon: external-link';
				$atts['icon_color'] = '#5c5c5c';
				break;
			case 'gear':
				$atts['icon'] = 'icon: cog';
				$atts['icon_color'] = '#ccc';
				break;
			case 'time':
				$atts['icon'] = 'icon: time';
				$atts['icon_color'] = '#a8a8a8';
				break;
			case 'note':
				$atts['icon'] = 'icon: edit';
				$atts['icon_color'] = '#f7d02c';
				break;
			case 'plus':
				$atts['icon'] = 'icon: plus-sign';
				$atts['icon_color'] = '#61dc3c';
				break;
			case 'guard':
				$atts['icon'] = 'icon: shield';
				$atts['icon_color'] = '#1bbe08';
				break;
			case 'event':
				$atts['icon'] = 'icon: bullhorn';
				$atts['icon_color'] = '#ff4c42';
				break;
			case 'idea':
				$atts['icon'] = 'icon: sun';
				$atts['icon_color'] = '#ffd880';
				break;
			case 'settings':
				$atts['icon'] = 'icon: cogs';
				$atts['icon_color'] = '#8a8a8a';
				break;
			case 'twitter':
				$atts['icon'] = 'icon: twitter-sign';
				$atts['icon_color'] = '#00ced6';
				break;
			}
		}
		
		if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '"></i>';
			wt_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		return '<div class="wt-list wt-list-style-' . $atts['style'] . wt_ecssc( $atts ) . '">' . str_replace( '<li>', '<li>' . $atts['icon'] . ' ', wt_do_shortcode( $content, 'l' ) ) . '</div>';
	}

	public static function button( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'        		 => get_option( 'home' ),
				'link'        		=> null, // 3.x
				'target'      		=> 'self',
				'style'       		=> 'default',
				'background'  		=> '#FFFFFF',
				'opacity'	  		=> '0',
				'background_hover'	=> '#ef4416',
				'border'			=> '#121212',
				'color'       		=> '#ffffff',
				'color_hover'  		=> '#ffffff',
				'line_height'		=> 18,
				'dark'        		=> null, // 3.x
				'size'        		=> 3,
				'wide'        		=> 'no',
				'center'      		=> 'no',
				'radius'      		=> 'auto',
				'icon'        		=> false,
				'icon_color'  		=> '#121212',
				'wt_color'    		=> null, // Dep. 4.3.2
				'wt_pos'      		=> null, // Dep. 4.3.2
				'text_shadow' 		=> 'none',
				'desc'        		=> '',
				'onclick'     		=> '',
				'rel'         		=> '',
				'title'       		=> '',
				'class'       		=> ''
			), $atts, 'button' );

		if ( $atts['link'] !== null ) $atts['url'] = $atts['link'];
		if ( $atts['dark'] !== null ) {
			$atts['background'] = $atts['color'];
			$atts['color'] = ( $atts['dark'] ) ? '#000' : '#fff';
		}
		if ( is_numeric( $atts['style'] ) ) $atts['style'] = str_replace( array( '1', '2', '3', '4', '5' ), array( 'default', 'glass', 'bubbles', 'noise', 'stroked' ), $atts['style'] ); // 3.x
		// Prepare vars
		$a_css = array();
		$span_css = array();
		$img_css = array();
		$small_css = array();
		$radius = '0px';
		$before = $after = '';
		// Text shadow values
		$shadows = array(
			'none'         => '0 0',
			'top'          => '0 -1px',
			'right'        => '1px 0',
			'bottom'       => '0 1px',
			'left'         => '-1px 0',
			'top-right'    => '1px -1px',
			'top-left'     => '-1px -1px',
			'bottom-right' => '1px 1px',
			'bottom-left'  => '-1px 1px'
		);
		// Common styles for button
		$styles = array(
			'size'     => round( ( $atts['size'] + 7 ) * 1.3 ),
			'wt_color' => ( $atts['wt_color'] === 'light' ) ? wt_hex_shift( $atts['background'], 'lighter', 50 ) : wt_hex_shift( $atts['background'], 'darker', 40 ),
			'wt_pos'   => ( $atts['wt_pos'] !== null ) ? $shadows[$atts['wt_pos']] : $shadows['none']
		);
		// Calculate border-radius
		if ( $atts['radius'] == 'auto' ) $radius = round( $atts['size'] + 2 ) . 'px';
		elseif ( $atts['radius'] == 'round' ) $radius = round( ( ( $atts['size'] * 2 ) + 2 ) * 2 + $styles['size'] ) . 'px';
		elseif ( is_numeric( $atts['radius'] ) ) $radius = intval( $atts['radius'] ) . 'px';
		// CSS rules for <a> tag
		$background = wt_hex2rgb($atts['background'], ',');
		
		$a_rules = array(
			'color'                 => $atts['color'],
			'background'      		=> 'rgba('.$background.', '.$atts['opacity'].')',
			'border-color'          => $atts['border'],
			'border-radius'         => $radius,
			'-moz-border-radius'    => $radius,
			'-webkit-border-radius' => $radius
		);
		
		$data_hover_background = $atts['background_hover'];
		// CSS rules for <span> tag
		$span_rules = array(
			'padding'               => ( $atts['icon'] ) ? round( ( $atts['size'] ) / 2 + 4 ) . 'px ' . round( $atts['size'] * 2 + 10 ) . 'px' : '0px ' . round( $atts['size'] * 2 + 10 ) . 'px',
			'font-size'             => $styles['size'] . 'px',
			'line-height'           => $atts['line_height']. 'px',
			'border-color'          => $atts['border'],
			'border-radius'         => $radius,
			'-moz-border-radius'    => $radius,
			'-webkit-border-radius' => $radius,
			'text-shadow'           => $styles['wt_pos'] . ' 1px ' . $styles['wt_color'],
			'-moz-text-shadow'      => $styles['wt_pos'] . ' 1px ' . $styles['wt_color'],
			'-webkit-text-shadow'   => $styles['wt_pos'] . ' 1px ' . $styles['wt_color']
		);
		// Apply new text-shadow value
		if ( $atts['wt_color'] === null && $atts['wt_pos'] === null ) {
			$span_rules['text-shadow'] = $atts['text_shadow'];
			$span_rules['-moz-text-shadow'] = $atts['text_shadow'];
			$span_rules['-webkit-text-shadow'] = $atts['text_shadow'];
		}
		// CSS rules for <img> tag
		$img_rules = array(
			'width'     => round( $styles['size'] * 1.5 ) . 'px',
			'height'    => round( $styles['size'] * 1.5 ) . 'px'
		);
		// CSS rules for <small> tag
		$small_rules = array(
			'padding-bottom' => round( ( $atts['size'] ) / 2 + 4 ) . 'px',
			'color' => $atts['color']
		);
		// Create style attr value for <a> tag
		foreach ( $a_rules as $a_rule => $a_value ) $a_css[] = $a_rule . ':' . $a_value;
		// Create style attr value for <span> tag
		foreach ( $span_rules as $span_rule => $span_value ) $span_css[] = $span_rule . ':' . $span_value;
		// Create style attr value for <img> tag
		foreach ( $img_rules as $img_rule => $img_value ) $img_css[] = $img_rule . ':' . $img_value;
		// Create style attr value for <img> tag
		foreach ( $small_rules as $small_rule => $small_value ) $small_css[] = $small_rule . ':' . $small_value;
		// Prepare button classes
		$classes = array( 'wt-button', 'wt-button-style-' . $atts['style'] );
		// Additional classes
		if ( $atts['class'] ) $classes[] = $atts['class'];
		// Wide class
		if ( $atts['wide'] === 'yes' ) $classes[] = 'wt-button-wide';
		// Prepare icon
		if ( $atts['icon']) {
			if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
				$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="font-size:' . $styles['size'] . 'px;color:' . $atts['icon_color'] . '"></i>';
				wt_query_asset( 'css', 'font-awesome' );
			}
			else $icon = '<img src="' . $atts['icon'] . '" alt="' . esc_attr( $content ) . '" style="' . implode( ';', $img_css ) . '" />';
		}
		else $icon = '';
		// Prepare <small> with description
		$desc = ( $atts['desc'] ) ? '<small style="' . implode( ';', $small_css ) . '">' . wt_scattr( $atts['desc'] ) . '</small>' : '';
		// Wrap with div if button centered
		if ( $atts['center'] === 'yes' ) {
			$before .= '<div class="wt-button-center">';
			$after .= '</div>';
		}
		// Replace icon marker in content,
		// add float-icon class to rearrange margins
		if ( strpos( $content, '%icon%' ) !== false ) {
			$content = str_replace( '%icon%', $icon, $content );
			$classes[] = 'wt-button-float-icon';
		}
		// Button text has no icon marker, append icon to begin of the text
		else $content = $content.' '.$icon;
		// Prepare onclick action
		$atts['onclick'] = ( $atts['onclick'] ) ? ' onClick="' . $atts['onclick'] . '"' : '';
		// Prepare rel attribute
		$atts['rel'] = ( $atts['rel'] ) ? ' rel="' . $atts['rel'] . '"' : '';
		// Prepare title attribute
		$atts['title'] = ( $atts['title'] ) ? ' title="' . $atts['title'] . '"' : '';
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		return $before . '<a href="' . wt_scattr( $atts['url'] ) . '" data-hoverback="'.esc_attr($atts['background_hover']).'" data-currentbg="'.esc_attr('rgba('.$background.', '.$atts['opacity'].')').'" data-currentbor="'.esc_attr($atts['border']).'" data-currentcolor="'.esc_attr($atts['color']).'" data-hovercolor="'.esc_attr($atts['color_hover']).'" class="' . implode( ' ', $classes ) . '" style="' . implode( ';', $a_css ) . '" target="_' . $atts['target'] . '"' . $atts['onclick'] . $atts['rel'] . $atts['title'] . '><span style="' . implode( ';', $span_css ) . '">' . do_shortcode( stripcslashes( $content ) ) . $desc . '</span></a>' . $after;
	}

	public static function services( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'style'				=> 'style_2',
			), $atts, 'services' );
			
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		if($atts['style'] == 'style_2'){
			return '<div class="row services style2">' . do_shortcode( $content ) . '</div>';
		}
		else {
			return '<div class="services text-center">' . do_shortcode( $content ) . '</div><!--.services-->';
		}
	}

	public static function service( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			    'style'		  => 'default',
				'title'       => __( 'Service title', 'universh' ),
				'et_icon'	  => '',
				'icon'        => plugins_url( 'assets/images/service.png', WT_PLUGIN_FILE ),
				'icon_color'  => '#121212',
				'text_color'  => '#ffffff',
				'size'        => 32,
				'align'		  => 'center',
				'class'       => ''
			), $atts, 'service' );
		// RTL
		$rtl = ( is_rtl() ) ? 'right' : 'left';
		// Built-in icon
		if($atts['et_icon'] != ''){
			$icon = '<i class="uni-'.esc_attr($atts['et_icon']).'" style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . ';"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . '"></i>';
			wt_query_asset( 'css', 'font-awesome' );
		}
		// Uploaded icon
		else {
			$icon = '<img src="' . $atts['icon'] . '" width="' . $atts['size'] . '" height="' . $atts['size'] . '" alt="' . $atts['title'] . '" />';
		}
		wt_query_asset( 'css', 'wt-box-shortcodes' );
		return '<div class="content-box text-' . $atts['align'] . '" style="color:'.$atts['text_color'].';">
			<!-- Icon Wraper -->
			<div class="icon-wrap">' . $icon . '
			</div><!-- Icon Wraper -->
			<!-- Content Wraper -->
			<div class="content-wrap">
				<h5 class="heading" style="color:'.$atts['text_color'].';">' . wt_scattr( $atts['title'] ) . '</h5>
				<p style="color:'.$atts['text_color'].';">' . do_shortcode( $content ) . '</p>
			</div><!-- Content Wraper -->
		</div><!-- Content Box -->';
	}

	public static function box( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'       => __( 'This is box title', 'universh' ),
				'style'       => 'default',
				'box_color'   => '#333333',
				'title_color' => '#FFFFFF',
				'color'       => null, // 3.x
				'radius'      => '3',
				'class'       => ''
			), $atts, 'box' );
		if ( $atts['color'] !== null ) $atts['box_color'] = $atts['color'];
		// Prepare border-radius
		$radius = ( $atts['radius'] != '0' ) ? 'border-radius:' . $atts['radius'] . 'px;-moz-border-radius:' . $atts['radius'] . 'px;-webkit-border-radius:' . $atts['radius'] . 'px;' : '';
		$title_radius = ( $atts['radius'] != '0' ) ? $atts['radius'] - 1 : '';
		$title_radius = ( $title_radius ) ? '-webkit-border-top-left-radius:' . $title_radius . 'px;-webkit-border-top-right-radius:' . $title_radius . 'px;-moz-border-radius-topleft:' . $title_radius . 'px;-moz-border-radius-topright:' . $title_radius . 'px;border-top-left-radius:' . $title_radius . 'px;border-top-right-radius:' . $title_radius . 'px;' : '';
		wt_query_asset( 'css', 'wt-box-shortcodes' );
		// Return result
		return '<div class="wt-box wt-box-style-' . $atts['style'] . wt_ecssc( $atts ) . '" style="border-color:' . wt_hex_shift( $atts['box_color'], 'darker', 20 ) . ';' . $radius . '"><div class="wt-box-title" style="background-color:' . $atts['box_color'] . ';color:' . $atts['title_color'] . ';' . $title_radius . '">' . wt_scattr( $atts['title'] ) . '</div><div class="wt-box-content wt-clearfix">' . wt_do_shortcode( $content, 'b' ) . '</div></div>';
	}

	public static function note( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'note_color' => '#FFFF66',
				'text_color' => '#333333',
				'background' => null, // 3.x
				'color'      => null, // 3.x
				'radius'     => '3',
				'class'      => ''
			), $atts, 'note' );
		if ( $atts['color'] !== null ) $atts['note_color'] = $atts['color'];
		if ( $atts['background'] !== null ) $atts['note_color'] = $atts['background'];
		// Prepare border-radius
		$radius = ( $atts['radius'] != '0' ) ? 'border-radius:' . $atts['radius'] . 'px;-moz-border-radius:' . $atts['radius'] . 'px;-webkit-border-radius:' . $atts['radius'] . 'px;' : '';
		wt_query_asset( 'css', 'wt-box-shortcodes' );
		return '<div class="wt-note' . wt_ecssc( $atts ) . '" style="border-color:' . wt_hex_shift( $atts['note_color'], 'darker', 10 ) . ';' . $radius . '"><div class="wt-note-inner wt-clearfix" style="background-color:' . $atts['note_color'] . ';border-color:' . wt_hex_shift( $atts['note_color'], 'lighter', 80 ) . ';color:' . $atts['text_color'] . ';' . $radius . '">' . wt_do_shortcode( $content, 'n' ) . '</div></div>';
	}

	public static function expand( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'more_text'  => __( 'Show more', 'universh' ),
				'less_text'  => __( 'Show less', 'universh' ),
				'height'     => '100',
				'hide_less'  => 'no',
				'text_color' => '#333333',
				'link_color' => '#0088FF',
				'link_style' => 'default',
				'link_align' => 'left',
				'more_icon'  => '',
				'less_icon'  => '',
				'class'      => ''
			), $atts, 'expand' );
		// Prepare more icon
		$more_icon = ( $atts['more_icon'] ) ? Wt_Tools::icon( $atts['more_icon'] ) : '';
		$less_icon = ( $atts['less_icon'] ) ? Wt_Tools::icon( $atts['less_icon'] ) : '';
		if ( $more_icon || $less_icon ) wt_query_asset( 'css', 'font-awesome' );
		// Prepare less link
		$less = ( $atts['hide_less'] !== 'yes' ) ? '<div class="wt-expand-link wt-expand-link-less" style="text-align:' . $atts['link_align'] . '"><a href="javascript:;" style="color:' . $atts['link_color'] . ';border-color:' . $atts['link_color'] . '">' . $less_icon . '<span style="border-color:' . $atts['link_color'] . '">' . $atts['less_text'] . '</span></a></div>' : '';
		wt_query_asset( 'css', 'wt-box-shortcodes' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		return '<div class="wt-expand wt-expand-collapsed wt-expand-link-style-' . $atts['link_style'] . wt_ecssc( $atts ) . '" data-height="' . $atts['height'] . '"><div class="wt-expand-content" style="color:' . $atts['text_color'] . ';max-height:' . intval( $atts['height'] ) . 'px;overflow:hidden">' . do_shortcode( $content ) . '</div><div class="wt-expand-link wt-expand-link-more" style="text-align:' . $atts['link_align'] . '"><a href="javascript:;" style="color:' . $atts['link_color'] . ';border-color:' . $atts['link_color'] . '">' . $more_icon . '<span style="border-color:' . $atts['link_color'] . '">' . $atts['more_text'] . '</span></a></div>' . $less . '</div>';
	}

	public static function lightbox( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'src'   => false,
				'type'  => 'iframe',
				'class' => ''
			), $atts, 'lightbox' );
		if ( !$atts['src'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct source', 'universh' ) );
		wt_query_asset( 'css', 'magnific-popup' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'magnific-popup' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		return '<span class="wt-lightbox' . wt_ecssc( $atts ) . '" data-mfp-src="' . wt_scattr( $atts['src'] ) . '" data-mfp-type="' . $atts['type'] . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function lightbox_content( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'id'         => '',
				'width'      => '50%',
				'margin'     => '40',
				'padding'    => '40',
				'text_align' => 'center',
				'background' => '#FFFFFF',
				'color'      => '#333333',
				'shadow'     => '0px 0px 15px #333333',
				'class'      => ''
			), $atts, 'lightbox_content' );
		wt_query_asset( 'css', 'wt-box-shortcodes' );
		if ( !$atts['id'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct ID for this block. You should use same ID as in the Content source field (when inserting lightbox shortcode)', 'universh' ) );
		$return = '<div class="wt-lightbox-content ' . wt_ecssc( $atts ) . '" id="' . trim( $atts['id'], '#' ) . '" style="display:none;width:' . $atts['width'] . ';margin-top:' . $atts['margin'] . 'px;margin-bottom:' . $atts['margin'] . 'px;padding:' . $atts['padding'] . 'px;background-color:' . $atts['background'] . ';color:' . $atts['color'] . ';box-shadow:' . $atts['shadow'] . ';text-align:' . $atts['text_align'] . '">' . do_shortcode( $content ) . '</div>';
		if ( did_action( 'ts/generator/preview/before' ) ) return '<div class="wt-lightbox-content-preview">' . $return . '</div>';
		else return $return;
	}

	public static function tooltip( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'        => 'yellow',
				'position'     => 'north',
				'shadow'       => 'no',
				'rounded'      => 'no',
				'size'         => 'default',
				'title'        => '',
				'content'      => __( 'Tooltip text', 'universh' ),
				'behavior'     => 'hover',
				'close'        => 'no',
				'class'        => ''
			), $atts, 'tooltip' );
		// Prepare style
		$atts['style'] = ( in_array( $atts['style'], array( 'light', 'dark', 'green', 'red', 'blue', 'youtube', 'tipsy', 'bootstrap', 'jtools', 'tipped', 'cluetip' ) ) ) ? $atts['style'] : 'plain';
		// Position
		$atts['position'] = str_replace( array( 'top', 'right', 'bottom', 'left' ), array( 'north', 'east', 'south', 'west' ), $atts['position'] );
		$position = array(
			'my' => str_replace( array( 'north', 'east', 'south', 'west' ), array( 'bottom center', 'center left', 'top center', 'center right' ), $atts['position'] ),
			'at' => str_replace( array( 'north', 'east', 'south', 'west' ), array( 'top center', 'center right', 'bottom center', 'center left' ), $atts['position'] )
		);
		// Prepare classes
		$classes = array( 'wt-qtip qtip-' . $atts['style'] );
		$classes[] = 'wt-qtip-size-' . $atts['size'];
		if ( $atts['shadow'] === 'yes' ) $classes[] = 'qtip-shadow';
		if ( $atts['rounded'] === 'yes' ) $classes[] = 'qtip-rounded';
		// Query assets
		wt_query_asset( 'css', 'qtip' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'qtip' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		return '<span class="wt-tooltip' . wt_ecssc( $atts ) . '" data-close="' . $atts['close'] . '" data-behavior="' . $atts['behavior'] . '" data-my="' . $position['my'] . '" data-at="' . $position['at'] . '" data-classes="' . implode( ' ', $classes ) . '" data-title="' . $atts['title'] . '" title="' . esc_attr( $atts['content'] ) . '">' . do_shortcode( $content ) . '</span>';
	}

	public static function wt_private( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'private' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		return ( current_user_can( 'publish_posts' ) ) ? '<div class="wt-private' . wt_ecssc( $atts ) . '"><div class="wt-private-shell">' . do_shortcode( $content ) . '</div></div>' : '';
	}

	public static function media( $atts = null, $content = null ) {
		// Check YouTube video
		if ( strpos( $atts['url'], 'youtu' ) !== false ) return Wt_Shortcodes::youtube( $atts );
		// Check Vimeo video
		elseif ( strpos( $atts['url'], 'vimeo' ) !== false ) return Wt_Shortcodes::vimeo( $atts );
		// Image
		else return '<img src="' . $atts['url'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" style="max-width:100%" />';
	}

	public static function youtube( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'autoplay'   => 'no',
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'youtube' );
		if ( !$atts['url'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		$atts['url'] = wt_scattr( $atts['url'] );
		$id = ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		// Prepare autoplay
		$autoplay = ( $atts['autoplay'] === 'yes' ) ? '?autoplay=1' : '';
		// Create player
		$return[] = '<div class="wt-youtube wt-responsive-media-' . $atts['responsive'] . wt_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $id . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		wt_query_asset( 'css', 'wt-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function youtube_advanced( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$params = array();
		$atts = shortcode_atts( array(
				'url'            => false,
				'width'          => 600,
				'height'         => 400,
				'responsive'     => 'yes',
				'autohide'       => 'alt',
				'autoplay'       => 'no',
				'controls'       => 'yes',
				'fs'             => 'yes',
				'loop'           => 'no',
				'modestbranding' => 'no',
				'playlist'       => '',
				'rel'            => 'yes',
				'showinfo'       => 'yes',
				'theme'          => 'dark',
				'https'          => 'no',
				'wmode'          => '',
				'class'          => ''
			), $atts, 'youtube_advanced' );
		if ( !$atts['url'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		$atts['url'] = wt_scattr( $atts['url'] );
		$id = ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		// Prepare params
		foreach ( array( 'autohide', 'autoplay', 'controls', 'fs', 'loop', 'modestbranding', 'playlist', 'rel', 'showinfo', 'theme', 'wmode' ) as $param ) $params[$param] = str_replace( array( 'no', 'yes', 'alt' ), array( '0', '1', '2' ), $atts[$param] );
		// Correct loop
		if ( $params['loop'] === '1' && $params['playlist'] === '' ) $params['playlist'] = $id;
		// Prepare protocol
		$protocol = ( $atts['https'] === 'yes' ) ? 'https' : 'http';
		// Prepare player parameters
		$params = http_build_query( $params );
		// Create player
		$return[] = '<div class="wt-youtube wt-responsive-media-' . $atts['responsive'] . wt_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="' . $protocol . '://www.youtube.com/embed/' . $id . '?' . $params . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		wt_query_asset( 'css', 'wt-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function vimeo( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'autoplay'   => 'no',
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'vimeo' );
		if ( !$atts['url'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		$atts['url'] = wt_scattr( $atts['url'] );
		$id = ( preg_match( '~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*vimeo\.com(?:[\/\w]*\/videos?)?\/([0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		// Prepare autoplay
		$autoplay = ( $atts['autoplay'] === 'yes' ) ? '&amp;autoplay=1' : '';
		// Create player
		$return[] = '<div class="wt-vimeo wt-responsive-media-' . $atts['responsive'] . wt_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="//player.vimeo.com/video/' . $id . '?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff' . $autoplay . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		wt_query_asset( 'css', 'wt-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function screenr( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'screenr' );
		if ( !$atts['url'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		$atts['url'] = wt_scattr( $atts['url'] );
		$id = ( preg_match( '~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*screenr\.com(?:[\/\w]*\/videos?)?\/([a-zA-Z0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match ) ) ? $match[1] : false;
		// Check that url is specified
		if ( !$id ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		// Create player
		$return[] = '<div class="wt-screenr wt-responsive-media-' . $atts['responsive'] . wt_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://screenr.com/embed/' . $id . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		wt_query_asset( 'css', 'wt-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function dailymotion( $atts = null, $content = null ) {
		// Prepare data
		$return = array();
		$atts = shortcode_atts( array(
				'url'        => false,
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'autoplay'   => 'no',
				'background' => '#FFC300',
				'foreground' => '#F7FFFD',
				'highlight'  => '#171D1B',
				'logo'       => 'yes',
				'quality'    => '380',
				'related'    => 'yes',
				'info'       => 'yes',
				'class'      => ''
			), $atts, 'dailymotion' );
		if ( !$atts['url'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		$atts['url'] = wt_scattr( $atts['url'] );
		$id = strtok( basename( $atts['url'] ), '_' );
		// Check that url is specified
		if ( !$id ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		// Prepare params
		$params = array();
		foreach ( array( 'autoplay', 'background', 'foreground', 'highlight', 'logo', 'quality', 'related', 'info' ) as $param )
			$params[] = $param . '=' . str_replace( array( 'yes', 'no', '#' ), array( '1', '0', '' ), $atts[$param] );
		// Create player
		$return[] = '<div class="wt-dailymotion wt-responsive-media-' . $atts['responsive'] . wt_ecssc( $atts ) . '">';
		$return[] = '<iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.dailymotion.com/embed/video/' . $id . '?' . implode( '&', $params ) . '" frameborder="0" allowfullscreen="true"></iframe>';
		$return[] = '</div>';
		wt_query_asset( 'css', 'wt-media-shortcodes' );
		// Return result
		return implode( '', $return );
	}

	public static function audio( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'width'    => 'auto',
				'title'    => '',
				'autoplay' => 'no',
				'loop'     => 'no',
				'class'    => ''
			), $atts, 'audio' );
		if ( !$atts['url'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		$atts['url'] = wt_scattr( $atts['url'] );
		// Generate unique ID
		$id = uniqid( 'wt_audio_player_' );
		// Prepare width
		$width = ( $atts['width'] !== 'auto' ) ? 'max-width:' . $atts['width'] : '';
		// Check that url is specified
		if ( !$atts['url'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		wt_query_asset( 'css', 'wt-players-shortcodes' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'jplayer' );
		wt_query_asset( 'js', 'wt-players-shortcodes' );
		wt_query_asset( 'js', 'wt-players-shortcodes' );
		// Create player
		return '<div class="wt-audio' . wt_ecssc( $atts ) . '" data-id="' . $id . '" data-audio="' . $atts['url'] . '" data-swf="' . plugins_url( 'assets/other/Jplayer.swf', WT_PLUGIN_FILE ) . '" data-autoplay="' . $atts['autoplay'] . '" data-loop="' . $atts['loop'] . '" style="' . $width . '"><div id="' . $id . '" class="jp-jplayer"></div><div id="' . $id . '_container" class="jp-audio"><div class="jp-type-single"><div class="jp-gui jp-interface"><div class="jp-controls"><span class="jp-play"></span><span class="jp-pause"></span><span class="jp-stop"></span><span class="jp-mute"></span><span class="jp-unmute"></span><span class="jp-volume-max"></span></div><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div><div class="jp-current-time"></div><div class="jp-duration"></div></div><div class="jp-title">' . $atts['title'] . '</div></div></div></div>';
	}

	public static function video( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'poster'   => false,
				'title'    => '',
				'width'    => 600,
				'height'   => 300,
				'controls' => 'yes',
				'autoplay' => 'no',
				'loop'     => 'no',
				'class'    => ''
			), $atts, 'video' );
		if ( !$atts['url'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		$atts['url'] = wt_scattr( $atts['url'] );
		// Generate unique ID
		$id = uniqid( 'wt_video_player_' );
		// Check that url is specified
		if ( !$atts['url'] ) return Wt_Tools::error( __FUNCTION__, __( 'please specify correct url', 'universh' ) );
		// Prepare title
		$title = ( $atts['title'] ) ? '<div class="jp-title">' . $atts['title'] . '</div>' : '';
		wt_query_asset( 'css', 'wt-players-shortcodes' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'jplayer' );
		wt_query_asset( 'js', 'wt-players-shortcodes' );
		// Create player
		return '<div style="width:' . $atts['width'] . 'px; max-width: 100%;"><div id="' . $id . '" class="wt-video jp-video wt-video-controls-' . $atts['controls'] . wt_ecssc( $atts ) . '" data-id="' . $id . '" data-video="' . $atts['url'] . '" data-swf="' . plugins_url( 'assets/other/Jplayer.swf', WT_PLUGIN_FILE ) . '" data-autoplay="' . $atts['autoplay'] . '" data-loop="' . $atts['loop'] . '" data-poster="' . $atts['poster'] . '"><div id="' . $id . '_player" class="jp-jplayer" style="width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px; max-width: 100%;"></div>' . $title . '<div class="jp-start jp-play"></div><div class="jp-gui"><div class="jp-interface"><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-current-time"></div><div class="jp-duration"></div><div class="jp-controls-holder"><span class="jp-play"></span><span class="jp-pause"></span><span class="jp-mute"></span><span class="jp-unmute"></span><span class="jp-full-screen"></span><span class="jp-restore-screen"></span><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div></div></div></div></div></div>';
	}
	
	public static function custom_video( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => 'wYKDff_94Kw',
				'poster'   => plugins_url( 'assets/images/video.jpg', WT_PLUGIN_FILE ),
				'class'    => '',
				'video_control' => 'yes',
				'full_screen'	=> 'no',
		), $atts, 'custom_video' );
		$url = $atts['url'];
		$class = '.video-bg';
		if($atts['full_screen'] == 'yes'){
			$screen_class = 'full-screen';
		} else{
			$screen_class = 'sm';
		}
		?>
		<section class="<?php echo $screen_class; ?> relative typo-light video-bg min-height bg-cover overlay" data-background="<?php echo $atts['poster']; ?>"  data-stellar-background-ratio="0.5">
		<div class="player" 
			data-property="{videoURL:'https://youtu.be/<?php echo $url; ?>',containment:'.video-bg',startAt:0, mute:true, autoPlay:true, showControls:false}">
		</div>
		<?php if($atts['video_control'] == 'yes'): ?>
        <div id="video-controls" class="video-controls" data-animation="fadeInRight" data-animation-delay="800">
			<a class="fa fa-pause" href="#"></a>
			<a class="fa fa-volume-down" href="#"></a>
        </div>
        <?php endif; ?>
        <div class="content-video-details"><?php echo do_shortcode($content); ?></div>
	</section>
	<?php }
	
	public static function custom_audio( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'      => false,
				'class'    => ''
		), $atts, 'custom_audio' );
		return '<iframe class="soundcloud" src="https://w.soundcloud.com/player/?url='.$atts['url'].'&amp;color=fbbc25&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>';
	}

	public static function table( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'       => 'default',
				'url'   => false,
				'class' => ''
			), $atts, 'table' );
			if($atts['style'] == 'style2'){
				$tab_class = 'table-striped';
			} elseif($atts['style'] == 'style3') {
				$tab_class = 'table-bordered';
			}elseif($atts['style'] == 'style4') {
				$tab_class = 'table-hover';
			} else{
				$tab_class = '';
			}
		$return = '<div class="wt-table ' . wt_ecssc( $atts ) . ' wt-table-'. $atts['style'] .' '.$tab_class.'">';
		$return .= ( $atts['url'] ) ? wt_parse_csv( $atts['url'] ) : do_shortcode( $content );
		$return .= '</div>';
		//wt_query_asset( 'css', 'wt-content-shortcodes' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		return $return;
	}

	public static function permalink( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'id' => 1,
				'p' => null, // 3.x
				'target' => 'self',
				'class' => ''
			), $atts, 'permalink' );
		if ( $atts['p'] !== null ) $atts['id'] = $atts['p'];
		$atts['id'] = wt_scattr( $atts['id'] );
		// Prepare link text
		$text = ( $content ) ? $content : get_the_title( $atts['id'] );
		return '<a href="' . get_permalink( $atts['id'] ) . '" class="' . wt_ecssc( $atts ) . '" title="' . $text . '" target="_' . $atts['target'] . '">' . $text . '</a>';
	}

	public static function members( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'message'    => __( 'This content is for registered users only. Please %login%.', 'universh' ),
				'color'      => '#ffcc00',
				'style'      => null, // 3.x
				'login_text' => __( 'login', 'universh' ),
				'login_url'  => wp_login_url(),
				'login'      => null, // 3.x
				'class'      => ''
			), $atts, 'members' );
		if ( $atts['style'] !== null ) $atts['color'] = str_replace( array( '0', '1', '2' ), array( '#fff', '#FFFF29', '#1F9AFF' ), $atts['style'] );
		// Check feed
		if ( is_feed() ) return;
		// Check authorization
		if ( !is_user_logged_in() ) {
			if ( $atts['login'] !== null && $atts['login'] == '0' ) return; // 3.x
			// Prepare login link
			$login = '<a href="' . esc_attr( $atts['login_url'] ) . '">' . $atts['login_text'] . '</a>';
			wt_query_asset( 'css', 'wt-other-shortcodes' );
			return '<div class="wt-members' . wt_ecssc( $atts ) . '" style="background-color:' . wt_hex_shift( $atts['color'], 'lighter', 50 ) . ';border-color:' .wt_hex_shift( $atts['color'], 'darker', 20 ) . ';color:' .wt_hex_shift( $atts['color'], 'darker', 60 ) . '">' . str_replace( '%login%', $login, wt_scattr( $atts['message'] ) ) . '</div>';
		}
		// Return original content
		else return do_shortcode( $content );
	}

	public static function guests( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'guests' );
		$return = '';
		if ( !is_user_logged_in() && !is_null( $content ) ) {
			wt_query_asset( 'css', 'wt-other-shortcodes' );
			$return = '<div class="wt-guests' . wt_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
		}
		return $return;
	}

	public static function feed( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'   => get_bloginfo_rss( 'rss2_url' ),
				'limit' => 3,
				'class' => ''
			), $atts, 'feed' );
		if ( !function_exists( 'wp_rss' ) ) include_once ABSPATH . WPINC . '/rss.php';
		ob_start();
		echo '<div class="wt-feed' . wt_ecssc( $atts ) . '">';
		wp_rss( $atts['url'], $atts['limit'] );
		echo '</div>';
		$return = ob_get_contents();
		ob_end_clean();
		return $return;
	}

	public static function subpages( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'depth' => 1,
				'p'     => false,
				'class' => ''
			), $atts, 'subpages' );
		global $post;
		$child_of = ( $atts['p'] ) ? $atts['p'] : get_the_ID();
		$return = wp_list_pages( array(
				'title_li' => '',
				'echo' => 0,
				'child_of' => $child_of,
				'depth' => $atts['depth']
			) );
		return ( $return ) ? '<ul class="wt-subpages' . wt_ecssc( $atts ) . '">' . $return . '</ul>' : false;
	}

	public static function siblings( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'depth' => 1, 'class' => '' ), $atts, 'siblings' );
		global $post;
		$return = wp_list_pages( array( 'title_li' => '',
				'echo' => 0,
				'child_of' => $post->post_parent,
				'depth' => $atts['depth'],
				'exclude' => $post->ID ) );
		return ( $return ) ? '<ul class="wt-siblings' . wt_ecssc( $atts ) . '">' . $return . '</ul>' : false;
	}

	public static function menu( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'name' => false,
				'class' => ''
			), $atts, 'menu' );
		$return = wp_nav_menu( array(
				'echo'        => false,
				'menu'        => $atts['name'],
				'container'   => false,
				'fallback_cb' => array( __CLASS__, 'menu_fb' ),
				'items_wrap'  => '<ul id="%1$s" class="%2$s' . wt_ecssc( $atts ) . '">%3$s</ul>'
			) );
		return ( $atts['name'] ) ? $return : false;
	}

	public static function menu_fb() {
		return __( 'This menu doesn\'t exists, or has no elements', 'universh' );
	}

	public static function document( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'url'        => '',
				'file'       => null, // 3.x
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'class'      => ''
			), $atts, 'document' );
		if ( $atts['file'] !== null ) $atts['url'] = $atts['file'];
		wt_query_asset( 'css', 'wt-media-shortcodes' );
		return '<div class="wt-document wt-responsive-media-' . $atts['responsive'] . '"><iframe src="//docs.google.com/viewer?embedded=true&url=' . $atts['url'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="wt-document' . wt_ecssc( $atts ) . '"></iframe></div>';
	}

	public static function gmap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'width'      => 600,
				'height'     => 400,
				'responsive' => 'yes',
				'address'    => 'New York',
				'class'      => ''
			), $atts, 'gmap' );
		wt_query_asset( 'css', 'wt-media-shortcodes' );
		return '<div class="wt-gmap wt-responsive-media-' . $atts['responsive'] . wt_ecssc( $atts ) . '"><iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://maps.google.com/maps?q=' . urlencode( wt_scattr( $atts['address'] ) ) . '&amp;output=embed"></iframe></div>';
	}

	public static function slider( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'     => 'none',
				'limit'      => 20,
				'gallery'    => null, // Dep. 4.3.2
				'link'       => 'none',
				'target'     => 'self',
				'width'      => 600,
				'height'     => 300,
				'responsive' => 'yes',
				'title'      => 'yes',
				'centered'   => 'yes',
				'arrows'     => 'yes',
				'pages'      => 'yes',
				'mousewheel' => 'yes',
				'autoplay'   => 3000,
				'speed'      => 600,
				'class'      => ''
			), $atts, 'slider' );
		// Get slides
		$slides = (array) Wt_Tools::get_slides( $atts );
		// Loop slides
		if ( count( $slides ) ) {
			// Prepare unique ID
			$id = uniqid( 'wt_slider_' );
			// Links target
			$target = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Centered class
			$centered = ( $atts['centered'] === 'yes' ) ? ' wt-slider-centered' : '';
			// Wheel control
			$mousewheel = ( $atts['mousewheel'] === 'yes' ) ? 'true' : 'false';
			// Prepare width and height
			$size = ( $atts['responsive'] === 'yes' ) ? 'width:100%' : 'width:' . intval( $atts['width'] ) . 'px;height:' . intval( $atts['height'] ) . 'px';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' wt-lightbox-gallery';
			// Open slider
			$return .= '<div id="' . $id . '" class="wt-slider' . $centered . ' wt-slider-pages-' . $atts['pages'] . ' wt-slider-responsive-' . $atts['responsive'] . wt_ecssc( $atts ) . '" style="' . $size . '" data-autoplay="' . $atts['autoplay'] . '" data-speed="' . $atts['speed'] . '" data-mousewheel="' . $mousewheel . '"><div class="wt-slider-slides">';
			// Create slides
			foreach ( $slides as $slide ) {
				// Crop the image
				$image = wt_image_resize( $slide['image'], $atts['width'], $atts['height'] );
				// Prepare slide title
				$title = ( $atts['title'] === 'yes' && $slide['title'] ) ? '<span class="wt-slider-slide-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="wt-slider-slide">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '"' . $target . 'title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
			}
			// Close slides
			$return .= '</div>';
			// Open nav section
			$return .= '<div class="wt-slider-nav">';
			// Append direction nav
			if ( $atts['arrows'] === 'yes' ) $return .= '<div class="wt-slider-direction"><span class="wt-slider-prev"></span><span class="wt-slider-next"></span></div>';
			// Append pagination nav
			$return .= '<div class="wt-slider-pagination"></div>';
			// Close nav section
			$return .= '</div>';
			// Close slider
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				wt_query_asset( 'css', 'magnific-popup' );
				wt_query_asset( 'js', 'magnific-popup' );
			}
			wt_query_asset( 'css', 'wt-galleries-shortcodes' );
			wt_query_asset( 'js', 'jquery' );
			wt_query_asset( 'js', 'swiper' );
			wt_query_asset( 'js', 'wt-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Wt_Tools::error( __FUNCTION__, __( 'images not found', 'universh' ) );
		return $return;
	}

	public static function carousel( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'style'		 => 'default',
				'source'     => 'none',
				'limit'      => 20,
				'gallery'    => null, // Dep. 4.3.2
				'link'       => 'none',
				'target'     => 'self',
				'width'      => 600,
				'height'     => 100,
				'responsive' => 'yes',
				'items'      => 3,
				'margin'	 => 0,
				'scroll'     => 1,
				'title'      => 'yes',
				'centered'   => 'yes',
				'arrows'     => 'yes',
				'pages'      => 'no',
				'mousewheel' => 'yes',
				'autoplay'   => 3000,
				'speed'      => 600,
				'class'      => ''
			), $atts, 'carousel' );
		// Get slides
		$slides = (array) Wt_Tools::get_slides( $atts );
		if($atts['style'] == 'style_2'){
		// Loop slides
		if ( count( $slides ) ) {
			// Links target
			$return .= '<div class="owl-carousel dots-inline" 
						data-animatein="" 
						data-animateout="" 
						data-items="' . $atts['items'] . '" 
						data-loop="true" 
						data-merge="true" 
						data-nav="true" 
						data-dots="true" 
						data-stagepadding=""
						data-margin="' . $atts['margin'] . '"
						data-mobile="1" 
						data-tablet="1" 
						data-desktopsmall="2"  
						data-desktop="' . $atts['items'] . '" 
						data-autoplay="false" 
						data-delay="3000" 
						data-navigation="true">';
			// Create slides
			foreach ( (array) $slides as $slide ) {
				// Crop the image
				//$image = wt_image_resize( $slide['image'], ( round( $atts['width'] / $atts['items'] ) - 18 ), $atts['height'] );
				// Open slide
				$return .= '<div class="item"><img src="'.$slide['image'].'" alt="" /></div>';
			}
			// Close slides
			$return .= '</div>';
			// Open nav section
		}
		// Slides not found
		else $return = Wt_Tools::error( __FUNCTION__, __( 'images not found', 'universh' ) );
		return $return;
		} else {
			// Loop slides
		if ( count( $slides ) ) {
			// Prepare unique ID
			$id = uniqid( 'wt_carousel_' );
			// Links target
			$target = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Centered class
			$centered = ( $atts['centered'] === 'yes' ) ? ' wt-carousel-centered' : '';
			// Wheel control
			$mousewheel = ( $atts['mousewheel'] === 'yes' ) ? 'true' : 'false';
			// Prepare width and height
			$size = ( $atts['responsive'] === 'yes' ) ? 'width:100%' : 'width:' . intval( $atts['width'] ) . 'px;height:' . intval( $atts['height'] ) . 'px';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' wt-lightbox-gallery';
			// Open slider
			$return .= '<div id="' . $id . '" class="wt-carousel' . $centered . ' wt-carousel-pages-' . $atts['pages'] . ' wt-carousel-responsive-' . $atts['responsive'] . wt_ecssc( $atts ) . '" style="' . $size . '" data-autoplay="' . $atts['autoplay'] . '" data-speed="' . $atts['speed'] . '" data-mousewheel="' . $mousewheel . '" data-items="' . $atts['items'] . '" data-scroll="' . $atts['scroll'] . '"><div class="wt-carousel-slides">';
			// Create slides
			foreach ( (array) $slides as $slide ) {
				// Crop the image
				$image = wt_image_resize( $slide['image'], ( round( $atts['width'] / $atts['items'] ) - 18 ), $atts['height'] );
				// Prepare slide title
				$title = ( $atts['title'] === 'yes' && $slide['title'] ) ? '<span class="wt-carousel-slide-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="wt-carousel-slide">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '"' . $target . 'title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
			}
			// Close slides
			$return .= '</div>';
			// Open nav section
			$return .= '<div class="wt-carousel-nav">';
			// Append direction nav
			if ( $atts['arrows'] === 'yes'
			) $return .= '<div class="wt-carousel-direction"><span class="wt-carousel-prev"></span><span class="wt-carousel-next"></span></div>';
			// Append pagination nav
			$return .= '<div class="wt-carousel-pagination"></div>';
			// Close nav section
			$return .= '</div>';
			// Close slider
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				wt_query_asset( 'css', 'magnific-popup' );
				wt_query_asset( 'js', 'magnific-popup' );
			}
			wt_query_asset( 'css', 'wt-galleries-shortcodes' );
			wt_query_asset( 'js', 'jquery' );
			wt_query_asset( 'js', 'swiper' );
			wt_query_asset( 'js', 'wt-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Wt_Tools::error( __FUNCTION__, __( 'images not found', 'universh' ) );
		return $return;
		}
	}

	public static function custom_gallery( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
				'source'  => 'none',
				'limit'   => 20,
				'gallery' => null, // Dep. 4.4.0
				'link'    => 'none',
				'width'   => 90,
				'height'  => 90,
				'title'   => 'hover',
				'target'  => 'self',
				'class'   => ''
			), $atts, 'custom_gallery' );
		$slides = (array) Wt_Tools::get_slides( $atts );
		// Loop slides
		if ( count( $slides ) ) {
			// Prepare links target
			$atts['target'] = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
			// Add lightbox class
			if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' wt-lightbox-gallery';
			// Open gallery
			$return = '<div class="wt-custom-gallery wt-custom-gallery-title-' . $atts['title'] . wt_ecssc( $atts ) . ' gallery">';
			// Create slides
			foreach ( $slides as $slide ) {
					$class_col = 'col-lg-3 col-md-3 col-xs-6';
				// Crop image
				$image = wt_image_resize( $slide['image'], $atts['width'], $atts['height'] );
				// Prepare slide title
				$title = ( $slide['title'] ) ? '<span class="wt-custom-gallery-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
				// Open slide
				$return .= '<div class="wt-custom-gallery-slide single-work '.$class_col.'">';
				// Slide content with link
				if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . ' ' . $atts['target'] . '" title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
				// Slide content without link
				else $return .= '<a><img src="' . esc_url($image['url']) . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
				// Close slide
				$return .= '</div>';
			}
			// Clear floats
			$return .= '<div class="wt-clear"></div>';
			// Close gallery
			$return .= '</div>';
			// Add lightbox assets
			if ( $atts['link'] === 'lightbox' ) {
				wt_query_asset( 'css', 'magnific-popup' );
				wt_query_asset( 'js', 'jquery' );
				wt_query_asset( 'js', 'magnific-popup' );
				wt_query_asset( 'js', 'wt-galleries-shortcodes' );
			}
			wt_query_asset( 'css', 'wt-galleries-shortcodes' );
		}
		// Slides not found
		else $return = Wt_Tools::error( __FUNCTION__, __( 'images not found', 'universh' ) );
		return $return;
	}

	public static function posts( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/default-loop.php',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'column'			  => 3,
				'post_type'           => 'post',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'meta_key'            => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no'
			), $atts, 'posts' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$meta_key = sanitize_text_field( $atts['meta_key'] );
		$offset = intval( $atts['offset'] );
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_parent = $atts['post_parent'];
		$post_status = $atts['post_status'];
		$post_type = sanitize_text_field( $atts['post_type'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tag = sanitize_text_field( $atts['tag'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// Meta key (for ordering)
		if ( !empty( $meta_key ) ) $args['meta_key'] = $meta_key;
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// Offset
		if ( !empty( $offset ) ) $args['offset'] = $offset;
		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated = array();
		$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) $validated[] = $unvalidated;
		}
		if ( !empty( $validated ) ) $args['post_status'] = $validated;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Wt_Tools::error( __FUNCTION__, __( 'template not found', 'universh' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		return $output;
	}
	
	public static function custom_search( $atts = null, $content = null ){
		$atts = shortcode_atts( array(
				'post_type'                  => 'lp_course',
			), $atts, 'custom_search' );
		$html = '
		<div class="search">
			<form role="search" method="get" class="dark" action="'.home_url( '/' ).'" id="searchForm">
				<div class="input-group">
					<input type="hidden" value="'.$atts['post_type'].'" name="post_type" id="post_type" />
					<input type="search" class="form-control search" name="s" placeholder="'. esc_html__('Finish your course Search here', 'universh').'" value="'.get_search_query().'">
					<span class="input-group-btn">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
		</div>';
	
	return $html;
		
	}
	
	public static function courses( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/course-loop.php',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'column'			  => 3,
				'post_type'           => 'lp_course',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'meta_key'            => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no'
			), $atts, 'courses' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$meta_key = sanitize_text_field( $atts['meta_key'] );
		$offset = intval( $atts['offset'] );
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_parent = $atts['post_parent'];
		$post_status = $atts['post_status'];
		$post_type = sanitize_text_field( $atts['post_type'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tag = sanitize_text_field( $atts['tag'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// Meta key (for ordering)
		if ( !empty( $meta_key ) ) $args['meta_key'] = $meta_key;
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// Offset
		if ( !empty( $offset ) ) $args['offset'] = $offset;
		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated = array();
		$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) $validated[] = $unvalidated;
		}
		if ( !empty( $validated ) ) $args['post_status'] = $validated;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Wt_Tools::error( __FUNCTION__, __( 'template not found', 'universh' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		return $output;
	}
	
	public static function news( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/news-loop.php',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'column'			  => 3,
				'post_type'           => 'news',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'meta_key'            => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no'
			), $atts, 'news' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$meta_key = sanitize_text_field( $atts['meta_key'] );
		$offset = intval( $atts['offset'] );
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_parent = $atts['post_parent'];
		$post_status = $atts['post_status'];
		$post_type = sanitize_text_field( $atts['post_type'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tag = sanitize_text_field( $atts['tag'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// Meta key (for ordering)
		if ( !empty( $meta_key ) ) $args['meta_key'] = $meta_key;
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// Offset
		if ( !empty( $offset ) ) $args['offset'] = $offset;
		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated = array();
		$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) $validated[] = $unvalidated;
		}
		if ( !empty( $validated ) ) $args['post_status'] = $validated;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Wt_Tools::error( __FUNCTION__, __( 'template not found', 'universh' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		return $output;
	}
	
	public static function events( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/events-loop.php',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'column'			  => 3,
				'post_type'           => 'tribe_events',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'meta_key'            => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no'
			), $atts, 'news' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$meta_key = sanitize_text_field( $atts['meta_key'] );
		$offset = intval( $atts['offset'] );
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_parent = $atts['post_parent'];
		$post_status = $atts['post_status'];
		$post_type = sanitize_text_field( $atts['post_type'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tag = sanitize_text_field( $atts['tag'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// Meta key (for ordering)
		if ( !empty( $meta_key ) ) $args['meta_key'] = $meta_key;
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// Offset
		if ( !empty( $offset ) ) $args['offset'] = $offset;
		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated = array();
		$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) $validated[] = $unvalidated;
		}
		if ( !empty( $validated ) ) $args['post_status'] = $validated;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Wt_Tools::error( __FUNCTION__, __( 'template not found', 'universh' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		return $output;
	}
	
	public static function teachers( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/teachers-loop.php',
				'border_style'		  => 'border-style',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'column'			  => 3,
				'post_type'           => 'teachers',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'meta_key'            => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no',
				'background_style'	  => 'bg-white',
				'text_style'	  	  => 'typo-dark',
				'social_style'	  	  => 'default',
				'text_align'		  => 'left',
			), $atts, 'courses' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$meta_key = sanitize_text_field( $atts['meta_key'] );
		$offset = intval( $atts['offset'] );
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_parent = $atts['post_parent'];
		$post_status = $atts['post_status'];
		$post_type = sanitize_text_field( $atts['post_type'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tag = sanitize_text_field( $atts['tag'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// Meta key (for ordering)
		if ( !empty( $meta_key ) ) $args['meta_key'] = $meta_key;
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// Offset
		if ( !empty( $offset ) ) $args['offset'] = $offset;
		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated = array();
		$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) $validated[] = $unvalidated;
		}
		if ( !empty( $validated ) ) $args['post_status'] = $validated;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Wt_Tools::error( __FUNCTION__, __( 'template not found', 'universh' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		return $output;
	}
	
	public static function galleries( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/gallery-loop.php',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'column'			  => 3,
				'gallery_style'		  => 'gutter',
				'post_type'           => 'gallery',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'meta_key'            => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no'
			), $atts, 'courses' );

		$original_atts = $atts;

		$author = sanitize_text_field( $atts['author'] );
		$id = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$meta_key = sanitize_text_field( $atts['meta_key'] );
		$offset = intval( $atts['offset'] );
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$post_parent = $atts['post_parent'];
		$post_status = $atts['post_status'];
		$post_type = sanitize_text_field( $atts['post_type'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tag = sanitize_text_field( $atts['tag'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag
		);
		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) $args['ignore_sticky_posts'] = true;
		// Meta key (for ordering)
		if ( !empty( $meta_key ) ) $args['meta_key'] = $meta_key;
		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}
		// Post Author
		if ( !empty( $author ) ) $args['author'] = $author;
		// Offset
		if ( !empty( $offset ) ) $args['offset'] = $offset;
		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated = array();
		$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) $validated[] = $unvalidated;
		}
		if ( !empty( $validated ) ) $args['post_status'] = $validated;
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Wt_Tools::error( __FUNCTION__, __( 'template not found', 'universh' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		return $output;
	}

	public static function dummy_text( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'amount' => 1,
				'what'   => 'paras',
				'cache'  => 'yes',
				'class'  => ''
			), $atts, 'dummy_text' );
		$transient = 'su/cache/dummy_text/' . sanitize_text_field( $atts['what'] ) . '/' . intval( $atts['amount'] );
		$return = get_transient( $transient );
		if ( $return && $atts['cache'] === 'yes' && WT_ENABLE_CACHE ) return $return;
		else {
			$xml = simplexml_load_file( 'http://www.lipsum.com/feed/xml?amount=' . $atts['amount'] . '&what=' . $atts['what'] . '&start=0' );
			$return = '<div class="wt-dummy-text' . wt_ecssc( $atts ) . '">' . wpautop( str_replace( "\n", "\n\n", $xml->lipsum ) ) . '</div>';
			set_transient( $transient, $return, 60*60*24*30 );
			return $return;
		}
	}

	public static function dummy_image( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'width'  => 500,
				'height' => 300,
				'theme'  => 'any',
				'class'  => ''
			), $atts, 'dummy_image' );
		$url = 'http://lorempixel.com/' . $atts['width'] . '/' . $atts['height'] . '/';
		if ( $atts['theme'] !== 'any' ) $url .= $atts['theme'] . '/' . rand( 0, 10 ) . '/';
		return '<img src="' . $url . '" alt="' . __( 'Dummy image', 'universh' ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="wt-dummy-image' . wt_ecssc( $atts ) . '" />';
	}

	public static function animate( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'type'      => 'bounceIn',
				'duration'  => 1,
				'delay'     => 0,
				'inline'    => 'no',
				'class'     => ''
			), $atts, 'animate' );
		$tag = ( $atts['inline'] === 'yes' ) ? 'span' : 'div';
		$time = '-webkit-animation-duration:' . $atts['duration'] . 's;-webkit-animation-delay:' . $atts['delay'] . 's;animation-duration:' . $atts['duration'] . 's;animation-delay:' . $atts['delay'] . 's;';
		$return = '<' . $tag . ' class="wt-animate' . wt_ecssc( $atts ) . '" style="visibility:hidden;' . $time . '" data-animation="' . $atts['type'] . '" data-duration="' . $atts['duration'] . '" data-delay="' . $atts['delay'] . '">' . do_shortcode( $content ) . '</' . $tag . '>';
		wt_query_asset( 'css', 'animate' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'inview' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		return $return;
	}

	public static function meta( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'key'     => '',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'post_id' => '',
				'filter'  => ''
			), $atts, 'meta' );
		// Define current post ID
		if ( !$atts['post_id'] ) $atts['post_id'] = get_the_ID();
		// Check post ID
		if ( !is_numeric( $atts['post_id'] ) || $atts['post_id'] < 1 ) return sprintf( '<p class="wt-error">Meta: %s</p>', __( 'post ID is incorrect', 'universh' ) );
		// Check key name
		if ( !$atts['key'] ) return sprintf( '<p class="wt-error">Meta: %s</p>', __( 'please specify meta key name', 'universh' ) );
		// Get the meta
		$meta = get_post_meta( $atts['post_id'], $atts['key'], true );
		// Set default value if meta is empty
		if ( !$meta ) $meta = $atts['default'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $meta = call_user_func( $atts['filter'], $meta );
		// Return result
		return ( $meta ) ? $atts['before'] . $meta . $atts['after'] : '';
	}

	public static function user( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'field'   => 'display_name',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'user_id' => '',
				'filter'  => ''
			), $atts, 'user' );
		// Check for password requests
		if ( $atts['field'] === 'user_pass' ) return sprintf( '<p class="wt-error">User: %s</p>', __( 'password field is not allowed', 'universh' ) );
		// Define current user ID
		if ( !$atts['user_id'] ) $atts['user_id'] = get_current_user_id();
		// Check user ID
		if ( !is_numeric( $atts['user_id'] ) || $atts['user_id'] < 1 ) return sprintf( '<p class="wt-error">User: %s</p>', __( 'user ID is incorrect', 'universh' ) );
		// Get user data
		$user = get_user_by( 'id', $atts['user_id'] );
		// Get user data if user was found
		$user = ( $user && isset( $user->data->$atts['field'] ) ) ? $user->data->$atts['field'] : $atts['default'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $user = call_user_func( $atts['filter'], $user );
		// Return result
		return ( $user ) ? $atts['before'] . $user . $atts['after'] : '';
	}

	public static function post( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'field'   => 'post_title',
				'default' => '',
				'before'  => '',
				'after'   => '',
				'post_id' => '',
				'filter'  => ''
			), $atts, 'post' );
		// Define current post ID
		if ( !$atts['post_id'] ) $atts['post_id'] = get_the_ID();
		// Check post ID
		if ( !is_numeric( $atts['post_id'] ) || $atts['post_id'] < 1 ) return sprintf( '<p class="wt-error">Post: %s</p>', __( 'post ID is incorrect', 'universh' ) );
		// Get the post
		$post = get_post( $atts['post_id'] );
		// Set default value if meta is empty
		$post = ( empty( $post ) || empty( $post->$atts['field'] ) ) ? $atts['default'] : $post->$atts['field'];
		// Apply cutom filter
		if ( $atts['filter'] && function_exists( $atts['filter'] ) ) $post = call_user_func( $atts['filter'], $post );
		// Return result
		return ( $post ) ? $atts['before'] . $post . $atts['after'] : '';
	}

	public static function template( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'name' => ''
			), $atts, 'template' );
		// Check template name
		if ( !$atts['name'] ) return sprintf( '<p class="wt-error">Template: %s</p>', __( 'please specify template name', 'universh' ) );
		// Get template output
		ob_start();
		get_template_part( str_replace( '.php', '', $atts['name'] ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return result
		return $output;
	}

	public static function qrcode( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'data' => '',
				'title' => '',
				'size' => 200,
				'margin' => 0,
				'align' => 'none',
				'link' => '',
				'target' => 'blank',
				'color' => '#000000',
				'background' => '#ffffff',
				'class' => ''
			), $atts, 'qrcode' );
		// Check the data
		if ( !$atts['data'] ) return 'QR code: ' . __( 'please specify the data', 'universh' );
		// Prepare link
		$href = ( $atts['link'] ) ? ' href="' . $atts['link'] . '"' : '';
		// Prepare clickable class
		if ( $atts['link'] ) $atts['class'] .= ' wt-qrcode-clickable';
		// Prepare title
		$atts['title'] = esc_attr( $atts['title'] );
		// Query assets
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		// Return result
		return '<span class="wt-qrcode wt-qrcode-align-' . $atts['align'] . wt_ecssc( $atts ) . '"><a' . $href . ' target="_' . $atts['target'] . '" title="' . $atts['title'] . '"><img src="https://api.qrserver.com/v1/create-qr-code/?data=' . urlencode( $atts['data'] ) . '&size=' . $atts['size'] . 'x' . $atts['size'] . '&format=png&margin=' . $atts['margin'] . '&color=' . wt_hex2rgb( $atts['color'] ) . '&bgcolor=' . wt_hex2rgb( $atts['background'] ) . '" alt="' . $atts['title'] . '" /></a></span>';
	}

	public static function scheduler( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'time'       => 'all',
				'days_week'  => 'all',
				'days_month' => 'all',
				'months'     => 'all',
				'years'      => 'all',
				'alt'        => ''
			), $atts, 'scheduler' );
		// Check time
		if ( $atts['time'] !== 'all' ) {
			// Get current time
			$now = current_time( 'timestamp', 0 );
			// Sanitize
			$atts['time'] = preg_replace( "/[^0-9-,:]/", '', $atts['time'] );
			// Loop time ranges
			foreach( explode( ',', $atts['time'] ) as $range ) {
				// Check for range symbol
				if ( strpos( $range, '-' ) === false ) return Wt_Tools::error( __FUNCTION__, sprintf( __( 'Incorrect time range (%s). Please use - (minus) symbol to specify time range. Example: 14:00 - 18:00', 'universh' ), $range ) );
				// Split begin/end time
				$time = explode( '-', $range );
				// Add minutes
				if ( strpos( $time[0], ':' ) === false ) $time[0] .= ':00';
				if ( strpos( $time[1], ':' ) === false ) $time[1] .= ':00';
				// Parse begin/end time
				$time[0] = strtotime( $time[0] );
				$time[1] = strtotime( $time[1] );
				// Check time
				if ( $now < $time[0] || $now > $time[1] ) return $atts['alt'];
			}
		}
		// Check day of the week
		if ( $atts['days_week'] !== 'all' ) {
			// Get current day of the week
			$today = date( 'w', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['days_week'] = preg_replace( "/[^0-9-,]/", '', $atts['days_week'] );
			// Parse days range
			$days = Wt_Tools::range( $atts['days_week'] );
			// Check current day
			if ( !in_array( $today, $days ) ) return $atts['alt'];
		}
		// Check day of the month
		if ( $atts['days_month'] !== 'all' ) {
			// Get current day of the month
			$today = date( 'j', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['days_month'] = preg_replace( "/[^0-9-,]/", '', $atts['days_month'] );
			// Parse days range
			$days = Wt_Tools::range( $atts['days_month'] );
			// Check current day
			if ( !in_array( $today, $days ) ) return $atts['alt'];
		}
		// Check month
		if ( $atts['months'] !== 'all' ) {
			// Get current month
			$now = date( 'n', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['months'] = preg_replace( "/[^0-9-,]/", '', $atts['months'] );
			// Parse months range
			$months = Wt_Tools::range( $atts['months'] );
			// Check current month
			if ( !in_array( $now, $months ) ) return $atts['alt'];
		}
		// Check year
		if ( $atts['years'] !== 'all' ) {
			// Get current year
			$now = date( 'Y', current_time( 'timestamp', 0 ) );
			// Sanitize input
			$atts['years'] = preg_replace( "/[^0-9-,]/", '', $atts['years'] );
			// Parse years range
			$years = Wt_Tools::range( $atts['years'] );
			// Check current year
			if ( !in_array( $now, $years ) ) return $atts['alt'];
		}
		// Return result (all check passed)
		return do_shortcode( $content );
	}
	
	//Featured lists shortcode
	public static function featured_lists( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'title' 		=> '',
				'desc'			=> '',
			), $atts, 'featured_lists' );

		$html = '';
		$html .='<div class="featured-lists">';
					if($atts['title'] != ''){
					$html .='<h3>'.force_balance_tags($atts['title']).'</h3>';
					}
					$html .='<ul class="feature-list">'.do_shortcode($content).'</ul>
				</div>';
		return $html;
	}
	
	//Featured list shortcode
	public static function featured_list( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'title' 		=> '',
				'desc'			=> '',
				'icon' 			=> '',
				'icon_color'	=> '',
			), $atts, 'featured_list' );

		if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '"></i>';
			wt_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		
		return '<li class="list">
					<h4><span class="icon-view">'.$atts['icon'].'</span>'.force_balance_tags($atts['title']).'</h4>
					<p>'.esc_attr($atts['desc']).'</p>
				</li>';
	}
	
	
	public static function testimonials( $atts = array(), $content= '' ){
		$atts = shortcode_atts( 
			array(
				'style'		=> 'default',
				'item_show'		=> 2,
			), $atts, 'testimonials' );
			
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		return '<div class="owl-carousel"  data-items="1" data-mobile="1" data-margin="30" data-loop="true" data-tablet="1" data-desktopsmall="1" data-desktop="'.$atts['item_show'].'" data-autoplay="true" data-delay="3000" data-navigation="true">'.do_shortcode($content).'</div><!--.owl-carousel-->';
	}

	public static function testimonial( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'		=> 'default',
				'name' 		=> 'John Mathew',
				'title' 	=> 'Parent',
				'image'		=> '',
				'background'	=> '#252525',
				'color'	=> '#ffffff',
			), $atts, 'testimonial' );
		
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		
		$html = '';
		$html .='<div class="item">
					<!-- Blockquote Wrapper -->
					<div class="quote-wrap dark" style="color:'.$atts['color'].';">
						<blockquote style="background:'.$atts['background'].';"><p>' . do_shortcode($content) . '</p></blockquote>
						<!-- Blockquote Author -->
						<div class="quote-author">';
						if($atts['image'] != ''){
							$image_url = wt_image_resize( esc_url($atts['image']), 80, 80 );
							$html .='<img src="'.$image_url['url'].'" alt="thumb"  class="img-responsive" />';
						}
						$html .='<div class="quote-footer">
								<h5 class="name"><a href="#">'.$atts['name'].'</a></h5>
								<span>/ '.$atts['title'].'</span>
							</div><!-- Blockquote Footer -->
						</div><!-- Blockquote Author -->
					</div><!-- Blockquote Wrapper -->
				</div><!-- Item Ends -->';
		
		return $html; 
	}
	
	public static function icons( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'icon' 			=> '',
				'et_icon'	  => '',
				'icon_color' 	=> '#333333',
				'font_size'		=> 40,
				'icon_align'	=> 'center',
				'class' 		=> '',
				), $atts, 'icons' );
		if($atts['et_icon'] != ''){
			$icon = '<i class="uni-'.esc_attr($atts['et_icon']).'" style="font-size:' . $atts['font_size'] . 'px;color:' . $atts['icon_color'] . ';"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '; font-size:' . $atts['font_size'] . 'px;"></i>';
			wt_query_asset( 'css', 'font-awesome' );
		}
		else $icon = '<img src="' . $atts['icon'] . '" alt="" />';
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		
		return '<span class="icons-font '.$atts['class'].'" style="text-align: '.$atts['icon_align'].'; margin: 0 20px 30px 0; display: inline-block;">' . $icon . '</span>';
	}
	
	public static function icons_info( $atts, $content='' ){
		// Attributes
		$atts = shortcode_atts( 
			array(
				'icon' 			=> '',
				'icon_color' 	=> '',
				'font_size'		=> 28,
				'title'			=> 'Australia Office',
				'icon_des'		=> '',
				'class' 		=> '',
				), $atts, 'icons_info' );
		if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$atts['icon'] = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . $atts['icon_color'] . '; font-size:' . $atts['font_size'] . 'px;"></i>';
			wt_query_asset( 'css', 'font-awesome' );
		}
		else $atts['icon'] = '<img src="' . $atts['icon'] . '" alt="" />';
		wt_query_asset( 'css', 'wt-content-shortcodes' );
		
		return '<li class="contact-informations">
					<span class="fun-icon">' . $atts['icon'] . '</span>' . $atts['title'] . '
					<p>' . $atts['icon_des'] . '</p>
				</li><!-- end service-box -->';
	}
	
	public static function counters( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'class' 		=> '',
				), $atts, 'counters' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		return '
		<div class="counter-wrap ' .$atts['class']. '">' .do_shortcode( $content ). '</div>';		
	}
	
	public static function counter_up( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'style'			=> 'default',
				'title'			=> '',
				'et_icon'	  => '',
				'icon'        => '',
				'size'        => 32,
				'color'			=> '#ffffff',
				'background_color' => '#111',
				'number' 		=> 1000,
				'class' 		=> '',
				), $atts, 'counter_up' );

		
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		
		// Built-in icon
		if($atts['et_icon'] != ''){
			$icon = '<i class="uni-'.esc_attr($atts['et_icon']).'" style="font-size:' . $atts['size'] . 'px;color:' . $atts['color'] . ';"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', esc_attr($atts['icon']) ) ) . '" style="font-size:' . esc_attr($atts['size']) . 'px;"></i>';
			wt_query_asset( 'css', 'font-awesome' );
		}
		// Uploaded icon
		else {
			$icon = '<img src="' . esc_url($atts['icon']) . '" width="' . esc_attr($atts['size']) . '" height="' . esc_attr($atts['size']) . '" alt="" />';
		}
		
		if($atts['style'] == 'style_2'){
			return '<div class="count-widget inline style_2 typo-light">
				<span class="count-number" data-count="' .esc_html($atts['number']). '"><span class="counter"></span></span>
				<span class="title">' .do_shortcode( $content ). '</span>
			</div>';
		} else{
		return '
		<div class="count-block dark bg-verydark" style="background:'.$atts['background_color'].'!important;">
			<h5 style="color:'.$atts['color'].'!important;">' .do_shortcode( $content ). '</h5>
			<h3 data-count="' .esc_html($atts['number']). '" class="count-number" style="color:'.$atts['color'].'!important;"><span class="counter">' .esc_html($atts['number']). '</span></h3>
			'.$icon.'
		</div>';
		}
	}
	
	public static function partners( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'style' => 'default',
				'item_show'		=> 3,
				'nav'    => 'no',
				'dots'    => 'yes',
				'nav_position' => 'top',
				'nav_style' => 'navigation-color',
				), $atts, 'partners' );
				
				$na_class = '';
				$nav_style = '';
				if($atts['nav'] == 'yes'){
					$nav = 'true';
					$nav_style = $atts['nav_style'];
					if($atts['nav_position'] == 'top'){
						$na_class = 'nav-topright';
					} else{
						$na_class = '';
					}
				} else{
					$nav = 'false';
				}
				if($atts['dots'] == 'yes'){
					$dots = 'true';
				} else{
					$dots = 'false';
				}
		return '<div class="owl-carousel dots-dark '.$na_class.' '.$nav_style.'" data-animatein="" data-animateout="" data-items="1" data-loop="true" data-merge="true" data-nav="'.$nav.'" data-dots="'.$dots.'" data-margin="" data-stagepadding="" data-mobile="1" data-tablet="1" data-desktopsmall="2"  data-desktop="'.$atts['item_show'].'" data-autoplay="false" data-delay="3000" 
data-navigation="true">' . do_shortcode( $content ) . '
					</div>';		
	}
	
	public static function partner( $atts, $content='' ) {
		$atts = shortcode_atts( 
			array(
				'image' 		=> '',
				'image_link' 	=> '#',
				'class'			=> '',
				), $atts, 'partner' );
				
		if( $atts['image'] != '' ){
			$image = '<a href="'.esc_url($atts['image_link']).'"><img src="'.esc_url($atts['image']).'" alt="Client-logo"></a>';
			}else{
			$image = '';
		}
		
		$return = '<div class="item">'.$image.'</div>';
		
		//wt_query_asset( 'css', 'animate' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'inview' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		
		return $return;
		
	}
	
	public static function bg_map( $atts = null, $content = null ){
		$atts = shortcode_atts( array(
				'latitude' 			=> '-35.2835',
				'longitude'			=> '149.128',
				'marker_image'		=> plugins_url( 'assets/images/marker.png', WT_PLUGIN_FILE ),
				'maker_title'		=> 'Autin',
				'maker_description'	=> '',
				'type'			    => 'roadmap',
				'height'			=> 600,
				'hue'			    => '',
			), $atts, 'bg_map' );
			wt_query_asset( 'js', 'bg-map' );
		$output = '';
		$random_value = rand(0,100000);
		$output .='<div class="post-media clearfix">
					<div class="googlemap">
						<div id="map_'.$random_value.'" data-id="map_'.$random_value.'" style="height: ' .esc_attr($atts['height']). 'px" class="g_map google-map map-canvas" data-latitude="' .esc_attr($atts['latitude']). '" data-longitude="' .esc_attr($atts['longitude']). '" data-marker="' .esc_attr($atts['marker_image']). '" data-title="' .esc_attr($atts['maker_title']). '" data-description="' .esc_attr($atts['maker_description']). '" data-hue="'.$atts['hue'].'" data-type="'.$atts['type'].'"></div>
					</div>
				</div>';
		return $output;
	}
	
	public static function banner_slider($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'source'        => '',
				'previous_image' => '',
				'next_image' => '',
				'width' => 1400,
				'height' => 700,
				'class'        	=> '',
			), $atts, 'banner_slider' );
			
			$output = '';
			$width = $atts['width'];
			$height = $atts['height'];		
			$slides = (array) Wt_Tools::get_slides( $atts );
			if ( count( $slides ) ) {
				$output .= '<div class="banner-slider" data-prev="'.$atts['previous_image'].'" data-next="'.$atts['next_image'].'">';			
			// Create slides
			foreach ( $slides as $slide ) {
				// Crop image
				$i = 1;
				//$image = $slide['image'];
				$arr = wt_image_resize( esc_url($slide['image']), $width, $height );
				$output .= '<div class="item"><img src="' .$arr['url']. '" alt="slider '.$i.'" /></div>';				
				$i++;
			}
			
			$output .= '</div>';
			

		} else $output = Wt_Tools::error( __FUNCTION__, __( 'images not found', 'ts' ) );
		
		return $output;
	}
	
	public static function contact_address($atts = null, $content = null){
		$atts = shortcode_atts( array(
			'style'       => 'default',
			'et_icon'	  => '',
			'icon'        => plugins_url( 'assets/images/service.png', WT_PLUGIN_FILE ),
			'icon_color'  => '#121212',
			'icon_bg'     => '',
			'content_box_bg' => '#ffffff',
			'content_color'  => '#262626',
			'size'        => 32,
			'align'			=> 'left',
			'shadow'		=> 'no',
			'inline'		=> 'no',
			'address' => '',
		), $atts, 'contact_address' );
		
		if($atts['et_icon'] != ''){
			$icon = '<i class="uni-'.esc_attr($atts['et_icon']).'" style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . '; background: '.$atts['icon_bg'].'"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . '; background: '.$atts['icon_bg'].'"></i>';
			wt_query_asset( 'css', 'font-awesome' );
		}
		// Uploaded icon
		else {
			$icon = '<img src="' . $atts['icon'] . '" width="' . $atts['size'] . '" height="' . $atts['size'] . '" alt="' . $atts['title'] . '" />';
		}
		
		if($atts['style'] == 'default'){
			$icon_class = 'info-icon';
			$icon_2_class = 'contact-info';
		} else{
			$icon_class = 'icon-wrap';
			$icon_2_class = '';
		}
		
		if($atts['shadow'] == 'yes'){
			$shadow_class = 'shadow';
		} else{
			$shadow_class = '';
		}
		
		if($atts['inline'] == 'yes'){
			$in_class = 'icon-inline';
		} else{
			$in_class = '';
		}
		
		$output = '
		<div class="content-box icon-box '.$icon_2_class.' '.$in_class.' '.$shadow_class.' text-'.$atts['align'].'" style="background:'.$atts['content_box_bg'].';">
			<div class="'.$icon_class.'">'.$icon.'</div>
			<div class="content-wrap"><h5 class="title" style="color: '.$atts['content_color'].'">'.$atts['address'].'</h5>
			<p style="color: '.$atts['content_color'].'">'.do_shortcode($content).'</p></div>
		</div>';			
		return $output;
	}
	
	public static function bg_content($atts = null, $content = null){
		$atts = shortcode_atts( array(
			'bg'        	=> '',
		), $atts, 'bg_content' );
		
		$output = '<div class="wt-bg-content" style="background: url('.esc_url($atts['bg']).');">
		<div class="wt-bg-content-main">'.do_shortcode($content).'</div>
		</div>';
			
		return $output;
	}	
	
	public static function text_color($atts = null, $content = null){
		$atts = shortcode_atts( array(
			'color'        	=> '#ef4416',
		), $atts, 'text_color' );
		
		$output = '<span class="wt-text-color" style="color: '.$atts['color'].';">'.do_shortcode($content).'</span>';
			
		return $output;
	}
	
	public static function title( $atts = null, $content = null ) {
		// Parse attributes
		$atts = shortcode_atts( array(				
				'title'				=> '',
				'align'			=> 'center',
				'color'			=>'#262626',
				'size'			=> 34,
				'separator'     => 'line',
				'margin_bottom' => '60'
			), $atts, 'title' );
		
		$align = $atts['align'];
		if($atts['separator'] == 'dot'){
			$html_content = '<span class="separator dot-separator">...</span>';			
		} else{
			$html_content = '<span class="separator '.$atts['separator'].'-separator" style="background-color: '.$atts['color'].';"><span class="separator-bottom" style="background-color: '.$atts['color'].';"></span></span>	';			
		}
		$output = '';
		$output .='
		<div class="title-container text-'.$align.'" style="margin-bottom: '.$atts['margin_bottom'].'px;">
			<div class="title-wrap" style="color: '.$atts['color'].';">
				<h3 class="title" style="color: '.$atts['color'].'; font-size: '.$atts['size'].'px">'.esc_html($atts['title']).'</h3>
				'.$html_content.'			
			</div>';
			if($content != ''){
			$output .='<p class="description" style="color: '.$atts['color'].';">'.do_shortcode($content).'</p>';
			}
		$output .='</div>';
		
		return $output;
	}
	
	public static function pricing_table( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/pricing-loop.php',
				'posts_per_page'      => '3',
				'order'               => 'DESC',
				'orderby'             => 'date',
				'column'			  => 3,
			), $atts, 'pricing_table' );

		$original_atts = $atts;

		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		
		$args = array(
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => 'pricing',
			'posts_per_page' => $posts_per_page,
		);
		
		// Save original posts
		global $posts;
		$original_posts = $posts;
		// Query posts
		$posts = new WP_Query( $args );
		$posts->data = $atts;
		// Buffer output
		ob_start();
		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		// Search for template in plugin directory
		elseif ( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ) ) load_template( path_join( dirname( WT_PLUGIN_FILE ), $atts['template'] ), false );
		// Template not found
		else echo Wt_Tools::error( __FUNCTION__, __( 'template not found', 'ts' ) );
		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		return $output;
	}
	
	public static function color_overlay( $atts ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'background' => '#000000',
				'opacity' => '0.5',
				'display_style'	=> 'normal',
			), $atts, 'color_overlay' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );

		$background_color = $atts['background'];
		$background = wt_hex2rgb($atts['background'], ',');
		return '<div class="wt-background-overlay overlay overlay_'.$atts['display_style'].'" style="background:rgba('.$background.', '.$atts['opacity'].');"></div>';
	}
	
	public static function products_carousel( $atts = null, $content = null ) {
		$return = '';
		global $wpdb, $post;
		$atts = shortcode_atts( array(
				'posts_per_page'    => 9,
				'taxonomy'            => 'product_cat',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'order'               => 'DESC',
				'orderby'             => 'date',
				'best_seller'		  => 'no',
				'featured'		      => 'no',
				'item_show'			  => 3,
				'navigation'		  => 'no',
			), $atts, 'products_carousel' );

		$original_atts = $atts;
		
		if($atts['navigation'] == 'yes'){
			$navigation = 'true';
		} else{
			$navigation = 'false';
		}

		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['orderby'] );
		$posts_per_page = intval( $atts['posts_per_page'] );
		$tax_operator = $atts['tax_operator'];
		$tax_term = sanitize_text_field( $atts['tax_term'] );
		$taxonomy = sanitize_key( $atts['taxonomy'] );
		// Set up initial query for post
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => 'product',
			'posts_per_page' => $posts_per_page,
		);

		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
			// Term string to array
			$tax_term = explode( ',', $tax_term );
			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) $tax_operator = 'IN';
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field' => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms' => $tax_term,
						'operator' => $tax_operator ) ) );
			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;
			while ( isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) &&
				isset( $original_atts['tax_' . $count . '_term'] ) &&
				!empty( $original_atts['tax_' . $count . '_term'] ) ) {
				// Sanitize values
				$more_tax_queries = true;
				$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts[
				'tax_' . $count . '_operator'] : 'IN';
				$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array( 'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms,
					'operator' => $tax_operator );
				$count++;
			}
			if ( $more_tax_queries ):
				$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) $tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
			endif;
			$args = array_merge( $args, $tax_args );
		}
		
		if($atts['best_seller'] == 'yes'){
			$best_seller = array( 'meta_key' => 'total_sales','orderby' => 'meta_value_num' );
			
			$args = array_merge( $args, $best_seller );
		}
		
		if($atts['featured'] == 'yes'){
			$featured = array( 'meta_key' => '_featured','meta_value' => 'yes'  );
			
			$args = array_merge( $args, $featured );
		}

		// Save original posts
		global $posts;
		$original_posts = $posts;
        $loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			// Prepare unique ID

			$return .= '<div class="owl-carousel dots-inline" 
									data-animatein="" 
									data-animateout="" 
									data-margin="30" 
									data-stagepadding="" 
									data-loop="true" 
									data-merge="true" 
									data-nav="'.$navigation.'"
									data-dots="true" 
									data-items="'.$atts['item_show'].'"  
									data-mobile="1" 
									data-tablet="1" 
									data-desktopsmall="2"  
									data-desktop="'.$atts['item_show'].'" 
									data-autoplay="true" 
									data-delay="3000" 
									data-navigation="'.$navigation.'">';
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
            $return .= '<div class="item">
							<!-- Related Wrapper -->
							<div class="related-wrap">
								<!-- Related Image Wrapper -->';								
								if ( has_post_thumbnail( $post->ID ) ){
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					   				$arr = wt_image_resize( $image[0], 500, 500, true );
									$return .= '<div class="img-wrap">
									<img src="'.esc_url($arr['url']).'" alt="" class="img-responsive">
									</div>';
								}
								$category = get_the_term_list( $post->ID, 'product_cat', '<span>', ', ', '</span>' );
								$return .= '<!-- Related Content Wrapper -->
								<div class="related-content">
									<a href="'.esc_url(get_permalink()).'" title="' .__('Read More', 'universh').'">+</a>'.wp_kses($category, array('span'=> array())).'
									<h5 class="title">'.get_the_title().'</h5>
								</div><!-- Related Content Wrapper -->
							</div><!-- Related Wrapper -->
						</div><!-- Item -->';
					endwhile;                   
           $return .= '</div>';
		   wp_reset_postdata();
		}
		
		// Slides not found
		else $return = Wt_Tools::error( __FUNCTION__, esc_html__( 'Products not found', 'universh' ) );
		wp_reset_postdata();
		return $return;
	}
	
	public static function social_icons($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'style'     => 'square',
				'color'		=> 'color',
				'align'		=> 'text-left',
			), $atts, 'social_icons' );
		return '<ul class="social-icons '.$atts['align'].' '.$atts['color'].' '.$atts['style'].'">'.do_shortcode($content).'</ul>';
	}
	
	public static function socials_icon($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'name'     => '',
				'link'      => '',
			), $atts, 'socials_icon' );
			
			$output = '';
			
			if($atts['link'] != '' && $atts['name']){
			$output .='<li class="' .$atts['name']. '"><a href="' .esc_url($atts['link']). '" target="_blank" title="' .$atts['name']. '">' .$atts['name']. '</a></li>';
			}
		return $output;
	}
	
	public static function callout($atts = null, $content = null){
		$atts = shortcode_atts( array(
				'title'     		=> '',
				'button_link'      	=> '#',
				'button_text'     	=> '',
			), $atts, 'callout' );
			
			$output = '';			
			$output .='<div class="callto-action text-center">
				<h5 class="title"><span class="call-title-text"><span class="call-title-text">'.$atts['title'].'</span></span><a href="' .esc_url($atts['button_link']). '" class="btn">'.$atts['button_text'].'</a></h5>
			</div>';
		return $output;
	}
	
	public static function alert_box( $atts ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'type' => 'success',
				'text' => 'Success confirmation message here',
				'dismiss' => 'no',
				'link_text' => '',
				'link_url' => '',
			), $atts, 'alert_box' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		wt_query_asset( 'css', 'font-awesome' );
		wt_query_asset( 'js', 'jquery' );
		wt_query_asset( 'js', 'wt-other-shortcodes' );
		
		if($atts['dismiss'] == 'yes'){
			$class = 'alert-dismissible';
			$content = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		} else{
			$class = '';
			$content = '';
		}

		return '<div class="alert alert-'.$atts['type'].' '.$class.'" role="alert">
		'.$content.' '.$atts['text'].'
		<a class="alert-link" href="'.$atts['link_url'].'">'.$atts['link_text'].'</a></div>';
	}
	
	public static function title_span_box( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'				=>'style_1',
				'title' 			=> '',
				'title_color'		=> '#ffffff',
				'title_size'		=> '40',
				'span_content' 		=> '',
				'span_color'		=> '',
				'span_size'			=> '',
				'description'		=> '',
				'des_color'			=> '#fff',
				'box_align'			=> 'box-right'
			), $atts, 'title_span_box' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );

		if($atts['style'] == 'style_2'){
			return '<div class="title-span-box '.$atts['box_align'].' '.$atts['style'].'">
			<p style="color: '.$atts['des_color'].';">'.$atts['description'].'</p>
			<h2 class="title-span" style="font-size: '.$atts['title_size'].'px; color: '.$atts['title_color'].';">			
			'.$atts['title'].'
			<span class="title-content-span" style="font-size: '.$atts['span_size'].'px; color: '.$atts['span_color'].';">'.$atts['span_content'].'</span>
			</h2>
			'.do_shortcode($content).'</div>';
		} else{		
			return '<div class="title-span-box '.$atts['box_align'].'">
			<h2 class="title-span" style="font-size: '.$atts['title_size'].'px; color: '.$atts['title_color'].';">'.$atts['title'].'
			<span class="title-content-span" style="font-size: '.$atts['span_size'].'px; color: '.$atts['span_color'].';">'.$atts['span_content'].'</span></h2>
			<p style="color: '.$atts['des_color'].';">'.$atts['description'].'</p>'.do_shortcode($content).'</div>';
		}
	}
	
	public static function countdown( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
			 	'style'			=>'comingsooon',
				'year' 			=> '2016',
				'month' 			=> '12',
				'date' 			=> '02',
			), $atts, 'countdown' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		
		if($atts['style'] == 'hero'){
			return '<div class="hero hero-scene-event"><div id="daycounter-'.$atts['style'].'" class="daycounter clearfix" data-counter="down" data-year="'.$atts['year'].'" data-month="'.$atts['month'].'" data-date="'.$atts['date'].'"></div></div>';
		} else{
		return '<div id="daycounter-'.$atts['style'].'" class="daycounter clearfix" data-counter="down" data-year="'.$atts['year'].'" data-month="'.$atts['month'].'" data-date="'.$atts['date'].'"></div>';
		}
	}
	
	public static function offer( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'title' 			=> '',
				'desc'				=> '',
				'button_text'		=>'Start Here',
				'form_action'		=>'#',
			), $atts, 'offer' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );

		return '
		<div class="customwidget text-left w40 wt-offer-list">
			<h3 class="widget-title">'.$atts['title'].'</h3>
			<h4>'.$atts['desc'].'</h4>
			<form action="'.$atts['form_action'].'">
				'.do_shortcode($content).'
				<input type="submit" value="'.$atts['button_text'].'" class="btn btn-primary btn-block" />
			</form>     
		</div><!-- end newsletter -->';
	}
	
	public static function offer_list( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'title' 			=> '',
			), $atts, 'offer_list' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );

		return '<div class="checkbox checkbox-warning">
					<input id="checkbox1" type="checkbox" class="styled" checked>
					<label for="checkbox1">'.$atts['title'].'</label>
				</div>';
	}
	
	public static function icon_box( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'et_icon'	  => '',
				'icon'        => '',
				'icon_color'  => '#121212',
				'icon_bg_color' => '',
				'box_bg_color' => '',
				'size'        => 32,
			), $atts, 'icon_box' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		
		if($atts['et_icon'] != ''){
			$icon = '<i class="uni-'.esc_attr($atts['et_icon']).'" style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . ';"></i>';
		}elseif ( strpos( $atts['icon'], 'icon:' ) !== false ) {
			$icon = '<i class="fa fa-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="font-size:' . $atts['size'] . 'px;color:' . $atts['icon_color'] . '"></i>';
			wt_query_asset( 'css', 'font-awesome' );
		}
		// Uploaded icon
		else {
			$icon = '<img src="' . $atts['icon'] . '" width="' . $atts['size'] . '" height="' . $atts['size'] . '" alt="' . $atts['title'] . '" />';
		}

		return '<div class="contact-info" style="background-color: '.$atts['box_bg_color'].';">
			<div class="info-icon bg-dark" style="background-color: '.$atts['icon_bg_color'].';">'.$icon.'</div>
			'.do_shortcode($content).'
		</div>';
	}
	
	public static function owl_sliders( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'navigation' 			=> 'yes',
			), $atts, 'owl_sliders' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		
		if($atts['navigation'] == 'yes'){
			$nav = 'true';
		} else{
			$nav = 'false';
		}

		return '<div class="pad-none hero"><div class="owl-carousel full-screen dots-inline" 
			data-animatein="" 
			data-animateout="" 
			data-items="1" data-margin="" 
			data-loop="true"
			data-merge="true" 
			data-nav="true" 
			data-dots="false" 
			data-stagepadding="" 
			data-mobile="1" 
			data-tablet="1" 
			data-desktopsmall="1" 
			data-desktop="1" 
			data-autoplay="false" 
			data-delay="3000" 
			data-navigation="'.$nav.'">'.do_shortcode($content).'</div></div>';
	}
	
	public static function owl_slider( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'image'				=> '',
				'title' 			=> '',
				'description' 		=> '',
				'button_text'		=> '',
				'button_link'		=> '',
				'text_type'			=> 'dark',
				'left_margin'		=> '',
			), $atts, 'owl_slider' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		
		$color = '';
		if($atts['text_type'] == 'light'){
			$color = 'typo-light';
		}
		
		$margin = '';
		if($atts['left_margin'] != ''){
			$margin = ' col-md-offset-'.$atts['left_margin'];
		}

		return '<div class="item '.$color.'">
				<img src="'.$atts['image'].'" alt="" class="img-responsive" height="1000" width="2000">
				<div class="container slider-content vmiddle text-left">
					<div class="row">
						<div class="col-md-6'.$margin.'">
							<h3 class="text-uppercase animated" data-animate="fadeInUp" data-animation-delay="1200">'.$atts['title'].'</h3>
							<p class="animated" data-animate="fadeInUp" data-animation-delay="1700">'.$atts['description'].'</p>
							<p class="animated" data-animate="fadeInUp" data-animation-delay="2300"><a href="'.$atts['button_link'].'" class="btn hero-btn">'.$atts['button_text'].'</a></p>
						</div>	
					</div>	
				</div>
			</div>';
	}
	
	public static function lists( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'style' 			=> 'default',
			), $atts, 'lists' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );

		return '<ul class="list-icon">'.do_shortcode($content).'</ul>';
	}
	public static function single_list( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'text' 			=> '',
			), $atts, 'single_list' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );

		return '<li>'.$atts['text'].'</li>';
	}
	
	public static function panel( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'style'			=> 'default',
				'header_text'   => '',
				'footer_text'   => '',
			), $atts, 'panel' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );
		
		$html = '';
		$html .= '<div class="panel panel-'.$atts['style'].'">';
		if($atts['header_text'] != ''){
			$html .= '<div class="panel-heading">
				<h3 class="panel-title">'.$atts['header_text'].'</h3>
			</div>';
		}
		$html .= '<div class="panel-body">
			<p>'.do_shortcode($content).'</p>
		</div>';
		if($atts['footer_text'] != ''){
			$html .= '<div class="panel-footer">'.$atts['footer_text'].'</div>';
		}
		$html .= '</div>';
		return $html;
	}
	
	public static function pie_chart( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'title'   => 'Maths',
				'percent'   => '70',
				'barcolor'  => '#2196f3',
				'trackcolor'  => '',
				'text_color'  => '',
				'linewidth'  => '2',
				'size'  => '200',
			), $atts, 'pie_chart' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );		
		$html = '';
		$html .= '<div class="piechart" data-percent="'.$atts['percent'].'" data-barcolor="'.$atts['barcolor'].'" data-trackcolor="'.$atts['trackcolor'].'" data-linewidth="'.$atts['linewidth'].'" data-size="'.$atts['size'].'">
					<div class="pie-chart-content" style="color: '.$atts['text_color'].';">
						<span style="color: '.$atts['text_color'].';"></span>
						<h6 class="pie-title" style="color: '.$atts['text_color'].';">'.$atts['title'].'</h6>
					</div>
				</div><!-- Pie Chart -->';
		return $html;
	}
	public static function progress_bar( $atts = null, $content = null ){

		// Attributes
		$atts = shortcode_atts( 
			array(
				'title'   => 'Maths',
				'title_color' =>'#262626',
				'title_font_size' =>'24',
				'percent'   => '70',
				'height'  => '20',
				'activecolor'  => '#2196f3',
				'text_color'  => '#ffffff',
				'bar_color'  => '#f5f5f5',
			), $atts, 'progress_bar' );
		wt_query_asset( 'css', 'wt-other-shortcodes' );		
		$html = '';
		$html .= '<h5 class="progress-tille" style="color: '.$atts['title_color'].';font-size: '.$atts['title_font_size'].'px;">'.$atts['title'].'</h5>
					<div class="progress" data-height="'.$atts['height'].'" style="background: '.$atts['bar_color'].'!important;">
						<div data-bg="'.$atts['activecolor'].'" data-percentage="'.$atts['percent'].'" aria-valuemax="100" aria-valuemin="0" aria-valuenow="'.$atts['percent'].'" role="progressbar" class="progress-bar">
							<span class="progress-label" style="color:'.$atts['text_color'].';">'.$atts['percent'].'%</span>
						</div>
					</div><!-- Progress Bar -->';
		return $html;
	}
}

new Wt_Shortcodes;

class Universh_Shortcodes_Shortcodes extends Wt_Shortcodes {
	function __construct() {
		parent::__construct();
	}
}
