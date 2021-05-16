<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <header class="entry-header">
        <a href="#">
            <?php the_title( '<h1>', '</h1>' ); ?>
        </a>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>

    </div>

    <?php comments_template(); ?>
</article>
