<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jeniskelamin extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mjeniskelamin');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Jenis Kelamin";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/jeniskelamin/vjeniskelamin";
	    $data["judul"] = '<h1 class="no-margin-bottom">Jenis Kelamin</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Jenis Kelamin</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mjeniskelamin->getjeniskelamin($cari);
	    $this->load->view('template',$data);
	} 

	public function form_city($id = 0) {
	    $data["title"] = "Pelayanan Desa < Jenis Kelamin";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/jeniskelamin/vformjeniskelamin";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Jenis Kelamin</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Jenis Kelamin</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mjeniskelamin->getjeniskelamindetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_jeniskelamin($id){
        $message = $this->Mjeniskelamin->hapus_jeniskelamin($id);
        $this->session->set_flashdata("message",$message);
        redirect("jeniskelamin");
    }

	public function simpan_jeniskelamin($action){
        $message = $this->Mjeniskelamin->simpan_jeniskelamin($action);
        $this->session->set_flashdata("message",$message);
        redirect("jeniskelamin");
    }


}
