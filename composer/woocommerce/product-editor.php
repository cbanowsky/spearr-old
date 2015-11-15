<?php 
/**
* Check if WooCommerce is active
**/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
	$number_of_products = get_sub_field("number_of_products");
	$unique_key = unpress_element_key();
?>
    <section class="container module shop-module">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php if( get_sub_field( 'editor_title' ) ): ?>
						<h2 class="shop-module-title text-center"><?php the_sub_field( 'editor_title' ); ?></h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="unpress_product_editor">
                    
                    <?php if( get_sub_field( 'editor_content' ) ): ?>
							<?php the_sub_field( 'editor_content' ); ?>
                	<?php endif; ?>
                    
                </div><!-- .row -->
            </div><!-- .col-lg-9 -->
        </div><!-- .row -->
    </section><!-- .container -->

<?php } ?>