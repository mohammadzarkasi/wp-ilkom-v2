<?php
function universh_styling_options( $options = array() ){
	if( function_exists( 'ot_get_option' ) ):
	$options = array(
		array(
        'id'          => 'preset_color',
        'label'       => esc_html__( 'Preset Color', 'universh' ),
        'desc'        => esc_html__( 'Main preset color', 'universh' ),
        'std'         => '#2196f3',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => '.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#header.colored .header-top,.widget-title span,.search-submit,.btn, .btn.dark:hover, .more-link,.cd-top:hover, .cd-top:focus,.footer-widget-area .newsletter.newsletter-widget .newsletter-submit,.tagcloud a:hover,#header.flat-menu nav ul.nav-main li > a:hover, #header.flat-menu nav ul.nav-main li.dropdown:hover a,.isotope-filters .nav-pills li a.active, .isotope-filters .nav-pills li a:hover, .isotope-filters .nav-pills li a:focus,.owl-theme .owl-dots .owl-dot:hover span, .owl-theme .owl-dots .owl-dot.active span,.pagination > li > a.active, .pagination > li > a:focus, .pagination > li > a:hover, .pagination > li > span:focus, .pagination > li > span:hover, .pager li > a:focus, .pager li > a:hover, .page-numbers > li > span.current, .page-numbers > li > a:focus, .page-numbers > li > a:hover, .page-numbers > li > span:focus, .page-numbers > li > span:hover, .pager li > a:focus, .pager li > a:hover, .pagination > li.current > a,.owl-theme .owl-nav > div:hover,.related-content a.anchor-plus,.video-controls a,.post-password-form input[type="submit"],.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.sticky-content,.post-type,.newsletter.newsletter-subscription .newsletter-submit,.woocommerce span.onsale,.product-label, .product-details .option-btn, .shop-meta li a:hover, .shop-meta li a:focus,.overlay.bg-color::after,#tribe-bar-form .tribe-bar-submit input[type="submit"],.button.enroll-button',
                'property'   => 'background-color'
                ),
                array(
                'selector' => '.page-header .breadcrumb span,a, a:hover, a:focus, a.active, .typo-dark h1 a:hover, .typo-dark h1 a:focus, .typo-dark h1 a.active, .typo-dark h2 a:hover, .typo-dark h2 a:focus, .typo-dark h2 a.active, .typo-dark h3 a:hover, .typo-dark h3 a:focus, .typo-dark h3 a.active, .typo-dark h4 a:hover, .typo-dark h4 a:focus, .typo-dark h4 a.active, .typo-dark h5 a:hover, .typo-dark h5 a:focus, .typo-dark h5 a.active, .typo-dark h6 a:hover, .typo-dark h6 a:focus, .typo-dark h6 a.active, .typo-light h1 a:hover, .typo-light h1 a:focus, .typo-light h1 a.active, .typo-light h2 a:hover, .typo-light h2 a:focus, .typo-light h2 a.active, .typo-light h3 a:hover, .typo-light h3 a:focus, .typo-light h3 a.active, .typo-light h4 a:hover, .typo-light h4 a:focus, .typo-light h4 a.active, .typo-light h5 a:hover, .typo-light h5 a:focus, .typo-light h5 a.active, .typo-light h6 a:hover, .typo-light h6 a:focus, .typo-light h6 a.active,.footer-copyright nav ul li a:hover, .footer-copyright nav ul li a:focus,.widget li a:hover, .widget li a:focus, .widget li a.active, .widgets-dark.typo-light .widget li a:hover, .widgets-dark.typo-light .widget li a:focus, .widgets-dark.typo-light .widget li a.active,.page-header .breadcrumb span a span:hover,.course-wrapper h5 span,.quote-footer span,.color,.woocommerce .woocommerce-message::before,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,.wt-tabs-nav span.wt-tabs-current,.wt-tabs-nav span:hover,.woocommerce-info::before,.woocommerce-message::before,.list-icon li:hover::before',
                'property'   => 'color'
                ),
                array(
                    'selector' => '#header nav ul.nav-main ul.dropdown-menu,.tagcloud a:hover,.learn-press-message',
                    'property'   => 'border-color'
                ),
                array(
                    'selector' => '',
                    'property'   => 'border-left-color'
                ),
                array(
                    'selector' => '#header nav.mega-menu ul.nav-main li.mega-menu-item ul.dropdown-menu,.woocommerce .woocommerce-message,.woocommerce-info,.woocommerce-message',
                    'property' => 'border-top-color',
                ),
                array(
                    'selector' => '',
                    'property' => 'border-right-color',
                ),
                array(
                    'selector' => '.wt-tabs-nav span.wt-tabs-current,.wt-tabs-nav span:hover,.nav-tabs > li > a:hover, .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover',
                    'property' => 'border-bottom-color',
                ),
				array(
                    'selector' => '',
                    'property'   => 'border-color',
					'opacity'	=> 0.7,
                ),
				array(
                'selector' => '.accordion.gallery-accordion .panel-title a.collapsed',
                'property'   => 'background-color',
				'opacity'	=> 0.9,
                ),
            )
      ),
    );

	return apply_filters( 'universh_styling_options', $options );
	
	endif;
}  
?>