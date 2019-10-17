<?php
	class Mstatusperkawinan extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getstatusperkawinan($cari) {
	   		if ($cari != "") {
				$this->db->like("id_status_kawin",$cari);
				$this->db->or_like("nama_status_kawin",$cari);
			}
	   		$q = $this->db->get('status_kawin');
	   		return $q;
	   	}

	   	function getstatusperkawinandetail($id) {
	   		$this->db->where('id_status_kawin',$id);
	   		$q = $this->db->get('status_kawin');
	   		return $q->row();
	   	}

	   	function simpan_statusperkawinan($aksi) {
	   		$data = array(
	   					//'id_fakultas'	 => $this->input->post('id_fakultas'),
	   					'nama_status_kawin'  => $this->input->post('nama_status_kawin'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('status_kawin', $data);
					break;
				case 'ubah':
					$this->db->where('id_status_kawin', $this->input->post('idlama'));
					$this->db->update('status_kawin', $data);
					break;
			}
			
			return "success-Data Status Perkawinan berhasil disimpan";
	   	}

	   	function hapus_statusperkawinan($id) {
	   		$this->db->where('id_status_kawin',$id);
	   		$this->db->delete('status_kawin');
	   		return "danger-Data Status Perkawinan berhasil di hapus";
	   	}
	}
?>