<?php
/**
 * Featured Video
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/

global $ft_option;
$video = get_sub_field("featured_video");
if($video):
?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="featured-video-wrap text-center">				
				<div class="featured-video-title">
					<?php if( get_sub_field( 'video_section_title' ) ): ?>
						<p><?php the_sub_field( 'video_section_title' ); ?></p>
                	<?php endif; ?>
                
					<h2><a href="<?php echo get_permalink( $video->ID ); ?>"><?php echo $video->post_title; ?></a></h2>
                    
				</div><!-- .featured-video-title -->
				
				<div class="featured-video">
					<div id="video" class="flex-video">
					    <?php
						if ( get_field( 'add_video_url', $video->ID ) ):
	
							$video_embed = wp_oembed_get( get_field( 'add_video_url', $video->ID ) );
							echo '<figure class="video-wrapper">' .$video_embed. '</figure>';
						
						endif; ?>
					</div>
					
				</div><!-- .featured-video -->
				
				<div class="video-tools tools">
					
                    <!-- Post Share -->	
                    <a class="share-tool tool-btn" id="show-inline" href="#">
						<i class="fa fa-reply"></i>
						<span class="tool-text text-right pull-right"><i class="fa fa-reply"></i><?php _e("Share","favethemes");?></span>
					</a>
                    
                    <div id="share-page" style="display: none;">
                        <ul class="text-center list-unstyled">
                            <li><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink( $video->ID ); ?>&amp;t=<?php echo $video->post_title; ?>" target="blank"><?php _e( 'Facebook', 'favethemes' ); ?></a></li>
                            <li><a href="https://twitter.com/intent/tweet?original_referer=<?php echo get_permalink( $video->ID ); ?>&amp;text=<?php echo $video->post_title; ?>&tw_p=tweetbutton&url=<?php echo get_permalink( $video->ID ); ?>&via=<?php bloginfo( 'name' ); ?>" target="_blank"><?php _e( 'Twitter', 'favethemes' ); ?></a></li>
                            <li><a href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php echo get_permalink( $video->ID ); ?>" target="_blank"><?php _e( 'Google +', 'favethemes' ); ?></a></li>
                            <li>
                                <?php $pinimage = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'large' ); ?>
                                <a href="//pinterest.com/pin/create/button/?url=<?php echo get_permalink( $video->ID ); ?>&amp;media=<?php echo $pinimage[0]; ?>&amp;description=<?php echo $video->post_title; ?>" target="_blank"><?php _e( 'Pinterest', 'favethemes' ); ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Post Share -->	
                    
					<span class="vertical-divisor"></span>
					<a href="<?php echo get_permalink( $video->ID ); ?>" class="action-tool tool-btn">
						<span class="tool-text text-left"><?php _e("More","favethemes");?> <i class="fa fa-angle-right"></i></span>
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				
                <?php if( get_sub_field( 'more_video_text' ) ): ?>
						<div><a href="<?php the_sub_field( 'video_page_link' ); ?>"><?php the_sub_field( 'more_video_text' ); ?></a></div>
                <?php endif; ?>
				
				
			</div><!-- .featured-video-wrap -->	
		</div>
	</div>
</div>
<?php endif; ?>