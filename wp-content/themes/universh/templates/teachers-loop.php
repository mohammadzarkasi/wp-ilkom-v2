<?php $border_style = $posts->data['border_style']; ?>
<div class="row <?php echo esc_attr($border_style); ?>">
<?php
	// Posts are found
	if ( $posts->have_posts() ) {
		$i = 0;
		while ( $posts->have_posts() ) :
			$posts->the_post();
			$column = $posts->data['column'];
			$col_num = 12/$column;
			$background_style = $posts->data['background_style'];
			$text_align = $posts->data['text_align'];
			$text_style = $posts->data['text_style'];
			$social_style = $posts->data['social_style'];
			global $post;
			?>
            <div class="teachers-column-<?php echo esc_attr($column); ?> col-sm-<?php echo esc_attr($col_num); ?>">
                <!-- Member Wrap -->
                <div class="member-wrap">
                    <!-- Member Image Wrap -->
                    <div class="member-img-wrap">
                    	<?php 
						if($border_style == 'border-style'){
							$width = 524;
							$height = 574;
						} else{
							$width = 600;
							$height = 800;
						}
						universh_post_thumb( $width, $height ); ?>
                    </div>
                    <!-- Member detail Wrapper -->
                    <div class="member-detail-wrap <?php echo esc_attr($background_style); ?> <?php echo esc_attr($text_align); ?> <?php echo esc_attr($text_style); ?>">
                    	<?php $teachers_desig = get_post_meta(get_the_ID(),'teachers_designation', true); ?>
                        <h5 class="member-name"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h5>
                        <span><?php echo esc_html($teachers_desig); ?></span>
                        <?php $short_description = get_post_meta(get_the_ID(),'short_description', true); ?>
                        <?php $trimmed = wp_trim_words( $short_description, $num_words = 15, $more = null ); ?>
                        <p><?php echo esc_html($trimmed); ?></p>
                        <?php					
						$social_array = get_post_meta( get_the_ID(), 'teachers_social_links', true );
						if( !empty($social_array) ): ?>
						<ul class="social-icons <?php echo esc_attr($social_style); ?>">
							<?php foreach ($social_array as $key => $value): ?>
								<li class="<?php echo esc_attr($value['class']); ?>">
								
									<a title="<?php echo esc_attr($value['title']); ?>" target="_blank" href="<?php echo esc_url($value['link']); ?>">

										<?php echo esc_html($value['title']); ?>

									</a>

								</li>
							<?php endforeach; ?>			
						</ul>
						<?php
						endif; 
						?>
                    </div><!-- Member detail Wrapper -->
                </div><!-- Member Wrap -->
            </div>
		<?php
		endwhile;
	}
	// Posts not found
	else {
	echo '<h4>' . esc_html__( 'Teachers not found', 'universh' ) . '</h4>';
	}
	?>
</div>