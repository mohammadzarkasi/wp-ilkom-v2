<ul class="course-lists-loop course-container course-list">
<?php
	
	// Posts are found
	$i = 0;
	if ( $posts->have_posts() ) {
		while ( $posts->have_posts() ) :
			$posts->the_post();
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
            <li class="col-xs-12 course-list-wrap">
                <!-- Event Wrapper -->
                <div class="row course-wrapper">
                    <!-- Event Image Wrapper -->
                    <div class="col-sm-5">
                        <div class="course-banner-wrap">
                            <?php universh_post_thumb( 600, 400 ); ?>
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
                        </div>
                    </div><!-- Event Image Wrapper -->
                    <!-- Event Detail Wrapper -->
                    <div class="col-sm-7">
                        <div class="course-detail-wrap">
                            <div class="course-content-des">
                                <h5><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h5>
                                <h5><small><?php echo esc_html__('with Prof.', 'universh'); ?></small> <span><?php echo get_the_author(); ?></span></h5>
                                <?php the_excerpt(); ?>
                                <a class="btn" href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html__('Apply Now', 'universh'); ?></a>
                            </div><!-- Course Content -->
                        </div>
                    </div>	<!-- Event details -->
                </div><!-- Event detail Wrapper -->
                <!-- Divider -->
                <hr class="md"/>
            </li>
		<?php
		$i++;
		if($i == 3){
			$i = 0;
		}
		endwhile;
	}
	// Posts not found
	else { ?>
	<h4><?php echo esc_html__( 'Course not found', 'universh' ); ?></h4>
	<?php }
	?>