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
		$data['Ckeckstu'] = $Conf->select('*')->where('stu_iden',$this->session->userdata('idenStu'))->from('tb_students')->get()->num_rows();

		$data['FatherCkeck'] = $Conf->select('par_stuID,par_relationKey')
							->where('par_stuID',$this->session->userdata('idenStu'))
							->where('par_relationKey',"พ่อ")
							->from('tb_parent')->get()->num_rows();
		$data['FatherConf'] = $Conf->select('*')
							->where('par_stuID',$this->session->userdata('idenStu'))
							->where('par_relationKey',"พ่อ")
							->from('tb_parent')->get()->result();

		$data['MatherCkeck'] = $Conf->select('par_stuID,par_relationKey')
							->where('par_stuID',$this->session->userdata('idenStu'))
							->where('par_relationKey',"แม่")
							->from('tb_parent')->get()->num_rows();
		$data['MatherConf'] = $Conf->select('*')
							->where('par_stuID',$this->session->userdata('idenStu'))
							->where('par_relationKey',"แม่")
							->from('tb_parent')->get()->result();

	    $data['OtherCkeck'] = $Conf->select('par_stuID,par_relationKey')
							->where('par_stuID',$this->session->userdata('idenStu'))
							->where('par_relationKey !=',"พ่อ")
							->where('par_relationKey !=',"แม่")
							->from('tb_parent')->get()->num_rows();

		//print_r($data['OtherCkeck']);exit();			
		$data['OtherConf'] = $Conf->select('*')
							->where('par_stuID',$this->session->userdata('idenStu'))
							->where('par_relationKey !=',"พ่อ")
							->where('par_relationKey !=',"แม่")
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
						'stu_img' => $this->input->post('stu_img'), 
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
						'stu_img' => $this->input->post('stu_img'),
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
						'par_relationKey' => $this->input->post('par_relationKey'),
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
		$data = array(	'par_relationKey' => $this->input->post('par_relationKey'),
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
					$id = $this->input->post('par_id');
					
					echo $this->Model_confirm->ConfirmFatherUpdate($data,$id);
        //print_r($data);
	}



	//   มารดาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาาา
	public function InsertConfirmMather(){
		$data = array('par_stuID' => $this->input->post('par_stuIDM'), 
						'par_relation' => $this->input->post('par_relationM'),
						'par_relationKey' => $this->input->post('par_relationKeyM'),
						'par_prefix' => $this->input->post('par_prefixM'),
						'par_firstName' => $this->input->post('par_firstNameM'),
						'par_lastName' => $this->input->post('par_lastNameM'),
						'par_ago' => $this->input->post('par_agoM'),
						'par_IdNumber' => $this->input->post('par_IdNumberM'),
						'par_national' => $this->input->post('par_nationalM'),
						'par_race' => $this->input->post('par_raceM'),
						'par_religion' => $this->input->post('par_religionM'),
						'par_career' => $this->input->post('par_careerM'),
						'par_education' => $this->input->post('par_educationM'),
						'par_salary' => $this->input->post('par_salaryM'),
						'par_positionJob' => $this->input->post('par_positionJobM'),
						'par_phone' => $this->input->post('par_phoneM'),
						'par_decease' => $this->input->post('par_deceaseM'),
						'par_hNumber' => $this->input->post('par_hNumberM'),
						'par_hMoo' => $this->input->post('par_hMooM'),
						'par_hTambon' => $this->input->post('par_hTambonM'),
						'par_hDistrict' => $this->input->post('par_hDistrictM'),
						'par_hProvince' => $this->input->post('par_hProvinceM'),
						'par_hPostcode' => $this->input->post('par_hPostcodeM'),
						'par_cNumber' => $this->input->post('par_cNumberM'),
						'par_cMoo' => $this->input->post('par_cMooM'),
						'par_cTambon' => $this->input->post('par_cTambonM'),
						'par_cDistrict' => $this->input->post('par_cDistrictM'),
						'par_cProvince' => $this->input->post('par_cProvinceM'),
						'par_cPostcode' => $this->input->post('par_cPostcodeM'),
						'par_rest' => $this->input->post('par_restM'),
						'par_restOrthor' => $this->input->post('par_restOrthorM'),
						'par_service' => $this->input->post('par_serviceM'),
						'par_serviceName' => implode("",$this->input->post('par_serviceNameM')),
						'par_claim' => $this->input->post('par_claimM')
					);

					echo $this->Model_confirm->ConfirmMatherInsert($data);
		//print_r($data);
	}

	public function UpdateConfirmMather(){
		$data = array(	'par_relationKey' => $this->input->post('par_relationKeyM'),			
						'par_prefix' => $this->input->post('par_prefixM'),
						'par_firstName' => $this->input->post('par_firstNameM'),
						'par_lastName' => $this->input->post('par_lastNameM'),
						'par_ago' => $this->input->post('par_agoM'),
						'par_IdNumber' => $this->input->post('par_IdNumberM'),
						'par_national' => $this->input->post('par_nationalM'),
						'par_race' => $this->input->post('par_raceM'),
						'par_religion' => $this->input->post('par_religionM'),
						'par_career' => $this->input->post('par_careerM'),
						'par_education' => $this->input->post('par_educationM'),
						'par_salary' => $this->input->post('par_salaryM'),
						'par_positionJob' => $this->input->post('par_positionJobM'),
						'par_phone' => $this->input->post('par_phoneM'),
						'par_decease' => $this->input->post('par_deceaseM'),
						'par_hNumber' => $this->input->post('par_hNumberM'),
						'par_hMoo' => $this->input->post('par_hMooM'),
						'par_hTambon' => $this->input->post('par_hTambonM'),
						'par_hDistrict' => $this->input->post('par_hDistrictM'),
						'par_hProvince' => $this->input->post('par_hProvinceM'),
						'par_hPostcode' => $this->input->post('par_hPostcodeM'),
						'par_cNumber' => $this->input->post('par_cNumberM'),
						'par_cMoo' => $this->input->post('par_cMooM'),
						'par_cTambon' => $this->input->post('par_cTambonM'),
						'par_cDistrict' => $this->input->post('par_cDistrictM'),
						'par_cProvince' => $this->input->post('par_cProvinceM'),
						'par_cPostcode' => $this->input->post('par_cPostcodeM'),
						'par_rest' => $this->input->post('par_restM'),
						'par_restOrthor' => $this->input->post('par_restOrthorM'),
						'par_service' => $this->input->post('par_serviceM'),
						'par_serviceName' => implode("",$this->input->post('par_serviceNameM')),
						'par_claim' => $this->input->post('par_claimM')
					);
					$id = $this->input->post('par_idM');
					echo $this->Model_confirm->ConfirmMatherUpdate($data,$id);
        //print_r($data);
	}

		//   ผู้ปกครองงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงงง
		public function InsertConfirmOther(){
			$data = array('par_stuID' => $this->input->post('par_stuIDO'), 
							'par_relation' => $this->input->post('par_relationO'),
							'par_relationKey' => $this->input->post('par_relationKeyO'),
							'par_prefix' => $this->input->post('par_prefixO'),
							'par_firstName' => $this->input->post('par_firstNameO'),
							'par_lastName' => $this->input->post('par_lastNameO'),
							'par_ago' => $this->input->post('par_agoO'),
							'par_IdNumber' => $this->input->post('par_IdNumberO'),
							'par_national' => $this->input->post('par_nationalO'),
							'par_race' => $this->input->post('par_raceO'),
							'par_religion' => $this->input->post('par_religionO'),
							'par_career' => $this->input->post('par_careerO'),
							'par_education' => $this->input->post('par_educationO'),
							'par_salary' => $this->input->post('par_salaryO'),
							'par_positionJob' => $this->input->post('par_positionJobO'),
							'par_phone' => $this->input->post('par_phoneO'),
							'par_decease' => $this->input->post('par_deceaseO'),
							'par_hNumber' => $this->input->post('par_hNumberO'),
							'par_hMoo' => $this->input->post('par_hMooO'),
							'par_hTambon' => $this->input->post('par_hTambonO'),
							'par_hDistrict' => $this->input->post('par_hDistrictO'),
							'par_hProvince' => $this->input->post('par_hProvinceO'),
							'par_hPostcode' => $this->input->post('par_hPostcodeO'),
							'par_cNumber' => $this->input->post('par_cNumberO'),
							'par_cMoo' => $this->input->post('par_cMooO'),
							'par_cTambon' => $this->input->post('par_cTambonO'),
							'par_cDistrict' => $this->input->post('par_cDistrictO'),
							'par_cProvince' => $this->input->post('par_cProvinceO'),
							'par_cPostcode' => $this->input->post('par_cPostcodeO'),
							'par_rest' => $this->input->post('par_restO'),
							'par_restOrthor' => $this->input->post('par_restOrthorO'),
							'par_service' => $this->input->post('par_serviceO'),
							'par_serviceName' => implode("",$this->input->post('par_serviceNameO')),
							'par_claim' => $this->input->post('par_claimO')
						);
	
						echo $this->Model_confirm->ConfirmOtherInsert($data);
			//print_r($data);
		}
	
		public function UpdateConfirmOther(){
			$data = array(	'par_relationKey' => $this->input->post('par_relationKeyO'),
							'par_relation' => $this->input->post('par_relationO'),
							'par_prefix' => $this->input->post('par_prefixO'),
							'par_firstName' => $this->input->post('par_firstNameO'),
							'par_lastName' => $this->input->post('par_lastNameO'),
							'par_ago' => $this->input->post('par_agoO'),
							'par_IdNumber' => $this->input->post('par_IdNumberO'),
							'par_national' => $this->input->post('par_nationalO'),
							'par_race' => $this->input->post('par_raceO'),
							'par_religion' => $this->input->post('par_religionO'),
							'par_career' => $this->input->post('par_careerO'),
							'par_education' => $this->input->post('par_educationO'),
							'par_salary' => $this->input->post('par_salaryO'),
							'par_positionJob' => $this->input->post('par_positionJobO'),
							'par_phone' => $this->input->post('par_phoneO'),
							'par_decease' => $this->input->post('par_deceaseO'),
							'par_hNumber' => $this->input->post('par_hNumberO'),
							'par_hMoo' => $this->input->post('par_hMooO'),
							'par_hTambon' => $this->input->post('par_hTambonO'),
							'par_hDistrict' => $this->input->post('par_hDistrictO'),
							'par_hProvince' => $this->input->post('par_hProvinceO'),
							'par_hPostcode' => $this->input->post('par_hPostcodeO'),
							'par_cNumber' => $this->input->post('par_cNumberO'),
							'par_cMoo' => $this->input->post('par_cMooO'),
							'par_cTambon' => $this->input->post('par_cTambonO'),
							'par_cDistrict' => $this->input->post('par_cDistrictO'),
							'par_cProvince' => $this->input->post('par_cProvinceO'),
							'par_cPostcode' => $this->input->post('par_cPostcodeO'),
							'par_rest' => $this->input->post('par_restO'),
							'par_restOrthor' => $this->input->post('par_restOrthorO'),
							'par_service' => $this->input->post('par_serviceO'),
							'par_serviceName' => implode("",$this->input->post('par_serviceNameO')),
							'par_claim' => $this->input->post('par_claimO')
						);
						$id = $this->input->post('par_idO');
						echo $this->Model_confirm->ConfirmOtherUpdate($data,$id);
			//print_r($data);
		}


		public function PDFForStudent()
		{
			$Conf = $this->load->database('skjpers', TRUE);
			$datapdf = $Conf->select('*')->where('stu_iden',$this->session->userdata('idenStu'))->get('tb_students')->result();
			//echo '<pre>'; print_r($datapdf); exit();
			$datapdfRe = $this->db->select('*')->where('recruit_idCard',$this->session->userdata('idenStu'))->get('tb_recruitstudent')->result();
			
	
			$date_Y = date('Y',strtotime(@$datapdf[0]->stu_birthDay));
			$TH_Month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
			$date_D = date('d',strtotime(@$datapdf[0]->stu_birthDay));
			$date_M = date('n',strtotime(@$datapdf[0]->stu_birthDay));
	
			$date_Y_regis = date('Y',strtotime(@$datapdf[0]->stu_createDate))+543;
			$date_D_regis = date('d',strtotime(@$datapdf[0]->stu_createDate));
			$date_M_regis = date('n',strtotime(@$datapdf[0]->stu_createDate));
	
			//print_r($date_M); exit();
			$sch = explode("โรงเรียน", @$datapdf[0]->stu_schoolfrom); //แยกคำว่าโรงเรียน
			
			$mpdf = new \Mpdf\Mpdf([
						'default_font_size' => 16,
						'default_font' => 'sarabun',
						'format' => [210, 90]
					]);
			$mpdf->SetTitle(@$datapdf[0]->stu_prefix.@$datapdf[0]->stu_fristName.' '.@$datapdf[0]->stu_lastName);
			$mpdf->showImageErrors = true;
			// ส่วนที่ 2recruit_date
			$html = '<div style="position:absolute;top:100px;left:75px; width:100%"><img style="width:120px;hight:100px;" src='.FCPATH.'uploads/recruitstudent/m'.@$datapdfRe[0]->recruit_regLevel.'/img/'.@$datapdfRe[0]->recruit_img.'></div>'; 
			$html .= '<div style="position:absolute;top:57px;left:150px; width:100%">'.sprintf("%04d",@$datapdfRe[0]->recruit_id).'</div>'; //เลขที่สมัคร
			$html .= '<div style="position:absolute;top:100px;left:250px; width:100%">'.@$datapdf[0]->stu_prefix.@$datapdf[0]->stu_fristName.'</div>'; //ชื่อผู้สมัคร
			$html .= '<div style="position:absolute;top:100px;left:480px; width:100%">'.@$datapdf[0]->stu_lastName.'</div>'; //นามสกุลผู้สมัคร
			$html .= '<div style="position:absolute;top:127;left:400px; width:100%">'.@$datapdf[0]->stu_iden.'</div>';	
			$html .= '<div style="position:absolute;top:155;left:270px; width:100%">'.@$datapdfRe[0]->recruit_tpyeRoom.'</div>';	
			$html .= '<div style="position:absolute;top:200px;left:340px; width:100%"><img style="width:120px;hight:100px;" src='.FCPATH.'asset/img/license.png'.'></div>';
			$html .= '<div style="position:absolute;top:255x;left:360px; width:100%">'.$date_D_regis.' '.$TH_Month[$date_M_regis-1].' '.$date_Y_regis.'</div>'; // วันที่สมัครตอนที่ 2
	
			$mpdf->SetDocTemplate('uploads/recruitstudent/pdf_registudentForStudent'.'.pdf',true);
	
			$mpdf->WriteHTML($html);
			$mpdf->Output('Reg_'.@$datapdf[0]->recruit_idCard.'.pdf','I'); // opens in browser
			//$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
		}

}