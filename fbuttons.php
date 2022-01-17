<?php
/*
Plugin Name: Social Media Floating Buttons
Plugin URI: https://github.com/cargabsj175/
Description: Simple Plugin with more commons social networks float buttons for your wordpress site.
Version: 0.1
Author: Carlos Sanchez
Author URI: https://github.com/cargabsj175/
Text Domain: vgxfbuttons
Domain Path: /include/langs
License: GPL3
*/


define('MWC_ROOT', dirname(__FILE__));

function vgxfbuttons_load_textdomain() {
load_plugin_textdomain( 'vgxfbuttons', false, plugin_basename(dirname(__FILE__)) . '/langs/' );
}

add_action( 'plugins_loaded', 'vgxfbuttons_load_textdomain' );


// configs
require_once MWC_ROOT . '/include/settings.php';
// buttons code
require_once MWC_ROOT . '/include/snetworks.php';