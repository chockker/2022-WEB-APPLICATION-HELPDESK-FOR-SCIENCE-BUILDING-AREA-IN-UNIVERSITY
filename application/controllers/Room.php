<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//chk admin status
		if($this->session->userdata('a_status') !=1 && $this->session->userdata('a_status') !=2){
			redirect('login/logout','refresh');
		}
		$this->load->model('room_model');
        $this->load->model('floor_model');
		$this->load->model('town_model');
	}

	public function index($town,$floor)
	{
		if($this->session->userdata('a_status') == 1){
			$data['query']=$this->room_model->read_room_all($town,$floor);
			$data['rrq']=$this->room_model->read_town_floor($town,$floor);
			$data['flplan']=$this->floor_model->read_flplan($town,$floor);
			$this->load->view('template/header');
			$this->load->view('backend/room_all',$data);
			$this->load->view('template/footer');
		}
		if($this->session->userdata('a_status') == 2){
			$data['query']=$this->room_model->read_room_all($town,$floor);
			$data['rrq']=$this->room_model->read_town_floor($town,$floor);
			$data['flplan']=$this->floor_model->read_flplan($town,$floor);
			$this->load->view('template2/header');
			$this->load->view('backend3/room_de_all_m',$data);
			$this->load->view('template2/footer');
		}
	}
	public function add()
	{
		$data['fqs']=$this->floor_model->read_floor_all();
		$data['tqs']=$this->town_model->read_town_all();
		$this->load->view('template/header');
		$this->load->view('backend/room_add' ,$data);
		$this->load->view('template/footer');
	}
	public function adding()
	{
 
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
 
		$this->form_validation->set_rules('r_name', 'ชื่อห้อง', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('r_type', 'ประเภทห้อง', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('floor', 'เลขชั้น', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('town', 'เลขตึก', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
 
 
		               if ($this->form_validation->run() == FALSE)
		                {
						      	$this->load->view('template/header');
								$this->load->view('backend/room_add' , array('error' => ' ' ));
								$this->load->view('template/footer');
		                }else{
 
		                	//check duplicate r_name
							$r_name = $this->input->post('r_name');
					        $this->db->select('r_name');
					        $this->db->where('r_name',$r_name);
					        $query = $this->db->get('room');
					        $num = $query->num_rows();
					                if($num > 0)
					                {
					                       $this->session->set_flashdata('check_duplicate', TRUE);
							    			redirect('allroom','refresh');
					                }
                                    else{
                                            $this->room_model->insert_room();
                                            $this->session->set_flashdata('save_success', TRUE);
                                            redirect('allroom','refresh');
									}//check duplicate
					        }//form vali
	}
	public function edit($r_id)
	{
		$data['rredit']=$this->room_model->read_detail($r_id);
 
		// echo '<pre>';
		// print_r($data['fledit']);
		// echo '</pre>';
		// exit();
 
		$this->load->view('template/header');
		$this->load->view('backend/room_edit',$data);
		$this->load->view('template/footer');
	}
 
	public function editdata()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		//exit;
		$this->form_validation->set_rules('r_name', 'ชื่อห้อง', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('r_type', 'ประเภทห้อง', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('floor', 'เลขชั้น', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('town', 'เลขตึก', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
				if ($this->form_validation->run() == FALSE)
                {
                	$r_id = $this->input->post('r_id');
			        $data['redit']=$this->room_model->read($r_id);
					$this->load->view('template/header');
					$this->load->view('backend/room_edit',$data);
					$this->load->view('template/footer');
                }else{
                	//exit;
					$this->room_model->update_room();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('allroom','refresh');
                }
	}
	public function del($r_id)
	{
		$this->room_model->del_room($r_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('allroom','refresh');	
	}
}