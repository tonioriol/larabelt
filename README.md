# Larabelt 

Larabelt is a toolbelt for Laravel, a set of helper classes that I usually need for my day to day development.

I publish this hoping that someone will find it useful too. I you encounter any bug feel free to open an issue.

_This package is intended to work with laravel, so some methods will not work without it._

Some classes of the package extend existing Laravel Facades such as `File` and `Log`. Some others extend helper classes that doesn't have a facade such as `Str` or `Arr`.



## Install

1. `composer require t20n/larabelt`
2. For the classes that extend facades replace this from the `aliases` array in `config/app.php` of your laravel install:
	- `'DB' => T20n\Larabelt\DB::class,`
	- `'File' => T20n\Larabelt\File::class,`
	- `'Log' => T20n\Larabelt\Log::class,`
	- `'URL' => T20n\Larabelt\URL::class,`

## Usage

@todo