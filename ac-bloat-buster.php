<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://alvindcaesar.com
 * @since             1.0.0
 * @package           Ac_Bloat_Buster
 *
 * @wordpress-plugin
 * Plugin Name:       AC Bloat Buster
 * Plugin URI:        https://alvindcaesar.com
 * Description:       A super simple plugin to remove bloat from your WordPress site.
 * Version:           1.0.0
 * Author:            Alvind Caesar
 * Author URI:        https://alvindcaesar.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ac-bloat-buster
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AC_BLOAT_BUSTER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ac-bloat-buster-activator.php
 */
function activate_ac_bloat_buster() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ac-bloat-buster-activator.php';
	Ac_Bloat_Buster_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ac-bloat-buster-deactivator.php
 */
function deactivate_ac_bloat_buster() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ac-bloat-buster-deactivator.php';
	Ac_Bloat_Buster_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ac_bloat_buster' );
register_deactivation_hook( __FILE__, 'deactivate_ac_bloat_buster' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ac-bloat-buster.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ac_bloat_buster() {

	$plugin = new Ac_Bloat_Buster();
	$plugin->run();

}
run_ac_bloat_buster();
