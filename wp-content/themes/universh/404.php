<?php
/**
 * The Header for multipage of theme
 *
 * Displays all of the <head> section and everything up till </header>
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Page Loader -->
    <div id="pageloader">
        <div class="loader-inner">
        	<?php $preloder = (function_exists('ot_get_option'))? ot_get_option( 'preloder', UNIVERSHTHEMEURI. 'images/preloader.gif' ) : UNIVERSHTHEMEURI. 'images/preloader.gif'; ?>
            <img src="<?php echo esc_url($preloder); ?>" alt="<?php esc_attr_e('preloder', 'universh'); ?>">
        </div>
    </div><!-- Page Loader -->
    <!-- Page Main -->
<div class="main relative full-screen bg-img bg-cover overlay bg-color heavy" data-background="<?php echo UNIVERSHTHEMEURI. 'images/bg-04.jpg'; ?>"  data-stellar-background-ratio="0.5">
	<!-- Section -->
	<div class="page-default typo-dark">
		<!-- Container -->
		<div class="container">
			<!-- Row -->
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<ul class="template-box box-404 parent-has-overlay">
						<!-- Page Template Logo -->
						<li class="logo-wrap">
                        	<?php $logo = (function_exists('ot_get_option'))? ot_get_option( 'main_logo', UNIVERSHTHEMEURI. 'images/logo.png' ) : UNIVERSHTHEMEURI. 'images/logo.png'; ?>
                            <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="211" height="40" class="img-responsive" />
                                <p class="slogan"><?php esc_html_e('404 - Page not found', 'universh'); ?></p>
                            </a>
						</li><!-- Page Template Logo -->
						<!-- Page Template Content -->
						<li class="template-content text-center">
							<h1><?php esc_html_e('Oops,', 'universh'); ?></h1>
							<p><?php esc_html_e('We Cannot find the page you are looking for. But Do not Worry. Here are a couple of helpful links', 'universh'); ?></p>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn"><?php esc_html_e('Back to home', 'universh'); ?></a>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn"><?php esc_html_e('View Sitemap', 'universh'); ?></a>
						</li><!-- Page Template Content -->
					</ul>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->	
	</div><!-- Page Default -->
</div><!-- Page Main -->
<?php wp_footer(); ?>
  
</body>

</html>