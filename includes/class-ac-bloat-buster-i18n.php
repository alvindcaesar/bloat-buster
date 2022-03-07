<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://alvindcaesar.com
 * @since      1.0.0
 *
 * @package    Ac_Bloat_Buster
 * @subpackage Ac_Bloat_Buster/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ac_Bloat_Buster
 * @subpackage Ac_Bloat_Buster/includes
 * @author     Alvind Caesar <hello@alvindcaesar.com>
 */
class Ac_Bloat_Buster_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ac-bloat-buster',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
