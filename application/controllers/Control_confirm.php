<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_confirm extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('datethai');
		$this->load->model('model_admission');
		$this->load->model('Model_login');
		$switch = $this->db->get("tb_onoffsys")->result();
		if($switch[0]->onoff_system == 'off'){
			redirect('CloseSystem');
		}
		
	}
	
	  public function StudentsConfirm(){

		$data['title'] = 'รายงานตัวออนไลน์';
		$data['description'] = 'ระบบรายงานตัวออนไลน์';
		$data['banner'] = base_url()."uploads/banner65-1.png";
		$data['url'] = "welcome";
		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['quota'] = $this->db->get("tb_quota")->result();
		$db2 = $this->load->database('skjmain', TRUE);	

		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/menu_top.php');
		$this->load->view('AdminssionConfirm.php');
		$this->load->view('layout/footer.php');

	  }

}