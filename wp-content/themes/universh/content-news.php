<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
<?php if(!is_single()):?>
	<?php $news_column_num = (function_exists('ot_get_option'))? ot_get_option('news_column_num', 4) : 4;
	$col_class = 12/$news_column_num;
	?>
	<div class="col-sm-6 col-md-<?php echo esc_attr($col_class); ?>">
    <div class="news-wrap">
<?php ?>
<?php endif; ?>
	<?php if(!is_single()):?>    
    	<a href="<?php esc_url(the_permalink()); ?>"><?php universh_post_thumb( 800, 700 ); ?></a>           
    <?php else: ?>
    <div class="news-img-wrap">
    	<?php universh_post_thumb( 1200, 600 ); ?>
    </div>
    <?php endif; ?>
    <?php if(is_single()):?>
    <div class="news-single-details">
    <?php else: ?>
    <div class="news-content">
    <?php endif; ?>
    	<?php 
		$news_terms = get_the_terms( get_the_ID(), 'news_category' );
		if ( ! empty( $news_terms ) && ! is_wp_error( $news_terms ) ):
			$i = 0;
			foreach ( $news_terms as $term ):
				if($i == 0){
					$class = 'bg-pink';
				} elseif($i == 1){
					$class = 'bg-yellow';
				} elseif($i == 2) {
					$class = 'bg-voilet';
				}
				?>
                <span class="news-cat <?php echo esc_attr($class); ?>"><?php echo esc_html($term->name); ?></span>
                <?php
				$i++;
				if($i == 3){
					$i = 0;
				}
			endforeach;			
		endif;
		?>
        <?php if(is_single()): ?>
        	<h4 class="title-simple"><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h4>
        <?php else: ?>
        <h6><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h6>
        <a href="<?php esc_url(the_permalink()); ?>"><span class="news-meta"><?php echo get_the_date('d F - Y'); ?></span></a>
        </div>
        <?php endif; ?>
        <?php if (is_single()) :      
            the_content(sprintf(esc_html__( 'Read More', 'universh' ) ) ); ?>  
    	</div>
    	<?php universh_template_single_sharing();
		universh_related_news();
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

<?php if(!is_single()):?>
</div>
</div>
<?php endif; ?>
</div>