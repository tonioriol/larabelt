<?php

use T20n\Larabelt\Obj;

class ObjTest extends PHPUnit_Framework_TestCase {

	public function test_has_method_with_object() {
		$object = (object)[
			'dot' => (object)[
				'notated' => (object)[
					'string' => 'someValue',
				],
			],
		];

		$this->assertTrue(Obj::has($object, 'dot'));
		$this->assertTrue(Obj::has($object, 'dot.notated'));
		$this->assertTrue(Obj::has($object, 'dot.notated.string'));

		$this->assertFalse(Obj::has($object, 'no.notated.string'));
		$this->assertFalse(Obj::has($object, 'dot.string.notated'));
		$this->assertFalse(Obj::has($object, 'string.dot.notated'));
	}

	public function test_has_method_with_array() {
		$object = [
			'dot' => [
				'notated' => [
					'string' => 'someValue',
				],
			],
		];

		$this->assertTrue(Obj::has($object, 'dot'));
		$this->assertTrue(Obj::has($object, 'dot.notated'));
		$this->assertTrue(Obj::has($object, 'dot.notated.string'));

		$this->assertFalse(Obj::has($object, 'no.notated.string'));
		$this->assertFalse(Obj::has($object, 'dot.string.notated'));
		$this->assertFalse(Obj::has($object, 'string.dot.notated'));
	}

	public function test_has_method_with_mixed() {
		$object = [
			'dot' => (object)[
				'notated' => [
					'string' => 'someValue',
				],
			],
		];

		$this->assertTrue(Obj::has($object, 'dot'));
		$this->assertTrue(Obj::has($object, 'dot.notated'));
		$this->assertTrue(Obj::has($object, 'dot.notated.string'));

		$this->assertFalse(Obj::has($object, 'no.notated.string'));
		$this->assertFalse(Obj::has($object, 'dot.string.notated'));
		$this->assertFalse(Obj::has($object, 'string.dot.notated'));
	}

	public function test_get_method_with_object() {
		$object = (object)[
			'dot' => (object)[
				'notated' => (object)[
					'string' => 'someValue',
				],
			],
		];

		$this->assertEquals(Obj::get($object, 'dot'), (object)[
			'notated' => (object)[
				'string' => 'someValue',
			],
		]);
		$this->assertEquals(Obj::get($object, 'dot.notated'), (object)[
			'string' => 'someValue',
		]);
		$this->assertEquals(Obj::get($object, 'dot.notated.string'), 'someValue');
	}

	public function test_get_method_with_array() {
		$object = [
			'dot' => [
				'notated' => [
					'string' => 'someValue',
				],
			],
		];

		$this->assertEquals(Obj::get($object, 'dot'), [
			'notated' => [
				'string' => 'someValue',
			],
		]);
		$this->assertEquals(Obj::get($object, 'dot.notated'), [
			'string' => 'someValue',
		]);
		$this->assertEquals(Obj::get($object, 'dot.notated.string'), 'someValue');
	}

	public function test_get_method_with_mix() {
		$object = (object)[
			'dot' => [
				'notated' => (object)[
					'string' => 'someValue',
				],
			],
		];

		$this->assertEquals(Obj::get($object, 'dot'), [
			'notated' => (object)[
				'string' => 'someValue',
			],
		]);
		$this->assertEquals(Obj::get($object, 'dot.notated'), (object)[
			'string' => 'someValue',
		]);
		$this->assertEquals(Obj::get($object, 'dot.notated.string'), 'someValue');
	}
}
