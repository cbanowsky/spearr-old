<?php 
/**
 * The Template for displaying all single interview posts
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $ft_option;
?>

<?php get_header(); ?>

<section class="container">
	<div class="row">
    <?php 
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
	  $post_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
	  // Set post view
	  fave_setPostViews(get_the_ID()); 
    ?>
		<div class="col-md-11">
			<div class="row">
				
                <?php if(! get_field( 'interview_posts_sidebar' ) || get_field( 'interview_posts_sidebar' ) == "interview_post_sidebar_off"):?>
                <div class="col-md-6 pull-right">
					<div class="post-image ">
						<a class="btn-icon btn ilightbox" href="<?php echo $post_image[0]; ?>">
							<i class="fa fa-arrows-alt"></i>
						</a>
                        <img src="<?php echo $post_image[0]; ?>" alt="<?php the_title();?>">
					</div>
				</div>
                <?php endif; ?>
                
				<?php 
                if(! get_field( 'interview_posts_sidebar' ) || get_field( 'interview_posts_sidebar' ) == "interview_post_sidebar_off"):
                echo '<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 pull-left">';
                else:
                echo '<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 pull-left">';
                endif;	
                ?>
                	<?php if(get_field( 'interview_posts_sidebar' ) == "interview_post_sidebar_on"):?>
						<?php if(!empty($post_image[0])):?>
                        <div class="post-image ">
                            <a class="btn-icon btn ilightbox" href="<?php echo $post_image[0]; ?>">
                                <i class="fa fa-arrows-alt"></i>
                            </a>
                            <img src="<?php echo $post_image[0]; ?>" alt="<?php the_title();?>">
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    
					<article class="post single-post ">
						<?php if( get_field( 'custom_interview_with' ) ): ?>
                        <ul class="list-inline post-category">
                            <li><?php _e("with ","favethemes"); the_field( 'custom_interview_with' );?></li>
                        </ul>
                        <?php endif; ?>
						
						<div class="post-meta">
                        	
							<?php if($ft_option["interview_author_name"]=="1"):?>
							<?php _e("by", "favethemes"); ?> 
                        	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_attr( the_author_meta( 'display_name' )); ?></a>
                        	<?php endif; ?>
                        	
                            <?php if($ft_option["interview_post_date"]=="1"):?>
								<?php _e("on", "favethemes"); ?> 
                                <?php the_time(get_option('date_format')); ?>
                            <?php endif; ?>
                        </div>
                        
						<?php
                        // Post likes and views
						get_template_part("inc/likes-views");
						?>
						
						<h1 class="post-title"><?php the_title(); ?></h1>
						
						<div class="entry-content">
							<?php the_content(); ?>			
						</div>
						
						<?php unpress_custom_post_interview_tags(); ?>
                        
                        <?php if($ft_option["interview_single_author"]=="1"):?>
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
						
					</article>
                    
                    <?php 
					if(get_field( 'interview_posts_sidebar' ) == "interview_post_sidebar_on"):
						// Related Posts 
						if($ft_option["interview_single_related"]=="1"):
							get_template_part( 'inc/related', 'interview' );
						endif;
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							//comments_template();
							comments_template( '/comments-interviews.php' );
						}
						
                    endif; 
                    ?>
                    
				</div>
                
                <?php if(get_field( 'interview_posts_sidebar' ) == "interview_post_sidebar_on"):?>
                <div class="sidebar col-md-3 col-lg-3 col-sm-12 col-xs-12 pull-right">
                	<?php generated_dynamic_sidebar(); ?>
                </div>
                <?php endif; ?>
                
			</div>
		</div>
	<?php
    endwhile;
	wp_reset_query();
	endif;?>	
		<div class="col-md-1">
			
            <?php if($ft_option["interview_single_social"]=="1"):?>
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
				<?php if($ft_option["interview_single_nav_arrows"]=="1"):?>
                <!-- Article nav -->
				<nav class="component_next-previous-articles">
                <!-- Next and previous articles here -->
                <?php 
				
				$prevPost = get_previous_post();
				if($prevPost) {
					$args = array(
						'posts_per_page' => 1,
						'post_type' => 'interview',
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
							'post_type' => 'interview',
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
	</div><!-- End. Row -->  
</section>
<?php 
if(! get_field( 'interview_posts_sidebar' ) || get_field( 'interview_posts_sidebar' ) == "interview_post_sidebar_off"):

	if($ft_option["interview_single_related"]=="1"):
		get_template_part( 'inc/related', 'interview' );
	endif;
	
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		//comments_template();
		comments_template( '/comments-interviews.php' );
	} 

endif;
?>
	
<?php get_footer(); ?>