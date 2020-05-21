<?php
class Model_login extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function record_count($username,$password)
	{
		$this->db->where('pers_username',$username);
		$this->db->where('pers_password',$password);
		return $this->db->count_all_results('tb_personnel');
	}

	public function fetch_user_login($username,$password)
	{
		$this->db->where('pers_username',$username);
		$this->db->where('pers_password',$password);
		$query = $this->db->get('tb_personnel');
		return $query->row();
	}

	public function record_count_admin($username,$password)
	{
		$this->db->where('admin_username',$username);
		$this->db->where('admin_password',$password);
		return $this->db->count_all_results('tb_admin');
	}

	public function fetch_user_login_admin($username,$password)
	{
		$this->db->where('admin_username',$username);
		$this->db->where('admin_password',$password);
		$query = $this->db->get('tb_admin');
		return $query->row();
	}

}