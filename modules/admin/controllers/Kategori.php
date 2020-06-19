<?php
class Kategori extends MY_Controller {
 
 	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('m_admin');
	}

	public function index(){
		$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'admin')
	    	show_404();
		$data['kategori'] = $this->m_admin->get_kategori();
		$this->render_admin('kategori',$data);
	}

	function edit($id_kategori){
		$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'admin')
	    	show_404();
		$where = array('id_kategori' => $id_kategori);
		$data['kategori'] = $this->m_admin->edit_kategori($where,'tbl_kategori')->result();
		$this->render_admin('edit_kategori',$data);
	}

	function update(){
            	$nama_kategori		= $this->input->post('nama_kategori');
                $id_kategori		= $this->input->post('id_kategori');
		$data = array(
                	'id_kategori'		=> $id_kategori,
		 			'nama_kategori'		=> $nama_kategori
		 		);

		$where = array(
			'id_kategori' => $id_kategori
		);
	 
		$this->m_admin->update_kategori($where,$data,'tbl_kategori');
		redirect(base_url('admin/kategori'));
		}

	function hapus($id_kategori){
		$where = array('id_kategori' => $id_kategori);
		$this->m_admin->hapus_data($where,'tbl_kategori');
		redirect(base_url('admin/kategori'));
	}
}