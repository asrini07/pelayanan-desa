<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mconfig');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Config";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/config/vconfig";
	    $data["judul"] = '<h1 class="no-margin-bottom">Config</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Config</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mconfig->getconfig($cari);
	    $this->load->view('template',$data);
	} 

	public function form_config($id = 0) {
	    $data["title"] = "Pelayanan Desa < Config";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/config/vformconfig";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Config</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Config</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mconfig->getconfigdetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_config($id){
        $message = $this->Mconfig->hapus_config($id);
        $this->session->set_flashdata("message",$message);
        redirect("config");
    }

	public function simpan_config($action){
        $message = $this->Mconfig->simpan_config($action);
        $this->session->set_flashdata("message",$message);
        redirect("config");
    }


}
