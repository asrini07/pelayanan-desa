<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {
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
	    $data["title"] = "Pelayanan Desa < Status";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/status/vstatus";
	    $data["judul"] = '<h1 class="no-margin-bottom">Status</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Status</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mstatus->getstatus($cari);
	    $this->load->view('template',$data);
	} 

	public function form_city($id = 0) {
	    $data["title"] = "Pelayanan Desa < Status";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/status/vformstatus";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Status</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Status</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mstatus->getstatusdetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_status($id){
        $message = $this->Mstatus->hapus_status($id);
        $this->session->set_flashdata("message",$message);
        redirect("status");
    }

	public function simpan_status($action){
        $message = $this->Mstatus->simpan_status($action);
        $this->session->set_flashdata("message",$message);
        redirect("status");
    }


}
