<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Maps
 */

?>
	</div><!-- #content -->

	<footer class="pt-5">
		<div class="container">
			<div class="row">
				<div class="col-6 col-md">
					<h5>Institucional</h5>
					<?php echo render_menu('footer') ?>
				</div>
				<div class="col-6 col-md">
					<h5>Formas de Pagmento</h5>
					<img class="d-inline pr-1" src="/wp-content/themes/maps/assets/img/icons/visa.png" alt="Cartao Visa" />
					<img class="d-inline pr-1" src="/wp-content/themes/maps/assets/img/icons/master.png" alt="Cartao MasterCard" />
					<img class="d-inline pr-1" src="/wp-content/themes/maps/assets/img/icons/amex.png" alt="Cartao American Express" />
					<img class="d-inline pr-1" src="/wp-content/themes/maps/assets/img/icons/diners.png" alt="Cartao Diners Club" />
					<img class="d-inline pr-1" src="/wp-content/themes/maps/assets/img/icons/elo.png" alt="Cartao Elo" />
					<img class="d-inline pr-1" src="/wp-content/themes/maps/assets/img/icons/hiper.png" alt="Cartao Hipermercado" />
					<img class="d-inline pr-1" src="/wp-content/themes/maps/assets/img/icons/boleto.png" alt="Page com boleto" />
				</div>
				<div class="col-md-2">
					<div class="logo"></div>
					<small class="d-block mb-3 text-muted">© 2017-2020</small>
				</div>
			</div>
			<div class="disclaimer text-muted"<p><?php echo date('Y');?> Todos os direitos reservados.</p><div>
		</div><!-- .container -->
	</footer><!-- .main-footer -->

</div><!-- .main-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
