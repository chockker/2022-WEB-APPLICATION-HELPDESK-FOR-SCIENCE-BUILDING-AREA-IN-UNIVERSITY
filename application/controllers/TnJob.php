<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TnJob extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//chk admin status
		if($this->session->userdata('a_status') !=0){
			redirect('login/logout','refresh');
		}
		$this->load->model('data_model');
		$this->load->helper('url');
	}
	public function index()
	{
		//print_r($_SESSION);
		$data['query']=$this->data_model->tnall();
		$data['qstatus1']=$this->data_model->tstatus1();
		$data['qstatus2']=$this->data_model->tstatus2();
		$data['qstatus3']=$this->data_model->tstatus3();
		$data['qstatus4']=$this->data_model->tstatus4();
		$this->load->view('template2/header');
		$this->load->view('backend2/job_work',$data);
		$this->load->view('template2/footer');
	}
}