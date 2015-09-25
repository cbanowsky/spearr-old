<?php
/*
 * Plugin Name: Most Viewed Posts
 * Plugin URI: http://favethemes.com/
 * Description: A widget that shows most viewed posts
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 */
 
class unpress_most_viewed extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'unpress_most_viewed', // Base ID
			__( 'UnPress: Most Viewed', 'favethemes' ), // Name
			array( 'description' => __( 'Show most viewed posts, interviews, videos, galleries', 'favethemes' ), ) // Args
		);
		
	}

	
	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$items_num = $instance['items_num'];
		$viewed_post_type = $instance['viewed_post_type'];
		$show_viewed_image = isset($instance['show_viewed_image']) ? 'true' : 'false';
		
		echo $before_widget;
			
			
			if ( $title ) echo $before_title . $title . $after_title;
            ?>
            
            <?php
			/** 
			 * Latest Posts
			**/
			global $post;
			$unpress_most_viewed = new WP_Query(
				array(
					'post_type' => array( $viewed_post_type ),
					'meta_key' => 'fave-post_views',
					'orderby' => 'meta_value_num',
					'order' => 'DESC',
					'posts_per_page' => $items_num
				)
			);
			?>
            
            
			<div class="widget-content">
		
                
                <?php 
				if($unpress_most_viewed->have_posts()):
				while ( $unpress_most_viewed->have_posts() ) : $unpress_most_viewed->the_post(); ?>
                
                    <div class="most-viewed media">
                        <?php
						if($show_viewed_image=="true"):?>
                        <a href="<?php the_permalink(); ?>" class="pull-left">
                             <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                        <?php
                        endif;
						?>
                        <div class="media-body latest-post-body">
                            <h4 class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p><i class="fa fa-eye"></i> <?php echo fave_getPostViews(get_the_ID()); ?></p>
                        </div>
                    </div>
                
				<?php 
				endwhile;
				else:
					echo __('<p>no record found</p>','favethemes'); 
				endif;
				?>
				
               
               
            </div><!-- .widget-content -->

	    <?php 
		echo $after_widget;
		
	}
	
	
	/**
	 * Sanitize widget form values as they are saved
	**/
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();

		/* Strip tags to remove HTML. For text inputs and textarea. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['items_num'] = strip_tags( $new_instance['items_num'] );
		$instance['viewed_post_type'] = strip_tags( $new_instance['viewed_post_type'] );
		$instance['show_viewed_image'] = $new_instance['show_viewed_image'];
		
		return $instance;
		
	}
	
	
	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Most Viewed',
			'items_num' => '5',
			'viewed_post_type' => 'post',
			'show_viewed_image' => 'on'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'favethemes'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'items_num' ); ?>"><?php _e('Maximum posts to show:', 'favethemes'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'items_num' ); ?>" name="<?php echo $this->get_field_name( 'items_num' ); ?>" value="<?php echo $instance['items_num']; ?>" size="1" />
		</p>
        <p>
        	<label for="<?php echo $this->get_field_id( 'viewed_post_type' ); ?>"><?php _e('Post Type:', 'favethemes'); ?></label>
            <select id="<?php echo $this->get_field_id( 'viewed_post_type' ); ?>" name="<?php echo $this->get_field_name( 'viewed_post_type' ); ?>">
            	<option value="post" <?php if($instance['viewed_post_type']=="post"){echo 'selected="selected"';}?> >Post</option>
                <option value="interview" <?php if($instance['viewed_post_type']=="interview"){echo 'selected="selected"';}?>>Interview</option>
                <option value="gallery" <?php if($instance['viewed_post_type']=="gallery"){echo 'selected="selected"';}?>>Gallery</option>
                <option value="video" <?php if($instance['viewed_post_type']=="video"){echo 'selected="selected"';}?>>Video</option>
            </select>
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('show_viewed_image'); ?>"><?php _e('Show Image:', 'favethemes'); ?></label>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_viewed_image'], 'on'); ?> id="<?php echo $this->get_field_id('show_viewed_image'); ?>" name="<?php echo $this->get_field_name('show_viewed_image'); ?>" /> 
		</p>
        
	<?php
	}

}
register_widget( 'unpress_most_viewed' );