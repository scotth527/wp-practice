<?php
/*
Plugin Name: 6.09 - Practice 
Plugin URI: https://github.com/zgordon/wp-dev-course
Description: Demo plugin for learning how to enqueue JS with a plugin.
Version: 1.0.0
Contributors: shuang
Author: Scott Huang
Author URI: huangscott.com
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wpplugin
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

define( 'WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue Plugin CSS
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-styles.php');

// Enqueue Plugin JavaScript
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-scripts.php');

// Create Plugin Admin Menus and Setting Pages
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-menus.php');

?>
