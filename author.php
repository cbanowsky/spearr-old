<?php 
/**
 * Author template. Display the author 
 * info and all posts by the author
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/ 
?>

<?php get_header(); ?>
<div id="page-wrap">
<?php $curauth = get_query_var( 'author_name' ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) ); ?>	



<section class="container module masonry">
	<div class="row">
        
        <div class="col-lg-3 col-md-3 col-sm-4 sticky-col">
            <div class="category-box sticky-box">
                <h2 class="post-author-title">
                    <?php echo get_avatar($curauth->ID, 100); ?> <br>
                    <?php echo $curauth->display_name; ?>           
                </h2>
            </div>
            <div class="post-author-bio">
                <p><strong><?php _e('Biography', 'favethemes'); ?></strong></p>
                <p><?php echo $curauth->description; ?></p>
            </div>
            <div class="post-author-info">
                <p><strong><?php _e('Find me on:', 'favethemes'); ?></strong></p>
                <ul class="list-inline">
                    <?php 
					
					if($curauth->unpress_author_flickr){ 
						echo '<li><a href="'.$curauth->unpress_author_flickr.'"><i class="fa fa-flickr"></i></a></li>';
					}
					if($curauth->unpress_author_pinterest){ 
						echo '<li><a href="'.$curauth->unpress_author_pinterest.'"><i class="fa fa-pinterest-square"></i></a></li>';
					}
					if($curauth->unpress_author_youtube){ 
						echo '<li><a href="'.$curauth->unpress_author_youtube.'"><i class="fa fa-youtube-square"></i></a></li>';
					}
					if($curauth->unpress_author_foursquare){ 
						echo '<li><a href="'.$curauth->unpress_author_foursquare.'"><i class="fa fa-foursquare"></i></a></li>';
					}
					if($curauth->unpress_author_instagram){ 
						echo '<li><a href="'.$curauth->unpress_author_instagram.'"><i class="fa fa-instagram"></i></a></li>';
					}
					if($curauth->unpress_author_twitter){ 
						echo '<li><a href="'.$curauth->unpress_author_twitter.'"><i class="fa fa-twitter-square"></i></a></li>';
					}
					if($curauth->unpress_author_vimeo){ 
						echo '<li><a href="'.$curauth->unpress_author_vimeo.'"><i class="fa fa-vimeo-square"></i></a></li>';
					}
					if($curauth->unpress_author_facebook){ 
						echo '<li><a href="'.$curauth->unpress_author_facebook.'"><i class="fa fa-facebook-square"></i></a></li>';
					}
					if($curauth->unpress_author_google_plus){ 
						echo '<li><a href="'.$curauth->unpress_author_google_plus.'"><i class="fa fa-google-plus-square"></i></a></li>';
					}
					if($curauth->unpress_author_linkedin){ 
						echo '<li><a href="'.$curauth->unpress_author_linkedin.'"><i class="fa fa-linkedin-square"></i></a></li>';
					}
					if($curauth->unpress_author_tumblr){ 
						echo '<li><a href="'.$curauth->unpress_author_tumblr.'"><i class="fa fa-tumblr-square"></i></a></li>';
					}
					if($curauth->unpress_author_dribbble){ 
						echo '<li><a href="'.$curauth->unpress_author_dribbble.'"><i class="fa fa-dribbble"></i></a></li>';
					}
					?>
                </ul>
            </div>
            
        </div>
        
        <?php if (have_posts()) :?>
        
        <div class="col-lg-9 col-md-9 col-sm-8">
		
			<div class="row post-row">
				
				<?php 
					while (have_posts()) : the_post(); ?>
						
						<div id="post-<?php the_ID(); ?>" <?php post_class("post-holder col-lg-4 col-md-4 col-sm-6 col-xs-12"); ?>>
							<div class="featured-image image-holder holder">
								<?php unpress_masonry_image(); ?>
							</div><!-- .featured-image -->
							
							<div class="post-content-holder">
								<header>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</header>
								
								<div class="post-entry-holder">
									<?php the_excerpt(); ?>
								</div><!-- .post-entry-holder -->
								
							</div><!-- .post-content-holder -->
						</div><!-- .post-holder -->
				<?php
					endwhile;
                ?> 
							
			</div><!-- .row -->
		</div><!-- .col-lg-9 -->
        <?php
		//Page Nav
		unpress_paging_nav();
		 
		else:
			get_template_part( 'content', 'none' );
		endif;
		wp_reset_query();
		?>
	</div><!-- .row -->
</section><!-- .container -->

</div>
<?php get_footer(); ?>
