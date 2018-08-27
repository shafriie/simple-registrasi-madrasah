<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berkas extends CI_Model {

	public function status($id, $status)
	{
		$this->db->set('status', $status);
		$this->db->where('id_document', $id);
		$this->db->update('tbl_document');
		if ($this->db->affected_rows() === 1) {
			$this->session->set_flashdata('color', 'green');
			$this->session->set_flashdata('message', 'Berhasil merubah data!');
			redirect('berkas','refresh');
		}
		else
		{
			$this->session->set_flashdata('color', 'red');
			$this->session->set_flashdata('message', 'Gagal merubah data!');
			redirect('berkas','refresh');
		}
	}

	public function delete($id)
	{
		$this->db->where('id_document', $id);
		$this->db->delete('tbl_document');
		if ($this->db->affected_rows() === 1) {
			$this->session->set_flashdata('color', 'green');
			$this->session->set_flashdata('message', 'Berhasil menghapus data!');
			redirect('berkas','refresh');
		}
		else
		{
			$this->session->set_flashdata('color', 'red');
			$this->session->set_flashdata('message', 'Gagal menghapus data!');
			redirect('berkas','refresh');
		}
	}

	public function getDataBerkas_Siswa()
	{
		$this->db->select('document.*, siswa.nama');
		$this->db->from('tbl_document document');
		$this->db->join('tbl_siswa siswa', 'siswa.nisn = document.nisn');
		$data = $this->db->get()->result();
		return $data;
	}

	public function getData()
	{
		$nisn = $this->session->userdata('nisn');
		$username = $this->session->userdata('username');

		$this->db->select('*');
		$this->db->from('tbl_document');
		$this->db->where('username', $username);
		$this->db->limit(1);
		$data = $this->db->get()->row();
		return $data;
	}

	public function submit($kk, $ijazah, $akte, $skhun)
	{
		$nisn = $this->session->userdata('nisn');
		$username = $this->session->userdata('username');
		
		$this->db->select('*');
		$this->db->from('tbl_document');
		$this->db->where('nisn', $nisn);
		$document = $this->db->get()->row();
		$rows_document = count($document);
		if ($rows_document > 0) {

			$data_document = array(
				'kk' 	   => $kk,
				'ijazah'   => $ijazah,
				'akte' 	   => $akte,
				'skhun'    => $skhun,
				'status'   => 0
			);
			$this->db->where('username', $username);
			$this->db->update('tbl_document', $data_document);

			if ($this->db->affected_rows() === 1) {
				$this->session->set_flashdata('color','#6ebc32');
				$this->session->set_flashdata('message', 'Berhasil mengupload berkas!');
				redirect('berkas','refresh');
			}
			else
			{
				$this->session->set_flashdata('color','red');
				$this->session->set_flashdata('message', 'Gagal mengupload berkas!');
				redirect('berkas','refresh');
			}
		}
		else
		{
			$data_document = array(
				'nisn'     => $nisn,
				'username' => $username,
				'kk' 	   => $kk,
				'ijazah'   => $ijazah,
				'akte' 	   => $akte,
				'skhun'    => $skhun,
				'status'   => 0
			);
			$this->db->insert('tbl_document', $data_document);

			if ($this->db->affected_rows() === 1) {
				$this->session->set_flashdata('color','#6ebc32');
				$this->session->set_flashdata('message', 'Berhasil mengupload berkas!');
				redirect('berkas','refresh');
			}
			else
			{
				$this->session->set_flashdata('color','red');
				$this->session->set_flashdata('message', 'Gagal mengupload berkas!');
				redirect('berkas','refresh');
			}
		}
	}	
}

/* End of file M_berkas.php */
/* Location: ./application/models/M_berkas.php */