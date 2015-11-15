<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package UnPress
 * @since UnPress 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
global $ft_option;

if($ft_option['posts_default_sidebar_on']== 0 ):
	if(! get_field( 'post_sidebar' ) || get_field( 'post_sidebar' ) == "post_sidebar_off"):
		$comment_class_section = "container module comments";
		$comment_class_sticky_box = "col-lg-3 col-md-3 col-sm-4 sticky-col";
		$comment_class_col2 = "col-lg-9 col-md-9 col-sm-8";
	else:
		$comment_class_section = "module comments";
		$comment_class_sticky_box = "col-lg-4 col-md-4 col-sm-4 sticky-col";
		$comment_class_col2 = "col-lg-8 col-md-8 col-sm-8";
	endif;
else:
	$comment_class_section = "module comments";
	$comment_class_sticky_box = "col-lg-4 col-md-4 col-sm-4 sticky-col";
	$comment_class_col2 = "col-lg-8 col-md-8 col-sm-8";
endif;
?>