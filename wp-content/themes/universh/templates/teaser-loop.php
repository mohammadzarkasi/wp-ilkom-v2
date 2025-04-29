<div class="wt-posts-loop wt-posts-teaser-loop-details row">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				$column = $posts->data['column'];
				$col_num = 12/$column;
				global $post;
				?>
                <div class="col-sm-<?php echo esc_attr($col_num); ?> col-default-loop-<?php echo esc_attr($column); ?>">
                    <div class="related-wrap">
                        <div class="img-wrap">
                            <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php universh_post_thumb( 400, 270 ); ?></a>
                        </div>
                        <div class="related-content">
                            <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>" class="anchor-plus">+</a>
                            <span><?php echo esc_html__('Read More', 'universh'); ?></span>
                            <h5 class="title"><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h5>
                        </div>
                    </div>
                </div>
				<?php
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . esc_html__( 'Posts not found', 'universh' ) . '</h4>';
		}
	?>
</div>