<?php
class Order extends MY_Controller {
 
 	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('m_admin');
	}

	public function index(){
		$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'admin')
	    	show_404();
		$data['order'] = $this->m_admin->get_order();
		$data['order_detail'] = $this->m_admin->get_order_detail();	
		$data['pelanggan'] = $this->m_admin->get_pelanggan();		
		$this->render_admin('order',$data);
	}
}