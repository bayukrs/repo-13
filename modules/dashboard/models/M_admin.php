<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
	class M_admin extends CI_Model{
		public function get_data_user($freelancer){
			if($freelancer>0){
 				$this->db->where('user_id',$freelancer);
 			}
			$query = $this->db->get('freelancer');
 			return $query->result_array();
		}

		function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}

		public function get_produk_freelancer($freelancer){
			$this->load->library('pagination'); 
 			$query = "SELECT * FROM tbl_produk where user_id = $freelancer";
 			$config['base_url'] = base_url('dashboard/show_job/');
			 $config['total_rows'] = $this->db->query($query)->num_rows();
			 $config['per_page'] = 3;
			 $config['uri_segment'] = 3;
			 $config['num_links'] = 3;
			 // Style Pagination
			 // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
			 $config['full_tag_open'] = '<ul class="pagination justify-content-center m-0">';
			 $config['full_tag_close'] = '</ul>';

			 $config['first_link'] = 'First';
			 $config['first_tag_open'] = '<li class="page-first">';
			 $config['first_tag_close'] = '</li>';

			 $config['last_link'] = 'Last';
			 $config['last_tag_open'] = '<li class="page-item">';
			 $config['last_tag_close'] = '</li>';

			 $config['next_link'] = ' <i class="glyphicon glyphicon-menu-right"></i> ';
			 $config['next_tag_open'] = '<li class="page-item">';
			 $config['next_tag_close'] = '</li>';

			 $config['prev_link'] = ' <i class="glyphicon glyphicon-menu-left"></i> ';
			 $config['prev_tag_open'] = '<li class="page-item">';
			 $config['prev_tag_close'] = '</li>';

			 $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
			 $config['cur_tag_close'] = '</a></li>';
			 $config['num_tag_open'] = '<li class="page-link">';
			 $config['num_tag_close'] = '</li>';
			 // End style pagination

			 $this->pagination->initialize($config); // Set konfigurasipaginationnya
			 $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
			 $query .= " LIMIT ".$page.", ".$config['per_page'];
			 $data['limit'] = $config['per_page'];
			 $data['total_rows'] = $config['total_rows'];
			 $data['pagination'] = $this->pagination->create_links(); //Generate link pagination nya sesuai config diatas
			 $data['tbl_produk'] = $this->db->query($query)->result();
			 return $data;
 		}

 		function tampil(){
			return $this->db->get('tbl_kategori');
		}

		public function tambah_produk($data){
 			$this->db->insert('tbl_portofolio', $data);
 			$id_produk = $this->db->insert_id();
 			return (isset($id_produk)) ? $id_produk : FALSE;
 		}

	 	function edit_data($where,$table){		
			return $this->db->get_where($table,$where);
		}

		function hapus_data($where,$table){
			$this->db->where($where);
			$this->db->delete($table);
		}
		function daftar($data){
			$this->db->insert('user', $data);
			$user_id = $this->db->insert_id();

			return $user_id;
		}

		function changeActiveState($key){
		 $this->load->database();
		 $data = array(
		 'active' => 1
		 );

		 $this->db->where('md5(user_id)', $key);
		 $this->db->update('user', $data);

		 return true;
		}
	}