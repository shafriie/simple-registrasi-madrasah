<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$logged = $this->session->userdata('statusLoggedIn');
		if ($logged) {
			$this->load->view('Home/home_if_login');
		}
		else
		{
			$this->load->view('Home/home');			
		}
		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */