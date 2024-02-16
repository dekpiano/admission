<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_login extends CI_Controller {
	private $GoogleButton = "";

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Model_login');

		$path = ((dirname(dirname(dirname(dirname((dirname(__FILE__))))))));
		require $path . '/librarie_skj/google_sheet/vendor/autoload.php';

        $redirect_uri = base_url('loginGoogle');
        
        $this->googleClient = new Google_Client();
        $this->googleClient->setClientId('112583025699-4qiv5d413kebk4s53cc1450fopts7n3m.apps.googleusercontent.com');
		$this->googleClient->setClientSecret('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');
        $this->googleClient->setRedirectUri($redirect_uri);
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');

        $this->GoogleButton = '<a href="'.$this->googleClient->createAuthUrl().'" class="btn btn-primary me-3 w-auto"><i class="fa fa-google-plus-official" aria-hidden="true"></i> Login by Google </a>';
	}

	public function login_main()
	{
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$data['GoogleButton'] = $this->GoogleButton;
		$this->load->view('login/login_admin.php',$data);
		
	}

	public function login_admin()
	{

		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$year = $this->db->get('tb_openyear')->row();
		
		if (isset($_GET['code'])) {
			$token =  $this->googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
			 $this->googleClient->setAccessToken($token);
	
			$google_oauth = new Google_Service_Oauth2($this->googleClient);
			$google_account_info = $google_oauth->userinfo->get();

			$DBpers = $this->load->database('skjpers', TRUE);
			$result = $DBpers->where('pers_username',$google_account_info->email)->get('tb_personnel')->row();
			$this->session->set_userdata(array('login_id' => $result->pers_id,'fullname'=> $result->pers_prefix.$result->pers_firstname.' '.$result->pers_lastname,'status'=> 'user','permission_menu' => $result->pers_workother_id ,'user_img' => $result->pers_img,'year'=>$year->openyear_year));
			// Here you can store the user information in your database
			// $google_account_info->email, $google_account_info->name
			
			// Redirect to the profile page or wherever you want
			redirect('admin/Recruitment/'.$data['checkYear'][0]->openyear_year);
		} else {
			// If we don't have an authorization code then get one
			$auth_url =  $this->googleClient->createAuthUrl();
			header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
			exit();
		}

		//$this->load->view('login/login_admin.php',$data);
		
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

					redirect('admin/Recruitment/'.$this->input->post('openyear_year')); 
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
			$this->db->where('recruit_phone',$this->input->post('recruit_phone'));
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

}