<?php

namespace T20n\Underscore;

use Illuminate\Support\ServiceProvider;

class UnderscoreServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

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
		$this->app->singleton('T20n\Underscore\Underscore', Underscore::class);
	}
}
