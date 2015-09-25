<?php 
/**
 * 404 error page
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/ 
global $ft_option;
?>

<?php get_header(); ?>

<div id="page-wrap">
	<section class="container error-page">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 text-center clearfix">
				<div class="row post-row">	
					<?php if( $ft_option['error_image'] !='' ){ ?>
	                    <img src="<?php echo $ft_option['error_image']; ?>" alt="<?php echo $ft_option['error_title']; ?>" width="400" height="400" />
	                <?php } ?>
	                <h1><?php echo $ft_option['error_title']; ?></h1>
				</div>
			</div>
		</div>
	</section>
</div> 
	
<?php get_footer(); ?>