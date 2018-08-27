<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_daftar');
	}

	public function index()
	{
		$this->load->view('Daftar/daftar');
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
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_user.username]',
			array(
				'required' => 'Username tidak boleh kosong',
				'is_unique' => 'Username sudah ada'
			)
		);
		$this->form_validation->set_rules('nisn', 'NISN', 'trim|required|numeric|is_unique[tbl_siswa.nisn]',
			array(
				'required'=>'nisn tidak boleh kosong',
				'is_unique' => 'nisn sudah ada',
				'numeric' => 'nisn harus angka',
			)
		);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
			array('required'=>'password tidak boleh kosong')
		);
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required',
			array('required'=>'nama tidak boleh kosong')
		);
		$this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'trim|required',
			array('required'=>'asal sekolah tidak boleh kosong')
		);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
			array('required'=>'email tidak boleh kosong')
		);
		$this->form_validation->set_rules('jurusan', 'Ambil Jurusan', 'trim|required',
			array('required'=>'jurusan tidak boleh kosong')
		);
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'trim|required',
			array('required'=>'no telepon tidak boleh kosong')
		);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required',
			array('required'=>'tempat lahir tidak boleh kosong')
		);
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required|callback_date_valid',
			array('required'=>'tanggal lahir tidak boleh kosong')
		);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',
			array('required'=>'alamat tidak boleh kosong')
		);
		if ($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('error_username', form_error('username'));
			$this->session->set_flashdata('error_nisn', form_error('nisn'));
			$this->session->set_flashdata('error_password', form_error('password'));
			$this->session->set_flashdata('error_nama', form_error('nama'));
			$this->session->set_flashdata('error_asal', form_error('asal_sekolah'));
			$this->session->set_flashdata('error_email', form_error('email'));
			$this->session->set_flashdata('error_jurusan', form_error('jurusan'));
			$this->session->set_flashdata('error_no_telp', form_error('no_telp'));
			$this->session->set_flashdata('error_tempat_lahir', form_error('tempat_lahir'));
			$this->session->set_flashdata('error_tgl_lahir', form_error('tgl_lahir'));
			$this->session->set_flashdata('error_alamat', form_error('alamat'));

			$this->load->view('Daftar/daftar');
		}

		else 
		{
			$post = $this->input->post();
			$query = $this->M_daftar->submit($post);
			if ($query) {
				$this->session->set_flashdata('color', '#6ebc32');
				$this->session->set_flashdata('message', 'Berhasil mendaftar menjadi siswa. Silahkan login untuk melengkapi berkas berkas anda!');
				redirect('daftar','refresh');
			}
			else
			{
				$this->session->set_flashdata('color', 'red');
				$this->session->set_flashdata('message', 'Maaf gagal mendaftar. Mungkin server sedang sibuk!');
				redirect('daftar','refresh');
			}
		}
		
	}

}

/* End of file Daftar.php */
/* Location: ./application/controllers/Daftar.php */