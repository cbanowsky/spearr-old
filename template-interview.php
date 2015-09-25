<?php 
/**
 * Template Name: Interview Template
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $ft_option;
?>

<?php get_header(); ?>

<?php
//adhere to paging rules
if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) { // applies when this page template is used as a static homepage in WP3+
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$args = array(
	'posts_per_page' => $ft_option["interview_no_of_posts"],
	'post_type'       => 'interview',
	'paged'				=> $paged,
	'post_status'     => 'publish'
);
query_posts( $args );
?>

<div id="page-wrap">
<section class="container archive archive-interview">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
	</div>
    <?php if ( get_field( 'page_sidebar' ) == 'page_sidebar_on' ):
				$classes = "col-md-9 col-sm-8 clearfix";
				
     	  else:
    			$classes = "col-md-12 col-sm-12 clearfix";
    	  endif;
	?>
    
	<div class="row">
		<div class="<?php echo $classes; ?>">
			
            <?php 
			if (have_posts()) :
			while (have_posts()) : the_post(); 
			$interview = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'interview-img' );
			?>
            
            <div class="interview">
				<div class="row">
					<div class="col-md-6 pull-right">
						<?php if(!empty($interview[0])):?>
                        <div class="featured-image image-holder holder">
							<a class="overlay" href="<?php the_permalink(); ?>">
								<span class="hover">
						            <span class="hover-btn"><i class="fa fa-angle-right"></i></span>
						        </span><!-- .hover -->
								<img src="<?php echo $interview[0]; ?>" data-original="<?php echo $interview[0]; ?>" alt="image">
							</a><!-- .overlay -->
                            <?php
                            $int_tags = wp_get_post_terms($post->ID, 'interview-tags');
                            
							
							if(!empty($int_tags)):
							?>
                            <div class="tag-holder">
                                <?php 
								foreach($int_tags as $itag):
									$term_link = get_term_link( $itag, 'interview-tags' );
									echo '<a href="'.$term_link.'">&#35;'.$itag->name.'</a> ';
								endforeach;
								?>
                            </div><!-- .tag-holder -->
                            <?php endif; ?>
						</div><!-- .featured-image -->
                        <?php endif; ?>
					</div>
					<div class="col-md-6 pull-left">
						<article class="post single-post">
							<?php if( get_field( 'custom_interview_with' ) ): ?>
                            <ul class="list-inline post-category">
								<li><?php _e("with ","favethemes"); the_field( 'custom_interview_with' );?></li>
							</ul>
							<?php endif; ?>
							
                            <div class="post-meta">
								<?php if($ft_option["interview_author_name"]=="1"):?>
								<?php _e("by", "favethemes"); ?> 
								<?php the_author();?> 
								<?php endif; ?>
								<?php _e("on", "favethemes"); ?> <?php esc_attr( the_time( get_option( 'date_format' ) ));?></div>
							
							<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							
							<div class="entry-content">
								<?php echo wp_trim_words( get_the_content(), $ft_option["interview_words"] ); ?>
								<p><a class="read-more" href="<?php the_permalink(); ?>"><?php _e("More","favethemes"); ?> <i class="fa fa-angle-right"></i></a></p>
							</div>						
						</article>
					</div>
				</div>			
			</div>
            <?php
			endwhile; 
			wp_reset_query();
			endif;
			?>
						
		</div>
        <?php if ( get_field( 'page_sidebar' ) == 'page_sidebar_on' ):?>
		<div class="col-md-3 col-sm-4">
			<aside class="sidebar">
				<?php generated_dynamic_sidebar(); ?>
			</aside>
		</div>
        <?php endif; ?>
	</div>
	
</section>
<?php unpress_paging_nav(); ?>
</div>

<?php get_footer(); ?>