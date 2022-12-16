<?php

/**
 * @package BloatBuster
 */


 class Register_Setting
 {
    public function __construct() {
      add_action('admin_init', array( $this, 'register_setting'));
    }

    public function register_setting() {

      $settings = $this->settings();

      foreach ($settings as $setting) {
        register_setting('bloat_buster', '_bbuster_'. $setting );
      }
    }

    public function settings() {
      return array(
        'disable_emoji',
        'disable_fse_global_styles',
        'remove_rsd_link',
        'remove_shortlink',
        'disable_embed',
        'disable_xmlrpc',
        'hide_wp_version',
        'disable_heartbeat',
        'dequeue_dashicon'
      );
    }
 }