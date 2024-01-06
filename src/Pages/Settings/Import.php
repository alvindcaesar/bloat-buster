<?php

namespace Bloatbuster\Pages\Settings;

class Import
{
  private $allowed_keys;

  public function __construct()
  {
    $this->allowed_keys = \Bloatbuster\Pages\Settings\Register::settings_name();
  }

  public function register()
  {
    add_action( 'admin_post_import_settings', array($this, 'import_settings') );
    add_action( 'admin_notices', array($this, 'success_notices') );
  }

  function import_settings() 
  {
    // Verify the nonce and user permissions
    if ( !wp_verify_nonce( $_POST['_wpnonce'], 'import_settings' ) || !current_user_can( 'manage_options' ) ) {
      wp_die( 'Access denied.' );
    }
  
    // File Type Validation
    $file_info = pathinfo( $_FILES['json_file']['name'] );
    if ( strtolower( $file_info['extension'] ) !== 'json' ) {
      wp_die( 'Invalid file type. Please upload a JSON file.' );
    }

    // Size Limitations
    $max_file_size = 1024 * 1024; // 1 MB
    if ( $_FILES['json_file']['size'] > $max_file_size ) {
      wp_die( 'File size exceeds the maximum allowed limit.' );
    }

    // File Content Validation
    $json_data = file_get_contents( $_FILES['json_file']['tmp_name'] );
    $settings = json_decode( $json_data, true );

    if ($settings === null && json_last_error() !== JSON_ERROR_NONE) {
      wp_die( 'Invalid JSON content in the uploaded file.' );
    }

    // Data Structure Validation and Key Verification
    // if ( ! isset($settings['_bbuster_disable_embed'] ) ) {
    //   wp_die( 'Invalid JSON structure. Missing some keys.' );
    // }

    foreach ( $settings['settings'] as $name => $value ) {
      if ( !in_array( $name, $this->allowed_keys ) ) {
        wp_die( 'Invalid key found in JSON data.' );
      }
    }

    foreach ( $settings['settings'] as $name => $value ) {
      $existing_value = get_option( $name );
      if ( false !== $existing_value ) {
        // Update existing option
        update_option( $name, $value );
      } else {
        // Create new option
        add_option( $name, $value );
      }
    }
  
    // Set a transient to display an admin notice
    set_transient( '_import_success', true, 5 );
  
    // Redirect the user back to the settings page
    wp_redirect( admin_url( 'options-general.php?page=bbuster-options' ) );
    exit;
  }

  public function success_notices() 
  {
    if ( get_transient( '_import_success' ) ) {
      echo '<div class="notice notice-success is-dismissible"><p>Settings imported successfully.</p></div>';
      delete_transient( '_import_success' );
    }
  }
}
