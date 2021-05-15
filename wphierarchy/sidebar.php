<?php
if( ! is_active_sidebar('main-sidebar' ) ) {
    //It will stop here if there isn't a main sidebar
    return;
}

 ?>

<aside class="widget-area" role="complimentary" id="secondary">

<?php
    $args = [
        'type' => 'weekly',
        'limit' => 3,
        'show_post_count' => true,
        'order' => 'ASC'
    ];

    wp_get_archives( $args ); ?>

    <?php get_calendar( $initial = true, $echo = true ); ?>


<?php wp_loginout( get_permalink() ); ?>

<?php if( !is_user_logged_in() ): ?>
<?php

    $args = [
        'label_username' => 'YOUR NAME',
        'label_password' => 'YOUR REALLY SECURE PASSWORD'
    ];
    wp_login_form( $args );
    ?>
<?php endif; ?>

<?php dynamic_sidebar( 'main-sidebar' ); ?>

</aside>
