<?php

class Subject extends AppModel {

	var $name = 'Subject';
	var $primaryKey = 'subject_code';
	public $useTable = 'subjects';

	var $validate = array(
        	'subject_code' => array('rule' => 'notEmpty'),
        	'subject_name' => array( 'rule' => 'notEmpty'),
                'a_mark' => array( 'rule' => 'notEmpty'),
		//'mean' => array('rule' => 'notEmpty'),
		//'std_deviation' => array('rule' => 'notEmpty'),
               /* 'username' => array(
                        'isUnique' => array(
                            'rule' => 'isUnique',
                            'message' => 'That  has already been taken',
                            'on' => 'create'
                        ),
                        'notEmpty' => array(
                            'rule' => 'notEmpty',
                            'message' => 'Please enter a username'
                        )

    )*/);

	//var $callbacks = 'before';
        var $hasMany = array(
                'Paper' => array(
                    'className'     => 'Paper',
                    'foreignKey'    => 'subject_code',
        )
    ); 
        
       /* var $hasAndBelongsToMany = array('Students' =>
                                        array(
                                            'className' => 'Student',
                                            'joinTable' => 'students_subjects',
                                            'foreignKey' => 'subject_code',
                                            'associationForeignKey' => 'nic_no',
                                            'unique' => true,
                                        ));*/
        
        public function getPapersForSubject($subjectCode) {
            $paperss = $this->Paper->find('all', array('conditions' => array('Paper.subject_code' => $subjectCode)));           
            return $paperss;
        }
        
}

?>
