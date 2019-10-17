<?php
	class Mrt extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getrt($cari) {
	   		if ($cari != "") {
				$this->db->like("id_rt",$cari);
				$this->db->or_like("nama_rt",$cari);
			}
	   		$q = $this->db->get('rt');
	   		return $q;
	   	}

	   	function getrtdetail($id) {
	   		$this->db->where('id_rt',$id);
	   		$q = $this->db->get('rt');
	   		return $q->row();
	   	}

	   	function simpan_rt($aksi) {
	   		$data = array(
	   					//'id_fakultas'	 => $this->input->post('id_fakultas'),
	   					'nama_rt'  => $this->input->post('nama_rt'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('rt', $data);
					break;
				case 'ubah':
					$this->db->where('id_rt', $this->input->post('idlama'));
					$this->db->update('rt', $data);
					break;
			}
			
			return "success-Data RT berhasil disimpan";
	   	}

	   	function hapus_rt($id) {
	   		$this->db->where('id_rt',$id);
	   		$this->db->delete('rt');
	   		return "danger-Data RT berhasil di hapus";
	   	}
	}
?>