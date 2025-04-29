<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 */
?>
<?php
$data_attr = '';
$footer_option_style = (function_exists('ot_get_option'))? ot_get_option( 'footer_option_style', 'footer-1' ) : 'footer-1';

if($footer_option_style == 'footer-6'){
	$footer_option_style .= ' light';
}
if($footer_option_style == 'footer-7'){
	$footer_option_style .= ' relative';
}
if($footer_option_style == 'footer-5'){
	$footer_widget_top_parallax_background = (function_exists('ot_get_option'))? ot_get_option( 'footer_widget_top_parallax_background' ) : '';
	$footer_option_style .= ' transparent parallax-bg overlay heavy bg-img bg-cover';
	$data_attr = 'data-background="'.esc_attr($footer_widget_top_parallax_background) .'"  data-stellar-background-ratio="0.5"';
}
?>  
    <footer id="footer" class="<?php echo esc_attr($footer_option_style); ?>" <?php echo esc_attr($data_attr); ?>>
    	<?php 
		$footer_option_style = (function_exists('ot_get_option'))? ot_get_option( 'footer_option_style', 'footer-1' ) : 'footer-1';
		if($footer_option_style == 'footer-7'): ?>
        <div class="row-sep cloud"></div>
        <?php endif; ?>
        <!-- Main Footer --> 
		<?php
        $footer_widget_area = (function_exists('ot_get_option'))? ot_get_option('footer_widget_area', 'on') : 'on';
        if($footer_widget_area == 'on'): ?>
        <?php get_template_part('footer/footer-widget-area', ''); ?>
        <?php endif; ?>
        
        <!-- Footer Copyright -->
        <?php
		$footer_extra_class = '';
		if($footer_option_style == 'footer-5'){
			$footer_extra_class = ' parent-has-overlay';
		}
		?>
        <div class="footer-copyright<?php echo esc_attr($footer_extra_class); ?>">
            <div class="container">
                <div class="row">
                    <!-- Copy Right Logo -->
                    <div class="col-md-2">
                    	<?php $logo = (function_exists('ot_get_option'))? ot_get_option( 'footer_logo', UNIVERSHTHEMEURI. 'images/logo-footer.png' ) : UNIVERSHTHEMEURI. 'images/logo-footer.png'; ?>
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="211" height="40" class="img-responsive" />
                        </a>
                    </div><!-- Copy Right Logo -->
                    <!-- Copy Right Content -->
                    <div class="col-md-6">
                    	<?php                    
						$copyright_text =  (function_exists('ot_get_option'))? ot_get_option( 'copyright_text') : '';                    
						echo wp_kses_post(do_shortcode($copyright_text)); 
						?>
                    </div><!-- Copy Right Content -->
                    <!-- Copy Right Content -->
                    <div class="col-md-4">
                        <nav class="sm-menu">
                        	<?php                        
							wp_nav_menu(
								array(
									'theme_location' => 'footer-menu',
									'menu_class' => 'footer-links',
									'menu_id' => 'univershFooterMenu',
									'container' => false,
									'fallback_cb'     => 'universh_default_footer_menu',
									'depth'			=> 1
								)
							);
							?>
                        </nav><!-- Nav -->
                    </div><!-- Copy Right Content -->
                </div><!-- Footer Copyright -->
            </div><!-- Footer Copyright container -->
        </div><!-- Footer Copyright -->
    </footer>

  	<?php wp_footer(); ?>
    </div>
</body>

</html>