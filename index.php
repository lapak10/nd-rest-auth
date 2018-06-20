<?php defined('ABSPATH') or exit;
/*
Plugin Name: Custom Table Create
Plugin URI: https://wordpress.org/plugins/health-check/
Description: Creates a custom table in db when activated and deletes when deactivated
Version: 0.1.0
Author: Anand Kumar Chaudhary
Author URI: https://fb.com/anand.kmk
Text Domain: health-check
Domain Path: /languages
*/

register_activation_hook( __FILE__, array( 'ND_rest_auth','create_table' ) );


// Not working for some reasons
register_deactivation_hook( __FILE__, array( 'ND_rest_auth','remove_table' ) );



include_once('class/class-nd-rest-auth.php');
include_once('class/class-nd-auth-helper.php');
include('endpoints/endpoints_init.php');