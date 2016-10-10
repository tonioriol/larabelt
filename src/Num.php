<?php namespace T20n\Underscore;


class Num {
	public static function roundUpToNearestMultiple($value, $multiple = 1000) {
		return (int)ceil($value / $multiple) * $multiple;
	}

	public function rand($digits) {
		--$digits;

		return rand(pow(10, $digits), (pow(10, $digits) * 10) - 1);
	}
}