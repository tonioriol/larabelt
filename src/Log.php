<?php namespace T20n\Larabelt;

use Exception;

class Log extends \Illuminate\Support\Facades\Log {

	/**
	 * print_r to logs
	 *
	 * @param string $message some text message.
	 * @param        $var
	 */
	public static function r($message, $var) {
		static::debug($message . "\nPrint: " . print_r($var, true));
	}

	/**
	 * Formats and logs an exception.
	 *
	 * @param Exception $e
	 *
	 * @return string
	 */
	public static function exception(Exception $e) {
		$message = get_class($e) . ' "' . $e->getMessage() . '" on: "' . $e->getFile() . ':' . $e->getLine() . '".';
		static::error($message, $e->getTrace());

		return $message;
	}
}