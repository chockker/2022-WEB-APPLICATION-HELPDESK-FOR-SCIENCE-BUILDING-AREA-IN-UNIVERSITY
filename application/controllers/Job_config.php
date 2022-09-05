<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//chk admin status
		if($this->session->userdata('a_status') !=1){
			redirect('login/logout','refresh');
		}
		$this->load->model('admin_model');
	}
    public function index()
	{
		$data['query']=$this->admin_model->list_all();
		$this->load->view('template/header');
		$this->load->view('backend/jobs_type',$data);
		$this->load->view('template/footer');
	}
}