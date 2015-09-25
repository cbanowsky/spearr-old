<?php
/*
 * Plugin Name: Flickr Feeds
 * Plugin URI: http://favethemes.com/
 * Description: A widget to get photos from flickr
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 */
 
class UnPress_Flickr_Feeds extends WP_Widget {

	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'unpress_flickr_feeds', // Base ID
			__( 'UnPress: Flickr', 'favethemes' ), // Name
			array( 'description' => __( 'Show photos from Flickr.', 'favethemes' ), ) // Args
		);
		
	}
	

	function widget($args, $instance)

	{

		extract($args);



		$title = apply_filters('widget_title', $instance['title']);

		$screen_name = $instance['screen_name'];

		$number = $instance['number'];
		
		echo $before_widget;
		
		if($title) {
			echo $before_title;
				echo $title;
			echo $after_title;
		}
	
		if($screen_name && $number) {

			$api_key = 'c9d2c2fda03a2ff487cb4769dc0781ea';

			

			@$person = wp_remote_get('http://api.flickr.com/services/rest/?method=flickr.people.findByUsername&api_key='.$api_key.'&username='.urlencode($screen_name).'&format=json');



			@$person = trim($person['body'], 'jsonFlickrApi()');

			@$person = json_decode($person);

			

			if($person->user->id) {

				$photos_url = wp_remote_get('http://api.flickr.com/services/rest/?method=flickr.urls.getUserPhotos&api_key='.$api_key.'&user_id='.$person->user->id.'&format=json');

				$photos_url = trim($photos_url['body'], 'jsonFlickrApi()');

				$photos_url = json_decode($photos_url);



				$photos = wp_remote_get('http://api.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key='.$api_key.'&user_id='.$person->user->id.'&per_page='.$number.'&format=json');
				
				
				$photos = trim($photos['body'], 'jsonFlickrApi()');
				
				$photos = json_decode($photos);

				?>
				<div class="widget-content">
                    <div class="flickr-widget">
                        <ul>
    
                        <?php foreach($photos->photos->photo as $photo): $photo = (array) $photo; ?>
                                
                                <li class="pull-left">
                                    <a title="image" target='_blank' href="<?php echo $photos_url->user->url; ?><?php echo $photo['id']; ?>">
                                        <img alt="<?php echo $photo['title']; ?>" title="<?php echo $photo['title']; ?>" class="media-object" src="<?php $url = "http://farm" . $photo['farm'] . ".static.flickr.com/" . $photo['server'] . "/" . $photo['id'] . "_" . $photo['secret'] . '_s' . ".jpg"; echo $url; ?>">
                                    </a>
                               </li>
    
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

				<?php

			} else {

				echo '<p>Invalid flickr username.</p>';

			}

		}

		echo $after_widget;
	}

	

	function update($new_instance, $old_instance)

	{

		$instance = $old_instance;



		$instance['title'] = strip_tags($new_instance['title']);

		$instance['screen_name'] = $new_instance['screen_name'];

		$instance['number'] = $new_instance['number'];

		

		return $instance;

	}



	function form($instance)

	{

		$defaults = array('title' => 'Flickr', 'screen_name' => '', 'number' => 6);

		$instance = wp_parse_args((array) $instance, $defaults); ?>

		

		<p>

			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>

			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />

		</p>

		

		<p>

			<label for="<?php echo $this->get_field_id('screen_name'); ?>">Screen name:</label>

			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('screen_name'); ?>" name="<?php echo $this->get_field_name('screen_name'); ?>" value="<?php echo $instance['screen_name']; ?>" />

		</p>





		<p>

			<label for="<?php echo $this->get_field_id('number'); ?>">Number of photos to show:</label>

			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />

		</p>

		

	<?php

	}

}
register_widget('UnPress_Flickr_Feeds');
?>