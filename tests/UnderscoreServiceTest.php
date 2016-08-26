<?php

use \T20n\Underscore\Underscore;

class UnderscoreServiceTest extends PHPUnit_Framework_TestCase {

	protected $underscore;

	public function __construct($name = null, array $data = [], $dataName = '') {
		$this->underscore = new Underscore();
		parent::__construct($name, $data, $dataName);
	}

	public function test_propExist_method_with_object() {
		$object = (object)[
			'dot' => (object)[
				'notated' => (object)[
					'string' => 'someValue',
				],
			],
		];

		$this->assertTrue($this->underscore->propExists($object, 'dot'));
		$this->assertTrue($this->underscore->propExists($object, 'dot.notated'));
		$this->assertTrue($this->underscore->propExists($object, 'dot.notated.string'));

		$this->assertFalse($this->underscore->propExists($object, 'no.notated.string'));
		$this->assertFalse($this->underscore->propExists($object, 'dot.string.notated'));
		$this->assertFalse($this->underscore->propExists($object, 'string.dot.notated'));
	}

	public function test_propExist_method_with_array() {
		$object = [
			'dot' => [
				'notated' => [
					'string' => 'someValue',
				],
			],
		];

		$this->assertTrue($this->underscore->propExists($object, 'dot'));
		$this->assertTrue($this->underscore->propExists($object, 'dot.notated'));
		$this->assertTrue($this->underscore->propExists($object, 'dot.notated.string'));

		$this->assertFalse($this->underscore->propExists($object, 'no.notated.string'));
		$this->assertFalse($this->underscore->propExists($object, 'dot.string.notated'));
		$this->assertFalse($this->underscore->propExists($object, 'string.dot.notated'));
	}

	public function test_propExist_method_with_mixed() {
		$object = [
			'dot' => (object)[
				'notated' => [
					'string' => 'someValue',
				],
			],
		];

		$this->assertTrue($this->underscore->propExists($object, 'dot'));
		$this->assertTrue($this->underscore->propExists($object, 'dot.notated'));
		$this->assertTrue($this->underscore->propExists($object, 'dot.notated.string'));

		$this->assertFalse($this->underscore->propExists($object, 'no.notated.string'));
		$this->assertFalse($this->underscore->propExists($object, 'dot.string.notated'));
		$this->assertFalse($this->underscore->propExists($object, 'string.dot.notated'));
	}

	public function test_addToQueryString_method_with_protocol_and_url() {
		$url = 'http://test.app';

		$this->assertEquals("$url?foo=bar", $this->underscore->addToQueryString($url, ['foo' => 'bar']));
	}

	public function test_addToQueryString_method_with_url() {
		$url = 'test.app';

		$this->assertEquals("$url?foo=bar", $this->underscore->addToQueryString($url, ['foo' => 'bar']));
	}

	public function test_addToQueryString_method_with_path() {
		$url = 'foo/bar/baz';

		$this->assertEquals("$url?foo=bar", $this->underscore->addToQueryString($url, ['foo' => 'bar']));
	}

	public function test_addToQueryString_method_with_empty() {
		$url = '';

		$this->assertEquals("$url?foo=bar", $this->underscore->addToQueryString($url, ['foo' => 'bar']));
	}

	public function test_addToQueryString_method_with_url_and_query() {
		$url = 'http://foo.bar?baz=foo';

		$this->assertEquals("$url&foo=bar", $this->underscore->addToQueryString($url, ['foo' => 'bar']));
	}
}
