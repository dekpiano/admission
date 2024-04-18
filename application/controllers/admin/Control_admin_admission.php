<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_admission extends CI_Controller {
	
	var  $title = "การรับสมัคร";
	
	public function __construct() {
		parent::__construct();
		$this->load->model('model_admission');
		$this->load->model('admin/admin_model_admission');
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
	}

	// public function report_student($year)
	// {		
	// 	$data['switch'] = $this->db->get("tb_onoffsys")->result();
	// 	$chart_re1 = $this->db->select('COUNT(recruit_regLevel) AS C_count,
	// 	tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
	// 	tb_recruitstudent.recruit_tpyeRoom')
	// 			->from('tb_recruitstudent')
	// 			->where('recruit_year',$year)
	// 			->where('recruit_regLevel',1)
	// 			->group_by('recruit_tpyeRoom')
	// 			->order_by('recruit_tpyeRoom','DESC')
	// 			->get()->result();
	// 		$chart_re4 = $this->db->select('COUNT(recruit_regLevel) AS C_count,
	// 				tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
	// 				tb_recruitstudent.recruit_tpyeRoom')
	// 			->from('tb_recruitstudent')
	// 			->where('recruit_year',$year)
	// 			->where('recruit_regLevel',4)
	// 			->group_by('recruit_tpyeRoom')

	// 			->order_by('recruit_tpyeRoom','DESC')
	// 			->get()->result();
	// 		$chart_All = $this->db->select('COUNT(recruit_regLevel) AS C_count,
	// 				tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year ,
	// 				tb_recruitstudent.recruit_tpyeRoom')
	// 			->from('tb_recruitstudent')
	// 			->where('recruit_year',$year)
	// 			->group_by('recruit_tpyeRoom')					
	// 			->order_by('recruit_tpyeRoom','DESC')
	// 			->get()->result();
	// 		$data['chart_1'] = json_encode(array_column($chart_re1,'C_count'));	
	// 		$data['chart_4'] = json_encode(array_column($chart_re4,'C_count'));
	// 		$data['chart_All'] = json_encode(array_column($chart_All,'C_count'));
			
	// 		return $data;
	// }
	

	public function index($year)
	{	
	
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data = $this->report_student($year);
		$data['title'] = $this->title;		
		// $this->db->select('*');
		// $this->db->from('tb_recruitstudent');
		// $this->db->where('recruit_year',$year);
		// $this->db->order_by('recruit_id','DESC');
		// $data['recruit'] =	$this->db->get()->result();

		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();

			
			$this->load->view('admin/layout/navber_admin.php',$data);
			$this->load->view('admin/layout/menu_top_admin.php');
			$this->load->view('admin/admin_admission_main.php');
			$this->load->view('admin/layout/footer_admin.php');
	}

	public function DataRecruitment(){
		$data = [];
		$this->db->select('*');
		$this->db->from('tb_recruitstudent');
		$this->db->where('recruit_year',$this->input->post('keyYear'));
		$this->db->order_by('recruit_id','DESC');
		$recruit =	$this->db->get()->result();

		foreach($recruit as $record){
            
			$Sub = explode('|',$record->recruit_majorOrder);
			$recruit_tpyeRoom = $this->db->select('course_initials')->where('course_id',$Sub[0])->get('tb_course')->row();
			if($recruit_tpyeRoom){
				$tpyeRoom = $recruit_tpyeRoom->course_initials;				
			}else{
				$tpyeRoom = $record->recruit_tpyeRoom;
			}

            $data[] = array( 
                "recruit_id" => $record->recruit_id,
                "recruit_regLevel" => $record->recruit_regLevel,
				"recruit_img" => $record->recruit_img,
                "recruit_Fullname" => $record->recruit_prefix.$record->recruit_firstName.' '.$record->recruit_lastName,
                "recruit_tpyeRoom" => $tpyeRoom,
                "recruit_category" => $record->recruit_category,
                "recruit_status" => $record->recruit_status,
                "recruit_date" => $record->recruit_date,
                "recruit_idCard" => $record->recruit_idCard,
				"recruit_birthday" => $record->recruit_birthday,
				"recruit_phone" => $record->recruit_phone,
				"recruit_oldSchool" => $record->recruit_oldSchool,
				"recruit_certificateAbility" => $record->recruit_certificateAbility
            );
			
           
        }   
        $output = array(
            "data" =>  $data
        );
       echo json_encode($output);
	}

	public function switch_regis()
	{
		if($this->input->post('mode') == 'true'){
			$data = array('onoff_regis' => 'on', 'onoff_datetime_regis' => date('Y-m-d H:i:s'),'onoff_user_regis' => $this->session->userdata('login_id'),'onoff_comment'=> "");
			$this->db->update('tb_onoffsys',$data,"onoff_id='1'");
			echo "เปิด";
		}else{
			$data = array('onoff_regis' => 'off','onoff_datetime_regis' => date('Y-m-d H:i:s'),'onoff_user_regis' => $this->session->userdata('login_id'),'onoff_comment' => $this->input->post('onoff_comment'));
			$this->db->update('tb_onoffsys',$data,"onoff_id='1'");
			echo "ปิด";
		}
	}

	public function switch_system()
	{
		if($this->input->post('mode') == 'true'){
			$data = array('onoff_system' => 'on', 'onoff_datetime_system' => date('Y-m-d H:i:s'),'onoff_user_system' => $this->session->userdata('login_id'));
			$this->db->update('tb_onoffsys',$data,"onoff_id='1'");
			echo "เปิด";
		}else{
			$data = array('onoff_system' => 'off','onoff_datetime_system' => date('Y-m-d H:i:s'),'onoff_user_system' => $this->session->userdata('login_id'));
			$this->db->update('tb_onoffsys',$data,"onoff_id='1'");
			echo "ปิด";
		}
	}

	public function switch_report()
	{
		if($this->input->post('mode') == 'true'){
			$data = array('onoff_report' => 'on','onoff_user_report' => $this->session->userdata('login_id'));
			$this->db->update('tb_onoffsys',$data,"onoff_id='1'");
			echo "เปิด";
		}else{
			$data = array('onoff_report' => 'off','onoff_user_report' => $this->session->userdata('login_id'));
			$this->db->update('tb_onoffsys',$data,"onoff_id='1'");
			echo "ปิด";
		}
	}

	public function quotaType()
	{
		if($this->input->post('mode') == 'true'){
			$data = array('quota_status' => 'on');
			$this->db->update('tb_quota',$data,"quota_id='".$this->input->post('ID')."'");
			echo "เปิด";
		}else{
			$data = array('quota_status' => 'off');
			$this->db->update('tb_quota',$data,"quota_id='".$this->input->post('ID')."'");
			echo "ปิด";
		}
	}

	public function SelectThailand(){
		$th = $this->load->database('thailandpa', TRUE);

		if($this->input->post('id',TRUE) && $this->input->post('func') === 'province'){
			$amphur = $th->where('PROVINCE_ID',$this->input->post('id'))->get('amphur')->result(); 
			echo '<option value="">กรุณาเลือกอำเภอ</option>';
			foreach ($amphur as $key => $value) {
				echo '<option value="'.$value->AMPHUR_ID.'">'.$value->AMPHUR_NAME.'</option>';
			}
		}

		if($this->input->post('id',TRUE) && $this->input->post('func') === 'amphur'){
			$district = $th->where('AMPHUR_ID',$this->input->post('id'))->get('district')->result(); 
			echo '<option value="">กรุณาเลือกตำบล</option>';
			foreach ($district as $key => $value) {
				echo '<option value="'.$value->DISTRICT_ID.'">'.$value->DISTRICT_NAME.'</option>';
			}
		}

		if($this->input->post('id',TRUE) && $this->input->post('func') === 'postcode'){
			$district = $th->where('AMPHUR_ID',$this->input->post('id'))->get('amphur')->result(); 		
			echo $district[0]->POSTCODE;
		}
		
	}



	public function switch_year()
	{	
		$data = array('openyear_year' => $this->input->post('mode'),'openyear_userid' => $this->session->userdata('login_id'));
		$this->db->update('tb_openyear',$data,"openyear_id='1'");
		
	}
	

	public function edit_recruitstudent($id)
	{
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
		
		$data['title'] = $this->title;
		$data['icon'] = '<i class="fas fa-edit"></i>';
		$data['color'] = 'warning';
		$data['breadcrumbs'] = array(base_url('admin/recruitstudent') => 'จัดการ'.$this->title,'#' =>'แก้ไข'.$this->title );

		$this->db->select('*');
		$this->db->from('tb_recruitstudent');
		$this->db->where('recruit_id',$id);
		$data['recruit'] =	$this->db->get()->result();
		$data['action'] = 'update_recruitstudent';

		// $th = $this->load->database('thailandpa', TRUE);
		// $data['province'] = $th->get('province')->result();
		// $sel_amphur = $th->where('PROVINCE_ID',@$data['recruit'][0]->recruit_homeProvince)->get('province')->result();
		// $data['amphur'] = $th->select('AMPHUR_ID,AMPHUR_NAME,PROVINCE_ID')->where('PROVINCE_ID',$data['recruit'][0]->recruit_homeProvince)->get('amphur')->result(); //เลือกอำเภอ
		// $data['district'] = $th->where('AMPHUR_ID',$data['recruit'][0]->recruit_homedistrict)->get('district')->result();

		//echo '<pre>'; print_r($data['district']); exit();
		$this->load->view('admin/layout/navber_admin.php',$data);
		$this->load->view('admin/layout/menu_top_admin.php');
			$this->load->view('admin/admin_admission_form.php');
			$this->load->view('admin/layout/footer_admin.php');
	}


	public function delete_recruitstudent($id)
	{	

		$data = $this->db->where('recruit_id',$id)->get('tb_recruitstudent')->result();
		//print_r($data[0]->recruit_id);
		@unlink("./uploads/recruitstudent/m".$data[0]->recruit_regLevel.'/img/'.$data[0]->recruit_img);
		@unlink("./uploads/recruitstudent/m".$data[0]->recruit_regLevel.'/certificate/'.$data[0]->recruit_certificateEdu);
		@unlink("./uploads/recruitstudent/m".$data[0]->recruit_regLevel.'/certificateB/'.$data[0]->recruit_certificateEduB);
		@unlink("./uploads/recruitstudent/m".$data[0]->recruit_regLevel.'/copyAddress/'.$data[0]->recruit_copyAddress);
		@unlink("./uploads/recruitstudent/m".$data[0]->recruit_regLevel.'/copyidCard/'.$data[0]->recruit_copyidCard);

		if($this->admin_model_admission->recruitstudent_delete($id) == 1){
			$this->session->set_flashdata(array('msg'=> 'ok','messge' => 'ลบข้อมูลสำเร็จ'));
			redirect('admin/Recruitment/'.$this->session->userdata('year'), 'refresh');
		}
	}


	public function update_recruitstudent($id)
	{	
		
		$data_R = $this->db->where('recruit_id',$id)->get('tb_recruitstudent')->result();
		
		$openyear = $this->db->get('tb_openyear')->result();
		$file = array($_FILES['recruit_img']['error'],
							$_FILES['recruit_certificateEdu']['error'],
							$_FILES['recruit_certificateEduB']['error'],
							$_FILES['recruit_copyidCard']['error'],
							$_FILES['recruit_copyAddress']['error']);
		//print_r($file);
		$recruit_birthday = ($this->input->post('recruit_birthdayY')-543).'-'.$this->input->post('recruit_birthdayM').'-'.$this->input->post('recruit_birthdayD');
		$data_update = array(
			'recruit_regLevel' => $this->input->post('recruit_regLevel'),
			'recruit_prefix' => $this->input->post('recruit_prefix'),
			'recruit_firstName' => $this->input->post('recruit_firstName'),
			'recruit_lastName' => $this->input->post('recruit_lastName'),
			'recruit_oldSchool' => $this->input->post('recruit_oldSchool'),
			'recruit_district' => $this->input->post('recruit_district'),
			'recruit_province' => $this->input->post('recruit_province'),
			'recruit_birthday' => $recruit_birthday,
			'recruit_race' => $this->input->post('recruit_race'),
			'recruit_nationality' => $this->input->post('recruit_nationality'), 
			'recruit_religion' => $this->input->post('recruit_religion'),
			'recruit_idCard' => $this->input->post('recruit_idCard'),
			'recruit_phone' => $this->input->post('recruit_phone'),
			'recruit_homeNumber' => $this->input->post('recruit_homeNumber'),
			'recruit_homeGroup' => $this->input->post('recruit_homeGroup'),
			'recruit_homeRoad' => $this->input->post('recruit_homeRoad'),
			'recruit_homeSubdistrict' => $this->input->post('recruit_homeSubdistrict'),
			'recruit_homedistrict' => $this->input->post('recruit_homedistrict'),
			'recruit_homeProvince' => $this->input->post('recruit_homeProvince'),
			'recruit_homePostcode' => $this->input->post('recruit_homePostcode'),
			'recruit_tpyeRoom' => $this->input->post('recruit_tpyeRoom'),
			'recruit_grade' => $this->input->post('recruit_grade'),
			'recruit_year' => $this->input->post('recruit_year')
		);
	
			if(in_array($_FILES['recruit_img']['error'],$file)){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_img']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_img']['error'];
				$foder = 'img';
				$do_upload = 'recruit_img';
				$rand_name = $openyear[0]->openyear_year.'-'.$this->input->post('recruit_idCard').rand();
				if($file_check == 0 ){
					$data_update = array('recruit_img' => $rand_name.'.'.$imageFileType);	
					$this->update_img($id,$data_R[0]->recruit_img,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}else{
					$imageFileType = 0;
					$this->update_img($id,$data_R[0]->recruit_img,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}
				

			}if(in_array($_FILES['recruit_certificateEdu']['error'],$file)){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_certificateEdu']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_certificateEdu']['error'];
				$foder = 'certificate';
				$do_upload = 'recruit_certificateEdu';
				$rand_name = $openyear[0]->openyear_year.'-'.$this->input->post('recruit_idCard').rand();
				if($file_check == 0 ){
					$data_update = array('recruit_certificateEdu' => $rand_name.'.'.$imageFileType);	
					$this->update_img($id,$data_R[0]->recruit_certificateEdu,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}else{
					$imageFileType = 0;
					$this->update_img($id,$data_R[0]->recruit_certificateEdu,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}
			}if(in_array($_FILES['recruit_certificateEduB']['error'],$file)){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_certificateEduB']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_certificateEduB']['error'];
				$foder = 'certificateB';
				$do_upload = 'recruit_certificateEduB';
				$rand_name = $openyear[0]->openyear_year.'-'.$this->input->post('recruit_idCard').rand();
				if($file_check == 0 ){
					$data_update = array('recruit_certificateEduB' => $rand_name.'.'.$imageFileType);	
					$this->update_img($id,$data_R[0]->recruit_certificateEduB,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}else{
					$imageFileType = 0;
					$this->update_img($id,$data_R[0]->recruit_certificateEduB,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}
			}if(in_array($_FILES['recruit_copyidCard']['error'],$file)){
				$imageFileType = strtolower(pathinfo($_FILES['recruit_copyidCard']['name'],PATHINFO_EXTENSION));						
				$file_check = $_FILES['recruit_copyidCard']['error'];
				$foder = 'copyidCard';
				$do_upload = 'recruit_copyidCard';
				$rand_name = $openyear[0]->openyear_year.'-'.$this->input->post('recruit_idCard').rand();
				if($file_check == 0 ){
					$data_update = array('recruit_copyidCard' => $rand_name.'.'.$imageFileType);	
					$this->update_img($id,$data_R[0]->recruit_copyidCard,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}else{
					$imageFileType = 0;
					$this->update_img($id,$data_R[0]->recruit_copyidCard,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
				}
			}
			// if(in_array($_FILES['recruit_copyAddress']['error'],$file)){
			// 	$imageFileType = strtolower(pathinfo($_FILES['recruit_copyAddress']['name'],PATHINFO_EXTENSION));						
			// 	$file_check = $_FILES['recruit_copyAddress']['error'];
			// 	$foder = 'copyAddress';
			// 	$do_upload = 'recruit_copyAddress';
			// 	$rand_name = $openyear[0]->openyear_year.'-'.$this->input->post('recruit_idCard').rand();
			// 	if($file_check == 0 ){
			// 		$data_update = array('recruit_copyAddress' => $rand_name.'.'.$imageFileType);	
			// 		$this->update_img($id,$data_R[0]->recruit_copyAddress,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
			// 	}else{
			// 		$imageFileType = 0;
			// 		$this->update_img($id,$data_R[0]->recruit_copyAddress,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name);
			// 	}
				
			// }

			
		redirect('admin/Recruitment/CheckData/'.$id);
			
		
	}


	public function update_img($id,$img,$file_check,$foder,$do_upload,$data_update,$imageFileType,$rand_name)
	{
		if($file_check == 0 ){
		 $config['upload_path']   = 'uploads/recruitstudent/m'.$this->input->post('recruit_regLevel').'/'.$foder.'/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
         $config['allowed_types'] = 'gif|jpg|jpeg|png'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
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
				

				@unlink("./uploads/recruitstudent/m".$this->input->post('recruit_regLevel').'/'.$foder.'/'.$img);

				
				
				if($this->admin_model_admission->recruitstudent_update($data_update,$id) == 1){
				 		$this->session->set_flashdata(array('status'=>'success','msg'=> 'Yes','messge' => 'แก้ไขข้อมูลสำเร็จ'));				 	
				 }
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				//print_r($error['error']);
				$this->session->set_flashdata(array('status'=>'error','msg'=> 'NO','messge' => $error['error']));
			}
		}
		else{

			if($this->admin_model_admission->recruitstudent_update($data_update,$id) == 1){
					$this->session->set_flashdata(array('status'=>'success','msg'=> 'Yes','messge' => 'แก้ไขข้อมูลสำเร็จ'));
					//redirect('RegStudent/checkRegister?search_stu='.$this->input->post('recruit_idCard'), 'refresh');
			
			}
		}
	}

	public function pdf($id)
    {

		$path = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
		require $path . '/librarie_skj/mpdf/vendor/autoload.php';

		$thai = $this->load->database('thailandpa', TRUE);
		$thpa = $thai->database;
		
		$datapdf = $this->db->select('skjacth_admission.tb_recruitstudent.*,
									  skjacth_admission.tb_quota.quota_explain,skjacth_admission.tb_quota.quota_key')
		->from('skjacth_admission.tb_recruitstudent')										
		->join('skjacth_admission.tb_quota','skjacth_admission.tb_quota.quota_key = skjacth_admission.tb_recruitstudent.recruit_category','left')
		->where('recruit_id',$id)
		->get()->result();

		// echo FCPATH.'uploads/recruitstudent/m'.$datapdf[0]->recruit_regLevel.'/img/'.$datapdf[0]->recruit_img; exit();

    	$date_Y = date('Y',strtotime($datapdf[0]->recruit_birthday))+543;
    	$TH_Month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    	$date_D = date('d',strtotime($datapdf[0]->recruit_birthday));
    	$date_M = date('n',strtotime($datapdf[0]->recruit_birthday));

		$date_Y_regis = date('Y',strtotime($datapdf[0]->recruit_date))+543;
    	$date_D_regis = date('d',strtotime($datapdf[0]->recruit_date));
    	$date_M_regis = date('n',strtotime($datapdf[0]->recruit_date));

    	$sch = explode("โรงเรียน", $datapdf[0]->recruit_oldSchool); //แยกคำว่าโรงเรียน
    	
        $mpdf = new \Mpdf\Mpdf([
					'default_font_size' => 16,
					'default_font' => 'sarabun'
				]);
        $mpdf->SetTitle($datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.' '.$datapdf[0]->recruit_lastName);
        $html = '<div style="position:absolute;top:90px;left:635px; width:100%"><img style="width: 120px;hight:100px;" src='.FCPATH.'uploads/recruitstudent/m'.$datapdf[0]->recruit_regLevel.'/img/'.$datapdf[0]->recruit_img.'></div>'; 
		$html .= '<div style="position:absolute;top:18px;left:100px; width:100%;font-size:16px;">'.$datapdf[0]->quota_explain.'</div>'; //รอบโควตาการสมัคร
		$html .= '<div style="position:absolute;top:180px;left:555px; width:100%;font-size:24px;">'.$datapdf[0]->recruit_regLevel.'</div>';// ชั้นที่ สมัคร
        $html .= '<div style="position:absolute;top:63px;left:700px; width:100%">'.sprintf("%04d",$datapdf[0]->recruit_id).'</div>'; //เลขที่สมัคร
		$html .= '<div style="position:absolute;top:280px;left:180px; width:100%">'.$datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.'</div>'; //ชื่อผู้สมัคร
		$html .= '<div style="position:absolute;top:280px;left:470px; width:100%">'.$datapdf[0]->recruit_lastName.'</div>'; //นามสกุลผู้สมัคร
		$html .= '<div style="position:absolute;top:307px;left:270px; width:100%">'.($sch[0] == '' ? $sch[1] : $sch[0]).'</div>'; //โรงเรียนเดิม
		$html .= '<div style="position:absolute;top:335px;left:170px; width:100%">'.$datapdf[0]->recruit_district.'</div>'; //อำเภอโรงเรียน
		$html .= '<div style="position:absolute;top:335px;left:510px; width:100%">'.$datapdf[0]->recruit_province.'</div>'; //จังหวัดโรงเรียน
		$html .= '<div style="position:absolute;top:363px;left:160px; width:100%">'.$date_D.'</div>'; //วันเกิด
		$html .= '<div style="position:absolute;top:363px;left:240px; width:100%">'.$TH_Month[$date_M-1].'</div>'; //เดือนเกิด
		$html .= '<div style="position:absolute;top:363px;left:370px; width:100%">'.$date_Y.'</div>'; //ปีเกิด
		$html .= '<div style="position:absolute;top:363px;left:470px; width:100%">'.$this->timeago->getAge($datapdf[0]->recruit_birthday).'</div>'; //อายุ
		$html .= '<div style="position:absolute;top:363px;left:600px; width:100%">'.$datapdf[0]->recruit_race.'</div>'; //เชื้อชาติ
		$html .= '<div style="position:absolute;top:390px;left:162px; width:100%">'.$datapdf[0]->recruit_nationality.'</div>'; //สัญชาติ
		$html .= '<div style="position:absolute;top:390px;left:300px; width:100%">'.$datapdf[0]->recruit_religion.'</div>'; //ศาสนา
		//$html .= '<div style="position:absolute;top:390px;left:540px; width:100%">'.$datapdf[0]->recruit_idCard.'</div>'; //เลขบัตรประจำตัวประชาชน
		$html .= '<div style="position:absolute;top:418px;left:350px; width:100%">'.$datapdf[0]->recruit_phone.'</div>'; //เบอร์โทรติดต่อ
		$html .= '<div style="position:absolute;top:418px;left:600px; width:100%">'.$datapdf[0]->recruit_grade.'</div>'; //เกรดเฉี่ย
		$html .= '<div style="position:absolute;top:445px;left:270px; width:100%">'.$datapdf[0]->recruit_homeNumber.'</div>'; //บ้านเลขที่ //แก้*****
		$html .= '<div style="position:absolute;top:445px;left:390px; width:100%">'.$datapdf[0]->recruit_homeGroup.'</div>'; //หมู่
		$html .= '<div style="position:absolute;top:445px;left:475px; width:100%">'.$datapdf[0]->recruit_homeRoad.'</div>'; //ถนน
		$html .= '<div style="position:absolute;top:445px;left:615px; width:100%">'.$datapdf[0]->recruit_homeSubdistrict.'</div>'; //ตำบล
		$html .= '<div style="position:absolute;top:475px;left:180px; width:100%">'.$datapdf[0]->recruit_homedistrict.'</div>'; //อำเภอ
		$html .= '<div style="position:absolute;top:475px;left:400px; width:100%">'.$datapdf[0]->recruit_homeProvince.'</div>'; //จังหวัด
		$html .= '<div style="position:absolute;top:475px;left:620px; width:100%">'.$datapdf[0]->recruit_homePostcode.'</div>'; //รหัสไปรษณีย์
		$html .= '<div style="position:absolute;top:503px;left:695px; width:100%;font-size:22px;">'.$datapdf[0]->recruit_regLevel.'</div>';// ชั้นที่ สมัคร
		// ส่วนที่ 2recruit_date		
		$html .= '<div style="position:absolute;top:880px;left:340px; width:100%">'.$datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.' '.$datapdf[0]->recruit_lastName.'</div>'; //ชื่อผู้สมัคร
		
		$html .= '<div style="position:absolute;top:905px;left:350px; width:100%">'.$date_D_regis.' '.$TH_Month[$date_M_regis-1].' '.$date_Y_regis.'</div>'; // วันที่สมัครตอนที่ 1

		//แสดง ลำดับการเลือกหลักสูตร
		if($datapdf[0]->quota_key == "normal"){
			$CheckStu = $this->db->select('recruit_majorOrder')->where('recruit_id',$id)->get('tb_recruitstudent')->row();
			$SubCourse = explode('|',$CheckStu->recruit_majorOrder);	
			$html .= '<div style="position:absolute;top:570px;left:200px; width:100%">';
			foreach ($SubCourse as $key => $v_SubCourse) {
				$CheckCourse = $this->db->select('course_initials')->where('course_id', $v_SubCourse)->get('tb_course')->row();
				$html .= "ลำดับที่ ".($key+1).' '.$CheckCourse->course_initials."<br>";
			}		
			$html .= '</div>';
		}else{
			$CheckStu = $this->db->select('recruit_tpyeRoom,recruit_major')->where('recruit_id',$id)->get('tb_recruitstudent')->row();
			
			$html .= '<div style="position:absolute;top:570px;left:200px; width:100%">';
			
				$html .= "ลำดับที่ 1 ".$CheckStu->recruit_tpyeRoom. ' สาขา '.$CheckStu->recruit_major;
				
			$html .= '</div>';
		}
		

		//  $AtpyeRoom = array('ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)','ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)','ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)','ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)','ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)' ); 
    	// if($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[0]){
    	// 	$html .= '<div style="position:absolute;top:540px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	// }elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[1]){
    	// 	$html .= '<div style="position:absolute;top:570px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	// }elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[2]){
    	// 	$html .= '<div style="position:absolute;top:595px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	// }elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[3]){
    	// 	$html .= '<div style="position:absolute;top:625px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		// }elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[4]){
    	// 	$html .= '<div style="position:absolute;top:510px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		// }

		
    	if($datapdf[0]->recruit_certificateEdu != ''){
    		$html .= '<div style="position:absolute;top:795px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}
    	if($datapdf[0]->recruit_copyidCard != ''){
    		$html .= '<div style="position:absolute;top:795px;left:330x; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}
    	if($datapdf[0]->recruit_img != ''){
    		$html .= '<div style="position:absolute;top:795px;left:560px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}

		$mpdf->SetDocTemplate('uploads/recruitstudent/registerSKJ.pdf',true);
		$filename = sprintf("%04d",$datapdf[0]->recruit_id).'-'.$datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.' '.$datapdf[0]->recruit_lastName;
        $mpdf->WriteHTML($html);
        $mpdf->Output('Reg_'.$filename.'.pdf','I'); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }
	


    public function confrim_report($id)
	{	
		//echo $this->input->post('recruit_status'); exit();
		if($this->input->post('recruit_status') === "ผ่านการตรวจสอบ"){
			$data = array('recruit_status' => $this->input->post('recruit_status'));
			$update_comfrim = $this->db->update('tb_recruitstudent',$data,"recruit_id='".$id."'");
			$this->session->set_flashdata(array('status'=>'success','msg'=> 'Yes','messge' => 'ยืนยันข้อมูล สำเร็จ'));
			 redirect('admin/Recruitment/CheckData/'.$id);
		}else{
			$data = array('recruit_status' => $this->input->post('TextAdminComment'));
			$update_comfrim = $this->db->update('tb_recruitstudent',$data,"recruit_id='".$id."'");
			$this->session->set_flashdata(array('status'=>'success','msg'=> 'Yes','messge' => 'ยืนยันข้อมูล สำเร็จ'));
			 redirect('admin/Recruitment/CheckData/'.$id);
		}

		
	}	

	public function pdf_all($year)
    {
		$path = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
		require $path . '/librarie_skj/mpdf/vendor/autoload.php';
		
		$thai = $this->load->database('thailandpa', TRUE);
		$thpa = $thai->database;
		
		$datapdf_all = $this->db->select('skjacth_admission.tb_recruitstudent.*,
		skjacth_admission.tb_quota.quota_explain')
		->from('skjacth_admission.tb_recruitstudent')										
		->join('skjacth_admission.tb_quota','skjacth_admission.tb_quota.quota_key = skjacth_admission.tb_recruitstudent.recruit_category','left')
		->where('recruit_year',$year)
		->get()->result();

		//echo '<pre>'; print_r($datapdf_all); exit();

		$mpdf = new \Mpdf\Mpdf([
			'default_font_size' => 16,
			'default_font' => 'sarabun'
		]);
			
		foreach ($datapdf_all as $key => $datapdf) {
    	$date_Y = date('Y',strtotime($datapdf->recruit_birthday))+543;
    	$TH_Month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    	$date_D = date('d',strtotime($datapdf->recruit_birthday));
    	$date_M = date('n',strtotime($datapdf->recruit_birthday));

		$date_Y_regis = date('Y',strtotime($datapdf->recruit_date))+543;
    	$date_D_regis = date('d',strtotime($datapdf->recruit_date));
		$date_M_regis = date('n',strtotime($datapdf->recruit_date));
		
    	$sch = explode("โรงเรียน", $datapdf->recruit_oldSchool); //แยกคำว่าโรงเรียน
    	
        $html = '<div style="position:absolute;top:60px;left:635px; width:100%"><img style="width: 120px;hight:100px;" src='.FCPATH.'uploads/recruitstudent/m'.$datapdf->recruit_regLevel.'/img/'.$datapdf->recruit_img.'></div>'; 
		$html .= '<div style="position:absolute;top:18px;left:100px; width:100%;font-size:16px;">'.$datapdf->quota_explain.'</div>'; //รอบโควตาการสมัคร

        $html .= '<div style="position:absolute;top:18px;left:690px; width:100%">'.sprintf("%04d",$datapdf->recruit_id).'</div>'; //เลขที่สมัคร
		$html .= '<div style="position:absolute;top:232px;left:180px; width:100%">'.$datapdf->recruit_prefix.$datapdf->recruit_firstName.'</div>'; //ชื่อผู้สมัคร
		$html .= '<div style="position:absolute;top:232px;left:470px; width:100%">'.$datapdf->recruit_lastName.'</div>'; //นามสกุลผู้สมัคร
		$html .= '<div style="position:absolute;top:262px;left:340px; width:100%">'.($sch[0] == '' ? $sch[1] : $sch[0]).'</div>'; //โรงเรียนเดิม
		$html .= '<div style="position:absolute;top:290px;left:170px; width:100%">'.$datapdf->recruit_district.'</div>'; //อำเภอโรงเรียน
		$html .= '<div style="position:absolute;top:290px;left:510px; width:100%">'.$datapdf->recruit_province.'</div>'; //จังหวัดโรงเรียน
		$html .= '<div style="position:absolute;top:318px;left:160px; width:100%">'.$date_D.'</div>'; //วันเกิด
		$html .= '<div style="position:absolute;top:318px;left:240px; width:100%">'.$TH_Month[$date_M-1].'</div>'; //เดือนเกิด
		$html .= '<div style="position:absolute;top:318px;left:370px; width:100%">'.$date_Y.'</div>'; //ปีเกิด
		$html .= '<div style="position:absolute;top:318px;left:470px; width:100%">'.$this->timeago->getAge($datapdf->recruit_birthday).'</div>'; //อายุ
		$html .= '<div style="position:absolute;top:318px;left:600px; width:100%">'.$datapdf->recruit_race.'</div>'; //เชื้อชาติ
		$html .= '<div style="position:absolute;top:345px;left:162px; width:100%">'.$datapdf->recruit_nationality.'</div>'; //สัญชาติ
		$html .= '<div style="position:absolute;top:345px;left:300px; width:100%">'.$datapdf->recruit_religion.'</div>'; //ศาสนา
		$html .= '<div style="position:absolute;top:345px;left:540px; width:100%">'.$datapdf->recruit_idCard.'</div>'; //เลขบัตรประจำตัวประชาชน
		$html .= '<div style="position:absolute;top:373px;left:350px; width:100%">'.$datapdf->recruit_phone.'</div>'; //เบอร์โทรติดต่อ
		$html .= '<div style="position:absolute;top:373px;left:600px; width:100%">'.$datapdf->recruit_grade.'</div>'; //เกรดเฉี่ย
		$html .= '<div style="position:absolute;top:400px;left:270px; width:100%">'.$datapdf->recruit_homeNumber.'</div>'; //บ้านเลขที่ //แก้*****
		$html .= '<div style="position:absolute;top:400px;left:390px; width:100%">'.$datapdf->recruit_homeGroup.'</div>'; //หมู่
		$html .= '<div style="position:absolute;top:400px;left:430px; width:100%">'.$datapdf->recruit_homeRoad.'</div>'; //ถนน
		$html .= '<div style="position:absolute;top:400px;left:615px; width:100%">'.$datapdf->recruit_homeSubdistrict.'</div>'; //ตำบล
		$html .= '<div style="position:absolute;top:430px;left:180px; width:100%">'.$datapdf->recruit_homedistrict.'</div>'; //อำเภอ
		$html .= '<div style="position:absolute;top:430px;left:400px; width:100%">'.$datapdf->recruit_homeProvince.'</div>'; //จังหวัด
		$html .= '<div style="position:absolute;top:430px;left:620px; width:100%">'.$datapdf->recruit_homePostcode.'</div>'; //รหัสไปรษณีย์
		// ส่วนที่ 2recruit_date
		$html .= '<div style="position:absolute;top:850px;left:55px; width:100%"><img style="width:100px;hight:100px;" src='.FCPATH.'uploads/recruitstudent/m'.$datapdf->recruit_regLevel.'/img/'.$datapdf->recruit_img.'></div>'; 
		$html .= '<div style="position:absolute;top:820px;left:120px; width:100%">'.sprintf("%04d",$datapdf->recruit_id).'</div>'; 
		$html .= '<div style="position:absolute;top:849px;left:250px; width:100%">'.$datapdf->recruit_prefix.$datapdf->recruit_firstName.'</div>'; //ชื่อผู้สมัคร
		$html .= '<div style="position:absolute;top:849px;left:480px; width:100%">'.$datapdf->recruit_lastName.'</div>'; //นามสกุลผู้สมัคร
		$html .= '<div style="position:absolute;top:876;left:400px; width:100%">'.$datapdf->recruit_idCard.'</div>';	
		$html .= '<div style="position:absolute;top:905;left:280px; width:100%">'.$datapdf->recruit_tpyeRoom.'</div>';	
		$html .= '<div style="position:absolute;top:760px;left:360px; width:100%">'.$date_D_regis.' '.$TH_Month[$date_M_regis-1].' '.$date_Y_regis.'</div>'; // วันที่สมัครตอนที่ 1

		$html .= '<div style="position:absolute;top:990px;left:360px; width:100%">'.$date_D_regis.' '.$TH_Month[$date_M_regis-1].' '.$date_Y_regis.'</div>'; // วันที่สมัครตอนที่ 2


		 $AtpyeRoom = array('ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)','ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)','ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)','ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)','ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)' ); 
    	if($datapdf->recruit_tpyeRoom == $AtpyeRoom[0]){
    		$html .= '<div style="position:absolute;top:540px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}elseif($datapdf->recruit_tpyeRoom == $AtpyeRoom[1]){
    		$html .= '<div style="position:absolute;top:570px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}elseif($datapdf->recruit_tpyeRoom == $AtpyeRoom[2]){
    		$html .= '<div style="position:absolute;top:595px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}elseif($datapdf->recruit_tpyeRoom == $AtpyeRoom[3]){
    		$html .= '<div style="position:absolute;top:625px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}elseif($datapdf->recruit_tpyeRoom == $AtpyeRoom[4]){
    		$html .= '<div style="position:absolute;top:510px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}

		
    	if($datapdf->recruit_certificateEdu != ''){
    		$html .= '<div style="position:absolute;top:680px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}
    	if($datapdf->recruit_copyidCard != ''){
    		$html .= '<div style="position:absolute;top:680px;left:330x; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}
    	if($datapdf->recruit_img != ''){
    		$html .= '<div style="position:absolute;top:680px;left:560px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}
		
		if($datapdf->recruit_regLevel <= 3){
			$filePdf = 1;
		}else{
			$filePdf = 4;
		}
		$mpdf->SetDocTemplate('uploads/recruitstudent/pdf_registudent'.$filePdf.'.pdf',true);
		
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
	}
		$mpdf->Output('Reg_'.$datapdf->recruit_idCard.'.pdf','D'); // opens in browser
	
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
	}





	public function logout()
	{
		delete_cookie('username'); 
		delete_cookie('password'); 
		$this->session->sess_destroy();
		redirect(base_url());
	}


	public function SchoolList(){
		// POST data
		$postData = $this->input->post();
	
		// Get data
		$data = $this->model_admission->getSchool($postData);
	
		echo json_encode($data);
	  }

	  public function PagePrint(){
		$data['title'] = "พิมพ์ใบสมัคร";
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		
		$this->load->view('admin/layout/navber_admin.php',$data);
		$this->load->view('admin/layout/menu_top_admin.php');
		$this->load->view('admin/admin_admission_print.php');
		$this->load->view('admin/layout/footer_admin.php');
	  }

	  public function PagePrintConnfirm($year){
		$data['switch'] = $this->db->get("tb_onoffsys")->result();
		$data = $this->report_student($year);
		$data['title'] = $this->title;		
		$this->db->select('*');
		$this->db->from('tb_recruitstudent');
		$this->db->where('recruit_year',$year);
		$this->db->where('recruit_status',"ผ่านการตรวจสอบ");
		$this->db->order_by('recruit_id','DESC');
		$data['recruit'] =	$this->db->get()->result();

		$data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
		$data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();

			
			$this->load->view('admin/layout/navber_admin.php',$data);
			$this->load->view('admin/layout/menu_top_admin.php');
			$this->load->view('admin/admin_admission_printConfirm.php');
			$this->load->view('admin/layout/footer_admin.php');
	  }

	  public function pdf_type_all($year,$type,$mo)
    {
		//echo $type; exit();
		$thai = $this->load->database('thailandpa', TRUE);
		$thpa = $thai->database;
		
		$datapdf_all = $this->db->select('skjacth_admission.tb_recruitstudent.*,		
										skjacth_admission.tb_quota.quota_explain,
										'.$thpa.'.province.PROVINCE_NAME,
										'.$thpa.'.district.DISTRICT_NAME,
										'.$thpa.'.amphur.AMPHUR_NAME')
										->from('skjacth_admission.tb_recruitstudent')
										->join($thpa.'.province','skjacth_admission.tb_recruitstudent.recruit_homeProvince = '.$thpa.'.province.PROVINCE_ID', 'INNER')
										->join($thpa.'.district','skjacth_admission.tb_recruitstudent.recruit_homeSubdistrict = '.$thpa.'.district.DISTRICT_ID', 'INNER')
										->join($thpa.'.amphur','skjacth_admission.tb_recruitstudent.recruit_homedistrict = '.$thpa.'.amphur.AMPHUR_ID', 'INNER')
										->join('skjacth_admission.tb_quota','skjacth_admission.tb_quota.quota_key = skjacth_admission.tb_recruitstudent.recruit_category')
		->where('recruit_year',$year)
		->where('recruit_tpyeRoom',$type)
		->where('recruit_regLevel',$mo)
		->get()->result();
		
		$mpdf = new \Mpdf\Mpdf([
			'default_font_size' => 16,
			'default_font' => 'sarabun'
		]);

		//echo "<pre>"; print_r($datapdf_all); exit();
			
		foreach ($datapdf_all as $key => $datapdf) {
			$date_Y = date('Y',strtotime($datapdf->recruit_birthday))+543;
			$TH_Month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
			$date_D = date('d',strtotime($datapdf->recruit_birthday));
			$date_M = date('n',strtotime($datapdf->recruit_birthday));
	
			$date_Y_regis = date('Y',strtotime($datapdf->recruit_date))+543;
			$date_D_regis = date('d',strtotime($datapdf->recruit_date));
			$date_M_regis = date('n',strtotime($datapdf->recruit_date));
	
			$sch = explode("โรงเรียน", $datapdf->recruit_oldSchool); //แยกคำว่าโรงเรียน
			
			$mpdf->SetTitle($datapdf->recruit_prefix.$datapdf->recruit_firstName.' '.$datapdf->recruit_lastName);
			$html = '<div style="position:absolute;top:60px;left:635px; width:100%"><img style="width: 120px;hight:100px;" src='.FCPATH.'uploads/recruitstudent/m'.$datapdf->recruit_regLevel.'/img/'.$datapdf->recruit_img.'></div>'; 
			$html .= '<div style="position:absolute;top:18px;left:100px; width:100%">รอบ '.$datapdf->quota_explain.'</div>'; //รอบการสมัคร
	
			$html .= '<div style="position:absolute;top:18px;left:690px; width:100%">'.sprintf("%04d",$datapdf->recruit_id).'</div>'; //เลขที่สมัคร
			$html .= '<div style="position:absolute;top:232px;left:180px; width:100%">'.$datapdf->recruit_prefix.$datapdf->recruit_firstName.'</div>'; //ชื่อผู้สมัคร
			$html .= '<div style="position:absolute;top:232px;left:470px; width:100%">'.$datapdf->recruit_lastName.'</div>'; //นามสกุลผู้สมัคร
			$html .= '<div style="position:absolute;top:262px;left:340px; width:100%">'.($sch[0] == '' ? $sch[1] : $sch[0]).'</div>'; //โรงเรียนเดิม
			$html .= '<div style="position:absolute;top:290px;left:170px; width:100%">'.$datapdf->recruit_district.'</div>'; //อำเภอโรงเรียน
			$html .= '<div style="position:absolute;top:290px;left:510px; width:100%">'.$datapdf->recruit_province.'</div>'; //จังหวัดโรงเรียน
			$html .= '<div style="position:absolute;top:318px;left:160px; width:100%">'.$date_D.'</div>'; //วันเกิด
			$html .= '<div style="position:absolute;top:318px;left:240px; width:100%">'.$TH_Month[$date_M-1].'</div>'; //เดือนเกิด
			$html .= '<div style="position:absolute;top:318px;left:370px; width:100%">'.$date_Y.'</div>'; //ปีเกิด
			$html .= '<div style="position:absolute;top:318px;left:470px; width:100%">'.$this->timeago->getAge($datapdf->recruit_birthday).'</div>'; //อายุ
			$html .= '<div style="position:absolute;top:318px;left:600px; width:100%">'.$datapdf->recruit_race.'</div>'; //เชื้อชาติ
			$html .= '<div style="position:absolute;top:345px;left:162px; width:100%">'.$datapdf->recruit_nationality.'</div>'; //สัญชาติ
			$html .= '<div style="position:absolute;top:345px;left:300px; width:100%">'.$datapdf->recruit_religion.'</div>'; //ศาสนา
			$html .= '<div style="position:absolute;top:345px;left:540px; width:100%">'.$datapdf->recruit_idCard.'</div>'; //เลขบัตรประจำตัวประชาชน
			$html .= '<div style="position:absolute;top:373px;left:350px; width:100%">'.$datapdf->recruit_phone.'</div>'; //เบอร์โทรติดต่อ
			$html .= '<div style="position:absolute;top:373px;left:600px; width:100%">'.$datapdf->recruit_grade.'</div>'; //เกรดเฉี่ย
			$html .= '<div style="position:absolute;top:400px;left:270px; width:100%">'.$datapdf->recruit_homeNumber.'</div>'; //บ้านเลขที่ //แก้*****
			$html .= '<div style="position:absolute;top:400px;left:390px; width:100%">'.$datapdf->recruit_homeGroup.'</div>'; //หมู่
			$html .= '<div style="position:absolute;top:400px;left:430px; width:100%">'.$datapdf->recruit_homeRoad.'</div>'; //ถนน
			$html .= '<div style="position:absolute;top:400px;left:615px; width:100%">'.$datapdf->DISTRICT_NAME.'</div>'; //ตำบล
			$html .= '<div style="position:absolute;top:430px;left:180px; width:100%">'.$datapdf->AMPHUR_NAME.'</div>'; //อำเภอ
			$html .= '<div style="position:absolute;top:430px;left:400px; width:100%">'.$datapdf->PROVINCE_NAME.'</div>'; //จังหวัด
			$html .= '<div style="position:absolute;top:430px;left:620px; width:100%">'.$datapdf->recruit_homePostcode.'</div>'; //รหัสไปรษณีย์
			// ส่วนที่ 2recruit_date
			$html .= '<div style="position:absolute;top:850px;left:55px; width:100%"><img style="width:100px;hight:100px;" src='.FCPATH.'uploads/recruitstudent/m'.$datapdf->recruit_regLevel.'/img/'.$datapdf->recruit_img.'></div>'; 
			$html .= '<div style="position:absolute;top:820px;left:120px; width:100%">'.sprintf("%04d",$datapdf->recruit_id).'</div>'; 
			$html .= '<div style="position:absolute;top:849px;left:250px; width:100%">'.$datapdf->recruit_prefix.$datapdf->recruit_firstName.'</div>'; //ชื่อผู้สมัคร
			$html .= '<div style="position:absolute;top:849px;left:480px; width:100%">'.$datapdf->recruit_lastName.'</div>'; //นามสกุลผู้สมัคร
			$html .= '<div style="position:absolute;top:876;left:400px; width:100%">'.$datapdf->recruit_idCard.'</div>';	
			$html .= '<div style="position:absolute;top:905;left:280px; width:100%">'.$datapdf->recruit_tpyeRoom.'</div>';	
			$html .= '<div style="position:absolute;top:760px;left:360px; width:100%">'.$date_D_regis.' '.$TH_Month[$date_M_regis-1].' '.$date_Y_regis.'</div>'; // วันที่สมัครตอนที่ 1
	
			$html .= '<div style="position:absolute;top:990px;left:360px; width:100%">'.$date_D_regis.' '.$TH_Month[$date_M_regis-1].' '.$date_Y_regis.'</div>'; // วันที่สมัครตอนที่ 2
	
	
			 $AtpyeRoom = array('ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)','ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)','ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)','ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)','ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)' ); 
			if($datapdf->recruit_tpyeRoom == $AtpyeRoom[0]){
				$html .= '<div style="position:absolute;top:540px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
			}elseif($datapdf->recruit_tpyeRoom == $AtpyeRoom[1]){
				$html .= '<div style="position:absolute;top:570px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
			}elseif($datapdf->recruit_tpyeRoom == $AtpyeRoom[2]){
				$html .= '<div style="position:absolute;top:595px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
			}elseif($datapdf->recruit_tpyeRoom == $AtpyeRoom[3]){
				$html .= '<div style="position:absolute;top:625px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
			}elseif($datapdf->recruit_tpyeRoom == $AtpyeRoom[4]){
				$html .= '<div style="position:absolute;top:510px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
			}
	
			
			if($datapdf->recruit_certificateEdu != ''){
				$html .= '<div style="position:absolute;top:680px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
			}
			if($datapdf->recruit_copyidCard != ''){
				$html .= '<div style="position:absolute;top:680px;left:330x; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
			}
			if($datapdf->recruit_img != ''){
				$html .= '<div style="position:absolute;top:680px;left:560px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
			}
				
	
		$mpdf->SetDocTemplate('uploads/recruitstudent/pdf_registudent'.$datapdf->recruit_regLevel.'.pdf',true);
		
		$mpdf->WriteHTML($html);
		$mpdf->AddPage();
		}
		$mpdf->Output('Reg_'.$type.'.pdf','D'); // opens in browser
	
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
	}

	public function report_student($year)
	{
		$chart_re1 = $this->db->select('COUNT(recruit_regLevel) AS C_count,
		tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
		tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->where('recruit_regLevel',1)
				->where('recruit_category','ปกติ')
				->group_by('recruit_tpyeRoom')
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			
			$chart_re4 = $this->db->select('COUNT(recruit_regLevel) AS C_count,
					tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
					tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->where('recruit_regLevel',4)
				->where('recruit_category','ปกติ')
				->group_by('recruit_tpyeRoom')
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$chart_All = $this->db->select('COUNT(recruit_regLevel) AS C_count,
					tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year ,
					tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->where('recruit_category','ปกติ')
				->group_by('recruit_tpyeRoom')					
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$data['sum_1'] = array_column($chart_re1,'C_count');
			$data['sum_4'] = array_column($chart_re4,'C_count');
			$data['sum_all'] = array_column($chart_All,'C_count');
			$data['chart_1'] = json_encode(array_column($chart_re1,'C_count'));	
			$data['chart_4'] = json_encode(array_column($chart_re4,'C_count'));
			$data['chart_All'] = json_encode(array_column($chart_All,'C_count'));


			$data['sum_date'] = $this->db->select('
									recruit_regLevel,recruit_year, 
									recruit_tpyeRoom,recruit_date')
									->where('recruit_category','ปกติ')
							->get('tb_recruitstudent')
							->result();
			// ผ่านการตรวจสอบ	
			$data['sum_pass'] = $this->db->select('COUNT(recruit_status) AS sumall,
									recruit_regLevel,recruit_year, 
									recruit_tpyeRoom,recruit_date,recruit_status')
									->where('recruit_category','ปกติ')
									->where('recruit_status','ผ่านการตรวจสอบ')
							->get('tb_recruitstudent')
							->result();
			$data['sum_NoPass'] = $this->db->select('COUNT(recruit_status) AS sumall,
					recruit_regLevel,recruit_year, 
					recruit_tpyeRoom,recruit_date,recruit_status')
					->where('recruit_category','ปกติ')
					->where('recruit_status !=','ผ่านการตรวจสอบ')
			->get('tb_recruitstudent')
			->result();

			//echo '<pre>';print_r($data['sum_NoPass']); exit();

			$chart_re1_cota = $this->db->select('COUNT(recruit_regLevel) AS C_count,
		tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
		tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->where('recruit_regLevel',1)
				->where('recruit_category','โควตา')
				->group_by('recruit_tpyeRoom')
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$chart_re4_cota = $this->db->select('COUNT(recruit_regLevel) AS C_count,
					tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
					tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->where('recruit_regLevel',4)
				->where('recruit_category','โควตา')
				->group_by('recruit_tpyeRoom')
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$chart_All_cota = $this->db->select('COUNT(recruit_regLevel) AS C_count,
					tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year ,
					tb_recruitstudent.recruit_tpyeRoom')
				->from('tb_recruitstudent')
				->where('recruit_year',$year)
				->where('recruit_category','โควตา')
				->group_by('recruit_tpyeRoom')					
				->order_by('recruit_tpyeRoom','DESC')
				->get()->result();
			$data['sum_1_cota'] = array_column($chart_re1_cota,'C_count');
			$data['sum_4_cota'] = array_column($chart_re4_cota,'C_count');
			$data['sum_all_cota'] = array_column($chart_All_cota,'C_count');
			$data['chart_1_cota'] = json_encode(array_column($chart_re1_cota,'C_count'));	
			$data['chart_4_cota'] = json_encode(array_column($chart_re4_cota,'C_count'));
			$data['chart_All_cota'] = json_encode(array_column($chart_All_cota,'C_count'));



			$chart_re1_all = $this->db->select('COUNT(recruit_regLevel) AS C_count,
			tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
			tb_recruitstudent.recruit_tpyeRoom')
					->from('tb_recruitstudent')
					->where('recruit_year',$year)
					->where('recruit_regLevel',1)
					->group_by('recruit_tpyeRoom')
					->order_by('recruit_tpyeRoom','DESC')
					->get()->result();
				$chart_re4_all = $this->db->select('COUNT(recruit_regLevel) AS C_count,
						tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year, 
						tb_recruitstudent.recruit_tpyeRoom')
					->from('tb_recruitstudent')
					->where('recruit_year',$year)
					->where('recruit_regLevel',4)
					->group_by('recruit_tpyeRoom')
					->order_by('recruit_tpyeRoom','DESC')
					->get()->result();
				$chart_All_all = $this->db->select('COUNT(recruit_regLevel) AS C_count,
						tb_recruitstudent.recruit_regLevel,tb_recruitstudent.recruit_year ,
						tb_recruitstudent.recruit_tpyeRoom')
					->from('tb_recruitstudent')
					->where('recruit_year',$year)
					->group_by('recruit_tpyeRoom')					
					->order_by('recruit_tpyeRoom','DESC')
					->get()->result();
				$data['sum_1_all'] = array_column($chart_re1_all,'C_count');
				$data['sum_4_all'] = array_column($chart_re4_all,'C_count');
				$data['sum_all_all'] = array_column($chart_All_all,'C_count');
				$data['chart_1_all'] = json_encode(array_column($chart_re1_all,'C_count'));	
				$data['chart_4_all'] = json_encode(array_column($chart_re4_all,'C_count'));
				$data['chart_All_all'] = json_encode(array_column($chart_All_all,'C_count'));
			return $data;
	}

	
	

	public function pdfConnfirm($id)
    {
		
		$Conf = $this->load->database('skjpers', TRUE);
		$thai = $this->load->database('thailandpa', TRUE);
		$thpa = $thai->database;
		
		$datapdf = $this->db->select('skjacth_admission.tb_recruitstudent.*,
										'.$thpa.'.province.PROVINCE_NAME,
										'.$thpa.'.district.DISTRICT_NAME,
										'.$thpa.'.amphur.AMPHUR_NAME')
										->from('skjacth_admission.tb_recruitstudent')
										->join($thpa.'.province','skjacth_admission.tb_recruitstudent.recruit_homeProvince = '.$thpa.'.province.PROVINCE_ID', 'INNER')
										->join($thpa.'.district','skjacth_admission.tb_recruitstudent.recruit_homeSubdistrict = '.$thpa.'.district.DISTRICT_ID', 'INNER')
										->join($thpa.'.amphur','skjacth_admission.tb_recruitstudent.recruit_homedistrict = '.$thpa.'.amphur.AMPHUR_ID', 'INNER')
		->where('skjacth_admission.tb_recruitstudent.recruit_id',$id)
		->get()->result();

		// echo FCPATH.'uploads/recruitstudent/m'.$datapdf[0]->recruit_regLevel.'/img/'.$datapdf[0]->recruit_img; exit();

    	$date_Y = date('Y',strtotime($datapdf[0]->recruit_birthday))+543;
    	$TH_Month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    	$date_D = date('d',strtotime($datapdf[0]->recruit_birthday));
    	$date_M = date('n',strtotime($datapdf[0]->recruit_birthday));

		$date_Y_regis = date('Y',strtotime($datapdf[0]->recruit_date))+543;
    	$date_D_regis = date('d',strtotime($datapdf[0]->recruit_date));
    	$date_M_regis = date('n',strtotime($datapdf[0]->recruit_date));

    	$sch = explode("โรงเรียน", $datapdf[0]->recruit_oldSchool); //แยกคำว่าโรงเรียน


		$confrim = $Conf->where('stu_iden',$id)->get('tb_students')->result();	
		print_r($confrim);exit();	
    	
        $mpdf = new \Mpdf\Mpdf([
					'default_font_size' => 16,
					'default_font' => 'sarabun'
				]);
        $mpdf->SetTitle($datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.' '.$datapdf[0]->recruit_lastName);
        $html = '<div style="position:absolute;top:60px;left:635px; width:100%"><img style="width: 120px;hight:100px;" src='.FCPATH.'uploads/recruitstudent/m'.$datapdf[0]->recruit_regLevel.'/img/'.$datapdf[0]->recruit_img.'></div>'; 
		$html .= '<div style="position:absolute;top:18px;left:100px; width:100%">รอบ '.$datapdf[0]->recruit_category.'</div>'; //รอบการสมัคร

        $html .= '<div style="position:absolute;top:18px;left:690px; width:100%">'.sprintf("%04d",$datapdf[0]->recruit_id).'</div>'; //เลขที่สมัคร
		$html .= '<div style="position:absolute;top:232px;left:180px; width:100%">'.$datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.'</div>'; //ชื่อผู้สมัคร
		$html .= '<div style="position:absolute;top:232px;left:470px; width:100%">'.$datapdf[0]->recruit_lastName.'</div>'; //นามสกุลผู้สมัคร
		$html .= '<div style="position:absolute;top:262px;left:340px; width:100%">'.($sch[0] == '' ? $sch[1] : $sch[0]).'</div>'; //โรงเรียนเดิม
		$html .= '<div style="position:absolute;top:290px;left:170px; width:100%">'.$datapdf[0]->recruit_district.'</div>'; //อำเภอโรงเรียน
		$html .= '<div style="position:absolute;top:290px;left:510px; width:100%">'.$datapdf[0]->recruit_province.'</div>'; //จังหวัดโรงเรียน
		$html .= '<div style="position:absolute;top:318px;left:160px; width:100%">'.$date_D.'</div>'; //วันเกิด
		$html .= '<div style="position:absolute;top:318px;left:240px; width:100%">'.$TH_Month[$date_M-1].'</div>'; //เดือนเกิด
		$html .= '<div style="position:absolute;top:318px;left:370px; width:100%">'.$date_Y.'</div>'; //ปีเกิด
		$html .= '<div style="position:absolute;top:318px;left:470px; width:100%">'.$this->timeago->getAge($datapdf[0]->recruit_birthday).'</div>'; //อายุ
		$html .= '<div style="position:absolute;top:318px;left:600px; width:100%">'.$datapdf[0]->recruit_race.'</div>'; //เชื้อชาติ
		$html .= '<div style="position:absolute;top:345px;left:162px; width:100%">'.$datapdf[0]->recruit_nationality.'</div>'; //สัญชาติ
		$html .= '<div style="position:absolute;top:345px;left:300px; width:100%">'.$datapdf[0]->recruit_religion.'</div>'; //ศาสนา
		$html .= '<div style="position:absolute;top:345px;left:540px; width:100%">'.$datapdf[0]->recruit_idCard.'</div>'; //เลขบัตรประจำตัวประชาชน
		$html .= '<div style="position:absolute;top:373px;left:350px; width:100%">'.$datapdf[0]->recruit_phone.'</div>'; //เบอร์โทรติดต่อ
		$html .= '<div style="position:absolute;top:373px;left:600px; width:100%">'.$datapdf[0]->recruit_grade.'</div>'; //เกรดเฉี่ย
		$html .= '<div style="position:absolute;top:400px;left:270px; width:100%">'.$datapdf[0]->recruit_homeNumber.'</div>'; //บ้านเลขที่ //แก้*****
		$html .= '<div style="position:absolute;top:400px;left:390px; width:100%">'.$datapdf[0]->recruit_homeGroup.'</div>'; //หมู่
		$html .= '<div style="position:absolute;top:400px;left:430px; width:100%">'.$datapdf[0]->recruit_homeRoad.'</div>'; //ถนน
		$html .= '<div style="position:absolute;top:400px;left:615px; width:100%">'.$datapdf[0]->DISTRICT_NAME.'</div>'; //ตำบล
		$html .= '<div style="position:absolute;top:430px;left:180px; width:100%">'.$datapdf[0]->AMPHUR_NAME.'</div>'; //อำเภอ
		$html .= '<div style="position:absolute;top:430px;left:400px; width:100%">'.$datapdf[0]->PROVINCE_NAME.'</div>'; //จังหวัด
		$html .= '<div style="position:absolute;top:430px;left:620px; width:100%">'.$datapdf[0]->recruit_homePostcode.'</div>'; //รหัสไปรษณีย์
		// ส่วนที่ 2recruit_date
		$html .= '<div style="position:absolute;top:850px;left:55px; width:100%"><img style="width:100px;hight:100px;" src='.FCPATH.'uploads/recruitstudent/m'.$datapdf[0]->recruit_regLevel.'/img/'.$datapdf[0]->recruit_img.'></div>'; 
		$html .= '<div style="position:absolute;top:820px;left:120px; width:100%">'.sprintf("%04d",$datapdf[0]->recruit_id).'</div>'; 
		$html .= '<div style="position:absolute;top:849px;left:250px; width:100%">'.$datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.'</div>'; //ชื่อผู้สมัคร
		$html .= '<div style="position:absolute;top:849px;left:480px; width:100%">'.$datapdf[0]->recruit_lastName.'</div>'; //นามสกุลผู้สมัคร
		$html .= '<div style="position:absolute;top:876;left:400px; width:100%">'.$datapdf[0]->recruit_idCard.'</div>';	
		$html .= '<div style="position:absolute;top:905;left:280px; width:100%">'.$datapdf[0]->recruit_tpyeRoom.'</div>';	
		$html .= '<div style="position:absolute;top:760px;left:360px; width:100%">'.$date_D_regis.' '.$TH_Month[$date_M_regis-1].' '.$date_Y_regis.'</div>'; // วันที่สมัครตอนที่ 1

		$html .= '<div style="position:absolute;top:990px;left:360px; width:100%">'.$date_D_regis.' '.$TH_Month[$date_M_regis-1].' '.$date_Y_regis.'</div>'; // วันที่สมัครตอนที่ 2


		 $AtpyeRoom = array('ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)','ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)','ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)','ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)','ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)' ); 
    	if($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[0]){
    		$html .= '<div style="position:absolute;top:540px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[1]){
    		$html .= '<div style="position:absolute;top:570px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[2]){
    		$html .= '<div style="position:absolute;top:595px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[3]){
    		$html .= '<div style="position:absolute;top:625px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}elseif($datapdf[0]->recruit_tpyeRoom == $AtpyeRoom[4]){
    		$html .= '<div style="position:absolute;top:510px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
		}

		
    	if($datapdf[0]->recruit_certificateEdu != ''){
    		$html .= '<div style="position:absolute;top:680px;left:110px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}
    	if($datapdf[0]->recruit_copyidCard != ''){
    		$html .= '<div style="position:absolute;top:680px;left:330x; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}
    	if($datapdf[0]->recruit_img != ''){
    		$html .= '<div style="position:absolute;top:680px;left:560px; width:100%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg></div>';
    	}
		$mpdf->SetDocTemplate('uploads/confirm/confirmM1All.pdf',true);
		$filename = sprintf("%04d",$datapdf[0]->recruit_id).'-'.$datapdf[0]->recruit_prefix.$datapdf[0]->recruit_firstName.' '.$datapdf[0]->recruit_lastName;
        $mpdf->WriteHTML($html);
		
		$mpdf->AddPage();		
		$html = '<div style="position:absolute;top:990px;left:360px; width:100%">'.$date_D_regis.' '.$TH_Month[$date_M_regis-1].' '.$date_Y_regis.'</div>'; // วันที่สมัครตอนที่ 2
		$mpdf->WriteHTML($html);
        $mpdf->Output('Reg_'.$filename.'.pdf','I'); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }

}

?>