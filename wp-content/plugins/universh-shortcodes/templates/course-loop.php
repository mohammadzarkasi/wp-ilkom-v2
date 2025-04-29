<?php
	// Posts are found
	if ( $posts->have_posts() ) {
		$i = 0;
		while ( $posts->have_posts() ) :
			$posts->the_post();
			global $post;
			global $course;
			if($i == 0){
				$class = 'bg-yellow';
			} elseif($i == 1){
				$class = 'bg-pink';
			} elseif($i == 2) {
				$class = 'bg-green';
			}
			?>
            <div class="col-sm-4">
            <div class="course-wrapper">
                <!-- Course Banner Image -->
                <div class="course-banner-wrap">
                	<?php universh_post_thumb( 400, 270 ); ?>
                    <?php $course_terms = get_the_terms( get_the_ID(), 'course_category' ); ?>
                    <span class="cat <?php echo esc_attr($class); ?>">
					<?php if ( ! empty( $course_terms ) && ! is_wp_error( $course_terms ) ): ?>
                    
                    <?php foreach ( $course_terms as $term ): ?>
					<?php echo esc_html($term->name); ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ( $price_html = $course->get_price_html() ) : ?>
                        -<?php echo $price_html; ?>                    
                    <?php else: ?>
                    <?php echo esc_html__('Free', 'universh'); ?>
					<?php endif; ?>
					</span>
                    
                </div><!-- Course Banner Image -->
                <!-- Course Detail -->
                <div class="course-detail-wrap">
                    <!-- Course Teacher Detail -->
                    <div class="teacher-wrap">
                    	<?php echo get_avatar( get_the_author_meta( 'user_email' ), 100 ); ?>
                        <h5><small><?php echo esc_html__('with Prof.', 'universh'); ?></small> <span><?php echo get_the_author(); ?></span></h5>
                    </div><!-- Course Teacher Detail -->
                    <!-- Course Content -->
                    <div class="course-content">
                        <h5><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h5>
                        <p><?php the_excerpt(); ?></p>
                        <a class="btn" href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html__('Apply Now', 'universh'); ?></a>
                    </div><!-- Course Content -->
                </div><!-- Course Detail -->
            </div>
            </div>
		<?php
		$i++;
		if($i == 3){
			$i = 0;
		}
		endwhile;
	}
	// Posts not found
	else {
	echo '<h4>' . esc_html__( 'Course not found', 'universh' ) . '</h4>';
	}
	?>