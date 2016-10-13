<?php namespace T20n\Larabelt;

use InvalidArgumentException;

class Json {

	/**
	 * Encodes the given value into to a json string.
	 *
	 * @param mixed $value the value to be encoded
	 * @param int   $options
	 * @param int   $depth
	 *
	 * @return string the encoded json string
	 */
	public static function encode($value, $options = 0, $depth = 512) {

		$value = json_encode($value, $options, $depth);

		if (!static::is()) {
			throw new InvalidArgumentException(static::getLastErrorMessage());
		}

		return $value;
	}

	/**
	 * Decodes the given json string
	 *
	 * @param string $value the string to be decoded
	 * @param bool   $assoc if we want an associative array or an object
	 * @param int    $depth
	 * @param int    $options
	 *
	 * @return mixed
	 */
	public static function decode($value, $assoc = false, $depth = 512, $options = 0) {

		$value = json_decode($value, $assoc, $depth, $options);

		if (!static::is()) {
			throw new InvalidArgumentException(static::getLastErrorMessage());
		}

		return $value;
	}

	/**
	 * Checks if a string is a valid json.
	 *
	 * @param string $value
	 *
	 * @return bool true on success false on failure
	 */
	public static function is($value = null) {

		if ($value) {
			json_encode($value);
		}

		return json_last_error() === JSON_ERROR_NONE;
	}

	public static function getLastErrorMessage() {
		return json_last_error_msg();
	}
}