<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_daftar extends CI_Model {

	public function submit($post)
	{
		$data_user = array(
			'username' => $post['username'],
			'password' => $post['password'],
			'status'   => 2
		);
		$this->db->insert('tbl_user', $data_user);

		$data_siswa = array(
			'nisn' 			=> $post['nisn'],
			'username' 		=> $post['username'],
			'nama' 		    => $post['nama'],
			'asal_sekolah'  => $post['asal_sekolah'],
			'email' 	    => $post['email'],
			'jurusan' 	    => $post['jurusan'],
			'no_telepon'    => $post['no_telp'],
			'tempat_lahir'  => $post['tempat_lahir'],
			'tanggal_lahir' => date('Y-m-d', strtotime($post['tgl_lahir'])),
			'alamat' 		=> $post['alamat'],
		);
		$this->db->insert('tbl_siswa', $data_siswa);

		if ($this->db->affected_rows() === 1) {
			$result = TRUE;
		}
		else
		{
			$result = FALSE;
		}
		return $result;
	}

}

/* End of file M_daftar.php */
/* Location: ./application/models/M_daftar.php */