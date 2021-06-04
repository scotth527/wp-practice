

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <a href="<<?php echo esc_url( __( 'https://wordpress.org/', 'wphierarchy') );
    ?>">
        <?php printf( esc_html__( 'Proudly powered by %s', 'wphierarchy' ),
         'WordPress'); ?>
    </a>

    <?php
        $footer_message = '&copy;' . date('Y') . ' ' . get_bloginfo('name');
     ?>

     <p>
         <?php echo apply_filters( 'wphooks_footer_message', $footer_message ); ?>
     </p>


    <?php if( is_active_sidebar( 'footer-sidebar' ) ): ?>
        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
    <?php endif; ?>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
