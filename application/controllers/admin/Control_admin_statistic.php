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
		COUNT(CASE WHEN recruit_status != "ผ่านการตรวจสอบ" THEN 1 END) AS NoPass,
		COUNT(CASE WHEN recruit_regLevel = "1" THEN 1 END) AS NumAllM1,
		COUNT(CASE WHEN recruit_regLevel = "4" THEN 1 END) AS NumAllM4,
		COUNT(
			CASE 
			WHEN recruit_regLevel = "2" ||  
			recruit_regLevel = "3" ||
			recruit_regLevel = "5" ||
			recruit_regLevel = "6" 
			THEN 1 END
			) AS NumAllMother');
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


	   // Chart นักเรียนสมัครเรียน ม.1
	   public function ChartStudentsRecruitM1(){
        $ChartStuAll = [];
        $CheckStuAll = $this->db->select('
           SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)" THEN 1 ELSE 0 END) AS SP  ,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)" THEN 1 ELSE 0 END) AS SMT,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)" THEN 1 ELSE 0 END) AS CEP,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Performing Arts Program)" THEN 1 ELSE 0 END) AS PAP,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)" THEN 1 ELSE 0 END) AS CP   
        ')
        ->where('recruit_regLevel',1)
		->where('recruit_year',$this->input->post('Year'))
        ->get('tb_recruitstudent')->result();

        foreach ($CheckStuAll as $key => $value) {
            $ChartStuAll[] = $value->SMT;
			$ChartStuAll[] = $value->CEP;
			$ChartStuAll[] = $value->CP;
			$ChartStuAll[] = $value->PAP;
			$ChartStuAll[] = $value->SP;
        }

        echo json_encode($ChartStuAll);
    }

	  // Chart นักเรียนสมัครเรียน ม.4
	  public function ChartStudentsRecruitM4(){
        $ChartStuAll = [];
        $CheckStuAll = $this->db->select('
           SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)" THEN 1 ELSE 0 END) AS SP ,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)" THEN 1 ELSE 0 END) AS SMT,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)" THEN 1 ELSE 0 END) AS CEP,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Performing Arts Program)" THEN 1 ELSE 0 END) AS PAP,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)" THEN 1 ELSE 0 END) AS CP   
        ')
        ->where('recruit_regLevel',4)
		->where('recruit_year',$this->input->post('Year'))
        ->get('tb_recruitstudent')->result();

        foreach ($CheckStuAll as $key => $value) {
            $ChartStuAll[] = $value->SMT;
			$ChartStuAll[] = $value->CEP;
			$ChartStuAll[] = $value->CP;
			$ChartStuAll[] = $value->PAP;
			$ChartStuAll[] = $value->SP;
        }

        echo json_encode($ChartStuAll);
    }

	// สมัครเรียน ระหว่างปี
	public function ChartStudentsRecruitMOther(){
        $ChartStuAll = [];
		$where = "`recruit_regLevel` = 2 AND `recruit_year` = ".$this->input->post('Year')."
		or `recruit_regLevel` = 3 AND `recruit_year` = ".$this->input->post('Year')."
		or `recruit_regLevel` = 5 AND `recruit_year` =".$this->input->post('Year')."
		or `recruit_regLevel` = 6 AND `recruit_year` =".$this->input->post('Year')."";
        $CheckStuAll = $this->db->select('
           SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)" THEN 1 ELSE 0 END) AS SP  ,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)" THEN 1 ELSE 0 END) AS SMT,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)" THEN 1 ELSE 0 END) AS CEP,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Performing Arts Program)" THEN 1 ELSE 0 END) AS PAP,
		   SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)" THEN 1 ELSE 0 END) AS CP   
        ')		
        ->where($where)
        ->get('tb_recruitstudent')->result();

        foreach ($CheckStuAll as $key => $value) {
            $ChartStuAll[] = $value->SMT;
			$ChartStuAll[] = $value->CEP;
			$ChartStuAll[] = $value->CP;
			$ChartStuAll[] = $value->PAP;
			$ChartStuAll[] = $value->SP;
        }

        echo json_encode($ChartStuAll);
    }

}

?>