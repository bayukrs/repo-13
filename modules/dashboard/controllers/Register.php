<?php 
defined('BASEPATH') OR exit('No direct script access allowed');   
class Register extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->library(array('form_validation'));
    $this->load->helper(array('url','form'));
    $this->load->model('m_admin');
    //call model
  } 
 
  public function index() {

    $this->form_validation->set_rules('username', 'USERNAME','required');
    $this->form_validation->set_rules('email','EMAIL','required|valid_email');
    $this->form_validation->set_rules('password','PASSWORD','required');
    $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password] ');
    $this->form_validation->set_rules('level','level','required');

    if($this->form_validation->run() == FALSE) {
      $this->load->view('register');
  }else{

    $username=$this->input->post('username');
    $level=$this->input->post('level');
    $email=$this->input->post('email');
    $password=md5($this->input->post('password'));

    $data = array(
     'username' => $username,
     'password' => $password,
     'email' => $email,
     'level' => $level,
     'active' => 0
     );

    $this->load->model('m_admin');
    $user_id=$this->m_admin->daftar($data);

    $encrypted_id=md5($user_id);

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
    $this->email->subject("Verifikasi Akun");
    $this->email->message(
    "registrasi email : ".site_url("dashboard/register/verification/$encrypted_id"));
     
    if ($this->email->send()){
    $pesan['message'] ="Silahkan Cek Email Anda Untuk Proses Verifikasi";
    $this->load->view('v_sukses',$pesan); 
    }else{
    
    $pesan['message'] ="Gagal Mengirim Verifikasi Ke Email Anda";
    $this->load->view('v_sukses',$pesan); 
    }

    }  

} 

  public function verification($key){
       $this->m_admin->changeActiveState($key);
       $pesan['message'] ="Proses Verifikasi Berhasil";
       $this->load->view('v_sukses',$pesan); 
    }

}