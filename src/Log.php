<?php namespace T20n\Underscore;

use Log as LaravelLog;

class Log {
	/**
	 * print_r to logs
	 *
	 * @param string $level
	 * @param string $message some text message.
	 * @param        $var
	 * @param array  $context
	 */
	public function r($level, $message, $var = null, $context = []) {
		LaravelLog::write($level, $message . "\n" . print_r($var, true), $context);
	}

	/**
	 * Formats and logs an exception.
	 *
	 * @param \Exception $e
	 *
	 * @return string
	 */
	public function logException(\Exception $e) {
		$message = get_class($e) . ' "' . $e->getMessage() . '" on: "' . $e->getFile() . ':' . $e->getLine() . '".';
		LaravelLog::error($message, $e->getTrace());

		return $message;
	}
}