<?php
error_reporting(0);
ini_set('display_errors', 0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admission extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('timeago');
		$this->load->model('model_admission');
		$switch = $this->db->get("tb_onoffsys")->result();
		// if($switch[0]->onoff_system == 'off' || $switch[0]->onoff_regis == 'off'){
		// 	redirect('welcome');
		// }
		
	}
	

	public function dataAll()
	{		
		$data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
	
		return $data;
	}

	public function index()
	{
		$data = $this->dataAll();
		$data['title'] = "รับสมัครนักเรียนปีการศึกษา 2563";
		$data['description'] = "รับสมัครนักเรียนวันนี้ จนถึง 25 พฤษภาคม 2563";
		
		$data['m1'] = $this->db->select('recruit_id,recruit_regLevel,recruit_status,recruit_tpyeRoom,recruit_prefix,recruit_firstName,recruit_lastName')
		->where('recruit_regLevel','1')
		->get('tb_recruitstudent')->num_rows();
		$data['m4'] = $this->db->select('recruit_id,recruit_regLevel,recruit_status,recruit_tpyeRoom,recruit_prefix,recruit_firstName,recruit_lastName')
		->where('recruit_regLevel','4')
		->get('tb_recruitstudent')->num_rows();

		
		
		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/navber.php');
		$this->load->view('page_main.php');
		$this->load->view('layout/footer.php');
	}



	public function reg_student($id,$quota = null)
	{
		//redirect('CloseStudent'); 
		$data = $this->dataAll();
		$data['title'] = "หน้าสมัครเรียนออนไลน์";
		$data['description'] = "แบบฟอร์กรอกข้อมูลสำหรับนักเรียน";
		$data['banner'] = base_url()."asset/img/banner-admission64.png";
		$data['url'] = "welcome";
		$data['TypeQuota'] = $this->db->where('quota_key',$quota)->get("tb_quota")->result();

		$CheckQuota = $this->db->select('quota_course')->where('quota_key',$quota)->get("tb_quota")->result();
		$SubQuota = explode('|',$CheckQuota[0]->quota_course);
		
		$data['Course'] = array();
		foreach ($SubQuota as $key => $v_SubQuota) {
			if($id <= 3){
			$SelCourse = $this->db->select('*')
			->where('course_gradelevel','ม.ต้น')
			->where('course_id',$v_SubQuota)
			->get("tb_course")->row();
			}else{
				$SelCourse = $this->db->select('*')
				->where('course_gradelevel','ม.ปลาย')
				->where('course_id',$v_SubQuota)
				->get("tb_course")->row();
			}

			if($SelCourse){
				$data['Course'][] = $SelCourse;
			}
		}

		//echo '<pre>';print_r($data['Course']); exit();
		
		if ($id > 0) {
			$this->load->view('layout/header.php',$data);
			$this->load->view('AdminssionRegister.php');
			$this->load->view('layout/footer.php');
		}		
	}

	function NumberID(){
		$openyear = $this->db->select('openyear_year')->get('tb_openyear')->row();
		$chk_id = $this->db->select('recruit_id')->order_by('recruit_id','DESC')->get('tb_recruitstudent')->row();
		
		if($chk_id == ""){
			$year =  $openyear->openyear_year;
			return $year."0001"; 
		}else{
			$year =  explode($chk_id->recruit_id,$openyear->openyear_year);
			$number =  explode($openyear->openyear_year,$chk_id->recruit_id);
			$s = sprintf("%04d",$number[1]+1);
			return $year[0].$s;
		}
	}

	public function CheckStudentRegister(){
		$data = $this->dataAll();

		$dchk_stu = $this->db->where('recruit_idCard',$this->input->post('Idcard'))
		->where('recruit_year',$data['checkYear'][0]->openyear_year)
		->get('tb_recruitstudent')->result();

		echo count($dchk_stu);
	}


		public function reg_insert()
		{
			$data = $this->dataAll();
	
			//รับรอบปกติ
			if ($this->input->post('recruit_category') == "normal") {
				$SelImpo = implode('|', $this->input->post('recruit_majorOrder'));
				$CheckCourse = $this->db->select('course_fullname,course_branch')->where('course_id', $this->input->post('recruit_majorOrder')[0])->get('tb_course')->Row();
				$Course_fullname = $CheckCourse->course_fullname;
				$Course_branch = $CheckCourse->course_branch;
			} else {
				$SelImpo = "";
				$Course_fullname = $this->input->post('recruit_tpyeRoom');
				$Course_branch = $this->input->post('recruit_major');
			}
	
			// hCaptcha verification
			$hcaptchaResponse = $this->input->post('h-captcha-response');
			$secretKey = 'ES_47c9a8452c844bf6b5bf834237aacb8d'; // Replace with your actual secret key
			$url = 'https://hcaptcha.com/siteverify';
			$verify_data = ['secret' => $secretKey, 'response' => $hcaptchaResponse];
	
			$options = [
			    'http' => [
			        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			        'method'  => 'POST',
			        'content' => http_build_query($verify_data),
			    ],
			];
			$context  = stream_context_create($options);
			$response = file_get_contents($url, false, $context);
			$responseData = json_decode($response);
	
			if ($responseData && $responseData->success) {
				$openyear = $this->db->get('tb_openyear')->result();
	
				$chk_stu = $this->db->where('recruit_idCard', $this->input->post('recruit_idCard'))
					->where('recruit_year', $data['checkYear'][0]->openyear_year)
					->get('tb_recruitstudent')->result();
	
				if (count($chk_stu) > 0) {
					$this->session->set_flashdata(array('msg' => 'NO', 'messge' => 'คุณได้ลงทะเบียนแล้ว กรุณาตรวจสอบการสมัครปีการศึกษานี้แล้ว', 'status' => 'error'));
					redirect('welcome');
				} else {
					// ============== 1. Prepare Data and Filenames First ==============
					$fileName = '';
					if ($this->input->post('recruit_img')) {
						$fileName = $openyear[0]->openyear_year . '-' . $this->input->post('recruit_idCard') . '-' . uniqid() . '.png';
					}
	
					$recruit_birthday = ($this->input->post('recruit_birthdayY') - 543) . '-' . $this->input->post('recruit_birthdayM') . '-' . $this->input->post('recruit_birthdayD');
	
					$data_insert = array(
						'recruit_id'  => $this->NumberID(),
						'recruit_year' => $data['checkYear'][0]->openyear_year,
						'recruit_regLevel' => $this->input->post('recruit_regLevel'),
						'recruit_prefix' => $this->input->post('recruit_prefix'),
						'recruit_firstName' => $this->input->post('recruit_firstName'),
						'recruit_lastName' => $this->input->post('recruit_lastName'),
						'recruit_idCard' => $this->input->post('recruit_idCard'),
						'recruit_birthday' => $recruit_birthday,
						'recruit_race' => $this->input->post('recruit_race'),
						'recruit_nationality' => $this->input->post('recruit_nationality'),
						'recruit_religion' => $this->input->post('recruit_religion'),
						'recruit_phone' => $this->input->post('recruit_phone'),
						'recruit_homeNumber' => $this->input->post('recruit_homeNumber'),
						'recruit_homeGroup' => $this->input->post('recruit_homeGroup'),
						'recruit_homeRoad' => $this->input->post('recruit_homeRoad'),
						'recruit_homeSubdistrict' => $this->input->post('recruit_homeSubdistrict'),
						'recruit_homedistrict' => $this->input->post('recruit_homedistrict'),
						'recruit_homeProvince' => $this->input->post('recruit_homeProvince'),
						'recruit_homePostcode' => $this->input->post('recruit_homePostcode'),
						'recruit_oldSchool' => $this->input->post('recruit_oldSchool'),
						'recruit_district' => $this->input->post('recruit_district'),
						'recruit_province' => $this->input->post('recruit_province'),
						'recruit_grade' => $this->input->post('recruit_grade'),
						'recruit_category' => $this->input->post('recruit_category'),
						'recruit_tpyeRoom' => $Course_fullname,
						'recruit_major' => $Course_branch,
						'recruit_majorOrder' => $SelImpo,
						'recruit_agegroup' => $this->input->post('recruit_agegroup') ? $this->input->post('recruit_agegroup') : 0,
						'recruit_img' => $fileName,
						'recruit_status' => "รอการตรวจสอบ",
						'recruit_date'	=> date('Y-m-d H:i:s'),
						'recruit_dateUpdate' => date('Y-m-d H:i:s'),
						// Add default values for NOT NULL fields to prevent SQL errors
						'recruit_address' => '',
						'recruit_copyAddress' => '',
						'recruit_statusSurrender' => 'Normal',
						'recruit_StatusQuiz' => 'รอเข้าสอบ'
					);
	
					// ============== 2. Start Transaction and Attempt Insert ==============
					$this->db->trans_begin();
					$student_id = $this->model_admission->student_insert($data_insert);
	
					if ($this->db->trans_status() === FALSE || $student_id === false) {
						// FAIL: Rollback and redirect with error
						$this->db->trans_rollback();
						$this->session->set_flashdata(array('msg' => 'NO', 'messge' => 'ไม่สามารถบันทึกข้อมูลได้! กรุณาตรวจสอบข้อมูลและลองใหม่อีกครั้ง', 'status' => 'error'));
						redirect('welcome');
					} else {
						// SUCCESS: Commit transaction and save files
						$this->db->trans_commit();
	
						// --- Save Profile Image ---
						if ($fileName !== '') {
							$image = $this->input->post('recruit_img');
							$imageData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $image));
							$path = 'uploads/recruitstudent/m' . $this->input->post('recruit_regLevel') . '/img/';
							file_put_contents($path . $fileName, $imageData);
						}
	
						// --- Save Other Uploaded Files ---
						$this->load->library('upload');
						$this->load->library('image_lib');
						$update_data = [];
	
						// Certificate of Ability
						if (isset($_FILES['recruit_certificateAbility']) && $_FILES['recruit_certificateAbility']['error'][0] == 0) {
							$update_data['recruit_certificateAbility'] = $this->UploadCertificateAbility();
						}
	
						// Other documents
						$file_fields = ['recruit_certificateEdu', 'recruit_certificateEduB', 'recruit_copyidCard', 'recruit_copyAddress'];
						$folder_map = [
	                        'recruit_certificateEdu' => 'certificate',
	                        'recruit_certificateEduB' => 'certificateB',
	                        'recruit_copyidCard' => 'copyidCard',
	                        'recruit_copyAddress' => 'copyAddress'
	                    ];
	
						foreach ($file_fields as $field) {
							if (isset($_FILES[$field]) && $_FILES[$field]['error'] == 0) {
								$foder = $folder_map[$field];
								$path = 'uploads/recruitstudent/m' . $this->input->post('recruit_regLevel') . '/' . $foder . '/';
								$config['upload_path'] = $path;
								$config['allowed_types'] = 'jpg|jpeg|png|pdf';
	                            $config['encrypt_name'] = TRUE;
								$this->upload->initialize($config);
	
								if ($this->upload->do_upload($field)) {
									$upload_data = $this->upload->data();
									$update_data[$field] = $upload_data['file_name'];
								} else {
	                                // You can log the error if you want: $this->upload->display_errors();
	                            }
							}
						}
	
	                    // Update database with filenames
						if (!empty($update_data)) {
							$this->model_admission->student_update($student_id, $update_data);
						}
	
						$this->session->set_flashdata(array('msg' => 'Yes', 'messge' => 'สมัครเรียนสำเร็จ สามารถตรวจสอบสถานะการสมัครเพื่อพิมพ์ใบสมัครได้', 'status' => 'success'));
						redirect('welcome');
					}
				}
			} else {
				// hCaptcha failed
				$this->session->set_flashdata(array('msg' => 'NO', 'messge' => 'Captcha ไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง', 'status' => 'error'));
				redirect('welcome');
			}
		}
	public function reg_img($foder,$do_upload,$imageFileType,$rand_name,$data_insert)
	{
		
		 $config['upload_path']   = 'uploads/recruitstudent/m'.$this->input->post('recruit_regLevel').'/'.$foder.'/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
         $config['allowed_types'] = '*'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
         $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_width']     = 0; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['max_height']    = 0;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
         $config['file_name']  = $rand_name.'.'.$imageFileType; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload($do_upload))
			{
				$uploadedImage = $this->upload->data();
				$imgdata=exif_read_data($this->upload->upload_path.$this->upload->file_name, 'IFD0');
				$source_path = './uploads/recruitstudent/m'.$this->input->post('recruit_regLevel').'/'.$foder.'/'.$uploadedImage['file_name'];
				$img_target = './uploads/recruitstudent1/'.$uploadedImage['file_name'];
				$config1['image_library'] = 'GD2';
				$config1['source_image'] = $uploadedImage['full_path'];
				$config1['quality'] = '100%';
				$config1['maintain_ratio'] = TRUE;
				$config1['width']         = 600;
				$config1['height']       = 800;				
				

				$this->load->library('image_lib');
				$this->image_lib->initialize($config1);
				 if ( ! $this->image_lib->resize())
				{
						echo $this->image_lib->display_errors();
				}else{
					$this->image_lib->clear();
					$config=array();

                $config['image_library'] = 'gd2';
                $config['source_image'] = $uploadedImage['full_path'];


                switch($imgdata['Orientation']) {
                    case 3:
                        $config['rotation_angle']='180';
                        break;
                    case 6:
                        $config['rotation_angle']='270';
                        break;
                    case 8:
                        $config['rotation_angle']='90';
                        break;
                }

                $this->image_lib->initialize($config); 
                $this->image_lib->rotate();
			}
				
				// print_r($uploadedImage);
				// exit();
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error['error']);
				
			}
	}

	public function UploadCertificateAbility(){
		$count = count($_FILES['recruit_certificateAbility']['name']);		
		$files = $_FILES;
		$SetName = array();

		
		for ($i = 0; $i < $count; $i++) {			

				$_FILES['recruit_certificateAbility']['name'] = $files['recruit_certificateAbility']['name'][$i];
				$_FILES['recruit_certificateAbility']['type'] = $files['recruit_certificateAbility']['type'][$i];
				$_FILES['recruit_certificateAbility']['tmp_name'] = $files['recruit_certificateAbility']['tmp_name'][$i];
				$_FILES['recruit_certificateAbility']['error'] = $files['recruit_certificateAbility']['error'][$i];
				$_FILES['recruit_certificateAbility']['size'] = $files['recruit_certificateAbility']['size'][$i];
			if($_FILES['recruit_certificateAbility']['error'] == 0){

				$config['upload_path'] = 'uploads/recruitstudent/m'.$this->input->post('recruit_regLevel').'/certificateAbility/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['encrypt_name'] = TRUE; // ใช้เพื่อเปลี่ยนชื่อไฟล์โดยอัตโนมัติเพื่อความปลอดภัย
		
				$this->upload->initialize($config);
		
				if ($this->upload->do_upload('recruit_certificateAbility')) {
					$data = $this->upload->data();
		
					// Resize image
					$resize_config['image_library'] = 'gd2';
					$resize_config['source_image'] = $data['full_path'];
					$resize_config['maintain_ratio'] = TRUE;
					$resize_config['width'] = 1024;
		
					$this->image_lib->clear();
					$this->image_lib->initialize($resize_config);
					$this->image_lib->resize();
		
					$SetName[] = $data['file_name'];
				} else {
					echo $this->upload->display_errors();
				}
			}
		}	
		$result = !empty($SetName) ? implode('|', $SetName) : 0;

		return $result;
	}

	
	public function checkdata_student()
	{	
		$data = $this->dataAll();
		$data['title'] = 'ตรวจสอบและแก้ไขการสมัคร';
		$data['description'] = 'ตรวจสอบและแก้ไขการสมัคร';
		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/navber.php');
		$this->load->view('stu_checkdata.php');
		$this->load->view('layout/footer.php');
	}

	public function data_user()
	{
		
		$data = $this->dataAll();
		$data['title'] = 'แก้ไขชื่อผู้สมัครสอบ';
		$data['description'] = 'แก้ไขชื่อผู้สมัครสอบ';
		
		$status = $this->recaptcha_google($this->input->post('captcha')); 
        if ($status['success']) {
			
			
			$data['chk_stu'] = $this->db->where('recruit_idCard',$this->input->post('search_stu'))->get('tb_recruitstudent')->result();
				if (count($data['chk_stu']) <= 0 ) {
					$this->session->set_flashdata(array('alert1' => 'success','msg'=> 'NO','messge' => 'ไม่มีข้อมูลในระบบ หรือ ยังไม่ได้ลงทะเบียนเรียน'));	
					redirect('StudentLogin');
					}else{			
						$this->session->set_userdata(array('IDstudent'=>$data['chk_stu'][0]->recruit_id));			
						redirect('StudentData');
					}	
        }else{
			// $this->session->set_flashdata(array('alert1' => 'warning','msg'=> 'NO','messge' => 'ยืนยันฉันไม่ใช่โปรแกรมอัตโนมัติ'));	
			redirect('StudentLogin');
        }
	}


	
	function notify_message($message,$token){
		$queryData = array('message' => $message);
		$queryData = http_build_query($queryData,'','&');
		$headerOptions = array( 
				'http'=>array(
					'method'=>'POST',
					'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
							."Authorization: Bearer ".$token."\r\n"
							."Content-Length: ".strlen($queryData)."\r\n",
					'content' => $queryData
				),
		);
		$context = stream_context_create($headerOptions);
		$result = file_get_contents(LINE_API,FALSE,$context);
		$res = json_decode($result);
		return $res;
		}

	public function print_student()
	{
		
		$data = $this->dataAll();
		$data['title'] = 'ประกาศรายชื่อผู้สมัครสอบ';
		$data['description'] = 'ประกาศรายชื่อผู้สมัครสอบ';
		
		$data['m1'] = $this->db->select('recruit_id,recruit_regLevel,recruit_status,recruit_tpyeRoom,recruit_prefix,recruit_firstName,recruit_lastName')
		->where('recruit_regLevel','1')
		->get('tb_recruitstudent')->result();
		$data['m4'] = $this->db->select('recruit_id,recruit_regLevel,recruit_status,recruit_tpyeRoom,recruit_prefix,recruit_firstName,recruit_lastName')
		->where('recruit_regLevel','4')
		->get('tb_recruitstudent')->result();

		$this->load->view('layout/header.php',$data);
		$this->load->view('layout/navber.php');
		$this->load->view('stu_announce.php');
		$this->load->view('layout/footer.php');	
	}
	

	

	public function check_print()
	{
		$id = $this->input->post('id');
		$d = $this->input->post('recruit_birthdayD');
		$m = $this->input->post('recruit_birthdayM');
		$y = $this->input->post('recruit_birthdayY')-543;
		$date = $y.'-'.$m.'-'.$d;

		$where_d = array('recruit_birthday' => $date, 'recruit_id' => $id);
		$check = $this->db->select('recruit_birthday,recruit_id')->where($where_d)->get('tb_recruitstudent')->num_rows();
		if($check > 0){
			$data = $this->db->select('recruit_birthday,recruit_id')->where($where_d)->get('tb_recruitstudent')->result();
			echo base_url('control_admission/pdf/'.$data[0]->recruit_id);
		}else{
			echo $check;
		}
		
		
	}

	public function SchoolList(){
		// POST data
		$postData = $this->input->post();
	
		// Get data
		$data = $this->model_admission->getSchool($postData);
	
		echo json_encode($data);
	  }

	  public function CheckOnOffRegis(){

		$data = $this->db->select('onoff_regis,onoff_datetime_regis_close,onoff_datetime_regis_open')->where('onoff_id',1)->get('tb_onoffsys')->row();
		header('Content-Type: application/json');
		echo json_encode($data);
		}
}