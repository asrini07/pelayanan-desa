<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenissurat extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mjenissurat');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Jenis Surat";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/jenissurat/vjenissurat";
	    $data["judul"] = '<h1 class="no-margin-bottom">Jenis Surat</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Jenis Surat</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mjenissurat->getjenissurat($cari);
	    $this->load->view('template',$data);
	} 

	public function form_city($id = 0) {
	    $data["title"] = "Pelayanan Desa < Jenis Surat";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/jenissurat/vformjenissurat";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Jenis Surat</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Jenis Surat</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mjenissurat->getjenissuratdetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_jenissurat($id){
        $message = $this->Mcity->hapus_jenissurat($id);
        $this->session->set_flashdata("message",$message);
        redirect("jenissurat");
    }

	public function simpan_jenissurat($action){
        $message = $this->Mjenissurat->simpan_jenissurat($action);
        $this->session->set_flashdata("message",$message);
        redirect("jenissurat");
    }


}
