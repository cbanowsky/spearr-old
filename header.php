<?php
/**
 * The Header for our theme
 * @subpackage UnPress
 * @since UnPress 1.0
 */
global $ft_option; // Fetch options stored in $nt_option;
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta name="google-site-verification" content="gnVcXV7ux8F57lxlp-uNELTF4q7w8zxxG_jNaextCXI" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<style>
	.spearr-featured-posts-shortcode .featured-image {
	padding: 0;
	text-align: center;
	height: 250px;
	}
	.category-box  {
		border: none;
	}
	.category-box:after {
	content: ' '; 
	position: absolute; 
	width: 60px; 
	height: 3px; 
	background-color: #000; 
	bottom: -5px; 
	margin-left: -30px; 
	left: 50%;
	</style>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
    <?php 
	// Get the favicon
	if ( $ft_option['site_favicon'] != '' ) { 
		$site_favicon = $ft_option['site_favicon'];
	} else { 
		$site_favicon = get_template_directory_uri() . '/images/favicon.ico';
	}
	?>
	<link rel="shortcut icon" href="<?php echo $site_favicon; ?>" />
	<?php 
	// Get the retina favicon
	if ( $ft_option['site_retina_favicon'] != '' ) { 
		$retina_favicon = $ft_option['site_retina_favicon'];
	} else { 
		$retina_favicon = get_template_directory_uri() . '/images/retina-favicon.png';
	}
	?>
	<link rel="apple-touch-icon-precomposed" href="<?php echo $retina_favicon; ?>" />
	<link href="https://plus.google.com/101737758964289492911" rel="publisher" />

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '985686538140502');
fbq('track', "PageView");
fbq('track', "ViewContent");
fbq('track', "Search");
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=985686538140502&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	<?php wp_head(); ?>
</head>
<script type="text/javascript" async defer
  src="https://apis.google.com/js/platform.js?publisherid=101737758964289492911">
</script>
<?php 
if($ft_option["unpress_main_skin"]=="black_skin"):
	$body_class = "unpress_black_skin";
else:
	$body_class = "unpress_white_skin";
endif;
?>
<body <?php body_class($body_class); ?>>
<!-- <script type="text/javascript">
WebFontConfig = { fontdeck: { id: '57962' } };

(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
  '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();
</script -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70348911-1', 'auto');
  ga('send', 'pageview');

</script>
<div id="outer-wrap">
<div id="inner-wrap1">
    <div id="pageslide">
        <a class="close-btn" id="nav-close-btn" href="#top"><i class="fa fa-times-circle-o"></i></a>
    </div>
	<?php get_template_part('unpress', 'menu'); ?>