<?php
if( ! is_active_sidebar('main-sidebar' ) ) {
    //It will stop here if there isn't a main sidebar
    return;
}

 ?>

<aside class="widget-area" role="complimentary" id="secondary">

<?php wp_loginout( get_permalink( ) , true ); ?>

<?php // get_calendar( ); ?>

<?php
    $args = [
        'type' => 'monthly',
        'limit' => 3,
        'before' => '<h5>Month: ',
        'after' => '</h5>'
    ];
    wp_get_archives( $args );
?>

<?php dynamic_sidebar( 'main-sidebar' ); ?>

</aside>
