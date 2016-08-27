<?php namespace T20n\Underscore;

class Json {

	const ENCODE = 0;
	const DECODE = 1;

	public static function encode($value, $options = 0, $depth = 512) {

		$value = json_encode($value, $options, $depth);

		if (!static::isValid()) {
			throw new \InvalidArgumentException(json_last_error_msg());
		}

		return $value;
	}

	public static function decode($value, $assoc = false, $depth = 512, $options = 0) {

		$value = json_decode($value, $assoc, $depth, $options);

		if (!static::isValid()) {
			throw new \InvalidArgumentException(json_last_error_msg());
		}

		return $value;
	}

	public static function isValid($value = null, $mode = 1) {

		if ($value) {
			switch ($mode) {
				case static::ENCODE:
					json_encode($value);
					break;
				case static::DECODE:
					json_decode($value);
					break;
				default:
					return false;
			}
		}

		return json_last_error() === JSON_ERROR_NONE;
	}

}

Json::decode('{}');