<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Member extends MY_Controller {
 		public function __construct(){
 			parent::__construct();
 			$this->load->library('cart');
 			$this->load->model('m_buyer');
 		}
 		
 		public function index(){
 			$data['produk'] 	= $this->m_buyer->get_produk_all();
 			$data['kategori'] 	= $this->m_buyer->get_kategori_all();
			$data['email'] = $this->session->userdata('email');
			$data['active'] = $this->session->userdata('active');
 			$this->render_shopping('member/list_produk',$data);
 		}

 		public function search(){
		 	// Ambil data NIS yang dikirim via ajax post
		 	$keyword = $this->input->post('keyword');
		 	$data['produk'] = $this->m_buyer->search($keyword);

		 	// Kita load file view.php sambil mengirim data siswa hasil query function search di SiswaModel
		 	$hasil = $this->render_shopping('list_produk', array($data),true);

		 	// Buat sebuah array
		 	$callback = array(
		 		'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
		 	);
		 	echo json_encode($callback); // konversi varibael $callbackmenj
		}

 		public function produk_kategori(){
 			$kategori 			= ($this->uri->segment(3))?$this->uri->segment(3):0;
 			$data['produk'] 	= $this->m_buyer->get_produk_kategori($kategori);
			$data['email'] = $this->session->userdata('email');
			$data['active'] = $this->session->userdata('active');
 			$data['kategori'] 	= $this->m_buyer->get_kategori_all();
 			$this->render_shopping('member/list_produk',$data);
 		}

 		public function tampil_cart(){
 			$data['kategori'] 	= $this->m_buyer->get_kategori_all();
			$data['email'] = $this->session->userdata('email');
			$data['active'] = $this->session->userdata('active');
 			$this->render_shopping('member/tampil_cart',$data);
 		}
 
 		public function check_out(){
 			$data['kategori'] 	= $this->m_buyer->get_kategori_all();
			$data['email'] = $this->session->userdata('email');
			$data['active'] = $this->session->userdata('active');
 			$this->render_shopping('member/check_out',$data);
 		}
 
 		public function detail_produk(){
 			$id 				=($this->uri->segment(3))?$this->uri->segment(3):0;
 			$data['kategori'] 	= $this->m_buyer->get_kategori_all();
 			$data['detail'] 	= $this->m_buyer->get_produk_id($id)->row_array();
			$data['email'] = $this->session->userdata('email');
			$data['active'] = $this->session->userdata('active');
 			$this->render_shopping('member/detail_produk',$data);
 		}
 
 		function tambah(){
 			$data_produk = array(
 				'id' 		=> $this->input->post('id'),
	 			'name' 		=> $this->input->post('nama'),
	 			'price' 	=> $this->input->post('harga'),
				'gambar' 	=> $this->input->post('gambar'),
	 			'qty' 		=> $this->input->post('qty'));
	 			$this->cart->insert($data_produk);
	 			$this->session->set_flashdata('msg','<div class="alert alert-success">
	 												<h4>Berhasil</h4>
	 												<p>Berhasil Menambahkan barang</p>
	 											 </div>'
	 									 );
 			redirect('member');
 		}

 		function hapus($rowid){
 			if ($rowid=="all"){
 				$this->cart->destroy();
 			}else{
 				$data = array('rowid' => $rowid,
 				'qty' => 0);
 				$this->cart->update($data);
 			}
 			$this->session->set_flashdata('msg','<div class="alert alert-danger">
	 												<h4>Berhasil</h4>
	 												<p>Berhasil Menghapus barang</p>
	 											 </div>'
	 									 );
 			redirect('member/tampil_cart');
 		}
 
 		function ubah_cart(){
 			$cart_info = $_POST['cart'] ;
 			foreach( $cart_info as $id => $cart){
 				$rowid 		=  $cart['rowid'];
 				$price 		=  $cart['price'];
 				$gambar 	=  $cart['gambar'];
 				$amount 	=  $price * $cart['qty'];
 				$qty 		=  $cart['qty'];
 				$data 		=  array('rowid' => $rowid,
 				'price' 	=> $price,
 				'gambar' 	=> $gambar,
 				'amount' 	=> $amount,
 				'qty' 		=> $qty);
 				$this->cart->update($data);
 			}
 			redirect('member/tampil_cart');
 		}

 		public function proses_order(){
 
 //-------------------------Input data pelanggan-------------------------
 			$data_pelanggan = array(
 			'nama' 			=> $this->session->userdata('nama'),
 			'email'			=> $this->session->userdata('email'),
 			'alamat' 		=> $this->session->userdata('alamat'),
 			'telp' 			=> $this->session->userdata('telp'));
 			$id_pelanggan 	=  $this->m_buyer->tambah_pelanggan($data_pelanggan);
 //-------------------------Input data order-----------------------------
 			$data_order 	=  array('tanggal' => date('Y-m-d'),
 									'pelanggan' 	=> $id_pelanggan);
 			$id_order   	=  $this->m_buyer->tambah_order($data_order);
 //-------------------------Input data detail order----------------------
 			if ($cart = $this->cart->contents()){
 				foreach ($cart as $item){
 					$data_detail = array(
 						'order_id'	=> $id_order,
 						'produk' 	=> $item['id'],
 						'qty' 		=> $item['qty'],
 						'harga' 	=> $item['price']);
 					$proses = $this->m_buyer->tambah_detail_order($data_detail);
 				}
 			}
 //-------------------------Pengiriman Email-----------------------------
 			$this->load->library('email');
		    $config=array();
		    $config['charset']='utf-8';
		    $config['useragent']='Codeigniter';
		    $config['protocol']="smtp";
		    $config['mailtype']="html";
		    $config['smtp_host']="ssl://smtp.gmail.com";
		    $config['smtp_port']="465";
		    $config['smtp_timeout']="400";
		    $config['smtp_user']="bayukrismant@gmail.com";
		    $config['smtp_pass']="Bayu123321";
		    $config['crlf']="\r\n";
		    $config['newline']="\r\n";
		    $config['wordwrap']=TRUE;

		    $this->email->initialize($config);
		//konfigurasi pengiriman email
		    $this->email->from($config['smtp_user']);
		    $this->email->to($data_pelanggan['email']);
		    $this->email->subject("Transaksi Sukses");
		    $this->email->message("
		    	hai selamat transaksi anda berhasil
		    	");
		     
		    $this->email->send();
 //-------------------------Hapus shopping cart--------------------------
 			$this->cart->destroy();
 			$data['kategori'] = $this->m_buyer->get_kategori_all();
 			$this->render_shopping('member/sukses',$data);
 		}
}
?>