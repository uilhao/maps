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
		<nav class="header">
			<div class="container">
			<div class="row">
				<div class="col-md-7">
					<a class="logo-link" href="/"><div class="logo"></div></a>
				</div>
				<div class="col-md-5">
					<ul class="social">
						<li class="nav-item"><a href="/carrinho/">Carrinho</a></li>
						<?php echo do_shortcode("[woo_cart_icon]"); ?>
						<li class="nav-item icon instagram"><a href="/carrinho/">instagram</a></li>
						<li class="nav-item icon facebook"><a href="/carrinho/">facebook</a></li>
						<li class="nav-item icon phone"><a href="/carrinho/">Fone</a></li>
					</ul>
				</div>
			</div><!-- .container -->
		</nav>
	</header>