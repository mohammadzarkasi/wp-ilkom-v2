<ul class="row blog-list-container">
	<?php
    // Posts are found
    if ( $posts->have_posts() ) {
        while ( $posts->have_posts() ) {
            $posts->the_post();
            global $post;
    ?>
    <li class="col-xs-12 blog-list-wrap">
    <div class="row blog-wrap">
        <div class="col-sm-5">
            <div class="blog-img-wrap">
            	<?php universh_post_thumb( 600, 375 ); ?>
                <h6 class="post-type">&nbsp;<i class="fa fa-image"></i>&nbsp;</h6>
            </div><!-- Blog Image  Wrapper -->
        </div><!-- Blog Wrapper -->
        <!-- Blog Detail Wrapper -->
        <div class="col-sm-7">
            <div class="blog-details">
                <h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
                <ul class="blog-meta">
                    <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date('d. m. Y'); ?></li>
                    <li><i class="fa fa-comments"></i> <?php comments_number( "0", "1", "%" ) ?></li>
                    <li><i class="fa fa-heart"></i> <?php echo universh_getPostViews('ID'); ?></li>
                </ul><!-- Blog Meta -->
                <?php the_excerpt(); ?>
                <a class="btn" href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html__( 'Read More', 'universh' ); ?></a>
            </div><!-- Blog Detail Wrapper -->
        </div><!-- Blog Detail Column -->
    </div>
    <hr class="md">
    </li>
    <?php
        }
    }
    // Posts not found
    else {
    ?>
    <li><?php esc_html_e( 'Posts not found', 'universh' ) ?></li>
    <?php
    }
    ?>
</ul>