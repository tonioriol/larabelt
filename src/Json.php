<?php namespace T20n\Underscore;

use InvalidArgumentException;

class Json {

	public static function encode($value, $options = 0, $depth = 512) {

		$value = json_encode($value, $options, $depth);

		if (!static::is()) {
			throw new InvalidArgumentException(static::getLastErrorMessage());
		}

		return $value;
	}

	public static function decode($value, $assoc = false, $depth = 512, $options = 0) {

		$value = json_decode($value, $assoc, $depth, $options);

		if (!static::is()) {
			throw new InvalidArgumentException(static::getLastErrorMessage());
		}

		return $value;
	}

	/**
	 * Checks iif a string is a valid json.
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