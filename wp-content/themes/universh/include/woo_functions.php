<?php
add_filter('loop_shop_columns', 'universh_loop_columns');
function universh_loop_columns() {
	return (function_exists('ot_get_option'))? ot_get_option( 'product_column', 3 ) : 3; // 3 products per row
}

add_filter( 'woocommerce_output_related_products_args', 'universh_related_products_args' );
function universh_related_products_args( $args ) {
	$args['posts_per_page'] = (function_exists('ot_get_option'))? ot_get_option( 'related_product', 3 ) : 3; // 4 related products
    $args['columns'] = (function_exists('ot_get_option'))? ot_get_option( 'related_product_column', 3 ) : 3; // arranged in 2 columns
    return $args;
}

function universh_loop_shop_per_page(){
	return 9;
}
add_filter( 'loop_shop_per_page', 'universh_loop_shop_per_page', 20 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'universh_get_product_thumbnail', 10 );

function universh_get_product_thumbnail( $size = '', $deprecated1 = 0, $deprecated2 = 0 ) {
	global $product;
	
	if ( has_post_thumbnail() ) {
		$image = universh_post_thumb( 500, 500, false );
	} elseif ( wc_placeholder_img_src() ) {
		$image = wc_placeholder_img( $size );
	}
	
	?>
    <div class="shop-img-wrap">        
        <?php echo wp_kses($image,array(
			'img' => array(
			  'src' => array(),
			  'alt' => array(),
			  'class' => array()
			),
		  )); ?>        
    </div><!-- end post-media -->
	<?php 
}

add_filter( 'woocommerce_page_title', 'universh_shop_page_title');

function universh_shop_page_title( $page_title ) {
	return false;
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_universh_ordering', 30 );

add_filter('woocommerce_default_universh_orderby', 'universh_default_universh_orderby');

function universh_default_universh_orderby() {
     return 'date'; // Can also use title and price
}

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'universh_template_loop_product_title', 10 );

function universh_template_loop_product_title(){
	global $post,$product;
	$category = get_the_term_list( $post->ID, 'product_cat', '', ', ', '' );
	?>
    <div class="shop-title-wrap">
    	<h6 class="product-cat"><?php echo wp_kses($category, array('ul'=>array('class'=>array()), 'li'=>array('class'=>array()), 'a'=>array('href'=>array(), 'class'=>array()))); ?></h6>
		<h5 class="product-name"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></h5>
    </div>
    <div class="shop-btns">
        <a class="option-btn" href="#"> &plus; </a>
        <ul class="shop-meta">
            <li>
            <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					esc_attr( $product->get_id() ),
					esc_attr( $product->get_sku() ),
					esc_attr( isset( $class ) ? $class : '' ),
					esc_html( $product->add_to_cart_text() )
				),
			$product ); ?>
            </li>
            <li><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr__('View More', 'universh'); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
            <?php if(class_exists( 'YITH_WCWL' )): ?>
            <li><?php echo wp_kses_post(do_shortcode('[yith_wcwl_add_to_wishlist]')); ?></li>
            <?php endif; ?>
        </ul><!-- Blog Meta -->
    </div><!-- Shop btns -->
    <?php
}

add_action( 'woocommerce_single_product_summary', 'universh_template_single_sharing', 15 );

function universh_template_single_sharing(){
	global $post,$product;
	$class1 = '';
	$class2 = '';
	 if(is_singular('teachers')){
		 $class1 = 'color';
		 $class2 = 'round';	 
	 }
	 elseif(is_singular('news')){
		 $class1 = 'color';		 
	 }elseif(is_single()){
		$class1 = '';
		$class2 = '';
	}
	if ( class_exists( 'woocommerce' ) ){
		if( is_product() ){
			$class1 = 'color';
			$class2 = 'round';
		}
	}
	?>
    <div class="share">
        <h5><?php esc_html_e('Share :', 'universh'); ?></h5>
        <ul class="social-icons <?php echo esc_attr($class1); ?> <?php echo esc_attr($class2); ?>">
            <li class="facebook"><a title="<?php esc_attr_e('Facebook', 'universh');?>" target="_blank" href="//www.facebook.com/share.php?u=<?php echo get_permalink($post->ID); ?>"><?php echo esc_html__('Facebook', 'universh'); ?></a></li>
            <li class="twitter"><a title="<?php esc_attr_e('Twitter', 'universh');?>" target="_blank" href="http://twitter.com/home?status=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>: <?php the_permalink(); ?>"><?php echo esc_html__('Twitter', 'universh'); ?></a></li>
            <li class="linkedin"><a title="<?php esc_attr_e('Linkedin', 'universh');?>" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink($post->ID); ?>&title=<?php echo get_the_title($post->ID); ?>&summary=&source="><?php echo esc_html__('Linkedin', 'universh'); ?></a></li>
            <li class="mail"><a title="<?php esc_attr_e('Mail', 'universh');?>" target="_blank" href="mailto:?subject=<?php echo get_the_title($post->ID); ?>&amp;body=<?php echo get_the_title($post->ID); ?>"><?php echo esc_html__('mail', 'universh'); ?></a></li>
            <li class="googleplus"><a title="<?php esc_attr_e('googleplus', 'universh');?>" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><?php echo esc_html__('googleplus', 'universh'); ?></a></li>
        </ul><!-- Blog Social Share -->
    </div>
    <?php
}

//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

function universh_template_top_section_start() {
	?>
	<div class="widget">
    	<div class="customwidget item-price w40">
	<?php
}

function universh_template_top_section_end() {
	?>
		</div>
	</div>
	<?php	
}

function universh_output_product_data_tabs() {
	wc_get_template( 'single-product/tabs/tabs.php' );
}