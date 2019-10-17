<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mlevel');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Level";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/level/vlevel";
	    $data["judul"] = '<h1 class="no-margin-bottom">Level</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Level</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Mlevel->getlevel($cari);
	    $this->load->view('template',$data);
	} 

	public function form_level($id = 0) {
	    $data["title"] = "Pelayanan Desa < Level";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/level/vformlevel";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form Level</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Level</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Mlevel->getleveldetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_level($id){
        $message = $this->Mlevel->hapus_level($id);
        $this->session->set_flashdata("message",$message);
        redirect("level");
    }

	public function simpan_level($action){
        $message = $this->Mlevel->simpan_level($action);
        $this->session->set_flashdata("message",$message);
        redirect("level");
    }


}
