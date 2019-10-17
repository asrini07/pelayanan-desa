<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statusperkawinan extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mstatusperkawinan');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Status Perkawinan";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/statusperkawinan/vstatusperkawinan";
	    $data["judul"] = '<h1 class="no-margin-bottom">Status Perkawinan</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Status Perkawinan</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mstatusperkawinan->getstatusperkawinan($cari);
	    $this->load->view('template',$data);
	} 

	public function form_city($id = 0) {
	    $data["title"] = "Pelayanan Desa < Status Perkawinan";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/statusperkawinan/vformstatusperkawinan";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Status Perkawinan</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Status Perkawinan</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mstatusperkawinan->getstatusperkawinandetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_statusperkawinan($id){
        $message = $this->Mstatusperkawinan->hapus_statusperkawinan($id);
        $this->session->set_flashdata("message",$message);
        redirect("statusperkawinan");
    }

	public function simpan_statusperkawinan($action){
        $message = $this->Mstatusperkawinan->simpan_statusperkawinan($action);
        $this->session->set_flashdata("message",$message);
        redirect("statusperkawinan");
    }


}
