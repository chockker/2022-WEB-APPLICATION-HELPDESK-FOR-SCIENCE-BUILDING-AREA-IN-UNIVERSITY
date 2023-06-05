<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addjobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//chk admin status
		if($this->session->userdata('a_status') !=1){
			redirect('login/logout','refresh');
		}
		$this->load->model('jobs_model');
	}
    public function index()
	{
		$data['jquery']=$this->jobs_model->read_jobs_all ();
		$this->load->view('template/header');
		$this->load->view('backend/jobs_all_type',$data);
		$this->load->view('template/footer');
	}
	public function add()
	{
		$this->load->view('template/header');
		$this->load->view('backend/jobs_type_form_add' , array('error' => ' ' ));
		$this->load->view('template/footer');
	}
	public function adding()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
 
		$this->form_validation->set_rules('j_name', 'ชื่อประเภทงาน', 'trim|required|min_length[4]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว'));

		               if ($this->form_validation->run() == FALSE)
		                {
						      	$this->load->view('template/header');
								$this->load->view('backend/่jobs_type_form_add' , array('error' => ' ' ));
								$this->load->view('template/footer');
		                }else{
 
		                	//check duplicate j_name
							$j_name = $this->input->post('j_name');
					        $this->db->select('j_name');
					        $this->db->where('j_name',$j_name);
					        $query = $this->db->get('job_type');
					        $num = $query->num_rows();
					                if($num > 0)
					                {
					                       $this->session->set_flashdata('check_duplicate', TRUE);
							    			redirect('addjobs','refresh');
					                }else{
							            $this->jobs_model->insert_jobs();
							            $this->session->set_flashdata('save_success', TRUE);
									    redirect('addjobs','refresh');
									}//check duplicate
					        }//form vali
	}
	public function edit($j_id)
	{
		$data['jedit']=$this->jobs_model->read($j_id);
 
		// echo '<pre>';
		// print_r($data['rsedit']);
		// echo '</pre>';
		// exit();
 
		$this->load->view('template/header');
		$this->load->view('backend/jobs_type_form_edit',$data);
		$this->load->view('template/footer');
	}
	public function editdata()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		//exit;
		$this->form_validation->set_rules('j_id', 'j_id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('j_name', 'ชื่อประเภทงาน', 'trim|required|min_length[4]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว'));
 
		if ($this->form_validation->run() == FALSE)
                {
                	$j_id = $this->input->post('j_id');
			        $data['jedit']=$this->jobs_model->read($j_id);
					$this->load->view('template/header');
					$this->load->view('backend/jobs_type_form_edit',$data);
					$this->load->view('template/footer');
                }else{
                	//exit;
					$this->jobs_model->update_jobs_type();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('addjobs','refresh');
                }
	}
	public function del($j_id)
	{
		$this->jobs_model->del_jobs($j_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('addjobs','refresh');
	}
}