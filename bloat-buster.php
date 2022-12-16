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
 * Version:           1.1.2.1
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

if( ! class_exists('Bloat_Buster'))
{
  class Bloat_Buster
  {
    private static $instance;

    public static function instance()
    {
      if ( ! isset(self::$instance) && ! (self::$instance instanceof Bloat_Buster))
      {
        self::$instance = new Bloat_Buster();
        self::$instance->define_constants();
        self::$instance->includes();
        self::$instance->init = new Bloat_Buster_Init();
      }
      return self::$instance;
    }

    private function define_constants()
    {
      define( 'BBUSTER_PATH', plugin_dir_path(__FILE__));
      define( 'BBUSTER_URL',  plugin_dir_url(__FILE__));
      define( 'BBUSTER_FILE', plugin_basename(__FILE__));
      define( 'BBUSTER_NAME', 'bloat-buster');
      define( 'BBUSTER_VERSION', '1.1.2.1');
    }

    private function includes()
    {
      foreach ( glob( BBUSTER_PATH . "includes/*.php") as $class )
      {
        require_once $class;
      }
    }
  }
  
  add_action( 'plugins_loaded', array( 'Bloat_Buster', 'instance') );
}