<?php
class Model_login extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function record_count($username,$password)
	{
		$db2 = $this->load->database('skjpers', TRUE);
		$db2->where('pers_username',$username);
		$db2->where('pers_password',$password);
		return $db2->count_all_results('tb_personnel');
	}

	public function fetch_user_login($username,$password)
	{
		$db2 = $this->load->database('skjpers', TRUE);
		$db2->where('pers_username',$username);
		$db2->where('pers_password',$password);
		$query = $db2->get('tb_personnel');
		return $query->row();
	}

	public function Student_Login($username,$password)
	{
		$this->db->where('recruit_idCard',$username);
		$this->db->where('recruit_birthday',$password);
		$query = $this->db->get('tb_recruitstudent');
		return $query->result();
	}

}