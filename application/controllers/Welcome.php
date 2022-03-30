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

		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['quota'] = $this->db->get("tb_quota")->result();

		$db2 = $this->load->database('skjmain', TRUE);	
	    $DBPers = $this->load->database('skjpers', TRUE);

		$data['title'] = "ระบบรับสมัครนักเรียนปีการศึกษา ".$data['checkYear'][0]->openyear_year;
		$data['description'] = "รับสมัครนักเรียน ม.1 และ ม.4 ใหม่ ปีการศึกษา ".$data['checkYear'][0]->openyear_year;
		$data['banner'] = base_url()."uploads/banner65-1.png";
		$data['url'] = "welcome";

		// $data['regis'] = $this->db->select('recruit_id,recruit_prefix,recruit_firstName,recruit_lastName,recruit_regLevel,recruit_tpyeRoom,recruit_date,recruit_year,recruit_category,recruit_status')->from('tb_recruitstudent')->where('recruit_year',$data['checkYear'][0]->openyear_year)->order_by('recruit_id','DESC')->get()->result();

		//echo "<pre>"; print_r($data['regis']); exit();

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

	public function AllStatistic($year){
		$data = $this->report_student($year);

		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();

		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['quota'] = $this->db->get("tb_quota")->result();

		$db2 = $this->load->database('skjmain', TRUE);	
		$data['title'] = "สถิติการรับสมัครนักเรียน".$data['checkYear'][0]->openyear_year;
		$data['description'] = "ดูสถิติแบบเรียลไทม์";
		$data['banner'] = base_url()."asset/img/Statistics.png";
		$data['url'] = "Statistic";
	
		//echo '<pre>'; print_r($data); exit();
		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/menu_top.php');
		$this->load->view('AdminssionStatistic.php');
		$this->load->view('layout/footer.php');
	  }

	  public function report_student($year)
	{
		$type_quota = $this->db->get('tb_quota')->result();

		//echo '<pre>'; print_r($type_quota); exit();

		$chart_re1 = $this->db->select('COUNT(recruit_regLevel) AS C_count,
		tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
		tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->where('recruit_regLevel',1)
				->group_by('recruit_tpyeRoom')
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			
			$chart_re4 = $this->db->select('COUNT(recruit_regLevel) AS C_count,
					tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
					tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->where('recruit_regLevel',4)
				->group_by('recruit_tpyeRoom')
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$chart_All = $this->db->select('COUNT(recruit_regLevel) AS C_count,
					tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year ,
					tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->group_by('recruit_tpyeRoom')					
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$data['sum_1'] = array_column($chart_re1,'C_count');
			$data['sum_4'] = array_column($chart_re4,'C_count');
			$data['sum_all'] = array_column($chart_All,'C_count');
			$data['chart_1'] = json_encode(array_column($chart_re1,'C_count'));	
			$data['chart_4'] = json_encode(array_column($chart_re4,'C_count'));
			$data['chart_All'] = json_encode(array_column($chart_All,'C_count'));

			$data['sel_date'] = $this->db->select('recruit_year,recruit_date,recruit_category')
										->where('recruit_year',$year)
										->group_by('recruit_date')
										->get('tb_recruitstudent')
										->result();

			$data['sum_date'] = $this->db->select('
									recruit_regLevel,recruit_year, 
									recruit_tpyeRoom,recruit_date,
									recruit_category')
									->where('recruit_year',$year)
							->get('tb_recruitstudent')
							->result();
			// ผ่านการตรวจสอบ	
			$data['sum_pass'] = $this->db->select('COUNT(recruit_status) AS sumall,
									recruit_regLevel,recruit_year, 
									recruit_tpyeRoom,recruit_date,recruit_status')
									->where('recruit_status','ผ่านการตรวจสอบ')
									->where('recruit_year',$year)
							->get('tb_recruitstudent')
							->result();
			//ไม่ผ่านการตรวจสอบ				
			$data['sum_NoPass'] = $this->db->select('COUNT(recruit_status) AS sumall,
					recruit_regLevel,recruit_year, 
					recruit_tpyeRoom,recruit_date,recruit_status')
					->where('recruit_year',$year)
					->where('recruit_status !=','ผ่านการตรวจสอบ')
			->get('tb_recruitstudent')
			->result();

			//echo '<pre>';print_r($data['sum_NoPass']); exit();

			$chart_re1_cota = $this->db->select('COUNT(recruit_regLevel) AS C_count,
		tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
		tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->where('recruit_regLevel',1)
				->group_by('recruit_tpyeRoom')
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$chart_re4_cota = $this->db->select('COUNT(recruit_regLevel) AS C_count,
					tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
					tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->where('recruit_regLevel',4)
				->group_by('recruit_tpyeRoom')
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$chart_All_cota = $this->db->select('COUNT(recruit_regLevel) AS C_count,
					tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year ,
					tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->group_by('recruit_tpyeRoom')					
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$data['sum_1_cota'] = array_column($chart_re1_cota,'C_count');
			$data['sum_4_cota'] = array_column($chart_re4_cota,'C_count');
			$data['sum_all_cota'] = array_column($chart_All_cota,'C_count');
			$data['chart_1_cota'] = json_encode(array_column($chart_re1_cota,'C_count'));	
			$data['chart_4_cota'] = json_encode(array_column($chart_re4_cota,'C_count'));
			$data['chart_All_cota'] = json_encode(array_column($chart_All_cota,'C_count'));



			$chart_re1_all = $this->db->select('COUNT(recruit_regLevel) AS C_count,
			tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
			tb_recruitstudent.recruit_tpyeRoom')
					->from('tb_recruitstudent')
					->where('recruit_year',$year)
					->where('recruit_regLevel',1)
					->group_by('recruit_tpyeRoom')
					->order_by('recruit_tpyeRoom','DESC')
					->get()->result();
				$chart_re4_all = $this->db->select('COUNT(recruit_regLevel) AS C_count,
						tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
						tb_recruitstudent.recruit_tpyeRoom')
					->from('tb_recruitstudent')
					->where('recruit_year',$year)
					->where('recruit_regLevel',4)
					->group_by('recruit_tpyeRoom')
					->order_by('recruit_tpyeRoom','DESC')
					->get()->result();
				$chart_All_all = $this->db->select('COUNT(recruit_regLevel) AS C_count,
						tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year ,
						tb_recruitstudent.recruit_tpyeRoom')
					->from('tb_recruitstudent')
					->where('recruit_year',$year)
					->group_by('recruit_tpyeRoom')					
					->order_by('recruit_tpyeRoom','DESC')
					->get()->result();
				$data['sum_1_all'] = array_column($chart_re1_all,'C_count');
				$data['sum_4_all'] = array_column($chart_re4_all,'C_count');
				$data['sum_all_all'] = array_column($chart_All_all,'C_count');
				$data['chart_1_all'] = json_encode(array_column($chart_re1_all,'C_count'));	
				$data['chart_4_all'] = json_encode(array_column($chart_re4_all,'C_count'));
				$data['chart_All_all'] = json_encode(array_column($chart_All_all,'C_count'));
			
			return $data;
	}
	
}
