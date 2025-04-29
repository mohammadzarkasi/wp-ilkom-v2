<?php
$extra_class = '';
	if(is_singular('gallery')){
		$extra_class = ' pad-none';
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
	elseif(is_page()){
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
	else{
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
	
	if( $layout == 'full' ){
		$container_class = 'col-md-12 col-lg-12 col-sm-12 col-xs-12';
	}
	else{
		$container_class = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
		$container_class .= ( $layout == 'ls' )? ' pull-right' : '';
	}
?>

<!-- Page Main -->
<div role="main" class="main">

	<?php
	$layout_padding = 'page-default'; 
	if(is_page()):
		$layout_padding = get_post_meta(get_the_ID(), 'layout_padding', true);
		if($layout_padding == ''):
			$layout_padding = 'page-default';
		endif;
	endif;
	?>
	<div class="<?php echo esc_attr($layout_padding); ?> bg-grey typo-dark<?php echo esc_attr($extra_class); ?>">
    	<?php if(is_singular('gallery')):?>
        <div class="project-single relative galler-single">
            <div class="owl-carousel dots-inline" data-items="1" data-loop="true" data-merge="true" data-nav="true" data-dots="true" data-mobile="1" data-tablet="1" data-desktopsmall="1"  data-desktop="1" data-autoplay="true" data-navigation="true">
                <?php 
              $images = get_post_meta( get_the_ID(), 'gallery_images', true );
			  if(!empty($images)){
              $new_array = explode(',',$images);
              if ( ! empty( $new_array ) ) {
                foreach( $new_array as $id ) {		
                    $full_img_src = wp_get_attachment_image_src( $id, 'full' );
                    ?>
                    <div class="item"><img src="<?php echo esc_url($full_img_src[0]); ?>" alt="<?php echo esc_attr__('image', 'universh');?>" class="img-responsive" /></div>
                    <?php
                }
              }
			  }
                ?>
            </div>
        </div>
        <?php endif; ?>
		<div class="container">
        	<div class="row">
            	<div class="<?php echo esc_attr($container_class); ?>">
