<?php
	class Mrw extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getrw($cari) {
	   		if ($cari != "") {
				$this->db->like("id_rw",$cari);
				$this->db->or_like("nama_rw",$cari);
			}
	   		$q = $this->db->get('rw');
	   		return $q;
	   	}

	   	function getrwdetail($id) {
	   		$this->db->where('id_rw',$id);
	   		$q = $this->db->get('rw');
	   		return $q->row();
	   	}

	   	function simpan_rw($aksi) {
	   		$data = array(
	   					//'id_fakultas'	 => $this->input->post('id_fakultas'),
	   					'nama_rw'  => $this->input->post('nama_rw'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('rw', $data);
					break;
				case 'ubah':
					$this->db->where('id_rw', $this->input->post('idlama'));
					$this->db->update('rw', $data);
					break;
			}
			
			return "success-Data Level berhasil disimpan";
	   	}

	   	function hapus_rw($id) {
	   		$this->db->where('id_rw',$id);
	   		$this->db->delete('rw');
	   		return "danger-Data Level berhasil di hapus";
	   	}
	}
?>