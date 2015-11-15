<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $ft_option;
get_header('shop'); ?>

<div id="page-wrap">
    <section class="container">
        <div class="row">
        <?php if($ft_option['main_shop_layout'] == 'right-sidebar' || $ft_option['main_shop_layout'] == 'left-sidebar' ) { ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php }else{ ?>
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php } ?>
       
	   <?php 
      /** Output the WooCommerce Breadcrumb  */
      $defaults = array(
        'delimiter'  => '',
        'wrap_before'  => '<ol class="breadcrumb woocommerce-breadcrumb pull-left">',
        'wrap_after' => '</ol>',
        'before'   => '<li>',
        'after'   => '</li>',
        'home'    => 'Home'
      );
      $args = wp_parse_args(  $defaults  );
      woocommerce_get_template( 'shop/breadcrumb.php', $args );
      ?>
           	<div class="pull-right clear-on-mobile">
                <?php if ( have_posts() ) : do_action( 'woocommerce_before_shop_loop' ); ?>
                <?php endif; ?>
            </div>
            </div>
            
        </div>
    </section>
    <section class="container">
        <div class="row">
        <?php if($ft_option['main_shop_layout'] == 'right-sidebar') { ?>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-left">
        <?php } else if ($ft_option['main_shop_layout'] == 'left-sidebar') { ?>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-right">
            <?php } else { ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php } ?>
                <div class="row">
                    <?php do_action( 'woocommerce_archive_description' ); ?>
                    <?php if ( have_posts() ) : ?>
                    <?php woocommerce_product_loop_start(); ?>
                    <?php woocommerce_product_subcategories(); ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                    <?php endwhile; // end of the loop. ?>
                    <?php woocommerce_product_loop_end(); ?>
                    <?php
                        /**
                         * woocommerce_after_shop_loop hook
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action( 'woocommerce_after_shop_loop' );
                    ?>
                    <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
                    <?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>
                    <?php endif; ?>
                    <?php if( $ft_option['search_result'] && get_search_query() ) : ?>
                    <?php
              
              query_posts( array( 'post_type' => array( 'post', 'page' ), 's' => get_search_query() ) );
        
              if(have_posts()){ echo '<div class="row"><div class="large-12 columns"><hr/>'; }
        
              while ( have_posts() ) : the_post();
                $wc_page = false;
                if($post->post_type == 'page'){
                  foreach (array('myaccount', 'edit_address', 'change_password', 'lost_password', 'shop', 'cart', 'checkout', 'pay', 'view_order', 'thanks', 'terms') as $wc_page_type) {
                    if( $post->ID == woocommerce_get_page_id($wc_page_type) ) $wc_page = true;
                  }
                }
                if( !$wc_page ) get_template_part( 'content', get_post_format() );
              endwhile;
        
              if(have_posts()){ echo '</div></div>'; }
        
              wp_reset_query();
            ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- end 12 col -->
            
            <?php if($ft_option['main_shop_layout'] == 'right-sidebar') { ?>
            <!-- Right Shop sidebar -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php dynamic_sidebar('woocomerce-sidebar'); ?>
            </div>
            <?php } else if ($ft_option['main_shop_layout'] == 'left-sidebar') { ?>
            <!-- Left Shop sidebar -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php dynamic_sidebar('woocomerce-sidebar'); ?>
            </div>
            <?php } ?>
        </div>
        <!-- End row --> 
    </section>
</div>
<!-- # End Page Wrap -->

<?php get_footer('shop'); ?>
