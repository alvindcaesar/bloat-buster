<?php

/**
 * Display functions for outputting information
 */

// Function to disable

function bbuster_setting_options()
{
  global $bbuster_options;

  if ($bbuster_options[0] == true) {
    add_filter('auto_update_theme', '__return_false');
    add_filter('auto_update_plugin', '__return_false');
  }

  if ($bbuster_options[1] == true) {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'feed_links', 2);
  }

  if ($bbuster_options[2] == true) {
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
  }
}
add_action('init', 'bbuster_setting_options');
