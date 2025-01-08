<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Statistic extends CI_Controller {
    public function __construct() {
        parent::__construct(); 

    }

    public function StatisticViewQuota(){
        
        // $data['StatisticCroTar'] = $this->db->select('
		// 			SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)" THEN 1 END) AS SMT,
		// 			SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)" THEN 1 END) AS SP,
		// 			SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)" THEN 1 END) AS CP,
		// 			SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)" THEN 1 END) AS CEP,
		// 			SUM(CASE WHEN recruit_tpyeRoom = "ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Performing Arts Program)" THEN 1 END) AS PAP,
		// 			tb_recruitstudent.recruit_regLevel
		// 			,tb_recruitstudent.recruit_year
		// 			,tb_recruitstudent.recruit_date,
		// 			tb_recruitstudent.recruit_category')
		// 		->from('tb_recruitstudent')
		// 		->where('recruit_year','2568')
		// 		->group_by('recruit_date')
		// 		->order_by('recruit_date','ASC')
		// 		->get()->result_array();

                $data['StatisticCroTar'] = $this->db->select('
					SUM(CASE WHEN recruit_prefix = "เด็กหญิง" or recruit_prefix = "นางสาว" THEN 1 END) AS female,
					SUM(CASE WHEN recruit_prefix = "เด็กชาย" or recruit_prefix = "นาย" THEN 1 END) AS male,
					tb_recruitstudent.recruit_regLevel
					,tb_recruitstudent.recruit_year
					,tb_recruitstudent.recruit_date')
				->from('tb_recruitstudent')
				->where('recruit_year','2568')
				->group_by('recruit_date')
				->order_by('recruit_date','ASC')
				->get()->result_array();

        echo json_encode($data['StatisticCroTar']);
    }





}

?>