<?php

/**
 * @package BloatBuster
 */

 namespace Includes\Pages;

/**
* Undocumented class
*/

 class Admin
 {
    public function register() {
      add_action('admin_menu', array( $this, 'add_options_link'));
    }

    public function add_options_link() {
      add_options_page('Bloat Buster Options', 'Bloat Buster', 'manage_options', 'bbuster-options', array( $this, 'options_page' ));
    }

    public function options_page() {
      require_once PLUGIN_PATH . 'templates/settings.php';
    }
 }