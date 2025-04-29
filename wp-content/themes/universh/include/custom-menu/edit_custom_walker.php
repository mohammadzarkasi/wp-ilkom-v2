<?php

/**

 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core

 * 

 * Create HTML list of nav menu input items.

 */

class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {

	function start_lvl(&$output, $depth = 0, $args = array()) {	

	}

	function end_lvl(&$output, $depth = 0, $args = array()) {

	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {

		global $_wp_nav_menu_max_depth;

		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		ob_start();
		
		$item_id = esc_attr( $item->ID );

		$removed_args = array(

			'action',

			'customlink-tab',

			'edit-menu-item',

			'menu-item',

			'page-tab',

			'_wpnonce',

		);		

		$original_title = '';

		if ( 'taxonomy' == $item->type ) {

			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );

			if ( is_wp_error( $original_title ) )

				$original_title = false;

		} elseif ( 'post_type' == $item->type ) {

			$original_object = get_post( $item->object_id );

			$original_title = $original_object->post_title;

		}

		$classes = array(

			'menu-item menu-item-depth-' . $depth,

			'menu-item-' . esc_attr( $item->object ),

			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),

		);

		$title = $item->title;		

		if ( ! empty( $item->_invalid ) ) {

			$classes[] = 'menu-item-invalid';

			/* translators: %s: title of menu item which is invalid */

			$title = sprintf( esc_html__( '%s (Invalid)', 'universh' ), $item->title );

		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {

			$classes[] = 'pending';

			/* translators: %s: title of menu item in draft status */

			$title = sprintf( esc_html__('%s (Pending)', 'universh'), $item->title );

		}		

		$title = empty( $item->label ) ? $title : $item->label;

		?>		

		<li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">

		<dl class="menu-item-bar">

			<dt class="menu-item-handle">

				<span class="item-title"><?php echo esc_html( $title ); ?></span>

				<span class="item-controls">

					<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>

					<span class="item-order hide-if-js">

					<a href="<?php

					echo wp_nonce_url(

						add_query_arg(

							array(

								'action' => 'move-up-menu-item',

								'menu-item' => $item_id,

							),

							remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )

						),

						'move-menu_item'

					);

					?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'universh'); ?>">&#8593;</abbr></a>

					|

					<a href="<?php

					echo wp_nonce_url(

						add_query_arg(

							array(

								'action' => 'move-down-menu-item',

								'menu-item' => $item_id,

							),

							remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )

						),

						'move-menu_item'

					);

					?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'universh'); ?>">&#8595;</abbr></a> 

					</span>

					<a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e('Edit Menu Item', 'universh'); ?>" href="<?php

					echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );

					?>"><?php esc_html_e( 'Edit Menu Item', 'universh' ); ?></a>

				</span>

			</dt>

		</dl>		

		<div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">

			<?php if( 'custom' == $item->type ) : ?>

			<p class="field-url description description-wide">

				<label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'URL', 'universh' ); ?><br />

					<input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />

				</label>

			</p>

			<?php endif; ?>			

			<p class="description description-thin">

				<label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'Navigation Label', 'universh' ); ?><br />

					<input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />

				</label>

			</p>			

			<p class="description description-thin">

				<label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'Title Attribute', 'universh' ); ?><br />

					<input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />

				</label>

			</p>			

			<p class="field-link-target description">

				<label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">

					<input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />

					<?php esc_html_e( 'Open link in a new window/tab', 'universh' ); ?>

				</label>

			</p>			

			<p class="field-css-classes description description-thin">

				<label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'CSS Classes (optional)', 'universh' ); ?><br />

					<input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />

				</label>

			</p>			

			<p class="field-xfn description description-thin">

				<label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'Link Relationship (XFN)', 'universh' ); ?><br />

					<input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />

				</label>

			</p>			

			<p class="field-description description description-wide">

				<label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'Description', 'universh' ); ?><br />

					<textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>

					<span class="description"><?php esc_html_e('The description will be displayed in the menu if the current theme supports it.', 'universh'); ?></span>

				</label>

			</p>			

			<?php /* New fields insertion starts here */ ?>      

			<?php if($depth == 0) { ?>

			<p class="field-custom description description-wide">

				<label for="edit-menu-item-submenu_type-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'Submenu Type', 'universh' ) ?><br />

					<select name="menu-item-submenu_type[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-submenu_type-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-custom">

						<option value="standard" <?php if($item->submenu_type == "standard") echo 'selected="selected"'; ?>>

							<?php esc_html_e( 'Standard Dropdown', 'universh' ) ?>

						</option>

						<option value="megamenu" <?php if($item->submenu_type == "megamenu") echo 'selected="selected"'; ?>>

							<?php esc_html_e( 'Megamenu', 'universh' ) ?>

						</option>
                        
                        <option value="megamenu_fullwidth" <?php if($item->submenu_type == "megamenu_fullwidth") echo 'selected="selected"'; ?>>

							<?php esc_html_e( 'Megamenu Fullwidth', 'universh' ) ?>

						</option>

					</select>

				</label>

			</p>			

			<p class="field-custom description description-wide">

				<label for="edit-menu-item-columns-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'Submenu Columns (Only for Megamenus)', 'universh' ) ?>

					<select name="menu-item-columns[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-columns-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-custom">

						<option value="1" <?php if($item->columns == "1") echo 'selected="selected"'; ?>>1</option>

						<option value="2" <?php if($item->columns == "2") echo 'selected="selected"'; ?>>2</option>

						<option value="3" <?php if($item->columns == "3") echo 'selected="selected"'; ?>>3</option>

						<option value="4" <?php if($item->columns == "4") echo 'selected="selected"'; ?>>4</option>

					</select>

				</label>

			</p>			

			<p class="field-custom description description-wide">

				<label for="edit-menu-item-style-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'Custom CSS Style', 'universh' ); ?><br />

					<textarea id="edit-menu-item-style-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-style" rows="3" cols="20" name="menu-item-style[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->style ); // textarea_escaped ?></textarea>

				</label>

			</p>			

			<?php } ?>     

			<?php if($depth >= 1) { ?>

			<p class="field-custom description description-wide">

				<label for="edit-menu-item-caption-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'Caption', 'universh' ) ?><br />

					<textarea id="edit-menu-item-caption-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-caption" rows="3" cols="20" name="menu-item-caption[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->caption ); // textarea_escaped ?></textarea>

				</label>

			</p>
            
            <p class="field-custom description description-wide">

				<label for="edit-menu-item-captioncolor-<?php echo esc_attr($item_id); ?>">

					<?php esc_html_e( 'Caption Background Style', 'universh' ) ?>

					<select name="menu-item-captionstyle[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-captionstyle-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-custom">

						<option value="blue" <?php if($item->captionstyle == "blue") echo 'selected="selected"'; ?>><?php echo esc_html__('Blue', 'universh'); ?></option>

						<option value="red" <?php if($item->captionstyle == "red") echo 'selected="selected"'; ?>><?php echo esc_html__('Red', 'universh'); ?></option>

						<option value="green" <?php if($item->captionstyle == "green") echo 'selected="selected"'; ?>><?php echo esc_html__('Green', 'universh'); ?></option>

						<option value="yellow" <?php if($item->captionstyle == "yellow") echo 'selected="selected"'; ?>><?php echo esc_html__('Yellow', 'universh'); ?></option>
                        
                        <option value="pink" <?php if($item->captionstyle == "pink") echo 'selected="selected"'; ?>><?php echo esc_html__('Pink', 'universh'); ?></option>

					</select>

				</label>

			</p>	

			<?php } ?>
            
            <?php /* New fields insertion ends here */ ?>			

			<div class="menu-item-actions description-wide submitbox">

				<?php if( 'custom' != $item->type && $original_title !== false ) : ?>

				<p class="link-to-original">

					<?php printf( esc_html__('Original: %s', 'universh'), '<a href="' . esc_url( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>

				</p>

				<?php endif; ?>				

				<a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php

				echo wp_nonce_url(

				add_query_arg(

				array(

				'action' => 'delete-menu-item',

				'menu-item' => $item_id,

				),

				remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )

				),

				'delete-menu_item_' . $item_id

				); ?>"><?php esc_html_e('Remove', 'universh'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );

				?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Cancel', 'universh'); ?></a>

			</div>			

			<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />

			<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />

			<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />

			<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />

			<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />

			<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />

		</div><!-- .menu-item-settings-->		

		<ul class="menu-item-transport"></ul>

		<?php

		$output .= ob_get_clean();

	}

}