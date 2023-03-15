<?php

namespace Bloatbuster\Pages\Settings;

class Import
{
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
  
    // Read the JSON data from the uploaded file
    $json_data = file_get_contents( $_FILES['json_file']['tmp_name'] );
  
    // Decode the JSON data into an associative array
    $settings = json_decode( $json_data, true );
  
    // Loop through each setting and update it in the WordPress options table
    foreach ( $settings as $name => $value ) {
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