<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');
class Login extends MX_Controller{
	public function __construct(){
            parent::__construct();  
			$this->load->model('M_session');					
	}
	
	function index(){
			$this->M_session->destroy_session();
			
		    $data['module'] = "login";
            $data['fileview'] = "login";
			echo Modules::run('template/template_login', $data);
	}
	
	function register(){
		    $data['module'] = "login";
            $data['fileview'] = "register";
			echo Modules::run('template/template_login', $data);
	}
	
	function proses(){

	$this->load->model('M_master_data','',true);
		
		// tangkap data dari inputan form
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		
		// ambil record dari tabel user
		$result= $this->M_master_data->get_userid($username);
		
		foreach ($result->result() as $row ){
			$data['id_user']  = $row->id_user;
			$data['nis']      = $row->nis;
			$data['username'] = $row->username;
			$data['password'] = $row->password;
			$data['level']    = $row->level;
		}
		
		// bandingkan inputan form dengan record tabel
		if ($username==$data['username'] and $password==$data['password']){
			$id_user  = $data['id_user'];
			$nis      = $data['nis'];
			$username = $data['username'];
			$password = $data['password'];
			$level    = $data['level'];
			$this->M_master_data->login_time($id_user);
			$this->M_session->store_session($id_user,$nis,$username,$password,$level);  // simpan session id_user
			
				$this->dashboard();

		}else{
            $this->session->set_flashdata('result_login', 'Username atau Password yang anda masukkan salah.');
				header('location:' . base_url() . 'login');
			}
	}
	
	function dashboard(){
			$session = $this->M_session->get_session();
			if (!$session['session_userid'] && !$session['session_status']){
			  	$data['namamodule']   = "login";
	            $data['namafileview'] = "login";
				echo Modules::run('template/template_login', $data);
			}
			else{
			$id_user = $session['session_userid'];
			$level   = $session['session_level'];
				//user sudah login
				if ($id_user !=''){
				//user sudah login
					redirect('dashboard');
				}
				else {
	 			$data['namamodule']   = "login";
	            $data['namafileview'] = "login";
				echo Modules::run('template/template_admin', $data);
				}
			}		
		}
	
	
}