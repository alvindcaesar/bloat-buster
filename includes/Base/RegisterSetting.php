<?php

/**
 * @package BloatBuster
 */

 namespace Includes\Base;

 class RegisterSetting
 {
    public function register() {
      add_action('admin_init', array( $this, 'register_setting'));
      add_filter('plugin_action_links_' . PLUGIN_FILE, array( $this, 'add_action_links' ));
    }

    public function register_setting() {
      register_setting('bloat_buster', '_bbuster_disable_emoji');
      register_setting('bloat_buster', '_bbuster_disable_fse_global_styles');
    }

    public function add_action_links( $links ) {
      $mylinks = array(
        '<a href="' . admin_url('options-general.php?page=bbuster-options') . '">Settings</a>',
      );
      return array_merge($links, $mylinks);
    }
 }