<?php
    // Template Name: Splash Page
    // Template Post Type: post, page, custom-post-type 
 ?>

<?php get_header( 'splash' ); ?>

<div id="primary" class="content-area extended">
    <main id="main" class="site-main" role="main">

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content', 'page' ); ?>

        <?php endwhile; else: ?>

            <?php get_template_part( 'template-parts/content', 'none') ?>

        <?php endif; ?>
    </main>
</div>

<p>template-spash.php</p>

<?php get_footer('custom'); ?>
