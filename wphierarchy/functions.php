<?php

//Add filter, default priority is 10
add_filter( 'welcomoe_message', 'user_welcome', 100 );
function user_welcome( $msg, $user ) {
    $new_msg = $msg . '' .$user->first_name . '!';
    return $new_msg;
}

//Remove filter
// remove_filter('welcome_message', 'user_welcome', 100);

//Plugins to look help identify active filters
//Debug bar
//Debug bar filter actions and filters


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
    wp_enqueue_style( 'varela-font-css',"https://fonts.googleapis.com/css2?family=Varela&display=swap", [], time(), 'all' );
    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', ['varela-font-css'], time(), 'all' );
    wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', ['main-css'], time(), 'all' );
    //This array makes sure that main-css gets loaded before custom-css
}

//When you start loading the file do what the function does
add_action('wp_enqueue_scripts', 'wphierarchy_enqueue_styles');

//Load in our css, name space name of site so that it does not conflict with others
function wphierarchy_enqueue_scripts() {
    //Array is dependencies,
    //time stamp, time is bad for production but good for developmenet for production do 1.1
    wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/jquery.theme.js',
    ['jquery', 'masonry'], time(), true );

    if ( is_singular() && comments_open() ) {
        wp_enqueue_script( 'comment-reply' );
    }
    //Can add multiple dependencies
}

//When you start loading the file do what the function does
add_action('wp_enqueue_scripts', 'wphierarchy_enqueue_scripts');

//Register menu locations
register_nav_menus( [
    'main-menu' => esc_html__( 'Main Menu', 'wpgeneral-template-practice' ),
    'footer-menu' => esc_html__( 'Footer Menu', 'wpgeneral-template-practice' )
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

    register_sidebar([
        'name' => esc_html__( 'Page Sidebar', 'wphierarchy' ),
        'id'  => 'page-sidebar',
        'description' => esc_html__( 'Add widgets for Page Sidebar here', 'wphierarchy' ),
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title>"',
        'after_title' => '</h2>',
    ]);

    register_sidebar([
        'name' => esc_html__( 'Front Page Widgets', 'wphierarchy' ),
        'id'  => 'front-page',
        'description' => esc_html__( 'Add widgets for front page here', 'wphierarchy' ),
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title>"',
        'after_title' => '</h2>',
    ]);
}
    add_action( 'widgets_init', 'wphierarchy_widgets_init' );

    // Comment Custom callback
    function wptag_comment() {
        //Make a comment.php file
        get_template_part( 'comment' );
    }

    function wphooks_draft_mode_styles() {
        global $post;

        if( ! $post ) return;

        if( 'draft' === $post->post_status ) {

            wp_enqueue_style( 'wphooks-admin-css', get_stylesheet_directory_uri() .
            '/assets/css/admin.css', [], time(), 'all' )
            add_editor_style( 'assets/css/visual-editor.css' )
        }


    }

    add_action( 'admin_enqueue_scripts', 'wphooks_draft_mode_styles' )

    function wphooks_comments_cta() {
        if( in_the_loop() ) {

            locate_template( 'template-parts/comment-cta.php', true );
        }
    }

    add_action( 'pre_get_comments', 'wphooks_comments_cta' );
 ?>
