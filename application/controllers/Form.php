<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('jobs_model');
		$this->load->model('town_model');
		$this->load->model('item_model');
		$this->load->model('room_model');

	}



	public function index()
	{
		$data['j_detail']=$this->jobs_model->read_jobs_all();
		$data['t_detail']=$this->town_model->read_town_all();
		$data['r_detail']=$this->room_model->room_all();
		$data['i_detail']=$this->item_model->item_all();
		$this->load->view('home/header');
		$this->load->view('home/form_view' ,$data); //array('error' => ' ' )
		$this->load->view('home/footer');
	}


	public function adding()
	{
		$this->form_validation->set_rules('c_name', 'ชื่อผู้แจ้ง', 'trim|required|min_length[3]',
				array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 3 ตัว'));
		$this->form_validation->set_rules('j_name', 'ประเภทปัญหา', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('t_num', 'ตึก', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('r_name', 'ห้อง', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('i_codename', 'อุปกรณ์', 'trim|required|min_length[1]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'));
		$this->form_validation->set_rules('c_detail', 'รายละเอียดปัญหา', 'trim|required|min_length[5]',
                array('required' => 'กรุณากรอกข้อมูล %s.','min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 5 ตัว'));




		               if ($this->form_validation->run() == FALSE)
		                {

						      	$this->load->view('home/header');
								$this->load->view('home/form_view' , array('error' => ' ' ));
								$this->load->view('home/footer');
		                }else{
		                		//img
							 		$config['upload_path']= 'asset/uploads/';
					                $config['allowed_types']= 'gif|jpg|png|heif|raw|jpeg';
									$config['max_size']= 0;
					                $config['encrypt_name']= TRUE;

					                $this->load->library('upload', $config);
					                if ( ! $this->upload->do_upload('c_img'))
					                {
					                        $error = array('error' => $this->upload->display_errors());
					                        $this->load->view('home/header');
											$this->load->view('home/form_view' , $error);
											$this->load->view('home/footer');
					                }
									else{
					                	$this->data_model->insert_case();
					                	//last id by user case
					                	$data['qlastid']=$this->data_model->lastid($_POST['c_name']);
					                	//echo $_POST['p_email'];
					                	//print_r($data);
					                	//echo $data['qlastid']->id;
					                	$this->session->set_flashdata('save_success', TRUE);
					                	redirect('form/detail/'.$data['qlastid']->c_id,'refresh');
					                }

			                	
		                }  //}else{
		     	
	}
	public function detail($c_id)
	{
		$data['rs_detail']=$this->data_model->get_detail($c_id);
		//print_r($data);
		$this->load->view('home/header');
		$this->load->view('home/form_detail' ,$data);
		$this->load->view('home/footer');
	}

	public function allcase()
	{
		$data['query']=$this->data_model->all();
		$this->load->view('home/header');
		$this->load->view('home/list_case_view' ,$data);
		$this->load->view('home/footer');
	}
	public function action()
	{
		$t_num = $this->input->post('t_num');
		$room = $this->data_model->getroomOftown($t_num);
		echo '<option value  ="">กรุณาเลือกห้อง</option>';
		foreach($room as $ros){
			?>
			<option value = "<?php echo $ros->r_name;?>"><?php echo $ros->r_name,'  ',$ros->r_type;?></option>
			<?php
		}
	}
	public function action2()
	{
		$r_name = $this->input->post('r_name');
		$item = $this->data_model->getitemOfroom($r_name);

		echo '<option value  ="">กรุณาเลือกอุปกรณ์ที่ชำรุด</option>';
		foreach($item as $its){
			?>
			<option value = "<?php echo $its->i_codename;?>"><?php echo $its->i_address,'_',$its->i_codename,'  ',$its->i_name;?></option>
			<?php
		}
	}
}

