<?php
	class Muser extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getuser($cari) {
	   		if ($cari != "") {
				$this->db->like("id_user",$cari);
				$this->db->or_like("nama_user",$cari);
			}
	   		$q = $this->db->get('user');
	   		return $q;
	   	}

	   	function getuserdetail($id) {
	   		$this->db->where('id_user',$id);
	   		$q = $this->db->get('user');
	   		return $q->row();
	   	}

	   	function simpan_user($aksi) {
	   		$data = array(
	   					//'id_fakultas'	 => $this->input->post('id_fakultas'),
	   					'nama_user'  => $this->input->post('nama_user'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('user', $data);
					break;
				case 'ubah':
					$this->db->where('id_user', $this->input->post('idlama'));
					$this->db->update('user', $data);
					break;
			}
			
			return "success-Data User berhasil disimpan";
	   	}

	   	function hapus_user($id) {
	   		$this->db->where('id_user',$id);
	   		$this->db->delete('user');
	   		return "danger-Data User berhasil di hapus";
	   	}
	}
?>