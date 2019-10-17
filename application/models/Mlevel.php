<?php
	class Mlevel extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getlevel($cari) {
	   		if ($cari != "") {
				$this->db->like("id_level",$cari);
				$this->db->or_like("nama_level",$cari);
			}
	   		$q = $this->db->get('level');
	   		return $q;
	   	}

	   	function getleveldetail($id) {
	   		$this->db->where('id_level',$id);
	   		$q = $this->db->get('level');
	   		return $q->row();
	   	}

	   	function simpan_level($aksi) {
	   		$data = array(
	   					//'id_fakultas'	 => $this->input->post('id_fakultas'),
	   					'nama_level'  => $this->input->post('nama_level'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('level', $data);
					break;
				case 'ubah':
					$this->db->where('id_level', $this->input->post('idlama'));
					$this->db->update('level', $data);
					break;
			}
			
			return "success-Data Level berhasil disimpan";
	   	}

	   	function hapus_level($id) {
	   		$this->db->where('id_level',$id);
	   		$this->db->delete('level');
	   		return "danger-Data Level berhasil di hapus";
	   	}
	}
?>