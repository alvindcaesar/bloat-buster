<?php

/**
 * @package BloatBuster
 */


/**
* Undocumented class
*/

 class Setting_Page
 {
    public function __construct() {
      add_action('admin_menu', array( $this, 'add_options_link'));
    }

    public function add_options_link() {
      add_options_page('Bloat Buster Options', 'Bloat Buster', 'manage_options', 'bbuster-options', array( $this, 'options_page' ));
    }

    public function options_page() {
      require_once BBUSTER_PATH . 'includes/partials/setting.php';
    }
 }