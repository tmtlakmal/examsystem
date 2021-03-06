<?php
class StudentsController extends AppController {

	var $helpers = array ('Html','Form','Javascript','Ajax');
	var $name = 'Students';
        var $components = array('RequestHandler');
 



	function index(){
		//die(print_r($this->Student->getPapers(45)));
		$this->set('students',$this->Student->find('all'));
	}

	function add($divId,$div) {
         $this->set('divId' , $divId); 
         $this->set('div' , $div);
         
         $this->set('students',$this->Student->find('all',array(
			'conditions' => array('Student.division_id' => $divId))));
         //die(print_r($students));
        if (!empty($this->data)) {
            $myData = $this->data;
            $myData['Student']['division_id'] = $divId;
            //echo "{$myData['Student']['nic_no']}";
            //die(print_r($myData));
	    $existing =	$this->Student->find('first',array('conditions'=>array('Student.nic_no'=>$myData['Student']['nic_no'])));

            if($existing['Student']['admission_no']===null){
		$papersList =  array($this->Student->getPapers($myData['Subjects']['0']['subject_code']),
                                        $this->Student->getPapers($myData['Subjects']['1']['subject_code']),
                                        $this->Student->getPapers($myData['Subjects']['2']['subject_code'])
                            );
	$count =0;
		foreach ($papersList as $papers):
                        foreach ($papers as $paper) :
				$paperIdSet['Paper'][$count]['paper_id'] = $paper['Paper']['paper_id'];
				$count++;
 				/*$this->Student->set()
                            $data = array('nic_no' => $myData['Student']['nic_no'], 'subject_code' => $paper['Timetable']['subject_code'],'part' => $paper['Timetable']['part']); */                     
                            //$this->Student->savePapers($data); 
                        endforeach;
                    endforeach;
		$myData['Papers']=$paperIdSet['Paper'];
                   // die(print_r($myData));
                if ($this->Student->saveAssociated($myData)) {
                    
                    $this->Session->setFlash('The student details have been entered.');
                    $this->redirect(array('controller'=>'students','action' => 'add',$divId,$div));
                    
                }           
            }
            else{
                    $this->Session->setFlash('The nic no have already been entered.');
            }
        }
    }


	function delete($id){
		if($this->Student->delete($id)){ 
                        $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
        		$this->redirect(array('action' => 'index'));
                        
		}
	}

	function edit($id = null){
		$this->Student->id = $id;

		if(empty($this->data)){
			$this->data = $this->Student->read();
		}
		else{

			if($this->Student->saveAssociated($this->data)){
				$this->Session->setFlash('Your post has been updated.' );
				$this->redirect(array('action' => 'index'));
			}
		}
	}
        
        
        
        public function get_by_stream() {
		$stream = $this->request->data['Student']['stream'];
                //echo "{$stream}";
		$subjects = $this->Stream->find('list', array(
			'conditions' => array('Stream.stream' => $stream),
			'recursive' => -1
			));
 
		$this->set('subjects',$subjects);
		$this->render('/subjects/get_by_stream');
	}
}
?>
