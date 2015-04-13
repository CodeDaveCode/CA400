<?php
/**
 * TblactionFixture
 *
 */
class TblactionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ActionRef' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 128, 'unsigned' => false, 'key' => 'primary'),
		'OrgRef' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 64, 'unsigned' => false),
		'EnteredByRef' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 64, 'unsigned' => false),
		'DateEntered' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'DateDue' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'OwnerRef' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 64, 'unsigned' => false),
		'Completed' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'Description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_general_ci', 'charset' => 'latin1'),
		'ClearedByRef' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 64, 'unsigned' => false),
		'ClearedByDate' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'IsVisit' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ActionRef', 'unique' => 1),
			'ActionRef' => array('column' => 'ActionRef', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM', 'comment' => 'Communications Record ')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'ActionRef' => 1,
			'OrgRef' => 1,
			'EnteredByRef' => 1,
			'DateEntered' => 1425395264,
			'DateDue' => '2015-03-03 16:07:44',
			'OwnerRef' => 1,
			'Completed' => 1,
			'Description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'ClearedByRef' => 1,
			'ClearedByDate' => '2015-03-03 16:07:44',
			'IsVisit' => 1
		),
	);

}
