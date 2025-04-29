<?php
/**
 * Shortcode Generator
 */
class Wt_Generator_Views {

	/**
	 * Constructor
	 */
	function __construct() {}

	public static function text( $id, $field ) {
		$field = wp_parse_args( $field, array(
			'default' => ''
		) );
		$return = '<input type="text" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="wt-generator-attr-' . $id . '" class="wt-generator-attr" />';
		return $return;
	}

	public static function textarea( $id, $field ) {
		$field = wp_parse_args( $field, array(
			'rows'    => 3,
			'default' => ''
		) );
		$return = '<textarea name="' . $id . '" id="wt-generator-attr-' . $id . '" rows="' . $field['rows'] . '" class="wt-generator-attr">' . esc_textarea( $field['default'] ) . '</textarea>';
		return $return;
	}

	public static function select( $id, $field ) {
		// Multiple selects
		$multiple = ( isset( $field['multiple'] ) ) ? ' multiple' : '';
		$return = '<select name="' . $id . '" id="wt-generator-attr-' . $id . '" class="wt-generator-attr"' . $multiple . '>';
		// Create options
		foreach ( $field['values'] as $option_value => $option_title ) {
			// Is this option selected
			$selected = ( $field['default'] === $option_value ) ? ' selected="selected"' : '';
			// Create option
			$return .= '<option value="' . $option_value . '"' . $selected . '>' . $option_title . '</option>';
		}
		$return .= '</select>';
		return $return;
	}

	public static function bool( $id, $field ) {
		$return = '<span class="wt-generator-switch wt-generator-switch-' . $field['default'] . '"><span class="wt-generator-yes">' . __( 'Yes', 'universh' ) . '</span><span class="wt-generator-no">' . __( 'No', 'universh' ) . '</span></span><input type="hidden" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="wt-generator-attr-' . $id . '" class="wt-generator-attr wt-generator-switch-value" />';
		return $return;
	}

	public static function upload( $id, $field ) {
		$return = '<input type="text" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="wt-generator-attr-' . $id . '" class="wt-generator-attr wt-generator-upload-value" /><div class="wt-generator-field-actions"><a href="javascript:;" class="button wt-generator-upload-button"><img src="' . admin_url( '/images/media-button.png' ) . '" alt="' . __( 'Media manager', 'universh' ) . '" />' . __( 'Media manager', 'universh' ) . '</a></div>';
		return $return;
	}

	public static function icon( $id, $field ) {
		$return = '<input type="text" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="wt-generator-attr-' . $id . '" class="wt-generator-attr wt-generator-icon-picker-value" /><div class="wt-generator-field-actions"><a href="javascript:;" class="button wt-generator-upload-button wt-generator-field-action"><img src="' . admin_url( '/images/media-button.png' ) . '" alt="' . __( 'Media manager', 'universh' ) . '" />' . __( 'Media manager', 'universh' ) . '</a> <a href="javascript:;" class="button wt-generator-icon-picker-button wt-generator-field-action"><img src="' . admin_url( '/images/media-button-other.gif' ) . '" alt="' . __( 'Icon picker', 'universh' ) . '" />' . __( 'Icon picker', 'universh' ) . '</a></div>
		<div class="wt-generator-icon-picker wt-generator-clearfix"><input type="text" class="widefat" placeholder="' . __( 'Filter icons', 'universh' ) . '" /></div>';
		return $return;
	}

	public static function color( $id, $field ) {
		$return = '<span class="wt-generator-select-color"><span class="wt-generator-select-color-wheel"></span><input type="text" name="' . $id . '" value="' . $field['default'] . '" id="wt-generator-attr-' . $id . '" class="wt-generator-attr wt-generator-select-color-value" /></span>';
		return $return;
	}

	public static function gallery( $id, $field ) {
		$shult = Universh_shortcodes();
		// Prepare galleries list
		$galleries = $shult->get_option( 'galleries' );
		$created = ( is_array( $galleries ) && count( $galleries ) ) ? true : false;
		$return = '<select name="' . $id . '" id="wt-generator-attr-' . $id . '" class="wt-generator-attr" data-loading="' . __( 'Please wait', 'universh' ) . '">';
		// Check that galleries is set
		if ( $created ) // Create options
			foreach ( $galleries as $g_id => $gallery ) {
				// Is this option selected
				$selected = ( $g_id == 0 ) ? ' selected="selected"' : '';
				// Prepare title
				$gallery['name'] = ( $gallery['name'] == '' ) ? __( 'Untitled gallery', 'universh' ) : stripslashes( $gallery['name'] );
				// Create option
				$return .= '<option value="' . ( $g_id + 1 ) . '"' . $selected . '>' . $gallery['name'] . '</option>';
			}
		// Galleries not created
		else
			$return .= '<option value="0" selected>' . __( 'Galleries not found', 'universh' ) . '</option>';
		$return .= '</select><small class="description"><a href="' . $shult->admin_url . '#tab-3" target="_blank">' . __( 'Manage galleries', 'universh' ) . '</a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="wt-generator-reload-galleries">' . __( 'Reload galleries', 'universh' ) . '</a></small>';
		return $return;
	}

	public static function number( $id, $field ) {
		$return = '<input type="number" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="wt-generator-attr-' . $id . '" min="' . $field['min'] . '" max="' . $field['max'] . '" step="' . $field['step'] . '" class="wt-generator-attr" />';
		return $return;
	}

	public static function slider( $id, $field ) {
		$return = '<div class="wt-generator-range-picker wt-generator-clearfix"><input type="number" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="wt-generator-attr-' . $id . '" min="' . $field['min'] . '" max="' . $field['max'] . '" step="' . $field['step'] . '" class="wt-generator-attr" /></div>';
		return $return;
	}

	public static function shadow( $id, $field ) {
		$defaults = ( $field['default'] === 'none' ) ? array ( '0', '0', '0', '#000000' ) : explode( ' ', str_replace( 'px', '', $field['default'] ) );
		$return = '<div class="wt-generator-shadow-picker"><span class="wt-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[0] . '" class="wt-generator-sp-hoff" /><small>' . __( 'Horizontal offset', 'universh' ) . ' (px)</small></span><span class="wt-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[1] . '" class="wt-generator-sp-voff" /><small>' . __( 'Vertical offset', 'universh' ) . ' (px)</small></span><span class="wt-generator-shadow-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[2] . '" class="wt-generator-sp-blur" /><small>' . __( 'Blur', 'universh' ) . ' (px)</small></span><span class="wt-generator-shadow-picker-field wt-generator-shadow-picker-color"><span class="wt-generator-shadow-picker-color-wheel"></span><input type="text" value="' . $defaults[3] . '" class="wt-generator-shadow-picker-color-value" /><small>' . __( 'Color', 'universh' ) . '</small></span><input type="hidden" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="wt-generator-attr-' . $id . '" class="wt-generator-attr" /></div>';
		return $return;
	}

	public static function border( $id, $field ) {
		$defaults = ( $field['default'] === 'none' ) ? array ( '0', 'solid', '#000000' ) : explode( ' ', str_replace( 'px', '', $field['default'] ) );
		$borders = Wt_Tools::select( array(
				'options' => Wt_Data::borders(),
				'class' => 'wt-generator-bp-style',
				'selected' => $defaults[1]
			) );
		$return = '<div class="wt-generator-border-picker"><span class="wt-generator-border-picker-field"><input type="number" min="-1000" max="1000" step="1" value="' . $defaults[0] . '" class="wt-generator-bp-width" /><small>' . __( 'Border width', 'universh' ) . ' (px)</small></span><span class="wt-generator-border-picker-field">' . $borders . '<small>' . __( 'Border style', 'universh' ) . '</small></span><span class="wt-generator-border-picker-field wt-generator-border-picker-color"><span class="wt-generator-border-picker-color-wheel"></span><input type="text" value="' . $defaults[2] . '" class="wt-generator-border-picker-color-value" /><small>' . __( 'Border color', 'universh' ) . '</small></span><input type="hidden" name="' . $id . '" value="' . esc_attr( $field['default'] ) . '" id="wt-generator-attr-' . $id . '" class="wt-generator-attr" /></div>';
		return $return;
	}

	public static function image_source( $id, $field ) {
		$field = wp_parse_args( $field, array(
				'default' => 'none'
			) );
		$sources = Wt_Tools::select( array(
				'options'  => array(
					'media'         => __( 'Media library', 'universh' ),
					'posts: recent' => __( 'Recent posts', 'universh' ),
					'category'      => __( 'Category', 'universh' ),
					'taxonomy'      => __( 'Taxonomy', 'universh' )
				),
				'selected' => '0',
				'none'     => __( 'Select images source', 'universh' ) . '&hellip;',
				'class'    => 'wt-generator-isp-sources'
			) );
		$categories = Wt_Tools::select( array(
				'options'  => Wt_Tools::get_terms( 'category' ),
				'multiple' => true,
				'size'     => 10,
				'class'    => 'wt-generator-isp-categories'
			) );
		$taxonomies = Wt_Tools::select( array(
				'options'  => Wt_Tools::get_taxonomies(),
				'none'     => __( 'Select taxonomy', 'universh' ) . '&hellip;',
				'selected' => '0',
				'class'    => 'wt-generator-isp-taxonomies'
			) );
		$terms = Wt_Tools::select( array(
				'class'    => 'wt-generator-isp-terms',
				'multiple' => true,
				'size'     => 10,
				'disabled' => true,
				'style'    => 'display:none'
			) );
		$return = '<div class="wt-generator-isp">' . $sources . '<div class="wt-generator-isp-source wt-generator-isp-source-media"><div class="wt-generator-clearfix"><a href="javascript:;" class="button button-primary wt-generator-isp-add-media"><i class="fa fa-plus"></i>&nbsp;&nbsp;' . __( 'Add images', 'universh' ) . '</a></div><div class="wt-generator-isp-images wt-generator-clearfix"><em class="description">' . __( 'Click the button above and select images.<br>You can select multimple images with Ctrl (Cmd) key', 'universh' ) . '</em></div></div><div class="wt-generator-isp-source wt-generator-isp-source-category"><em class="description">' . __( 'Select categories to retrieve posts from.<br>You can select multiple categories with Ctrl (Cmd) key', 'universh' ) . '</em>' . $categories . '</div><div class="wt-generator-isp-source wt-generator-isp-source-taxonomy"><em class="description">' . __( 'Select taxonomy and it\'s terms.<br>You can select multiple terms with Ctrl (Cmd) key', 'universh' ) . '</em>' . $taxonomies . $terms . '</div><input type="hidden" name="' . $id . '" value="' . $field['default'] . '" id="wt-generator-attr-' . $id . '" class="wt-generator-attr" /></div>';
		return $return;
	}

}
