<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('Login/login');
	}

	public function submit()
	{
		$post = $this->input->post();
		$query = $this->M_login->submit($post);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */