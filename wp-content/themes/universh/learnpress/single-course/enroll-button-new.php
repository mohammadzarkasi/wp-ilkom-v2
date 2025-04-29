<?php
/**
 * Template for displaying the enroll button
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course     = learn_press_get_course();

if ( !$course->is_required_enroll() ) {
	return;
}

$course_status = learn_press_get_user_course_status();
$user          = learn_press_get_current_user();
if ( $user->has( 'enrolled-course', $course->id ) ) {
	return;
}

if ( !$user->can( 'enroll-course', $course->id ) ) {
	learn_press_display_message( apply_filters( 'learn_press_user_can_not_enroll_course_message', esc_html__( 'Sorry! You can not buy this course right now. Please contact admin site for more information', 'universh' ), $course, $user ) );
	return;
}

$purchase_button_text = apply_filters( 'learn_press_purchase_button_text', esc_html__( 'Buy this course', 'universh' ) );

?>
XXXXXXXXXXXXXXXXXXXXXX
<form name="purchase-course" class="purchase-course" method="post" enctype="multipart/form-data">
	<?php do_action( 'learn_press_before_purchase_button' ); ?>
	<input type="hidden" name="_wp_http_referer" value="<?php echo get_the_permalink(); ?>" />
	<input type="hidden" name="add-course-to-cart" value="<?php echo esc_attr($course->id); ?>" />
	<button class="button purchase-button btn"><?php echo esc_html($purchase_button_text); ?></button>
	<?php do_action( 'learn_press_after_purchase_button' ); ?>
</form>
<!--
<form name="enroll-course" class="enroll-course" method="post" enctype="multipart/form-data">
	<?php do_action( 'learn_press_before_enroll_button' ); ?>

	<input type="hidden" name="lp-ajax" value="enroll-course" />
	<input type="hidden" name="enroll-course" value="<?php echo esc_attr($course->id); ?>" />
	<input type="hidden" name="_wp_http_referer" value="<?php echo get_the_permalink(); ?>" />
	<button class="button enroll-button btn"><?php echo esc_html($purchase_button_text); ?></button>

	<?php do_action( 'learn_press_after_enroll_button' ); ?>
</form>
-->