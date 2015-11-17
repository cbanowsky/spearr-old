<?php 
global $ft_option; 
global $woocommerce;
?>

<!-- Navigation -->
<header id="header">
	<!-- for removing the error -->
	<div id="nav-open-btn"></div>
	<div class="navbar <?php if ( $ft_option['site_top_strip'] == 1 ) { echo ' has_secondary_nav'; }  if($ft_option['unpress_sticky_nav'] == 1){ echo ' has_unpress-sticky';}?>" role="navigation">
		<?php if ( $ft_option['site_top_strip'] == 1 ){ ?>
        <div class="secondary-nav">
			<div class="container">
				<div class="unpress-secondary-menu visible-lg visible-md">
                <?php
                // Pages Menu
				if ( has_nav_menu( 'secondary_menu' ) ) :
					wp_nav_menu( array (
						'theme_location' => 'secondary_menu',
						'container' => '',
						'container_class' => '',
						'menu_class' => 'page-nav nav nav-pills navbar-left',
						'menu_id' => 'secondary-nav',
						'depth' => 3,
						'walker' => new unpress_secondary_nav(),
						'fallback_cb' => false
					 ));
				 endif;
                ?>
                
                <?php
                // Pages Menu
				if ( has_nav_menu( 'my_account_menu' ) ) :
					wp_nav_menu( array (
						'theme_location' => 'my_account_menu',
						'container' => '',
						'container_class' => '',
						'menu_class' => 'page-nav nav nav-pills navbar-right',
						'menu_id' => 'my-account-menu',
						'depth' => 3,
						'walker' => new unpress_secondary_nav(),
						'fallback_cb' => false
					 ));
				 endif;
                ?>
                
				</div>

                <?php 
				// Social Profiles
				if( $ft_option['top_social_profiles'] == 1 ) {
					get_template_part ( 'inc/social', 'media' ); 
				}
				?>
			</div><!-- .container -->
		</div><!-- .secondary-nav -->
		<?php } ?>
        
		<div class="primary-nav <?php if($ft_option['unpress_sticky_nav'] == 1){ echo "unpress-sticky";}?> animated yamm">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="desktop-menu">
							<div class="logo">
			                    <?php
								// Get the logo
								if ( $ft_option['site_logo'] != '' ) { 
									$site_logo = $ft_option['site_logo'];
								} else { 
									$site_logo = get_template_directory_uri() . '/images/logo.png';
								}
								?>
								<a class="navbar-brand align-center" href="<?php echo home_url( '/' ); ?>">
									<?php _e('SPEARR', 'hack.cd'); ?>
			                    	<!-- <img width="100px" height="" src="<?php echo $site_logo; ?>" alt="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>" title="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>"/> -->
			                    </a>
							</div><!-- .navbar-header -->
							<div class="unpress-menu">
									<?php
									// Main Menu
									if ( has_nav_menu( 'main_menu' ) ) :
										wp_nav_menu( array (
											'theme_location' => 'main_menu',
											'container' => 'div',
											'container_class' => 'unpress-main-menu collapse navbar-collapse',
											'menu_id' => 'main-nav',
											'menu_class' => 'nav navbar-nav',
											'depth' => 2,
											'fallback_cb' => false,
											'walker' => new UnPress_Menu()
										 ));
									 else:
										echo '<div class="message warning"><i class="fa fa-exclamation-triangle"></i>' . __( 'Define your site main menu', 'favethemes' ) . '</div>';
									 endif;
									?>
			                       <?php if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>  
			                       <?php if( $ft_option['woocommerce_cart_nav'] == 1 ):?>
			                        <ul class="nav navbar-nav navbar-right">
			                        	
			                            <li class="cart-inner dropdown">
			                                <a class="cart-btn" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>">
			                                	<i class="fa fa-shopping-cart"></i> 
												<?php _e('Cart', 'favethemes'); ?> <?php echo $woocommerce->cart->get_cart_total(); ?> / <?php _e('Item:', 'favethemes'); ?> <?php echo $woocommerce->cart->cart_contents_count; ?>
			                                </a>
			                                <ul class="menu-cart-wrap-dropdown-menu dropdown-menu" role="menu">
			                                	
			                                    <!-- Add a spinner before cart ajax content is loaded -->
												<?php if ($woocommerce->cart->cart_contents_count == 0) {
													echo '<p class="empty">'.__('No products in the cart.','woocommerce').'</p>';
													?> 
												<?php } else { //add a spinner ?> 
													<div class="loading_cart"><i></i><i></i><i></i><i></i></div>
												<?php } ?>    
											
			                                </ul>
			                            </li>
			                        </ul>
			                        <?php endif; ?>
			                        <?php } ?>
			                        
								<?php //get_search_form(); ?>
							</div><!--/.nav-collapse -->
						</div><!-- .desktop-menu -->
					</div>
				</div>
			</div><!-- .container -->
		
        </div><!-- .primary-nav -->
        
        
        
        
	</div><!-- .navbar-fixed-top -->
</header><!-- #header -->

<header id="responsive-header">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="mobile-menu-holder">
					<div class="mobile-menu-top">
						<div class="logo">
		                    <?php
							// Get the logo
							if ( $ft_option['site_logo'] != '' ) { 
								$site_logo = $ft_option['site_logo'];
							} else { 
								$site_logo = get_template_directory_uri() . '/images/logo.png';
							}
							?>
							<a class="navbar-brand align-center" href="<?php echo home_url( '/' ); ?>">
								<?php _e('SPEARR', 'hack.cd'); ?>
		                    	<!-- <img width="100px" height="" src="<?php echo $site_logo; ?>" alt="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>" title="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>"/> -->
		                    </a>
						</div><!-- .navbar-header -->
						<a class="toggle-mobile-menu" href="#"><span></span></a>
					</div>
					<div class="responsive-menu">
						<?php
						if (has_nav_menu('responsive_main_menu')) {
							wp_nav_menu(array (
								'theme_location'  => 'responsive_main_menu',
								'container'       => 'div',
								'container_class' => 'mobile-menu-container',
								'menu_id'         => 'mobile-menu',
								'menu_class'      => 'mobile-menu',
								'depth'           => 3,
								'fallback_cb'     => false
							));
						}
						?>
					</div>
				</div><!-- .mobile-menu -->
			</div>
		</div>
	</div>
</header>