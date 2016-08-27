<?php namespace T20n\Underscore;

class Str {

	/**
	 * Replace the first occurrence of a given value in the string.
	 *
	 * @param  string $search
	 * @param  string $replace
	 * @param  string $string
	 *
	 * @return string
	 */
	public static function replaceFirst($string, $search, $replace) {

		$position = strpos($string, $search);

		if ($position !== false) {
			return substr_replace($string, $replace, $position, strlen($search));
		}

		return $string;
	}

	/**
	 * Replace the last occurrence of a given value in the string.
	 *
	 * @param  string $search
	 * @param  string $replace
	 * @param  string $string
	 *
	 * @return string
	 */
	public static function replaceLast($string, $search, $replace) {

		$position = strrpos($string, $search);

		if ($position !== false) {
			return substr_replace($string, $replace, $position, strlen($search));
		}

		return $string;
	}

	/**
	 * Get a substring from a string using a token to delimit the end of the desired substring.
	 *
	 * @param string $string the string to search from
	 * @param string $token  the the token delimiting the end of the desired substring
	 *
	 * @return string|bool The substring
	 */
	public static function until($string, $token) {
		$exploded = explode($token, $string);

		return isset($exploded[0]) ? $exploded[0] : false;
	}

	/**
	 * Convert an hyphen separated string to a camel cased string.
	 *
	 * @param      $string         string the string to convert
	 * @param bool $upperCamelCase if the resulting string has to begin capitalized
	 *
	 * @return string the converted string
	 */
	public static function hyphenToCamel($string, $upperCamelCase = false) {
		$string = str_replace('-', '', ucwords($string, "-"));

		return $upperCamelCase ? $string : lcfirst($string);
	}

	/**
	 * Removes a substring from a given string.
	 *
	 * @param      $string  string The target string.
	 * @param      $toStrip string The search string.
	 * @param null $count
	 *
	 * @return mixed
	 */
	public static function strip($string, $toStrip, $count = null) {
		return str_replace($toStrip, '', $string, $count);
	}
}