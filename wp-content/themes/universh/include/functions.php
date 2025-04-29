<?php
require UNIVERSHTHEMEDIR . '/include/custom-menu/custom-menu.php';
require UNIVERSHTHEMEDIR . '/include/woo_functions.php';
if(class_exists( 'LearnPress' )){
	require UNIVERSHTHEMEDIR . '/include/learnpress_functions.php';
}

function universh_excerpt_more( $more ) {
		return '<a class="read-more" href="' . esc_url(get_permalink( get_the_ID() ) ) . '">' . esc_html__('...', 'universh' ) . '</a>';
} // end universh_excerpt_more function

add_filter( 'excerpt_more', 'universh_excerpt_more' );

function universh_excerpt_length( $length ) {
	$length = (function_exists('ot_get_option'))? ot_get_option("excerpt_length", 20) : 20;
	if( $length!= ''){
		return $length;
	} else{
	return 20;
	}	
} // end universh_excerpt_length function

add_filter( 'excerpt_length', 'universh_excerpt_length', 999 );

if ( ! function_exists( 'universh_comment_form' ) ) :
// universh comments form
function universh_comment_form( $args = array(), $post_id = null ) {
	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5' === $args['format'];

	$comments_field = '<div class="form-group">
	<textarea id="comment" name="comment" aria-required="true" rows="8" class="form-control" placeholder="'. esc_html__('Comment', 'universh') .'"></textarea></div>';
	
	$fields   =  array(
		'author' => '<div class="form-group">
		<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' class="form-control" placeholder="'. esc_html__('Name', 'universh') .'" /></div>',
		
		'email'  => '<div class="form-group">
		<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . $aria_req . ' class="form-control" placeholder="'. esc_html__('Email', 'universh') .'" /></div>',
		
		'url' => '<div class="form-group">
		<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" class="form-control" placeholder="'. esc_html__('Website', 'universh') .'" /></div>',
	);
	
	$defaults = array(
		'fields'               => apply_filters( 'universh_comment_form_default_fields', $fields ),
		
		'comment_field'        => $comments_field,
		
		'must_log_in'          => '<p class="must-log-in">' . sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'universh' ), array('a' => array(
					  'href' => array()),)) , wp_login_url( apply_filters( 'universh_the_permalink', esc_url(get_permalink( $post_id ) ) ) ) ) . '</p>',
		
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out?</a>', 'universh' ), array('a' => array('href' => array()),)) , esc_url(get_edit_user_link()), esc_html($user_identity), wp_logout_url( apply_filters( 'universh_the_permalink', esc_url(get_permalink( $post_id ) ) ) ) ) . '</p>',
		
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => esc_html__( 'Post a comment', 'universh' ),
		'title_reply_to'       => esc_html__( 'Post a comment to %s', 'universh' ),
		'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'universh' ),
		'label_submit'         => esc_html__( 'Submit', 'universh' ),
		'format'               => 'xhtml',
	);

	$args = wp_parse_args( $args, apply_filters( 'universh_comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<h4><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?>
			<?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></h4>
			<div class="commentform" id="respond">
			<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
				<?php echo wp_kses($args['must_log_in'],array(
					'a' => array(
					  'title' => array(),
					  'href' => array(),
					  'class' => array()
					),
					'span' => array(
					  'class' => array(),
					),
				  )); ?>
					<?php do_action( 'universh_comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo esc_url(site_url( '/wp-comments-post.php' )); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>"<?php echo esc_attr($html5) ? ' novalidate' : ''; ?>>
                    <div class="row">
                    	<div class="col-sm-8">
						<?php if ( is_user_logged_in() ) : ?>
                            <?php echo apply_filters( 'universh_comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
                        <?php endif; ?>
						
					<?php if ( is_user_logged_in() ) : ?>
                    <?php echo apply_filters( 'universh_comment_form_field_comment', $args['comment_field'] ); ?>
						<?php else : ?>
                            <?php
							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "universh_comment_form_field_{$name}", $field ) . "\n";
							}
							?>
                            <?php echo apply_filters( 'universh_comment_form_field_comment', $args['comment_field'] ); ?>
						<?php endif; ?>                        
						<input class="btn" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
                        <?php comment_id_fields( $post_id ); ?>
						<?php do_action( 'universh_comment_form', $post_id ); ?>
                        </div>
                    </div>
					</form>
				<?php endif; ?>
			</div><!--.widget-->
		<?php else : ?>
			<?php do_action( 'universh_comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
} // end universh_comment_form function
endif;

function universh_body_class( $classes ) {

	$classes[] = (function_exists('ot_get_option'))? ot_get_option( 'background_option_style', 'default' ) : 'default';
	if(is_page()){
		$layout = get_post_meta( get_the_ID(), 'page_layout', true );
		if($layout != ''){
			$layout = $layout;
		} else {
			$layout = 'rs';
		}
	}
	elseif(is_single()){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_layout', 'rs' ) : 'rs';
	}
	else{
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'blog_layout', 'rs' ) : 'rs';
	}
	
	if ( class_exists( 'woocommerce' ) ){
		if( is_product() ){
			$layout = (function_exists('ot_get_option'))? ot_get_option('product_layout', 'full') : 'full';
		}
		elseif( is_woocommerce() ){
			$layout = (function_exists('ot_get_option'))? ot_get_option('shop_layout', 'full') : 'full';
		}
	}	
	
	$classes[] = 'layout-'.$layout;

	return $classes;
}
add_filter( 'body_class', 'universh_body_class' );

 if ( ! function_exists( 'universh_comments' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own universh_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function universh_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment">
		<p><?php esc_html_e( 'Pingback:', 'universh' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'universh' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class('comment-list'); ?> id="li-comment-<?php comment_ID(); ?>">
    	<div class="comment">
    	<div class="img-thumbnail">
            <a href="<?php echo esc_url(get_comment_author_link()); ?>"><?php echo get_avatar( $comment, 80 ); ?></a>
        </div>
        <div class="comment-block">
        	<div class="comment-arrow"></div>
            <span class="comment-by">
            <strong><?php printf( '%1$s %2$s', get_comment_author_link(), ( $comment->user_id === $post->post_author ) ? '' : ''); ?></strong>
            <?php edit_comment_link( esc_html__( 'Edit', 'universh' ), '<span class="pull-right">', '</span>' ); ?></span>
            <span class="pull-right">
            	<span>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'universh' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
            </span>
            <p><?php comment_text(); ?></p>
            <span class="date pull-right"><?php printf( '%3$s', esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ), sprintf( esc_html__( '%1$s at %2$s', 'universh' ), get_comment_date(), get_comment_time() ));
				?></span>
             <?php if ( '0' == $comment->comment_approved ) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'universh' ); ?></p>
                <?php endif; ?>
         </div>
         						
	<?php
		break;
		?>
        </div>
        <?php
	endswitch; // end comment_type check
} // end universh_comments function
endif;


function universh_default_header_menu(){
	$html = '';
	$html .='<ul class="nav nav-pills nav-main" id="mainMenu">
			 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1 current-menu-item">
			 <a href="' .esc_url( home_url('/') ). 'wp-admin/nav-menus.php" target="_blank">' . esc_html__('menu settings', 'universh'). '</a></li>
             </ul>';
   echo wp_kses($html,array(
		'ul' => array(
		  'class' => array(),
		  'id' => array(),
		),
		'li' => array(
		  'class' => array(),
		),
		'a' => array(
		  'class' => array(),
		  'href' => array(),
		  'target' => array(),
		),
	  ));
} // end universh_default_header_menu function

function universh_default_footer_menu(){
	$html = '';
	$html .='<ul class="footer-links" id="univershFooterMenu">
			 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1 current-menu-item">
			 <a href="' .esc_url( home_url('/') ). 'wp-admin/nav-menus.php" target="_blank">' . esc_html__('menu settings', 'universh'). '</a></li>
             </ul>';
   echo wp_kses($html,array(
		'ul' => array(
		  'class' => array(),
		  'id' => array(),
		),
		'li' => array(
		  'class' => array(),
		),
		'a' => array(
		  'class' => array(),
		  'href' => array(),
		  'target' => array(),
		),
	  ));
} // end universh_default_header_menu function

function universh_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'universh_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'universh_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so universh_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so universh_categorized_blog should return false.
		return false;
	}
} // end universh_categorized_blog function

if ( ! function_exists( 'universh_category_transient_flusher' ) ) :
function universh_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'universh_categories' );
} // end universh_category_transient_flusher function
endif;

add_action( 'edit_category', 'universh_category_transient_flusher' );
add_action( 'save_post',     'universh_category_transient_flusher' );

if ( ! function_exists( 'universh_fonts_url' ) ) :
function universh_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	
	if ( 'off' !== _x( 'on', 'Roboto Slab Font: on or off', 'universh' ) ) {
		$fonts[] = 'Roboto Slab: 100,300,400,700';
	}
	
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'universh' ) ) {
		$fonts[] = 'Roboto: 100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic';
	}
	
	if ( 'off' !== _x( 'on', 'Droid Serif font: on or off', 'universh' ) ) {
		$fonts[] = 'Droid Serif: 400,700italic,700,400italic';
	}
	
	if ( 'off' !== _x( 'on', 'Ubuntu font: on or off', 'universh' ) ) {
		$fonts[] = 'Ubuntu: 400,700italic,700,500italic,500,400italic,300italic,300';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) )
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
} // end universh_fonts_url function
endif;

if ( ! function_exists( 'universh_mce_css' ) ) :
function universh_mce_css( $mce_css ) {
	$fonts_url = universh_fonts_url();

	if ( empty( $fonts_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $fonts_url ) );

	return $mce_css;
} // end universh_mce_css function
endif;

add_filter( 'mce_css', 'universh_mce_css' );

if ( ! function_exists( 'universh_fix_gallery' ) ) :
function universh_fix_gallery($output, $attr) {
    global $post;

    static $instance = 0;
    $instance++;
    $size_class = '';

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'div',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => '',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        /**
         * this is the css you want to remove
         *  #1 in question
         */
        /*
        */
    $size_class = ($size != '' )?sanitize_html_class( $size ) : 'normal';
    $gallery_div = '<div class="blog-gallery row">';
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$width = round(1250/$columns);
	$height = round(1250/$columns);
	
	$col_class = intval(12/$columns);
	
	foreach ( $attachments as $id => $attachment ) {

        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		 $image_url = wp_get_attachment_url($id, $size, false, false);
		 $attatchement_image = universh_image_resize( $image_url, $width, $height, true, false, false );
        
		$output .= '<div class="single-gallery col-md-'.esc_attr($col_class).'"><img src="' . esc_url($image_url) . '" alt="'.esc_attr__('images thumbnail', 'universh').'" /></div>';
    }
    $output .= '</div>';
    return $output;
} // end universh_fix_gallery function
endif;

add_filter("post_gallery", "universh_fix_gallery",10,2);


if ( ! function_exists( 'universh_posts_nav' ) ) :
function universh_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 ) {

	} else {
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav class="clearfix nav-pagination"><ul class="pagination">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&laquo;' ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? 'list-nav current' : 'list-nav';

		printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", esc_attr($class), esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>&hellip;</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? 'list-nav current' : 'list-nav';
		printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", esc_attr($class), esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li><span>&hellip;</span></li>' . "\n";

		$class = $paged == $max ? 'list-nav current' : 'list-nav';
		printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", esc_attr($class), esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link( '&raquo;' ) );

	echo '</ul></nav>' . "\n";

} // end universh_posts_nav function
}
endif;

function universh_next_prev_posts() {
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	?>
    <nav>
        <ul class="pager">
        	<?php if (!empty( $prev_post )): ?>
        	<li class="previous"><a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"> <span aria-hidden="true">&larr;</span> <?php echo esc_html__('Older', 'universh'); ?></a></li>
            <?php endif; ?>
            <?php if (!empty( $next_post )): ?>
            <li class="next"><a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html__('Newer', 'universh'); ?><span aria-hidden="true">&rarr;</span></a></li>
            <?php endif; ?>
        </ul>
    </nav><!-- Pager -->
    <?php
}

function universh_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function universh_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function universh_social_share(){
	global $post;
	$blog_layout_style = (function_exists('ot_get_option'))? ot_get_option('blog_layout_style') : 'style_1';
	$social_class = '';
	$hidden_style = '';
	$anchor_class = ' btn btn-primary';
	if($blog_layout_style == 'style_2'){
		$social_class = ' social-small';
		$anchor_class = '';
		$hidden_style = ' hidden-style-2';
	}
	
	?>
    <div class="post-sharing">
        <ul class="list-inline<?php echo esc_attr($social_class); ?>">
            <li><a href="//www.facebook.com/share.php?u=<?php print(urlencode(the_permalink())); ?>&title=<?php print(urlencode(get_the_title())); ?>" title="<?php esc_attr_e('Share on Facebook', 'universh')?>" class="fb-button<?php echo esc_attr($anchor_class); ?>"><i class="fa fa-facebook"></i> <span class="hidden-xs<?php echo esc_attr($hidden_style); ?>"><?php esc_html_e('Share on Facebook', 'universh')?></span></a></li>
            
            <li><a href="http://twitter.com/home?status=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>:<?php the_permalink(); ?>" title="<?php esc_attr_e('Tweet on Twitter', 'universh')?>" class="tw-button<?php echo esc_attr($anchor_class); ?>"><i class="fa fa-twitter"></i> <span class="hidden-xs<?php echo esc_attr($hidden_style); ?>"><?php esc_html_e('Tweet on Twitter', 'universh')?></span></a></li>
            <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="<?php esc_attr_e('Share on Google Plus', 'universh')?>" class="gp-button<?php echo esc_attr($anchor_class); ?>"><i class="fa fa-google-plus"></i></a></li>
        </ul>
    </div><!-- end post-sharing -->
	<?php
}

//related posts shows in single post
function universh_related_posts() {
	global $post;
	
	$terms =  array();
    $postid = get_the_ID();
	$terms = wp_get_post_terms( $postid, 'post_tag' , array('fields' => 'slugs') );
	$show_related_post = (function_exists('ot_get_option'))? ot_get_option('show_related_post', 'on') : 'on';
	
	if( !empty($terms) && ( $show_related_post == 'on') ):
	
	$sticky = get_option( 'sticky_posts' );
	$sticky[] = $postid;
	
	$args = array(
	'post__not_in' => $sticky,
	'posts_per_page' => (function_exists('ot_get_option'))? ot_get_option('total_related_post_show' , 3) : '',
	'tax_query' => array(
		array(
			'taxonomy' => 'post_tag',
			'field' => 'slug',
			'terms' => $terms
		))
	);
	$query = new WP_Query( $args );
	?>
	<?php if ( $query->have_posts() ): ?>
    <h4><?php echo esc_html__('Related Post :', 'universh'); ?></h4>
    <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="30" data-loop="true" data-items="1" data-mobile="1" data-tablet="3" data-desktopsmall="3" data-desktop="3">
    <?php
    while ( $query->have_posts() ) :$query->the_post();
    ?>
    
    	<div class="item">
        	<div class="related-wrap">
            	<div class="img-wrap">
                	<?php if(has_post_thumbnail()): ?>
            		<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php universh_post_thumb( 370, 220 ); ?></a>
                    <?php endif; ?>
                </div>
                <div class="related-content">
                	<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>" class="anchor-plus">+</a>
                    <span><?php echo esc_html__('Read More', 'universh'); ?></span>
					<h5 class="title"><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h5>
                </div>
            </div>
    	</div>
    <?php 
    endwhile;?>
    </div>
    <?php endif; ?>
    <?php
	wp_reset_postdata();
	endif;
}

//related news shows in single post
function universh_related_news() {
	global $post;
	
	$terms =  array();
    $postid = get_the_ID();
	$terms = wp_get_post_terms( $postid, 'news_category' , array('fields' => 'slugs') );
	
	if( !empty($terms) ):
	
	$args = array(
	'post__not_in'	  => array($postid),
	'posts_per_page' => 3,
	'tax_query' => array(
		array(
			'taxonomy' => 'news_category',
			'field' => 'slug',
			'terms' => $terms
		))
	);
	$query = new WP_Query( $args );
	?>
    <?php if ( $query->have_posts() ): ?>
    <h4 class="title-simple"><?php esc_html_e('Read Related Article :', 'universh'); ?></h4>
    
    <div class="owl-carousel" data-animatein="zoomIn" data-animateout="slideOutDown" data-margin="30" data-stagepadding="" data-loop="true" data-merge="true" data-nav="true"data-dots="false" data-items="1" data-mobile="1" data-tablet="2" data-desktopsmall="2" data-desktop="3" data-autoplay="true" data-delay="3000" data-navigation="true">
    	<?php while ( $query->have_posts() ) :$query->the_post(); ?>						
        <div class="item">
            <!-- Related Wrapper -->
            <div class="related-wrap">
                <!-- Related Image Wrapper -->
                <div class="img-wrap">
                	<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php universh_post_thumb( 500, 440 ); ?></a>
                </div>
                <!-- Related Content Wrapper -->
                <div class="related-content">
                    <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr__('Read More', 'universh'); ?>" class="anchor-plus">+</a><span><?php echo esc_html__('Read More', 'universh'); ?></span>
                    <h5 class="title"><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h5>
                </div><!-- Related Content Wrapper -->
            </div><!-- Related Wrapper -->
        </div><!-- Item -->
        <?php endwhile; ?>
	</div>				
    <?php endif; ?>
    <?php
	wp_reset_postdata();
	endif;
}

function universh_ajax_login_init(){

    wp_register_script('universh-ajax-login-script', get_template_directory_uri() . '/js/ajax-login-script.js', array('jquery') ); 
    wp_enqueue_script('universh-ajax-login-script');

    wp_localize_script( 'universh-ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
        'redirecturl' => esc_url(home_url('/')),
        'loadingmessage' => esc_html__('Sending user info, please wait...', 'universh')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'universh_ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'universh_ajax_login_init');
}

function universh_ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>esc_html__('Wrong username or password.', 'universh')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>esc_html__('Login successful, redirecting...', 'universh')));
    }
    die();
}

function universh_menu_select(){	
	$result = array();
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) ); 

	foreach ( $menus as $value ) {	
		$array1 = array('value' => $value->name, 'label' => $value->name);		
		$result[] = $array1;
	}
    return $result;
}