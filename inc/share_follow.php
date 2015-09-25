<?php
// [share]
function shareShortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'  => '',
	), $atts));
	global $post, $ft_option;
	$permalink = get_permalink($post->ID);
	$featured_image =  wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
	$featured_image_2 = $featured_image['0'];
	$post_title = rawurlencode(get_the_title($post->ID));
	if($title) $title = '<span>'.$title.'</span>';

	ob_start();
	?>
	
    <?php if($ft_option['woocommerce_social_media'] == 1 ):?>
    
	<div class="social-icons">
		<?php echo $title; ?>
		<?php if($ft_option['woocommerce_facebook'] == 1 ) { ?>
			  <a href="http://www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" target="_blank" class="icon icon_facebook" ><i class="fa fa-facebook"></i></a>
		<?php } ?>
		<?php if($ft_option['woocommerce_twitter'] == 1 ) { ?>
            <a href="https://twitter.com/share?url=<?php echo $permalink; ?>" target="_blank" class="icon icon_twitter"><i class="fa fa-twitter"></i></a>
		<?php } ?>
		<?php if( $ft_option['woocommerce_email'] == 1 ) { ?>
            <a href="mailto:enteryour@addresshere.com?subject=<?php echo $post_title; ?>&amp;body=Check%20this%20out:%20<?php echo $permalink; ?>" class="icon icon_email"><i class="fa fa-envelope"></i></a>
		<?php } ?>
		<?php if($ft_option['woocommerce_pinterest'] == 1 ) { ?>
            <a href="//pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&amp;media=<?php echo $featured_image_2; ?>&amp;description=<?php echo $post_title; ?>" target="_blank" class="icon icon_pintrest"><i class="fa fa-pinterest"></i></a>
		<?php } ?>
		<?php if($ft_option['woocommerce_googleplus'] == 1 ) { ?>
            <a href="//plus.google.com/share?url=<?php echo $permalink; ?>" target="_blank" class="icon icon_googleplus"><i class="fa fa-google-plus"></i></a>
		<?php } ?>
    </div>
    
    <?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
	
	endif;
} 
add_shortcode('share','shareShortcode');

?>
