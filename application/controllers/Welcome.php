<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
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
		$data['title'] = "รับสมัครนักเรียนปีการศึกษา 2563";
		$data['description'] = "รับสมัครนักเรียนวันนี้ จนถึง 25 พฤษภาคม 2563";

		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();

		$data['m1'] = $this->db->select('recruit_id,recruit_regLevel,recruit_status,recruit_tpyeRoom,recruit_prefix,recruit_firstName,recruit_lastName,recruit_year')
		->where('recruit_regLevel','1')
		->where('recruit_year',$data['checkYear'][0]->openyear_year)
		->get('tb_recruitstudent')->num_rows();
		$data['m4'] = $this->db->select('recruit_id,recruit_regLevel,recruit_status,recruit_tpyeRoom,recruit_prefix,recruit_firstName,recruit_lastName,recruit_year')
		->where('recruit_regLevel','4')
		->where('recruit_year',$data['checkYear'][0]->openyear_year)
		->get('tb_recruitstudent')->num_rows();
		//$data['title'] = $this->title;
		$data['switch'] = $this->db->get("tb_onoffsys")->result();

		$db2 = $this->load->database('skjmain', TRUE);	
		$data['person'] = $db2->get("tb_personnel")->result();
		//print_r($db2->result());
		
		

		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/navber.php');
		$this->load->view('stu_news.php');
		$this->load->view('layout/footer.php');
	}

	public function not_404()
	{
		$this->load->view('errors/404.php');
	}
	
}
