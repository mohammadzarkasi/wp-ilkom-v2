<?php

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Universh 1.0
 */
function universh_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'universh' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'universh' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '<span></span></h5>',
	) );

	if( function_exists( 'ot_get_option' ) ):
		$sidebarArr = ot_get_option( 'create_sidebar', array() );
		if( !empty( $sidebarArr ) ){
			$i = 4;
			foreach ($sidebarArr as $sidebar) {

				register_sidebar( array(
					'name' => $sidebar['title'],
					'id' => 'sidebar-'.$i,
					'description' => $sidebar['desc'],
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '<span></span></h5>',
				) );

				$i++;
			}
		}
	endif;	//if( function_exists( 'ot_get_option' ) ):
	
	if( function_exists( 'ot_get_option' ) ):
		$footer_widget_area = ot_get_option( 'footer_widget_area', 'on' );
		if( $footer_widget_area == 'on' ):
			$footer_widget_box = ot_get_option( 'footer_widget_box', 3 );
			for( $i = 1; $i <= $footer_widget_box; $i++ ):
				register_sidebar( array(
					'name' => sprintf(esc_html__( 'Footer Widget Area %d', 'universh' ), $i),
					'id' => 'footer-'.$i,
					'description' => sprintf(esc_html__( 'Appears in Footer column %d', 'universh' ), $i),
					'before_widget' => '<div id="%1$s" class="widget no-box %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '<span></span></h5>',
				) );
			endfor; 
		endif;
	endif;	//if( function_exists( 'ot_get_option' ) ):
}
add_action( 'widgets_init', 'universh_widgets_init' );
?>