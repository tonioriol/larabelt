<?php namespace GOsnap\Tests\Unit;

use _;

class UnderscoreServiceTest extends \TestCase {

	public function test_propExist_method() {
		$object = (object)[
			'dot' => (object)[
				'notated' => (object)[
					'string' => 'someValue',
				],
			],
		];

		$this->assertTrue(_::propExists($object, 'dot'));
		$this->assertTrue(_::propExists($object, 'dot.notated'));
		$this->assertTrue(_::propExists($object, 'dot.notated.string'));

		$this->assertFalse(_::propExists($object, 'no.notated.string'));
		$this->assertFalse(_::propExists($object, 'dot.string.notated'));
		$this->assertFalse(_::propExists($object, 'string.dot.notated'));
	}
}
