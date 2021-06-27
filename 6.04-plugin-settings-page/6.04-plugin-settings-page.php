<?php
/*
Plugin Name: 6.04 - Settings Page
Plugin URI: https://github.com/zgordon/wp-dev-course
Description: Demo plugin for learning about plugin settings pages.
Version: 1.0.0
Contributors: zgordon
Author: Zac Gordon
Author URI: https://zacgordon.com
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wpplugin
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function wpplugin_settings_page()
{
    add_menu_page(
        'Plugin Name', //Name of page
        'Plugin Menu', // What you want to appear in the menu
        'manage_options', // Typical user role capability to have
        'wpplugin', // Slug for the url
        'wpplugin_settings_page_markup', // Callback function execute the content on the page
        'dashicons-wordpress-alt', // Icon that you use
        100 //
    );

}
add_action( 'admin_menu', 'wpplugin_settings_page' );


function wpplugin_settings_page_markup()
{
    // Double check user capabilities, good security practice but option
    if ( !current_user_can('manage_options') ) {
      return;
    }
    ?>
    <div class="wrap">
	  <!-- Get admin title gets the name in line 24 -->
      <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
      <p><?php esc_html_e( 'Some content.', 'wpplugin' ); ?></p>
    </div>
    <?php
}

?>
