<?php
class Admin_model_recruitstudent extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function recruitstudent_insert($data)
	{
		return $this->db->insert('tb_recruitstudent',$data);
	}

	public function recruitstudent_update($data,$id)
	{
		return $this->db->update('tb_recruitstudent',$data,"recruit_id='".$id."'");
	}

	public function recruitstudent_delete($id)
	{
			$this->db->where('recruit_id', $id);
		return $this->db->delete('tb_recruitstudent');
	}

}