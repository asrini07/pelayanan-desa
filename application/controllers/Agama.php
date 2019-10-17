<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Magama');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Agama";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/agama/vagama";
	    $data["judul"] = '<h1 class="no-margin-bottom">Agama</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Agama</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Magama->getagama($cari);
	    $this->load->view('template',$data);
	} 

	public function form_city($id = 0) {
	    $data["title"] = "Pelayanan Desa < Agama";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/agama/vformagama";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Agama</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Agama</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Magama->getagamadetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_agama($id){
        $message = $this->Magama->hapus_agama($id);
        $this->session->set_flashdata("message",$message);
        redirect("agama");
    }

	public function simpan_agama($action){
        $message = $this->Magama->simpan_agama($action);
        $this->session->set_flashdata("message",$message);
        redirect("agama");
    }


}
