<?php
/*
 * Plugin Name: About The Site Widget
 * Plugin URI: http://favethemes.com/
 * Description: A widget that shows site info
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 */
 
/**
 * Register the Widget
 */
class UnPress_About_Site extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'unpress-about-site', // Base ID
			__( 'UnPress About The Site', 'favethemes' ), // Name
			array( 'description' => __( 'Display info about your magazine. Such as logo, text & social profile links', 'favethemes' ), ) // Args
		);
		
	}

	function unpress_sp_array( $instance = array() ) {

		return array(
			'rssurl' => array(
				'title' => __('RSS URL', 'favethemes'),
				'class' => __('rss', 'favethemes'),
			),
			'twitter' => array(
				'title' => __('Twitter', 'favethemes'),
				'class' => __('twitter', 'favethemes'),
			),
			'facebook' => array(
				'title' => __('Facebook', 'favethemes'),
				'class' => __('facebook', 'favethemes'),
			),
			'google' => array(
				'title' => __('Google+', 'favethemes'),
				'class' => __('google-plus', 'favethemes'),
			),
			'linkedin' => array(
				'title' => __('LinkedIn', 'favethemes'),
				'class' => __('linkedin', 'favethemes'),
			),
			'instagram' => array(
				'title' => __('Instagram', 'favethemes'),
				'class' => __('instagram', 'favethemes'),
			),
			'pinterest' => array(
				'title' => __('Pinterest', 'favethemes'),
				'class' => __('pinterest-square', 'favethemes'),
			),
			'vimeo' => array(
				'title' => __('Vimeo', 'favethemes'),
				'class' => __('vimeo-square', 'favethemes'),
			),
			'youtube' => array(
				'title' => __('YouTube', 'favethemes'),
				'class' => __('youtube', 'favethemes'),
			),
			'flickr' => array(
				'title' => __('Flickr', 'favethemes'),
				'class' => __('flickr', 'favethemes'),
			),
//			'behance' => array(
//				'title' => __('Behance', 'favethemes'),
//				'class' => __('behance', 'favethemes'),
//			),
//			'soundcloud' => array(
//				'title' => __('Sound Cloud', 'favethemes'),
//				'class' => __('soundcloud', 'favethemes'),
//			),
			'dribbble' => array(
				'title' => __('Dribbble', 'favethemes'),
				'class' => __('dribbble', 'favethemes'),
			),
			'apple' => array(
				'title' => __('Apple', 'favethemes'),
				'class' => __('apple', 'favethemes'),
			),
			'windows' => array(
				'title' => __('Windows', 'favethemes'),
				'class' => __('windows', 'favethemes'),
			),
			'android' => array(
				'title' => __('Android', 'favethemes'),
				'class' => __('android', 'favethemes'),
			),
			'skype' => array(
				'title' => __('Skype', 'favethemes'),
				'class' => __('skype', 'favethemes'),
			),
		);
	}
	

	public function widget($args, $instance) {

		extract($args);

		$title = apply_filters('widget_title', $instance['title'] );
		$new_window = isset( $instance['new_window'] ) ? 'target="_blank"' : false;
		$center_icons = isset( $instance['center_icons'] ) ? ' social-center' : false;
		$logo_url = $instance['logo_url'];
		$free_text = $instance['free_text'];

		echo $before_widget;
		

			if ( $title ) echo $before_title . $title . $after_title;
			
			// Display the Logo
			if ( !empty ( $instance['logo_url'] ) ) {
				printf( '<img src="%s" alt="%s" />', esc_url( $instance['logo_url'] ), get_bloginfo( 'name' ) );
			}
			
			// Text about the site
			if ( !empty ( $instance['free_text'] ) ) {
				printf( '<p>%s</p>', esc_attr( $instance['free_text'] ) );
			}
			
			// Display the social links
			echo '<ul class="social' . $center_icons . ' clearfix">';
			foreach ( $this->unpress_sp_array( $instance ) as $key => $data ) {
				if ( !empty ( $instance[$key] ) ) {
					printf( '<li><a href="%s" aria-hidden="true" class="fa fa-%s" %s></a></li>', esc_url( $instance[$key] ), esc_attr( $data['class'] ), $new_window );
				}
			}
			echo '</ul>';
			

		echo $after_widget;

	}
	

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}
	

	public function form($instance) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'About The Site',
			'logo_url' => '',
			'free_text' => '',
			'rssurl' => '',
			'twitter' => '',
			'facebook' => '',
			'google' => '',
			'linkedin' => '',
			'instagram' => '',
			'pinterest' => '',
			'vimeo' => '',
			'youtube' => '',
			'flickr' => '',
//			'behance' => '',
//			'soundcloud' => '',
			'dribbble' => '',
			'lastfm' => '',
			'app-net' => '',
			'apple' => '',
			'windows' => '',
			'android' => '',
			'stumbleupon' => '',
			'picassa' => '',
			'skype' => '',
			'center_icons' => false,
			'new_window' => false,
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'favethemes'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        <p>
        	<label for="<?php echo $this->get_field_id('logo_url'); ?>"><?php _e('Logo URL', 'favethemes'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('logo_url'); ?>" name="<?php echo $this->get_field_name('logo_url'); ?>" value="<?php echo $instance['logo_url']; ?>" class="widefat" />
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('free_text'); ?>"><?php _e('Short text about the site', 'favethemes'); ?>:</label>
			<textarea id="<?php echo $this->get_field_id('free_text'); ?>" name="<?php echo $this->get_field_name('free_text'); ?>" class="widefat" ><?php echo $instance['free_text']; ?></textarea>
        </p>
        <p>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'center_icons' ); ?>" name="<?php echo $this->get_field_name( 'center_icons' ); ?>" <?php if( $instance['center_icons'] == true ) echo 'checked'; ?> /> 
			<label for="<?php echo $this->get_field_id( 'center_icons' ); ?>"><?php _e('Center the social icons', 'favethemes'); ?></label>
        </p>
        <p>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'new_window' ); ?>" name="<?php echo $this->get_field_name( 'new_window' ); ?>" <?php if( $instance['new_window'] == true ) echo 'checked'; ?> /> 
			<label for="<?php echo $this->get_field_id( 'new_window' ); ?>"><?php _e('Open social links in new window', 'favethemes'); ?></label>
        </p>
		
		<?php foreach ( $this->unpress_sp_array( $instance ) as $key => $data ) { ?>
		<p>
			<label for="<?php echo $this->get_field_id($key); ?>"><?php echo $data['title']; ?></label>
			<input type="text" id="<?php echo $this->get_field_id($key); ?>" name="<?php echo $this->get_field_name($key); ?>" value="<?php echo esc_url($instance[$key]); ?>" class="widefat" />
		</p>
        <?php }
		
	}
}
register_widget( 'UnPress_About_Site' );