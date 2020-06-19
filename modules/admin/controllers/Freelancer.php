<?php
class Freelancer extends MY_Controller {
 
 	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('m_admin');
	}

	public function index(){
		$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'admin')
	    	show_404();
		$data['freelancer'] = $this->m_admin->get_freelancer();
		$this->render_admin('freelancer',$data);
	}

	function hapus($id_kategori){
		$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'admin')
	    	show_404();
		$where = array('freelancer_id' => $id_kategori);
		$this->m_admin->hapus_data($where,'freelancer');
		redirect(base_url('admin/freelancer'));
	}
}