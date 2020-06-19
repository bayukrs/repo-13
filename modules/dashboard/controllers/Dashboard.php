<?php 
	class dashboard extends MY_Controller {
		function __construct(){
			parent::__construct();
			$this->load->helper(array('url','form'));
			$this->load->model('m_admin');
		}
		public function user(){
			$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'freelancer')
	    	show_404();
			$freelancer = $this->session->userdata('user_id');
			$data['freelancer'] = $this->m_admin->get_data_user($freelancer);
			$data['email'] = $this->session->userdata('email');
			$data['active'] = $this->session->userdata('active');

			$this->render_freelancer('user',$data);
		}

		function upload_profile(){
			$config['upload_path']          = 'images/profile_freelancer';  // folder upload 
            $config['allowed_types']        = 'gif|jpg|png|jpeg'; // jenis file
            $config['max_size']             = 3000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
 
            $this->load->library('upload', $config);
 
            if ( ! $this->upload_profile->do_upload('gambar')) //sesuai dengan name pada form 
            {
		 		$freelancer_name				= $this->input->post('freelancer_name');
		 		$freelancer_location 			= $this->input->post('freelancer_location');
		 		$freelancer_photo	 			= '';
            	$long_desc 						= $this->input->post('long_desc');
 
                $data_produk = array(
		 			'freelancer_name'			=> $freelancer_name,
		 			'freelancer_location' 		=> $freelancer_location,
		 			'freelancer_photo' 			=> $freelancer_photo,
		 			'long_desc' 				=> $long_desc
		 		);
		 		$where = array(
					'user_id' => $this->session->userdata('user_id')
				);
			 
				$this->m_admin->update_data($where,$data_produk,'freelancer');
				redirect(base_url('dashboard/user'));
            }
            else {
		 		$freelancer_name				= $this->input->post('freelancer_name');
		 		$freelancer_location 			= $this->input->post('freelancer_location');
            	$file 							= $this->upload->data();
            	$new_gambar 					= $file['file_name'];
            	$long_desc 						= $this->input->post('long_desc');
 
                $data_produk = array(
		 			'freelancer_name'			=> $freelancer_name,
		 			'freelancer_location' 		=> $freelancer_location,
		 			'freelancer_photo' 			=> $new_gambar,
		 			'long_desc' 				=> $long_desc
		 		);
		 		$where = array(
					'user_id' => $this->session->userdata('user_id')
				);
			 
				$this->m_admin->update_data($where,$data_produk,'freelancer');
				redirect(base_url('dashboard/user'));
			}
		}
		public function show_job(){
			$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'freelancer')
	    	show_404();
			$freelancer = $this->session->userdata('user_id');
			$data['produk'] = $this->m_admin->get_produk_freelancer($freelancer);
	 		$this->render_freelancer('dashboard/job',$data);
		}

		public function tambah_produk(){
			$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'freelancer')
	    	show_404();
			$data['kategori'] = $this->m_admin->tampil()->result();
			$this->render_freelancer('tambah',$data);
		}

		public function add_produk(){
			$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'freelancer')
	    	show_404();
			$config['upload_path']          = 'images';  // folder upload 
            $config['allowed_types']        = 'gif|jpg|png|jpeg'; // jenis file
            $config['max_size']             = 3000;
 
            $this->load->library('upload', $config);
 
            if ( ! $this->upload->do_upload('gambar')) //sesuai dengan name pada form 
            { 
                $data_produk = array(
		 			'id_kategori'		=> $this->input->post('kategori'),
		 			'user_id'			=> $this->session->userdata('user_id'),
		 			'nama_produk' 		=> $this->input->post('nama_produk'),
		 			'harga' 			=> $this->input->post('harga'),
		 			'gambar' 			=> $this->input->post('gambar'),
		 			'deskripsi'			=> $this->input->post('deskripsi'),
		 			'benefit'			=> $this->input->post('benefit'),
		 			'waktu_pengerjaan'	=> $this->input->post('waktu')
		 		);
		 		$id_pelanggan 	=  $this->m_admin->tambah_produk($data_produk);
				$this->session->set_flashdata('msg','data berhasil di upload');
				$pesan['message'] ="Pendaftaran berhasil";
				redirect(base_url('freelancer'));
            }
            else
            {
            	//tampung data dari form
            	$id_kategori		= $this->input->post('kategori');
		 		$user_id			= $this->session->userdata('user_id');
		 		$nama_produk 		= $this->input->post('nama_produk');
		 		$harga	 			= $this->input->post('harga');
            	$file 				= $this->upload->data();
            	$gambar 			= $file['file_name'];
            	$deskripsi			= $this->input->post('deskripsi');
		 		$benefit			= $this->input->post('benefit');
		 		$waktu_pengerjaan	= $this->input->post('waktu');
 
                $data_produk = array(
		 			'id_kategori'		=> $id_kategori,
		 			'user_id'			=> $user_id,
		 			'nama_produk' 		=> $nama_produk,
		 			'harga' 			=> $harga,
		 			'gambar' 			=> $gambar,
		 			'deskripsi'			=> $deskripsi,
		 			'benefit'			=> $benefit,
		 			'waktu_pengerjaan'	=> $waktu_pengerjaan
		 		);
		 		$id_pelanggan 	=  $this->m_admin->tambah_produk($data_produk);
				$this->session->set_flashdata('msg','data berhasil di upload');
				$pesan['message'] ="Pendaftaran berhasil";
				redirect(base_url('dashboard/show_job'));
            }
		}

		function edit($id_produk){
			$this->authenticated(); 
 
	    	if($this->session->userdata('level') != 'freelancer')
	    	show_404();
			$where = array('id_produk' => $id_produk);
			$data['produk'] = $this->m_admin->edit_data($where,'tbl_produk')->result();
			$data['kategori'] = $this->m_admin->tampil()->result();
			$this->render_freelancer('edit',$data);
		}

		function update_produk(){
			$config['upload_path']          = 'images';  // folder upload 
            $config['allowed_types']        = 'gif|jpg|png|jpeg'; // jenis file
            $config['max_size']             = 3000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
 
            $this->load->library('upload', $config);
 
            if ( ! $this->upload->do_upload('new_gambar')) //sesuai dengan name pada form 
            {
            	$id_produk			= $this->input->post('id_produk');
                $id_kategori		= $this->input->post('kategori');
		 		$user_id			= $this->session->userdata('user_id');
		 		$nama_produk 		= $this->input->post('nama_produk');
		 		$harga	 			= $this->input->post('harga');
            	$gambar 			= $this->input->post('gambar');
            	$deskripsi			= $this->input->post('deskripsi');
		 		$benefit			= $this->input->post('benefit');
		 		$waktu_pengerjaan	= $this->input->post('waktu');
 
                $data_produk = array(
                	'id_produk'			=> $id_produk,
		 			'id_kategori'		=> $id_kategori,
		 			'user_id'			=> $user_id,
		 			'nama_produk' 		=> $nama_produk,
		 			'harga' 			=> $harga,
		 			'gambar' 			=> $gambar,
		 			'deskripsi'			=> $deskripsi,
		 			'benefit'			=> $benefit,
		 			'waktu_pengerjaan'	=> $waktu_pengerjaan
		 		);
		 		$where = array(
					'id_produk' => $id_produk
				);
			 
				$this->m_admin->update_data($where,$data_produk,'tbl_produk');
				redirect(base_url('freelancer'));
            }
            else {
            	$id_produk			= $this->input->post('id_produk');
				$id_kategori		= $this->input->post('kategori');
		 		$user_id			= $this->session->userdata('user_id');
		 		$nama_produk 		= $this->input->post('nama_produk');
		 		$harga	 			= $this->input->post('harga');
            	$file 				= $this->upload->data();
            	$new_gambar 		= $file['file_name'];
            	$deskripsi			= $this->input->post('deskripsi');
		 		$benefit			= $this->input->post('benefit');
		 		$waktu_pengerjaan	= $this->input->post('waktu');
 
                $data_produk = array(
                	'id_produk'			=> $id_produk,
		 			'id_kategori'		=> $id_kategori,
		 			'user_id'			=> $user_id,
		 			'nama_produk' 		=> $nama_produk,
		 			'harga' 			=> $harga,
		 			'gambar' 			=> $new_gambar,
		 			'deskripsi'			=> $deskripsi,
		 			'benefit'			=> $benefit,
		 			'waktu_pengerjaan'	=> $waktu_pengerjaan
		 		);
		 		$where = array(
					'id_produk' => $id_produk
				);
			 
				$this->m_admin->update_data($where,$data_produk,'tbl_produk');
				redirect(base_url('dashboard/show_job'));
		}
	}

	function hapus($id_produk){
		$where = array('id_produk' => $id_produk);
		$this->m_admin->hapus_data($where,'tbl_produk');
		redirect(base_url('dashboard/show_job'));
	}
}