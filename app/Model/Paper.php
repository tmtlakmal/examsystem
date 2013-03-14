<?php

class Paper extends AppModel {

	var $name = 'Paper';
	
	var $primaryKey = 'paper_id';
	public $useTable = 'papers';

	public $hasAndBelongsToMany = array('StudentsFor' =>
                                        array(
                                            'className' => 'Student',
                                            'joinTable' => 'students_papers',
                                            'foreignKey' => 'paper_id',
                                            'associationForeignKey' => 'admission_no',
                                            'unique' => true,
                                        ));
        
        
        
        public function getStudentsPaper($paperData){
            	$paper = $this->find('first', array(
                        'conditions' => array(
				'Paper.subject_code' => $paperData['StudentsPaper']['subject_code'],
				'Paper.part' => $paperData['StudentsPaper']['part'])
                ));
		$studentsPaper = $this->StudentsPaper->find('first', array(
                        'conditions' => array(
				'StudentsPaper.admission_no' => $paperData['StudentsPaper']['admission_no'],
				'StudentsPaper.paper_id' => $paper['Paper']['paper_id'])
                ));
		die(print_r($paper));
            	//$pId = $paper['StudentsPaper']['id'];
            return $this->StudentsPaper->read(null,$pId);
        }
        
        public function getPaperPercentage($data){
            $tTable = $this->Paper->find('first', array('conditions' , array(
                'Paper.subject_code' => $data['Paper']['subject_code'],
                'Paper.subject_part' => $data['Paper']['part']               
            )));
            return $tTable['Paper']['percentage'];
        }
        
        public function setStudentPapers(){
		return $this->StudentsPaper->find('all');
	}

}

?>
