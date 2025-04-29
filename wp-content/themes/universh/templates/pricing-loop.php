<div class="ts-pricing row pricing-tables">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
			$column = $posts->data['column'];
			$col_num = 12/$column;
				$posts->the_post();
				global $post;
				?>
                <div class="pricing-column-<?php echo esc_attr($column); ?> col-sm-<?php echo esc_attr($col_num); ?>">
					<!-- Pricing Wrapper -->
					<div class="pricing-wrap">
						<!-- Pricing Header -->
						<div class="pricing-header">
							<div class="pricing-icon">
                            	<?php universh_post_thumb( 100, 100 ); ?>
							</div><!-- Pricing Icon -->
							<!-- Pricing Title -->
							<div class="pricing-title">
                            	<?php 
								$text = get_the_title();
								$text = explode(' ',$text);
								$text[0] = '<span class="color">'.$text[0].'</span>';
								$text = implode(' ',$text);								
								?>
								<h4><?php echo wp_kses($text, array('span' => array('class' => array()) )); ?></h4>
								<span><?php the_content(); ?></span>
							</div>
						</div><!-- Pricing Header -->
						<!-- Pricing Content -->
						<ul class="pricing-body">
                        	<?php
							$feature_info = get_post_meta( get_the_ID(), 'feature_info', true );
							if(!empty($feature_info)):
								foreach( $feature_info as $value ):
								?>
									<li><?php echo esc_html($value['title']); ?><span class="duration"><?php echo esc_html($value['feature_text']); ?></span></li>
								<?php
								endforeach;
							endif;
							?>
						</ul><!-- Pricing Content -->
						<!-- Pricing Footer (Book Button) -->
						<div class="pricing-footer">
                        	<?php 
							$button_link = get_post_meta( get_the_ID(), 'button_link', true );
							$button_text = get_post_meta( get_the_ID(), 'button_text', true );
							?>
                            <a href="<?php echo esc_url($button_link); ?>" class="btn btn-block"><?php echo esc_html($button_text); ?></a>
						</div><!-- Pricing Footer -->
					</div><!-- Pricing Wrapper -->
				</div>
				<?php
			endwhile;
		}
		// Posts not found
		else {
			echo '<h3>' . esc_html__( 'Pricing not found', 'universh' ) . '</h3>';
		}
	?>
</div>