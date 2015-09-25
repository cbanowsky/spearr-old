<?php
/**
 * Featured Video
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/

global $ft_option;
$featured_video = get_sub_field("custom_featured_video");

if($featured_video):
?>

<div class="row">
    <div class="col-md-8">
        <div class="featured-video">
            <div id="video" class="flex-video">
				<?php
                if ( get_field( 'add_video_url', $featured_video->ID ) ):
                    $video_embed = wp_oembed_get( get_field( 'add_video_url', $featured_video->ID ) );
                    echo '<figure class="video-wrapper">' .$video_embed. '</figure>';
                
                endif; ?>
            </div>
        </div><!-- .featured-video -->
    </div>
    <div class="col-md-4">
        <article class="post">
            <ul class="list-inline post-category">
                <?php echo get_the_term_list( $featured_video->ID, 'video-categories', '', ', ', '' ); ?>
            </ul>
            
            <div class="post-meta">
            	<?php _e("by", "favethemes"); ?> 
            	<?php echo get_the_author_meta( 'display_name', $featured_video->post_author ); ?>
                <?php _e("on", "favethemes"); ?>
				<?php echo date(get_option("date_format"), strtotime($featured_video->post_date)); ?>
            </div>
            
            <h2 class="post-title"><a href="<?php echo $featured_video->guid; ?>"><?php echo $featured_video->post_title; ?></a></h2>
            
            <div class="entry-content">
                <?php echo substr($featured_video->post_content, 0, 700); ?>
                <p><a class="read-more" href="<?php echo $featured_video->guid; ?>"><?php _e("More", "favethemes"); ?> <i class="fa fa-angle-right"></i></a></p>
            </div>
            
        </article>
    </div>
</div>

<?php endif; ?>