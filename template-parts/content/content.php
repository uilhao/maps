<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage MAps
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( $thumb_id = get_post_thumbnail_id( get_the_ID() ) ) {
			$thumb = wp_get_attachment_image_src($thumb_id, 'woocommerce_single');
		?>
			<div class="image-header" style="background-image: url('<?php echo $thumb[0]; ?>');"></div>
		<?php }
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title display-4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-excerpt">
		<?php
		the_excerpt();
		?>
	</div><!-- .entry-excerpt -->

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
