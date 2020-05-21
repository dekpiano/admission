<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_login extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Model_login');
	}

	public static $title = "เข้าสู่ระบบ";
	public static $description = "ระบบ Login โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";
 	
 	public function dataAll(){
		$data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 		$data['title'] = self::$title;
		$data['description'] = self::$description;
 		$data['lear'] =	$this->db->get('tb_learning')->result(); //กลุ่มสาระ
		$data['about'] = $this->db->get('tb_aboutschool')->result(); //เกี่ย่วกับโรงเรียน
		$data['Allabout'] = $this->db->get('tb_aboutschool')->result(); //เกี่ย่วกับโรงเรียน
		$data['banner'] =	$this->db->get('tb_banner')->result(); //ประชาสัมพันธ์

		return $data;
 	}

	public function Login_main()
	{
		if(!empty(get_cookie('username')) && !empty(get_cookie('password')) ){
			$username = get_cookie('username');
			$password = get_cookie('password');
			if($this->Model_login->record_count($username, $password) == 1)
				{
					$result = $this->Model_login->fetch_user_login($username, $password);
					$this->session->set_userdata(array('login_id' => $result->pers_id,'fullname'=> $result->pers_prefix.$result->pers_firstname.' '.$result->pers_lastname,'status'=> 'user','permission_menu' => $result->pers_workother_id ,'user_img' => $result->pers_img));

					set_cookie('username',$username,'3600'); 
					set_cookie('password',$password,'3600');
					 redirect('admin');
				}
		}else{
			$data = $this->dataAll();

		$this->load->view('user/layout/header.php',$data);
		$this->load->view('login/login_main.php');
		$this->load->view('user/layout/footer.php');
		}
		

		
	}

	public function validlogin()
	{
		
		if ($this->input->post('username') == 'admin') {

			$username = $this->input->post('username');
			$password = md5(md5($this->input->post('password')));
			
			if($this->input->server('REQUEST_METHOD') == TRUE){
				if($this->Model_login->record_count_admin($username, $password) == 1)
				{
					$result = $this->Model_login->fetch_user_login_admin($username, $password);

					$this->session->set_userdata(array('login_id' => $result->admin_id,'fullname'=> $result->admin_fullname,'status'=> 'admin'));
					 redirect('admin');
				}
				else
				{
					$this->session->set_flashdata(array('msgerr'=> '<p class="login-box-msg text-center mt-3" style="color:red;" >ชื่อผู้ใช้ หรือ รหัส ไม่ถูกต้อง!</p>'));
					$data = $this->dataAll();
					$this->load->view('user/layout/header.php',$data);
					$this->load->view('login/login_main.php');
					$this->load->view('user/layout/footer.php');
				}
			}

		}else{
			$username = $this->input->post('username');
			$password = md5(md5($this->input->post('password')));

			if($this->input->server('REQUEST_METHOD') == TRUE){
				if($this->Model_login->record_count($username, $password) == 1)
				{
					$result = $this->Model_login->fetch_user_login($username, $password);
					$this->session->set_userdata(array('login_id' => $result->pers_id,'fullname'=> $result->pers_prefix.$result->pers_firstname.' '.$result->pers_lastname,'status'=> 'user','permission_menu' => $result->pers_workother_id ,'user_img' => $result->pers_img));

					set_cookie('username',$username,'3600'); 
					set_cookie('password',$password,'3600');

					$this->session->set_userdata(array('login_id' => $result->pers_id,'fullname'=> $result->pers_prefix.$result->pers_firstname.' '.$result->pers_lastname,'status'=> 'user','permission_menu' => $result->pers_workother_id,'user_img' => $result->pers_img));

					 redirect('admin');
				}
				else
				{
					$this->session->set_flashdata(array('msgerr'=> '<p class="login-box-msg text-center mt-3" style="color:red;" >ชื่อผู้ใช้ หรือ รหัส ไม่ถูกต้อง!</p>'));
					$data = $this->dataAll();
					$this->load->view('user/layout/header.php',$data);
					$this->load->view('login/login_main.php');
					$this->load->view('user/layout/footer.php');
				}
			}
		}
		
	}



	public function logout()
	{
		delete_cookie('username'); 
		delete_cookie('password'); 
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}

}