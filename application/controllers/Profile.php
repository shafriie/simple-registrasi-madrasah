<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_profile');
	}

	public function index()
	{
		$status = $this->session->userdata('status');
		if ($status == 1) {
			$data['profile'] = $this->M_profile->getDataProfileAdmin();
			$this->load->view('Profile/profile_admin', $data);	
		}
		else
		{
			$data['profile'] = $this->M_profile->getDataProfile();
			$data['berkas'] = $this->M_profile->getStatusBerkas();
			$data['ujian'] = $this->M_profile->getStatusUjian();
			$this->load->view('Profile/profile', $data);	
		}
		
	}

	public function date_valid($date)
	{
		$parts = explode("-", $date);
		if (count($parts) == 3) {      
			if ( is_numeric($parts[0]) && is_numeric($parts[1]) && is_numeric($parts[2]) ) {
				if (checkdate($parts[0], $parts[1], $parts[2]))
				{
					return TRUE;
				}
			}
			else
			{
				$this->form_validation->set_message('date_valid', 'format tanggal harus dd-mm-yyyy');
				return FALSE;
			}
		}
		$this->form_validation->set_message('date_valid', 'format tanggal harus dd-mm-yyyy');
		return FALSE;
	}

	public function submit()
	{
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required|callback_date_valid',
			array('required'=>'tanggal lahir tidak boleh kosong')
		);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_tanggal_lahir', form_error('tanggal_lahir'));
			redirect('profile','refresh');
		} 
		else 
		{
			$post = $this->input->post();
			$query = $this->M_profile->submit($post);
			// print_r($post);
		}
		
	}

	public function submit_admin()
	{
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required|callback_date_valid',
			array('required'=>'tanggal lahir tidak boleh kosong')
		);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_tanggal_lahir', form_error('tanggal_lahir'));
			redirect('profile','refresh');
		} 
		else 
		{
			$post = $this->input->post();
			$query = $this->M_profile->submit_admin($post);
		}
		
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */