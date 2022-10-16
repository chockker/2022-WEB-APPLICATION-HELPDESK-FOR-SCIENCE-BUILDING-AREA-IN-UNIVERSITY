<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfcv extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//chk admin status
		if($this->session->userdata('a_status') !=0){
			redirect('login/logout','refresh');
		}
		$this->load->model('data_model');
		$this->load->library('pdf');
	}
	public function index($cw_id)
	{
		$data['rp_detail']=$this->data_model->print_report($cw_id);
		$this->load->view('backend2/printpdf',$data);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit();
	}
	public function pdfdetail($cw_id)
	{
		$html_content = '<h3 align="center">Convert HTML to PDF in CodeIgniter using Dompdf</h3>';
		$html_content .= $this->data_model->print_report($cw_id);
		$this->pdf->loadHtml($html_content);
		$this->pdf->render();
		$this->pdf->stream("".$cw_id.".pdf", array("Attachment"=>0));
	}
}