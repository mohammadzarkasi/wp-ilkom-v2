<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

	<?php get_template_part( 'layout/before', '' ); ?>
		<div class="row">
        <?php $blog_layout_style = (function_exists('ot_get_option'))? ot_get_option('blog_layout_style') : 'style_1'; ?>
        <?php if($blog_layout_style == 'style_2'): ?>
        <div id="universh-timeline" class="universh-container">
        	<div class="universh-timeline-img"><span><?php echo date('Y'); ?></span></div>
        <?php endif; ?>
		<?php
			$i = 0;
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
					?>
                    <?php 
					if($blog_layout_style != 'style_2'):
					if($i%2 == 1):
					?>
					<hr class="lg hidden-xs">
					<?php
					endif;
					endif;
					$i++;
				endwhile;
				
				universh_posts_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>
        
        <?php if($blog_layout_style == 'style_2'): ?>
        </div>
        <?php endif; ?>
        
        </div>      
            
	<?php get_template_part( 'layout/after', '' ); ?>
    
<?php get_footer(); ?>