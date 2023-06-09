<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allitem extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//chk admin status
		if($this->session->userdata('a_status') !=1 && $this->session->userdata('a_status') !=2){
			redirect('login/logout','refresh');
		}
		$this->load->model('item_model');
	}

	public function index()
	{
		if($this->session->userdata('a_status') ==1)
		{
			$data['query']=$this->item_model->item_all();
			$this->load->view('template/header');
			$this->load->view('backend/item_show_all',$data);
			$this->load->view('template/footer');
		}
		if($this->session->userdata('a_status') ==2)
		{
			$data['query']=$this->item_model->item_all();
			$this->load->view('template2/header');
			$this->load->view('backend3/item_all_m',$data);
			$this->load->view('template2/footer');
		}

	}
	public function del_item($i_id)
	{
		$this->item_model->del_item($i_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('allitem','refresh');	
	}
}