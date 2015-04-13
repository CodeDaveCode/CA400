<?php
class Tblaction extends AppModel
{
    var $primaryKey = 'ActionRef';
    var $name = 'Tblaction';
    //var $actsAs = array ('Searchable');
    var $validate = array(
        'ActionRef'=>array(
            'ActionRef_must_not_be_blank'=>array(
                'rule'=>'notEmpty',
                'message'=>'The action must have a reference number'
            ),
            'ActionRef_must_be_unique'=>array(
                'rule'=>'isUnique',
                'message'=>'The action must have a unique reference number'
            )
        ),
        'Description'=>array(
            'Description_must_not_be_blank'=>array(
                'rule'=>'notEmpty',
                'message'=>'The action must have a description'
            )
        )
    );
}