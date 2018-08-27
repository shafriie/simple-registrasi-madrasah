<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function submit($post)
	{
		$this->db->select('siswa.*,user.username as user_name, user.password as pass_word, user.status');
		$this->db->from('tbl_siswa as siswa');
		$this->db->join('tbl_user as user', 'siswa.username = user.username');
		$this->db->where('user.username', $post['username']);
		$this->db->or_where('siswa.nisn', $post['username']);
		$data = $this->db->get()->row();
		$rows = count($data);
		if ($rows > 0) {
			$this->db->select('siswa.*,user.username as user_name, user.password as pass_word, user.status');
			$this->db->from('tbl_siswa as siswa');
			$this->db->join('tbl_user as user', 'siswa.username = user.username');
			$this->db->where('user.username', $post['username']);
			$this->db->or_where('siswa.nisn', $post['username']);
			$this->db->where('user.password', $post['password']);
			$result = $this->db->get()->row();
			$r = count($result);
			if ($r > 0) {
				$array = array(
					'statusLoggedIn' => true,
					'nisn'    		 => $result->nisn,
					'username' 		 => $result->user_name,
					'status' 		 => $result->status,
				);
				
				$this->session->set_userdata( $array );

				redirect('home','refresh');
			}
			else
			{
				$this->session->set_flashdata('color', 'red');
				$this->session->set_flashdata('message', 'Password yang anda masukkan salah!');
				$this->load->view('Login/login');
			}
		}
		else
		{
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->where('username', $post['username']);
			$admin = $this->db->get()->row();
			$rowsAdmin = count($admin);

			if ($rowsAdmin > 0) {
				$this->db->select('*');
				$this->db->from('tbl_user');
				$this->db->where('username', $post['username']);
				$this->db->where('password', $post['password']);
				$r_admin = $this->db->get()->row();
				$row_admin = count($r_admin);
				if ($row_admin > 0) {
					$array = array(
						'statusLoggedIn' => true,
						// 'nisn'    		 => $r_admin->nisn,
						'username' 		 => $r_admin->username,
						'status' 		 => $r_admin->status,
					);
					
					$this->session->set_userdata( $array );

					redirect('home','refresh');
				}
				else
				{
					$this->session->set_flashdata('color', 'red');
					$this->session->set_flashdata('message', 'Password anda salah!');
					$this->load->view('Login/login');
				}
			}
			else
			{
				$this->session->set_flashdata('color', 'red');
				$this->session->set_flashdata('message', 'Username atau nisn tidak terdaftar!');
				$this->load->view('Login/login');
			}
			
		}

	}	

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */