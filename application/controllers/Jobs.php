<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Jobs extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		//chk admin status
		if($this->session->userdata('a_status') !=1){
				redirect('login/logout','refresh');
		}
		$this->load->model('data_model');
		$this->load->helper('url');
	}
 
	public function index()
	{
		//print_r($_SESSION);
		$data['query']=$this->data_model->all();
		$data['qstatus1']=$this->data_model->status1();
		$data['qstatus2']=$this->data_model->status2();
		$data['qstatus3']=$this->data_model->status3();
		$data['qstatus4']=$this->data_model->status4();
		$this->load->view('template/header');
		$this->load->view('backend/jobs_list',$data);
		$this->load->view('template/footer');
	}
	
	public function getupdate($id)
	{
		$data['query']=$this->data_model->get_detail($id);
 
		// echo '<pre>';
		// print_r($data['rsedit']);
		// echo '</pre>';
		// exit();
 
		$this->load->view('template/header');
		$this->load->view('backend/jobs_form_update',$data);
		$this->load->view('template/footer');
	}
 
 
 
	public function updatedata()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('c_id', 'c_id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('c_ad_id', 'c_ad_id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('c_status', 'c_status', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('c_case_update_log', 'บันทึกการอัพเดทงานซ่อม', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('c_ad_name', 'c_ad_name', 'trim|required|min_length[1]',
                array('required' => 'ชื่อช่างห้ามว่าง %s.', 'min_length' => 'ชื่อช่างห้ามว่าง'));
 
		if ($this->form_validation->run() == FALSE)
                {
                	$id = $this->input->post('c_id');
			       	$data['query']=$this->data_model->get_detail($id);
					$this->load->view('template/header');
					$this->load->view('backend/jobs_form_update',$data);
					$this->load->view('template/footer');
                }else{
					$this->data_model->update_job();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('jobs','refresh');
                } //form vali
	}
	public function bystatus($status_id)
	{
		$data['query']=$this->data_model->by_status($status_id);
		$data['qstatus1']=$this->data_model->status1();
		$data['qstatus2']=$this->data_model->status2();
		$data['qstatus3']=$this->data_model->status3();
		$data['qstatus4']=$this->data_model->status4();
		$this->load->view('template/header');
		$this->load->view('backend/jobs_list',$data);
		$this->load->view('template/footer');
	}
	public function byjobstype($c_type)
	{
		$c_type_decode = urldecode($c_type);
		$data['query']=$this->data_model->by_jobstype($c_type_decode);
		$data['qstatus1']=$this->data_model->status1();
		$data['qstatus2']=$this->data_model->status2();
		$data['qstatus3']=$this->data_model->status3();
		$data['qstatus4']=$this->data_model->status4();
		$this->load->view('template/header');
		$this->load->view('backend/jobs_list',$data);
		$this->load->view('template/footer');
	}
	public function del($c_id)
	{
		$this->data_model->del_report($c_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('jobs','refresh');	
	}

	public function sentwork()
	{
		//print_r($_SESSION);
		$data['query']=$this->data_model->all();
		$this->load->view('template/header');
		$this->load->view('backend/jobs_sent',$data);
		$this->load->view('template/footer');
	}

/////////////////////function for tech///////////////////////

	public function addwork()
	{
		$casework = $this->input->post('c_id');
		$cw_id = [];
		foreach($casework as $row){
			array_push($cw_id, $row);
		}
		$this->data_model->insert_tnjob($cw_id);
		$this->session->set_flashdata('save_success', TRUE);
		redirect('jobs','refresh');
		
	}
}