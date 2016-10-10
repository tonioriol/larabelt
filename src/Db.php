<?php namespace T20n\Underscore;


class Db {
	public function constraintExists($fkName, $schema = 'db') {
		return DB::table('information_schema.table_constraints')->whereTableSchema($schema)->whereConstraintName($fkName)->exists();
	}
}