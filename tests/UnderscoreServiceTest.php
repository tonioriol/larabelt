<?php namespace GOsnap\Tests\Unit;

use PHPUnit_Framework_TestCase;
use T20n\Underscore\Underscore;

class UnderscoreServiceTest extends PHPUnit_Framework_TestCase {

	public function test_propExist_method() {
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
}
