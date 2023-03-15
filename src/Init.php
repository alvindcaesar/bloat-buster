<?php
/**
 * Init class to register and instantiate services.
 *
 * @package Bloatbuster
 */

 namespace Bloatbuster;

 final class Init
 {
   /**
    * Returns an array of services to be registered.
    *
    * @return array The array of services to be registered.
    */
   public static function get_services()
   {
     return array(
       Pages\Admin::class,
       Pages\Settings\Links::class,
       Pages\Settings\Export::class,
       Pages\Settings\Import::class,
       Pages\Settings\Options::class,
       Pages\Settings\Register::class,
     );
   }
 
   /**
    * Registers all the services returned by get_services().
    */
   public static function register_services()
   {
     foreach (self::get_services() as $class) {
       $service = self::instantiate($class);
       if ( method_exists($service, 'register')) {
         $service->register();
       }
     }
   }
 
   /**
    * Instantiates the provided class.
    *
    * @param string $class The class to be instantiated.
    *
    * @return object The instance of the provided class.
    */
   private static function instantiate($class)
   {
     return new $class;
   }
 }