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

	<header>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<div class="container">
				<a class="navbar-brand" href="/"><div class="logo"></div></a>
				
				<button class="navbar-toggler" type="button">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="/loja/">Loja</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/sobre-a-maps/">Sobre a Maps</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/contato/">Contato</a>
						</li>
					</ul>
					<ul class="navbar-nav mr-left">
						<a class="nav-link" href="/carrinho/">Carrinho</a>
						<?php echo do_shortcode("[woo_cart_icon]"); ?>
					</ul>
				</div><!-- .collapse -->
			</div><!-- .container -->
		</nav>
	</header>

	<div class="banner position-relative overflow-hidden text-center bg-light">
		<div class="col-md-6 p-lg-6 mx-auto">
			<h1 class="display-4 font-weight-normal">Calças que desafiam as normas</h1>
			<p class="lead font-weight-normal">Nosso objetivo é fornecer calças para mulheres altas e com medidas em que o "normal" nao serve.</p>
			<a class="btn btn-secondary" href="/sobre-a-maps/">Veja mais</a>
		</div>
	</div>

	<div class="site-content container">

