<?php
/**
 * footer widget area
 *
 *
 * @package WordPress
 * @subpackage universh
 * @since universh 1.0
 */
?>
<?php
if( function_exists( 'ot_get_option' ) ):

	$footer_widget_area = ot_get_option( 'footer_widget_area', 'on' );
	$footer_option_style = ot_get_option( 'footer_option_style', 'footer-1' );
	
	if( $footer_widget_area == 'on' ):
		
        $footer_main_class = '';
		$footer_widget_box = ot_get_option( 'footer_widget_box', 4 );
		
		$col_class = 12/$footer_widget_box;

		$footer_extra_class = '';
		if($footer_option_style == 'footer-5'){
			$footer_extra_class = ' parent-has-overlay';
		}

		$typo_class = 'widgets-dark typo-light';
		if($footer_option_style == 'footer-6'){
			$typo_class = '';
		}

		$footer_main_class = $typo_class.' '.$footer_extra_class;
		?>
        <div class="main-footer <?php echo esc_attr($footer_main_class); ?>">
        	<div class="container">
                <div class="row">
                <?php if($footer_option_style =='footer-2' || $footer_option_style =='footer-7'): ?>
                	<?php for( $i = 1; $i <= $footer_widget_box; $i++ ): ?>
                	<?php if($i == 1): ?>
                	<div class="col-md-3 col-xs-12 footer-widget-area">
                	<?php else: ?>
                	<div class="col-md-9 col-xs-12 footer-widget-area">
                	<?php endif; ?>
                	<?php if ( is_active_sidebar( 'footer-'.$i ) ) : ?>
					<?php dynamic_sidebar( 'footer-'.$i ); ?>
                	<?php
                	endif;
                	?>
                	</div>
					<?php endfor; ?>
                
				<?php else: ?>
					<?php
                    for( $i = 1; $i <= $footer_widget_box; $i++ ): 
					?>
                    <div class="col-lg-<?php echo esc_attr($col_class); ?> col-md-<?php echo esc_attr($col_class); ?> col-sm-<?php echo esc_attr($col_class); ?> footer-widget-area">
                        
                        <?php if ( is_active_sidebar( 'footer-'.$i ) ) : ?>
                        <?php dynamic_sidebar( 'footer-'.$i ); ?>
                        <?php
                        endif;
                        ?>
                        </div>
                    <?php
                    endfor;
                    ?>                
            <?php endif; ?>
            </div>                        
        </div>        
	</div><!-- end footer -->    
	<?php
	endif;	
endif;	//if( function_exists( 'ot_get_option' ) ):