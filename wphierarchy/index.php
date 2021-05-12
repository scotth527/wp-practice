//Looks for a header file with the spash in it
<?php get_header( 'splash' ); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <header class="entry-header">
                <h1>Index.php</h1>
            </header>
            <div class="entry-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                 nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                 in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                 nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                 sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </article>
    </main>
</div>

<?php get_sidebar(); ?>

<?php get_footer('custom'); ?>
