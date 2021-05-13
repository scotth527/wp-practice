<?php


//Add theme support

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
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
function wphierarchy_enqueue_styles() {
    //Array is dependencies,
    //time stamp, time is bad for production but good for developmenet for production do 1.1
    wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/style.css', [], time(), 'all' );
}

//When you start loading the file do what the function does
add_action('wphierarchy_enqueue_scripts', 'wphierarchy_enqueue_styles');

//Register menu locations
register_nav_menus( [
    'main-menu' => esc_html__( 'Main Menu', 'wphierarchy' ),
]);

//Setup widget areas
function wphierarchy_widgets_init() {
    //You can register multilple widgets
    register_sidebar([
        'name' => esc_html__( 'Main Sidebar', 'wphierarchy' ),
        'id'  => 'main-sidebar',
        'description' => esc_html__( 'Add widgets for main sidebar here', 'wphierarchy' ),
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title>"',
        'after_title' => '</h2>',
    ]);

    register_sidebar([
        'name' => esc_html__( 'Header Widget-area', 'wphierarchy' ),
        'id'  => 'header-sidebar',
        'description' => esc_html__( 'Add widgets for header here', 'wphierarchy' ),
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title>"',
        'after_title' => '</h2>',
    ]);

    register_sidebar([
        'name' => esc_html__( 'Footer Widget-area', 'wphierarchy' ),
        'id'  => 'footer-sidebar',
        'description' => esc_html__( 'Add widgets for footer here', 'wphierarchy' ),
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title>"',
        'after_title' => '</h2>',
    ]);
}
add_action( 'widgets_init', 'wphierarchy_widgets_init' );

 ?>
