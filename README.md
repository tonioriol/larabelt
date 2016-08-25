# Underscore 

Underscore is a set of helper methods that I usually need for my day to day development (with Laravel mainly).

This package is intended to work with laravel, so some methods will not work without laravel.

## Install

1. `composer require t20n/underscore`
2. add the service provider and alias to the `config/app.php` of your laravel install:
  - Provider:`T20n\Underscore\UnderscoreServiceProvider::class,`
  - Alias: `'_' => T20n\Underscore\Facades\UnderscoreFacade::class,`
  
  ## Usage
  
  This is one of the available methods:
  
  ```php
  /**
  	 * Determines if a property exists in an object
  	 *
  	 * @param \stdClass $object     the object to search in
  	 * @param string    $properties can be nested, with dot notation
  	 *
  	 * @return bool true on success, false on failure
  	 */
  	_::propExists($object, $properties);
  	```
  	
  	If you want to know more about simply inspect the Underscore.php under the src folder, all methods are documented there.