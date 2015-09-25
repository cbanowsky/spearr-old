<?php
/*
 * Plugin Name: Instagram
 * Plugin URI: http://favethemes.com/
 * Description: A widget that displays a slider with instagram images
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 */
 
class unpress_instagram extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'unpress_instagram', // Base ID
			__( 'UnPress: Instagram Slider', 'favethemes' ), // Name
			array( 'description' => __( 'A widget that displays a slider with instagram images', 'favethemes' ), ) // Args
		);
		
	}

	
	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );
		
		$title        = apply_filters('widget_title', $instance['title'] );
		$username     = isset( $instance['username'] ) ? $instance['username'] : '';
		$link_to	  = isset( $instance['images_link'] ) ? $instance['images_link'] : 'image_url';
		$randomise 	  = isset( $instance['randomise'] ) ? true : false;
		$images_nr    = isset( $instance['images_number'] ) ? $instance['images_number'] : 5;
		$refresh_hour = isset( $instance['refresh_hour'] ) ? $instance['refresh_hour'] : 5;
		$template	  = isset( $instance['template'] ) ? $instance['template'] : 'slider';
		
		echo $before_widget;
			
			$unique_key = unpress_element_key();
			?>
			
			<script type="text/javascript">
			jQuery(document).ready(function($) { 
				
				var owl = $('.widget-instagram-slider-<?php echo $unique_key; ?>');
				owl.owlCarousel({
					  autoPlay: 4500, //Set AutoPlay to 4 seconds
					  stopOnHover : true,
					  navigation : false,
					  pagination: false,
    				  goToFirstSpeed : 2000,
					  slideSpeed : 800,
					  responsive : true,
					  singleItem : true,
					  autoHeight : true,
    				  //transitionStyle:"fade",
			
				  });
				  
				  // Custom Navigation Events
				  $(".common-next-<?php echo $unique_key; ?>").click(function(){
					  owl.trigger('owl.next');
				  })
				  $(".common-prev-<?php echo $unique_key; ?>").click(function(){
					  owl.trigger('owl.prev');
				  })
				
			});
			</script>
			<?php
			if ( $title ) echo $before_title . $title . $after_title; 
            
           // Get instagram data 
            $insta_data = $this->fave_instagram_data( $username, $refresh_hour, $images_nr );
    
            // Randomise Images
            $insta_data = $this->fave_randomise( $insta_data, $randomise );
            
            //include the template based on user choice
            if($template == "slider"){
			   $this->unpress_instagram_slider($template, $insta_data, $link_to, $unique_key);
			}
			elseif($template == "slider-overlay"){
				$this->unpress_instagram_slider_overlay($template, $insta_data, $link_to, $unique_key);
			}
			else{
				$this->unpress_instagram_slider_thumbs($template, $insta_data, $link_to);
			}
			
		echo $after_widget;
		
	}
	
	
	/**
	 * Sanitize widget form values as they are saved
	**/
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();

		//$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title']         = strip_tags( $new_instance['title'] );
		$instance['username']      = $new_instance['username'];
		$instance['template']      = $new_instance['template'];
		$instance['images_link']   = $new_instance['images_link'];	
		$instance['randomise']     = $new_instance['randomise'];
		$instance['images_number'] = $new_instance['images_number'];
		$instance['refresh_hour']  = $new_instance['refresh_hour'];

		return $instance;
		
	}
	
	
	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' 		=> __('Instagram Slider', 'favethemes'),
			'username' 		=> __('', 'favethemes'),
			'template' 		=> 'slider',
			'images_link' 	=> 'image_url',
			'randomise'		=> 0,
			'images_number' => 5,
			'refresh_hour' 	=> 5,
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'favethemes'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Instagram Username:', 'favethemes'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>
        <p>
          <label for="<?php echo $this->get_field_id( 'template' ); ?>"><?php _e( 'Images Layout', 'favethemes' ); ?>
          <select class="widefat" name="<?php echo $this->get_field_name( 'template' ); ?>">
          <option value="slider" <?php echo ($instance['template'] == 'slider') ? ' selected="selected"' : ''; ?>><?php _e( 'Slider - Normal', 'favethemes' ); ?></option>
          <option value="slider-overlay" <?php echo ($instance['template'] == 'slider-overlay') ? ' selected="selected"' : ''; ?>><?php _e( 'Slider - Overlay Text', 'favethemes' ); ?></option>
          <option value="thumbs" <?php echo ($instance['template'] == 'thumbs') ? ' selected="selected"' : ''; ?>><?php _e( 'Thumbnails', 'favethemes' ); ?></option>
          </select>  
          </label>
       </p>
       <p>
            <?php _e('Link Images To:', 'favethemes'); ?><br>
            <label><input type="radio" id="<?php echo $this->get_field_id( 'images_link' ); ?>" name="<?php echo $this->get_field_name( 'images_link' ); ?>" value="image_url" <?php checked( 'image_url', $instance['images_link'] ); ?> /> <?php _e('Instagram Image', 'favethemes'); ?></label><br />         
            <label><input type="radio" id="<?php echo $this->get_field_id( 'images_link' ); ?>" name="<?php echo $this->get_field_name( 'images_link' ); ?>" value="user_url" <?php checked( 'user_url', $instance['images_link'] ); ?> /> <?php _e('Instagram Profile', 'favethemes'); ?></label><br />
            
         </p>
		
         <p>
            <label for="<?php echo $this->get_field_id( 'randomise' ); ?>"><?php _e( 'Randomise Images:', 'favethemes' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'randomise' ); ?>" name="<?php echo $this->get_field_name( 'randomise' ); ?>" type="checkbox" value="1" <?php checked( '1', $instance['randomise'] ); ?> />
        </p>       
		<p>
			<label  for="<?php echo $this->get_field_id( 'images_number' ); ?>"><?php _e('Number of Images to Show:', 'favethemes'); ?>
			<input  class="small-text" id="<?php echo $this->get_field_id( 'images_number' ); ?>" name="<?php echo $this->get_field_name( 'images_number' ); ?>" value="<?php echo $instance['images_number']; ?>" />
			<small><?php _e('( max 20 )', 'favethemes'); ?></small>
            </label>
		</p>
		<p>

			<label  for="<?php echo $this->get_field_id( 'refresh_hour' ); ?>"><?php _e('Check for new images every:', 'favethemes'); ?>
			<input  class="small-text" id="<?php echo $this->get_field_id( 'refresh_hour' ); ?>" name="<?php echo $this->get_field_name( 'refresh_hour' ); ?>" value="<?php echo $instance['refresh_hour']; ?>" />
			<small><?php _e('hours', 'favethemes'); ?></small>
            </label>
		</p>
         
	<?php
	}

function unpress_instagram_slider($template, $insta_data, $link_to, $unique_key){?>

<div class="widget-content">
		
<div class="unpress-instagram-slider">
    <div class="latest-post-gallery-carousel-arrows">
        <a class="instagram-slider-prev common-prev-<?php echo $unique_key; ?>"><i class="fa fa-angle-left"></i></a>
        <a class="instagram-slider-next common-next-<?php echo $unique_key; ?>"><i class="fa fa-angle-right"></i></a>
    </div>
    <div class="widget-instagram-slider-<?php echo $unique_key; ?>">
        <?php 
        if ( isset($insta_data) && is_array($insta_data) ) {
            foreach ($insta_data as $data) {
                foreach ( $data as $k => $v) {
                    $$k = $v;
                }
                
                /* Set link to User Instagram Profile */
                if ( $link_to && ( 'user_url' == $link_to ) ) {
                    $link = $user_url;
                }
                
                echo '<div class="slide">'. "\n";
                echo '<a target="_blank" href="'.$link.'"><img src="'.$image.'" alt="'.$text.'"></a>' . "\n";
                if ( $created_time ) {
                    echo '<div class="instatime">'. human_time_diff( $created_time ) . __('ago', 'favethemes').'</div>' . "\n";
                }
                echo '</div>' . "\n";
                
            
            }
        }
        ?>
       
    </div>
</div>

</div><!-- .widget-content -->

<?
}

function unpress_instagram_slider_overlay($template, $insta_data, $link_to, $unique_key){?>

<div class="widget-content">
		
<div class="unpress-instagram-slider">
    <div class="latest-post-gallery-carousel-arrows">
        <a class="instagram-slider-prev common-prev-<?php echo $unique_key; ?>"><i class="fa fa-angle-left"></i></a>
        <a class="instagram-slider-next common-next-<?php echo $unique_key; ?>"><i class="fa fa-angle-right"></i></a>
    </div>
    <div class="widget-instagram-slider-<?php echo $unique_key; ?> instagram-overlay">
        <?php 
        if ( isset($insta_data) && is_array($insta_data) ) {
            foreach ($insta_data as $data) {
                foreach ( $data as $k => $v) {
                    $$k = $v;
                }
                
                /* Set link to User Instagram Profile */
                if ( $link_to && ( 'user_url' == $link_to ) ) {
                    $link = $user_url;
                }
                
                
                echo '<div class="slide">'. "\n";
				echo '<a target="_blank" href="'.$link.'"><img src="'.$image.'" alt="'.$text.'"></a>' . "\n";
				echo '<div class="unpress-instagram-wrap">' . "\n";					
				echo '<div class="unpress-instagram-datacontainer">' . "\n";
				if ( $created_time ) {
					echo '<span class="unpress-instagram-time">'. human_time_diff( $created_time ) . __('ago', 'favethemes').'</span>' . "\n";
				}
				echo '<span class="unpress-instagram-username">by <a target="_blank" href="'. $user_url .'">'. $user_name .'</a></span>' . "\n";
				if ($text) {
					echo '<span class="unpress-instagram-desc">'.$text.'</span>' . "\n";
				}
				echo '</div>' . "\n";
				echo '</div>' . "\n";
				echo '</div>' . "\n";
            
            }
        }
        ?>
       
    </div>
</div>

</div><!-- .widget-content -->

<?php
}

function unpress_instagram_slider_thumbs($template, $insta_data, $link_to){?>
	
    <div class="widget-content">
		
<ul class="unpress-instagram-thumbnails">
	<?php
        if ( isset( $insta_data ) && is_array( $insta_data ) ) {
            foreach ( $insta_data as $data ) {
                foreach ( $data as $k => $v ) {
                    $$k = $v;
                }
                
                /* Set link to User Instagram Profile */
                if ( $link_to && 'user_url' == $link_to ) {
                    $link = $user_url;
                }
                
                echo '<li>'. "\n";
                echo '<a target="_blank" href="' . $link . '"><img src="' . $image . '" alt="' . $text . '"></a>' . "\n";
                echo '</li>' . "\n";
            }
        }
    ?>
</ul>

</div>
    
<?php	
}

/**
 * Randomises an array using php shuffle() function
 *	 
 * @param    array     $data    	    Instagram data array
 * @param    bolean    $randomise       True or false to randomise
 *
 * @return array of randomised data
 */
private function fave_randomise( $data, $randomise = false ) {

	if ( true == $randomise )  {
		shuffle( $data );
	}
	return $data;
}

/**
* Stores the fetched data from instagram in WordPress DB using transients
*	 
* @param    string    $username    	Instagram Username to fetch images from
* @param    string    $cache_hours     Cache hours for transient
* @param    string    $nr_images    	Nr of images to fetch from instagram		  	 
*
* @return array of localy saved instagram data
*/
private function fave_instagram_data( $username, $cache_hours, $nr_images, $media_library = false ) {

$opt_name    = 'fave_insta_'.md5( $username );
$instaData 	 = get_transient( $opt_name );
$user_opt    = get_option( $opt_name );

if (
	false === $instaData
	|| $user_opt['username']    != $username
	|| $user_opt['cache_hours'] != $cache_hours
	|| $user_opt['nr_images']   != $nr_images
   )
{
	$instaData    = array();
	$insta_url    = 'http://instagram.com/';
	$user_profile = $insta_url.$username;
	$json     	  = wp_remote_get( $user_profile, array( 'sslverify' => false, 'timeout'=> 60 ) );
	$user_options = compact('username', 'cache_hours', 'nr_images');
	
	update_option( $opt_name, $user_options );
	
	if ( is_wp_error( $json ) ) {
		// error handling
		$error_message = $json->get_error_message();
		$str           = "Something went wrong: $error_message";
	}
	else 
	{
	
		if ( $json['response']['code'] == 200 ) {
	
			$json 	  = $json['body'];
			$json     = strstr( $json, 'window._sharedData = ' );
			$json     = str_replace('window._sharedData = ', '', $json);
	
			// Compatibility for version of php where strstr() doesnt accept third parameter
			if ( version_compare( phpversion(), '5.3.10', '<' ) ) {
				$json = substr( $json, 0, strpos($json, '</script>' ) );
			} else {
				$json = strstr( $json, '</script>', true );
			}
			
			$json     = rtrim( $json, ';' );
			
			// Function json_last_error() is not available before PHP * 5.3.0 version
			if ( function_exists( 'json_last_error' ) ) {
			
				( $results = json_decode( $json, true ) ) && json_last_error() == JSON_ERROR_NONE;
			
			} else {
				
				$results = json_decode( $json, true );
			}
			 
			if ( ( $results ) && is_array( $results ) ) {
				foreach( $results['entry_data']['UserProfile'][0]['userMedia'] as $current => $result ) {
		
					if( $current >= $nr_images ) break;
					$caption      = $result['caption'];
					$image        = $result['images']['standard_resolution'];
					$id           = $result['id'];
					$image        = $image['url'];
					$link         = $result['link'];
					$created_time = $caption['created_time'];
					$text         = $this->fave_utf8_4byte_to_3byte($caption['text']);
					$upload_dir   = wp_upload_dir();				
					$filename_data= explode( '.', $image );
	
					if ( is_array( $filename_data ) ) {
	
						$fileformat   = end( $filename_data );
	
						if ( $fileformat !== false ){
							
							
							$image = $this->fave_download_insta_image( $image, md5( $id ) . '.' . $fileformat );
							
							array_push( $instaData, array(
								'id'           => $id,
								'user_name'	   => $username,
								'user_url'	   => $user_profile,
								'created_time' => $created_time,
								'text'         => $text,
								'image'        => $image,
								'image_path'   => $upload_dir['path'] . '/' . md5( $id ) . '.' . $fileformat,
								'link'         => $link
							));
							
						} // end -> if $fileformat !== false
					
					} // end -> is_array( $filename_data )
					
				} // end -> foreach
			
			} // end -> ( $results ) && is_array( $results ) )
		
		} // end -> $json['response']['code'] === 200 )
	}// end else

	if ( $instaData ) {
		set_transient( $opt_name, $instaData, $cache_hours * 60 * 60 );
	} // end -> true $instaData

} // end -> false === $instaData

// Insert into Media Library
if ( true == $media_library ) {
	
	$media_library = array();
						
	foreach ( $instaData as $media_item ) { 
		
		$media_library['title'] = $media_item['text'];
		$media_library['path'] 	= $media_item['image_path'];
		$media_library['src'] 	= $media_item['image'];
			
		$this->insert_into_media( $media_library );
	}
}

return $instaData;
}

/**
	 * Sanitize 4-byte UTF8 chars; no full utf8mb4 support in drupal7+mysql stack.
	 * This solution runs in O(n) time BUT assumes that all incoming input is
	 * strictly UTF8.
	 *
	 * @param    string    $input 		The input to be sanitised
	 *
	 * @return the sanitized input
	 */
	private function fave_utf8_4byte_to_3byte( $input ) {
	  
	  if (!empty($input)) {
		$utf8_2byte = 0xC0 /*1100 0000*/; $utf8_2byte_bmask = 0xE0 /*1110 0000*/;
		$utf8_3byte = 0xE0 /*1110 0000*/; $utf8_3byte_bmask = 0XF0 /*1111 0000*/;
		$utf8_4byte = 0xF0 /*1111 0000*/; $utf8_4byte_bmask = 0xF8 /*1111 1000*/;
	 
		$sanitized = "";
		$len = strlen($input);
		for ($i = 0; $i < $len; ++$i) {
		  $mb_char = $input[$i]; // Potentially a multibyte sequence
		  $byte = ord($mb_char);
		  if (($byte & $utf8_2byte_bmask) == $utf8_2byte) {
			$mb_char .= $input[++$i];
		  }
		  else if (($byte & $utf8_3byte_bmask) == $utf8_3byte) {
			$mb_char .= $input[++$i];
			$mb_char .= $input[++$i];
		  }
		  else if (($byte & $utf8_4byte_bmask) == $utf8_4byte) {
			// Replace with ? to avoid MySQL exception
			$mb_char = '?';
			$i += 3;
		  }
	 
		  $sanitized .=  $mb_char;
		}
	 
		$input= $sanitized;
	  }
	 
	  return $input;
	}
	
	/**
	 * Save Instagram images to upload folder and ads to media.
	 * If the upload fails it returns the remote image url. 
 	 *
	 * @param    string    $url    		Url of image to download
 	 * @param    string    $file    	File path for image	
	 *
	 * @return   string    $url 		Url to image
	 */
	private function fave_download_insta_image( $url, $file ){

		$upload_dir = wp_upload_dir();
		$local_file =  $upload_dir['path'] . '/' . $file; 
		
		if ( file_exists( $local_file ) ) {
			return $upload_dir['baseurl'] . $upload_dir['subdir'] . '/' . $file;
		}		
		
		$get 	   = wp_remote_get( $url, array( 'sslverify' => false ) );
		$body      = wp_remote_retrieve_body( $get );
		$upload	   = wp_upload_bits( $file, '', $body );

		if ( false === $upload['error'] ) {

			return $upload['url'];
		}
		
		return $url;
	}

}
register_widget( 'unpress_instagram' );

