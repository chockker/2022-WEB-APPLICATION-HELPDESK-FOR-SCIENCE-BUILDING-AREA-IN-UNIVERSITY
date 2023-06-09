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
		$this->load->view('backend/admin_list',$data);
		$this->load->view('template/footer');
	}
	public function add()
	{
		$this->load->view('template/header');
		$this->load->view('backend/admin_form_add' , array('error' => ' ' ));
		$this->load->view('template/footer');
	}
 
	public function adding()
	{
 
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
 
		$this->form_validation->set_rules('a_name', 'ชื่อช่าง', 'trim|required|min_length[4]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว'));
		$this->form_validation->set_rules('a_password', 'password', 'trim|required|min_length[4]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว'));
		$this->form_validation->set_rules('a_username', 'username', 'trim|required|min_length[4]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว'));
 
		               if ($this->form_validation->run() == FALSE)
		                {
						      	$this->load->view('template/header');
								$this->load->view('backend/admin_form_add' , array('error' => ' ' ));
								$this->load->view('template/footer');
		                }else{
 
		                	//check duplicate a_username
							$a_username = $this->input->post('a_username');
					        $this->db->select('a_username');
					        $this->db->where('a_username',$a_username);
					        $query = $this->db->get('admin');
					        $num = $query->num_rows();
					                if($num > 0)
					                {
					                       $this->session->set_flashdata('check_duplicate', TRUE);
							    			redirect('admin','refresh');
					                }else{
							            $this->admin_model->insert_admin();
							            $this->session->set_flashdata('save_success', TRUE);
									    redirect('admin','refresh');
									}//check duplicate
					        }//form vali
	}
	public function edit($id)
	{
		$data['rsedit']=$this->admin_model->read($id);
 
		// echo '<pre>';
		// print_r($data['rsedit']);
		// echo '</pre>';
		// exit();
 
		$this->load->view('template/header');
		$this->load->view('backend/admin_form_edit',$data);
		$this->load->view('template/footer');
	}
 
	public function editdata()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		//exit;
		$this->form_validation->set_rules('id', 'id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('a_name', 'ชื่อช่าง', 'trim|required|min_length[4]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว'));
		$this->form_validation->set_rules('a_status', 'สถานะช่าง', 'trim|required|min_length[1]',
                array('required' => 'กรุณาเลือกสถานะ %s.', 'min_length' => 'กรุณาเลือกสถานะ'));
 
		if ($this->form_validation->run() == FALSE)
                {
                	$id = $this->input->post('id');
			        $data['rsedit']=$this->admin_model->read($id);
					$this->load->view('template/header');
					$this->load->view('backend/admin_form_edit',$data);
					$this->load->view('template/footer');
                }else{
                	//exit;
					$this->admin_model->update_admin();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('admin','refresh');
                }
	}
 
  	public function pwd($id)
	{
		$data['rsedit']=$this->admin_model->read($id);
		$this->load->view('template/header');
		$this->load->view('backend/admin_form_edit_pwd',$data);
		$this->load->view('template/footer');
	}
 
	public function editpwd()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('id', 'id', 'trim|required|min_length[1]');
	    $this->form_validation->set_rules('admin_pwd1', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('admin_pwd2', 'Password Confirmation', 'trim|required|matches[admin_pwd1]');
 
                if ($this->form_validation->run() == FALSE)
                {
                	$id = $this->input->post('id');
                	$data['rsedit']=$this->admin_model->read($id);
					$this->load->view('template/header');
					$this->load->view('backend/admin_form_edit_pwd',$data);
					$this->load->view('template/footer');
                        
                }
                else
                {
                	$this->admin_model->update_pwd_admin();
                	$this->session->set_flashdata('save_success', TRUE);
					redirect('admin','refresh');       
                }
	}
 
	public function del($id)
	{
		$this->admin_model->del_admin($id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('admin','refresh');	
	}
}