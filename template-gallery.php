<?php 
/**
 * Template Name: Gallery Template
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
	'posts_per_page' => $ft_option["gallery_no_of_posts"],
	'post_type'       => 'gallery',
	'paged'				=> $paged,
	'post_status'     => 'publish'
);
query_posts( $args );
$gallery_cats = get_terms('gallery-categories');
?>
<div id="page-wrap">
<section class="container archive archive-gallery">
	
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>
	
	<ul id="isotope-filter" class="list-unstyled list-inline clearfix">
		<li><?php echo $ft_option["gallery_title"]; ?></li>
		<li class="active">
			<a class="all btn" href="#all" data-filter="*"><?php _e('All', 'favethemes'); ?></a>
		</li>
        <?php foreach($gallery_cats as $g_cat): ?>
		<li>
			<a data-filter=".<?php echo $g_cat->slug; ?>" class="<?php echo $g_cat->slug; ?> btn" href="#<?php echo $g_cat->slug; ?>" data-rel="<?php echo $g_cat->slug; ?>"><?php echo $g_cat->name; ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
	
	<ul id="archive-list" class="row isotope filterable-grid list-unstyled">
	    
        <?php 
		if (have_posts()) :
		while (have_posts()) : the_post(); 
		if (has_post_thumbnail( $post->ID ) ):
			$gallery = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gallery-img' );
			
			$item_classes = '';

			$gl_cat = '';

			$item_cats = wp_get_post_terms($post->ID, 'gallery-categories');

			if($item_cats):

			foreach($item_cats as $item_cat) {

				$item_classes .= $item_cat->slug . ' ';

				$gl_cat .= $item_cat->name . ', ';

			}
			endif;
			
		?>
            <li class="col-md-4 col-lg-4 col-sm-4 col-xs-12 nopadding block <?php echo $item_classes; ?>" data-type="<?php echo $item_classes; ?>">
                <a href="<?php the_permalink(); ?>">
                <div class="gallery-slide-wrap">
                    <div class="galleries-carousel-slide-title">
                        <span class="galleries-slide-category"><?php echo substr($gl_cat, 0, -2);?></span>
                        <h4 class="galleries-slide-sub-title"><?php the_title(); ?></h4>
                    </div>
                    <img class="galleries-carousel-slide-image" src="<?php echo $gallery[0]; ?>" data-original="<?php echo $gallery[0]; ?>" alt="image">
                </div>
                </a>
            </li>
        <?php
		endif;
		endwhile; 
		endif;
		?> 
	    
	</ul>
</section>
<?php unpress_paging_nav(); ?>
<?php wp_reset_query(); ?>
</div>
<?php get_footer(); ?>