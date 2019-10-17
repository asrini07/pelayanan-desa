<?php
	class Mstatus extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getstatus($cari) {
	   		if ($cari != "") {
				$this->db->like("id_status",$cari);
				$this->db->or_like("nama_status",$cari);
			}
	   		$q = $this->db->get('status');
	   		return $q;
	   	}

	   	function getstatusdetail($id) {
	   		$this->db->where('id_status',$id);
	   		$q = $this->db->get('status');
	   		return $q->row();
	   	}

	   	function simpan_status($aksi) {
	   		$data = array(
	   					//'id_fakultas'	 => $this->input->post('id_fakultas'),
	   					'nama_status'  => $this->input->post('nama_status'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('status', $data);
					break;
				case 'ubah':
					$this->db->where('id_status', $this->input->post('idlama'));
					$this->db->update('status', $data);
					break;
			}
			
			return "success-Data Status berhasil disimpan";
	   	}

	   	function hapus_status($id) {
	   		$this->db->where('id_status',$id);
	   		$this->db->delete('status');
	   		return "danger-Data Status berhasil di hapus";
	   	}
	}
?>