<?php
/**
 * Displays the site header.
 *
 * @package Maps
 * @subpackage Maps
 * @since 1.0.0
 */

$wrapper_classes  = '';
$wrapper_classes .= true === get_theme_mod( 'display_title_and_tagline', true ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">

	<div class="banner position-relative overflow-hidden text-center bg-light">
		<div class="col-md-6 p-lg-6 mx-auto">
			<h1 class="display-4 font-weight-normal">Calças que desafiam as normas</h1>
			<p class="lead font-weight-normal">Nosso objetivo é fornecer calças para mulheres altas e com medidas em que o "normal" nao serve.</p>
			<a class="btn btn-secondary" href="/sobre-a-maps/">Veja mais</a>
		</div>
	</div>

</header><!-- #masthead -->
