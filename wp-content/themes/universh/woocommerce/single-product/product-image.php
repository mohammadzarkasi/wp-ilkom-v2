<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;
?>
<div class="owl-carousel dots-inline" data-items="1">
    <?php
			if ( has_post_thumbnail() ) {
				$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
				$image_link    = wp_get_attachment_url( get_post_thumbnail_id() );
				$image         = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'full' ), array(
					'title'	=> get_the_title( get_post_thumbnail_id() )
				) );
	
				$attachment_count = count( $product->get_gallery_image_ids() );
	
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="item">%s</div>', $image ), $post->ID );
	
			} else {
	
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img class="img-responsive" src="%s" alt="%s" width="600" height="500" />', esc_url(wc_placeholder_img_src()), esc_html__( 'Placeholder', 'universh' ) ), $post->ID );
	
			}
			
			
			$attachment_ids = $product->get_gallery_image_ids();
			$loop 		= 0;
			foreach ( $attachment_ids as $attachment_id ) {
	
				$classes = array();
	
				$image_link = wp_get_attachment_url( $attachment_id );
	
				if ( ! $image_link )
					continue;
	
				$image_title 	= esc_attr( get_the_title( $attachment_id ) );
	
				$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'full' ), 0, $attr = array(
					'title'	=> $image_title,
					'alt'	=> $image_title
					) );
	
				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="item">%s</div>', $image ), $attachment_id, $post->ID );
	
				$loop++;
			}
		?>
    
</div><!-- carousel -->
