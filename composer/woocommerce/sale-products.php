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

                <?php if( get_sub_field( 'sale_product_title' ) ): ?>

						<h2 class="shop-module-title text-center"><?php the_sub_field( 'sale_product_title' ); ?></h2>

                <?php endif; ?>

            </div>

        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="row post-row" id="owl-sale-<?php echo $unique_key; ?>">

                    

                    <?php
					
				
    

                     $args = array(

                        'post_type' => 'product',

						'post_status' => 'publish',

						'ignore_sticky_posts'   => 1,

						'posts_per_page' => $number_of_products,

						'orderby' => $orderby,

						'order' => $order,

						'meta_query'     => array(
							'relation' => 'OR',
							array( // Simple products type
								'key'           => '_sale_price',
								'value'         => 0,
								'compare'       => '>',
								'type'          => 'numeric'
							),
							array( // Variable products type
								'key'           => '_min_variation_sale_price',
								'value'         => 0,
								'compare'       => '>',
								'type'          => 'numeric'
							)
						)

                    );

                    

                    $products = new WP_Query( $args );

                    

                    if ( $products->have_posts() ) : ?>

                        <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                            <div class="product-holder col-lg-12 col-md-12 col-sm-12 col-xs-12">

								<?php woocommerce_get_template_part( 'content', 'product' ); ?>

                            </div>

                            

                        <?php endwhile; // end of the loop. ?>

                    <?php

                    

                    endif; 

                    wp_reset_query();

                    ?>

                    

                </div><!-- .row -->

            </div><!-- .col-lg-9 -->

        </div><!-- .row -->

    </section><!-- .container -->

    <script>

    jQuery(document).ready(function($) {

     

        $("#owl-sale-<?php echo $unique_key; ?>").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 4,

    

            // Navigation

            navigation : true,

            navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],

            rewindNav : true,

            scrollPerPage : false,
			responsive : true,

    

            //Pagination

            pagination : false,

        });

     

    });

    </script>



<?php } ?>