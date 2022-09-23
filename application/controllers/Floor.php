<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Floor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//chk admin status
		if($this->session->userdata('a_status') !=1){
			redirect('login/logout','refresh');
		}
		$this->load->model('floor_model');
	}

	public function index()
	{
		$data['query']=$this->floor_model->read_floor_list ();
		$this->load->view('template/header');
		$this->load->view('backend/floor_detail_all',$data);
		$this->load->view('template/footer');
	}
	public function add()
	{
		$this->load->view('template/header');
		$this->load->view('backend/floor_detail_add' , array('error' => ' ' ));
		$this->load->view('template/footer');
	}
 
	public function adding_detail()
	{
 
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
 
		$this->form_validation->set_rules('fld_name', 'ชื่อชั้น', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('floor', 'ชั้น', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('town', 'เลขตึก', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
 
 
		               if ($this->form_validation->run() == FALSE)
		                {
						      	$this->load->view('template/header');
								$this->load->view('backend/floor_detail_add' , array('error' => ' ' ));
								$this->load->view('template/footer');
		                }else{
 
		                	//check duplicate fld_name
							$fld_name = $this->input->post('fld_name');
					        $this->db->select('fld_name');
					        $this->db->where('fld_name',$fld_name);
					        $query = $this->db->get('floor_detail');
					        $num = $query->num_rows();
					                if($num > 0)
					                {
					                       $this->session->set_flashdata('check_duplicate', TRUE);
							    			redirect('floor','refresh');
					                }
                                    else{
                                        $config['upload_path']= 'asset/uploads/floor_plan/';
					                    $config['allowed_types']= 'gif|jpg|png|heif|raw|jpeg';
					                    $config['encrypt_name']= FALSE;

					                    $this->load->library('upload', $config);
					                    if ( ! $this->upload->do_upload('fld_img'))
					                    {
					                            $error = array('error' => $this->upload->display_errors());
					                            $this->load->view('template/header');
											    $this->load->view('backend/floor_detail_add' , $error);
											    $this->load->view('template/footer');
					                    }
									    else{
                                                $this->floor_model->insert_floor_detail();
                                                $this->session->set_flashdata('save_success', TRUE);
                                                redirect('floor','refresh');
                                        }
									}//check duplicate
					        }//form vali
	}
	public function edit($fld_id)
	{
		$data['fledit']=$this->floor_model->read_detail($fld_id);
 
		// echo '<pre>';
		// print_r($data['fledit']);
		// echo '</pre>';
		// exit();
 
		$this->load->view('template/header');
		$this->load->view('backend/floor_detail_edit',$data);
		$this->load->view('template/footer');
	}
 
	public function editdata()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		//exit;
		$this->form_validation->set_rules('fld_name', 'fld_name', 'trim|required|min_length[1]',
				array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('floor', 'ชั้น', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('town', 'ตึก', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		if ($this->form_validation->run() == FALSE)
                {
                	$fld_id = $this->input->post('fld_id');
			        $data['fledit']=$this->floor_model-->read_detail($fld_id);
					$this->load->view('template/header');
					$this->load->view('backend/floor_detail_edit',$data);
					$this->load->view('template/footer');
                }else{
					$config['upload_path']= 'asset/uploads/floor_plan/';
					$config['allowed_types']= 'gif|jpg|png|heif|raw|jpeg';
					$config['encrypt_name']= FALSE;
					$this->load->library('upload', $config);
					if(! $this->upload->do_upload('fld_img'))
					{
						$this->floor_model-->update_floor_detail();
						$this->session->set_flashdata('save_success', TRUE);
						redirect('floor','refresh');
					}
                	//exit;
                }
	}

	public function show_floor_item($fld_id)
	{	
		$data['flplan']=$this->floor_model->read_detail($fld_id);
		$this->load->view('template/header');
		$this->load->view('backend/floor_item_all' , $data);
		$this->load->view('template/footer');
	}
	public function del_fld($fld_id)
	{
		$this->floor_model->del_floor_detail($fld_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('floor','refresh');	
	}
}