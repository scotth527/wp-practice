<?php

/**
 * Enqueue the theme stylesheets
 */
function phpforwp_theme_styles() {

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round', false);
    wp_enqueue_style('main-styles', get_stylesheet_directory_uri(), './style.css', array('google-fonts'), null, 'all' );
  // Enqueue google fonts https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round
  // Enque main style sheet (make dependent on google fonts)

}
// Add phpforwp_theme_styles function to wp_enqueue_scripts action hook
// with a priority of 10
add_action( 'wp_enqueue_scripts', 'phpforwp_theme_styles', 10 );


/**
 * Add read more text to post excerpt
 *
 * @param string $excerpt The post excerpt
 * @return string $extended_excerpt Post excerpt with read more link
 */
function phpforwp_read_more_link( $excerpt ) {

  // Create a variable called $extended_excerpt and
  // assign it the value of $excerpt
    $extended_excerpt = $excerpt;
    $extended_excerpt .=  ' ' . '<a href=" . get_permalink() .">Read more</a>';

  // Append a read more link using get_permalink() as the url
    return $extended_excerpt;
  // Return $extended_excerpt

}
// Add phpforwp_read_more_link function to the get_the_excerpt
// with a priority of 10
add_filter( 'get_the_excerpt', 'phpforwp_read_more_link', 10 );


?>
