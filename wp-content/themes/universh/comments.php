<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to universh_comments() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Universh
 * @since Universh 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="post-comment"  class="post-block post-comments clearfix">

	<?php if ( have_comments() || comments_open() ) : ?>

	<?php if ( have_comments() ) : ?>
    
	<h4><?php printf( _nx( '(1) Comment', '(%2$s) %1$s', 'Comments' , get_comments_number(), 'universh' ), 'Comments' , number_format_i18n( get_comments_number() ) ); ?></h4>
    
    <div id="comments" class="comments-wrap">
    	
        <ul class="comments"><?php wp_list_comments( array( 'callback' => 'universh_comments', 'style' => 'ul', 'short_ping'  => true ) ); ?></ul><!-- .commentlist -->
   
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        
        <nav id="comment-nav-below" class="navigation" role="navigation">
        
            <h1 class="assistive-text section-heading"><?php esc_html_e( 'Comment navigation', 'universh' ); ?></h1>
            
            <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'universh' ) ); ?></div>
            
            <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'universh' ) ); ?></div>
            
        </nav>
        
        <?php endif; // check for comment navigation ?>
        
		<?php
        /* If there are no comments and comments are closed, let's leave a note.
         * But we only want the note on posts and pages that had comments in the first place.
         */
		 
        if ( ! comments_open() && get_comments_number() ) : ?>
        
        	<p class="nocomments"><?php esc_html_e( 'Comments are closed.' , 'universh' ); ?></p>
        
        <?php endif; ?>
        
    </div>
    
    <?php endif; // have_comments() ?>

	<?php if ( comments_open() ) : ?>
    
        <?php universh_comment_form(); ?>
        
    <?php endif; ?>
    
    <?php endif; ?>
    
</div>