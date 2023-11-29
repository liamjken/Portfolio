<?php
/**
 * Plugin Name:       Portfolio Plugin
 * Plugin URI:        https://rightroaddigital.com
 * Description:       Creates a database of speicific portfolio samples that can be accessed via custom endpoints
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            Liam Kennedy
 * Author URI:        https://rightroaddigital.com
 * Text Domain:       portfolio-plugin
 * Domain Path:       /languages
 */

if(!function_exists('add_action')) {
    echo 'Seems like you stumbled here by accident. 😝';
exit;
}

// Setup
define('PP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PP_PLUGIN_FILE', __FILE__);

// Enqueue script
function enqueue_portfolio_script() {
    wp_enqueue_media();
    wp_enqueue_script('portfolio-script', plugin_dir_url(__FILE__) . 'js/mediaUpload.js', array('jquery', 'media-upload', 'thickbox'), null, true);
}

add_action('admin_enqueue_scripts', 'enqueue_portfolio_script');

// Includes
$rootFiles = glob(  PP_PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(PP_PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach($allFiles as $filename) {
    include_once($filename);

}

register_activation_hook(__FILE__, 'create_portfolio_table');
add_action('rest_api_init', 'port_rest_api_init');