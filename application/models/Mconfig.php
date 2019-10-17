<?php
	class Mconfig extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getconfig($cari) {
	   		if ($cari != "") {
				$this->db->like("id_desa",$cari);
				$this->db->or_like("nama_desa",$cari);
			}
	   		$q = $this->db->get('config_desa');
	   		return $q;
	   	}

	   	function getconfigdetail($id) {
	   		$this->db->where('id_desa',$id);
	   		$q = $this->db->get('config_desa');
	   		return $q->row();
	   	}

	   	function simpan_config($aksi) {
	   		$data = array(
	   					//'id_fakultas'	 => $this->input->post('id_fakultas'),
						   'kode_prov'  => $this->input->post('kode_prov'), 
						   'kode_kab'  => $this->input->post('kode_kab'), 
						   'kode_kec'  => $this->input->post('kode_kec'), 
						   'nama_desa'  => $this->input->post('nama_desa'), 
						   'nama_kuwu'  => $this->input->post('nama_kuwu'), 
						   'nip_kuwu'  => $this->input->post('nip_kuwu'), 
						   'kode_pos'  => $this->input->post('kode_pos'), 
						   'alamat'  => $this->input->post('alamat'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('config_desa', $data);
					break;
				case 'ubah':
					$this->db->where('id_desa', $this->input->post('idlama'));
					$this->db->update('config_desa', $data);
					break;
			}
			
			return "success-Data Desa berhasil disimpan";
	   	}

	   	function hapus_config($id) {
	   		$this->db->where('id_desa',$id);
	   		$this->db->delete('config_desa');
	   		return "danger-Data Desa berhasil di hapus";
	   	}
	}
?>