<?php
class Model_confirm extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}


	public function ConfirmStudentInsert($data)
	{
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->insert('tb_students',$data);
	}

	public function ConfirmStudentUpdate($data,$id)
	{
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->Update('tb_students',$data,"stu_iden='".$id."'");
	}


	public function ConfirmFatherInsert($data)
	{
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->insert('tb_parent',$data);
	}

	public function ConfirmFatherUpdate($data,$id,$relation)
	{
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->Update('tb_parent',$data,array("par_stuID"=> $id,"par_relation" => $relation));
	}

	

	

}