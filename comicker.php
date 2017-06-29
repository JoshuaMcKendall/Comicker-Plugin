<?php
/**
 * @link              https://github.com/JoshuaMcKendall/Comicker-Plugin
 * @since             1.0.0
 * @package           Comicker
 *
 * @wordpress-plugin
 * Plugin Name:       Comicker
 * Plugin URI:        TBA
 * Description:       A simple plugin for webcomic creators that makes it easier to create, edit, and manage webcomics on, well, the web.
 * Version:           1.0.0
 * Author:            Joshua McKendall
 * Author URI:        http://joshuamckendall.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       comicker
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_comicker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-comicker-activator.php';
	Comicker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_comicker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-comicker-deactivator.php';
	Comicker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_comicker' );
register_deactivation_hook( __FILE__, 'deactivate_comicker' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-comicker.php';

/**
 * Begin execution of the plugin.
 *
 * @since    1.0.0
 */
function run_comicker() {

	$plugin = new Comicker();
	$plugin->run();

}

run_comicker();
