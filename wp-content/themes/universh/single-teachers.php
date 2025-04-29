<?php

/**
*single news template
 */

get_header(); ?>

<?php get_template_part( 'layout/before', '' ); ?>
	<div class="team-list row">        
		<?php
		if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				 ?>

				 <?php get_template_part( 'content', 'teachers' ); ?>

				<?php comments_template( '', true ); ?>

			<?php

			endwhile;

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;
		?>
        </div>
<?php get_template_part( 'layout/after', '' ); ?>
            
<?php get_footer(); ?>