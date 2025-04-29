<?php if(!is_single()): ?>
<div class="isotope-grid grid-three-column" data-gutter="0" data-columns="3">
    <div class="grid-sizer"></div>
    <div class="item all design identity photography">
        <!-- Image Wrapper -->
        <div class="image-wrapper">
            <!-- IMAGE -->
            <?php universh_post_thumb( 420, 320 ); ?>
            <!-- Gallery Btns Wrapper -->
            <div class="gallery-detail btns-wrapper">
                <a href="<?php esc_url(the_permalink()); ?>" class="btn uni-upload-2"></a>
                <a href="<?php esc_url(the_post_thumbnail_url('full')); ?>" data-rel="prettyPhoto[portfolio]" class="btn uni-full-screen"></a>
            </div><!-- Gallery Btns Wrapper -->
        </div><!-- Image Wrapper -->
    </div><!-- Portfolio Item -->
</div>
<?php else: ?>
<div class="col-sm-12">
    <!-- Project authors -->
    <div class="project-authors tooltip-color">
        <h5 class="widget-title"><?php echo esc_html__('Author', 'universh'); ?><span></span></h5>
        <ul>
            <li data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr(get_the_author()); ?>">
            	<?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
            </li>
        </ul>	
    </div><!-- Project authors -->
</div>
<div class="col-sm-12">
	<!-- Gallery Single Details -->
    <div class="gallery-single-detail">
		<h4><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h4>
        <?php the_content(sprintf(esc_html__( 'Read More', 'universh' ) ) ); ?>
        <?php
        wp_link_pages( array(    
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'universh' ) . '</span>',        
			'after'       => '</div>',        
			'link_before' => '<span>',        
			'link_after'  => '</span>',        
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'universh' ) . ' </span>%',        
			'separator'   => '<span class="screen-reader-text">, </span>',        
		) );
		?>
    </div><!-- Gallery Single Details -->
</div><!-- Column -->
<?php endif; ?>