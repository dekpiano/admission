<?php
class Model_confirm extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	// เช็ดนักเรียนว่ามีข้อมูลหรือไม่
	public function ConfirmStudentCheckID($ID){
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->where('stu_iden',$ID)->get('tb_students')->num_rows();
	}

	// เช็ดบิดาว่ามีข้อมูลหรือไม่
	public function ConfirmParentCheckID($idStu,$relationKey){
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->where('par_stuID',$idStu)->where('par_relationKey',$relationKey)->get('tb_parent')->num_rows();
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

	// บิดาาา
	public function ConfirmFatherInsert($data)
	{
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->insert('tb_parent',$data);
	}

	public function ConfirmFatherUpdate($data,$id)
	{
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->Update('tb_parent',$data,array("par_id"=> $id));
	}


	// มารดา
	public function ConfirmMatherInsert($data)
	{
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->insert('tb_parent',$data);
	}

	public function ConfirmMatherUpdate($data,$id)
	{
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->Update('tb_parent',$data,array("par_id"=> $id));
	}

	// ผู้ปกครองงงงงงงงง
	public function ConfirmOtherInsert($data)
	{
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->insert('tb_parent',$data);
	}

	public function ConfirmOtherUpdate($data,$id)
	{
		$Conf = $this->load->database('skjpers', TRUE);
		return $Conf->Update('tb_parent',$data,array("par_id"=> $id));
	}


	

	

}