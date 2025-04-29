<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
	<div class="col-md-4">
        <div class="item"><?php universh_post_thumb( 400, 500 ); ?></div>
    </div>
    <div class="col-md-8">
    	<div class="member-detail-wrap">
            <h4 class="member-name"><?php the_title(); ?></h4>
            <?php $teachers_desig = get_post_meta(get_the_ID(),'teachers_designation', true); ?>
            <span class="position"><?php echo esc_html($teachers_desig); ?></span>
            <?php $short_description = get_post_meta(get_the_ID(),'short_description', true); ?>
            <p><?php echo esc_html($short_description); ?></p>
            <?php universh_template_single_sharing(); ?>	
        </div>    
    </div>
    <?php if (is_single()) : ?>
    <div class="col-md-12  margin-top-50">
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
    </div>
    <?php endif; ?>
</div>