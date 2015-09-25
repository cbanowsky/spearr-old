<?php
/**
 * All Video
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/

global $ft_option;

$custom_video_number_of_posts = get_sub_field("custom_video_number_of_posts");
//adhere to paging rules
if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) { // applies when this page template is used as a static homepage in WP3+
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$args = array(
	'posts_per_page' => $custom_video_number_of_posts,
	'post_type'       => 'video',
	'paged'				=> $paged,
	'post_status'     => 'publish'
);
query_posts( $args );
$video_cats = get_terms('video-categories');
?>
<ul id="isotope-filter" class="list-unstyled list-inline clearfix">
    
    <?php if(get_sub_field("videos_main_title")):?>
    	<li><?php the_sub_field("videos_main_title"); ?></li>
    <?php endif; ?>
    <?php if(get_sub_field("all_video_title")):?>
        <li class="active">
            <a class="all btn" href="#all" data-filter="*"><?php the_sub_field("all_video_title"); ?></a>
        </li>
    <?php endif; ?>
    <?php foreach($video_cats as $cat): ?>
        <li>
            <a data-filter=".<?php echo $cat->slug; ?>" class="<?php echo $cat->slug; ?> btn" href="#<?php echo $cat->slug; ?>" data-rel="glamour"><?php echo $cat->name; ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<?php if (have_posts()) : ?>	
<ul id="archive-list" class="row isotope filterable-grid list-unstyled">
    
    <?php 
		while (have_posts()) : the_post(); 
		
			$video_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'block-size' );
			
			$item_classes = '';

			$vd_cat = '';

			$item_cats = wp_get_post_terms($post->ID, 'video-categories');

			if($item_cats):

			foreach($item_cats as $item_cat) {

				$item_classes .= $item_cat->slug . ' ';

				$vd_cat .= $item_cat->name . ', ';

			}
			endif;
		?>
            <li class="col-md-3 col-lg-3 col-sm-3 col-xs-12 nopadding block <?php echo $item_classes; ?>" data-type="<?php echo $item_classes; ?>" id="1">
               <a href="<?php the_permalink(); ?>">
               <div class="video-slide-wrap">
                    <div class="videos-carousel-slide-title">
                        <span class="videos-slide-category">
							<?php unpress_taxonomy_strip('video-categories'); ?>
                        </span>
                        <h4 class="videos-slide-sub-title"><?php the_title(); ?></h4>
                    </div>
                    <img class="videos-carousel-slide-image" src="<?php echo $video_img[0]; ?>" data-original="<?php echo $video_img[0]; ?>" alt="<?php the_title(); ?>">
                </div>
                </a>
            </li>
    <?php
	endwhile; 
	?>
    
</ul>
<?php unpress_paging_nav(); ?>
<?php wp_reset_query(); ?>
<?php endif; ?>