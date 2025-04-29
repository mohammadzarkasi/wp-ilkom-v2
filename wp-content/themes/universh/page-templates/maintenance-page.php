<?php
/**
 * Template Name: Maintenance Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in prestige consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Universh
 * @since Universh 1.0
 */
?>
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
	<div class="main relative bg-img bg-cover overlay bg-color heavy" data-background="<?php echo UNIVERSHTHEMEURI; ?>/images/bg-04.jpg"  data-stellar-background-ratio="0.5">
	<!-- Section -->
	<div class="page-default typo-dark">
		<!-- Container -->
		<div class="container">
			<!-- Row -->
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="template-box box-comingsoon parent-has-overlay">
						<!-- Page Template Logo -->
						<div class="logo-wrap">
                        	<?php $logo = (function_exists('ot_get_option'))? ot_get_option( 'main_logo', UNIVERSHTHEMEURI. 'images/logo.png' ) : UNIVERSHTHEMEURI. 'images/logo.png'; ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="logo">
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="211" height="40" data-sticky-width="150" data-sticky-height="28" />
                                <p class="slogan"><?php bloginfo('description'); ?></p>
                            </a>
						</div><!-- Page Template Logo -->
                        
                        <?php
						// Start the loop.
						while ( have_posts() ) : the_post();
							the_content();
						endwhile;
						?>
					</ul>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->	
	</div><!-- Page Default -->
</div>
</div>  
    <!-- END SITE -->
 	<?php wp_footer(); ?>
 </body>
</html>