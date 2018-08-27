<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Safri extends CI_Controller {

	public function index()
	{
		$data_header['nama'] = 'Syafrie Syamsudin';
		$this->load->view('header', $data_header);
		
		$data['content'] = 'Content Terbaru';
		$this->load->view('Home', $data);

		$data_footer['footer'] = 'Copyrights 2018';
		$this->load->view('footer', $data_footer);
	}

}

/* End of file Safri.php */
/* Location: ./application/controllers/Safri.php */