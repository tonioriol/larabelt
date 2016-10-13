<?php namespace T20n\Larabelt;

use stdClass;

class Obj {

	/**
	 * Determines if a property exists in an object/array/mix
	 *
	 * @param stdClass|array $object     the object/array/mix to search in
	 * @param string         $properties can be nested, with dot notation
	 *
	 * @return bool true on success, false on failure
	 */
	public static function has($object, $properties) {
		$properties = explode('.', $properties);
		$first      = array_first($properties);

		if (!array_key_exists($first, (array)$object)) {
			return false;
		}

		if (count($properties) == 1) {
			return array_key_exists($first, (array)$object);
		}

		array_shift($properties);

		return static::has(is_array($object) ? $object[$first] : $object->$first, implode('.', $properties));
	}

	/**
	 * Gets a property if exists in an object/array/mix using a dot notated string
	 *
	 * @param stdClass|array $object     the object/array/mix to get from
	 * @param string         $properties can be nested, with dot notation
	 *
	 * @return mixed object on success, false on failure
	 */
	public static function get($object, $properties) {

		if (!static::has($object, $properties)) {
			return false;
		}

		foreach (explode('.', $properties) as $property) {
			if (!is_array($object) and !is_object($object)) {
				return $object;
			}

			$object = (array)$object;

			$object = $object[$property];
		}

		return $object;
	}
}