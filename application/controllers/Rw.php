<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rw extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mrw');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < RW";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/rw/vrw";
	    $data["judul"] = '<h1 class="no-margin-bottom">RW</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">RW</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mrw->getrw($cari);
	    $this->load->view('template',$data);
	} 

	public function form_city($id = 0) {
	    $data["title"] = "Pelayanan Desa < RW";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/rw/vformrw";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form RW</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">RW</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mrw->getrwdetail($id);
	    $data["country"] = $this->Mcountry->getcountry("");
	    $this->load->view('template',$data);
	} 

	public function hapus_rw($id){
        $message = $this->Mrw->hapus_rw($id);
        $this->session->set_flashdata("message",$message);
        redirect("rw");
    }

	public function simpan_rw($action){
        $message = $this->Mrw->simpan_rw($action);
        $this->session->set_flashdata("message",$message);
        redirect("rw");
    }


}
