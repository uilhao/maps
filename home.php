<?php

get_header();
?>	

	<div class="breadcrumb">
		<?php bcn_display($return = false, $linked = true, $reverse = false, $force = false); ?>
	</div>

	<main id="primary" class="content-area">
		<div class="row">
			<div class="col-md-9">
                <?php
                    if ( have_posts() ) {

                        // Load posts loop.
                        while ( have_posts() ) {
                            the_post();
                            get_template_part( 'template-parts/content/content', get_post_type() );
                        }

                    } else {

                        // If no content, include the "No posts found" template.
                        get_template_part( 'template-parts/content/content', 'none' );

                    }
                ?>
			</div>
			
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main><!-- .content-area -->
<?php
get_footer();