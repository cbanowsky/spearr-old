<?php 
/**
 * Latest Posts By Category
 * Page Composer Section
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $tf_option;

$posts_per_page = get_sub_field("category_number_of_posts");
$cat_id = get_sub_field( 'category_section_name' ); // get the category id which will filter the section

if(get_sub_field('category_pagination')=="enable"){
	//adhere to paging rules
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) { // applies when this page template is used as a static homepage in WP3+
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	
	global $query_string;
		$args = array(
			'posts_per_page' => $posts_per_page,
			'cat'        	 =>  $cat_id,
			'post_type'      => 'post',
			'paged'				=> $paged,
			'post_status'    => 'publish'
		);
}
else
{
	global $query_string;
		$args = array(
			'posts_per_page' => $posts_per_page,
			'cat'        	 =>  $cat_id,
			'post_type'      => 'post',
			'post_status'    => 'publish'
		);
}
query_posts( $args );
?>

<section class="container module mosaic masonry">
	<div class="row">
		
		<?php 
		if(!get_sub_field( 'category_section_title_position' ) || get_sub_field( 'category_section_title_position' )=="left_side"):
        		$class_box_title = "title-box-left";
        elseif(get_sub_field( 'category_section_title_position' )=="right_side"):
        		$class_box_title = "title-box-right";
        endif; ?>
        
<!-- 		<div class="col-lg-3 col-md-3 col-sm-4 sticky-col <?php echo $class_box_title; ?>">
			<div class="category-box sticky-box static_col">
				<?php if( get_sub_field( 'category_main_title' ) ): ?>
                        <h2><?php the_sub_field( 'category_main_title' ); ?></h2>
                <?php endif; ?>
                <?php if( get_sub_field( 'category_all_post' ) ): ?>
                <?php $category_link = get_category_link( $cat_id ); ?>
                <?php $category_name = get_the_category_by_ID( $cat_id ); ?> 
                <p><?php the_sub_field( 'category_all_post' ); ?> <a href="<?php echo esc_url( $category_link ); ?>"><?php echo esc_attr( $category_name ); ?></a></p>
                <?php endif; ?>
            </div>
		</div> -->
        
        <div class="col-lg-12 col-md-9 col-sm-8">
			<div class="row post-row">
				
				<?php 
					$i=0;
					
					if (have_posts()) :
                        while (have_posts()) : the_post(); $i++;  
                        	
							if($i==2 || $i==4):
								echo '<div class="post-holder large-mosaic col-lg-8 col-md-8 col-sm-12 col-xs-12">';
							else:
                            	echo '<div class="post-holder col-lg-4 col-md-4 col-sm-12 col-xs-12">';
							endif;
							?>
                                <?php get_template_part( 'post-format/mosaic', get_post_format() ); ?>
                                
                            </div>
            	
				<?php
						if($i==6){ $i=0; }
                    	endwhile; 
                endif;
                ?> 
							
			</div><!-- .row -->
		</div><!-- .col-lg-9 -->
        
      </div><!-- .row -->
      <div class="cover-break">
      	<h1>Break No. 1</h1>
      </div>
</section><!-- .container -->
<?php
if(get_sub_field('category_pagination')=="enable"):
		unpress_paging_nav(); 
endif;
?>
<?php wp_reset_query(); ?>