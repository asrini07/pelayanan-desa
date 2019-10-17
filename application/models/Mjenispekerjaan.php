<?php
	class Mjenispekerjaan extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getjenispekerjaan($cari) {
	   		if ($cari != "") {
				$this->db->like("id_jenis_pekerjaan",$cari);
				$this->db->or_like("nama_jenis_pekerjaan",$cari);
			}
	   		$q = $this->db->get('jenis_pekerjaan');
	   		return $q;
	   	}

	   	function getjenispekerjaandetail($id) {
	   		$this->db->where('id_jenis_pekerjaan',$id);
	   		$q = $this->db->get('jenis_pekerjaan');
	   		return $q->row();
	   	}

	   	function simpan_jenispekerjaan($aksi) {
	   		$data = array(
	   					//'id_fakultas'	 => $this->input->post('id_fakultas'),
	   					'nama_jenis_pekerjaan'  => $this->input->post('nama_jenis_pekerjaan'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('jenis_pekerjaan', $data);
					break;
				case 'ubah':
					$this->db->where('id_jenis_pekerjaan', $this->input->post('idlama'));
					$this->db->update('jenis_pekerjaan', $data);
					break;
			}
			
			return "success-Data Jenis Pekerjaan berhasil disimpan";
	   	}

	   	function hapus_jenispekerjaan($id) {
	   		$this->db->where('id_jenis_pekerjaan',$id);
	   		$this->db->delete('jenis_pekerjaan');
	   		return "danger-Data Jenis Pekerjaan berhasil di hapus";
	   	}
	}
?>