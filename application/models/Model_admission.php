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

	

}