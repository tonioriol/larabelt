<?php namespace T20n\Underscore;

use App;

class Laravel {
	/**
	 * Get the current environment, or true or false if parameter is given
	 * (possible environments: local, staging and production.)
	 *
	 * @param string $e environment to test (separated by spaces if more than one)
	 *
	 * @return bool|string
	 */
	public function env($e = null) {

		$env = App::environment('production') ? str_contains(url('/'), 'stage.') ? 'staging' : 'production' : 'local';

		return is_null($e) ? $env : str_contains($env, explode(' ', $e));
	}
}