<?php
/**
 * Template Name: Home Page Gallery
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

	<main class="site-main">
	<?php
		get_template_part( 'template-parts/content/content-highlight', 'left' );
		get_template_part( 'template-parts/content/content-highlight', 'right' );
	?>
	</main><!-- .site-main -->
<?php
get_footer();
