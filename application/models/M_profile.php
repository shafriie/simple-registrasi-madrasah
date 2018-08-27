<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {

	public function getDataProfileAdmin()
	{
		$username = $this->session->userdata('username');
		$this->db->select('admin.*, user.password, user.status');
		$this->db->from('tbl_user user');
		$this->db->join('tbl_admin admin', 'user.username = admin.username');
		$this->db->where('user.username', $username);
		$data = $this->db->get()->row();
		return $data;
	}

	public function submit_admin($post)
	{
		$data_user = array(
			'password' => $post['password'],
		);
		$this->db->where('username', $post['username']);
		$this->db->update('tbl_user', $data_user);

		$data_admin = array(
			'nama' 		    => $post['nama'],
			'jenis_kelamin' => $post['jenis_kelamin'],
			'tempat_lahir'  => $post['tempat_lahir'],
			'tanggal_lahir' => date('Y-m-d', strtotime($post['tanggal_lahir'])),
			'alamat' 		=> $post['alamat'],
		);
		$this->db->where('username', $post['username']);
		$this->db->update('tbl_admin', $data_admin);

		$this->session->set_flashdata('color', 'green');
		$this->session->set_flashdata('message', 'Berhasil merubah data profile!');
		redirect('profile','refresh');
		
		// if ($this->db->affected_rows() === 1) {
		// 	$this->session->set_flashdata('color', 'green');
		// 	$this->session->set_flashdata('message', 'Berhasil merubah data profile!');
		// 	redirect('profile','refresh');
		// }
		// else
		// {
		// 	$this->session->set_flashdata('color', 'red');
		// 	$this->session->set_flashdata('message', 'Tidak ada yang di update!');
		// 	redirect('profile','refresh');
		// }
	}

	public function submit($post)
	{
		$data_user = array(
			'password' => $post['password'],
		);
		$this->db->where('username', $post['username']);
		$this->db->update('tbl_user', $data_user);

		$data_siswa = array(
			'nama' 		    => $post['nama'],
			'asal_sekolah'  => $post['asal_sekolah'],
			'email' 	    => $post['email'],
			'jurusan' 	    => $post['jurusan'],
			'no_telepon'    => $post['no_telp'],
			'tempat_lahir'  => $post['tempat_lahir'],
			'tanggal_lahir' => date('Y-m-d', strtotime($post['tanggal_lahir'])),
			'alamat' 		=> $post['alamat'],
		);
		$this->db->where('nisn', $post['nisn']);
		$this->db->update('tbl_siswa', $data_siswa);

		$this->session->set_flashdata('color', 'green');
		$this->session->set_flashdata('message', 'Berhasil merubah data profile!');
		redirect('profile','refresh');
		
		// if ($this->db->affected_rows() === 1) {
		// 	$this->session->set_flashdata('color', 'green');
		// 	$this->session->set_flashdata('message', 'Berhasil merubah data profile!');
		// 	redirect('profile','refresh');
		// }
		// else
		// {
		// 	$this->session->set_flashdata('color', 'red');
		// 	$this->session->set_flashdata('message', 'Tidak ada yang di update!');
		// 	redirect('profile','refresh');
		// }
	}

	public function getDataProfile()
	{
		$username = $this->session->userdata('username');
		$this->db->select('siswa.*,user.username as user_name, user.password as pass_word, user.status');
		$this->db->from('tbl_siswa as siswa');
		$this->db->join('tbl_user as user', 'siswa.username = user.username');
		$this->db->where('user.username', $username);
		$data = $this->db->get()->row();
		$rows = count($data);
		if ($rows > 0) {
			return $data;
		}
	}

	public function getStatusBerkas()
	{
		$nisn = $this->session->userdata('nisn');
		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('tbl_document');
		$this->db->where('nisn', $nisn);
		$this->db->limit(1);
		$data = $this->db->get()->row();
		$rows = count($data);

		if ($rows > 0) {
			if ($data->status == 0) {
				$status = array('status' => 'Pending', 'color'=>'yellow' );
			}
			else if ($data->status == 1) {
				$status = array('status' => 'Verifikasi', 'color'=>'green' );
			}
			else if ($data->status == 2) {
				$status = array('status' => 'Reject', 'color'=>'red' );
			}
			return $status;
		}
	}	

	public function getStatusUjian()
	{
		$nisn = $this->session->userdata('nisn');
		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('tbl_ujian');
		$this->db->where('nisn', $nisn);
		$this->db->limit(1);
		$data = $this->db->get()->row();
		$rows = count($data);

		if ($rows > 0) {
			if ($data->status == 0) {
				$status = array('status' => 'Pending', 'color'=>'yellow' );
			}
			else if ($data->status == 1) {
				$status = array('status' => 'Verifikasi', 'color'=>'green' );
			}
			else if ($data->status == 2) {
				$status = array('status' => 'Reject', 'color'=>'red' );
			}
			return $status;
		}
		
	}	

}

/* End of file M_profile.php */
/* Location: ./application/models/M_profile.php */