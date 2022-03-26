<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_confirm extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('datethai');
		$this->load->model('model_admission');
		$this->load->model('Model_login');
		$this->load->model('Model_confirm');
		$switch = $this->db->get("tb_onoffsys")->result();
		if($switch[0]->onoff_system == 'off'){
			redirect('CloseSystem');
		}
		
	}
	
	  public function StudentsConfirm(){

		$Conf = $this->load->database('skjpers', TRUE);
		$db2 = $this->load->database('skjmain', TRUE);	

		$data['title'] = 'รายงานตัวออนไลน์';
		$data['description'] = 'ระบบรายงานตัวออนไลน์';
		$data['banner'] = base_url()."uploads/banner65-1.png";
		$data['url'] = "welcome";
		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['quota'] = $this->db->get("tb_quota")->result();
		

		$data['stu'] = $this->db->select('*')->where('recruit_idCard',$this->session->userdata('idenStu'))->from('tb_recruitstudent')->get()->result();

		$data['stuConf'] = $Conf->select('*')->where('stu_iden',$this->session->userdata('idenStu'))->from('tb_students')->get()->result();

		$data['FatherCkeck'] = $Conf->select('par_stuID,par_relation')
							->where('par_stuID',$this->session->userdata('idenStu'))
							->where('par_relation',"บิดา")
							->from('tb_parent')->get()->num_rows();
		$data['FatherConf'] = $Conf->select('*')
							->where('par_stuID',$this->session->userdata('idenStu'))
							->where('par_relation',"บิดา")
							->from('tb_parent')->get()->result();


		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/menu_top.php');
		$this->load->view('AdminssionConfirm.php');
		$this->load->view('layout/footer.php');

	  }


	  public function InsertConfirmStudent(){

		$stu_birthDay = $this->input->post('stu_day').'-'.$this->input->post('stu_month').'-'.$this->input->post('stu_year');

		$data = array(  'stu_iden' => $this->input->post('stu_iden'),
						'stu_prefix' => $this->input->post('stu_prefix'),
						'stu_fristName' =>$this->input->post('stu_fristName') ,
						'stu_lastName' => $this->input->post('stu_lastName'), 
						'stu_nickName' => $this->input->post('stu_nickName'), 
						'stu_birthDay' => $stu_birthDay, 
						'stu_birthTambon' => $this->input->post('stu_birthTambon'), 
						'stu_birthDistrict' => $this->input->post('stu_birthDistrict'), 
						'stu_birthProvirce' => $this->input->post('stu_birthProvirce'), 
						'stu_birthHospital' => $this->input->post('stu_birthHospital'), 
						'stu_nationality' => $this->input->post('stu_nationality'), 
						'stu_race' => $this->input->post('stu_race'), 
						'stu_religion' => $this->input->post('stu_religion'), 
						'stu_bloodType' => $this->input->post('stu_bloodType'), 
						'stu_diseaes' => $this->input->post('stu_diseaes'),
						'stu_numberSibling' => $this->input->post('stu_numberSibling'),
						'stu_firstChild' => $this->input->post('stu_firstChild'),
						'stu_numberSiblingSkj' => $this->input->post('stu_numberSiblingSkj'),
						'stu_disablde' => $this->input->post('stu_disablde'),
						'stu_wieght' => $this->input->post('stu_wieght'),
						'stu_hieght' => $this->input->post('stu_hieght'),
						'stu_talent' => $this->input->post('stu_talent'),
						'stu_parenalStatus' => $this->input->post('stu_parenalStatus'),
						'stu_presentLife' => $this->input->post('stu_presentLife'),
						'stu_personOther' => $this->input->post('stu_personOther'),
						'stu_hCode' => $this->input->post('stu_hCode'),
						'stu_hNumber' => $this->input->post('stu_hNumber'),
						'stu_hMoo' => $this->input->post('stu_hMoo'),
						'stu_hRoad' => $this->input->post('stu_hRoad'),
						'stu_hTambon' => $this->input->post('stu_hTambon'),
						'stu_hDistrict' => $this->input->post('stu_hDistrict'),
						'stu_hProvince' => $this->input->post('stu_hProvince'),
						'stu_hPostCode' => $this->input->post('stu_hPostCode'),
						'stu_phone' => $this->input->post('stu_phone'),
						'stu_email' => $this->input->post('stu_email'),
						'stu_cNumber' => $this->input->post('stu_cNumber'),
						'stu_cMoo' => $this->input->post('stu_cMoo'),
						'stu_cRoad' => $this->input->post('stu_cRoad'),
						'stu_cTumbao' => $this->input->post('stu_cTumbao'),
						'stu_cDistrict' => $this->input->post('stu_cDistrict'),
						'stu_cProvince' => $this->input->post('stu_cProvince'),
						'stu_cPostcode' => $this->input->post('stu_cPostcode'),
						'stu_natureRoom' => $this->input->post('stu_natureRoom'),
						'stu_farSchool' => $this->input->post('stu_farSchool'),
						'stu_travel' => $this->input->post('stu_travel'),
						'stu_gradLevel' => $this->input->post('stu_gradLevel'),
						'stu_schoolfrom' => $this->input->post('stu_schoolfrom'),
						'stu_schoolTambao' => $this->input->post('stu_schoolTambao'),
						'stu_schoolDistrict' => $this->input->post('stu_schoolDistrict'),
						'stu_schoolProvince' => $this->input->post('stu_schoolProvince'),
						'stu_usedStudent' => $this->input->post('stu_usedStudent'),
						'stu_inputLevel' => $this->input->post('stu_inputLevel'),
						'stu_phoneUrgent' => $this->input->post('stu_phoneUrgent'),						
						'stu_phoneFriend' => $this->input->post('stu_phoneFriend'),
						'stu_active' => "กำลังศึกษา",
						'stu_createDate' => date("Y-m-d")
					);

		  // Get data
		echo $this->Model_confirm->ConfirmStudentInsert($data);
		//print_r($this->input->post());
	  }

	  public function UpdateConfirmStudent(){

		$stu_birthDay = $this->input->post('stu_day').'-'.$this->input->post('stu_month').'-'.$this->input->post('stu_year');

		$data = array( 
						'stu_prefix' => $this->input->post('stu_prefix'),
						'stu_fristName' =>$this->input->post('stu_fristName') ,
						'stu_lastName' => $this->input->post('stu_lastName'), 
						'stu_nickName' => $this->input->post('stu_nickName'), 
						'stu_birthDay' => $stu_birthDay, 
						'stu_birthTambon' => $this->input->post('stu_birthTambon'), 
						'stu_birthDistrict' => $this->input->post('stu_birthDistrict'), 
						'stu_birthProvirce' => $this->input->post('stu_birthProvirce'), 
						'stu_birthHospital' => $this->input->post('stu_birthHospital'), 
						'stu_nationality' => $this->input->post('stu_nationality'), 
						'stu_race' => $this->input->post('stu_race'), 
						'stu_religion' => $this->input->post('stu_religion'), 
						'stu_bloodType' => $this->input->post('stu_bloodType'), 
						'stu_diseaes' => $this->input->post('stu_diseaes'),
						'stu_numberSibling' => $this->input->post('stu_numberSibling'),
						'stu_firstChild' => $this->input->post('stu_firstChild'),
						'stu_numberSiblingSkj' => $this->input->post('stu_numberSiblingSkj'),
						'stu_disablde' => $this->input->post('stu_disablde'),
						'stu_wieght' => $this->input->post('stu_wieght'),
						'stu_hieght' => $this->input->post('stu_hieght'),
						'stu_talent' => $this->input->post('stu_talent'),
						'stu_parenalStatus' => $this->input->post('stu_parenalStatus'),
						'stu_presentLife' => $this->input->post('stu_presentLife'),
						'stu_personOther' => $this->input->post('stu_personOther'),
						'stu_hCode' => $this->input->post('stu_hCode'),
						'stu_hNumber' => $this->input->post('stu_hNumber'),
						'stu_hMoo' => $this->input->post('stu_hMoo'),
						'stu_hRoad' => $this->input->post('stu_hRoad'),
						'stu_hTambon' => $this->input->post('stu_hTambon'),
						'stu_hDistrict' => $this->input->post('stu_hDistrict'),
						'stu_hProvince' => $this->input->post('stu_hProvince'),
						'stu_hPostCode' => $this->input->post('stu_hPostCode'),
						'stu_phone' => $this->input->post('stu_phone'),
						'stu_email' => $this->input->post('stu_email'),
						'stu_cNumber' => $this->input->post('stu_cNumber'),
						'stu_cMoo' => $this->input->post('stu_cMoo'),
						'stu_cRoad' => $this->input->post('stu_cRoad'),
						'stu_cTumbao' => $this->input->post('stu_cTumbao'),
						'stu_cDistrict' => $this->input->post('stu_cDistrict'),
						'stu_cProvince' => $this->input->post('stu_cProvince'),
						'stu_cPostcode' => $this->input->post('stu_cPostcode'),
						'stu_natureRoom' => $this->input->post('stu_natureRoom'),
						'stu_farSchool' => $this->input->post('stu_farSchool'),
						'stu_travel' => $this->input->post('stu_travel'),
						'stu_gradLevel' => $this->input->post('stu_gradLevel'),
						'stu_schoolfrom' => $this->input->post('stu_schoolfrom'),
						'stu_schoolTambao' => $this->input->post('stu_schoolTambao'),
						'stu_schoolDistrict' => $this->input->post('stu_schoolDistrict'),
						'stu_schoolProvince' => $this->input->post('stu_schoolProvince'),
						'stu_usedStudent' => $this->input->post('stu_usedStudent'),
						'stu_inputLevel' => $this->input->post('stu_inputLevel'),
						'stu_phoneUrgent' => $this->input->post('stu_phoneUrgent'),						
						'stu_phoneFriend' => $this->input->post('stu_phoneFriend'),
						'stu_active' => "กำลังศึกษา",
						'stu_createDate' => date("Y-m-d")
					);

					$id = $this->input->post('stu_iden');

		  // Get data
		echo $this->Model_confirm->ConfirmStudentUpdate($data,$id);
		//print_r($this->input->post());
	  }

	//   บิดดาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาา
	public function InsertConfirmFather(){
		$data = array('par_stuID' => $this->input->post('par_stuID'), 
						'par_relation' => $this->input->post('par_relation'),
						'par_prefix' => $this->input->post('par_prefix'),
						'par_firstName' => $this->input->post('par_firstName'),
						'par_lastName' => $this->input->post('par_lastName'),
						'par_ago' => $this->input->post('par_ago'),
						'par_IdNumber' => $this->input->post('par_IdNumber'),
						'par_national' => $this->input->post('par_national'),
						'par_race' => $this->input->post('par_race'),
						'par_religion' => $this->input->post('par_religion'),
						'par_career' => $this->input->post('par_career'),
						'par_education' => $this->input->post('par_education'),
						'par_salary' => $this->input->post('par_salary'),
						'par_positionJob' => $this->input->post('par_positionJob'),
						'par_phone' => $this->input->post('par_phone'),
						'par_decease' => $this->input->post('par_decease'),
						'par_hNumber' => $this->input->post('par_hNumber'),
						'par_hMoo' => $this->input->post('par_hMoo'),
						'par_hTambon' => $this->input->post('par_hTambon'),
						'par_hDistrict' => $this->input->post('par_hDistrict'),
						'par_hProvince' => $this->input->post('par_hProvince'),
						'par_hPostcode' => $this->input->post('par_hPostcode'),
						'par_cNumber' => $this->input->post('par_cNumber'),
						'par_cMoo' => $this->input->post('par_cMoo'),
						'par_cTambon' => $this->input->post('par_cTambon'),
						'par_cDistrict' => $this->input->post('par_cDistrict'),
						'par_cProvince' => $this->input->post('par_cProvince'),
						'par_cPostcode' => $this->input->post('par_cPostcode'),
						'par_rest' => $this->input->post('par_rest'),
						'par_restOrthor' => $this->input->post('par_restOrthor'),
						'par_service' => $this->input->post('par_service'),
						'par_serviceName' => implode("",$this->input->post('par_serviceName')),
						'par_claim' => $this->input->post('par_claim')
					);

					echo $this->Model_confirm->ConfirmFatherInsert($data);
		//print_r($data);
	}

	public function UpdateConfirmFather(){
		$data = array(						
						'par_prefix' => $this->input->post('par_prefix'),
						'par_firstName' => $this->input->post('par_firstName'),
						'par_lastName' => $this->input->post('par_lastName'),
						'par_ago' => $this->input->post('par_ago'),
						'par_IdNumber' => $this->input->post('par_IdNumber'),
						'par_national' => $this->input->post('par_national'),
						'par_race' => $this->input->post('par_race'),
						'par_religion' => $this->input->post('par_religion'),
						'par_career' => $this->input->post('par_career'),
						'par_education' => $this->input->post('par_education'),
						'par_salary' => $this->input->post('par_salary'),
						'par_positionJob' => $this->input->post('par_positionJob'),
						'par_phone' => $this->input->post('par_phone'),
						'par_decease' => $this->input->post('par_decease'),
						'par_hNumber' => $this->input->post('par_hNumber'),
						'par_hMoo' => $this->input->post('par_hMoo'),
						'par_hTambon' => $this->input->post('par_hTambon'),
						'par_hDistrict' => $this->input->post('par_hDistrict'),
						'par_hProvince' => $this->input->post('par_hProvince'),
						'par_hPostcode' => $this->input->post('par_hPostcode'),
						'par_cNumber' => $this->input->post('par_cNumber'),
						'par_cMoo' => $this->input->post('par_cMoo'),
						'par_cTambon' => $this->input->post('par_cTambon'),
						'par_cDistrict' => $this->input->post('par_cDistrict'),
						'par_cProvince' => $this->input->post('par_cProvince'),
						'par_cPostcode' => $this->input->post('par_cPostcode'),
						'par_rest' => $this->input->post('par_rest'),
						'par_restOrthor' => $this->input->post('par_restOrthor'),
						'par_service' => $this->input->post('par_service'),
						'par_serviceName' => implode("",$this->input->post('par_serviceName')),
						'par_claim' => $this->input->post('par_claim')
					);
					$id = $this->input->post('par_stuID');
					$relation = $this->input->post('par_relation');
					echo $this->Model_confirm->ConfirmFatherUpdate($data,$id,$relation);
        //print_r($data);
	}

}