<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allroom extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//chk admin status
		if($this->session->userdata('a_status') !=1 && $this->session->userdata('a_status') !=2){
			redirect('login/logout','refresh');
		}
		$this->load->model('room_model');
	}

	public function index()
	{
		if($this->session->userdata('a_status') ==1)
		{
			$data['query']=$this->room_model->room_all();
			$this->load->view('template/header');
			$this->load->view('backend/room_show_all',$data);
			$this->load->view('template/footer');
		}
		if($this->session->userdata('a_status') ==2)
		{
			$data['query']=$this->room_model->room_all();
			$this->load->view('template2/header');
			$this->load->view('backend3/room_all_m',$data);
			$this->load->view('template2/footer');
		}
	}
}