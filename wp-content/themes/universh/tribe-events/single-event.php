<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single row">
	<!-- Notices -->
	<?php tribe_the_notices() ?>
    <?php while ( have_posts() ) :  the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="col-md-8">
            <div class="event-img-wrap">
                <?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
            </div>
        </div><!-- Event Image Wrapper -->
        <div class="col-md-4">
            <div class="event-single-details">
                <?php the_title( '<h3 class="tribe-events-single-event-title">', '</h3>' ); ?>
                <?php if ( tribe_get_cost() ) : ?>
                    <span class="tribe-events-divider">|</span>
                    <span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
                <?php endif; ?>
                <ul class="events-meta">            	
                    <li><h5><i class="fa fa-calendar-o"></i><?php echo esc_html__('Timing', 'universh'); ?></h5> 
                    <?php echo tribe_events_event_schedule_details( $event_id, '', '' ); ?></li>
                </ul>
                <!-- Event Count -->
                <div class="row count-container">
                	<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
                </div><!-- Row -->
            </div><!-- Event Single Detail -->
        </div>
        <!-- Divider -->
        <hr class="md">
        
        <div class="col-md-12">
            <?php the_content(); ?>
            <?php //do_action( 'tribe_events_single_event_after_the_content' ) ?>    
            <!-- Event meta -->
            <?php //do_action( 'tribe_events_single_event_before_the_meta' ) ?>
            <?php //tribe_get_template_part( 'modules/meta' ); ?>
            
            <?php
			$terms =  array();
    		$postid = get_the_ID();
			$terms = wp_get_post_terms( $postid, 'post_tag' , array('fields' => 'slugs') );
			if( !empty($terms) ):
			$sticky = get_option( 'sticky_posts' );
			$sticky[] = $postid;
			$args = array(
			'post__not_in' => $sticky,
			'posts_per_page' => 3,
			'post_type'	=> 'tribe_events',
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
            <h4 class="title-sm"><?php echo esc_html__('Related Events : ', 'universh'); ?></h4>
            <div class="owl-carousel releted-events-single" data-animatein="" data-animateout="" data-items="1" data-margin="30" data-loop="true" data-merge="true" data-nav="true" data-dots="false" data-stagepadding="" data-mobile="1" data-tablet="2" data-desktopsmall="3"  data-desktop="3" data-autoplay="true" data-delay="3000" data-navigation="true">
            <?php
			while ( $query->have_posts() ) : $query->the_post();
			?>               
                <div class="item">
                    <!-- Related Wrapper -->
                    <div class="related-wrap">
                        <!-- Related Image Wrapper -->
                        <div class="img-wrap">
                            <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php universh_post_thumb( 400, 270 ); ?></a>
                        </div>
                        <!-- Related Content Wrapper -->
                        <div class="related-content">
                        	<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>" class="anchor-plus">+</a>
                            <span><?php echo esc_html__('Read More', 'universh'); ?></span>
                            <h5 class="title"><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_title(); ?></a></h5>
                        </div><!-- Related Content Wrapper -->
                    </div><!-- Related Wrapper -->
                </div><!-- Item -->
            <?php 
			endwhile;?>
			</div>
			<?php endif; ?>
			<?php
			wp_reset_postdata();
			endif;
			?>
        </div>	
        
        
        <?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
        <?php endwhile; ?>
    
        <!-- Event footer -->
        <div id="tribe-events-footer">
            <!-- Navigation -->
            <h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'universh' ), $events_label_singular ); ?></h3>
            <ul class="tribe-events-sub-nav">
                <li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
                <li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
            </ul>
            <!-- .tribe-events-sub-nav -->
        </div>
        <!-- #tribe-events-footer -->    
    </div>

</div><!-- #tribe-events-content -->
