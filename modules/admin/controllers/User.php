<?php
class User extends MY_Controller {
 
 	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('m_admin');
	}

	public function index(){
		$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'admin')
	    	show_404();
		$data['user'] = $this->m_admin->get_user();
		$this->render_admin('user',$data);
	}

	function update($user_id){
		$this->authenticated(); 
 
	   	if($this->session->userdata('level') != 'admin')
	    show_404();
		$data = array(
		 	'active'		=> 0
		);

		$where = array(
			'user_id' => $user_id
		);
	 
		$this->m_admin->update_kategori($where,$data,'user');
		redirect(base_url('admin/user'));
	}
}