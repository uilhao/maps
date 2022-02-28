<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage maps
 */

get_header();
?>

<div class="row">
	<div class="col-md-9">

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-blog' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'maps' ), '%title' ),
			)
		);
	}
?>

		<div class="row">
			<div class="pages text-left col-6">
				<?php next_post_link( '&laquo; %link' ); ?>
			</div>
			<div class="pages text-end col-6">
			<?php previous_post_link( '%link &raquo' ); ?>
			</div>
		</div>

<?php
	
	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	// $twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' );
	// $twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' );

	// $twentytwentyone_next_label     = esc_html__( 'Next post', 'twentytwentyone' );
	// $twentytwentyone_previous_label = esc_html__( 'Previous post', 'twentytwentyone' );

	// the_post_navigation(
	// 	array(
	// 		'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label . $twentytwentyone_next . '</p><p class="post-title">%title</p>',
	// 		'prev_text' => '<p class="meta-nav">' . $twentytwentyone_prev . $twentytwentyone_previous_label . '</p><p class="post-title">%title</p>',
	// 	)
	// );
endwhile; // End of the loop.
?>

</div>

<div class="col-md-3">
	<?php get_sidebar(); ?>
</div>

</div>

<?php
get_footer();
