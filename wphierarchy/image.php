<?php get_header( ); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <header class="entry-header">

                    <?php the_title( '<h1>', '</h1>' ); ?>

                </header>
                <div class="entry-content">

                    <p>
                        <img src="<?php
                        $image_src = wp_get_attachment_image_src( $post->ID, 'full' )[0];
                        echo esc_url( $image_src );
                        ?>"
                        alt="<?php echo esc_attr( get_the_title() ); ?>" />
                    </p>
                    <?php the_content(); ?>
                </div>

                <?php if( comments_open() ) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
            </article>

        <?php endwhile; else: ?>

            <?php get_template_part( 'template-parts/content', 'none') ?>

        <?php endif; ?>
    </main>
</div>

<p>image.php</p>

<?php get_sidebar(); ?>

<?php get_footer('custom'); ?>
