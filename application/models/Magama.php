<?php
	class Magama extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getagama($cari) {
	   		if ($cari != "") {
				$this->db->like("id_agama",$cari);
				$this->db->or_like("nama_agama",$cari);
			}
	   		$q = $this->db->get('agama');
	   		return $q;
	   	}

	   	function getagamadetail($id) {
	   		$this->db->where('id_agama',$id);
	   		$q = $this->db->get('agama');
	   		return $q->row();
	   	}

	   	function simpan_agama($aksi) {
	   		$data = array(
	   					'nama_agama'  => $this->input->post('nama_agama'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('agama', $data);
					break;
				case 'ubah':
					$this->db->where('id_agama', $this->input->post('idlama'));
					$this->db->update('agama', $data);
					break;
			}
			
			return "success-Data Agama berhasil disimpan";
	   	}

	   	function hapus_agama($id) {
	   		$this->db->where('id_agama',$id);
	   		$this->db->delete('agama');
	   		return "danger-Data Agama berhasil di hapus";
	   	}
	}
?>