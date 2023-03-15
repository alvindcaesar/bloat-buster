<?php
/**
 * A PHP file containing the definition of the Admin class, which is used to register the Bloat Buster Options page in the WordPress admin dashboard.
 *
 * @package Bloatbuster\Pages
 */

 namespace Bloatbuster\Pages;

 class Admin
 {
   /**
    * Registers the Bloat Buster Options page in the WordPress admin dashboard.
    */
   public function register()
   {
     add_action('admin_menu', array( $this, 'add_options_link'));
   }
 
   /**
    * Adds the Bloat Buster Options link to the WordPress admin dashboard.
    */
   public function add_options_link() 
   {
     add_options_page('Bloat Buster Options', 'Bloat Buster', 'manage_options', 'bbuster-options', array( $this, 'options_page' ));
   }
 
   /**
    * Loads the Bloat Buster Options page template.
    */
   public function options_page() 
   {
     require_once BBUSTER_PATH . 'includes/partials/layout.php';
   }
 }
 