<?php

/**
 * @package BloatBuster
 */

 namespace Includes\Base;

 class SettingOptions
 {
    public function register() {
      add_action('init', array( $this, 'setting_options' ));
    }

    public function setting_options() {
      if ( true == get_option('_bbuster_disable_emoji') ) {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'feed_links', 2);
      }

      if ( true == get_option('_bbuster_disable_fse_global_styles')) {
        remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
        remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
      }

    }
 }
