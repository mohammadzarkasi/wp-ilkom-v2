<?php
function universh_import_files() {
    return array(
        array(
            'import_file_name'           => esc_html__('Home default', 'universh'),
            'categories'                 => array('default'),
            'import_file_url'            => 'http://woodtheme.com/universh/demo-content/demo1/default.xml',
            'import_widget_file_url'     => 'http://woodtheme.com/universh/demo-content/demo1/default.wie',
            'import_preview_image_url'   => 'http://woodtheme.com/universh/demo-content/demo1/home-default.jpg',
            'import_notice'              => esc_html__( 'Please wait, it may take 3-5 minutes.', 'universh' ),
            'preview_url'                => 'http://woodtheme.com/universh/demos/',
        ),
        array(
            'import_file_name'           => esc_html__('Home event', 'universh'),
            'categories'                 => array('events'),
            'import_file_url'            => 'http://woodtheme.com/universh/demo-content/demo5/demo-event.xml',
            'import_widget_file_url'     => 'http://woodtheme.com/universh/demo-content/demo5/demo-event.wie',
            'import_preview_image_url'   => 'http://woodtheme.com/universh/demo-content/demo5/home-events.jpg',
            'import_notice'              => esc_html__( 'Please wait, it may take 3-5 minutes.', 'universh' ),
            'preview_url'                => 'http://woodtheme.com/universh/demos/',
        ),
        array(
            'import_file_name'           => esc_html__('Home kids', 'universh'),
            'categories'                 => array('kids'),
            'import_file_url'            => 'http://woodtheme.com/universh/demo-content/demo7/demo-kids.xml',
            'import_widget_file_url'     => 'http://woodtheme.com/universh/demo-content/demo7/demo-kids.wie',
            'import_preview_image_url'   => 'http://woodtheme.com/universh/demo-content/demo7/home-kids.jpg',
            'import_notice'              => esc_html__( 'Please wait, it may take 3-5 minutes.', 'universh' ),
            'preview_url'                => 'http://woodtheme.com/universh/demos/',
        ),
    );
}

add_filter( 'pt-ocdi/import_files', 'universh_import_files' );

function universh_after_import_setup($selected_import) {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );	

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
            'footer-menu' => $footer_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).

    if ( 'Home kids' === $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Home – Kids' );
    }
    elseif ( 'Home event' === $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Video Background' );
    }
    else {
        $front_page_id = get_page_by_title( 'Home – Default' );
    }

    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'universh_after_import_setup' );