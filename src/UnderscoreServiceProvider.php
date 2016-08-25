<?php

namespace T20n\Underscore;

use Illuminate\Support\ServiceProvider;

class UnderscoreServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->singleton('underscore', Underscore::class);
	}
}
