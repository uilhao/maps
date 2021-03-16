<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Maps
 */

get_header();
?>
	<div class="breadcrumb">
		<?php bcn_display($return = false, $linked = true, $reverse = false, $force = false); ?>
	</div>

	<main id="primary" class="content-area">

		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content',  );
			}

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>

	</main><!-- .content-area -->

<?php
get_footer();
