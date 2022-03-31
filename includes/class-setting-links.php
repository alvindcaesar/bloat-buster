<?php

/**
 * @package BloatBuster
 */


 class Settings_Links
 {
    public function __construct() {
      add_filter('plugin_action_links_' . PLUGIN_FILE, array( $this, 'add_settings_links' ));
    }

    public function add_settings_links( $links ) {
      $mylinks = array(
        '<a href="' . admin_url('options-general.php?page=bbuster-options') . '">Settings</a>',
      );
      return array_merge($links, $mylinks);
    }
 }