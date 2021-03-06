<?php namespace T20n\Larabelt;


class Arr extends \Illuminate\Support\Arr {
	/**
	 * Checks if only the given keys are present in the given array.
	 *
	 * @param array        $array the array to check against
	 * @param string|array $keys  the key (string) or keys (array) to look at
	 *
	 * @return bool
	 */
	public static function hasOnly(array $array, $keys) {

		$keys = !is_array($keys) ? is_string($keys) ? [$keys] : [] : $keys;

		foreach ($keys as $item) {
			if (!array_key_exists($item, $array)) {
				return false;
			}
		}

		return count($array) === count($keys);
	}
}
