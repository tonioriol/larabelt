<?php namespace T20n\Larabelt;

use Config;

class DB extends \Illuminate\Support\Facades\DB {

	/**
	 * Check if a constraint exists in the database schema.
	 *
	 * @param string $constraintName the name of the constraint to check
	 * @param string $schema         [optional] other schema than the default of the app
	 *
	 * @return bool
	 */
	public function constraintExists($constraintName, $schema = null) {
		$schema = $schema ?: Config::get('database.connections.' . Config::get('database.default') . '.database');

		return static::table('information_schema.table_constraints')->whereTableSchema($schema)->whereConstraintName($constraintName)->exists();
	}
}