<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'user';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Name' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'School' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Comms' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'ID' => 1,
			'Name' => 1,
			'School' => 1,
			'Comms' => 1
		),
	);

}
