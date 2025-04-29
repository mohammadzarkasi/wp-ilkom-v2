<?php
/**
 * The Header for multipage of theme
 *
 * Displays all of the <head> section and everything up till </header>
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="wrapper">
	<!-- Page Loader -->
    <div id="pageloader">
        <div class="loader-inner">
        	<?php $preloder = (function_exists('ot_get_option'))? ot_get_option( 'preloder', UNIVERSHTHEMEURI. 'images/preloader.gif' ) : UNIVERSHTHEMEURI. 'images/preloader.gif'; ?>
            <img src="<?php echo esc_url($preloder); ?>" alt="<?php esc_attr_e('preloder', 'universh'); ?>">
        </div>
    </div><!-- Page Loader -->
    <!-- Back to top -->
	<a href="#0" class="cd-top"><?php esc_html_e('Top', 'universh'); ?></a>
    
    <?php
	$header_class = 'default-header colored flat-menu';
	$data_sticky_enable = 'true';
	$data_sticky_width_gap = 'true';
	$data_change_logo_size = 'true';
	$data_always_aticky = 'false';
	$header_option_style = (function_exists('ot_get_option'))? ot_get_option( 'header_option_style', 'header-1' ) : 'header-1';
	if($header_option_style == 'header-2'){
		$header_class = 'clean-top center';
	}
	if($header_option_style == 'header-5'){
		$header_class = 'flat-menu narrow full-width';
		$data_sticky_enable = 'true';
		$data_sticky_width_gap = 'false';
		$data_change_logo_size = 'false';
	}
	if($header_option_style == 'header-6'){
		$header_class = '';
		$data_always_aticky = 'true';
		$data_sticky_enable = 'true';
	}
	if($header_option_style == 'header-7'){
		$header_class = 'single-menu flat-menu transparent valign font-color-light';
		$data_sticky_enable = 'true';
	}
	if($header_option_style == 'header-8'){
		$header_class = 'single-menu flat-menu transparent semi-transparent valign font-color-light';
		$data_sticky_enable = 'true';
	}
	if($header_option_style == 'header-9'){
		$header_class = 'single-menu flat-menu transparent semi-transparent light valign font-color-dark';
		$data_sticky_enable = 'true';
	}	
	?>
    <header id="header" class="<?php echo esc_attr($header_class); ?>" data-plugin-options='{"stickyEnabled": <?php echo esc_attr($data_sticky_enable); ?>, "stickyWithGap": <?php echo esc_attr($data_sticky_width_gap); ?>, "stickyChangeLogoSize": <?php echo esc_attr($data_change_logo_size); ?>, "alwaysStickyEnabled": <?php echo esc_attr($data_always_aticky); ?>}'>
    	<?php $header_top_bar = (function_exists('ot_get_option'))? ot_get_option( 'header_top_bar', 'off' ) : 'off';
		if($header_top_bar != 'off'):
		$header_top_bar_left_text = (function_exists('ot_get_option'))? ot_get_option( 'header_top_bar_left_text' ) : esc_html__('info@universh.com', 'universh');
		$header_top_bar_left_phone = (function_exists('ot_get_option'))? ot_get_option( 'header_top_bar_left_phone' ) : esc_html__('(568) 456-7890', 'universh');
		?>
        <div class="header-top <?php echo esc_attr($header_option_style); ?>">
            <div class="container">
                <nav>
                    <ul class="nav nav-pills nav-top">
                        <?php if($header_top_bar_left_text != ''): ?>
                        <li class="phone">
                            <span><i class="fa fa-envelope"></i><?php echo esc_html($header_top_bar_left_text); ?></span>
                        </li>
                        <?php endif; ?>
                        <?php if($header_top_bar_left_phone != ''): ?>
                        <li class="phone">
                            <span><i class="fa fa-phone"></i><?php echo esc_html($header_top_bar_left_phone); ?></span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <?php
				if($header_option_style != 'header-5' && $header_option_style != 'header-6' && $header_option_style != 'header-7' && $header_option_style != 'header-8' && $header_option_style != 'header-9'):					
				$social_array = (function_exists('ot_get_option'))? ot_get_option( 'header_top_bar_right_text', array() ) : '';
				$header_top_bar_right_icon_style = (function_exists('ot_get_option'))? ot_get_option( 'header_top_bar_right_icon_style', 'color' ) : 'color';
				if( !empty($social_array) ): ?>
				<ul class="social-icons <?php echo esc_attr($header_top_bar_right_icon_style); ?>">
					<?php foreach ($social_array as $key => $value): ?>
						<li class="<?php echo esc_attr($value['class']); ?>">
						
							<a title="<?php echo esc_attr($value['title']); ?>" target="_blank" href="<?php echo esc_url($value['link']); ?>">
								<?php echo esc_html($value['title']); ?>
							</a>
						</li>
					<?php endforeach; ?>			
				</ul>
				<?php
				endif;
				endif;
				?>
                <?php 
				$header_top_bar_right_search = (function_exists('ot_get_option'))? ot_get_option( 'header_top_bar_right_search', 'off' ) : 'off';
				if($header_top_bar_right_search == 'on'): ?>
                <div class="search">
                    <form id="searchForm" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                        <div class="input-group">
                            <input type="search" value="<?php echo get_search_query(); ?>" class="form-control search" name="s" id="s" placeholder="<?php echo esc_attr('Search...', 'universh'); ?>" required>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="container <?php echo esc_attr($header_option_style); ?>">
            <div class="logo">
            	<?php $logo = (function_exists('ot_get_option'))? ot_get_option( 'main_logo', UNIVERSHTHEMEURI. 'images/logo.png' ) : UNIVERSHTHEMEURI. 'images/logo.png'; ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="211" height="40" data-sticky-width="150" data-sticky-height="28" />
                </a>
                <div class="hidden-sec slim-wrap" data-image="<?php echo esc_url($logo); ?>" data-homelink="<?php echo esc_url( home_url( '/' ) ); ?>" data-imagealt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<?php
					$menu_class = '';
					if ( is_page_template( 'page-templates/one-page.php' ) ) {
						$menu_name = get_post_meta( get_the_ID(), 'onepage_menu_select', true );		
																	
                    	wp_nav_menu(
							array(
                            'menu' 			  => $menu_name,
                            'theme_location'  => '',
							'menu_class'      => 'slimmenu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'fallback_cb'     => 'universh_default_header_menu',
							'container'       => '',
							)
						);
					} else{														
						wp_nav_menu(
							array(
							'theme_location'  => 'main-menu',
							'menu_class'      => 'slimmenu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'fallback_cb'     => 'universh_default_header_menu',
							'container'       => '',
							)
						);
					}					
					?>
                </div>
            </div>
        </div>
        <div class="navbar-collapse nav-main-collapse collapse visible-sec">
            <div class="container">
            	<?php
				if($header_option_style == 'header-5' || $header_option_style == 'header-6' || $header_option_style == 'header-7' || $header_option_style == 'header-8' || $header_option_style == 'header-9'):					
				$social_array = (function_exists('ot_get_option'))? ot_get_option( 'header_top_bar_right_text', array() ) : '';
				$header_top_bar_right_icon_style = (function_exists('ot_get_option'))? ot_get_option( 'header_top_bar_right_icon_style', 'color' ) : 'color';
				if( !empty($social_array) ): ?>
				<ul class="social-icons <?php echo esc_attr($header_top_bar_right_icon_style); ?>">
					<?php foreach ($social_array as $key => $value): ?>
						<li class="<?php echo esc_attr($value['class']); ?>">
							<a title="<?php echo esc_attr($value['title']); ?>" target="_blank" href="<?php echo esc_url($value['link']); ?>">
								<?php echo esc_html($value['title']); ?>
							</a>
						</li>
					<?php endforeach; ?>			
				</ul>
				<?php
				endif;
				endif; 
				?>
                <nav class="nav-main mega-menu">
                	<?php
					$menu_class = '';
					if ( is_page_template( 'page-templates/one-page.php' ) ) {
						$menu_name = get_post_meta( get_the_ID(), 'onepage_menu_select', true );
						wp_nav_menu(
						array(
						    'menu' 			  => $menu_name,
                            'theme_location' => '',
							'menu_class' => 'nav nav-pills nav-main onepage-menu',
							'menu_id' => 'mainMenu',
							'container' => false,
							'fallback_cb'     => 'universh_default_header_menu',
							'walker' => new universh_scm_walker
						)
					);
					} else{
						wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'menu_class' => 'nav nav-pills nav-main',
							'menu_id' => 'mainMenu',
							'container' => false,
							'fallback_cb'     => 'universh_default_header_menu',
							'walker' => new universh_scm_walker
						)
					);
					}
					
					?>                    
                </nav>
            </div>
        </div>
    </header>
    <?php if ( is_page_template( 'page-templates/home-page.php' ) || is_page_template( 'page-templates/one-page.php' ) ): ?>
    <?php else: ?>
	<?php get_template_part( 'header/banner', '' ); ?>
	<?php endif; ?>