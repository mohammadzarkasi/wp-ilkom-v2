<?php
	$title = '';
	$subtitle = '';		
	
	if(is_singular('news')){
		$title = (function_exists('ot_get_option'))? ot_get_option('news_title', 'Universh News') : esc_html__('Universh News', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('news_sub_title', 'All you want know'): esc_html__('All you want know', 'universh');
	}elseif(is_singular('lp_course')){
		$title = (function_exists('ot_get_option'))? ot_get_option('course_title', 'Universh Course') : esc_html__('Universh Course', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('course_sub_title', 'All you want know'): esc_html__('All you want know', 'universh');
	}elseif(is_singular('gallery')){
		$title = (function_exists('ot_get_option'))? ot_get_option('gallery_title', 'Universh gallery') : esc_html__('Universh gallery', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('gallery_sub_title', 'All you want know'): esc_html__('All you want know', 'universh');
	}elseif(is_singular('teachers')){
		$title = (function_exists('ot_get_option'))? ot_get_option('teacher_title', 'Universh teacher') : esc_html__('Universh teacher', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('teacher_sub_title', 'All you want know'): esc_html__('All you want know', 'universh');
	}elseif(is_singular('tribe_events')){
		$title = (function_exists('ot_get_option'))? ot_get_option('event_title', 'Universh event') : esc_html__('Universh event', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('event_sub_title', 'All you want know'): esc_html__('All you want know', 'universh');
	}elseif(is_single()){
		$title = (function_exists('ot_get_option'))? ot_get_option('blog_title','Universh Blog') : esc_html__('Universh Blog', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('blog_subtitle', 'All you want know'): esc_html__('All you want know', 'universh');
	}
	elseif( is_home() ){		
		$title = (function_exists('ot_get_option'))? ot_get_option('blog_title', 'Universh Blog') : esc_html__('Universh Blog', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('blog_subtitle', 'All you want know'): esc_html__('All you want know', 'universh');
	}
	elseif ( is_category() ){
		$title = esc_html__( 'Category Archives: ', 'universh' ).single_cat_title( '', false );
		if ( category_description() ) :
		$subtitle = category_description();
		endif;
	}
	elseif(is_search()){
		$title = esc_html__('Search Result', 'universh');
		$subtitle = esc_html__( 'This is a Search Results Page for: '. get_search_query(), 'universh' );
	}
	elseif ( is_author() ){
		$title = esc_html__( 'Author Archives: ', 'universh' ).'' . get_the_author() . '';
		if ( category_description() ) :
		$subtitle = category_description();
		endif;
	} 
	elseif( is_tag() ) {
		$title = esc_html__( 'Tag Archives: ', 'universh' ).single_tag_title( '', false );
		if ( tag_description() ) :
		$subtitle = tag_description();
		endif;
	}
	elseif ( is_archive() ){	
			
		if ( is_day() ) :
			$title =  esc_html__( 'Daily Archives: ', 'universh' ).'' . get_the_date() . '';
		elseif ( is_month() ) :
			$title = esc_html__( 'Monthly Archives: ', 'universh' ). '' . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'universh' ) ) . '' ;
		elseif ( is_year() ) :
			$title = esc_html__( 'Yearly Archives: ', 'universh' ).'' . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'universh' ) ) . '' ;
		else :
			$title = esc_html__( 'Archives', 'universh' );
		endif;
	} 	
	 elseif(is_404()){
		$title = esc_html__('Not Found', 'universh');
		$subtitle = esc_html__( 'Sorry page not found..', 'universh');
	}
	elseif( is_page() ){
		$title = get_the_title();
		$subtitle = tag_description();
		$custom_title = get_post_meta( get_the_ID(), 'custom_title', true );
		if( $custom_title == 'on' ){
			$alt_title = get_post_meta( get_the_ID(), 'title', true );
			$title = ( $alt_title != '' )? $alt_title : $title;
	
			$alt_subtitle = get_post_meta( get_the_ID(), 'subtitle', true );
			$subtitle = ( $alt_subtitle != '' )? $alt_subtitle : $subtitle;
		}
	}
	else {
		$title = get_the_title();
	}
	
	if(class_exists( 'woocommerce' )){
		if(is_woocommerce()){
			$title = (function_exists('ot_get_option'))? ot_get_option('shop_title', 'Shop') : esc_html__('Shop', 'universh');
			$subtitle = (function_exists('ot_get_option'))? ot_get_option('shop_subtitle', 'All you want know'): esc_html__('All you want know', 'universh');
		}
		if(is_product()){
			$title = get_the_title();
			$subtitle = (function_exists('ot_get_option'))? ot_get_option('shop_subtitle', 'All you want know'): esc_html__('All you want know', 'universh');
		}
	}
	
	if(is_post_type_archive('news')){
		$title = (function_exists('ot_get_option'))? ot_get_option('news_title', 'Universh News') : esc_html__('Universh News', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('news_sub_title', 'All you want know'): esc_html__('All you want know', 'universh');
	}
	
	if(is_post_type_archive('lp_course')){
		$title = (function_exists('ot_get_option'))? ot_get_option('course_title', 'Universh Course') : esc_html__('Universh Course', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('course_sub_title', 'All you want know'): esc_html__('All you want know', 'universh');
	}
	
	if(is_post_type_archive('gallery')){
		$title = (function_exists('ot_get_option'))? ot_get_option('gallery_title', 'Universh gallery') : esc_html__('Universh gallery', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('gallery_sub_title', 'All you want know'): esc_html__('All you want know', 'universh');
	}
	
	if(is_post_type_archive('teachers')){
		$title = (function_exists('ot_get_option'))? ot_get_option('teacher_title', 'Universh teacher'): esc_html__('Universh teacher', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('teacher_sub_title', 'All you want know'): esc_html__('All you want know', 'universh');
	}
	
	if(is_post_type_archive('tribe_events')){
		$title = (function_exists('ot_get_option'))? ot_get_option('event_title', 'Universh event') : esc_html__('Universh event', 'universh');
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('event_sub_title', 'All you want know') : esc_html__('All you want know', 'universh');
	}
?>

<!-- Page Header -->
<div class="page-header bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<!-- Page Header Wrapper -->
				<div class="page-header-wrapper">
					<!-- Title & Sub Title -->
					<h3 class="title"><?php echo esc_html($title); ?></h3>
					<h6 class="sub-title"><?php echo wp_kses($subtitle, array('a' => array('href' => array(),'alt' => array()) )); ?></h6>
					<?php 
					$show_breadcrumbs =  (function_exists('ot_get_option'))? ot_get_option('show_breadcrumbs', 'on') : 'on';
					if($show_breadcrumbs == 'on'):
						if(is_singular('tribe_events')):						
						else:
						if(function_exists('bcn_display')): ?>
							<div class="breadcrumb">
							<?php
                            bcn_display();
							?>
                            </div>
                            <?php
						endif;
						endif;
					endif;
					?>
				</div><!-- Page Header Wrapper -->
			</div><!-- Coloumn -->
		</div><!-- Row -->
	</div><!-- Container -->
</div><!-- Page Header -->