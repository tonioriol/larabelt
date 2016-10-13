<?php

use T20n\Larabelt\URL;

class URLServiceTest extends PHPUnit_Framework_TestCase {

	public function test_addToQueryString_method_with_protocol_and_url() {
		$url = 'http://test.app';

		$this->assertEquals("$url?foo=bar", URL::addToQueryString($url, ['foo' => 'bar']));
	}

	public function test_addToQueryString_method_with_url() {
		$url = 'test.app';

		$this->assertEquals("$url?foo=bar", URL::addToQueryString($url, ['foo' => 'bar']));
	}

	public function test_addToQueryString_method_with_path() {
		$url = 'foo/bar/baz';

		$this->assertEquals("$url?foo=bar", URL::addToQueryString($url, ['foo' => 'bar']));
	}

	public function test_addToQueryString_method_with_empty() {
		$url = '';

		$this->assertEquals("$url?foo=bar", URL::addToQueryString($url, ['foo' => 'bar']));
	}

	public function test_addToQueryString_method_with_url_and_query() {
		$url = 'http://foo.bar?baz=foo';

		$this->assertEquals("$url&foo=bar", URL::addToQueryString($url, ['foo' => 'bar']));
	}
}
