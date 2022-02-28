<article>
    <h2><?php the_title(); ?></h2>
    <p>Publicado em <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
    <?php the_content() ?>
</article>