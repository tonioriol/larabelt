<?php

namespace T20n\Underscore\Facades;

use Illuminate\Support\Facades\Facade;

class UnderscoreFacade extends Facade {

	protected static function getFacadeAccessor() {

		return 'underscore';
	}
}