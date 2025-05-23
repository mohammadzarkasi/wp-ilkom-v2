<?php
/**
 * The template for displaying Search pages
 *
 * Used to display search results.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Universh
 * @since Universh 1.0
 */

get_header(); ?>

	<?php get_template_part( 'layout/before', '' ); ?>

		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;
				
				universh_posts_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>       
            
	<?php get_template_part( 'layout/after', '' ); ?>
    
<?php get_footer(); ?>