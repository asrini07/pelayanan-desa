<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dusun extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mdusun');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Dusun";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/dusun/vdusun";
	    $data["judul"] = '<h1 class="no-margin-bottom">Dusun</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Dusun</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mdusun->getdusun($cari);
	    $this->load->view('template',$data);
	} 

	public function form_dusun($id = 0) {
	    $data["title"] = "Pelayanan Desa < Dusun";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/dusun/vformdusun";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Dusun</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Dusun</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mdusun->getdusundetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_dusun($id){
        $message = $this->Mcity->hapus_dusun($id);
        $this->session->set_flashdata("message",$message);
        redirect("dusun");
    }

	public function simpan_city($action){
        $message = $this->Mcity->simpan_dusun($action);
        $this->session->set_flashdata("message",$message);
        redirect("dusun");
    }


}
