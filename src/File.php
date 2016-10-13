<?php namespace T20n\Larabelt;

class File extends \Illuminate\Support\Facades\File {

	/**
	 * Searches and replaces the contents of the given file
	 *
	 * @param string $search the string to search
	 * @param string $replacement the replacement string
	 * @param string $file the path of the file
	 *
	 * @return int
	 */
	public static function replaceContents($search, $replacement, $file) {
		return static::put($file, str_replace($search, $replacement, static::get($file)));
	}
}