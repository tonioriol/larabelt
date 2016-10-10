<?php namespace T20n\Underscore;

class File {
	public function replaceContents($search, $replacement, $file) {
		return file_put_contents($file, str_replace($search, $replacement, file_get_contents($file)));
	}
}