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
      register_setting('bloat_buster', '_bbuster_disable_emoji');
      register_setting('bloat_buster', '_bbuster_disable_fse_global_styles');
      register_setting('bloat_buster', '_bbuster_remove_rsd_link');
      register_setting('bloat_buster', '_bbuster_remove_shortlink');
      register_setting('bloat_buster', '_bbuster_disable_embed');
      register_setting('bloat_buster', '_bbuster_disable_xmlrpc');
      register_setting('bloat_buster', '_bbuster_hide_wp_version');
      register_setting('bloat_buster', '_bbuster_disable_heartbeat');
      register_setting('bloat_buster', '_bbuster_dequeue_dashicon');
    }
 }