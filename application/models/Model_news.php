<?php
class Model_news extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}


	public function update_count_view($id)
	{
		 $check = $this->db->select('news_id,news_view')->from('tb_news')->where('news_id',$id)->get()->result();

		 $data = array('news_view' => ($check[0]->news_view+1) );
				$this->db->where('news_id',$id);
		return 	$this->db->update('tb_news',$data);
		
	}

	

}