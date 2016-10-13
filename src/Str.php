<?php namespace T20n\Larabelt;

class Str extends \Illuminate\Support\Str {

	/**
	 * Get a substring of a given string from the beginning until the token.
	 *
	 * @param string $string the string to search from
	 * @param string $token  the the token delimiting the end of the desired substring
	 *
	 * @return string|bool The substring if the token exists, false otherwise
	 */
	public static function until($string, $token) {
		$exploded = explode($token, $string);

		return isset($exploded[0]) ? $exploded[0] : false;
	}

	/**
	 * Removes a substring from a given string.
	 *
	 * @param string   $string  The target string.
	 * @param string   $toStrip The search string.
	 * @param int|null $count   [optional] If passed, this will hold the number of matched and replaced needles.
	 *
	 * @return string the string without the removed substring
	 */
	public static function strip($string, $toStrip, $count = null) {
		return str_replace($toStrip, '', $string, $count);
	}
}