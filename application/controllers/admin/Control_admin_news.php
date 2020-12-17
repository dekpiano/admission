<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_admin_news extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
		if ($this->session->userdata('fullname') == '') {
			redirect('login','refresh');
		}
    }

    public function all(){
        $data['switch'] = $this->db->get("tb_onoffsys")->result();
        $data['year'] = $this->db->select('recruit_year')->from('tb_recruitstudent')->group_by('recruit_year')->order_by('recruit_year','DESC')->get()->result();
        $data['checkYear'] = $this->db->select('*')->from('tb_openyear')->get()->result();
        return $data;
    }
    
    public function index(){
        $data = $this->all();
        $data['title'] = "ประชาสัมพันธ์";
        
        $this->load->view('layout/header.php',$data);
        $this->load->view('layout/navber.php');
        $this->load->view('admin/admin_news/admin_admission_news.php');
        $this->load->view('layout/footer.php');
    }

    public function add(){
        $data = $this->all();
        $data['title'] = "เพิ่มประชาสัมพันธ์";
        
        $this->load->view('layout/header.php',$data);
        $this->load->view('layout/navber.php');
        $this->load->view('admin/admin_news/admin_admission_add.php');
        $this->load->view('layout/footer.php');
    }



}

?>