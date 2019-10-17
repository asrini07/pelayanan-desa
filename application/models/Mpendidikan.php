<?php
	class Mpendidikan extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getpendidikan($cari) {
	   		if ($cari != "") {
				$this->db->like("id_pendidikan",$cari);
				$this->db->or_like("nama_pendidikan",$cari);
			}
	   		$q = $this->db->get('pendidikan');
	   		return $q;
	   	}

	   	function getpendidikandetail($id) {
	   		$this->db->where('id_pendidikan',$id);
	   		$q = $this->db->get('pendidikan');
	   		return $q->row();
	   	}

	   	function simpan_pendidikan($aksi) {
	   		$data = array(
	   					//'id_fakultas'	 => $this->input->post('id_fakultas'),
	   					'nama_pendidikan'  => $this->input->post('nama_pendidikan'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('pendidikan', $data);
					break;
				case 'ubah':
					$this->db->where('id_pendidikan', $this->input->post('idlama'));
					$this->db->update('pendidikan', $data);
					break;
			}
			
			return "success-Data Pendidikan berhasil disimpan";
	   	}

	   	function hapus_pendidikan($id) {
	   		$this->db->where('id_pendidikan',$id);
	   		$this->db->delete('pendidikan');
	   		return "danger-Data Pendidikan berhasil di hapus";
	   	}
	}
?>