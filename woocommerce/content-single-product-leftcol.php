<?php
 
	global $post, $product, $ft_option;

	// Get category permalink
	$permalinks 	= get_option( 'woocommerce_permalinks' );
	$category_slug 	= empty( $permalinks['category_base'] ) ? _x( 'product-category', 'slug', 'woocommerce' ) : $permalinks['category_base'];
 
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>	
  		
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        	<?php if ( is_active_sidebar( 'woocomerce-sidebar' ) ) : ?>
            		
					<?php dynamic_sidebar('woocomerce-sidebar'); ?>
                    
            <?php endif; ?>
        </div>
        
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        
			<?php
                /**
                 * woocommerce_before_single_product hook
                 *
                 * @hooked woocommerce_show_messages - 10
                 */
                 do_action( 'woocommerce_before_single_product' );
            ?>    
           
            <div class="row">
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <?php
                    /**
                     * woocommerce_show_product_images hook
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action( 'woocommerce_before_single_product_summary' );
                ?>
            </div>
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <?php
                        /**
                         * woocommerce_single_product_summary hook
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked ProductShowReviews() (inc/template-tags.php) - 15
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40
                         * @hooked woocommerce_template_single_sharing - 50
                         */
                        do_action( 'woocommerce_single_product_summary' );
                    ?>
                </div>
                
            </div><!-- End Row -->
            
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <?php woocommerce_get_template('single-product/tabs/tabs.php'); ?>
                </div>
            </div>
            
            
    
    <?php /*?><div class="product-page-aside large-2 small-12 columns text-center hide-for-small">
        
        <div class="next-prev-nav">
            <?php // edit this in inc/template-tags.php // ?>
            <?php next_post_link_product('%link', 'icon-angle-left next', true); ?>
            <?php previous_post_link_product('%link', 'icon-angle-right prev', true); ?>
        </div>
    
         <?php  //woocommerce_get_template('single-product/up-sells.php');?> 
    
    </div><?php */?> <!--.product-page-aside --> 
         
            
        
        
    <?php
        //Get the Thumbnail URL for pintrest
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' );
    ?>
    
    
        <div class="row">
            <?php
                /**
                 * woocommerce_after_single_product_summary hook
                 *
                 * @hooked woocommerce_output_related_products - 20
                 */
    
               do_action( 'woocommerce_after_single_product_summary' );
    
            ?>
        </div><!-- related products -->
    	
        </div>
        
</div><!-- #product-<?php the_ID(); ?> -->

<?php //do_action( 'woocommerce_after_single_product' ); ?>