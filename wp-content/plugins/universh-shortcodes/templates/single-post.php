<div class="wt-posts wt-posts-single-post">
	<?php
		// Prepare marker to show only one post
		$first = true;
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;

				// Show oly first post
				if ( $first ) {
					$first = false;
					?>
					<div id="wt-post-<?php the_ID(); ?>" class="wt-post">
						<h1 class="wt-post-title"><?php the_title(); ?></h1>
						<div class="wt-post-meta"><?php _e( 'Posted', 'universh' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?> | <a href="<?php comments_link(); ?>" class="wt-post-comments-link"><?php comments_number( __( '0 comments', 'universh' ), __( '1 comment', 'universh' ), __( '%n comments', 'universh' ) ); ?></a></div>
						<div class="wt-post-content">
							<?php the_content(); ?>
						</div>
					</div>
					<?php
				}
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'Posts not found', 'universh' ) . '</h4>';
		}
	?>
</div>