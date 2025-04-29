<?php
/**
 * Template Name: Home Page Template
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
<?php get_header(); ?>

	<?php
	
    // Start the loop.
    while ( have_posts() ) : the_post();
	
	?>
		<div class="container">
        
        	<div class="row">
        
				<?php the_content(); ?>
            
            </div>
            
		</div>
        
    <?php
	
		// End the loop.
    endwhile;
	
    ?>
    
<?php get_footer(); ?>