<!-- Blog Grid Wrapper -->
	<?php $blog_layout_style = (function_exists('ot_get_option'))? ot_get_option('blog_layout_style') : 'style_1'; ?>
    <?php if($blog_layout_style != 'style_2'): ?>
	<?php if(is_single()): ?>
	<div class="col-sm-12 blog-single">
    	<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
    <?php else: ?>
    <div class="col-sm-6">
    	<div id="post-<?php the_ID(); ?>" <?php post_class('blog-wrap') ?>>
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>    
            <div class="post-meta sticky-posts">            
                <?php $sticky_post_text = (function_exists('ot_get_option'))? ot_get_option( 'sticky_post_text', 'Featured' ) : esc_html__('Featured', 'universh');?>            
                <div class="sticky-content"><?php printf( '<span class="sticky-post">%s</span>', $sticky_post_text ); ?></div>            
            </div>            
        <?php endif; ?>
    <?php endif; ?>
        
        	<?php if(is_single()): ?>
            <div class="blog-single-wrap">
            <?php endif; ?>
            <!-- Blog Image Wrapper -->
            <div class="blog-img-wrap">
            	<?php
				$video_url = get_post_meta( get_the_ID(), '_format_video_embed', true );				
				if( $video_url != '' ):				
					echo wp_kses_post(do_shortcode('[ts_custom_video url="'.esc_url($video_url).'"]'));								
				endif;
				?>
            	<?php if(is_single()): ?>
                	<?php universh_post_thumb( 1920, 900, true, false ); ?>
                <?php else: ?>
                <?php universh_post_thumb( 740, 400, true, false ); ?>
                <h6 class="post-type bg-pink">&nbsp;<i class="fa fa-video-camera"></i>&nbsp;</h6>
                <?php endif; ?>
            </div><!-- Blog Wraper -->
            <!-- Blog Detail Wrapper -->
            <?php if(is_single()): ?>
            <div class="blog-single-details">
            <?php else: ?>
            <div class="blog-details">
            <?php endif; ?>
                <h4><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h4>
                <ul class="blog-meta">
                    <li><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-calendar-o"></i> <?php echo get_the_date('d F Y'); ?></a></li>
                    <li><a href="<?php esc_url(comments_link()); ?>"><i class="fa fa-comments"></i> <?php comments_number( "0", "1", "%" ) ?></a></li>
                    <li><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-heart"></i> <?php echo universh_getPostViews('ID'); ?></a></li>
                </ul><!-- Blog Meta -->
                <?php if ( is_search()) : ?>                        
                    <p><?php the_excerpt(); ?></p>                    
                <?php else : ?>                
                    <?php the_content(sprintf(esc_html__( 'Read More', 'universh' ) ) ); ?>                    
                <?php endif; ?>
                
                <?php                        
                if(is_single()):
					$category = get_the_category(); 
					if($category): ?>
                    	<div class="tags clearfix"><span><?php echo esc_html__('Category:', 'universh'); ?></span><?php the_category(','); ?></div>                    
                    <?php
					endif;              
                    $tags_list = get_the_tag_list();                    
                    if ( $tags_list ): ?>                    
                        <div class="tags clearfix">
                        	<span><?php echo esc_html__('Tags:', 'universh'); ?></span>                        
                            <?php echo wp_kses(                             
                              $tags_list,                               
                              // Only allow a tag                              
                              array(                                
                                'a' => array(                                
                                  'href' => array()                                  
                                ),                                
                              )                              
                            ); ?>                            
                        </div>                         
                    <?php                     
                    endif;                
                endif;
                
                wp_link_pages( array(                
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'universh' ) . '</span>',                    
                    'after'       => '</div>',                    
                    'link_before' => '<span>',                    
                    'link_after'  => '</span>',                    
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'universh' ) . ' </span>%',                    
                    'separator'   => '<span class="screen-reader-text">, </span>',                    
                ) );                
                ?>
                <?php if(is_single()): ?>
                </div>
                <?php endif; ?>
                
            </div><!-- Blog Detail Wrapper -->
            <?php if(is_single()): ?>
            <?php universh_template_single_sharing(); ?>
            <?php universh_next_prev_posts(); ?>
            <?php
			 $show_related_post = (function_exists('ot_get_option'))? ot_get_option('show_related_post', 'on') : 'on'; 
			 if($show_related_post == 'on'):
				universh_related_posts();
			 endif;
			 ?>
             <?php endif; ?>
        </div><!-- Blog Wrapper -->
    </div>
    <?php endif; ?>
    <?php 
	if(!is_single() && $blog_layout_style == 'style_2'): ?>
    <div class="universh-timeline-block">
        <div class="universh-timeline-img"><i class="fa fa-users"></i></div>
        <!-- Timeline Image -->
        <div class="universh-timeline-content">
            <h4><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h4>
            <?php the_content(sprintf(esc_html__( 'Read More', 'universh' ) ) ); ?>
            <span class="universh-date"><?php echo get_the_date('F Y'); ?></span>
        </div><!-- Timeline Content -->
    </div>
    <?php endif; ?>
	<?php 
	if(is_single() && $blog_layout_style == 'style_2'): ?>
    <div class="blog-single">
        <div class="blog-single-wrap">
        	<div class="blog-img-wrap">
            <?php universh_post_thumb( 1920, 900, true, false ); ?>
            </div>
            <div class="blog-single-details">
                <h4><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h4>
                <ul class="blog-meta">
                    <li><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-calendar-o"></i> <?php echo get_the_date('d F Y'); ?></a></li>
                    <li><a href="<?php esc_url(comments_link()); ?>"><i class="fa fa-comments"></i> <?php comments_number( "0", "1", "%" ) ?></a></li>
                    <li><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-heart"></i> <?php echo universh_getPostViews('ID'); ?></a></li>
                </ul><!-- Blog Meta -->
                <?php if ( is_search()) : ?>                        
                    <p><?php the_excerpt(); ?></p>                    
                <?php else : ?>                
                    <?php the_content(sprintf(esc_html__( 'Read More', 'universh' ) ) ); ?>                    
                <?php endif; 
				
				$category = get_the_category(); 
				if($category): ?>
					<div class="tags clearfix"><span><?php echo esc_html__('Category:', 'universh'); ?></span><?php the_category(','); ?></div>                    
				<?php
				endif;                
				$tags_list = get_the_tag_list();                    
				if ( $tags_list ): ?>                    
					<div class="tags clearfix"> 
						<span><?php echo esc_html__('Tags:', 'universh'); ?></span>                       
						<?php echo wp_kses(                             
						  $tags_list,                               
						  // Only allow a tag                              
						  array(                                
							'a' => array(                                
							  'href' => array()                                  
							),                                
						  )                              
						); ?>                            
					</div>                         
				<?php                     
				endif;
				
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
			<?php universh_template_single_sharing(); ?>
            <?php universh_next_prev_posts(); ?>
            <?php
             $show_related_post = (function_exists('ot_get_option'))? ot_get_option('show_related_post', 'on') : 'on'; 
             if($show_related_post == 'on'):
                universh_related_posts();
             endif;
             ?>
        </div>
    </div>
    <?php endif; ?>