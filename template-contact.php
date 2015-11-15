<?php
/**
 * Template Name: Template Contact Us
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $ft_option; // Fetch options stored in $ft_option;
?>
<?php get_header(); ?>

<?php
if(isset($_POST['submitted'])) {
	
	
		$to = $ft_option['contact_email'];
		$subject = $_POST['contact_subject'];
		$message = $_POST['message'];
		$contactName = $_POST['contactName'];
		$fromemail = $_POST['contact_email'];
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers = "From: $fromemail\n";
		$headers .= "Reply-to: $fromemail\n";
		$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
		
		mail($to,$subject,$message,$headers);
		$emailSent = true;
}
?> 
<div id="page-wrap">
<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="row">
    <?php if ( get_field( 'page_sidebar' ) == 'page_sidebar_on' ):?>
		<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
    <?php else: ?>
    	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">    
    <?php endif; ?>
			<article class="page">
				
				<div class="entry-content">
					<div class="row">
						<div class="col-md-6">
							<ul class="contact-address">
								<li><strong><?php echo $ft_option["company_name"]; ?></strong></li>
								<li><?php echo $ft_option["company_address"]; ?></li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="contact-address">
								<?php if($ft_option["company_phone"]!=""){?>
                                	<li><strong><?php _e("Phone","favethemes"); ?>:</strong>  <?php echo $ft_option["company_phone"]; ?></li>
                                <?php } ?>
                                <?php if($ft_option["contact_email"]!=""){?>
                                	<li><strong><?php _e("Email","favethemes"); ?>:</strong>  <?php echo $ft_option["contact_email"]; ?></li>
                                <?php } ?>
                                <?php if($ft_option["company_fax"]!=""){?>
									<li><strong><?php _e("Fax","favethemes"); ?>:</strong> <?php echo $ft_option["company_fax"]; ?></li>
                                <?php } ?>
							</ul>
						</div>
					</div>			
				</div>
				
				<div class="map">
					<div class="row">
						<div class="col-md-12">
							<?php echo $ft_option["company_map"]; ?>
						</div>
					</div>	
				</div>
                
                <?php if(isset($emailSent) && $emailSent == true) { ?>
                    <div class="alert alert-success">
                        <button type="button" data-dismiss="alert" class="close"><i class="fa fa-remove"></i></button>
                        <?php echo $ft_option["email_success"];?>
                    </div>
                <?php } ?>
				
				<div class="contact-form">
                    <form action="<?php the_permalink(); ?>" name="" method="post">
                    <input type="hidden" name="submitted" id="submitted" value="true" /> 
						<div class="row">
							<div class="form-group col-lg-4 col-md-4 col-sm-12">
								<input type="text" name="contactName" required="required" class="form-control" id="exampleInputEmail1" placeholder="Full Name">
							</div>
							<div class="form-group col-lg-4 col-md-4 col-sm-12">
								<input type="email" name="contact_email" required="required" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>
							<div class="form-group col-lg-4 col-md-4 col-sm-12">
								<input type="text" name="contact_subject" class="form-control" id="exampleInputEmail1" placeholder="Subject">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-12 col-md-12 col-sm-12">
								<textarea name="message" class="form-control" rows="6"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
						    	<div class="col-lg-3 col-md-3 col-sm-12">
                                    <input type="submit" class="btn btn-default" name="submit" value="<?php _e("Submit","favethemes"); ?>">
						  		</div>
							</div>
						</div>				  
					</form>
				</div>
				
			</article>
		</div>
        <?php if ( get_field( 'page_sidebar' ) == 'page_sidebar_on' ):?>
		<div class="col-md-3">
			<aside class="sidebar">
				<?php generated_dynamic_sidebar(); ?>
			</aside>
		</div>
        <?php endif; ?>
	</div>
</section>
</div>
<?php get_footer(); ?>