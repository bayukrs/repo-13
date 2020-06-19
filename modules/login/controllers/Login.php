<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Login extends MY_Controller { 
 
  	public function __construct(){     
  		parent::__construct(); 
 
    	$this->load->model('UserModel');   
	}

	public function index(){      
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)       
  		redirect('home'); // Redirect ke page home 
    	// function render_login tersebut dari file core/MY_Controller.php     
    	$this->render_login('login'); // Load view login.php   
    }

    public function login_account(){
    	$username = $this->input->post('username');    
    	$password = md5($this->input->post('password')); 

    	$user = $this->UserModel->get($username);

    	if (empty($user)) {
    		$this->session->set_flashdata('msg','<div class="alert alert-danger">
                          <h4>Gagal</h4>
                          <p>Usernam Tidak Ditemukan</p>
                         </div>'
                     );

    		redirect('login');
    	} else{       
    			if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase         
    			$session = array(           
    				'authenticated'=>true, // Buat session authenticated dengan value true           
    				'username'=>$user->username,  // Buat session username
    				'level'=>$user->level, // Buat session role 
            'active' => $user->active,        
            'user_id' => $user->user_id
    			); 
 
        		$this->session->set_userdata($session);
        			if ($this->session->userdata("level") == "admin") {
                          redirect('admin');
                       }else if ($this->session->userdata("level") == "freelancer") {
                          redirect('dashboard/user');
                       }else if ($this->session->userdata("level") == "member") {
                          redirect('member');
                       }  
        		}else{         
        			$this->session->set_flashdata('msg','<div class="alert alert-danger">
                          <h4>Gagal</h4>
                          <p>Password Salah</p>
                         </div>'
                     ); // Buat session flashdata         
        			redirect('login'); // Redirect ke halaman login       
        		}     
        	}
    }
    public function logout(){     
 		$this->session->sess_destroy(); // Hapus semua session     
 		redirect('home'); // Redirect ke halaman login   
 	}
}