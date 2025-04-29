<?php
	if(is_singular('gallery')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_gallery_layout', 'full' ) : 'full';
	}
	elseif(is_singular('news')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_news_layout', 'full' ) : 'full';
	}
	elseif(is_singular('teachers')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_teacher_layout', 'full' ) : 'full';
	}
	elseif(is_singular('tribe_events')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_event_layout', 'full' ) : 'full';
	}
	elseif(is_singular('lp_course')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_course_layout', 'full' ) : 'full';
	}
	elseif(is_page()) {
		$layout = get_post_meta( get_the_ID(), 'page_layout', true );
		if($layout != ''){
			$layout = $layout;
		} else {
			$layout = 'rs';
		}
	}
	elseif(is_single()){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_layout', 'rs' ) : 'rs';
	}
	else {
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'blog_layout', 'rs' ) : 'rs';
	}
	
	if ( class_exists( 'woocommerce' ) ){
		if( is_product() ){
			$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_shop_layout', 'full' ) : 'full';
		}
		elseif( is_woocommerce() ){
			$layout = (function_exists('ot_get_option'))? ot_get_option( 'shop_layout', 'full' ) : 'full';
		}
	}
	
	if(is_post_type_archive('news')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'news_layout', 'full' ) : 'full';
	}
	
	if(is_post_type_archive('lp_course')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'course_layout', 'full' ) : 'full';
	}
	
	if(get_query_var('course_category')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'course_layout', 'full' ) : 'full';
	}
	
	if(is_post_type_archive('gallery')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'gallery_layout', 'full' ) : 'full';
	}
	
	if(is_post_type_archive('teachers')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'teacher_layout', 'full' ) : 'full';
	}
	
	if(is_post_type_archive('tribe_events')){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'event_layout', 'full' ) : 'full';
	}
	

?>
</div>

	<?php if( $layout != 'full' ): ?>
    
    <div id="sidebar" class="sidebar col-md-3 col-sm-12 col-xs-12">
    
        <?php get_sidebar(); ?>
        			
    </div>
    
    <?php endif; // endif ?>
     
    </div>
    
</div>
</div>
</div>