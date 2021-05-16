<?php

//Add theme support

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails', ['page', 'post'] );
add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote',
 'status', 'video', 'audio', 'chat'] );
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-selective-refresh-widgets' );
add_theme_support( 'starter-content' );

//Load in our css, name space name of site so that it does not conflict with others
function wpgeneral_practice_enqueue_styles() {
    //Array is dependencies,
    //time stamp, time is bad for production but good for developmenet for production do 1.1
    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', [], time(), 'all' );
    //This array makes sure that main-css gets loaded before custom-css
}

//Register menu locations
register_nav_menus( [
    'main-menu' => esc_html__( 'Main Menu', 'wpgeneral-template-practice' ),
    'footer-menu' => esc_html__( 'Footer Menu', 'wpgeneral-template-practice' )
]);

//When you start loading the file do what the function does
add_action('wp_enqueue_scripts', 'wpgeneral_practice_enqueue_styles');

//Setup widget areas
function wphierarchy_widgets_init() {
    //You can register multilple widgets
    register_sidebar([
        'name' => esc_html__( 'Main Sidebar', 'wpgeneral-template-practice' ),
        'id'  => 'main-sidebar',
        'description' => esc_html__( 'Add widgets for main sidebar here', 'wphierarchy' ),
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title>"',
        'after_title' => '</h2>',
    ]);

}
add_action( 'widgets_init', 'wphierarchy_widgets_init' );

 ?>
