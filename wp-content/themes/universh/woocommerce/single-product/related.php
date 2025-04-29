<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<div class="related products">

		<h4 class="title-simple"><?php _e( 'Related Products', 'universh' ); ?></h4>
        
        <div class="owl-carousel" data-margin="30" data-nav="true" data-dots="false" data-loop="true">

		<?php //woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				$post_object = get_post( $related_product->get_id() );

				setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

				wc_get_template_part( 'content', 'related-product' );
				?>

			<?php endforeach; ?>

		<?php //woocommerce_product_loop_end(); ?>
        
        </div>

	</div>

<?php endif;

wp_reset_postdata();
