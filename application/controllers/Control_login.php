<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_login extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Model_login');
	}

	public function login_main()
	{
		$this->load->view('login/login_main.php');
		
	}

	public function validlogin()
	{
			$username = $this->input->post('username');
			$password = md5(md5($this->input->post('password')));

			//echo $password; exit();

			if($this->Model_login->record_count($username, $password) == 1)
				{
					$result = $this->Model_login->fetch_user_login($username, $password);
					$this->session->set_userdata(array('login_id' => $result->pers_id,'fullname'=> $result->pers_prefix.$result->pers_firstname.' '.$result->pers_lastname,'status'=> 'user','permission_menu' => $result->pers_workother_id ,'user_img' => $result->pers_img));
					$year = $this->db->get('tb_openyear')->row();
					set_cookie('username',$username,'3600'); 
					set_cookie('password',$password,'3600');

					$this->session->set_userdata(array('login_id' => $result->pers_id,'fullname'=> $result->pers_prefix.$result->pers_firstname.' '.$result->pers_lastname,'status'=> 'user','permission_menu' => $result->pers_workother_id,'user_img' => $result->pers_img,'year'=>$year->openyear_year));

					redirect('admin/admission/'.$this->input->post('openyear_year')); 
				}
				else
				{
					redirect('welcome');
					// $this->session->set_flashdata(array('msgerr'=> '<p class="login-box-msg text-center mt-3" style="color:red;" >ชื่อผู้ใช้ หรือ รหัส ไม่ถูกต้อง!</p>'));
					
				}
			}


	public function logout()
	{
		delete_cookie('username'); 
		delete_cookie('password'); 
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function CheckLogin(){
		$dm = date('m-d',strtotime($this->input->post('recruit_birthday')));
		$Y = date('Y',strtotime($this->input->post('recruit_birthday')))-543;
		$brith = $Y.'-'.$dm;
		// $status = $this->recaptcha_google($this->input->post('captcha')); 
        // if ($status['success']) {
			$result = $this->Model_login->Student_Login($this->input->post('recruit_idCard'),$brith);
	
				if (count($result) <= 0 ) {
					$this->session->set_flashdata(array('status' => 'error','msg'=> 'NO','messge' => 'เลขบัตรประชาชนหรือวันเกิดไม่ถูกต้อง หรือ ยังไม่ได้ลงทะเบียนเรียน'));	
					redirect('login');
					}else{	
						$this->session->set_userdata(array('loginStudentID' => $result[0]->recruit_id,'fullname'=> $result[0]->recruit_prefix.$result[0]->recruit_firstName.' '.$result[0]->recruit_lastName));
						//print_r($this->session->userdata()); exit();		
						redirect('StudentHome');
						
					}	
	}

	public function CheckLoginConfirmStudentNew(){

		if($this->input->post('idenStu')){
			$this->db->where('recruit_idCard',$this->input->post('idenStu'));
			$this->db->where('recruit_status',"ผ่านการตรวจสอบ");
			$query = $this->db->get('tb_recruitstudent');
			if($query->num_rows() > 0){
				$this->session->set_userdata('idenStu',$this->input->post('idenStu'));   
				echo 1;
			}else{
				echo 0;
				$this->session->sess_destroy();
			}
		
		}else{
			echo 0;
			$this->session->sess_destroy();
		}
		
	}

	public function Confirmlogout()
	{		
		$this->session->sess_destroy();
		redirect(base_url('Confirm'));
	}

	
	public function CloseSystem(){

		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$this->load->view('AdminssionCloseSystem.php',$data);
	}

}