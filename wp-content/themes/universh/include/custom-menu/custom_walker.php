<?php

/* Custom Walker */

class universh_scm_walker extends Walker_Nav_Menu  {

	private $univershCurItem;	

	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$megamenu_styles = "";

		if($depth == 0 && in_array( "menu-item-has-children", $this->univershCurItem->classes )) {

			if( $this->univershCurItem->submenu_type == "megamenu" ) {

				if($this->univershCurItem->style != "") {

					$megamenu_styles = 'style="' . $this->univershCurItem->style . '"';

				}

			}

		}

        $output .= '<ul class="dropdown-menu" ' . $megamenu_styles . '>';

    }
	

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$this->univershCurItem = $item;

		//extract($args);

		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';		

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;		

		$megamenu_styles = "";

		if($depth == 0 && in_array( "menu-item-has-children", $item->classes )) {

			if( $item->submenu_type == "megamenu" ) {

				switch($item->columns) {

					case "2": array_push($classes, "dropdown", "mega-menu-item", "mega-menu-fullwidth", "mega-menu-halfwidth", "column-2"); break;

					case "3": array_push($classes, "dropdown", "mega-menu-item", "mega-menu-fullwidth", "mega-menu-halfwidth", "column-3"); break;

					case "4": array_push($classes, "dropdown", "mega-menu-item", "mega-menu-fullwidth", "mega-menu-halfwidth", "column-4"); break;

					default: array_push($classes, "dropdown", "mega-menu-item", "mega-menu-fullwidth");

				}				

				if($item->style != "") {

					$megamenu_styles = 'style="' . $item->style . '"';

				}

			} elseif($item->submenu_type == "megamenu_fullwidth"){
				
				switch($item->columns) {

					case "2": array_push($classes, "dropdown", "mega-menu-item", "mega-menu-fullwidth", "universh-mm-half"); break;

					case "3": array_push($classes, "dropdown", "mega-menu-item", "mega-menu-fullwidth", "universh-mm-third"); break;

					case "4": array_push($classes, "dropdown", "mega-menu-item", "mega-menu-fullwidth", "universh-mm-fourth"); break;

					default: array_push($classes, "dropdown", "mega-menu-item", "mega-menu-fullwidth");

				}				

				if($item->style != "") {

					$megamenu_styles = 'style="' . $item->style . '"';

				}
			} else {

				array_push($classes, "dropdown");

			}

		}
	

		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

		$class_names = ' class="' . esc_attr( $class_names ) . '"';		

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';		

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';

		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';		

		$item_output = $args->before;

		$item_output .= '<a'. $attributes .'>';

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		
		if($depth == 0 && in_array( "menu-item-has-children", $item->classes )) {
			$item_output .= '<i class="fa fa-caret-down"></i>';
		}
		
		if($depth >= 1 && $item->caption != "") {
			$item_output .= '<span class="tip '.$item->captionstyle.'">'.$item->caption.'</span>';
		}
		
		if($depth >= 1 && in_array( "menu-item-has-children", $item->classes )) {		
			$item_output .= '<i class="fa fa-caret-right"></i>';
		}

		$item_output .= '</a>';		

		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

}