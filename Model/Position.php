<?php
class Position extends AppModel
{
    var $primaryKey = 'id';
    var $name = 'Position';

    public $validate = array(
        'id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A id is required'
            )
        ),
        'company' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A company is required'
            )
        ),
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A title is required'
            )
        ),
        'description' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A description is required'
            )
        ),
        'requirements' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A requirement is required'
            )
        ),
        'closing' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A closing is required'
            )
        ),
        'active' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A active is required'
            )
        ),
        'parent' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A parent is required'
            )
        ),
    );
}