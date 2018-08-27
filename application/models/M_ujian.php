<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ujian extends CI_Model {

	public function status($id, $status)
	{
		$this->db->set('status', $status);
		$this->db->where('id_ujian', $id);
		$this->db->update('tbl_ujian');
		if ($this->db->affected_rows() === 1) {
			$this->session->set_flashdata('color', 'green');
			$this->session->set_flashdata('message', 'Berhasil merubah data!');
			redirect('ujian','refresh');
		}
		else
		{
			$this->session->set_flashdata('color', 'red');
			$this->session->set_flashdata('message', 'Gagal merubah data!');
			redirect('ujian','refresh');
		}
	}

	public function delete($id)
	{
		$this->db->where('id_ujian', $id);
		$this->db->delete('tbl_ujian');
		if ($this->db->affected_rows() == 1) {
			$this->session->set_flashdata('color', 'green');
			$this->session->set_flashdata('message', 'Berhasil menghapus data!');
			redirect('ujian','refresh');
		}
		else
		{
			$this->session->set_flashdata('color', 'red');
			$this->session->set_flashdata('message', 'Gagal menghapus data!');	
			redirect('ujian','refresh');
		}
	}

	public function getDataUjian()
	{
		$this->db->select('ujian.*, siswa.nama');
		$this->db->from('tbl_ujian ujian');
		$this->db->join('tbl_siswa siswa', 'siswa.nisn = ujian.nisn');
		$data = $this->db->get()->result();
		return $data;
	}

	public function submit($file_name)
	{
		$nisn = $this->session->userdata('nisn');
		$username = $this->session->userdata('username');

		$getData = $this->getData();
		$rowsData = count($getData);

		if ($rowsData > 0) {
			$object = array('file_ujian'=>$file_name);
			$this->db->where('username', $username);
			$this->db->update('tbl_ujian', $object);

			if ($this->db->affected_rows() === 1) {
				$this->session->set_flashdata('color','#6ebc32');
				$this->session->set_flashdata('message', 'Berhasil mengupload!');
				redirect('ujian','refresh');
			}
			else
			{
				$this->session->set_flashdata('color','red');
				$this->session->set_flashdata('message', 'Mungkin server sedang sibuk!');
				redirect('ujian','refresh');
			}
		}
		else
		{
			$object = array('nisn' => $nisn, 'username'=>$username, 'file_ujian'=>$file_name );
			$this->db->insert('tbl_ujian', $object);

			if ($this->db->affected_rows() === 1) {
				$this->session->set_flashdata('color','#6ebc32');
				$this->session->set_flashdata('message', 'Berhasil mengupload!');
				redirect('ujian','refresh');
			}
			else
			{
				$this->session->set_flashdata('color','red');
				$this->session->set_flashdata('message', 'Mungkin server sedang sibuk!');
				redirect('ujian','refresh');
			}	
		}

		
	}

	public function getData()
	{
		$nisn = $this->session->userdata('nisn');
		$this->db->select('*');
		$this->db->from('tbl_ujian');
		$this->db->where('nisn', $nisn);
		$data = $this->db->get()->row();
		return $data;
	}

}

/* End of file M_ujian.php */
/* Location: ./application/models/M_ujian.php */