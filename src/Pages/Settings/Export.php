<?php

namespace Bloatbuster\Pages\Settings;

class Export
{
  public function register()
  {
    add_action('admin_post_export_settings', array($this, 'export_settings'));
  }

  public function export_settings()
   {
    $settings_name = \Bloatbuster\Pages\Settings\Register::settings_name();

    $settings = array();

    foreach ($settings_name as $setting) {
      $settings['_bbuster_'. $setting] = get_option('_bbuster_'. $setting);
    }

    $json_data = json_encode($settings); // Encode the settings as JSON

    $filename = 'bloatbuster_settings_' . time() . '.json';
    
    header("Content-disposition: attachment; filename={$filename}"); // Set the filename for the downloaded file

    header('Content-Type: application/json'); // Set the content type to JSON

    echo $json_data; // Output the JSON data

    exit;
   }
}