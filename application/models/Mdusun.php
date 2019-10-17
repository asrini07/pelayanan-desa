<?php
	class Mdusun extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getdusun($cari) {
	   		if ($cari != "") {
				$this->db->like("id_dusun",$cari);
				$this->db->or_like("nama_dusun",$cari);
			}
	   		$q = $this->db->get('dusun');
	   		return $q;
	   	}

	   	function getdusundetail($id) {
	   		$this->db->where('id_dusun',$id);
	   		$q = $this->db->get('dusun');
	   		return $q->row();
	   	}

	   	function simpan_dusun($aksi) {
	   		$data = array(
	   					'nama_dusun'  => $this->input->post('nama_dusun'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('dusun', $data);
					break;
				case 'ubah':
					$this->db->where('id_dusun', $this->input->post('idlama'));
					$this->db->update('dusun', $data);
					break;
			}
			
			return "success-Data Dusun berhasil disimpan";
	   	}

	   	function hapus_dusun($id) {
	   		$this->db->where('id_dusun',$id);
	   		$this->db->delete('dusun');
	   		return "danger-Data Dusun berhasil di hapus";
	   	}
	}
?>