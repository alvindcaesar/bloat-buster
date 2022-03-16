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


if (!defined('ABSPATH')) {
  exit;
}

// Global variables
$bbuster_plugin_url = plugin_dir_url(__FILE__);
$bbuster_plugin_dir = plugin_dir_path(__FILE__);
$bbuster_plugin_file = plugin_basename(__FILE__);
$bbuster_plugin_name = 'bloat-buster';
$bbuster_plugin_version = '1.0.0';
$bbuster_plugin_prefix = 'bbuster_';

// Retrieve plugin settings from the database
$bbuster_options = array(
  get_option('bbuster_disable_auto_updates'),
  get_option('bbuster_disable_emoji'),
  get_option('bbuster_disable_fse_global_styles')
);

// Load the plugin
require_once($bbuster_plugin_dir . 'includes/bbuster-display-functions.php');
require_once($bbuster_plugin_dir . 'includes/bbuster-admin-page.php');

// Link to settings page from plugins screen
add_filter('plugin_action_links_' . $bbuster_plugin_file, 'add_action_links');
function add_action_links($links)
{
  $mylinks = array(
    '<a href="' . admin_url('options-general.php?page=bbuster-options') . '">Settings</a>',
  );
  return array_merge($links, $mylinks);
}