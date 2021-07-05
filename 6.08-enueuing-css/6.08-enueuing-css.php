<?php
/*
Plugin Name: 6.08 - Enqueue CSS
Plugin URI: https://github.com/zgordon/wp-dev-course
Description: Demo plugin for learning how to enqueue CSS with a plugin.
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

define( 'WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );

include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-styles.php');

include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-menus.php');

?>
