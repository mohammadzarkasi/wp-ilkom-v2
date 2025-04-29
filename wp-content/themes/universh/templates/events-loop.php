<?php
	
	// Posts are found
	if ( $posts->have_posts() ) {
		$j = 1;
		while ( $posts->have_posts() ) :
			$posts->the_post();
			$column = $posts->data['column'];
			$col_num = 12/$column;
			global $post;
			$event_id = get_the_ID();
			$venue_post_type = get_post_type_object( Tribe__Events__Main::VENUE_POST_TYPE );
			$do_venue_link = empty( $venue_post_type->exclude_from_search );
			$venue = tribe_get_venue_single_line_address( $event_id, $do_venue_link );
			?>
            <div class="events-column-<?php echo esc_attr($column); ?> col-sm-<?php echo esc_attr($col_num); ?>">
                <!-- News Wrapper -->
                <div class="event-wrap typo-dark">
                	<div class="event-img-wrap">
                		<?php
						if($column == '2'){
							$width = 600;
							$height = 400;
						} else{
							$width = 400;
							$height = 270;
						}
						universh_post_thumb( $width, $height ); ?>
                    </div>
                    <div class="event-details">
                        <h5><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h5>
                        <ul class="events-meta">
                            <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date('d F - Y'); ?></li>
                            <li><i class="fa fa-map-marker"></i><?php echo esc_html($venue); ?></li>
                        </ul>
                        <?php						
						$trimmed = wp_trim_words( get_the_content(), $num_words = 10, $more = null ); ?>
                        <p><?php echo esc_html($trimmed); ?></p>
                        <a href="<?php esc_url(the_permalink()); ?>" class="btn"><?php echo esc_html__('I\'m Going', 'universh'); ?></a>
                    </div>
                </div><!-- News Wrapper -->
            </div>
            
            <?php if($j == $column): 
			$j = 0;
			?>
            <hr class="lg hidden-767 events-lg">
            <?php endif; ?>
            
		<?php
		$j++;
		endwhile;
	}
	// Posts not found
	else { ?>
	<h4><?php echo esc_html__( 'Events not found', 'universh' ); ?></h4>
	<?php }
	?>