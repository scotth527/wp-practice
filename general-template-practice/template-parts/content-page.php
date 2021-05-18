<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <header class="entry-header">
        <a href="<?php the_permalink( ); ?>">
            <?php the_title( '<h1>', '</h1>' ); ?>
        </a>
        <?php get_template_part('template-parts/byline',''); ?>

    </header>
    <div class="entry-content">
        <?php the_post_thumbnail(); ?>
        <?php the_content( ); ?>

    </div>
</article>
