
</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">

    <?php do_action( 'wphooks_before_footer' ); ?>


    <a href="<<?php echo esc_url( __( 'https://wordpress.org/', 'wphierarchy') );
    ?>">
        <?php printf( esc_html__( 'Proudly powered by %s', 'wphierarchy' ),
         'WordPress'); ?>
    </a>

    <?php
    $args = [
        'theme_location' => 'footer-menu'
        //Throw in here whatever is in main-menu set up
    ];

    wp_nav_menu( $args );
    ?>

</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
