<?php
/*
* Functions to track Post Views
* @package UnPress
* @since 	UnPress 1.1
*/

if ( ! function_exists( 'fave_getPostViews' ) ) :

	function fave_getPostViews($postID){
		$count_key = 'fave-post_views';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 ".__('View','favethemes');
		}
		return $count.__(' Views', 'favethemes');
	}
endif;

if ( ! function_exists( 'fave_setPostViews' ) ) :

	function fave_setPostViews($postID) {
		$count_key = 'fave-post_views';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '1');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
endif;
?>