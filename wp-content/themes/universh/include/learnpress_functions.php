<?php
LP()->template( 'course' )->remove( 'learn-press/course-content-summary', array( '<div class="course-detail-info"> <div class="lp-content-area"> <div class="course-info-left">', 'course-info-left-open' ), 10 );

LP()->template( 'course' )->remove( 'learn-press/course-content-summary', array( '</div> </div> </div>', 'course-info-left-close' ), 15 );

LP()->template( 'course' )->remove_callback( 'learn-press/course-content-summary', 'single-course/sidebar', 85 );

LP()->template( 'course' )->remove_callback( 'learn-press/course-content-summary', 'single-course/meta-primary', 10 );

LP()->template( 'course' )->remove_callback( 'learn-press/course-content-summary', 'single-course/title', 10 );

LP()->template( 'course' )->remove_callback( 'learn-press/course-content-summary', 'single-course/meta-secondary', 10 );

LP()->template( 'course' )->remove( 'learn-press/course-content-summary', array( '<div class="lp-entry-content lp-content-area">', 'lp-entry-content-open' ), 30 );

add_action('learn-press/course-content-summary', LP()->template( 'course' )->text( '<div class="col-sm-12">', 'lp-entry-content-open' ),30);

add_action( 'learn-press/course-content-summary', LP()->template( 'course' )->callback( 'single-course/title' ), 30 );

add_action( 'learn-press/course-content-summary', LP()->template( 'course' )->callback( 'single-course/sidebar' ), 10 );

LP()->template( 'course' )->remove_callback( 'learn-press/courses-loop-item-title', 'loop/course/title.php', 20 );
LP()->template( 'course' )->remove_callback( 'learn-press/before-courses-loop-item', 'loop/course/thumbnail.php', 10 );

LP()->template( 'course' )->remove_callback( 'learn-press/after-courses-loop-item', 'single-course/meta/duration', 20 );
LP()->template( 'course' )->remove_callback( 'learn-press/after-courses-loop-item', 'single-course/meta/level', 20 );
LP()->template( 'course' )->remove_callback( 'learn-press/after-courses-loop-item', 'count_object', 20 );


add_action( 'learn-press/courses-loop-item-title', 'universh_learn_press_before_content_loop', 10 );

function universh_learn_press_before_content_loop(){
	global $post;
	$course = learn_press_get_course();
	?>
    <div class="course-wrapper">
        <!-- Course Banner Image -->
        <div class="course-banner-wrap">
        	<?php universh_post_thumb( 600, 420 ); ?>
            <?php $course_terms = get_the_terms( $post->ID, 'course_category' ); ?>
            <span class="cat">
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
                <h5><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo get_the_title($post->ID); ?></a></h5>
                <?php the_excerpt(); ?>
                <a class="btn" href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html__('Apply Now', 'universh'); ?></a>
            </div><!-- Course Content -->
        </div><!-- Course Detail -->
    </div>
    <?php
}

add_action( 'learn-press/after-single-course', 'universh_learn_press_after_single_course_related_course', 50 );

function universh_learn_press_after_single_course_related_course(){
	global $post;
	
	$terms =  array();
    $postid = get_the_ID();
	$terms = wp_get_post_terms( $postid, 'course_tag' , array('fields' => 'slugs') );
	
	if( !empty($terms) ):
	$args = array(
	'post__not_in'	  => array($postid),
	'posts_per_page' => 4,
	'tax_query' => array(
		array(
			'taxonomy' => 'course_tag',
			'field' => 'slug',
			'terms' => $terms
		))
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ):
	?>
    <div class="related-courses">
        <div class="container">
            <div class="row course-single">
                <h4><?php echo esc_html__('Related Courses', 'universh'); ?></h4>
                    
                <div class="owl-carousel show-nav-hover dots-dark nav-square dots-square navigation-color" data-animatein="zoomIn" data-animateout="slideOutDown" data-items="1" data-margin="30" data-loop="true" data-merge="true" data-nav="true" data-dots="false" data-stagepadding="" data-mobile="1" data-tablet="2" data-desktopsmall="2"  data-desktop="3" data-autoplay="true" data-delay="3000" data-navigation="true">
                    <?php while ( $query->have_posts() ) :$query->the_post();
                    global $course;
                    $course_id     = get_the_ID();
                    $course     = learn_press_get_course($course_id);
                    ?>
                    <div class="item">
                        <div class="related-wrap">
                            <div class="img-wrap">
                                <?php universh_post_thumb( 600, 420 ); ?>
                            </div>
                            <div class="related-content">
                                <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr__('Read More', 'universh'); ?>" class="anchor-plus">+</a><span><?php echo esc_html__('Read More', 'universh'); ?></span>
                                <h5 class="title"><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h5>
                            </div>
                        </div>    	
                    </div>                  
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
	endif;
	wp_reset_postdata();
	endif;
}
?>