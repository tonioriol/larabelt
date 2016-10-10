<?php namespace T20n\Underscore;


class Url {
	/**
	 * Adds (?) or appends (&) query string parameters to the given url/path
	 *
	 * @param $url    string the url/path to add the query string parameters
	 * @param $params array the parameters as key/value array to be added as query string parameters
	 *
	 * @return string the url/path with the parameters formatted
	 */
	public static function addToQueryString($url, $params) {

		foreach ($params as $key => $val) {
			$glue = parse_url($url, PHP_URL_QUERY) ? "&" : "?";
			$url .= "$glue$key=$val";
		}

		return $url;
	}
}