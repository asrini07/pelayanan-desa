<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mpendidikan');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Pendidikan";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/pendidikan/vpendidikan";
	    $data["judul"] = '<h1 class="no-margin-bottom">Pendidikan</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Pendidikan</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mpendidikan->getpendidikan($cari);
	    $this->load->view('template',$data);
	} 

	public function form_pendidikan($id = 0) {
	    $data["title"] = "Pelayanan Desa < Pendidikan";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/pendidikan/vformpendidikan";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Pendidikan</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Pendidikan</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mpendidikan->getpendidikandetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_pendidikan($id){
        $message = $this->Mpendidikan->hapus_pendidikan($id);
        $this->session->set_flashdata("message",$message);
        redirect("pendidikan");
    }

	public function simpan_pendidikan($action){
        $message = $this->Mpendidikan->simpan_pendidikan($action);
        $this->session->set_flashdata("message",$message);
        redirect("pendidikan");
    }


}
