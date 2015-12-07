<?php
/**
 * Theme Stylesheet Options
 * Refer to Theme Options
 * @package UnPress
 * @since 	UnPress 1.0
**/

function custom_styling(){

global $ft_option;?>

<style type="text/css">
@font-face {
    font-family: 'kenzoregular';
    src: url('../fonts/kenzo_regular-webfont.eot');
    src: url('../fonts/kenzo_regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('../fonts/kenzo_regular-webfont.svg#kenzoregular') format('svg');
    font-weight: normal;
    font-style: normal;

/*==========================================================
= Fonts Family 
===========================================================*/
/* Body */
<?php
if($ft_option['google_body'] != '0') {
	$body_font = '"'.$ft_option['google_body'].'", sans-serif';
} elseif($ft_option['standard_body'] != '0') {
	$body_font = $ft_option['standard_body'];
}
?>
body, 
.sub-links li {
	display: inline-block;
	width: 100%;
}
.homepage-gallery-carousel-navigation h3, 
.featured-video-title p, .tool, 
.homepage-interviews-carousel-navigation h3, 
.interviews-tools 
.action-tool, 
.interviews-tools 
.share-tool, 
.interviews-slide-title, 
.interview-more, 
.interview-more:hover, 
.tags-wrap h3, 
.related-video-carousel-navigation h3, 
.related-gallery-carousel-navigation h3, 
.galleries-slide-category,
.item .inner .text1 span.category-name, 
.flexslider span.category-name,
.add-to-cart-button.form-control  {
 font-family: "Lab Grotesque Medium";
}

/* Titles and headings */
<?php
if($ft_option['google_font_titles'] != '0') {
	$headings_font = '"'.$ft_option['google_font_titles'].'", serif';
} elseif($ft_option['standard_font_titles'] != '0') {
	$headings_font = $ft_option['standard_font_titles'];
}
?>
h1, h2, h3, h4, h5, h6, blockquote, 
.form-control, 
.post-content-holder h3, 
.post-author, 
.category-box p, 
.gallery-carousel-slide-title, 
.featured-video-title h2, 
.interviews-carousel-slide-title, 
.footer-2-wrapper, 
.newsletter-subscribe input.form-control, 
.newsletter-subscribe button[type="submit"], 
.post-meta, 
.article_nav em, 
.videos-carousel-slide-title, 
.galleries-carousel-slide-title, 
.twitter-timestamp, 
.widget_recent_entries span, 
.widget_recent_entries a,  
.pagination > li > a, 
.pagination > li > span, 
.iosSlider .post-title-name, 
.flexslider .post-title-name, 
.ei-title h2,
.sidebar h3.widget-title,
#footer h3.widget-title,
.bbp-forum-title,
.bbp-reply-topic-title {
 font-family: "kenzoregular";
}
.comment .comment-date,
.widget_recent_comments li.recentcomments a {
	display: none;
}

/* primary-nav / Main nav */
<?php
if($ft_option['google_main_nav'] != '0') {
	$primary_nav = '"'.$ft_option['google_main_nav'].'", serif';
} elseif($ft_option['standard_main_nav'] != '0') {
	$primary_nav = $ft_option['standard_main_nav'];
}
?>
.primary-nav {
 font-family: "Motel Xenia Regular";
}
/* secondary-nav */
<?php
if($ft_option['google_secondary_nav'] != '0') {
	$secondary_nav = '"'.$ft_option['google_secondary_nav'].'", sans-serif';
} elseif($ft_option['standard_secondary_nav'] != '0') {
	$secondary_nav = $ft_option['standard_secondary_nav'];
}
?>
.secondary-nav {
 font-family: "Motel Xenia Regular";
}

/*====  Logo ====*/
.navbar-brand {
	margin-top: <?php echo $ft_option['site_logo_margin_top'];?>px;
	margin-left: 0px;
}

/* Black Box*/
<?php
if($ft_option['google_blackbox'] != '0') {
	$blackbox_font = '"'.$ft_option['google_blackbox'].'", sans-serif';
} elseif($ft_option['standard_blackbox'] != '0') {
	$blackbox_font = $ft_option['standard_blackbox'];
}
?>
.category-box h2 {
 font-family: "Eksell Display Medium";
 font-size:<?php echo $ft_option['black_box_font_size'];?>px;
}

/*==========================================================
= Floating title box
===========================================================*/

.category-box{
	background:<?php echo $ft_option['category_box']; ?>;
	border: none;
}
.category-box h2{
	color:<?php echo $ft_option['category_box_color']; ?>
	font-family: "Hotel Xenia Thin";
}
.category-box p,
.category-box p a{
	color:<?php echo $ft_option['category_box_sub_color']; ?>
}
/*==========================================================
= Font Sizes
===========================================================*/

.navbar-nav > li > a{
	font-size:<?php echo $ft_option['main_menu_links'];?>px;

}

.secondary-nav ul li a{
	font-size:<?php echo $ft_option['top_menu_links'];?>px;
	font-family: "Hotel Xenia Thin";
}

/*==========================================================
= Colors 
===========================================================*/
<?php $main_site_color = $ft_option['main_site_color']; ?>

a:hover, .category-box p a:hover, .footer-2-wrapper a:hover, .footer-1-wrapper .widget-content a:hover, .nav-social a:hover, .navbar-nav a.dropdown-post-title:hover, .post-content-holder h3 a:hover, .post-author a:hover, .blocks .hover-btn:hover i, .post a, .post-category a, .post-meta a:hover, .archive-video .post .post-title a:hover, .overlay .hover-btn:hover i, .sub-links a:hover, #footer a:hover, .navbar-nav .menu-item a:hover, .archive-interview .post .post-title a:hover, a.jm-post-like.liked, a.jm-post-like.liked:hover,
.unpress_white_skin #bbpress-forums div.bbp-topic-content a:hover, 
.unpress_white_skin #bbpress-forums div.bbp-reply-content a:hover,
.add_to_cart_button, .added_to_cart,
.yith-wcwl-add-to-wishlist a:hover,
.yith-wcwl-wishlistexistsbrowse a, 
.yith-wcwl-wishlistaddedbrowse a,
.product-content-holder h3 a:hover, 
.shop-category a:hover {
	color: <?php echo $main_site_color ?>;
}
.btn-default, .single-gallery .post-meta a:hover, .post-category a:hover, .post a:hover, .btn-icon:hover, .comment-reply-link:hover, .tags-wrap a:hover, .tags a:hover, a.read-more:hover, .share-page a:hover, .pagination>li>a:hover, .pagination>li>span:hover, .pagination>li>a:focus, .pagination>li>span:focus, #today, .tagcloud a:hover, .form-submit #submit, .home-rotator-navigation #prev, .home-rotator-navigation #next, .ei-slider-thumbs li.ei-slider-element, .image-holder .hover, .dropdown-menu>li>a:hover, .secondary-nav .nav a:hover,  .secondary-nav .nav a:focus, .homepage-gallery-carousel-arrows > a:hover, .homepage-interviews-carousel-arrows > a:hover, .related-video-carousel-arrows > a:hover, .tag-holder a:hover, .newsletter-subscribe button[type="submit"]:hover, .pagination>li>a:hover, .pagination>li>span:hover,  .pagination>li>a:focus, .pagination>li>span:focus, .page-numbers.current, #pageslide li a:focus, #pageslide li a:hover, .bbpress button, #bbp_search_submit, .instagram-slider-prev:hover, .instagram-slider-next:hover, .callout .inner, .btn.btn-default:hover, .label-default[href]:hover, .label-default[href]:focus, .callout, .widget.woocommerce .buttons a.wc-forward, .widget_price_filter .ui-slider .ui-slider-handle, .widget_price_filter .price_slider_amount .button:hover, .button:hover, .button, .add_to_cart.button, #searchsubmit, #yith-searchsubmit, .woocommerce .page-numbers > li > a:hover {
	background: <?php echo $main_site_color ?> !important;
	border: none;
}
.read-more {
	color: <?php echo $main_site_color ?>;
}
a:hover .gallery-carousel-slide-title, .interview-slide-wrap:hover .interviews-carousel-slide-title , .video-slide-wrap:hover .videos-carousel-slide-title, .gallery-slide-wrap:hover .galleries-carousel-slide-title, .latest-post-gallery-carousel-prev:hover, .latest-post-gallery-carousel-next:hover, .latest-interviews-carousel-prev:hover, .latest-interviews-carousel-next:hover, .featured-post-gallery-carousel-prev:hover, .featured-post-gallery-carousel-next:hover, #footer .latest-post-gallery-carousel-prev:hover, #footer .latest-post-gallery-carousel-next:hover, #footer .latest-interviews-carousel-prev:hover, #footer .latest-interviews-carousel-next:hover, #footer .featured-post-gallery-carousel-prev:hover, #footer .featured-post-gallery-carousel-next:hover, #galleries-carousel-prev:hover, #galleries-carousel-next:hover, .home-rotator-navigation #prev:hover, .home-rotator-navigation #next:hover, .instagram-slider-prev:hover, .instagram-slider-next:hover{
	background: <?php echo $main_site_color ?>;
}
.newsletter-subscribe button[type="submit"]:hover, .pagination>li>a:hover, .pagination>li>span:hover, .pagination>li>a:focus,  .pagination>li>span:focus, .page-numbers.current, .btn.btn-default:hover, .woocommerce .page-numbers > li > span, .woocommerce .page-numbers > li > a:hover {
	border: 1px solid <?php echo $main_site_color ?>;
}
::selection {
	background: <?php echo $main_site_color ?>;
	color: #fff;
}
::-moz-selection {
	background: <?php echo $main_site_color ?>;
	color: #fff;
}
#isotope-filter li.active a {
	box-shadow: inset 0px -5px 0px <?php echo $main_site_color ?>;
}
.yith-wcwl-add-to-wishlist a:hover,
.yith-wcwl-wishlistexistsbrowse a, 
.yith-wcwl-wishlistaddedbrowse a {
	border-color: <?php echo $main_site_color ?>; 
}

/*==========================================================
= Animations 
===========================================================*/
<?php $animations = $ft_option["view_animation"]; ?>

.csstransitions .post-holder.inview {
	-webkit-animation: <?php echo $animations; ?> 0.7s 1 cubic-bezier(0.445, 0.05, 0.55, 0.95);
	-moz-animation: <?php echo $animations; ?> 0.7s 1 cubic-bezier(0.445, 0.05, 0.55, 0.95);
	-o-animation: <?php echo $animations; ?> 0.7s 1 cubic-bezier(0.445, 0.05, 0.55, 0.95);
	animation: <?php echo $animations; ?> 0.7s 1 cubic-bezier(0.445, 0.05, 0.55, 0.95);
}


/*==========================================================
= Custom CSS 
===========================================================*/
<?php if ( $ft_option['custom_css'] != '' ):?>
<?php echo $ft_option['custom_css'];?> 
<?php endif; ?>

</style>

<?php } ?>
<?php add_action( 'wp_head', 'custom_styling' );?>