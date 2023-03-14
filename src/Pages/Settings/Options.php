<?php

namespace Bloatbuster\Pages\Settings;

class Options
{
  public function register() 
  {
    add_action('init', array( $this, 'setting_options' ));
    add_action('wp_footer',array( $this, 'disable_embed' ));
    add_action('wp_enqueue_scripts',array( $this, 'dequeue_dashicon' ));
  }

  public function setting_options() 
  {
    if ( true == get_option('_bbuster_disable_emoji') ) {
      remove_action('wp_head', 'print_emoji_detection_script', 7);
      remove_action('wp_print_styles', 'feed_links', 2);
      remove_action('wp_print_styles', 'print_emoji_styles');
      remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
      remove_action( 'admin_print_styles', 'print_emoji_styles' );
    }

    if ( true == get_option('_bbuster_disable_fse_global_styles')) {
      remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
      remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
    }

    if ( true == get_option('_bbuster_remove_rsd_link')) {
      remove_action( 'wp_head', 'rsd_link' );
    }

    if ( true == get_option('_bbuster_remove_shortlink')) {
      remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    }

    if ( true == get_option('_bbuster_disable_xmlrpc')) {
      add_filter('xmlrpc_enabled', '__return_false');
    }

    if ( true == get_option('_bbuster_hide_wp_version')) {
      remove_action( 'wp_head', 'wp_generator' );
    }

    if ( true == get_option('_bbuster_disable_heartbeat')) {
      wp_deregister_script('heartbeat');
    }
  }

  public function disable_embed() 
  {
    if ( true == get_option('_bbuster_disable_embed')) {
      wp_dequeue_script( 'wp-embed' );
    }
  }

  public function dequeue_dashicon() 
  {
    if ( true == get_option('_bbuster_dequeue_dashicon')){
      if ( current_user_can('manage_options')){
        return;
      }
      wp_deregister_style('dashicons');
    }
  }
}