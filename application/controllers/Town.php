<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Town extends CI_Controller {

    public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('a_status') !=1 && $this->session->userdata('a_status') !=2){
			redirect('login/logout','refresh');
		}
		$this->load->model('town_model');
    }
    public function index()
	{
		if($this->session->userdata('a_status') ==1)
		{
			$data['jquery']=$this->town_model->read_town_all ();
			$this->load->view('template/header');
			$this->load->view('backend/town_all',$data);
			$this->load->view('template/footer');
		}
		if($this->session->userdata('a_status') ==2)
		{
			$data['jquery']=$this->town_model->read_town_all ();
			$this->load->view('template2/header');
			$this->load->view('backend3/town_all_m',$data);
			$this->load->view('template2/footer');
		}
	}
    public function add()
	{
		$this->load->view('template/header');
		$this->load->view('backend/town_form_add' , array('error' => ' ' ));
		$this->load->view('template/footer');
	}
    public function adding()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
 
		$this->form_validation->set_rules('t_num', 'เลขตึก', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
        $this->form_validation->set_rules('t_name', 'ชื่อตึก', 'trim|required|min_length[4]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว'));
        $this->form_validation->set_rules('t_fl_amt', 'จำนวนชั้น', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));

		               if ($this->form_validation->run() == FALSE)
		                {
						      	$this->load->view('template/header');
								$this->load->view('backend/่town_form_add' , array('error' => ' ' ));
								$this->load->view('template/footer');
		                }else{
 
		                	//check duplicate t_num
							$t_num = $this->input->post('t_num');
					        $this->db->select('t_num');
					        $this->db->where('t_num',$t_num);
					        $query = $this->db->get('town');
					        $num = $query->num_rows();
					                if($num > 0)
					                {
					                       $this->session->set_flashdata('check_duplicate', TRUE);
							    			redirect('town','refresh');
					                }else{
							            $this->town_model->insert_town();
							            $this->session->set_flashdata('save_success', TRUE);
									    redirect('town','refresh');
									}//check duplicate
					        }//form vali
	}
    public function edit($t_id)
	{
		$data['tedit']=$this->town_model->read($t_id);
 
		// echo '<pre>';
		// print_r($data['rsedit']);
		// echo '</pre>';
		// exit();
 
		$this->load->view('template/header');
		$this->load->view('backend/town_form_edit',$data);
		$this->load->view('template/footer');
	}
	public function editdata()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		//exit;
		$this->form_validation->set_rules('t_num', 'เลขตึก', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('t_name', 'ชื่ออาคาร', 'trim|required|min_length[4]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว'));
		$this->form_validation->set_rules('t_fl_amt', 't_fl_amt', 'trim|required|min_length[1]');
 
		if ($this->form_validation->run() == FALSE)
                {
                	$t_id = $this->input->post('t_id');
			        $data['tedit']=$this->town_model->read($t_id);
					$this->load->view('template/header');
					$this->load->view('backend/town_form_edit',$data);
					$this->load->view('template/footer');
                }else{
                	//exit;
					$this->town_model->update_town();
					$this->session->set_flashdata('save_success', TRUE);
					redirect('town','refresh');
                }
	}
    public function del($t_id)
	{
		$this->town_model->del_town($t_id);
		$this->session->set_flashdata('del_success', TRUE);
		redirect('town','refresh');
	}
}