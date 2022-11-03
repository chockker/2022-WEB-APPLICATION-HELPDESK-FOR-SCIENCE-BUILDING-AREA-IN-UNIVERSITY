<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}
 
	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/login_view' , array('error' => ' ' ));
		$this->load->view('home/footer');
	}
 
	public function authen()
	{
 
		if($this->input->post('a_username')==''){
			redirect('login','refresh');
		}else{
				$result = $this->admin_model->fetch_user_login(
				$this->input->post('a_username'),
				sha1($this->input->post('a_password'))
			);
		
			if(!empty($result)){
				//create session var & value
				$sess=array(
					'id'    		=> $result->id,
					'a_status'    	=> $result->a_status,
					'a_name'		=> $result->a_name
				);
 
				$this->session->set_userdata($sess);
				///admin status
				$a_status = $_SESSION['a_status'];
				if($a_status==1){
					///echo 'r u admin';
					redirect('jobs','refresh');
				}
				elseif($a_status==0)
				{
					///echo 'r u tech';
					redirect('tech/tnjob','refresh');
				}else{
					///u not admin
					//$this->session->set_flashdata('login_error', TRUE);
					$this->session->unset_userdata(array('id','a_status','a_name'));
					redirect('login', 'refresh');
				}
				
			}else{
				//$this->session->set_flashdata('login_error', TRUE);
				$this->session->unset_userdata(array('id','a_status','a_name'));
				redirect('login', 'refresh');
			}
		}
	}
    public function logout()
    {
        //$this->session->set_flashdata('logout_success', TRUE);
        $this->session->unset_userdata(array('id','a_status','a_name'));
        redirect('', 'refresh');
    }
}