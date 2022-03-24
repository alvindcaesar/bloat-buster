<?php

/**
 * @link              https://github.com/alvindcaesar/bloat-buster
 * @since             1.0.0
 * @package           Bloat_Buster
 *
 * @wordpress-plugin
 * Plugin Name:       Bloat Buster
 * Plugin URI:        https://github.com/alvindcaesar/bloat-buster
 * Description:       A super simple plugin to remove bloat from your WordPress site.
 * Version:           1.0.0
 * Author:            Alvind Caesar
 * Author URI:        https://alvindcaesar.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bloat-buster
 * Domain Path:       /languages
 */


if ( ! defined('ABSPATH') ) {
  exit;
}

if ( file_exists( dirname( __FILE__ ). '/vendor/autoload.php')) {
  require_once dirname( __FILE__ ). '/vendor/autoload.php';
}

define( 'PLUGIN_PATH', plugin_dir_path(__FILE__));
define( 'PLUGIN_URL', plugin_dir_url(__FILE__));
define( 'PLUGIN_FILE', plugin_basename(__FILE__));
define( 'PLUGIN_NAME', 'bloat-buster');
define( 'PLUGIN_VERSION', '1.0.0');

if ( class_exists( 'Includes\\Init')) {
  Includes\Init::register_services();
}