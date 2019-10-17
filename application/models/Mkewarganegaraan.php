<?php
	class Mkewarganegaraan extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getkewarganegaraan($cari) {
	   		if ($cari != "") {
				$this->db->like("id_kewarganegaraan",$cari);
				$this->db->or_like("nama_kewarganegaraan",$cari);
			}
	   		$q = $this->db->get('kewarganegaraan');
	   		return $q;
	   	}

	   	function getkewarganegaraandetail($id) {
	   		$this->db->where('id_kewarganegaraan',$id);
	   		$q = $this->db->get('kewarganegaraan');
	   		return $q->row();
	   	}

	   	function simpan_kewarganegaraan($aksi) {
	   		$data = array(
	   					'nama_kewarganegaraan'  => $this->input->post('nama_kewarganegaraan'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('kewarganegaraan', $data);
					break;
				case 'ubah':
					$this->db->where('id_kewarganegaraan', $this->input->post('idlama'));
					$this->db->update('kewarganegaraan', $data);
					break;
			}
			
			return "success-Data Dusun berhasil disimpan";
	   	}

	   	function hapus_kewarganegaraan($id) {
	   		$this->db->where('id_kewarganegaraan',$id);
	   		$this->db->delete('kewarganegaraan');
	   		return "danger-Data Kewarganegaraan berhasil di hapus";
	   	}
	}
?>