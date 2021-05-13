

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <a href="<<?php echo esc_url( __( 'https://wordpress.org/', 'wphierarchy') );
    ?>">
        <?php printf( esc_html__( 'Proudly powered by %s', 'wphierarchy' ),
         'WordPress'); ?>
    </a>


    <?php if( is_active_sidebar( 'footer-sidebar' ) ): ?>
        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
    <?php endif; ?>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
