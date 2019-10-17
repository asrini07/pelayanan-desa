<?php
	class Mfaculty extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getfaculty($cari) {
	   		if ($cari != "") {
				$this->db->like("id_fakultas",$cari);
				$this->db->or_like("fakultas_name",$cari);
			}

			$this->db->select('fakultas.*, universitas.universitas_name');
	   		$this->db->join('universitas', 'fakultas.id_universitas=universitas.id_universitas','LEFT');
	   		$q = $this->db->get('fakultas');
	   		return $q;
	   	}

	   	function getfacultydetail($id) {
	   		$this->db->where('id_fakultas',$id);
	   		$q = $this->db->get('fakultas');
	   		return $q->row();
	   	}

	   	function simpan_faculty($aksi) {
	   		$data = array(
	   					'fakultas_name'  => $this->input->post('fakultas_name'), 
	   					'id_universitas'  => $this->input->post('id_universitas'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('fakultas', $data);
					break;
				case 'ubah':
					$this->db->where('id_fakultas', $this->input->post('idlama'));
					$this->db->update('fakultas', $data);
					break;
			}
			
			return "success-Data Faculty saved successfully";
	   	}

	   	function hapus_faculty($id) {
	   		$this->db->where('id_fakultas',$id);
	   		$this->db->delete('fakultas');
	   		return "danger-Data Faculty deleted successfully";
	   	}
	}
?>