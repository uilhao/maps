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
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<ul class="social list-unstyled">
							<li class="nav-item icon instagram"><a href="/carrinho/">instagram</a></li>
							<li class="nav-item icon facebook"><a href="/carrinho/">facebook</a></li>
							<li class="nav-item icon phone"><a href="/carrinho/">Fone</a></li>
						</ul>
					</div>
					<div class="col-md-6">
						<div class="account">
							<a class="" href="/minha-conta/">Meus Pedidos</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="brand">
			<div class="container">				
				<div class="row">
					<div class="col-md-4">
						<nav class="navbar navbar-expand-md">
							<button class="navbar-toggler" type="button">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div class="navbar-collapse collapse justify-content-center">
								<ul class="navbar-nav">
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
								
								
							</div><!-- .collapse -->
						</nav>
					
					</div>
					<div class="col-md-4">
						<a class="logo-link justify-content-center" href="/"><div class="logo"></div></a>
					</div>
					<div class="col-md-4">
						<div class="cart d-flex">
							<ul class="account-menu list-unstyled mr-4">
								<li class="nav-item"><a href="/minha-conta/">Minha Conta</a><li>
							</ul>	
							<ul class="list-unstyled cart-icon">
								<?php echo do_shortcode("[woo_cart_icon]"); ?>
							</ul>
						</div>
					</div>
				</div>
			</div><!-- container -->
		</div>
	</header>