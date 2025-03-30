<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Statistic extends CI_Controller {
    public function __construct() {
        parent::__construct(); 

    }

	public function report_student($year)
	{
		$type_quota = $this->db->get('tb_quota')->result();


				$data['StatisticAll'] = $this->db->select('
					COUNT(tb_recruitstudent.recruit_category) AS num,
					SUM(CASE WHEN recruit_prefix = "เด็กหญิง" or recruit_prefix = "นางสาว" THEN 1 END) AS Girl,
					SUM(CASE WHEN recruit_prefix = "เด็กชาย" or recruit_prefix = "นาย" THEN 1 END) AS Man,
					tb_quota.quota_explain				
					')
				->from('tb_recruitstudent')
				->join('tb_quota','tb_quota.quota_key = tb_recruitstudent.recruit_category')
				->where('recruit_year',$year)
				->group_by('tb_recruitstudent.recruit_category')
				->order_by('recruit_date','ASC')
				->get()->result();

				$data['StatisticNormal'] = $this->db->select('
					recruit_date,
					SUM(CASE WHEN recruit_prefix = "เด็กหญิง"  AND recruit_regLevel = 1 THEN 1 END) AS Girl1,
					SUM(CASE WHEN recruit_prefix = "เด็กชาย"  AND recruit_regLevel = 1 THEN 1 END) AS Man1,					
					SUM(CASE WHEN recruit_prefix = "นางสาว" or recruit_prefix = "เด็กหญิง" AND recruit_regLevel = 4 THEN 1 END) AS Girl4,
					SUM(CASE WHEN recruit_prefix = "นาย" or recruit_prefix = "เด็กชาย" AND recruit_regLevel = 4 THEN 1 END) AS Man4,
					tb_quota.quota_explain			
					')
				->from('tb_recruitstudent')
				->join('tb_quota','tb_quota.quota_key = tb_recruitstudent.recruit_category')
				->where('recruit_year',$year)
				->where('recruit_category',"normal")
				->where('recruit_date BETWEEN "2024-03-09" AND "2024-03-15"')
				//->group_by('tb_recruitstudent.recruit_regLevel')
				->group_by('tb_recruitstudent.recruit_date')
				->order_by('recruit_date','ASC')
				->get()->result();

				//echo '<pre>'; print_r($data['StatisticNormal']); exit();

			$data['RegisterAll'] = $this->db->select("
			COUNT(recruit_year) AS RegAll,
			SUM(CASE WHEN recruit_status = 'ผ่านการตรวจสอบ' THEN 1 END) AS Pass,
			SUM(CASE WHEN recruit_status != 'ผ่านการตรวจสอบ' THEN 1 END) AS NoPass
			")
			->where('recruit_year',$year)
			->get('tb_recruitstudent')->result();

			$data['StatisticTableNormal'] = $this->db->select('
			tb_recruitstudent.recruit_date,
			SUM(CASE WHEN recruit_prefix = "เด็กหญิง"  and recruit_regLevel = 1 THEN 1 ELSE 0 END) AS F1,
			SUM(CASE WHEN (recruit_prefix = "เด็กหญิง" and recruit_regLevel = 4) or (recruit_prefix = "นางสาว"  and recruit_regLevel = 4) THEN 1 ELSE 0 END) AS F4,
			SUM(CASE WHEN recruit_prefix = "เด็กชาย"  and recruit_regLevel = 1 THEN 1 ELSE 0 END) AS M1,
			SUM(CASE WHEN (recruit_prefix = "เด็กชาย" and recruit_regLevel = 4) or (recruit_prefix = "นาย" and recruit_regLevel = 4) THEN 1 ELSE 0 END) AS M4
			')
			->where('recruit_year',$year)
			->where('recruit_category','normal')
			->group_by('recruit_date')
			->get('tb_recruitstudent')->result();

			$data['StatisticTableQuotaM14'] = $this->db->select('
			tb_recruitstudent.recruit_date,
			SUM(CASE WHEN recruit_prefix = "เด็กหญิง"  and recruit_regLevel = 1 THEN 1 ELSE 0 END) AS F1,
			SUM(CASE WHEN recruit_prefix = "เด็กชาย"  and recruit_regLevel = 1 THEN 1 ELSE 0 END) AS M1,
			SUM(CASE WHEN (recruit_prefix = "เด็กหญิง" and recruit_regLevel = 4) or (recruit_prefix = "นางสาว"  and recruit_regLevel = 4) THEN 1 ELSE 0 END) AS F4,			
			SUM(CASE WHEN (recruit_prefix = "เด็กชาย" and recruit_regLevel = 4) or (recruit_prefix = "นาย" and recruit_regLevel = 4) THEN 1 ELSE 0 END) AS M4
			')
			->where('recruit_year',$year)
			->where("recruit_date BETWEEN '2025-01-01' AND '2025-01-31'")
			->group_by('recruit_date')
			->get('tb_recruitstudent')->result_array();
			
			return $data;
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

    public function StatisticViewQuota(){        

                $data['StatisticCroTar'] = $this->db->select('
					SUM(CASE WHEN recruit_prefix = "เด็กหญิง" or recruit_prefix = "นางสาว" THEN 1 END) AS female,
					SUM(CASE WHEN recruit_prefix = "เด็กชาย" or recruit_prefix = "นาย" THEN 1 END) AS male,
					tb_recruitstudent.recruit_regLevel
					,tb_recruitstudent.recruit_year
					,tb_recruitstudent.recruit_date')
				->from('tb_recruitstudent')
				->where('recruit_year','2568')
				->where("recruit_date BETWEEN '2025-01-01' AND '2025-01-31'", NULL, FALSE)
				->group_by('recruit_date')
				->order_by('recruit_date','ASC')
				->get()->result_array();

        echo json_encode($data['StatisticCroTar']);
    }

	public function StatisticViewGeneral(){

                $data['StatisticGeneral'] = $this->db->select('
					SUM(CASE WHEN recruit_prefix = "เด็กหญิง" or recruit_prefix = "นางสาว" THEN 1 END) AS female,
					SUM(CASE WHEN recruit_prefix = "เด็กชาย" or recruit_prefix = "นาย" THEN 1 END) AS male,
					tb_recruitstudent.recruit_regLevel
					,tb_recruitstudent.recruit_year
					,tb_recruitstudent.recruit_date')
				->from('tb_recruitstudent')
				->where('recruit_year','2568')
				->where("recruit_date BETWEEN '2025-03-25' AND '2025-03-31'", NULL, FALSE)
				->group_by('recruit_date')
				->order_by('recruit_date','ASC')
				->get()->result_array();

        echo json_encode($data['StatisticGeneral']);
    }

	public function StatisticViewGeneralTotal(){

		$data['StatisticGeneralTotal'] = $this->db->select('
					SUM(CASE WHEN recruit_prefix = "เด็กหญิง" or recruit_prefix = "นางสาว" THEN 1 ELSE 0 END) AS female,
					SUM(CASE WHEN recruit_prefix = "เด็กชาย" or recruit_prefix = "นาย" THEN 1 ELSE 0 END) AS male,
					tb_recruitstudent.recruit_regLevel
					,tb_recruitstudent.recruit_year
					,tb_recruitstudent.recruit_date')
				->from('tb_recruitstudent')
				->where('recruit_year','2568')
				->where('recruit_category','normal')
				->get()->row();

			echo json_encode($data['StatisticGeneralTotal']);
	}


}

?>