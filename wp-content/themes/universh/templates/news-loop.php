<?php
	
	// Posts are found
	if ( $posts->have_posts() ) {
		$j = 1;
		while ( $posts->have_posts() ) :
			$posts->the_post();
			$column = $posts->data['column'];
			$col_num = 12/$column;
			global $post;
			
			?>
            <div class="news-column-<?php echo esc_attr($column); ?> col-sm-<?php echo esc_attr($col_num); ?>">
                <!-- News Wrapper -->
                <div class="news-wrap">
                	<a href="<?php esc_url(the_permalink()); ?>"><?php universh_post_thumb( 800, 700 ); ?></a>
                    <!-- News Content -->
                    <div class="news-content">
                    	<?php $news_terms = get_the_terms( get_the_ID(), 'news_category' ); ?>
                        
						<?php if ( ! empty( $news_terms ) && ! is_wp_error( $news_terms ) ): ?>
                        <?php 
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
							<span class="cat <?php echo esc_attr($class); ?>"><?php echo esc_html($term->name); ?></span>
                    	<?php 
						$i++;
						if($i == 3){
							$i = 0;
						}
						endforeach;
						endif;
						?>                        
                        <h5><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h5>
                        <a href="<?php esc_url(the_permalink()); ?>"><span class="news-meta"><?php echo get_the_date('d F - Y'); ?></span></a>
                    </div><!-- News Content -->
                </div><!-- News Wrapper -->
            </div>
            
            <?php if($j == $column): 
			$j = 0;
			?>
            <hr class="lg hidden-767 news-lg">
            <?php endif; ?>
            
		<?php
		$j++;
		endwhile;
	}
	// Posts not found
	else { ?>
	<h4><?php echo esc_html__( 'News not found', 'universh' ); ?></h4>
	<?php }
	?>