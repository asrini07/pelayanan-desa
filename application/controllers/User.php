<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Muser');
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < User";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/user/vuser";
	    $data["judul"] = '<h1 class="no-margin-bottom">User</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">User</li>';
	    $cari = $this->input->post("cari");
    	$data["cari"] = $cari;
	    $data["row"] = $this->Muser->getuser($cari);
	    $this->load->view('template',$data);
	} 

	public function form_city($id = 0) {
	    $data["title"] = "Pelayanan Desa < User";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "master";
	    $data["content"] = "master/user/vformuser";
	    $data["judul"] = '<h1 class="no-margin-bottom">Form User</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">User</li>';
    	$data["id"] = $id;
	    $data["row"] = $this->Muser->getuserdetail($id);
	    $this->load->view('template',$data);
	} 

	public function hapus_user($id){
        $message = $this->Muser->hapus_user($id);
        $this->session->set_flashdata("message",$message);
        redirect("user");
    }

	public function simpan_user($action){
        $message = $this->Muser->simpan_user($action);
        $this->session->set_flashdata("message",$message);
        redirect("user");
    }


}
