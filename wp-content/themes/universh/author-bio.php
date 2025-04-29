<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Universh
 * @since Universh 1.0
 */
 
?>
<div class="content">
    <div class="authorbox">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="post-padding clearfix">
                    <div class="avatar-author">
                    	<?php 
						$author_bio_avatar_size = apply_filters( 'universh_author_bio_avatar_size', 65 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size, null, null, array( 'class' => array( 'img-responsive' ) ) );
						?>
                    </div>
                    <div class="author-title desc">
                        <h4><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></h4>
                        <?php if(get_the_author_meta('url') != ''): ?>
                        <a class="authorlink" href="<?php echo esc_url(get_the_author_meta('url')); ?>"><?php echo get_the_author_meta('url'); ?></a>
                        <?php endif; ?>
                        <p><?php the_author_meta( 'description' ); ?></p>
                        <ul class="list-inline social-small">
                        	<?php if(get_the_author_meta('facebook') != ''): ?>
                            <li><a href="<?php echo esc_url(get_the_author_meta('facebook')); ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if(get_the_author_meta('twitter') != ''): ?>
                            <li><a href="<?php echo esc_url(get_the_author_meta('twitter')); ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if(get_the_author_meta('googleplus') != ''): ?>
                            <li><a href="<?php echo esc_url(get_the_author_meta('googleplus')); ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                            <?php if(get_the_author_meta('linkedin') != ''): ?>
                            <li><a href="<?php echo esc_url(get_the_author_meta('linkedin')); ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end authorbox -->
</div><!-- end content -->