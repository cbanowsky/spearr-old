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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
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
	<?php wp_head(); ?>
</head>
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
<div id="outer-wrap">
<div id="inner-wrap1">
    <div id="pageslide">
        <a class="close-btn" id="nav-close-btn" href="#top"><i class="fa fa-times-circle-o"></i></a>
    </div>
	<?php get_template_part('unpress', 'menu'); ?>