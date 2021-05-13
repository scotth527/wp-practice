<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <header class="entry-header">
        <?php the_title( '<h1>', '</h1>' ); ?>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</article>
