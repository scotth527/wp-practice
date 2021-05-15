<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <header class="entry-header">
        <h1><?php esc_html_e( '404', 'wphierarchy'); ?></h1>
    </header>
    <div class="entry-content">
        <p>
            <?php esc_html_e( 'Sorry! No content found.', 'wphierarchy' ); ?>

            <p><?php echo get_search_form(  ); ?></p>
        </p>
    </div>
</article>
