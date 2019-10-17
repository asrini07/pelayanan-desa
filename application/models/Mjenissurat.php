<?php
	class Mjenissurat extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getjenissurat($cari) {
	   		if ($cari != "") {
				$this->db->like("id_jenis_surat",$cari);
				$this->db->or_like("nama_jenis_surat",$cari);
			}
	   		$q = $this->db->get('jenis_surat');
	   		return $q;
	   	}

	   	function getjenissuratdetail($id) {
	   		$this->db->where('id_jenis_surat',$id);
	   		$q = $this->db->get('jenis_surat');
	   		return $q->row();
	   	}

	   	function simpan_jenissurat($aksi) {
	   		$data = array(
	   					'nama_level'  => $this->input->post('nama_level'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('jenis_surat', $data);
					break;
				case 'ubah':
					$this->db->where('id_jenis_surat', $this->input->post('idlama'));
					$this->db->update('jenis_surat', $data);
					break;
			}
			
			return "success-Data Jenis Surat berhasil disimpan";
	   	}

	   	function hapus_jenissurat($id) {
	   		$this->db->where('id_jenis_surat',$id);
	   		$this->db->delete('jenis_surat');
	   		return "danger-Data Jenis Surat berhasil di hapus";
	   	}
	}
?>