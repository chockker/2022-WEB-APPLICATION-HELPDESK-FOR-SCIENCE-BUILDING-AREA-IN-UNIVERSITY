<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//chk admin status
		if($this->session->userdata('a_status') !=1){
			redirect('login/logout','refresh');
		}
		$this->load->model('item_model');
		$this->load->model('jobs_model');
		$this->load->model('floor_model');
		$this->load->model('room_model');
		$this->load->model('town_model');
	}

	public function index($r_name)
	{
		$data['query']=$this->item_model->read_item_all($r_name);
		//$data['iiq']=$this->item_model->read_town_floor($town,$floor);
		$this->load->view('template/header');
		$this->load->view('backend/item_all',$data);
		$this->load->view('template/footer');
	}
    public function add()
	{
		// $data['iadd']=$this->item_model->read_detail($i_id);
		$data['j_detail']=$this->jobs_model->read_jobs_all();
		$data['t_detail']=$this->town_model->read_town_all();
		$data['f_detail']=$this->floor_model->read_floor_all();
		$data['r_detail']=$this->room_model->room_all();
		$data['i_detail']=$this->item_model->item_all();
		$this->load->view('template/header');
		$this->load->view('backend/item_add' , $data);
		$this->load->view('template/footer');
	}

    public function adding()
	{
 
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
 
		$this->form_validation->set_rules('i_codename', 'รหัสอุปกรณ์', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('i_name', 'ชื่อ', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('j_name', 'ประเภท', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('t_num', 'เลขตึก', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('r_name', 'ห้อง', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
 
 
		               if ($this->form_validation->run() == FALSE)
		                {
						      	$this->load->view('template/header');
								$this->load->view('backend/item_add' , array('error' => ' ' ));
								$this->load->view('template/footer');
		                }else{
 
		                	//check duplicate fld_name
							$i_codename = $this->input->post('i_codename');
					        $this->db->select('i_codename');
					        $this->db->where('i_codename',$i_codename);
					        $query = $this->db->get('item');
					        $num = $query->num_rows();
					                if($num > 0)
					                {
					                       $this->session->set_flashdata('check_duplicate', TRUE);
							    			redirect('town','refresh');
					                }
                                    else{
                                            $this->item_model->insert_item();
                                            $this->session->set_flashdata('save_success', TRUE);
                                            redirect('item/adding','refresh');
                                        }
							}//check duplicate
	}//valid
	public function edit($i_id)
	{
		$data['iedit']=$this->item_model->read_detail($i_id);
		$data['j_detail']=$this->jobs_model->read_jobs_all();
		// echo '<pre>';
		// print_r($data['fledit']);
		// echo '</pre>';
		// exit();
 
		$this->load->view('template/header');
		$this->load->view('backend/item_edit',$data);
		$this->load->view('template/footer');
	}
 
	public function editdata()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		//exit;
		$this->form_validation->set_rules('i_codename', 'รหัสอุปกรณ์', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('i_name', 'ชื่อ', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('j_name', 'ประเภท', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('i_no_room', 'ห้อง', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('floor', 'ชั้น', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('town', 'เลขตึก', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		if ($this->form_validation->run() == FALSE)
                {
                	$i_id = $this->input->post('i_id');
			        $data['iedit']=$this->item_model-->read_detail($i_id);
					$this->load->view('template/header');
					$this->load->view('backend/item_edit',$data);
					$this->load->view('template/footer');
                }else{
					
					$this->item_model-->update_item();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('town','refresh');
					
                	//exit;
                }
	}
	public function del_item($i_id)
	{
		$this->item_model->del_item($i_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('town','refresh');	
	}
}