<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    // $this->load->Model('Mcountry');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}
	
	public function index() {
	    $data["title"] = "Pelayanan Desa < Dashboard";
	    //$data["nama_user"] = $this->session->userdata('nama_user');
	    $data["menu"] = "dashboard";
	    $data["content"] = "vdashboard";
	    $data["judul"] = '<h1 class="no-margin-bottom">Dashboard</h1>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active">Dashboard</li>';
	    $this->load->view('template',$data);
	} 

	

}
