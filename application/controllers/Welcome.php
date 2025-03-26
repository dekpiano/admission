<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('datethai');
		$this->load->library('timeago');
		$switch = $this->db->get("tb_onoffsys")->result();
		if($switch[0]->onoff_system == 'off'){
			redirect('CloseSystem');
		}

	}

	public static $title = "โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";
	public static $description = "เป็นผู้นำ รักเพื่อน นับถือพี่ เคารพครู กตัญญูพ่อแม่ ดูแลน้อง สนองคุณแผ่นดิน โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";
	
	public function index()
	{	

		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['quota'] = $this->db->get("tb_quota")->result();

		$db2 = $this->load->database('skjmain', TRUE);	
	    $DBPers = $this->load->database('skjpers', TRUE);

		$data['title'] = "ระบบรับสมัครนักเรียนปีการศึกษา ".$data['checkYear'][0]->openyear_year;
		$data['description'] = "รับสมัครนักเรียน ม.1 และ ม.4 และนักกีฬาใหม่ ปีการศึกษา ".$data['checkYear'][0]->openyear_year;
		$data['banner'] = base_url()."uploads/bannerMain.svg";
		$data['url'] = "welcome";

		// $data['regis'] = $this->db->select('recruit_id,recruit_prefix,recruit_firstName,recruit_lastName,recruit_regLevel,recruit_tpyeRoom,recruit_date,recruit_year,recruit_category,recruit_status')->from('tb_recruitstudent')->where('recruit_year',$data['checkYear'][0]->openyear_year)->order_by('recruit_id','DESC')->get()->result();

		//echo "<pre>"; print_r($data['quota']); exit();

		$this->db->select('
		tb_recruitstudent.recruit_id,
		tb_recruitstudent.recruit_regLevel,
		tb_recruitstudent.recruit_prefix,
		tb_recruitstudent.recruit_firstName,
		tb_recruitstudent.recruit_lastName,
		tb_recruitstudent.recruit_date,
		tb_recruitstudent.recruit_year,
		tb_recruitstudent.recruit_status,
		tb_recruitstudent.recruit_tpyeRoom,
		tb_recruitstudent.recruit_idCard,
		tb_students.stu_fristName,
		tb_recruitstudent.recruit_category');
		$this->db->from('tb_recruitstudent');
		$this->db->join($DBPers->database.'.tb_students','tb_recruitstudent.recruit_idCard = tb_students.stu_iden','LEFT');
		// $this->DBSKJ->where('recruit_year',$data['checkYear'][0]->openyear_year)->order_by('recruit_id','DESC');
		$data['regis'] = $this->db->get()->result();

		//echo "<pre>"; print_r($data['regis']); exit();

		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/menu_top.php');
		$this->load->view('AdminssionHome.php');
		$this->load->view('layout/footer.php');
	}

	public function not_404()
	{
		$this->load->view('errors/404.php');
	}



	  



	public function CheckRegister(){

		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		// $data['DataStudents'] = $this->db->select('
		// recruit_id,
		// recruit_regLevel,
		// recruit_prefix,
		// recruit_firstName,
		// recruit_lastName,
		// recruit_tpyeRoom,
		// recruit_status,
		// recruit_category,
		// recruit_idCard')->from('tb_recruitstudent')
		// ->where('recruit_year',$data['checkYear'][0]->openyear_year)
		// ->order_by('recruit_id','ASC')->get()->result();

		$this->db->select('skjacth_admission.tb_recruitstudent.recruit_id,
		skjacth_admission.tb_recruitstudent.recruit_regLevel,
		skjacth_admission.tb_recruitstudent.recruit_prefix,
		skjacth_admission.tb_recruitstudent.recruit_firstName,
		skjacth_admission.tb_recruitstudent.recruit_lastName,
		skjacth_admission.tb_recruitstudent.recruit_status,
		skjacth_admission.tb_recruitstudent.recruit_tpyeRoom,
		skjacth_admission.tb_recruitstudent.recruit_idCard,
		skjacth_admission.tb_recruitstudent.recruit_category,
		skjacth_admission.tb_recruitstudent.recruit_statusSurrender,
		skjacth_personnel.tb_students.stu_id,
		skjacth_personnel.tb_students.stu_UpdateConfirm');
		$this->db->from('skjacth_admission.tb_recruitstudent');
		$this->db->join('skjacth_personnel.tb_students','skjacth_admission.tb_recruitstudent.recruit_idCard = skjacth_personnel.tb_students.stu_iden','LEFT');
		$this->db->where('recruit_year',$data['checkYear'][0]->openyear_year);
		$this->db->order_by('recruit_id','DESC');
		$data['DataStudents'] =	$this->db->get()->result();

		//echo '<pre>'; print_r($data['DataStudents']); exit();
		

		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['quota'] = $this->db->get("tb_quota")->result();

		$db2 = $this->load->database('skjmain', TRUE);	
		$data['title'] = "เช็คข้อมูลการสมัครเรียน ".$data['checkYear'][0]->openyear_year;
		$data['description'] = "เช็คข้อมูลการสมัครเรียนแบบเรียลไทม์";
		$data['banner'] = base_url()."uploads/confirm/logoCheckData.PNG";
		$data['url'] = "CheckRegister";
	
		//echo '<pre>'; print_r($data); exit();
		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/menu_top.php');
		$this->load->view('AdminssionCheckData.php');
		$this->load->view('layout/footer.php');
	}

	
	
}