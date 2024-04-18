<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_setting extends CI_Controller {
	
	var  $title = "การรับสมัคร";
	
	public function __construct() {
		parent::__construct();
		$this->load->model('model_admission');
		$this->load->model('admin/admin_model_admission');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

		// ระบบ
		public function AdminSystem(){
		
			$data['switch'] = $this->db->get("tb_onoffsys")->result();
			$data['switch_quota'] = $this->db->get("tb_quota")->result();
			$data['switch_course'] = $this->db->select('course_id,course_branch,course_gradelevel')->get("tb_course")->result();
	
			$data['title'] = "ตั้งค่าระบบ";		
			$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
			$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
			//echo '<pre>'; print_r($data['switch_quota']); exit();
				$this->load->view('admin/layout/navber_admin.php',$data);
				$this->load->view('admin/layout/menu_top_admin.php');
				$this->load->view('admin/admin_admission_status.php');
				$this->load->view('admin/layout/footer_admin.php');
		}


	public function UpdateQuotaInCourse(){
		//print_r($this->input->post());
		$Where = array('quota_id' => $this->input->post('course_id'));
		$data = array('quota_course' => $this->input->post('course_data'));
		echo $this->db->update('tb_quota',$data,$Where);
	}

}

?>