<div class="wt-posts wt-posts-default-loop">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				?>

				<div id="wt-post-<?php the_ID(); ?>" class="wt-post">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="wt-post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					<?php endif; ?>
					<h2 class="wt-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="wt-post-meta"><?php _e( 'Posted', 'universh' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?></div>
					<div class="wt-post-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php comments_link(); ?>" class="wt-post-comments-link"><?php comments_number( __( '0 comments', 'universh' ), __( '1 comment', 'universh' ), '% comments' ); ?></a>
				</div>

				<?php
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'Posts not found', 'universh' ) . '</h4>';
		}
	?>
</div>