<?php
/**
 * Displays the site header.
 *
 * @package Maps
 * @subpackage Maps
 * @since 1.0.0
 */
?>
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