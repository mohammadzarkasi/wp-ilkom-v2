<?php
$terms = get_terms( 'gallery_category' );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    ?>
    <div class="isotope-filters text-center">
        <ul class="nav nav-pills">
        <li><a href="#" data-filter=".all" class="filter active"><?php echo esc_html__('All', 'universh'); ?></a></li>
        <?php
        foreach ( $terms as $term ) { ?>
            <li><a href="#" data-filter=".<?php echo esc_attr($term->slug); ?>" class="filter"><?php echo esc_html($term->name); ?></a></li>
        <?php
        }
        ?>
        </ul>
    </div>
    <?php
}
?>
<?php
$column = $posts->data['column'];
$gallery_style = $posts->data['gallery_style'];
$col_num = 12/$column;
if($gallery_style == 'gutter' || $gallery_style == 'masonry_gutter'){
	$margin = 20;
}else{
	$margin = 0;
}
if($gallery_style == 'masonry'){
	$class_mesonary_2 = 'gallery-filter';
} else{
	$class_mesonary_2 = '';
}
?>
<div class="isotope-grid <?php echo esc_attr($class_mesonary_2); ?>" data-gutter="<?php echo esc_attr($margin); ?>" data-columns="<?php echo esc_attr($column); ?>">
	<div class="grid-sizer"></div>
<?php
	// Posts are found
	if ( $posts->have_posts() ) {
		$i = 1;
		while ( $posts->have_posts() ) :
			$posts->the_post();
			global $post;
			$categories = 'all';
			$gallery_category = get_the_terms( $post->ID, 'gallery_category' );
			if ( $gallery_category && ! is_wp_error( $gallery_category ) ) : 
				$category_class = array();	
				foreach ( $gallery_category as $term1 ) {
				$category_class[] = $term1->slug;
				}							
			$categories = join( " ", $category_class );			
			endif;
			?>            
            <!-- Portfolio Item -->
            <div class="item all <?php echo esc_attr($categories); ?>">
                <!-- Image Wrapper -->
                <div class="image-wrapper <?php echo esc_attr($gallery_style); ?>">
                    <!-- IMAGE -->
                    <?php if($gallery_style == 'masonry' || $gallery_style == 'masonry_2' || $gallery_style == 'masonry_gutter'):
						$width = 9999;
						$height = 9999;
						universh_post_thumb( $width, $height, true, false );
					else:
						$width = 600;
						$height = 500;
						universh_post_thumb( $width, $height, true, true );
					endif;
					?>
                    <?php  ?>
                    <!-- Gallery Btns Wrapper -->
                    <?php if($gallery_style == 'masonry' || $gallery_style == 'masonry_2' || $gallery_style == 'masonry_gutter'): ?>
                    <div aria-multiselectable="true" role="tablist" id="gallery<?php echo esc_attr($i); ?>" class="panel-group accordion gallery-accordion">
                        <div class="panel panel-default">
                            <div id="heading<?php echo esc_attr($i); ?>" role="tab" class="panel-heading">
                                <h4 class="panel-title">
                                    <a aria-controls="collapse<?php echo esc_attr($i); ?>" aria-expanded="false" href="#collapse<?php echo esc_attr($i); ?>" data-parent="#gallery<?php echo esc_attr($i); ?>" data-toggle="collapse" role="button" class="collapsed">
                                    <?php the_title(); ?>
                                    </a>
                                </h4>
                            </div>
                            <div aria-labelledby="heading<?php echo esc_attr($i); ?>" role="tabpane<?php echo esc_attr($i); ?>" class="panel-collapse collapse" id="collapse<?php echo esc_attr($i); ?>" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="gallery-detail">
                                        <?php the_excerpt(); ?>
                                        <a href="<?php esc_url(the_permalink()); ?>" class="btn uni-upload-2"></a>
                                        <a href="<?php esc_url(the_post_thumbnail_url('full')); ?>" data-rel="prettyPhoto[portfolio]" class="btn uni-full-screen"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                     <?php else: ?>
                    <div class="gallery-detail btns-wrapper">
                        <a href="<?php esc_url(the_permalink()); ?>" class="btn uni-upload-2"></a>
                        <a href="<?php esc_url(the_post_thumbnail_url('full')); ?>" data-rel="prettyPhoto[portfolio]" class="btn uni-full-screen"></a>
                    </div><!-- Gallery Btns Wrapper -->
                    <?php endif; ?>
                </div><!-- Image Wrapper -->
            </div><!-- Portfolio Item -->
		<?php
		$i++;
		endwhile;
	}
	// Posts not found
	else {
	echo '<h4>' . esc_html__( 'Gallery not found', 'universh' ) . '</h4>';
	}
	?>
</div>