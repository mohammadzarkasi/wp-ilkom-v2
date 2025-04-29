<div class="default-blog-loop typo-dark">
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
            <div class="col-sm-<?php echo esc_attr($col_num); ?> col-default-loop-<?php echo esc_attr($column); ?>">
                <!-- Blog Grid Wrapper -->
                <div class="blog-wrap">
                    <!-- Blog Image Wrapper -->
                    <div class="blog-img-wrap">
                    	<?php if($column == '1'){
							$width = 1200;
							$height = 600;
						}elseif($column == '2'){
							$width = 600;
							$height = 350;
						} else{
							$width = 370;
							$height = 220;
						}?>
                        <?php universh_post_thumb( $width, $height ); ?>
                        <h6 class="post-type bg-yellow">&nbsp;<i class="fa fa-microphone"></i>&nbsp;</h6>
                    </div><!-- Blog Wraper -->
                    <!-- Blog Detail Wrapper -->
                    <div class="blog-details">
                        <h5><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h5>
                        <ul class="blog-meta">
                            <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date('d. m. Y'); ?></li>
                            <li><i class="fa fa-comments"></i> <?php comments_number( "0", "1", "%" ) ?></li>
                            <li><i class="fa fa-heart"></i> <?php echo universh_getPostViews('ID'); ?></li>
                        </ul><!-- Blog Meta -->
                        <?php the_excerpt(); ?>
                        <a class="btn" href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html__( 'Read More', 'universh' ); ?></a>
                        <?php if($column == '1'): ?>
						<?php universh_template_single_sharing(); ?>
                        <?php endif; ?>
                    </div><!-- Blog Detail Wrapper -->
                </div><!-- Blog Wrapper -->
            </div><!-- Column -->
		<?php
		if($j == $column): 
			$j = 0;
		?>
        <hr class="lg hidden-767 blog-lg">
        <?php
		endif;
		$j++;
		endwhile;
	}
	// Posts not found
	else {
	echo '<h4>' . esc_html__( 'Posts not found', 'universh' ) . '</h4>';
	}
	?>
</div>