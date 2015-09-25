<?php 
/**
 * Template Name: Page Composer
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
?>

<?php get_header(); ?>
	
    
    <div id="page-wrap">
        
		<?php
		
        /*=== Homepage Builder ===*/ 
        while( has_sub_field( "page_composer" ) ):
            
            /* Posts Slider */ 
            if( get_row_layout() == "posts_slider" ):
                
                if(get_sub_field("post_slider_type")=="iosslider"):
					  get_template_part ( 'composer/sliders/post', 'iosslider' );
					  
				 elseif(get_sub_field("post_slider_type")=="flexslider"):
				 
				 	  if(get_sub_field( 'post_slider_width' ) == 'boxed'):
						  get_template_part ( 'composer/sliders/post', 'flexslider' );
					  else:
					  	  get_template_part ( 'composer/sliders/post', 'flexslider-full' );
					  endif;
					  
				 elseif(get_sub_field("post_slider_type")=="elasticslider"):
				 
				 	  if(get_sub_field( 'post_slider_width' ) == 'boxed'):
					  	 get_template_part ( 'composer/sliders/post', 'elasticslider' );
					  else:
					  	 get_template_part ( 'composer/sliders/post', 'elasticslider-full' );
					  endif;
				 
				 endif;
			
			elseif(get_row_layout() == "custom_slider" ):
				  
				  if(get_sub_field("custom_slider_type")=="iosslider"):
					  get_template_part ( 'composer/sliders/custom', 'iosslider' );
					  
				 elseif(get_sub_field("custom_slider_type")=="flexslider"):
				 	  
					  if(get_sub_field( 'custom_slider_width' ) == 'boxed'):
					  		get_template_part ( 'composer/sliders/custom', 'flexslider' );
					  else:
					  		get_template_part ( 'composer/sliders/custom', 'flexslider-full' );
					  endif;
				 
				 elseif(get_sub_field("custom_slider_type")=="elasticslider"):
				 	  
					  if(get_sub_field( 'custom_slider_width' ) == 'boxed'):
					  	get_template_part ( 'composer/sliders/custom', 'elasticslider' );
					  else:
					  		get_template_part ( 'composer/sliders/custom', 'elasticslider-full' );
					  endif;	
					  
				 endif;
                
			
			// featured_posts
			elseif( get_row_layout() == "featured_posts" ):
			
				if(get_sub_field("featured_posts_layout")=="featured_masonry"):
					get_template_part ( 'composer/featured', 'masonry' );
				
				elseif(get_sub_field("featured_posts_layout")=="featured_mosaic"):
					get_template_part ( 'composer/featured', 'mosaic' );
				
				elseif(get_sub_field("featured_posts_layout")=="featured_blocks_hover"):
					get_template_part ( 'composer/featured', 'blocks_hover' );
				
				elseif(get_sub_field("featured_posts_layout")=="featured_blocks_under_image"):
					get_template_part ( 'composer/featured', 'blocks_under' );
				endif;
			
			elseif( get_row_layout() == "unpress_revolution_slider" ):
		
					get_template_part ( 'composer/sliders/revolution', 'slider' );
			
			// Latest Posts
			elseif( get_row_layout() == "latest_posts" ):
			
				if(get_sub_field("latest_posts_layout")=="latest_masonry"):
					get_template_part ( 'composer/masonry', 'latestposts' );
				
				elseif(get_sub_field("latest_posts_layout")=="latest_mosaic"):
					get_template_part ( 'composer/mosaic', 'latestposts' );
				
				elseif(get_sub_field("latest_posts_layout")=="latest_blocks_hover"):
					get_template_part ( 'composer/blocks_hover', 'latestposts' );
				
				elseif(get_sub_field("latest_posts_layout")=="latest_blocks_under_image"):
					get_template_part ( 'composer/blocks_under', 'latestposts' );
				endif;
			
			// Latest by category
			elseif( get_row_layout() == "latest_by_category" ):
			
				if(get_sub_field("category_posts_layout")=="category_masonry"):
					get_template_part ( 'composer/category', 'masonry' );
				
				elseif(get_sub_field("category_posts_layout")=="category_mosaic"):
					get_template_part ( 'composer/category', 'mosaic' );
				
				elseif(get_sub_field("category_posts_layout")=="category_blocks_hover"):
					get_template_part ( 'composer/category', 'blocks_hover' );
				
				elseif(get_sub_field("category_posts_layout")=="category_blocks_under_image"):
					get_template_part ( 'composer/category', 'blocks_under' );
				endif;
			
			// Latest by format
			elseif( get_row_layout() == "latest_by_format" ):
			
				if(get_sub_field("format_posts_layout")=="format_masonry"):
					get_template_part ( 'composer/format', 'masonry' );
				
				elseif(get_sub_field("format_posts_layout")=="format_mosaic"):
					get_template_part ( 'composer/format', 'mosaic' );
				
				elseif(get_sub_field("format_posts_layout")=="format_blocks_hover"):
					get_template_part ( 'composer/format', 'blocks_hover' );
				
				elseif(get_sub_field("format_posts_layout")=="format_blocks_under_image"):
					get_template_part ( 'composer/format', 'blocks_under' );
				endif;
			
			// Featured Video
			elseif( get_row_layout() == "featured_video" ):
					get_template_part ( 'composer/featured', 'video' );
				
			//Gallery Carousel
			elseif(get_row_layout() == "gallery_carousel" ):
					get_template_part ( 'composer/gallery', 'carousel' );
			
			
			//Interview Carousel
			elseif(get_row_layout() == "Interview_carousel" ):
					get_template_part ( 'composer/interview', 'carousel' );
			
			//Code Box
			elseif(get_row_layout() == "code_box" ):
					get_template_part ( 'composer/code', 'box' );
			
			//wysiwyg editor
			elseif(get_row_layout() == "wysiwyg_editor_section" ):
					get_template_part ( 'composer/wysiwyg', 'editor' );
			
			//Woo Commerce
			
			//woocommerce_best_seller
			elseif(get_row_layout() == "best_seller_products" ):
					get_template_part ( 'composer/woocommerce/best', 'seller' );
                
			
			//Parallax Banner
			elseif(get_row_layout() == "parallax_banner" ):
					get_template_part ( 'composer/woocommerce/shop-parallax', 'banner' );
					
			//Featured Products
			elseif(get_row_layout() == "unpress_featured_products" ):
					get_template_part ( 'composer/woocommerce/featured', 'products' );  
			
			//Sale Products
			elseif(get_row_layout() == "unpress_sale_products" ):
					get_template_part ( 'composer/woocommerce/sale', 'products' );
			
			//Latest Products
			elseif(get_row_layout() == "unpress_latest_products" ):
					get_template_part ( 'composer/woocommerce/latest', 'products' );
			
			//Code Box
			elseif(get_row_layout() == "unpress_editor" ):
					get_template_part ( 'composer/woocommerce/product', 'editor' );
                
            endif;
            
        endwhile;
		wp_reset_query();
        ?>
   </div><!-- #page-wrap -->
<?php get_footer(); ?>