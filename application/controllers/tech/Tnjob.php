<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tnjob extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			//chk admin status
		if($this->session->userdata('a_status') !=0){
			redirect('login/logout','refresh');
		}
		$this->load->model('data_model');
		$this->load->helper('url');
	}
	public function index()
	{
		//print_r($_SESSION);
		$data['query']=$this->data_model->tnall();
		$data['qstatus1']=$this->data_model->tstatus1();
		$data['qstatus2']=$this->data_model->tstatus2();
		$data['qstatus3']=$this->data_model->tstatus3();
		$data['qstatus4']=$this->data_model->tstatus4();
		$this->load->view('template2/header');
		$this->load->view('backend2/job_work',$data);
		$this->load->view('template2/footer');

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit();
	}
	public function del($cw_id)
	{
		$this->data_model->del_report_work($cw_id);
		//$this->session->set_flashdata('del_success', TRUE);
		redirect('/tech/tnjob','refresh');	
	}


//////////////////////PDF/////////////////////////////
	// public function pdfdetail($cw_id)
	// {
	// 	$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
	// 	$fontDirs = $defaultConfig['fontDir'];

	// 	$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
	// 	$fontData = $defaultFontConfig['fontdata'];

	// 	$mpdf = new \Mpdf\Mpdf([
	// 		'fontDir' => array_merge($fontDirs, [
	// 			__DIR__ . '/tmp',
	// 		]),
	// 		'fontdata' => $fontData + [ // lowercase letters only in font key
	// 			'sarabun' => [
	// 				'R' => 'THSarabunNew.ttf',
	// 				'I' => 'THSarabunNew Italic.ttf',
	// 				'B' => 'THSarabunNew Bold.ttf',
	// 				'BI' => 'THSarabunNew BoldItalic.ttf'
	// 			]
	// 		],
	// 		'default_font' => 'sarabun'
	// 	]);
	// 	$data['rp_detail'] = $this->data_model->print_report($cw_id);
    //     $html = $this->load->view('backend2/report',$data,TRUE);
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output();
	// }
}