<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mcity');
	    $this->load->Model('Mcountry');
	    $this->load->Model('Muser');
	    if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    {
	           redirect("login/logout_admin","refresh");
	    }
	}
	
	public function index() {
	    $data["title"] = "Conference < City";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/city/vcity";
	    $data["judul"] = '<h1 class="no-margin-bottom">City</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">City</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mcity->getcity($cari);
	    $this->load->view('template',$data);
	} 

	public function form_city($id = 0) {
	    $data["title"] = "Conference < City";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/city/vformcity";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form City</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">City</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mcity->getcitydetail($id);
	    $data["country"] = $this->Mcountry->getcountry("");
	    $this->load->view('template',$data);
	} 

	public function hapus_city($id){
        $message = $this->Mcity->hapus_city($id);
        $this->session->set_flashdata("message",$message);
        redirect("city");
    }

	public function simpan_city($action){
        $message = $this->Mcity->simpan_city($action);
        $this->session->set_flashdata("message",$message);
        redirect("city");
    }


}
