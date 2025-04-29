<?php
/*
  Plugin Name: Universh Shortcodes
  Plugin URI: http://gndev.info/Universh/
  Version: 1.0.1
  Author: WoodTheme
  Author URI: http://themeforest.net/user/woodtheme
  Description: Supercharge your WordPress theme with mega pack of shortcodes
  Text Domain: Universh
  Domain Path: /languages
  License: GPL
 */

// Define plugin constants
define( 'WT_PLUGIN_FILE', __FILE__ );
define( 'WT_PLUGIN_VERSION', '1.0.1' );
define( 'WT_ENABLE_CACHE', true );

// Includes
require_once 'inc/vendor/sunrise.php';
require_once 'inc/core/admin-views.php';
require_once 'inc/core/requirements.php';
require_once 'inc/core/load.php';
require_once 'inc/core/assets.php';
require_once 'inc/core/shortcodes.php';
require_once 'inc/core/tools.php';
require_once 'inc/core/data.php';
require_once 'inc/core/generator-views.php';
require_once 'inc/core/generator.php';
require_once 'inc/core/widget.php';
//require_once 'inc/core/vote.php';
require_once 'inc/core/counters.php';
require_once 'inc/pricing/pricing-post-type.php';
require_once 'inc/news/post-type.php';
require_once 'inc/gallery/post-type.php';
require_once 'inc/teacher/post-type.php';

function gallery_rewrite_flush() {
    universh_gallery_post_type();
	universh_teachers_post_type();
	universh_pricing_post_type();
	universh_news_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'gallery_rewrite_flush' );

function universh_new_contactmethods( $universh_contactmethods ) {
	// Add Twitter
	$universh_contactmethods['twitter'] = esc_html__('Twitter', 'universh');
	//add Facebook
	$universh_contactmethods['facebook'] = esc_html__('Facebook', 'universh');
	//add LinkedIn
	$universh_contactmethods['linkedin'] = esc_html__('LinkedIn', 'universh');
	//add GooglePlus
	$universh_contactmethods['googleplus'] = esc_html__('GooglePlus', 'universh');
	 
	return $universh_contactmethods;
}
add_filter('user_contactmethods','universh_new_contactmethods',10,1);

/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class Universh_Widget_Recent_Posts extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => esc_html__( "The most recent posts on your site", 'universh') );
        parent::__construct('recent-posts', esc_html__('Universh Recent Posts', 'universh'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';

    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo esc_html($cache[ $args['widget_id'] ]);
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'universh' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>
        <?php echo wp_kses($before_widget,array(
			'div' => array(
			  'id' => array(),
			  'class' => array()
			),
			'h5' => array(
				'class' => array(),
			),
			'span' => array(
				'class' => array()
			),
		  )); ?>
        <?php if ( $title ) echo wp_kses($before_title,array(
		'div' => array('class' => array()), 
		'h4' => array('class' => array()),
		'h5' => array('class' => array()),
		'span' => array('class' => array()),
		)
		) . esc_html($title) . wp_kses($after_title,array('div' => array(),'h4' => array(), 'h5' => array(), 'span' => array())); ?>
        <ul class="thumbnail-widget">
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
            <li>            	
            	<?php if( has_post_thumbnail() ): ?>
                <div class="thumb-wrap">
                    <?php universh_post_thumb( 120, 120 ); ?>
                </div><!-- end entry -->
                <?php endif; ?>                

                <div class="thumb-content">
                	<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>">
					<?php if ( get_the_title() ) the_title(); else the_ID(); ?>
                    </a>
            <?php if ( $show_date ) : ?>
            	<span><?php echo get_the_date(); ?></span>
                
            	<?php endif; ?>
            	</div>
            </li>
        <?php endwhile; ?>
        </ul>
        <?php echo wp_kses($after_widget,array(
			'div' => array(),
			'span' => array(),
			'h5' => array(),
		  )); ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'universh' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'universh' ); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
        <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?', 'universh' ); ?></label></p>
<?php
    }
	

}

class Universh_Widget_Recent_Course extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_course_entries', 'description' => esc_html__( "The most recent course on your site", 'universh') );
        parent::__construct('recent-course', esc_html__('Universh Recent Course', 'universh'), $widget_ops);
        $this->alt_option_name = 'widget_recent_course_entries';

    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_course', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo esc_html($cache[ $args['widget_id'] ]);
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Course', 'universh' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
        if ( ! $number )
            $number = 3;
		$show_price = isset( $instance['show_price'] ) ? $instance['show_price'] : false;
        $r = new WP_Query( apply_filters( 'widget_course_args', array( 'posts_per_page' => $number, 'post_type' => 'lp_course', 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>
        <?php echo wp_kses($before_widget,array(
			'div' => array(
			  'id' => array(),
			  'class' => array()
			),
		  )); ?>
        <?php if ( $title ) echo wp_kses($before_title,array(
		'div' => array('class' => array()), 
		'h4' => array('class' => array()),
		'h5' => array('class' => array()),
		'span' => array('class' => array()),
		)
		) . esc_html($title) . wp_kses($after_title,array('div' => array(),'h4' => array(), 'h5' => array(), 'span' => array())); ?>
        <ul class="thumbnail-widget">
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
            <li>            	
            	<?php if( has_post_thumbnail() ): ?>
                <div class="thumb-wrap">
                    <?php universh_post_thumb( 120, 120 ); ?>
                </div><!-- end entry -->
                <?php endif; ?>                

                <div class="thumb-content">
                	<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>">
					<?php if ( get_the_title() ) the_title(); else the_ID(); ?>
                    </a>
                    <?php if ( $show_price ) : ?>
                    <span><?php 
					$course = LP()->global['course'];
					if ( $price_html = $course->get_price_html() ): ?>
                        -<?php echo wp_kses($price_html, array('span'=>array('class'))); ?>                    
                    <?php else: ?>
                    <?php echo esc_html__('Free', 'universh'); ?>
					<?php endif; ?>
                    </span>                  
                    <?php endif; ?>
            	</div>
            </li>
        <?php endwhile; ?>
        </ul>
        <?php echo wp_kses($after_widget,array(
			'div' => array(),
		  )); ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_course', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_price'] = (bool) $new_instance['show_price'];

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_price = isset( $instance['show_price'] ) ? (bool) $instance['show_price'] : false;
?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'universh' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'universh' ); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_price ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_price' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_price' )); ?>" />
        <label for="<?php echo esc_attr($this->get_field_id( 'show_price' )); ?>"><?php esc_html_e( 'Display course price?', 'universh' ); ?></label></p>
<?php
    }
}

function universh_register_custom_widgets() {
    register_widget( 'Universh_Widget_Recent_Posts' );
	register_widget( 'Universh_Widget_Recent_Course' );
}
add_action( 'widgets_init', 'universh_register_custom_widgets' );
