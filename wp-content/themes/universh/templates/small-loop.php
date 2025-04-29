<div class="row">
<?php
	// Posts are found
	if ( $posts->have_posts() ) {
		$i = 0;
		while ( $posts->have_posts() ) :
			$posts->the_post();
			$column = $posts->data['column'];
			$col_num = 12/$column;
			global $post;
			?>
            
            <div class="teachers-column-<?php echo esc_attr($column); ?> col-sm-<?php echo esc_attr($col_num); ?>">
            	<div class="student-wrap">
                    <div class="student-img-wrap">
                    	<?php 
						if($column == '2'){
							$width = 600;
							$height = 574;
						} elseif($column == '3'){
							$width = 400;
							$height = 450;
						} else{
							$width = 150;
							$height = 150;
						}
						universh_post_thumb( $width, $height ); ?>
                    </div><!-- Image Wrapper -->
                    <div class="student-detail-wrap">
                        <h5 class="student-name"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h5>
                        <?php $teachers_desig = get_post_meta(get_the_ID(),'teachers_designation', true); ?>
                        <span><?php echo esc_html($teachers_desig); ?></span>
                    </div><!-- Detail Wrap -->
                </div>
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