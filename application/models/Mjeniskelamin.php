<?php
	class Mjeniskelamin extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getdusun($cari) {
	   		if ($cari != "") {
				$this->db->like("id_jenis_kelamin",$cari);
				$this->db->or_like("nama_jenis_kelamin",$cari);
			}
	   		$q = $this->db->get('jenis_kelamin');
	   		return $q;
	   	}

	   	function getjeniskelamindetail($id) {
	   		$this->db->where('id_jenis_kelamin',$id);
	   		$q = $this->db->get('jenis_kelamin');
	   		return $q->row();
	   	}

	   	function simpan_jeniskelamin($aksi) {
	   		$data = array(
	   					'nama_jenis_kelamin'  => $this->input->post('nama_jenis_kelamin'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('jenis_kelamin', $data);
					break;
				case 'ubah':
					$this->db->where('id_jenis_kelamin', $this->input->post('idlama'));
					$this->db->update('jenis_kelamin', $data);
					break;
			}
			
			return "success-Data Jenis Kelamin berhasil disimpan";
	   	}

	   	function hapus_jeniskelamin($id) {
	   		$this->db->where('id_jenis_kelamin',$id);
	   		$this->db->delete('jenis_kelamin');
	   		return "danger-Data Jenis Kelamin berhasil di hapus";
	   	}
	}
?>