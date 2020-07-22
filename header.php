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
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="main-wrapper">

	<header>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#"><?php echo get_bloginfo( 'name' ); ?></a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
					<a class="nav-link" href="#">Calças</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#">Sobre</a>
					</li>
				</ul>
			</div><!-- .collapse -->
		</div><!-- .container -->
	</nav>
	</header>

	<div class="banner position-relative overflow-hidden p-3 p-md-5 text-center bg-light">
		<div class="col-md-6 p-lg-6 mx-auto my-5">
			<h1 class="display-4 font-weight-normal">Calças que desafiam as normas</h1>
			<p class="lead font-weight-normal">Nosso objetivo é fornecer calças para mulheres altas e com medidas em que o "normal" nao serve.</p>
			<a class="btn btn-secondary" href="#">Veja mais</a>
		</div>
	</div>

	<div class="site-content">
