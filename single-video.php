<?php 
/**
 * The Template for displaying all single custom post type video
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $ft_option;
?>

<?php get_header(); ?>
<div id="page-wrap">
<?php 
if ( have_posts() ) :
  while ( have_posts() ) : the_post();
  // Set post view
  fave_setPostViews(get_the_ID());  
?>



<section class="container video video-title">
	<div class="row">
		<div class="col-md-12">
			<ul class="list-inline post-category">
                <li><?php echo get_the_term_list( $post->ID, 'video-categories', '', ', ', '' ); ?></li>
			</ul>
			<h1 class="post-title"><?php the_title(); ?></h1>	
			<div class="post-meta">
				<?php if($ft_option["video_single_author_name"]=="1"):?>
				<?php _e("by", "favethemes"); ?> 
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?></a>
                <?php endif; ?>
                
				<?php if($ft_option["video_post_date"]=="1"):?>
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
                        if ( get_field( 'add_video_url', $post->ID ) ):
                            $video_embed = wp_oembed_get( get_field( 'add_video_url', $post->ID ) );
                            echo '<figure class="video-wrapper">' .$video_embed. '</figure>';
                        
                        endif; ?>
                    </div>
				</div><!-- .featured-video -->
			</div>
			<div class="col-md-1">
				<?php if($ft_option["video_single_social"]=="1"):?>
				<div class="post-sharing-wrap pull-right">
                    <a class="btn-icon btn btn-post-share" id="show-inline" href="#">
                        <i class="fa fa-reply"></i>
                    </a>
                </div>
                <?php endif; ?>
                
                <div id="share-page" style="display: none;">
                    <?php get_template_part ( 'inc/single-post-share');?>
                </div>
				
				<div class="article_nav">
					<?php if($ft_option["video_single_nav_arrows"]=="1"):?>
                    <!-- Article nav -->
					<nav class="component_next-previous-articles">
						<!-- Next and previous articles here -->
					<?php 
                    $prevPost = get_previous_post();
                    if($prevPost) {
                        $args = array(
                            'posts_per_page' => 1,
                            'post_type' => 'video',
                            'include' => $prevPost->ID
                        );
                        $prevPost = get_posts($args);
                        foreach ($prevPost as $post) {
                            setup_postdata($post);
                        ?>
                        <a href="<?php the_permalink(); ?>" target="_self">
						<button class="component_next-article active">
                            <i class="fa fa-angle-right"></i>
                            <div class="next-article_wrapper">
                                <div class="next-article_details">
                                    <header class="next-article_header">
                                        <h3><?php the_title(); ?></h3>
                                        <em><?php _e("by","favethemes"); ?> <?php the_author(); ?></em>
                                    </header>
                                    <div class="next-article_image">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </div>
                                </div>
                            </div>
                        </button>
                        </a>
						<?php
                                wp_reset_postdata();
                            } //end foreach
                        } // end if
						$nextPost = get_next_post();
						if($nextPost) {
							$args = array(
								'posts_per_page' => 1,
								'post_type' => 'video',
								'include' => $nextPost->ID
							);
							$nextPost = get_posts($args);
							foreach ($nextPost as $post) {
								setup_postdata($post);
						?>
						<a href="<?php the_permalink(); ?>" target="_self">
						<button class="component_previous-article active">
								<i class="fa fa-angle-left"></i>
								<div class="previous-article_wrapper">
									<div class="previous-article_details">
										<header class="previous-article_header">
											<h3><?php the_title(); ?></h3>
											<em><?php _e("by","favethemes"); ?> <?php the_author(); ?></em>
										</header>
										<div class="previous-article_image">
											<?php the_post_thumbnail('thumbnail'); ?>
										</div>
									</div>
								</div>
						</button>
                        </a>
						<?php
                                wp_reset_postdata();
                            } //end foreach
                        } // end if
						?>
					</nav>
					<!-- End article nav -->
                    <?php endif; ?>
				</div>	
			</div>
		</div>
	</div>
</section>
				
				
<section>
	<div class="container">
		<div class="row">
        <?php 
        if(! get_field( 'video_post_sidebar' ) || get_field( 'video_post_sidebar' ) == "video_post_sidebar_off"):
        	echo '<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">';
        else:
        	echo '<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">';
        endif;
        ?>
				<div class="entry-content">
					<?php the_content(); ?>
                    <?php
					$args = array(
						'before' => '<div class="link-pages">' . __( "Pages:", "favethemes" ),
						'after' => '</div>',
						'link_before' => '<span>',
						'link_after' => '</span>'
					);
					wp_link_pages( $args );
					?>
				</div>
                
                <?php
				if( get_field( 'video_post_sidebar' ) == "video_post_sidebar_on"):?>
				
					<?php unpress_custom_post_video_tags(); ?>
                    
                    <?php if($ft_option["video_single_author"]=="1"):?>
                    <div class="post-author-wrap ">
                        <div class="media">
                            <a class="pull-left" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                <?php esc_attr( the_author_meta( 'display_name' )); ?>
                                </h4>
                                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                                    <p><?php the_author_meta( 'description' ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>				
                    </div><!-- .post-author-wrap -->
                    <?php endif; ?>
                    
                    <?php
					if($ft_option["video_single_related"]=="1"):
						 get_template_part( 'inc/related', 'video' );
					 endif; 
						
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template('/comments-videos.php');
					}?>
                    
			  <?php endif; ?> 
                
                
                
			</div>
			
            <?php
			if(! get_field( 'video_post_sidebar' ) || get_field( 'video_post_sidebar' ) == "video_post_sidebar_off"):?>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <?php unpress_custom_post_video_tags(); ?>
                    
                    <?php if($ft_option["video_single_author"]=="1"):?>
                    <div class="post-author-wrap ">
                        <div class="media">
                            <a class="pull-left" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                <?php esc_attr( the_author_meta( 'display_name' )); ?>
                                </h4>
                                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                                    <p><?php the_author_meta( 'description' ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>				
                    </div><!-- .post-author-wrap -->
                    <?php endif; ?>
                </div>
           <?php else: ?>
               <div class="sidebar col-md-3 col-lg-3 col-sm-12 col-xs-12">
                   <?php generated_dynamic_sidebar(); ?>
               </div><!-- End: sidebar-->
          <?php endif; ?>  
            
		</div>
	</div>
</section>				
				
				


<!-- Related Posts -->
<?php 
if(! get_field( 'video_post_sidebar' ) || get_field( 'video_post_sidebar' ) == "video_post_sidebar_off"):
	if($ft_option["video_single_related"]=="1"):
		 get_template_part( 'inc/related', 'video' );
	 endif; 
	
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template('/comments-videos.php');
	}
endif;

endwhile; 
wp_reset_query(); 
endif; 
?>
</div>
<?php get_footer(); ?>