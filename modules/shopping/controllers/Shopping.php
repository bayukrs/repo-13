<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Shopping extends CI_Controller {
 		public function __construct(){
 			parent::__construct();
 			$this->load->library('cart');
 			$this->load->helper('url','form');
 			$this->load->model('m_buyer');
 		}
 		
 		public function index(){
 			$data['produk'] 	= $this->m_buyer->get_produk_all();
 			$data['kategori'] 	= $this->m_buyer->get_kategori_all();
 			$this->load->view('themes/index',$data);
 		}

 		public function search(){
		 	// Ambil data NIS yang dikirim via ajax post
		 	$keyword = $this->input->post('keyword');
		 	$produk = $this->m_buyer->search($keyword);

		 	// Kita load file view.php sambil mengirim data siswa hasil query function search di SiswaModel
		 	$hasil = $this->load->view('list_produk', array('produk'=>$produk['tbl_produk'],'pagination'=>$produk['pagination']),true);

		 	// Buat sebuah array
		 	$callback = array(
		 		'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
		 	);
		 	echo json_encode($callback); // konversi varibael $callbackmenj
		}

 		public function produk_kategori(){
 			$kategori 			= ($this->uri->segment(3))?$this->uri->segment(3):0;
 			$data['produk'] 	= $this->m_buyer->get_produk_kategori($kategori);
 			$data['kategori'] 	= $this->m_buyer->get_kategori_all();
 			$this->load->view('themes/index',$data);
 		}

 		public function tampil_cart(){
 			$data['kategori'] 	= $this->m_buyer->get_kategori_all();
 			$this->load->view('themes/header',$data);
 			$this->load->view('shopping/tampil_cart',$data);
 			$this->load->view('themes/footer');
 		}
 
 		public function check_out(){
 			$data['kategori'] 	= $this->m_buyer->get_kategori_all();
 			$this->load->view('themes/header',$data);
 			$this->load->view('shopping/check_out',$data);
 			$this->load->view('themes/footer');
 		}
 
 		public function detail_produk(){
 			$id 				=($this->uri->segment(3))?$this->uri->segment(3):0;
 			$data['kategori'] 	= $this->m_buyer->get_kategori_all();
 			$data['detail'] 	= $this->m_buyer->get_produk_id($id)->row_array();
 			$this->load->view('themes/header',$data);
 			$this->load->view('shopping/detail_produk',$data);
 			$this->load->view('themes/footer');
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
 			redirect('shopping');
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
 			redirect('shopping/tampil_cart');
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
 			redirect('shopping/tampil_cart');
 		}

 		public function proses_order(){
 
 //-------------------------Input data pelanggan-------------------------
 			$data_pelanggan = array(
 			'nama' 			=> $this->input->post('nama'),
 			'email'			=> $this->input->post('email'),
 			'alamat' 		=> $this->input->post('alamat'),
 			'telp' 			=> $this->input->post('telp'));
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
 			$email='bayukrismant@gmail.com' ;
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
		    $this->email->to($email);
		    $this->email->subject("Transaksi Sukses");
		    $this->email->message("
		    	hai selamat transaksi anda berhasil
		    	");
		     
		    $this->email->send();
 //-------------------------Hapus shopping cart--------------------------
 			$this->cart->destroy();
 			$data['kategori'] = $this->m_buyer->get_kategori_all();
 			$this->load->view('themes/header',$data);
 			$this->load->view('shopping/sukses',$data);
 			$this->load->view('themes/footer');
 		}
}
?>