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
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="<?= get_stylesheet_directory_uri() ?>/assets/img/favicon.ico" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="main-wrapper">

	<?php get_template_part( 'template-parts/header/nav-sticky' ); ?>

	<?php 
	if ( is_front_page() ) {
		get_template_part( 'template-parts/header/banner' );
	}
	?>

	<div class="site-content container">

