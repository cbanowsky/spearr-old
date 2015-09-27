<?php 
/** 
 * Standard post format
 * Image Outputs without a link in single
 * Image Outputs as a link in the archive pages
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/ 
global $ft_option;
?>

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
            <?php if($ft_option['posts_default_sidebar_on']== 0 ): ?>
				<?php if(! get_field( 'post_sidebar' ) || get_field( 'post_sidebar' ) == "post_sidebar_off"):?>
                    <div class="col-md-6 pull-right">
                        <?php if(!empty($post_image[0])):?>
                        <div class="post-image ">
                            <a class="btn-icon btn ilightbox" href="<?php echo $post_image[0]; ?>">
                                <i class="fa fa-arrows-alt"></i>
                            </a>
                            <img src="<?php echo $post_image[0]; ?>" alt="<?php the_title();?>">
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
            <?php 
			if($ft_option['posts_default_sidebar_on']== 0 ):
				if(! get_field( 'post_sidebar' ) || get_field( 'post_sidebar' ) == "post_sidebar_off"):
					echo '<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 pull-left">';
				  else:
				  	echo '<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 pull-left">';
				 endif;
			else:
				echo '<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 pull-left">';
			endif;	 	
            ?>
					<?php if($ft_option['posts_default_sidebar_on']== 0 ): ?>
						<?php if(get_field( 'post_sidebar' ) == "post_sidebar_on"):?>
                            <?php if(!empty($post_image[0])):?>
                            <div class="post-image ">
                                <a class="btn-icon btn ilightbox" href="<?php echo $post_image[0]; ?>">
                                    <i class="fa fa-arrows-alt"></i>
                                </a>
                                <img src="<?php echo $post_image[0]; ?>" alt="<?php the_title();?>">
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
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
						<ul class="post-category" style="color: #000;">
							<li style="font-color: #000;"><?php esc_attr( the_category('|  ') ); ?></li>
						</ul>
						

          
                        
						<h1 class="post-title"><?php the_title(); ?></h1>

						<div class="post-meta">
							
                            <?php if($ft_option["single_author_name"]=="1"):?>
							
							<?php _e("by", "favethemes"); ?> 
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php esc_attr( the_author_meta( 'display_name' )); ?>
                            </a>
                            |
                            <?php endif; ?>
                            
                            <?php if($ft_option["single_post_date"]=="1"):?>
							<?php _e("on", "favethemes"); ?> 
                            <?php the_time(get_option('date_format')); ?>
                            <?php endif; ?>
                            
                        </div>
						
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
                        
                        
						<?php if( has_tag() ): ?>
						<div class="tags-wrap ">
							<h3><?php _e("Tags", "favethemes"); ?></h3>
                            <?php esc_attr( unpress_post_tags() );?>
						</div><!-- .tags-wrap -->
						<?php endif; ?>
                        
						<!-- .post-author-box -->
                        <?php unpress_author_box(); ?>
                        <!-- .end post-author-box -->
						
					</article>
                    
                    <?php
					if($ft_option['posts_default_sidebar_on']== 0 ):
						if( get_field( 'post_sidebar' ) == "post_sidebar_on"):
							if($ft_option["single_related"]=="1"): 
								get_template_part( 'inc/related', 'posts' ); 
							endif;
							
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						endif;
				    else:
						if($ft_option["single_related"]=="1"): 
							get_template_part( 'inc/related', 'posts' ); 
						endif;
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					endif;
					?>
                    
				</div>
                <?php if($ft_option['posts_default_sidebar_on']== 0 ):?>
					<?php if(get_field( 'post_sidebar' ) == "post_sidebar_on"):?>
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 pull-right">
                        <?php get_sidebar(); ?>
                    </div>
                    <?php endif; ?>
                <?php else: ?>
                		<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 pull-right">
							<?php get_sidebar(); ?>
                        </div>
                <?php endif; ?>
			</div>
		</div>
	<?php
    endwhile;
	wp_reset_query();
	endif;?>	
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
</section>