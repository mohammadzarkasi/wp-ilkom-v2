<?php
/**
 * Template for displaying course sidebar.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hide sidebar if there is no content
 */
if ( ! is_active_sidebar( 'course-sidebar' ) && ! LP()->template( 'course' )->has_sidebar() ) {
	return;
}
global $post;
$course = learn_press_get_course();
?>
<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-7">
			<?php learn_press_get_template( 'single-course/thumbnail.php' ); ?>
		</div>
	
		<div class="col-sm-5">
			<div class="course-detail">
				<!-- Course Content -->
				<div class="course-meta-des">
					<?php $course_terms = get_the_terms( $post->ID, 'course_category' ); ?>
					<?php if ( ! empty( $course_terms ) && ! is_wp_error( $course_terms ) ): ?>
					<?php $i = 0; ?>
					<?php foreach ( $course_terms as $term ): ?>
					<?php if($i == 0){
						$class = 'bg-yellow';
					} elseif($i == 1){
						$class = 'bg-pink';
					} elseif($i == 2) {
						$class = 'bg-green';
					} ?>            
					<span class="cat <?php echo esc_attr($class); ?>"><?php echo esc_html($term->name); ?></span>
					<?php $i++;
					if($i == 3){
						$i = 0;
					} ?>
					<?php endforeach; ?>
					<?php endif; ?>
					<h4 class="course-title-new"><?php echo get_the_title($post->ID); ?></h4>
					<ul class="course-meta-icons">            	
						<li><i class="fa fa-dollar"></i><span><?php echo esc_html__('Price', 'universh'); ?></span><h5>
						<?php if ( $price_html = $course->get_price_html() ) : ?>
							<?php echo wp_kses($price_html, array('span'=>array('class'=>array()))); ?>                    
						<?php else: ?>
						<?php echo esc_html__('Free', 'universh'); ?>
						<?php endif; ?>
						</h5></li>
						<li><i class="fa fa-users"></i><span><?php echo esc_html__('Students', 'universh'); ?></span><h5><?php echo esc_html($course->get_users_enrolled()); ?></h5></li>
						<li><i class="fa fa-comments"></i><span><?php echo esc_html__('Comments', 'universh'); ?></span><h5><?php comments_number( "0", "1", "%" ) ?></h5></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo esc_html__('Duration', 'universh'); ?></span><h5><?php echo esc_html($course->get_duration()); ?></h5></li>
					</ul>
					<h5><?php echo esc_html__('Course Details', 'universh'); ?></h5>
					<?php the_excerpt(); ?>
				</div>
			</div><!-- Course Detail -->
		</div>
	</div>
</div>
