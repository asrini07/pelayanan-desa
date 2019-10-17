<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kewarganegaraan extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mcity');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Kewarganegaraan";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/kewarganegaraan/vkewarganegaraan";
	    $data["judul"] = '<h1 class="no-margin-bottom">Kewarganegaraan</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Kewarganegaraan</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mkewarganegaraan->getkewarganegaraan($cari);
	    $this->load->view('template',$data);
	} 

	public function form_kewarganegaraan($id = 0) {
	    $data["title"] = "Pelayanan Desa < Kewarganegaraan";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/kewarganegaraan/vformkewarganegaraan";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Kewarganegaraan</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Kewarganegaraan</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mkewarganegaraan->getkewarganegaraandetail($id);
	    $data["country"] = $this->Mcountry->getcountry("");
	    $this->load->view('template',$data);
	} 

	public function hapus_kewarganegaraan($id){
        $message = $this->Mkewarganegaraan->hapus_kewarganegaraan($id);
        $this->session->set_flashdata("message",$message);
        redirect("kewarganegaraan");
    }

	public function simpan_kewarganegaraan($action){
        $message = $this->Mkewarganegaraan->simpan_kewarganegaraan($action);
        $this->session->set_flashdata("message",$message);
        redirect("kewarganegaraan");
    }


}
