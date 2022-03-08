<?php
class Model_admission extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}


	public function student_insert($data)
	{
		return $this->db->insert('tb_recruitstudent',$data);
	}

	public function student_update($data,$id)
	{
		return $this->db->update('tb_recruitstudent',$data,"recruit_id='".$id."'");
	}

	public function student_delete($id)
	{
				$this->db->where('recruit_id', $id);
		return 	$this->db->delete('tb_recruitstudent');
	}

	public function getSchool($postData){
		$db_schollall = $this->load->database('schoolall', TRUE);

		$response = array();
   
		if(isset($postData['search']) ){
		  // Select record
		 $db_schollall->select('schoola_province,schoola_amphur,schoola_name,schoola_id');
		 $db_schollall->where("schoola_name like '%".$postData['search']."%' ");
   
		  $records = $db_schollall->get('schoolall')->result();
   
		  foreach($records as $row ){
			 $response[] = array(
				 "value"=>$row->schoola_id,
				 "label"=>$row->schoola_name,
				 "amphur"=>$row->schoola_amphur,
				 "province"=>$row->schoola_province,
				);
		  }
   
		}
   
		return $response;
	 }

	

}