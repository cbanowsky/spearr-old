<?php 
/**
 * Single Post Share
 * Page Composer Section
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
?>
<ul class="text-center list-unstyled">
    <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" target="blank" style="color: #fff;"><?php _e( 'Facebook', 'favethemes' ); ?></a></li>
    <li><a href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>" target="_blank" style="color: #fff;"><?php _e( 'Twitter', 'favethemes' ); ?></a></li>
    <li><a href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink() ?>" target="_blank" style="color: #fff;"><?php _e( 'Google +', 'favethemes' ); ?></a></li>
    <li>
    	<?php $pinimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
        <a href="//pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php echo $pinimage[0]; ?>&amp;description=<?php the_title(); ?>" target="_blank" style="color: #fff;"><?php _e( 'Pinterest', 'favethemes' ); ?></a>
    </li>
</ul>