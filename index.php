<?php defined('ABSPATH') or exit;
/*
Plugin Name: ND Rest Auth
Plugin URI: https://wordpress.org/plugins/health-check/
Description: Creats endpoints for token based REST Authentication
Version: 0.1.0
Author: Anand
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