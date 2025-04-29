<div class="course-loop-details typo-dark">
<?php
	// Posts are found
	if ( $posts->have_posts() ) {
		if(class_exists( 'LearnPress' )){
		$i = 0;
		$j = 1;
		while ( $posts->have_posts() ) :
			$posts->the_post();
			$column = $posts->data['column'];
			$col_num = 12/$column;
			global $post;
			global $course;
            $course_id     = get_the_ID();
            $course     = learn_press_get_course($course_id);
			$price_html = $course->get_course_price_html();
			if($i == 0){
				$class = 'bg-yellow';
			} elseif($i == 1){
				$class = 'bg-pink';
			} elseif($i == 2) {
				$class = 'bg-green';
			}
			?>
            <div class="course-column-<?php echo esc_attr($column); ?> col-sm-<?php echo esc_attr($col_num); ?>">
            <div class="course-wrapper">
                <!-- Course Banner Image -->
                <div class="course-banner-wrap">
                	<?php universh_post_thumb( 600, 420 ); ?>
                    <?php $course_terms = get_the_terms( get_the_ID(), 'course_category' ); ?>
                    <span class="cat <?php echo esc_attr($class); ?>">
					<?php if ( ! empty( $course_terms ) && ! is_wp_error( $course_terms ) ): ?>
                    
                    <?php foreach ( $course_terms as $term ): ?>
					<?php echo esc_html($term->name); ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ( $price_html = $course->get_price_html() ) : ?>
                        -<?php echo wp_kses($price_html, array('span'=>array('class'=>array()))); ?>                    
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
                    <div class="course-content-des">
                        <h5><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h5>
                        <?php the_excerpt(); ?>
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
		
		if($j == $column): 
			$j = 0;
		?>
        <hr class="lg hidden-767 course-lg">
        <?php
		endif;
		$j++;
		endwhile;
	}
	}
	// Posts not found
	else {
	echo '<h4>' . esc_html__( 'Course not found', 'universh' ) . '</h4>';
	}
	?>
</div>