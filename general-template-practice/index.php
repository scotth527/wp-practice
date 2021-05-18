<?php get_header( ); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
            R_Debug::list_hooks( 'wp_enqueue_script' );
         ?>

        <h2><?php _e( 'Sanitization Tags', 'wptags'); ?></h2>

        <ul>
            <li>
                sanitize_text_field, removes the h1 header
                <?php echo sanitize_text_field( "<h1>Header</h1>" );  ?>
            </li>
            <li>
                sanitize_title
                <?php echo sanitize_title("<h1>Post Title</h1>") ?>
            </li>
            <li>
                sanitize_email
                <?php echo sanitize_email("edu c<tion>@zacgordon.com");   ?>
            </li>
            <li>
                sanitize_html_class
                <?php echo sanitize_html_class( 'new## class*%'); ?>
            </li>
            <li>
                esc_url_raw
                <?php echo esc_url_raw( "https;//`javascript<forwp>com`") ?>
            </li>
        </ul>

        <h2>E</h2>

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content', 'page' ); ?>

        <?php endwhile; else: ?>

            <?php get_template_part( 'template-parts/content', 'none') ?>

        <?php endif; ?>
    </main>
</div>

<?php get_sidebar( ); ?>

<?php get_footer( ); ?>
