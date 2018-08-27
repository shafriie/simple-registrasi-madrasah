<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_ujian');
	}

	public function index()
	{
		$status = $this->session->userdata('status');
		if ($status == 1) {
			$data['ujian'] = $this->M_ujian->getDataUjian();
			$this->load->view('Ujian/list_ujian', $data);
		}
		else
		{
			$data['ujian'] = $this->M_ujian->getData();
			$this->load->view('Ujian/ujian', $data);
		}
		
	}

	public function status($id, $status)
	{
		$valueID = base64_decode($id);
		$query = $this->M_ujian->status($valueID, $status);
	}

	public function delete($id)
	{
		$valueID = base64_decode($id);
		$query = $this->M_ujian->delete($valueID);
	}

	public function submit()
	{
		$data_ujian = array();
		$config['upload_path'] = FCPATH . 'upload_ujian';
		$config['allowed_types'] = 'doc|docx';
		$config['encrypt_name']  = true;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('soal')){
			$this->session->set_flashdata('color', 'red');
			$this->session->set_flashdata('message', $this->upload->display_errors());
			redirect('ujian','refresh');
		}
		else{
			$data_ujian = $this->upload->data();
			$query = $this->M_ujian->submit($data_ujian['file_name']);
		}
	}

}

/* End of file Ujian.php */
/* Location: ./application/controllers/Ujian.php */