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
					<div class="col-8 col-md-7">
						<ul class="social list-unstyl0ed">
							<li class="nav-item"><a class="icon instagram" target="_blank" href="https://www.instagram.com/offlimitsbymaps"><span class="sr-only">instagram</span></a></li>
							<li class="nav-item"><a class="icon facebook" target="_blank" href="https://www.facebook.com/OFFlimitsbyMAPs"><span class="sr-only">facebook</span></a></li>
							<li class="nav-item"><a class="icon phone" href="/contato/"><span class="sr-only">fone</span></a></li>
							<li class="nav-item"><span class="phone-no d-inline">(51) 992-366-767</span></li>
							<li class="nav-item"><span class="phone-no d-none d-md-inline px-1">/</li>
							<li class="nav-item"><span class="phone-no d-none d-md-inline">(51) 992-366-767</span></li>
						</ul>
					</div>
					<div class="col-4 col-md-4 ml-auto">
						<div class="account">
							<a class="" href="/minha-conta/orders/">Meus Pedidos</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="brand">
			<div class="container">				
				<div class="row">
					<div class="col-4">
						<nav class="navbar navbar-expand-md">
							<button class="navbar-toggler" type="button" data-toggle="collapse" href="#mainMenu">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div id="mainMenu" class="navbar-collapse collapse justify-content-center">								
								<?php echo render_menu('main') ?>								
							</div><!-- .collapse -->
						</nav>
					
					</div>
					<div class="col-4">
						<a class="logo-link justify-content-center" href="/"><div class="logo"></div></a>
					</div>
					<div class="col-4">
						<div class="cart d-flex">
							<ul class="account-menu list-unstyled">
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