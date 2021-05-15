<?php
if( ! is_active_sidebar('page-sidebar' ) ) {
    //It will stop here if there isn't a main sidebar
    return;
}

 ?>

<aside class="widget-area" role="complimentary" id="secondary">

<?php dynamic_sidebar( 'page-sidebar' ); ?>

</aside>
