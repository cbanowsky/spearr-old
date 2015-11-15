<?php 
/**
 * Video post format
 * Display video embed code from custom meta field
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $ft_option; 

if ( have_posts() ) :
  while ( have_posts() ) : the_post();
  
  // Set post view
  fave_setPostViews(get_the_ID()); 
?>
<section class="container video video-title">
	<div class="row">
		<div class="col-md-12">
			<ul class="list-inline post-category">
                <li><?php esc_attr( the_category(', ') ); ?></li>
			</ul>
			<h1 class="post-title"><?php the_title(); ?></h1>	
			<div class="post-meta">
				
				<?php if($ft_option["single_author_name"]=="1"):?>
				<?php _e("by", "favethemes"); ?> 
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?></a>
                <?php endif; ?>
				
				<?php if($ft_option["single_post_date"]=="1"):?>
				<?php _e("on", "favethemes"); ?> 
                <?php the_time(get_option('date_format')); ?>
                <?php endif; ?>
           </div>
           
           <?php
			// Post likes and views
			get_template_part("inc/likes-views");
			?>
           
		</div>
	</div>
</section>		

<section class="video-container">
	
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
				<div class="featured-video">
					<div id="video" class="flex-video">
						<?php
                        // Output the video by page url
						if ( get_field( 'add_video_url' ) ):
						
							$video_embed = wp_oembed_get( get_field( 'add_video_url' ) );
							echo '<figure class="wrapper video-wrapper">' .$video_embed. '</figure>';
						
						endif; ?>
                    </div>
				</div><!-- .featured-video -->
			</div>
			<div class="col-md-1">
			
				<?php unpress_share_button(); ?>
                
                <div id="share-page" style="display: none;">
                    <?php get_template_part ( 'inc/single-post-share');?>
                </div>
				
				<div class="article_nav">
                    <?php if($ft_option["single_nav_arrows"]=="1"):?>
                    <!-- Article nav -->
                    <?php get_template_part( 'inc/article_nav' ); ?>
                    <!-- End article nav -->
                    <?php endif; ?>
                    
                </div>	
			</div>
		</div>
	</div>
</section>

<section>
	<?php get_template_part("inc/common-single") ;?>
</section>

<?php endwhile; wp_reset_query(); endif; ?>