<?php
#-----------------------------------------------------------------#
# Woocommerce
#-----------------------------------------------------------------#

add_theme_support( 'woocommerce' );
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function wp_enqueue_woocommerce_style(){
	wp_register_style( 'woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'woocommerce' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );


/* UNREGISTRER DEFAULT WOOCOMMERCE HOOKS 
==============================================================*/
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );



// Image sizes
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'fave_woocommerce_image_dimensions', 1 );
 

// Define image sizes 
function fave_woocommerce_image_dimensions() {
	$catalog = array(
		'width' => '292',	
		'height'	=> '310',	
		'crop'	=> 1 
	);
	 
	$single = array(
		'width' => '600',	
		'height'	=> '630',	
		'crop'	=> 1 
	);
	 
	$thumbnail = array(
		'width' => '100',	
		'height'	=> '100',	
		'crop'	=> 1 
	);
	 
	
	update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
	update_option( 'shop_single_image_size', $single ); // Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
}


/*  ADD TO CART DROPDOWN (gets inserted with ajax) */
add_filter('add_to_cart_fragments', 'unpress_add_to_cart_dropdown'); 
function unpress_add_to_cart_dropdown( $fragments ) {
	global $woocommerce;
    global $ft_option;
	ob_start();
	?>
	<li class="cart-inner dropdown">
        <a class="cart-btn" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>">
            <i class="fa fa-shopping-cart"></i> 
            <?php _e('Cart', 'favethemes'); ?> <?php echo $woocommerce->cart->get_cart_total(); ?> / <?php _e('Item:', 'favethemes'); ?> <?php echo $woocommerce->cart->cart_contents_count; ?>
        </a>
        <ul class="menu-cart-wrap-dropdown-menu dropdown-menu" role="menu">
            
        <?php                                    
        if (sizeof($woocommerce->cart->cart_contents)>0) : foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
            $_product = $cart_item['data'];                                            
            if ($_product->exists() && $cart_item['quantity']>0) :  ?>
            
            <li>
                <div class="menu-cart-wrap">
                   
                    <div class="row">
                        
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="fa fa-close"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key ); ?>
                        </div>
                        
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <?php   echo '<a class="cart_list_product_img" href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_image().'</a>';?>
                        </div>
                        
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <div>
                                <?php 
                                 $product_title = $_product->get_title();
                                 echo '<a class="menu-cart-product-title" href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $product_title, $_product) . '</a>';?>
                             </div>
                            <span class="amount"><?php echo woocommerce_price($_product->get_price()); ?></span>
                            <span class="menu-cart-qty"><?php echo _e('Qty', 'woocommerce').': '. $cart_item['quantity']; ?></span>
                        </div>
                    </div>
                </div>
            </li>
            
            <?php                                        
                endif;                                        
                endforeach;
            ?>
            
            <li>		
                <div class="menu-cart-buttons-wrap">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <span class="menu-cart-sub-total"><?php _e('Cart Subtotal', 'woocommerce'); ?> <strong><?php echo $woocommerce->cart->get_cart_total(); ?></strong></span>
                            <div class="menu-cart-buttons">
                                <a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="btn btn-block menu-cart-button"><?php _e('View Cart', 'favethemes'); ?></a>
                                <a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="btn btn-block checkout-btn bordered-btn"><?php _e('Proceed to Checkout', 'favethemes'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            
            <?php                                        
            else: 
                echo '<p class="empty">'.__('No products in the cart.','woocommerce').'</p>'; 
            endif; ?>
            
        </ul>
    </li><!-- .cart-inner -->

	<?php
	$fragments['.cart-inner'] = ob_get_clean();
	return $fragments;
}

?>