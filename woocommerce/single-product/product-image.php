<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce, $ft_option;
$attachment_ids = $product->get_gallery_attachment_ids();
?>
    
    <script type="text/javascript">


			(function($){
				$(window).load(function(){

					$("#owl-product").owlCarousel({
							autoPlay : 3000,
							stopOnHover : true,
							
							paginationSpeed : 1000,
							goToFirstSpeed : 2000,
							singleItem : true,
							autoHeight : true,
							transitionStyle:"fade",
	
							// Navigation
							autoPlay: 3000, //Set AutoPlay to 3 seconds
	
	
							// Navigation
							navigation : true,
							navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
							rewindNav : true,
							scrollPerPage : false,
	
							//Pagination
							pagination : true,
							
						});
  				})
		})(jQuery);
		</script>
        
    <div class="external-product-carousel-wrap">
	
		<?php  woocommerce_get_template( 'single-product/sale-flash.php' ); ?>
        
        <div id="owl-product" class="owl-carousel">
            
            
            <?php if ( has_post_thumbnail() ) : ?>
            	
				<?php
					//Get the Thumbnail URL
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' );
					$src_small = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),  apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ));

				?>
             
                <div><span><img alt="prduct_image" class="attachment-shop_single" src="<?php echo $src_small[0]; ?>"></span>
                    <a class="btn-icon btn ilightbox" href="<?php echo $src[0] ?>"><i class="fa fa-arrows-alt"></i></a>
                </div>
				
				<?php endif; ?>	
            
			
			<?php
				if ( $attachment_ids ) {
			
					$loop = 0;
									
					foreach ( $attachment_ids as $attachment_id ) {
						
						printf( '<div><span>%s</span><a href="%s" class="btn-icon btn ilightbox"><i class="fa fa-arrows-alt"></i></a></div>', wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) ), wp_get_attachment_url( $attachment_id ) );
						
						$loop++;
					}
				}
			?>
            
        </div>
    </div>