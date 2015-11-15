<?php
$intno_of_posts = get_sub_field("interview_number_of_posts");

global $query_string;
	$args = array(
		'posts_per_page' => $intno_of_posts,
		'post_type'       => 'interview',
		'post_status'     => 'publish'
	);
query_posts( $args );
?>

<div id="homepage-interviews-carousel">
  <div id="homepage-interviews-carousel-navigation-wrapper">
    <div class="homepage-interviews-carousel-navigation clearfix">
      <?php if( get_sub_field( 'Interview_section_title' ) ): ?>
      <h3>
        <?php the_sub_field( 'Interview_section_title' ); ?>
      </h3>
      <?php endif; ?>
      <div class="homepage-interviews-carousel-arrows"> <a href="#" id="interviews-carousel-prev"><i class="fa fa-angle-left"></i></a> <a href="#" id="interviews-carousel-next"><i class="fa fa-angle-right"></i></a> </div>
    </div>
  </div>
  <div id="unPress-Homepage-Interviews-Carousel">
    <?php 
		if (have_posts()) :
		while (have_posts()) : the_post(); 
			$interview_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'interview-carousel' );
		if (!empty($interview_img[0]) ):
		?>
    <div class="slide">
      <ul class="list-unstyled">
        <li class="interview-slide-wrap">
          <div class="interviews-carousel-slide-title text-center">
            <?php if( get_field( 'custom_interview_with' ) ): ?>
            <span class="interviews-slide-title">
            <?php the_field( 'custom_interview_with' ); ?>
            </span>
            <?php endif; ?>
            <h4 class="interviews-slide-sub-title"><a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
              </a></h4>
            <a class="interview-more" href="<?php the_permalink(); ?>">
            <?php _e("More", "favethemes"); ?>
            <i class="fa fa-angle-right"></i> </a> </div>
          <a href="<?php the_permalink(); ?>"> <img class="interviews-carousel-slide-image" src="<?php echo $interview_img[0]; ?>" data-original="<?php echo $interview_img[0]; ?>" alt="image"> </a> </li>
      </ul>
    </div>
    <!-- . slide -->
    <?php
		endif;
		endwhile; 
		endif;
		wp_reset_query();
		?>
  </div>
</div>