<?php
/**
 * The header for our theme
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Maps
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZM1QKDZRL7"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'G-ZM1QKDZRL7');
	</script>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
	<meta name="facebook-domain-verification" content="fzeypl08cvcwd0r9kpjl729wwh47mh" />
    <link rel="shortcut icon" href="<?= get_stylesheet_directory_uri() ?>/assets/img/favicon.ico" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="main-wrapper">

	<?php get_template_part( 'template-parts/header/nav-sticky' ); ?>

	<?php 
	// get_template_part( 'template-parts/header/banner-mulher' );
	if ( is_front_page() ) {
		// get_template_part( 'template-parts/header/banner' );
		get_template_part( 'template-parts/header/banner-custom' );
	}
	?>

	<div class="site-content container">

