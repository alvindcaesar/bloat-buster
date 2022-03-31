<?php

/**
 * Main Init Class
 */

if ( ! defined('ABSPATH') ) {
  exit;
}

class Bloat_Buster_Init
{
  public function __construct()
  {
    return array(
      new Register_Setting(),
      new Setting_Options(),
      new Settings_Links(),
      new Setting_Page()
    );
  }
}