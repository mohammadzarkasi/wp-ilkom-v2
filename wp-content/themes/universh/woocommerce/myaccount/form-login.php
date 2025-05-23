<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 9.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="row shop-forms" id="customer_login">

	<div class="col-sm-6">
    
    	<div class="content-box shadow bg-lgrey">

<?php endif; ?>

		<h4 class="title"><?php esc_html_e( 'Login', 'universh' ); ?></h4>

		<form method="post" class="shop-login">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<div class="form-group">
				<label for="username"><?php esc_html_e( 'Username or email address', 'universh' ); ?> <span class="required">*</span></label>
				<input type="text" class="form-control" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>             
			</div>
			<div class="form-group">
				<label for="password"><?php esc_html_e( 'Password', 'universh' ); ?> <span class="required">*</span></label>
                <input class="form-control" type="password" name="password" id="password" autocomplete="current-password" />
			</div>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<div class="form-group">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<input type="submit" class="btn pull-right" name="login" value="<?php esc_attr_e( 'Login', 'universh' ); ?>" />
				<label for="rememberme" class="inline">
					<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'universh' ); ?>
				</label>
			</div>
			<div class="form-group">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'universh' ); ?></a>
			</div>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

		</div>

	</div>

	<div class="col-sm-6">
    
    	<div class="content-box shadow bg-lgrey">

		<h4 class="title"><?php esc_html_e( 'Register', 'universh' ); ?></h4>

		<form method="post" class="shop-register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<div class="form-group">
					<label for="reg_username"><?php _e( 'Username', 'universh' ); ?> <span class="required">*</span></label>
                    <input type="text" class="form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</div>

			<?php endif; ?>

			<div class="form-group">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'universh' ); ?> <span class="required">*</span></label>
                <input type="email" class="form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</div>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<div class="form-group">
					<label for="reg_password"><?php esc_html_e( 'Password', 'universh' ); ?> <span class="required">*</span></label>
                    <input type="password" class="form-control" name="password" id="reg_password" autocomplete="new-password" />
				</div>

			<?php endif; ?>

			<!-- Spam Trap -->
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php esc_html_e( 'Anti-spam', 'universh' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<div class="form-group">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<input type="submit" class="btn pull-right" name="register" value="<?php esc_attr_e( 'Register', 'universh' ); ?>" />
			</div>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>
        
        </div>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
