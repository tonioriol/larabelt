<?php namespace T20n\Underscore;


use DB;
use Log;
use stdClass;

class Underscore {

	/**
	 * Get the current environment, or true or false if parameter is given
	 * (possible environments: local, staging and production.)
	 *
	 * @param string $e environment to test (separated by spaces if more than one)
	 *
	 * @return bool|string
	 */
	public function env($e = null) {

		$env = app()->environment('production') ? str_contains(url('/'), 'stage.') ? 'staging' : 'production' : 'local';

		return is_null($e) ? $env : str_contains($env, explode(' ', $e));
	}

	/**
	 * print_r to logs
	 *
	 * @param string $level
	 * @param string $message some text message.
	 * @param        $var
	 * @param array  $context
	 */
	public function logr($level, $message, $var = null, $context = []) {
		Log::write($level, $message . "\n" . print_r($var, true), $context);
	}

	public function constraintExists($fkName, $schema = 'db') {
		return DB::table('information_schema.table_constraints')->whereTableSchema($schema)->whereConstraintName($fkName)->exists();
	}

	public function rand($digits) {
		--$digits;

		return rand(pow(10, $digits), (pow(10, $digits) * 10) - 1);
	}

	/**
	 * Determines if a property exists in an object or an array or in a mix of nested arrays and objects
	 *
	 * @param stdClass|array $object     the object/array/mix to search in
	 * @param string         $properties can be nested, with dot notation
	 *
	 * @return bool true on success, false on failure
	 */
	public function propExists($object, $properties) {
		$properties = explode('.', $properties);
		$first      = array_first($properties);

		if (!array_key_exists($first, (array)$object)) {
			return false;
		}

		if (count($properties) == 1) {
			return array_key_exists($first, (array)$object);
		}

		array_shift($properties);

		return $this->propExists(is_array($object) ? $object[$first] : $object->$first, implode('.', $properties));
	}

	/**
	 * Gets a property if exists in an object
	 *
	 * @param stdClass $object     the object to search in
	 * @param string   $properties can be nested, with dot notation
	 *
	 * @return mixed object on success, false on failure
	 */
	public function getProp($object, $properties) {

		if (!$this->propExists($object, $properties)) {
			return false;
		}

		$value = null;
		foreach (explode('.', $properties) as $property) {
			$object = $object->$property;
		}

		return $object;
	}

	/**
	 * Checks if only the given keys are present in the given array.
	 *
	 * @param array        $array the array to check against
	 * @param string|array $keys  the key (string) or keys (array) to look at
	 *
	 * @return bool
	 */
	public function arrayHasOnly(array $array, $keys) {

		$keys = !is_array($keys) ? is_string($keys) ? [$keys] : [] : $keys;

		foreach ($keys as $item) {
			if (!array_key_exists($item, $array)) {
				return false;
			}
		}

		return count($array) == count($keys);
	}

	/**
	 * Formats and logs an exception.
	 *
	 * @param \Exception $e
	 *
	 * @return string
	 */
	public function logException(\Exception $e) {
		$message = get_class($e) . ' "' . $e->getMessage() . '" on: "' . $e->getFile() . ':' . $e->getLine() . '".';
		Log::error($message, $e->getTrace());

		return $message;
	}

	/**
	 * Convert an hyphen separated string to a camel cased string.
	 *
	 * @param      $string         string the string to convert
	 * @param bool $upperCamelCase if the resulting string has to begin capitalized
	 *
	 * @return string the converted string
	 */
	public function hyphenToCamel($string, $upperCamelCase = false) {
		$string = str_replace('-', '', ucwords($string, "-"));

		return $upperCamelCase ? $string : lcfirst($string);
	}

	public function fileReplace($search, $replacement, $file) {
		return file_put_contents($file, str_replace($search, $replacement, file_get_contents($file)));
	}

	/**
	 * @param string $string
	 * @param bool   $returnData
	 *
	 * @return bool|object
	 * @see https://arjunphp.com/check-is-a-string-valid-json-php/#sthash.rkTi9hXL.dpuf
	 */
	public function isJson($string, $returnData = false) {
		$data = json_decode($string);

		return (json_last_error() == JSON_ERROR_NONE) ? ($returnData ? $data : true) : false;
	}

	public function roundUpToNearestMultiple($value, $multiple = 1000) {
		return (int)ceil($value / $multiple) * $multiple;
	}

	/**
	 * Replace the last occurrence of a given value in the string.
	 *
	 * @param  string $search
	 * @param  string $replace
	 * @param  string $subject
	 *
	 * @return string
	 */
	public function strReplaceLast($search, $replace, $subject) {

		$position = strrpos($subject, $search);

		if ($position !== false) {
			return substr_replace($subject, $replace, $position, strlen($search));
		}

		return $subject;
	}

	/**
	 * Replace the first occurrence of a given value in the string.
	 *
	 * @param  string $search
	 * @param  string $replace
	 * @param  string $subject
	 *
	 * @return string
	 */
	public function strReplaceFirst($search, $replace, $subject) {

		$position = strpos($subject, $search);

		if ($position !== false) {
			return substr_replace($subject, $replace, $position, strlen($search));
		}

		return $subject;
	}


	/**
	 * Get a substring from a string using a token to delimit the end of the desired substring.
	 *
	 * @param string $string the string to search from
	 * @param string $token  the the token delimiting the end of the desired substring
	 *
	 * @return string|bool The substring
	 */
	public function strGetUntil($string, $token) {
		$exploded = explode($token, $string);

		return isset($exploded[0]) ? $exploded[0] : false;
	}

	/**
	 * Adds (?) or appends (&) query string parameters to the given url/path
	 *
	 * @param $url string the url/path to add the query string parameters
	 * @param $params array the parameters as key/value array to be added as query string parameters
	 *
	 * @return string the url/path with the parameters formatted
	 */
	public function addToQueryString($url, $params) {

		foreach ($params as $key => $val) {
			$glue = parse_url($url, PHP_URL_QUERY) ? "&" : "?";
			$url .= "$glue$key=$val";
		}

		return $url;
	}
}
