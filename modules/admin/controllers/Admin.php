<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller {
 
 	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
	}
	
	public function index(){
		$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'admin')
	    	show_404();
 	// load view admin/overview.php
		$data['produk'] = $this->m_admin->tampil();
 		$this->render_admin('dashboard',$data);
	}

	function hapus($id_produk){
		$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'admin')
	    	show_404();
		$where = array('id_produk' => $id_produk);
		$this->m_admin->hapus_data($where,'tbl_produk');
		redirect(base_url('admin'));
	}
}