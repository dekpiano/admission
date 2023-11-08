<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_statistic extends CI_Controller {
	
	var  $title = "การรับสมัคร";
	
	public function __construct() {
		parent::__construct();
		$this->load->model('model_admission');
		$this->load->model('admin/admin_model_admission');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	public function statistic_student($year){
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['title'] = $this->title;		
		$this->db->select('COUNT(recruit_year) AS StuALL,
		COUNT(CASE WHEN recruit_status = "ผ่านการตรวจสอบ" THEN 1 END) AS Pass,
		COUNT(CASE WHEN recruit_status != "ผ่านการตรวจสอบ" THEN 1 END) AS NoPass');
		$this->db->from('tb_recruitstudent');
		$this->db->where('recruit_year',$year);
		$this->db->order_by('recruit_id','DESC');
		$data['recruit'] =	$this->db->get()->result();

		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();

		//echo '<pre>';print_r($data['recruit']);

		
		$this->load->view('admin/layout/navber_admin.php',$data);
		$this->load->view('admin/layout/menu_top_admin.php');
		$this->load->view('admin/admin_admission_Statistic.php');
		$this->load->view('admin/layout/footer_admin.php');
	}

}

?>