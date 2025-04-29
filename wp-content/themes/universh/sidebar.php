<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Universh
 * @since Universh 1.0
 */

if(is_singular('news')){
	if(is_single()){
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'news_single_sidebar', 'sidebar-1' ) : 'sidebar-1';
	} else{
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'news_sidebar', 'sidebar-1' ) : 'sidebar-1';
	}
}elseif(is_singular('gallery')){
	if(is_single()){
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'gallery_single_sidebar', 'sidebar-1' ) : 'sidebar-1';
	} else{
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'gallery_sidebar', 'sidebar-1' ) : 'sidebar-1';
	}
}elseif(is_singular('teachers')){
	if(is_single()){
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'teacher_single_sidebar', 'sidebar-1' ) : 'sidebar-1';
	} else{
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'teacher_sidebar', 'sidebar-1' ) : 'sidebar-1';
	}
}elseif(is_singular('lp_course')){
	if(is_single()){
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'course_single_sidebar', 'sidebar-1' ) : 'sidebar-1';
	} else{
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'course_sidebar', 'sidebar-1' ) : 'sidebar-1';
	}
}elseif(is_singular('tribe_events')){
	if(is_single()){
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'event_single_sidebar', 'sidebar-1' ) : 'sidebar-1';
	} else{
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'event_sidebar', 'sidebar-1' ) : 'sidebar-1';
	}
}
elseif(is_page()){
	$sidebar = get_post_meta( get_the_ID(), 'sidebar', true );		
	if($sidebar == '') $sidebar = 'sidebar-1';
}
elseif(is_single()){
	$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'blog_single_sidebar', 'sidebar-1' ) : 'sidebar-1';
}
else {
	$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'blog_sidebar', 'sidebar-1' ) : 'sidebar-1';
}
if ( class_exists( 'woocommerce' ) ){
	if( is_product() ){
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'single_product_sidebar', 'sidebar-1' ) : 'sidebar-1';
	}
	elseif( is_woocommerce() ){
		$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'shop_sidebar', 'sidebar-1' ) : 'sidebar-1';
	}
}
?>
	

<div class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( $sidebar ) ) : ?>
		<?php dynamic_sidebar( $sidebar ); ?>
	<?php endif; ?>
</div><!-- .sidebar -->
