<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rt extends CI_Controller {
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
	    $data["title"] = "Pelayanan Desa < RT";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/rt/vrt";
	    $data["judul"] = '<h1 class="no-margin-bottom">RT</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">RT</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mrt->getrt($cari);
	    $this->load->view('template',$data);
	} 

	public function form_rt($id = 0) {
	    $data["title"] = "Pelayanan Desa < RT";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/rt/vformrt";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form RT</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">RT</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mrt->getrtdetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_rt($id){
        $message = $this->Mcity->hapus_rt($id);
        $this->session->set_flashdata("message",$message);
        redirect("rt");
    }

	public function simpan_rt($action){
        $message = $this->Mrt->simpan_rt($action);
        $this->session->set_flashdata("message",$message);
        redirect("rt");
    }


}
