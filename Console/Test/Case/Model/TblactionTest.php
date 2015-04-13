<?php
App::uses('Tblaction', 'Model');

/**
 * Tblaction Test Case
 *
 */
class TblactionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tblaction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tblaction = ClassRegistry::init('Tblaction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tblaction);

		parent::tearDown();
	}

}
