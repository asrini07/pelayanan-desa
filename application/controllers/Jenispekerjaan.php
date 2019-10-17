<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenispekerjaan extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mjenispekerjaan');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Jenis Pekerjaan";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/jenispekerjaan/vjenispekerjaan";
	    $data["judul"] = '<h1 class="no-margin-bottom">Jenis Pekerjaan</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Jenis Pekerjaan</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mjenispekerjaan->getjenispekerjaan($cari);
	    $this->load->view('template',$data);
	} 

	public function form_city($id = 0) {
	    $data["title"] = "Pelayanan Desa < Jenis Pekerjaan";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/jenispekerjaan/vformjenispekerjaan";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Jenis Pekerjaan</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Jenis Pekerjaan</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mjenispekerjaan->getjenispekerjaandetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_jenispekerjaan($id){
        $message = $this->Mcity->hapus_jenispekerjaan($id);
        $this->session->set_flashdata("message",$message);
        redirect("jenispekerjaan");
    }

	public function simpan_jenispekerjaan($action){
        $message = $this->Mjenispekerjaan->simpan_jenispekerjaan($action);
        $this->session->set_flashdata("message",$message);
        redirect("jenispekerjaan");
    }


}
