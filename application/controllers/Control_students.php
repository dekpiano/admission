<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_students extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('datethai');
		$this->load->model('model_admission');
		$this->load->model('Model_login');
		$switch = $this->db->get("tb_onoffsys")->result();
		if($switch[0]->onoff_system == 'off'){
			redirect('CloseSystem');
		}
		
	}

	public function StudentLogin(){
		$data['title'] = 'เข้าสู่ระบบ';
		$data['description'] = 'แก้ไขชื่อผู้สมัครสอบ';
			$this->load->view('layout/header.php',$data);
			$this->load->view('students/students_login.php');
			$this->load->view('layout/footer.php');
	}

    public function CheckLogin(){
		$dm = date('m-d',strtotime($this->input->post('recruit_birthday')));
		$Y = date('Y',strtotime($this->input->post('recruit_birthday')))-543;
		$brith = $Y.'-'.$dm;
	
		
		// $status = $this->recaptcha_google($this->input->post('captcha')); 
        // if ($status['success']) {
			$result = $this->Model_login->Student_Login($this->input->post('recruit_idCard'),$brith);
			$this->session->set_userdata(array('loginStudentID' => $result->recruit_id,'fullname'=> $result->recruit_prefix.$result->recruit_firstName.' '.$result->recruit_lastName));
	
				if (count($result) <= 0 ) {
					$this->session->set_flashdata(array('alert1' => 'success','msg'=> 'NO','messge' => 'ไม่มีข้อมูลในระบบ หรือ ยังไม่ได้ลงทะเบียนเรียน'));	
					redirect('StudentLogin');
					}else{			
						redirect('StudentHome');
						
					}	
        

	}

	public function StudentsHome(){
		$data['title'] = 'หน้าแรก';
		$data['description'] = 'ตรวจสอบและแก้ไขการสมัคร';
		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/navber_students.php');
		$this->load->view('students/students_home.php');
		$this->load->view('layout/footer_students.php');
	}

	public function StudentsData(){
		$data['title'] = 'ข้อมูลการสมัคร';
		$data['description'] = 'ตรวจสอบและแก้ไขการสมัคร';
		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/navber_students.php');
		$this->load->view('students/students_data.php');
		$this->load->view('layout/footer_students.php');
	}


}