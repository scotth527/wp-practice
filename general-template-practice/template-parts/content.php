<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <header class="entry-header">

        <span class="dashicons dashicons-format-<?php echo get_post_format($post->ID); ?>"></span>

        <?php the_title( '<h1>', '</h1>' ); ?>

        <div class="byline">
            <?php esc_html_e( 'Author: ') ?> <?php the_author_posts_link(); ?>

            <?php if( current_user_can( 'edit_post', $post->ID ) ): ?>
                <?php edit_post_link( ); ?>
            <?php endif; ?>

            <h1>OKAYYY</h1>

        </div>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>

    <?php if( comments_open() ) : ?>
        <?php comments_template(); ?>
    <?php endif; ?>
</article>
