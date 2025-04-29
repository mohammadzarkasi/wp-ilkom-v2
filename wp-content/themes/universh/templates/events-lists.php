<ul class="event-lists-loop typo-dark">
<?php
	
	// Posts are found
	if ( $posts->have_posts() ) {
		while ( $posts->have_posts() ) :
			$posts->the_post();
			global $post;
			$event_id = get_the_ID();
			$venue_post_type = get_post_type_object( Tribe__Events__Main::VENUE_POST_TYPE );
			$do_venue_link = empty( $venue_post_type->exclude_from_search );
			$venue = tribe_get_venue_single_line_address( $event_id, $do_venue_link );
			?>
            <li class="col-xs-12 event-list-wrap">
                <!-- Event Wrapper -->
                <div class="row">
                    <!-- Event Image Wrapper -->
                    <div class="col-sm-5">
                        <div class="event-img-wrap">
                            <?php universh_post_thumb( 600, 400 ); ?>
                        </div>
                    </div><!-- Event Image Wrapper -->
                    <!-- Event Detail Wrapper -->
                    <div class="col-sm-7">
                        <div class="event-details">
                            <h4><a href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h4>
                            <ul class="events-meta">
                                <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date('d F - Y'); ?></li>
                                <li><i class="fa fa-map-marker"></i> <?php echo esc_html($venue); ?></li>
                            </ul><!-- Event Meta -->
                            <?php						
							$trimmed = wp_trim_words( get_the_content(), $num_words = 10, $more = null ); ?>
                        	<p><?php echo esc_html($trimmed); ?></p>
                            <a href="<?php esc_url(the_permalink()); ?>" class="btn"><?php echo esc_html__('I\'m Going', 'universh'); ?></a>
                        </div><!-- Event Meta -->
                    </div>	<!-- Event details -->
                </div><!-- Event detail Wrapper -->
                <!-- Divider -->
                <hr class="md"/>
            </li>
		<?php
		endwhile;
	}
	// Posts not found
	else { ?>
	<h4><?php echo esc_html__( 'Events not found', 'universh' ); ?></h4>
	<?php }
	?>