<?php namespace T20n\Larabelt;


class Num {

	/**
	 * Round the given number to the nearest given multiple
	 *
	 * @param int $value
	 * @param int $multiple
	 *
	 * @return int
	 */
	public static function roundUpToNearestMultiple($value, $multiple = 1000) {
		return (int)ceil($value / $multiple) * $multiple;
	}

	/**
	 * Get a random number of the given digits of length.
	 *
	 * @param $digits
	 *
	 * @return int
	 */
	public function rand($digits) {
		--$digits;

		return rand(pow(10, $digits), (pow(10, $digits) * 10) - 1);
	}
}