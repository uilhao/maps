<?php
/**
 * The main template file
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Maps
 */

get_header();
?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			woocommerce_content();
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php
get_footer();
