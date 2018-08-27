<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_berkas');
	}

	public function index()
	{
		$status = $this->session->userdata('status');
		if ($status == 1) {
			$data['berkas'] = $this->M_berkas->getDataBerkas_Siswa();
			$this->load->view('Berkas/list_berkas', $data);
		}
		else
		{
			$data['berkas'] = $this->M_berkas->getData();
			$this->load->view('Berkas/berkas', $data);	
		}
		
	}

	public function status($id, $status)
	{
		$valueID = base64_decode($id);
		$query = $this->M_berkas->status($valueID, $status);
	}

	public function delete($id)
	{
		$valueID = base64_decode($id);
		$query = $this->M_berkas->delete($valueID);
	}

	public function submit()
	{
		$kk = array();
		$ijazah = array();
		$akte = array();
		$skhun = array();

		$config['upload_path'] = FCPATH.'upload/';
		$config['allowed_types'] = 'gif|jpg|png|JPG|PNG|jpeg|JPEG';
		$config['encrypt_name']  = true;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('kk')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$kk = $this->upload->data();
			
		}

		if ( ! $this->upload->do_upload('ijazah')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$ijazah = $this->upload->data();
		}

		if ( ! $this->upload->do_upload('akte')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$akte = $this->upload->data();
		}

		if ( ! $this->upload->do_upload('skhun')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$skhun = $this->upload->data();
		}

		$query = $this->M_berkas->submit($kk['file_name'], $ijazah['file_name'], $akte['file_name'], $skhun['file_name']);

	}

}

/* End of file Berkas.php */
/* Location: ./application/controllers/Berkas.php */