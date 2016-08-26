<?php

use \T20n\Underscore\Underscore;

class UnderscoreServiceTest extends PHPUnit_Framework_TestCase {

	public function test_propExist_with_object_method() {
		$object = (object)[
			'dot' => (object)[
				'notated' => (object)[
					'string' => 'someValue',
				],
			],
		];

		$this->assertTrue((new Underscore)->propExists($object, 'dot'));
		$this->assertTrue((new Underscore)->propExists($object, 'dot.notated'));
		$this->assertTrue((new Underscore)->propExists($object, 'dot.notated.string'));

		$this->assertFalse((new Underscore)->propExists($object, 'no.notated.string'));
		$this->assertFalse((new Underscore)->propExists($object, 'dot.string.notated'));
		$this->assertFalse((new Underscore)->propExists($object, 'string.dot.notated'));
	}

	public function test_propExist_with_array_method() {
		$object = [
			'dot' => [
				'notated' => [
					'string' => 'someValue',
				],
			],
		];

		$this->assertTrue((new Underscore)->propExists($object, 'dot'));
		$this->assertTrue((new Underscore)->propExists($object, 'dot.notated'));
		$this->assertTrue((new Underscore)->propExists($object, 'dot.notated.string'));

		$this->assertFalse((new Underscore)->propExists($object, 'no.notated.string'));
		$this->assertFalse((new Underscore)->propExists($object, 'dot.string.notated'));
		$this->assertFalse((new Underscore)->propExists($object, 'string.dot.notated'));
	}

	public function test_propExist_with_mixed_method() {
		$object = [
			'dot' => (object)[
				'notated' => [
					'string' => 'someValue',
				],
			],
		];

		$this->assertTrue((new Underscore)->propExists($object, 'dot'));
		$this->assertTrue((new Underscore)->propExists($object, 'dot.notated'));
		$this->assertTrue((new Underscore)->propExists($object, 'dot.notated.string'));

		$this->assertFalse((new Underscore)->propExists($object, 'no.notated.string'));
		$this->assertFalse((new Underscore)->propExists($object, 'dot.string.notated'));
		$this->assertFalse((new Underscore)->propExists($object, 'string.dot.notated'));
	}
}
