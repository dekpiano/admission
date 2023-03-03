<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_surrender extends CI_Controller {
	
	var  $title = "การรับสมัคร";
	
	public function __construct() {
		parent::__construct();
		$this->load->model('model_admission');
		$this->load->model('admin/admin_model_admission');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	  public function PageSurrenderMain($year){
		$ConnPers = $this->load->database('skjpers', TRUE);
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		//$data = $this->report_student($year);
		$data['title'] = $this->title;		
		$this->db->select('skjacth_admission.tb_recruitstudent.recruit_id,
		skjacth_admission.tb_recruitstudent.recruit_regLevel,
		skjacth_admission.tb_recruitstudent.recruit_prefix,
		skjacth_admission.tb_recruitstudent.recruit_firstName,
		skjacth_admission.tb_recruitstudent.recruit_lastName,
		skjacth_admission.tb_recruitstudent.recruit_year,
		skjacth_admission.tb_recruitstudent.recruit_status,
		skjacth_admission.tb_recruitstudent.recruit_tpyeRoom,
		skjacth_admission.tb_recruitstudent.recruit_idCard,
		skjacth_admission.tb_recruitstudent.recruit_category,
		skjacth_admission.tb_recruitstudent.recruit_img,
		skjacth_admission.tb_recruitstudent.recruit_phone,
		skjacth_admission.tb_recruitstudent.recruit_statusSurrender,
		skjacth_personnel.tb_students.stu_id,
		skjacth_personnel.tb_students.stu_UpdateConfirm');
		$this->db->from('skjacth_admission.tb_recruitstudent');
		$this->db->join('skjacth_personnel.tb_students','skjacth_admission.tb_recruitstudent.recruit_idCard = skjacth_personnel.tb_students.stu_iden','LEFT');
		$this->db->where('recruit_year',$year);
		$this->db->where('recruit_status',"ผ่านการตรวจสอบ");
		$this->db->order_by('recruit_id','DESC');
		$data['recruit'] =	$this->db->get()->result();

		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();

		//echo "<pre>"; print_r($data['recruit']);exit();
			
			$this->load->view('admin/layout/navber_admin.php',$data);
			$this->load->view('admin/layout/menu_top_admin.php');
			$this->load->view('admin/admin_admission_surrender.php');
			$this->load->view('admin/layout/footer_admin.php');
	  }	

	public function UpdateSurrender(){
		//print_r($this->input->post('recruit_id'));
		$Where = array('recruit_id' => $this->input->post('recruit_id') );
		$data = array('recruit_statusSurrender' => date('Y-m-d H:i:s'));
		echo $this->db->update('tb_recruitstudent',$data,$Where);
	}

}

?>