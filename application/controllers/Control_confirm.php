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
		$data['banner'] = base_url()."uploads/confirm/logo.PNG";
		$data['url'] = "Confirm";
		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['quota'] = $this->db->get("tb_quota")->result();
		

		$data['stu'] = $this->db->select('*')->where('recruit_idCard',$this->session->userdata('idenStu'))->from('tb_recruitstudent')->order_by('recruit_year','DESC')->get()->result();

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

		// echo '<pre>';print_r(($data['MatherCkeck']));
		// exit();
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
						'stu_UpdateConfirm' => $this->input->post('stu_UpdateConfirm'),
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
					$CheckID = $this->Model_confirm->ConfirmStudentCheckID($id);
					if($CheckID == 0){
						echo $this->Model_confirm->ConfirmStudentInsert($data);
					}else{
						echo 0;
					}
		  //echo $CheckID;
		//echo $this->Model_confirm->ConfirmStudentInsert($data);
		
	  }

	  public function UpdateConfirmStudent(){

		$stu_birthDay = $this->input->post('stu_day').'-'.$this->input->post('stu_month').'-'.$this->input->post('stu_year');

		$data = array( 
						'stu_prefix' => $this->input->post('stu_prefix'),
						'stu_UpdateConfirm' => $this->input->post('stu_UpdateConfirm'),
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
					$CheckID = $this->Model_confirm->ConfirmStudentCheckID($id);
					if($CheckID == 1){
						echo $this->Model_confirm->ConfirmStudentUpdate($data,$id);
					}else{
						echo 0;
					}

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

					$CheckID = $this->Model_confirm->ConfirmParentCheckID($this->input->post('par_stuID'),$this->input->post('par_relationKey'));
					if($CheckID == 0){
						echo $this->Model_confirm->ConfirmFatherInsert($data);
					}else{
						echo 0;
					}
		//print_r($this->input->post('par_prefix'));
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

					$CheckID = $this->Model_confirm->ConfirmParentCheckID($this->input->post('par_stuIDM'),$this->input->post('par_relationKeyM'));
					if($CheckID == 0){
						echo $this->Model_confirm->ConfirmMatherInsert($data);
					}else{
						echo 0;
					}

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
	
						$CheckID = $this->Model_confirm->ConfirmParentCheckID($this->input->post('par_stuIDO'),$this->input->post('par_relationKeyO'));
						if($CheckID == 0){
							echo $this->Model_confirm->ConfirmOtherInsert($data);
						}else{
							echo 0;
						}
						
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


		public function PDFForStudent1()
		{
			$path = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
		require $path . '/librarie_skj/mpdf/vendor/autoload.php';

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

		public function PDFForStudent()
    {
		$id = $this->session->userdata('idenStu');
		
		$path = (dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
		require $path . '/librarie_skj/mpdf/vendor/autoload.php';

		$Conf = $this->load->database('skjpers', TRUE);
		$thai = $this->load->database('thailandpa', TRUE);
		
		
		$recruit = $this->db->where('recruit_idCard',$id)->get('tb_recruitstudent')->result();	
		$confrim = $Conf->where('stu_iden',$id)->get('tb_students')->result();	
		
		$idstu = str_replace('-','', $confrim[0]->stu_iden); //แยกเลข 13 หลัก
	   
			$date_Y1 = date('Y',strtotime($confrim[0]->stu_createDate))+543;
			$TH_Month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
			$date_D1 = date('d',strtotime($confrim[0]->stu_createDate));
			$date_M1 = date('n',strtotime($confrim[0]->stu_createDate));
			
			$date_Y = date('Y',strtotime(date('d-m-Y')))+543;
			$date_D = (int)date('d',strtotime(date('d-m-Y')));
			$date_M = date('n',strtotime(date('d-m-Y')));

	
			$date_Y_birt = date('Y',strtotime($confrim[0]->stu_birthDay));
			$date_D_birt = (int)date('d',strtotime($confrim[0]->stu_birthDay));
			$date_M_birt = date('n',strtotime($confrim[0]->stu_birthDay));

			//echo '<pre>'; print_r($recruit);exit();	

        $mpdf = new \Mpdf\Mpdf([
					'default_font_size' => 16,
					'default_font' => 'sarabun',
					'debug' => false
				]);
        $mpdf->SetTitle($confrim[0]->stu_prefix.$confrim[0]->stu_fristName.' '.$confrim[0]->stu_lastName);

		$html = '<div style="position:absolute;top:577px;left:263px; width:100%; font-size:1.5rem">'.$idstu[0].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:305px; width:100%; font-size:1.5rem">'.$idstu[1].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:343px; width:100%; font-size:1.5rem">'.$idstu[2].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:380px; width:100%; font-size:1.5rem">'.$idstu[3].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:415px; width:100%; font-size:1.5rem">'.$idstu[4].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:455px; width:100%; font-size:1.5rem">'.$idstu[5].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:490px; width:100%; font-size:1.5rem">'.$idstu[6].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:530px; width:100%; font-size:1.5rem">'.$idstu[7].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:565px; width:100%; font-size:1.5rem">'.$idstu[8].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:600px; width:100%; font-size:1.5rem">'.$idstu[9].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:645px; width:100%; font-size:1.5rem">'.$idstu[10].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:680px; width:100%; font-size:1.5rem">'.$idstu[11].'</div>';
		$html .= '<div style="position:absolute;top:577px;left:722px; width:100%; font-size:1.5rem">'.$idstu[12].'</div>';

		$html .= '<div style="position:absolute;top:30px;left:50px; width:100%">เลขที่สมัคร '.$recruit[0]->recruit_id.'</div>'; //เลขที่สมัคร

		$html .= '<div style="position:absolute;top:463px;left:420px; width:100%">'.$date_D.'</div>'; //วัน
		$html .= '<div style="position:absolute;top:463px;left:475px; width:100%">'.$TH_Month[$date_M-1].'</div>'; //เดือน
		$html .= '<div style="position:absolute;top:463px;left:550px; width:100%">'.$date_Y.'</div>'; //ปี

       
		$html .= '<div style="position:absolute;top:75px;left:663px; width:100%"><img style="width: 100px;hight:70px;" src='.FCPATH.'uploads/recruitstudent/m'.$recruit[0]->recruit_regLevel.'/img/'.$recruit[0]->recruit_img.'></div>'; 
		$html .= '<div style="position:absolute;top:105px;left:230px; width:100%">'.$confrim[0]->stu_regLevel.'</div>'; //ชั้นที่สมัครเรียน
		$html .= '<div style="position:absolute;top:105px;left:470px; width:100%">'.($Year).'</div>'; //ปีการศึกษา
		$html .= '<div style="position:absolute;top:130px;left:140px; width:100%">'.$confrim[0]->stu_prefix.$confrim[0]->stu_fristName.'</div>'; //ชื่อนักเรียน 
		$html .= '<div style="position:absolute;top:130px;left:400px; width:100%">'.$confrim[0]->stu_lastName.'</div>'; //นามสกุลนักเรียน
		$html .= '<div style="position:absolute;top:158px;left:120px; width:100%">'.$date_D.'</div>'; //วัน
		$html .= '<div style="position:absolute;top:158px;left:250px; width:100%">'.$TH_Month[$date_M-1].'</div>'; //เดือน
		$html .= '<div style="position:absolute;top:158px;left:470px; width:100%">'.$date_Y.'</div>'; //ปี

		$html .= '<div style="position:absolute;top:243px;left:340px; width:100%">'.$confrim[0]->stu_prefix.$confrim[0]->stu_fristName.'</div>'; //ชื่อนักเรียน
		$html .= '<div style="position:absolute;top:243px;left:530px; width:100%">'.$confrim[0]->stu_lastName.'</div>'; //ชื่อนามสกุล

		$html .= '<div style="position:absolute;top:510px;left:250px; width:100%">'.$date_D_birt.'</div>'; //วัน
		$html .= '<div style="position:absolute;top:510px;left:420px; width:100%">'.$TH_Month[$date_M_birt-1].'</div>'; //วัน
		$html .= '<div style="position:absolute;top:510px;left:650px; width:100%">'.$date_Y_birt.'</div>'; //วัน
		$html .= '<div style="position:absolute;top:531px;left:235px; width:100%">'.$confrim[0]->stu_birthTambon.'</div>'; //เกิดตำบล
		$html .= '<div style="position:absolute;top:531px;left:420px; width:100%">'.$confrim[0]->stu_birthDistrict.'</div>'; //เกิดอำเภอ
		$html .= '<div style="position:absolute;top:531px;left:620px; width:100%">'.$confrim[0]->stu_birthProvirce.'</div>'; //เกิดจังหวัด
		$html .= '<div style="position:absolute;top:553px;left:240px; width:100%">'.$confrim[0]->stu_birthHospital.'</div>'; //โรงบาลเกิด

		$html .= '<div style="position:absolute;top:618px;left:160px; width:100%">'.$confrim[0]->stu_nationality.'</div>';
		$html .= '<div style="position:absolute;top:618px;left:330px; width:100%">'.$confrim[0]->stu_race.'</div>';
		$html .= '<div style="position:absolute;top:618px;left:520px; width:100%">'.$confrim[0]->stu_religion.'</div>';
		$html .= '<div style="position:absolute;top:618px;left:680px; width:100%">'.$confrim[0]->stu_bloodType.'</div>';
		$html .= '<div style="position:absolute;top:640px;left:180px; width:100%">'.$confrim[0]->stu_diseaes.'</div>';

		$html .= '<div style="position:absolute;top:668px;left:370px; width:100%">'.$confrim[0]->stu_numberSibling.'</div>';
		$html .= '<div style="position:absolute;top:668px;left:620px; width:100%">'.$confrim[0]->stu_firstChild.'</div>';
		$html .= '<div style="position:absolute;top:690px;left:530px; width:100%">'.$confrim[0]->stu_numberSiblingSkj.'</div>';
		$html .= '<div style="position:absolute;top:690px;left:700px; width:100%">'.$confrim[0]->stu_nickName.'</div>';

		$html .= '<div style="position:absolute;top:710px;left:120px; width:100%">'.$confrim[0]->stu_disablde.'</div>';
		$html .= '<div style="position:absolute;top:710px;left:290px; width:100%">'.$confrim[0]->stu_wieght.'</div>';
		$html .= '<div style="position:absolute;top:710px;left:410px; width:100%">'.$confrim[0]->stu_hieght.'</div>';
		$html .= '<div style="position:absolute;top:710px;left:640px; width:100%">'.$confrim[0]->stu_talent.'</div>';

		if($confrim[0]->stu_parenalStatus == 'อยู่ด้วยกัน'){
		$html .= '<div style="position:absolute;top:740px;left:178px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_parenalStatus == 'แยกกันอยู่'){
		$html .= '<div style="position:absolute;top:740px;left:270px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_parenalStatus == 'หย่าร้าง'){
		$html .= '<div style="position:absolute;top:740px;left:365px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_parenalStatus =='บิดาถึงแก่กรรม'){
		$html .= '<div style="position:absolute;top:740px;left:448x; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_parenalStatus == 'มารดาถึงแก่กรรม'){
		$html .= '<div style="position:absolute;top:740px;left:565px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_parenalStatus == 'บิดาหรือมารดาแต่งงานใหม่'){
		$html .= '<div style="position:absolute;top:765px;left:178px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}

		if($confrim[0]->stu_presentLife == 'อยู่กับบิดาและมารดา'){
		$html .= '<div style="position:absolute;top:790px;left:225px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_presentLife == 'อยู่กับบิดาหรือมารดา'){
		$html .= '<div style="position:absolute;top:790px;left:360px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_presentLife == 'บุคคลอื่น'){
		$html .= '<div style="position:absolute;top:790px;left:510px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}
		$html .= '<div style="position:absolute;top:787px;left:620px; width:100%">'.$confrim[0]->stu_personOther.'</div>';

		$html .= '<div style="position:absolute;top:814px;left:310px; width:100%">'.$confrim[0]->stu_hCode.'</div>';
		$html .= '<div style="position:absolute;top:814px;left:495px;px; width:100%">'.$confrim[0]->stu_hNumber.'</div>';
		$html .= '<div style="position:absolute;top:814px;left:585px; width:100%">'.$confrim[0]->stu_hMoo.'</div>';
		$html .= '<div style="position:absolute;top:814px;left:665px; width:100%">'.$confrim[0]->stu_hRoad.'</div>';
		$html .= '<div style="position:absolute;top:835px;left:120px;px; width:100%">'.$confrim[0]->stu_hTambon.'</div>';
		$html .= '<div style="position:absolute;top:835px;left:300px;px; width:100%">'.$confrim[0]->stu_hDistrict.'</div>';
		$html .= '<div style="position:absolute;top:835px;left:490px;px; width:100%">'.$confrim[0]->stu_hProvince.'</div>';
		$html .= '<div style="position:absolute;top:835px;left:675px;px; width:100%">'.$confrim[0]->stu_hPostCode.'</div>';
		$html .= '<div style="position:absolute;top:857px;left:190px;px; width:100%">'.$confrim[0]->stu_phone.'</div>';
		$html .= '<div style="position:absolute;top:857px;left:450px;px; width:100%">'.$confrim[0]->stu_email.'</div>';

		$html .= '<div style="position:absolute;top:883px;left:340px; width:100%">'.$confrim[0]->stu_hNumber.'</div>';
		$html .= '<div style="position:absolute;top:883px;left:450px; width:100%">'.$confrim[0]->stu_hMoo.'</div>';
		$html .= '<div style="position:absolute;top:883px;left:520px; width:100%">'.$confrim[0]->stu_hRoad.'</div>';
		$html .= '<div style="position:absolute;top:883px;left:660px; width:100%">'.$confrim[0]->stu_hTambon.'</div>';
		$html .= '<div style="position:absolute;top:905px;left:110px; width:100%">'.$confrim[0]->stu_hDistrict.'</div>';
		$html .= '<div style="position:absolute;top:905px;left:300px; width:100%">'.$confrim[0]->stu_hProvince.'</div>';
		$html .= '<div style="position:absolute;top:905px;left:490px; width:100%">'.$confrim[0]->stu_hPostCode.'</div>';
		$html .= '<div style="position:absolute;top:905px;left:640px; width:100%">'.$confrim[0]->stu_phone.'</div>';
		
		if($confrim[0]->stu_natureRoom == 'บ้านตนเอง'){
		$html .= '<div style="position:absolute;top:935px;left:130px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_natureRoom == 'เช่าอยู่'){
		$html .= '<div style="position:absolute;top:935px;left:227px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_natureRoom == 'อาศัยผู้อื่นอยู่'){
		$html .= '<div style="position:absolute;top:935px;left:300px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_natureRoom == 'บ้านพักราชการ'){
		$html .= '<div style="position:absolute;top:935px;left:405px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_natureRoom == 'วัด'){
		$html .= '<div style="position:absolute;top:935px;left:525px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_natureRoom == 'หอพัก'){
		$html .= '<div style="position:absolute;top:935px;left:570px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}

		$html .= '<div style="position:absolute;top:950px;left:250px; width:100%">'.$confrim[0]->stu_farSchool.'</div>';
		$html .= '<div style="position:absolute;top:950px;left:470px; width:100%">'.$confrim[0]->stu_travel.'</div>';

		$html .= '<div style="position:absolute;top:977px;left:153px; width:100%">'.$confrim[0]->stu_gradLevel.'</div>';
		$html .= '<div style="position:absolute;top:977px;left:260px; width:100%">'.$confrim[0]->stu_schoolfrom.'</div>';
		$html .= '<div style="position:absolute;top:999px;left:230px; width:100%">'.$confrim[0]->stu_schoolTambao.'</div>';
		$html .= '<div style="position:absolute;top:999px;left:450px; width:100%">'.$confrim[0]->stu_schoolDistrict.'</div>';
		$html .= '<div style="position:absolute;top:999px;left:630px; width:100%">'.$confrim[0]->stu_schoolProvince.'</div>';

		if($confrim[0]->stu_usedStudent == 'ไม่เคย'){
		$html .= '<div style="position:absolute;top:1030px;left:487px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if($confrim[0]->stu_usedStudent == 'เคย'){
		$html .= '<div style="position:absolute;top:1030px;left:560px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}
		$html .= '<div style="position:absolute;top:1026px;left:690px; width:100%">'.$confrim[0]->stu_inputLevel.'</div>';

		$html .= '<div style="position:absolute;top:1055px;left:200px; width:100%">'.$confrim[0]->stu_phoneUrgent.'</div>';
		$html .= '<div style="position:absolute;top:1055px;left:550px; width:100%">'.$confrim[0]->stu_phoneFriend.'</div>';

		if($recruit[0]->recruit_regLevel >=4 ){
			$mpdf->SetDocTemplate('uploads/confirm/confirmM4All.pdf',true);
		}else if($recruit[0]->recruit_regLevel <=3 ){
			$mpdf->SetDocTemplate('uploads/confirm/confirmM1All.pdf',true);
		}
		

		$filename = sprintf("%04d",$confrim[0]->stu_iden).'-'.$confrim[0]->stu_prefix.$confrim[0]->stu_fristName.' '.$confrim[0]->stu_lastName;
        $mpdf->WriteHTML($html);
		

		$mpdf->AddPage();	
		$confrimFa = $Conf->where('par_stuID',$id)->where('par_relation',"บิดา")->get('tb_parent')->result();

		if(@$confrimFa[0]->par_decease == '0000-00-00'){
			$par_decease = "";
		}else{
			$par_decease = @$confrimFa[0]->par_decease;
		}
		// exit();
	
		// ดึงข้อมูลพ่อออออออออออออ--------------------
		$html2 = '<div style="position:absolute;top:129px;left:195px; width:100%">'.@$confrimFa[0]->par_prefix.@$confrimFa[0]->par_firstName.' '.@$confrimFa[0]->par_lastName.'</div>';
		$html2 .= '<div style="position:absolute;top:150px;left:275px; width:100%">'.@$confrimFa[0]->par_ago.'</div>';
		$html2 .= '<div style="position:absolute;top:180px;left:197px; width:100%">'.@$confrimFa[0]->par_IdNumber.'</div>';
		$html2 .= '<div style="position:absolute;top:205px;left:197px; width:100%">'.@$confrimFa[0]->par_national.'</div>';
		$html2 .= '<div style="position:absolute;top:230px;left:197px; width:100%">'.@$confrimFa[0]->par_race.'</div>';
		$html2 .= '<div style="position:absolute;top:255px;left:197px; width:100%">'.@$confrimFa[0]->par_religion.'</div>';
		$html2 .= '<div style="position:absolute;top:280px;left:197px; width:100%">'.@$confrimFa[0]->par_career.'</div>';		
		$html2 .= '<div style="position:absolute;top:305px;left:197px; width:100%">'.@$confrimFa[0]->par_education.'</div>';
		$html2 .= '<div style="position:absolute;top:330px;left:197px; width:100%">'.@$confrimFa[0]->par_salary.'</div>';
		$html2 .= '<div style="position:absolute;top:355px;left:197px; width:100%">'.@$confrimFa[0]->par_positionJob.'</div>';
		$html2 .= '<div style="position:absolute;top:380px;left:197px; width:100%">'.@$confrimFa[0]->par_phone.'</div>';
		$html2 .= '<div style="position:absolute;top:405px;left:197px; width:100%">'.$par_decease.'</div>';

		$html2 .= '<div style="position:absolute;top:430px;left:255px; width:100%">'.@$confrimFa[0]->par_hNumber.'</div>';
		$html2 .= '<div style="position:absolute;top:430px;left:335px; width:100%">'.@$confrimFa[0]->par_hMoo.'</div>';
		$html2 .= '<div style="position:absolute;top:452px;left:245px; width:100%">'.@$confrimFa[0]->par_hTambon.'</div>';
		$html2 .= '<div style="position:absolute;top:474px;left:245px; width:100%">'.@$confrimFa[0]->par_hDistrict.'</div>';
		$html2 .= '<div style="position:absolute;top:496px;left:245px; width:100%">'.@$confrimFa[0]->par_hProvince.'</div>';
		$html2 .= '<div style="position:absolute;top:518px;left:280px; width:100%">'.@$confrimFa[0]->par_hPostcode.'</div>';

		$html2 .= '<div style="position:absolute;top:540px;left:255px; width:100%">'.@$confrimFa[0]->par_cNumber.'</div>';
		$html2 .= '<div style="position:absolute;top:540px;left:335px; width:100%">'.@$confrimFa[0]->par_cMoo.'</div>';
		$html2 .= '<div style="position:absolute;top:562px;left:245px; width:100%">'.@$confrimFa[0]->par_cTambon.'</div>';
		$html2 .= '<div style="position:absolute;top:584px;left:245px; width:100%">'.@$confrimFa[0]->par_cDistrict.'</div>';
		$html2 .= '<div style="position:absolute;top:605px;left:245px; width:100%">'.@$confrimFa[0]->par_cProvince.'</div>';
		$html2 .= '<div style="position:absolute;top:628px;left:280px; width:100%">'.@$confrimFa[0]->par_cPostcode.'</div>';

		if(@$confrimFa[0]->par_rest == 'บ้านตนเอง'){
		$html2 .= '<div style="position:absolute;top:655px;left:200px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimFa[0]->par_rest == 'เช่าบ้าน'){
		$html2 .= '<div style="position:absolute;top:680px;left:200px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimFa[0]->par_rest == 'อาศัยผู้อื่น'){
		$html2 .= '<div style="position:absolute;top:705px;left:200px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimFa[0]->par_rest == 'บ้านพักสวัสดิการ'){
		$html2 .= '<div style="position:absolute;top:730px;left:200px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimFa[0]->par_rest == 'อื่นๆ'){
		$html2 .= '<div style="position:absolute;top:755px;left:200px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}

		$html2 .= '<div style="position:absolute;top:750px;left:280px; width:100%">'.@$confrimFa[0]->par_restOrthor.'</div>';

		if(@$confrimFa[0]->par_service == 'กระทรวง'){
		$html2 .= '<div style="position:absolute;top:780px;left:200px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:775px;left:280px; width:100%">'.@$confrimFa[0]->par_serviceName.'</div>';
		}else if(@$confrimFa[0]->par_service == 'กรม'){
		$html2 .= '<div style="position:absolute;top:803px;left:200px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:797px;left:250px; width:100%">'.@$confrimFa[0]->par_serviceName.'</div>';
		}else if(@$confrimFa[0]->par_service == 'กอง'){
		$html2 .= '<div style="position:absolute;top:828px;left:200px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:820px;left:250px; width:100%">'.@$confrimFa[0]->par_serviceName.'</div>';
		}else if(@$confrimFa[0]->par_service == 'ฝ่าย/แผนก'){
		$html2 .= '<div style="position:absolute;top:850px;left:200px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:845px;left:285px; width:100%">'.@$confrimFa[0]->par_serviceName.'</div>';
		}		

		if(@$confrimFa[0]->par_claim == 'เบิกได้'){
		$html2 .= '<div style="position:absolute;top:875px;left:200px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimFa[0]->par_claim == 'เบิกไม่ได้'){
		$html2 .= '<div style="position:absolute;top:875px;left:270px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}


		// ดึงข้อมูลแมมมมมมมมมมมมมมมมม่--------------------
		$confrimMa= $Conf->where('par_stuID',$id)->where('par_relation',"มารดา")->get('tb_parent')->result();

		if(@$confrimMa[0]->par_decease == '0000-00-00'){
			$par_decease_Ma = "";
		}else{
			$par_decease_Ma = @$confrimMa[0]->par_decease;
		}

		$html2 .= '<div style="position:absolute;top:129px;left:400px; width:100%">'.@$confrimMa[0]->par_prefix.@$confrimMa[0]->par_firstName.' '.@$confrimMa[0]->par_lastName.'</div>';
		$html2 .= '<div style="position:absolute;top:150px;left:475px; width:100%">'.@$confrimMa[0]->par_ago.'</div>';
		$html2 .= '<div style="position:absolute;top:180px;left:400px; width:100%">'.@$confrimMa[0]->par_IdNumber.'</div>';
		$html2 .= '<div style="position:absolute;top:205px;left:400px; width:100%">'.@$confrimMa[0]->par_national.'</div>';
		$html2 .= '<div style="position:absolute;top:230px;left:400px; width:100%">'.@$confrimMa[0]->par_race.'</div>';
		$html2 .= '<div style="position:absolute;top:255px;left:400px; width:100%">'.@$confrimMa[0]->par_religion.'</div>';
		$html2 .= '<div style="position:absolute;top:280px;left:400px; width:100%">'.@$confrimMa[0]->par_career.'</div>';		
		$html2 .= '<div style="position:absolute;top:305px;left:400px; width:100%">'.@$confrimMa[0]->par_education.'</div>';
		$html2 .= '<div style="position:absolute;top:330px;left:400px; width:100%">'.@$confrimMa[0]->par_salary.'</div>';
		$html2 .= '<div style="position:absolute;top:355px;left:400px; width:100%">'.@$confrimMa[0]->par_positionJob.'</div>';
		$html2 .= '<div style="position:absolute;top:380px;left:400px; width:100%">'.@$confrimMa[0]->par_phone.'</div>';
		$html2 .= '<div style="position:absolute;top:405px;left:400px; width:100%">'.$par_decease_Ma.'</div>';

		$html2 .= '<div style="position:absolute;top:430px;left:455px; width:100%">'.@$confrimMa[0]->par_hNumber.'</div>';
		$html2 .= '<div style="position:absolute;top:430px;left:530px; width:100%">'.@$confrimMa[0]->par_hMoo.'</div>';
		$html2 .= '<div style="position:absolute;top:452px;left:450px; width:100%">'.@$confrimMa[0]->par_hTambon.'</div>';
		$html2 .= '<div style="position:absolute;top:474px;left:450px; width:100%">'.@$confrimMa[0]->par_hDistrict.'</div>';
		$html2 .= '<div style="position:absolute;top:496px;left:450px; width:100%">'.@$confrimMa[0]->par_hProvince.'</div>';
		$html2 .= '<div style="position:absolute;top:518px;left:480px; width:100%">'.@$confrimMa[0]->par_hPostcode.'</div>';

		$html2 .= '<div style="position:absolute;top:540px;left:455px; width:100%">'.@$confrimMa[0]->par_cNumber.'</div>';
		$html2 .= '<div style="position:absolute;top:540px;left:530px; width:100%">'.@$confrimMa[0]->par_cMoo.'</div>';
		$html2 .= '<div style="position:absolute;top:562px;left:450px; width:100%">'.@$confrimMa[0]->par_cTambon.'</div>';
		$html2 .= '<div style="position:absolute;top:584px;left:450px; width:100%">'.@$confrimMa[0]->par_cDistrict.'</div>';
		$html2 .= '<div style="position:absolute;top:605px;left:450px; width:100%">'.@$confrimMa[0]->par_cProvince.'</div>';
		$html2 .= '<div style="position:absolute;top:628px;left:480px; width:100%">'.@$confrimMa[0]->par_cPostcode.'</div>';

		if(@$confrimMa[0]->par_rest == 'บ้านตนเอง'){
		$html2 .= '<div style="position:absolute;top:655px;left:400px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimMa[0]->par_rest == 'เช่าบ้าน'){
		$html2 .= '<div style="position:absolute;top:680px;left:400px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimMa[0]->par_rest == 'อาศัยผู้อื่น'){
		$html2 .= '<div style="position:absolute;top:705px;left:400px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimMa[0]->par_rest == 'บ้านพักสวัสดิการ'){
		$html2 .= '<div style="position:absolute;top:730px;left:400px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimMa[0]->par_rest == 'อื่นๆ'){
		$html2 .= '<div style="position:absolute;top:755px;left:400px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}

		$html2 .= '<div style="position:absolute;top:750px;left:480px; width:100%">'.@$confrimMa[0]->par_restOrthor.'</div>';

		if(@$confrimMa[0]->par_service == 'กระทรวง'){
		$html2 .= '<div style="position:absolute;top:780px;left:400px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:775px;left:480px; width:100%">'.@$confrimMa[0]->par_serviceName.'</div>';
		}else if(@$confrimMa[0]->par_service == 'กรม'){
		$html2 .= '<div style="position:absolute;top:803px;left:400px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:797px;left:450px; width:100%">'.@$confrimMa[0]->par_serviceName.'</div>';
		}else if(@$confrimMa[0]->par_service == 'กอง'){
		$html2 .= '<div style="position:absolute;top:828px;left:400px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:820px;left:450px; width:100%">'.@$confrimMa[0]->par_serviceName.'</div>';
		}else if(@$confrimMa[0]->par_service == 'ฝ่าย/แผนก'){
		$html2 .= '<div style="position:absolute;top:850px;left:400px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:845px;left:485px; width:100%">'.@$confrimMa[0]->par_serviceName.'</div>';
		}		

		if(@$confrimMa[0]->par_claim == 'เบิกได้'){
		$html2 .= '<div style="position:absolute;top:875px;left:400px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimMa[0]->par_claim == 'เบิกไม่ได้'){
		// $html2 .= '<div style="position:absolute;top:875px;left:470px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}

		// ดึงข้อมูลผู้ปกครอง--------------------
		$confrimPu= $Conf->where('par_stuID',$id)
						->where('par_relationKey',"ผู้ปกครอง")
						->get('tb_parent')->result();

						if(@$confrimPu[0]->par_decease == '0000-00-00'){
							$par_decease_Pu = "";
						}else{
							$par_decease_Pu = @$confrimPu[0]->par_decease;
						}

		$html2 .= '<div style="position:absolute;top:115px;left:600px; width:100%">'.@$confrimPu[0]->par_prefix.@$confrimPu[0]->par_firstName.' '.@$confrimPu[0]->par_lastName.'</div>';
		$html2 .= '<div style="position:absolute;top:133px;left:710px; width:100%">'.@$confrimPu[0]->par_relation.'</div>';
		$html2 .= '<div style="position:absolute;top:155px;left:675px; width:100%">'.@$confrimPu[0]->par_ago.'</div>';
		$html2 .= '<div style="position:absolute;top:177px;left:600px; width:100%">'.@$confrimPu[0]->par_IdNumber.'</div>';
		$html2 .= '<div style="position:absolute;top:205px;left:600px; width:100%">'.@$confrimPu[0]->par_national.'</div>';
		$html2 .= '<div style="position:absolute;top:230px;left:600px; width:100%">'.@$confrimPu[0]->par_race.'</div>';
		$html2 .= '<div style="position:absolute;top:255px;left:600px; width:100%">'.@$confrimPu[0]->par_religion.'</div>';
		$html2 .= '<div style="position:absolute;top:280px;left:600px; width:100%">'.@$confrimPu[0]->par_career.'</div>';		
		$html2 .= '<div style="position:absolute;top:305px;left:600px; width:100%">'.@$confrimPu[0]->par_education.'</div>';
		$html2 .= '<div style="position:absolute;top:330px;left:600px; width:100%">'.@$confrimPu[0]->par_salary.'</div>';
		$html2 .= '<div style="position:absolute;top:355px;left:600px; width:100%">'.@$confrimPu[0]->par_positionJob.'</div>';
		$html2 .= '<div style="position:absolute;top:380px;left:600px; width:100%">'.@$confrimPu[0]->par_phone.'</div>';
		$html2 .= '<div style="position:absolute;top:405px;left:600px; width:100%">'.$par_decease_Pu.'</div>';

		$html2 .= '<div style="position:absolute;top:428px;left:655px; width:100%">'.@$confrimPu[0]->par_hNumber.'</div>';
		$html2 .= '<div style="position:absolute;top:428px;left:730px; width:100%">'.@$confrimPu[0]->par_hMoo.'</div>';
		$html2 .= '<div style="position:absolute;top:450px;left:650px; width:100%">'.@$confrimPu[0]->par_hTambon.'</div>';
		$html2 .= '<div style="position:absolute;top:472px;left:650px; width:100%">'.@$confrimPu[0]->par_hDistrict.'</div>';
		$html2 .= '<div style="position:absolute;top:494px;left:650px; width:100%">'.@$confrimPu[0]->par_hProvince.'</div>';
		$html2 .= '<div style="position:absolute;top:516px;left:680px; width:100%">'.@$confrimPu[0]->par_hPostcode.'</div>';

		$html2 .= '<div style="position:absolute;top:537px;left:655px; width:100%">'.@$confrimPu[0]->par_cNumber.'</div>';
		$html2 .= '<div style="position:absolute;top:537px;left:730px; width:100%">'.@$confrimPu[0]->par_cMoo.'</div>';
		$html2 .= '<div style="position:absolute;top:559px;left:650px; width:100%">'.@$confrimPu[0]->par_cTambon.'</div>';
		$html2 .= '<div style="position:absolute;top:581px;left:650px; width:100%">'.@$confrimPu[0]->par_cDistrict.'</div>';
		$html2 .= '<div style="position:absolute;top:602px;left:650px; width:100%">'.@$confrimPu[0]->par_cProvince.'</div>';
		$html2 .= '<div style="position:absolute;top:625px;left:680px; width:100%">'.@$confrimPu[0]->par_cPostcode.'</div>';

		if(@$confrimPu[0]->par_rest == 'บ้านตนเอง'){
		$html2 .= '<div style="position:absolute;top:655px;left:600px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimPu[0]->par_rest == 'เช่าบ้าน'){
		$html2 .= '<div style="position:absolute;top:680px;left:600px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimPu[0]->par_rest == 'อาศัยผู้อื่น'){
		$html2 .= '<div style="position:absolute;top:705px;left:600px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimPu[0]->par_rest == 'บ้านพักสวัสดิการ'){
		$html2 .= '<div style="position:absolute;top:730px;left:600px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}else if(@$confrimPu[0]->par_rest == 'อื่นๆ'){
		$html2 .= '<div style="position:absolute;top:755px;left:600px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}

		$html2 .= '<div style="position:absolute;top:747px;left:680px; width:100%">'.@$confrimPu[0]->par_restOrthor.'</div>';

		if(@$confrimPu[0]->par_service == 'กระทรวง'){
		$html2 .= '<div style="position:absolute;top:777px;left:600px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:773px;left:680px; width:100%">'.@$confrimPu[0]->par_serviceName.'</div>';
		}else if(@$confrimPu[0]->par_service == 'กรม'){
		$html2 .= '<div style="position:absolute;top:803px;left:600px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:797px;left:650px; width:100%">'.@$confrimPu[0]->par_serviceName.'</div>';
		}else if(@$confrimPu[0]->par_service == 'กอง'){
		$html2 .= '<div style="position:absolute;top:828px;left:600px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:820px;left:650px; width:100%">'.@$confrimPu[0]->par_serviceName.'</div>';
		}else if(@$confrimPu[0]->par_service == 'ฝ่าย/แผนก'){
		$html2 .= '<div style="position:absolute;top:850px;left:600px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		$html2 .= '<div style="position:absolute;top:845px;left:685px; width:100%">'.@$confrimPu[0]->par_serviceName.'</div>';
		}		

		$html2 .= '<div style="position:absolute;top:993px;left:230px; width:100%">'.$date_D.'</div>'; //วัน
		$html2 .= '<div style="position:absolute;top:993px;left:350px; width:100%">'.$TH_Month[$date_M-1].'</div>'; //เดือน
		$html2 .= '<div style="position:absolute;top:993px;left:540px; width:100%">'.$date_Y.'</div>'; //ปี


		$mpdf->WriteHTML($html2);
        $mpdf->Output('Reg_'.$filename.'.pdf','I'); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    
    }

}