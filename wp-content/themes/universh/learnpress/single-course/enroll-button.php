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

$course = learn_press_get_course();

if ( !$course->is_required_enroll() ) {
	return;
}

$course_status = learn_press_get_user_course_status();
$user          = learn_press_get_current_user();
// only show enroll button if user had not enrolled
$purchase_button_text = apply_filters( 'learn_press_purchase_button_text', esc_html__( 'Buy this course', 'universh' ) );
$enroll_button_text   = apply_filters( 'learn_press_enroll_button_text', esc_html__( 'Enroll', 'universh' ) );
?>
<?php if ( $user->has( 'enrolled-course', $course->id ) ): ?>

	<?php learn_press_display_message( esc_html__( 'You have already enrolled this course', 'universh' ) ); ?>

<?php else: ?>
	<?php if ( $user->has( 'purchased-course', $course->id ) ) : ?>
		<?php if ( $user->has( 'finished-course', $course->id ) ): ?>
			<?php learn_press_display_message( esc_html__( 'Congratulations! You have finished this course', 'universh' ) ); ?>
		<?php else: ?>
			<?php if ( $user->can( 'enroll-course', $course->id ) ) : ?>

				<form name="enroll-course" class="enroll-course" method="post" enctype="multipart/form-data">
					<?php do_action( 'learn_press_before_enroll_button' ); ?>

					<input type="hidden" name="lp-ajax" value="enroll-course" />
					<input type="hidden" name="enroll-course" value="<?php echo esc_attr($course->id); ?>" />
					<input type="hidden" name="_wp_http_referer" value="<?php echo get_the_permalink(); ?>" />
					<button class="button btn"><?php echo esc_html($enroll_button_text); ?></button>

					<?php do_action( 'learn_press_after_enroll_button' ); ?>
				</form>

			<?php else: ?>

				<?php learn_press_display_message( apply_filters( 'learn_press_user_can_not_enroll_course_message', esc_html__( 'You have already purchased this course. Please wait for approve', 'universh' ), $course, $user ) ); ?>

			<?php endif; ?>
		<?php endif; ?>
	<?php elseif ( $user->can( 'purchase-course', $course->id ) ) : ?>

		<?php if ( LP()->cart->has_item( $course->id ) ) { ?>
			<?php if ( learn_press_is_enable_cart() ): ?>
				<?php learn_press_display_message( sprintf( wp_kses(__( 'This course is already added to your cart <a href="%s" class="button view-cart-button">%s</a>', 'universh' ), array('a'=>array('class'=>array(), 'href'=>array()))), esc_url(learn_press_get_page_link( 'cart' )), esc_html__( 'View Cart', 'universh' ) ) ); ?>
			<?php else: ?>
				<?php learn_press_display_message( sprintf( wp_kses(__( 'You have selected course. <a href="%s" class="button view-cart-button">%s</a>', 'universh' ), array('a'=>array('class'=>array(), 'href'=>array()))), esc_url(learn_press_get_page_link( 'checkout' )), esc_html__( 'Process Checkout', 'universh' ) ) ); ?>
			<?php endif; ?>
		<?php } else { ?>

			<form name="purchase-course" class="purchase-course" method="post" enctype="multipart/form-data">
				<?php do_action( 'learn_press_before_purchase_button' ); ?>
				<input type="hidden" name="_wp_http_referer" value="<?php echo get_the_permalink(); ?>" />
				<input type="hidden" name="add-course-to-cart" value="<?php echo esc_attr($course->id); ?>" />
				<button class="button purchase-button btn"><?php echo esc_html($purchase_button_text); ?></button>
				<a class="button view-cart-button hide-if-js" href="<?php echo esc_url(learn_press_get_page_link( 'cart' )); ?>"><?php esc_html_e( 'View cart', 'universh' ); ?></a>
				<?php do_action( 'learn_press_after_purchase_button' ); ?>
			</form>

		<?php } ?>

	<?php else: ?>

		<?php learn_press_display_message( apply_filters( 'learn_press_user_can_not_purchase_course_message', esc_html__( 'Sorry, you can not purchase this course', 'universh' ), $course, $user ) ); ?>

	<?php endif; ?>

<?php endif; ?>

