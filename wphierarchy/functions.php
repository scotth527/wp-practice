<?php

use DOMDocument;

add_filter( 'the_content', 'filterHrefs' );
function filterHrefs( $content ) {
    // Make sure there is content to parse (and properly encode the HTML entities).
    $domDocument = new DOMDocument();
    libxml_use_internal_errors(true);
    $domContent = $domDocument->loadHTML(mb_convert_encoding( $content, 'HTML-ENTITIES' ));
    libxml_use_internal_errors(false);
    if ( false === $domContent ) {
        return $content;
    }

    $anchors = $domDocument->getElementsByTagName('a');
    if( 0 === count( $anchors )) {
        return $content;
    }

    foreach ($anchors as $anchor) {
        $anchor->setAttribute('href', untrailingslashit($anchor->getAttribute('href')));
    }

    return wp_kses_post($domDocument->saveHTML());
}

//Add filter, default priority is 10
add_filter( 'welcome_message', 'user_welcome', 100 );
function user_welcome( $msg, $user ) {
    $new_msg = $msg . '' .$user->first_name . '!';
    return $new_msg;
}


function wphooks_make_uppercase( $message ) {
    $new_message = stroupper( $ message );
    return $new_message;
}
add_filter('wphooks_footer_message', 'wphooks_make_uppercase', 15);

//Remove filter
// remove_filter('welcome_message', 'user_welcome', 100);

//Plugins to look help identify active filters
//Debug bar
//Debug bar filter actions and filters


function wptags_title_markup () {
    if ( is_singular() && in_the_loop() ) {
        $title = '<h1>' . $title . '</h1>';
    } else if ( !is_singular() && in_the_loop() ) {
        $title = '<h2><a href="' . get_permalink( $id ) . '">' . $title . '</a></h2>';
    }

    return title;
}
add_filter('the_title', 'wptags_title_markup', 10, 2 );
//10 is the priority
//Second numeric paramter 2 says how many params are expected


function wptags_content_ads( $content ) {
    if ( !in_the_loop() ) {
        return;
    }

    $paragraphs;

    //Searches for anything wrapped in a p tag
    $pattern = "/<p>.*?<\/p>/m";
    $p_count = preg_match_all( $pattern, $content, $paragraphs );
    $paragraphs = $paragraphs[0];

    // Find the middle $paragraphs
    $ad_p_number = floor( $p_count / 2 );
    if( 0 == $ad_p_number ) $ad_p_number = 1;
    $ad_p = $paragraphs[ $ad_p_number -1 ];

    //Create the ad
    $post_ad = '<div class="post-ad"><h2>Post Add</h2></div>';
    $ad_p_w_ad = '<p>' . $ad_p . '</p>' . $post_ad;

    //Replace original paragraph with the ad
    $content_w_ad = str_replace( $ad_p, $ad_p_w_ad, $content );

    return $content_w_ad;
}

add_filter('the_content', 'wptags_content_ads', 10 );


function wphooks_read_more_link( $read_more_text ) {
    global $post;
    $new_read_more = '... <a class="more-link" href="'
                     . get_permalink( $post->ID )
                     . '">'
                     . esc_html__( 'Read More &gt;', 'wphooks' )
                     . '</a>';

    return $new_read_more;
}
add_filter( 'excerpt_more', 'wphooks_read_more_link', 10 );

function wphooks_custom_body_classes( $classes ) {
    if( 'page' === get_post_type() ) {
        $classes[] = 'wphooks-page';
    }

    return $classes;
}
add_filter( 'body_class', 'wphooks_custom_body_classes' );

function wphooks_customize_post_columns( $columns ) {
    unset( $columns['author'] );
    unset( $columns['categories'] );
    unset( $columns['tags'] );
    unset( $columns['comments'] );
    return $columns;
}
add_filter( 'manage_posts_columns', 'wphooks_customize_post_columns', 100 );

function remove_the_vowels( $title ) {
    $title = preg_replace( '/[aeiou]/i', '', $title );
    return $title;
}

add_filter( 'the_title', 'remove_the_vowels' );

//Function takes a string and replaces the bad words from an array with empty
function filter_bad_languge( $content ) {
    $badwords = array('fopdoogle', 'gobermouch', 'yaldson');
    $content = str_ireplace( $badwords, '{censored}', $content );
    return $content;
}

//Example comment filter, gets string and checks for bad words and replaces them
add_filter( 'comment_text', 'filter_bad_language' );


function wphooks_excerpt_length( $length_in_words ) {
    $new_length_in_words = 20;
    return $new_length_in_words;
}

add_filter( 'excerpt_length', 'wphooks_excerpt_length' , 20 );
//Limits length of excerpt to 55 char
$exceprt_length = apply_filters( 'excerpt_length', 55 );


//Redirect login
function wphooks_members_login_redirect( $redirect_to, $request, $user ) {
    if( isset( $user->roles ) && is_array( $user->roles ) ) {
        if( !in_array( 'administrator', $user->roles) ) {
            return home_url( '/members' );
        } else {
            return $redirect_to;
        }
    }

    return;
}

add_filter( 'login_redirect', 'wphooks_members_login_redirect', 10, 3 );

//Filter caldera forms
function wphooks_change_caldera_button_class( $field_html ) {
    $new_field_html = str_replace( 'btn', 'button', $field_html );
    return $new_field_html;

}

add_filter( 'caldera_forms_render_field_type-button', 'wphooks_change_caldera_button_class', 10, 1 );

//Add theme support


function extractAnchor( $string ) {
    $dom = new DOMDocument();
    $dom -> loadHTML( $string );
    $output = array();
    foreach ($dom->getElementsByTagName('a') as $item ) {
        $output[] = array (
            'str' => $dom->saveHTML( $item ),
            'href' => $item->getAttribute('href'),
            'anchorText' => $item->nodeValue
        )
    }
    return $output;
}



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
