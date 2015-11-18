<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content.
 *
 * @package UnPress
 * @since UnPress 1.0
 */
 global $ft_option;
?>

<!-- Shop Footer -->

<?php get_template_part('shop', 'footer');?>

<?php if (is_active_sidebar('footer-newsletter-sidebar')): ?>
<div class="newsletter-signup">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php dynamic_sidebar('footer-newsletter-sidebar'); ?>
            </div>
        </div>
    </div>
</div>
<?php endif ?>

<!-- Footer -->
<footer id="footer">

    <?php get_sidebar( 'footer' ); // Output the footer sidebars ?>    
    
    <div class="footer-2-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left"><a href="#">SPEARR</a> - All right reserved</div>
                    <!--<div class="pull-right"><?php echo $ft_option["copyright_text"]; ?></div>-->
                </div>
            </div>
        </div>	
    </div>
    
</footer>
</div>
<!--/#inner-wrap-->
</div>
<!--/#outer-wrap-->
<?php wp_footer(); ?> 
</body>
</html>
