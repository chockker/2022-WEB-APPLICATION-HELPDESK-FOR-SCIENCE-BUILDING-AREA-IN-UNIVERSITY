<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conclude extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		//chk admin status
		if($this->session->userdata('a_status') !=1 && $this->session->userdata('a_status') !=2){
				redirect('login/logout','refresh');
		}
		$this->load->model('data_model');
		$this->load->model('admin_model');
		$this->load->helper('url');
	}
    public function index()
	{
		if($this->session->userdata('a_status') ==1)
		{
			$this->load->view('template/header');
			$this->load->view('backend/conclude_select');
			$this->load->view('template/footer');
		}
		elseif($this->session->userdata('a_status') ==2)
		{
			$this->load->view('template2/header');
			$this->load->view('backend/conclude_select');
			$this->load->view('template2/footer');
		}
	}
	public function view_date()
	{
		if($this->session->userdata('a_status') ==1){
			$data['query']=$this->data_model->all();
			$data['querytype']=$this->data_model->countbycasetype();
			$data['querystatus']=$this->data_model->countbycasestatus();
			$data['queryitem']=$this->data_model->countbyitem();
			$this->load->view('template/header');
			$this->load->view('backend/conclude_job',$data);
			$this->load->view('template/footer');
		}
		elseif($this->session->userdata('a_status') ==2){
			$data['query']=$this->data_model->all();
			$data['querytype']=$this->data_model->countbycasetype();
			$data['querystatus']=$this->data_model->countbycasestatus();
			$data['queryitem']=$this->data_model->countbyitem();
			$this->load->view('template2/header');
			$this->load->view('backend/conclude_job',$data);
			$this->load->view('template2/footer');
		}
	}

	public function view_month()
	{
		if($this->session->userdata('a_status') ==1){
			$data['query']=$this->data_model->all();
			$data['querytype']=$this->data_model->countbycasetype();
			$data['querystatus']=$this->data_model->countbycasestatus();
			$data['queryitem']=$this->data_model->countbyitem();
			$this->load->view('template/header');
			$this->load->view('backend/conclude_job_month',$data);
			$this->load->view('template/footer');
		}
		elseif($this->session->userdata('a_status') ==2){
			$data['query']=$this->data_model->all();
			$data['querytype']=$this->data_model->countbycasetype();
			$data['querystatus']=$this->data_model->countbycasestatus();
			$data['queryitem']=$this->data_model->countbyitem();
			$this->load->view('template2/header');
			$this->load->view('backend/conclude_job_month',$data);
			$this->load->view('template2/footer');
		}
	}
	public function view_year()
	{
		if($this->session->userdata('a_status') ==1){
			$data['query']=$this->data_model->all();
			$data['querytype']=$this->data_model->countbycasetype();
			$data['querystatus']=$this->data_model->countbycasestatus();
			$data['queryitem']=$this->data_model->countbyitem();
			$this->load->view('template/header');
			$this->load->view('backend/conclude_job_year',$data);
			$this->load->view('template/footer');
		}
		elseif($this->session->userdata('a_status') ==2){
			$data['query']=$this->data_model->all();
			$data['querytype']=$this->data_model->countbycasetype();
			$data['querystatus']=$this->data_model->countbycasestatus();
			$data['queryitem']=$this->data_model->countbyitem();
			$this->load->view('template2/header');
			$this->load->view('backend/conclude_job_year',$data);
			$this->load->view('template2/footer');
		}
	}

    public function between_date()
	{
		$date_start = $this->input->post('f_date');
		$date_end = $this->input->post('t_date');

		if($this->session->userdata('a_status') ==1){
			$data['query']=$this->data_model->date_report_query($date_start,$date_end);
			$data['querytype']=$this->data_model->date_report_chart_1($date_start,$date_end);
			$data['querystatus']=$this->data_model->date_report_chart_2($date_start,$date_end);
			$data['queryitem']=$this->data_model->countbyitem2($date_start,$date_end);
			$this->load->view('template/header');
			$this->load->view('backend/conclude_job',$data);
			$this->load->view('template/footer');
		}
		elseif($this->session->userdata('a_status') ==2){
			$data['query']=$this->data_model->date_report_query($date_start,$date_end);
			$data['querytype']=$this->data_model->date_report_chart_1($date_start,$date_end);
			$data['querystatus']=$this->data_model->date_report_chart_2($date_start,$date_end);
			$data['queryitem']=$this->data_model->countbyitem2($date_start,$date_end);
			$this->load->view('template2/header');
			$this->load->view('backend/conclude_job',$data);
			$this->load->view('template2/footer');
		}
		
	}

	public function view_by_month()
	{
		$m_date = $this->input->post('m_date');
		$y_date = $this->input->post('y_date');

		if($this->session->userdata('a_status') ==1){
			$data['query']=$this->data_model->date_month_report_query($m_date,$y_date);
			$data['querytype']=$this->data_model->date_month_report_chart_1($m_date,$y_date);
			$data['querystatus']=$this->data_model->date_month_report_chart_2($m_date,$y_date);
			$data['queryitem']=$this->data_model->countbyitem3($m_date,$y_date);
			$this->load->view('template/header');
			$this->load->view('backend/conclude_job_month',$data);
			$this->load->view('template/footer');
		}
		elseif($this->session->userdata('a_status') ==2){
			$data['query']=$this->data_model->date_month_report_query($m_date,$y_date);
			$data['querytype']=$this->data_model->date_month_report_chart_1($m_date,$y_date);
			$data['querystatus']=$this->data_model->date_month_report_chart_2($m_date,$y_date);
			$data['queryitem']=$this->data_model->countbyitem3($m_date,$y_date);
			$this->load->view('template2/header');
			$this->load->view('backend/conclude_job_month',$data);
			$this->load->view('template2/footer');
		}
	}

	public function view_by_year()
	{
		$yy_date = $this->input->post('yy_date');

		if($this->session->userdata('a_status') ==1){
			$data['query']=$this->data_model->date_year_report_query($yy_date);
			$data['querytype']=$this->data_model->date_year_report_chart_1($yy_date);
			$data['querystatus']=$this->data_model->date_year_report_chart_2($yy_date);
			$data['queryitem']=$this->data_model->countbyitem4($yy_date);
			$this->load->view('template/header');
			$this->load->view('backend/conclude_job_year',$data);
			$this->load->view('template/footer');
		}
		elseif($this->session->userdata('a_status') ==2){
			$data['query']=$this->data_model->date_year_report_query($yy_date);
			$data['querytype']=$this->data_model->date_year_report_chart_1($yy_date);
			$data['querystatus']=$this->data_model->date_year_report_chart_2($yy_date);
			$data['queryitem']=$this->data_model->countbyitem4($yy_date);
			$this->load->view('template2/header');
			$this->load->view('backend/conclude_job_year',$data);
			$this->load->view('template2/footer');
		}
	}
}